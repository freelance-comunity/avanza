<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Models\Vault;
use App\Models\Income;
use App\Models\Expenditure;
use Toastr;
use Validator;
use Auth;
use Image;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class GeneralController extends Controller
{	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getPromoter()
	{	
		if (Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional', 'coordinador-sucursal'])) {
			$collection = Role::all();
			$role = $collection->where('name', 'ejecutivo-de-credito')->first();
			$users = $role->users;

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
		$rc = $incomes->where('concept', 'Recuperación')->where('date', $current);
		$af = $incomes->where('concept', 'Asignación de efectivo')->where('date', $current);

		$expenditures = $vault->expenditures->where('date', $current);
		$c = $expenditures->where('concept', 'Colocación')->where('date', $current);
		$g = $expenditures->where('concept', 'Gasto')->where('date', $current);


		return view('executives.showVault')
		->with('user', $user)
		->with('vault', $vault)
		->with('incomes', $incomes)
		->with('si', $si)
		->with('rc', $rc)
		->with('af', $af)
		->with('expenditures', $expenditures)
		->with('c', $c)
		->with('g', $g);
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

		if ($validator->fails()) {
			Toastr::error('Favor de introducir cantidad valida.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

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
			$data_expenditure['vault_id'] = $vault->id;

			$expenditure = Expenditure::create($data_expenditure);

			$vault->ammount = $vault->ammount - $expenditure->ammount;
			$vault->save();

			Toastr::success('Gasto agregado exitosamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
	}
}
