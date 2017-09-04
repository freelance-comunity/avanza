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

class GeneralController extends Controller
{
	public function getPromoter()
	{	
		if (Auth::user()->hasRole('administrador')) {
			$role = Role::find(4);
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
		$user = User::find($id);
		$vault = $user->vault;
		$incomes = $vault->incomes;
		$si = $incomes->where('concept', 'Saldo Inicial');
		$rc = $incomes->where('concept', 'Recuperación');
		$af = $incomes->where('concept', 'Asignación de efectivo');

		$expenditures = $vault->expenditures;
		$c = $expenditures->where('concept', 'Colocación');
		$g = $expenditures->where('concept', 'Gasto');


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
		$data_income['concept'] = 'Saldo Inicial';
		$data_income['vault_id'] = $vault->id;
		$income = Income::create($data_income);

		$vault->ammount = $vault->ammount + $income->ammount;
		$vault->save();

		Toastr::success('Saldo inicial agregado exitosamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect()->back();
	}

	public function addCash(Request $request)
	{	
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
		$data_income['vault_id'] = $vault->id;
		$income = Income::create($data_income);

		$vault->ammount = $vault->ammount + $income->ammount;
		$vault->save();

		Toastr::success('Asignación de efectivo exitoso.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect()->back();
	}

	public function recordExpense(Request $request)
	{
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
			Image::make($voucher)->resize(300, 300)->save(public_path('/uploads/voucher' . $filename));
		}

		$ammount = $request->input('ammount');
		$concept = $request->input('concept');
		$user = Auth::user();
		$vault = $user->vault;	
		$data_expenditure['ammount'] = $ammount;
		$data_expenditure['concept'] = 'Gasto';
		$data_expenditure['voucher'] = $filename;
		$data_expenditure['vault_id'] = $vault->id;

		$expenditure = Expenditure::create($data_expenditure);

		$vault->ammount = $vault->ammount - $expenditure->ammount;
		$vault->save();

		Toastr::success('Gasto agregado exitosamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect()->back();
	}
}
