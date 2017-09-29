<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Models\Vault;
use App\Models\Income;
use App\Models\Expenditure;
use App\Models\ExpenditureCredit;
use App\Models\Credit;
use App\Models\PurseAccess;
use Toastr;
use Validator;
use Auth;
use Image;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use App\Models\Payment;
use App\Models\LatePayments;
use App\Models\Close;

class GeneralController extends Controller
{	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getPromoter()
	{	

		if (Auth::user()->hasRole(['administrador', 'director-general'])) {
			$users = User::all();
			return view('executives.index')
			->with('employees', $users);
		}
		elseif (Auth::user()->hasRole('coordinador-regional')) {
			$user_allocation = Auth::user();
			$region_allocation = $user_allocation->region;

			$filtered = User::all();
			$users = $filtered->where('region_id', $region_allocation->id);

			return view('executives.index')
			->with('employees', $users);
		}
		elseif (Auth::user()->hasRole('coordinador-sucursal')) {
			$user_allocation = Auth::user();
			$branch_allocation = $user_allocation->branch;

			$collection = Role::all();
			$role = $collection->where('name', 'ejecutivo-de-credito')->first();
			$filtered = User::all();
			$users = $filtered->where('branch_id', $branch_allocation->id);

			return view('executives.index')
			->with('employees', $users);
		}
		
		elseif(Auth::user()->hasRole('ejecutivo-de-credito')) {

			$user = Auth::user();

			return view('executives.index')
			->with('user', $user);
		}
		
	}

	public function showVault($id)
	{	
		$current = Carbon::today()->toDateString();
		$user = User::find($id);
		$vault = $user->vault;
		$incomes = $vault->incomes->where('date', $current);
		$si = $incomes->where('concept', 'Saldo Inicial')->where('date', $current);
		$af = $incomes->where('concept', 'Asignación de efectivo')->where('date', $current);

		$incomePayment = $vault->incomePayment->where('date', $current);
		$rc = $incomePayment->where('concept', 'Recuperación')->where('date', $current);

		$expenditures = $vault->expenditures->where('date', $current);
		$g = $expenditures->where('concept', 'Gasto')->where('date', $current);

		$expendituresCredit = $vault->expendituresCredit->where('date', $current);
		$c = $expendituresCredit->where('concept', 'Colocación')->where('date', $current);

		$purseAccess = $vault->purseAccess->where('date', $current);
		$ra = $purseAccess->where('concept', 'Recuperación Access')->where('date', $current);

		return view('executives.showVault')
		->with('user', $user)
		->with('vault', $vault)
		->with('incomes', $incomes)
		->with('incomePayment', $incomePayment)
		->with('si', $si)
		->with('rc', $rc)
		->with('af', $af)
		->with('expenditures', $expenditures)
		->with('expendituresCredit', $expendituresCredit)
		->with('c', $c)
		->with('g', $g)
		->with('purseAccess',$purseAccess)
		->with('ra',$ra);
	}

