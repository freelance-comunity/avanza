<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Models\Vault;
use App\Models\Income;
use Toastr;
use Validator;

class GeneralController extends Controller
{
	public function getPromoter()
	{	
		$role = Role::find(4);
		$users = $role->users;
		
		return view('executives.index')
		->with('employees', $users);
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


		return view('executives.showVault')
		->with('user', $user)
		->with('vault', $vault)
		->with('incomes', $incomes)
		->with('si', $si)
		->with('rc', $rc)
		->with('af', $af)
		->with('expenditures', $expenditures)
		->with('c', $c);
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
}
