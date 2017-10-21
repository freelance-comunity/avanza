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
use App\Models\Client;
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
use App\Models\IncomePayment;
use App\Models\BoxCut;

class GeneralController extends Controller
{	
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('login_mid');
	}
	
	public function getPromoter()
	{	

		if (Auth::user()->hasRole(['administrador', 'director-general'])) {
			$users = User::where('id', '!=', Auth::id())->get();
			// $users = User::all();
			return view('executives.index')
			->with('employees', $users);
		}
		elseif (Auth::user()->hasRole('coordinador-regional')) {
			$user_allocation = Auth::user();
			$region_allocation = $user_allocation->region;
			$filtered = User::where('id', '!=', Auth::id())->get();
			//$filtered = User::all();
			$users = $filtered->where('region_id', $region_allocation->id);

			return view('executives.index')
			->with('employees', $users);
		}
		elseif (Auth::user()->hasRole('coordinador-sucursal')) {
			$user_allocation = Auth::user();
			$branch_allocation = $user_allocation->branch;
			$collection = Role::all();
			$role = $collection->where('name', 'ejecutivo-de-credito')->first();
			//$filtered = User::all();
			$filtered = User::where('id', '!=', Auth::id())->get();
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

		$user_collector  = Auth::user();
		$vault_collector = $user_collector->vault;
		$ammount_add     = $request->input('ammount');

		if ($vault_collector->ammount < $ammount_add) {
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


			$vault_collector->ammount = $vault_collector->ammount - $ammount_add;
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
		$ammount_add     = $request->input('ammount');

		if ($validator->fails()) {
			Toastr::error('Favor de introducir cantidad valida.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}

		elseif ($vault_collector->ammount < $ammount_add) {
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

		$vault_collector->ammount = $vault_collector->ammount - $ammount_add;
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
				'voucher' => 'required|image|mimes:jpeg,png,jpg',
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
			'voucher' => 'required|image|mimes:jpeg,png,jpg',
		]);

		if ($validator->fails()) {
			Toastr::error('Favor de introducir cantidad valida ó la imagen correctamente.', 'CARTERA ACCESS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

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

	public function transferProcess(Request $request)
	{
		$transmitter = User::find($request->input('transmitter'));

		$receiver = User::find($request->input('receiver'));

		$clients  = $transmitter->clients;
		
		// echo $transmitter->name;
		// echo "<br>";
		// echo $receiver->name;
		$credits  = $transmitter->credits;

		$payments = $transmitter->payments;

		foreach ($clients as $client) {
			$client->user_id = $receiver->id;
			$client->save();
		}

		foreach ($credits as $credit) {
			$credit->user_id = $receiver->id;
			$credit->save();
		}

		foreach ($payments as $payment) {
			$payment->user_id = $receiver->id;
			$payment->save();
		}

		Toastr::success('Se ha realizado la transferencia de cartera exitosamente.', 'TRANSFERENCIA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
		return redirect()->back();
	}

	public function movements()
	{
		$user_allocation = Auth::user();
		$region_allocation = $user_allocation->region;

		$vaults = Vault::all()->sortByDesc('updated_at');;
		$starts_collection = Income::all();
		$starts = $starts_collection->where('concept', 'Saldo Inicial')->sortByDesc('created_at'); 
		$assignments = $starts_collection->where('concept', 'Asignación de efectivo')->sortByDesc('created_at'); 
		$recoverys = IncomePayment::all()->sortByDesc('created_at'); 
		$accesses  = PurseAccess::all()->sortByDesc('created_at'); 
		$credits   = ExpenditureCredit::all()->sortByDesc('created_at'); 
		$expenses  = Expenditure::all()->sortByDesc('created_at');
		$cuts      = BoxCut::all()->sortByDesc('created_at');

		return view('partials.movements')
		->with('region_allocation', $region_allocation)
		->with('vaults', $vaults)
		->with('starts_collection', $starts_collection)
		->with('starts', $starts)
		->with('assignments', $assignments)
		->with('recoverys', $recoverys)
		->with('credits', $credits)
		->with('accesses', $accesses)
		->with('expenses', $expenses)
		->with('cuts', $cuts);
	}

	public function walletExpired()
	{
		$credits = Credit::all();
		return view('credits.wallet_expired')
		->with('credits', $credits);
	}
}