	public function addVault(Request $request)
	{	
		$current = Carbon::today();

		$validator = Validator::make($request->all(), [
			'ammount' => 'required|numeric'
		]);

		if ($validator->fails()) {
			Toastr::error('Favor de introducir cantidad valida.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
		$user_collector = Auth::user();
		$vault_collector = $user_collector->vault;
		if ($vault_collector->ammount < $request->input('ammount')) {
			Toastr::error('No cuentas con el dinero suficiente para otorgar $'.number_format($request->input('ammount')).' de saldo inicial.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
		else
		{
			$user = User::find($request->input('user_id'));
			$vault = $user->vault;

			$data_income['ammount'] = $request->input('ammount');
			$data_income['concept'] = 'Saldo Inicial';
			$data_income['date']    = $current;
			$data_income['vault_id'] = $vault->id;
			$income = Income::create($data_income);

			$vault->ammount = $vault->ammount + $income->ammount;
			$vault->save();


			$vault_collector->ammount = $vault_collector->ammount - $vault->ammount;
			$vault_collector->save();

			Toastr::success('Saldo inicial agregado exitosamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
	}

	public function addCash(Request $request)
	{	
		$current = Carbon::today();

		$validator = Validator::make($request->all(), [
			'ammount' => 'required|numeric'
		]);
		$user_collector = Auth::user();
		$vault_collector = $user_collector->vault;
		if ($validator->fails()) {
			Toastr::error('Favor de introducir cantidad valida.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}

		elseif ($vault_collector->ammount < $request->input('ammount')) {
			Toastr::error('No cuentas con el dinero suficiente para otorgar $'.number_format($request->input('ammount')).' de saldo inicial.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}

		$user = User::find($request->input('user_id'));
		$vault = $user->vault;

		$data_income['ammount'] = $request->input('ammount');
		$data_income['concept'] = 'Asignación de efectivo';
		$data_income['date']    = $current;
		$data_income['vault_id'] = $vault->id;
		$income = Income::create($data_income);

		$vault->ammount = $vault->ammount + $income->ammount;
		$vault->save();

		$vault_collector->ammount = $vault_collector->ammount - $request->input('ammount');
		$vault_collector->save();


		Toastr::success('Asignación de efectivo exitoso.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect()->back();
	}

	public function recordExpense(Request $request)
	{	
		$user = Auth::user();
		$vault = $user->vault;	
		if ($vault->ammount == 0) {
			Toastr::error('No puedes registrar un gasto, ya que no cuentas con efectivo.', 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect()->back();
		}
		else{
			$validator = Validator::make($request->all(), [
				'ammount' => 'required|numeric',
				'voucher' => 'required'
			]);

			if ($validator->fails()) {
				Toastr::error('Favor de introducir cantidad valida ó la imagen correctamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

				return redirect()->back();
			}

			if ($request->hasFile('voucher')) {
				$voucher = $request->file('voucher');
				$filename = time() . '.' . $voucher->getClientOriginalExtension();
				Image::make($voucher)->resize(400, 400)->save(public_path('/uploads/voucher' . $filename));
			}

			$current = Carbon::today();
			$ammount = $request->input('ammount');
			$concept = $request->input('concept');
			$user = Auth::user();
			$vault = $user->vault;	
			$data_expenditure['ammount'] = $ammount;
			$data_expenditure['concept'] = 'Gasto';
			$data_expenditure['voucher'] = $filename;
			$data_expenditure['date']    = $current;
			$data_expenditure['description']= $request->input('description');;
			$data_expenditure['vault_id'] = $vault->id;

			$expenditure = Expenditure::create($data_expenditure);

			$vault->ammount = $vault->ammount - $expenditure->ammount;
			$vault->save();

			Toastr::success('Gasto agregado exitosamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
	}
	public function purseAccess(Request $request)
	{	
		
		$validator = Validator::make($request->all(), [
			'ammount' => 'required|numeric',	
		]);

		if ($validator->fails()) {
			Toastr::error('Favor de introducir cantidad valida.', 'CARTERA ACCESS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
		if ($request->hasFile('voucher')) {
			$voucher = $request->file('voucher');
			$filename = time() . '.' . $voucher->getClientOriginalExtension();
			Image::make($voucher)->resize(400, 400)->save(public_path('/uploads/voucher' . $filename));
		}
		$current = Carbon::today();
		$user = User::find($request->input('user_id'));
		$vault = $user->vault;

		$data_purseAccess['ammount'] = $request->input('ammount');
		$data_purseAccess['concept']= 'Recuperación Access';
		$data_purseAccess['voucher'] = $filename;
		$data_purseAccess['date']    = $current;
		$data_purseAccess['vault_id'] = $vault->id;
		$data_purseAccess['user_id'] = $user->id;
		$purseAccess = PurseAccess::create($data_purseAccess);

		$vault->ammount = $vault->ammount + $purseAccess->ammount;
		$vault->save();
		Toastr::success('Monto agregado exitosamente.', 'CARTERA ACCESS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect()->back();
	}

	public function lockPayments()
	{
		//return "Hello, world!";

		$date_now = Carbon::now()->toDateString();
		//$hour_now = Carbon::now()->toTimeString();
		$payments = Payment::where('date', $date_now)->where('status', 'Pendiente')->get();

		foreach ($payments as $key => $value) {
			//echo "Estamos listos para bloquear";
			$payment = Payment::find($value->id);
			$payment->status = 'Vencido';
			$payment->moratorium = 20;
			$payment->total = $payment->ammount + $payment->moratorium;
			$payment->balance = $payment->balance + 20;
			$payment->save();

			$debt = $payment->debt;
			$debt->ammount = $debt->ammount + 20;
			$debt->save();

			if ($payment->status == 'Vencido') {
				$latePayments = new LatePayments;
				$latePayments->late_number = $payment->number;
				$latePayments->late_ammount = $payment->total;
				$latePayments->late_payment = $payment->payment;
				$latePayments->payment_id = $payment->id;
				$latePayments->debt_id    = $debt->id;
				$latePayments->save();
			}			
		}

		$user_close = Auth::user();
		$close_data['name_user'] = $user_close->name;
		$close_data['user_id']   = $user_close->id;
		$close = Close::create($close_data);

		Toastr::info('La operación se ha cerrado exitosamente.', 'INFO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
		return redirect()->back();
	}
}
