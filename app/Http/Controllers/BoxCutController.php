<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBoxCutRequest;
use App\Models\BoxCut;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Validator;
use App\Models\Vault;
use Auth;

class BoxCutController extends AppBaseController
{
	public function getPromoter()
	{	
		$role = Role::find(4);
		$users = $role->users;
		
		return view('boxCuts.index')
		->with('employees', $users);
	}


	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = BoxCut::query();
		$columns = Schema::getColumnListing('$TABLE_NAME$');
		$attributes = array();

		foreach($columns as $attribute){
			if($request[$attribute] == true)
			{
				$query->where($attribute, $request[$attribute]);
				$attributes[$attribute] =  $request[$attribute];
			}else{
				$attributes[$attribute] =  null;
			}
		};

		$boxCuts = $query->get();

		return view('boxCuts.index')
		->with('boxCuts', $boxCuts)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new BoxCut.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('boxCuts.create');
	}

	/**
	 * Store a newly created BoxCut in storage.
	 *
	 * @param CreateBoxCutRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBoxCutRequest $request)
	{
		$input = $request->all();

		$boxCut = BoxCut::create($input);

		Flash::message('BoxCut saved successfully.');

		return redirect(route('boxCuts.index'));
	}

	/**
	 * Display the specified BoxCut.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$boxCut = BoxCut::find($id);

		if(empty($boxCut))
		{
			Flash::error('BoxCut not found');
			return redirect(route('boxCuts.index'));
		}

		return view('boxCuts.show')->with('boxCut', $boxCut);
	}

	/**
	 * Show the form for editing the specified BoxCut.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$boxCut = BoxCut::find($id);

		if(empty($boxCut))
		{
			Flash::error('BoxCut not found');
			return redirect(route('boxCuts.index'));
		}

		return view('boxCuts.edit')->with('boxCut', $boxCut);
	}

	/**
	 * Update the specified BoxCut in storage.
	 *
	 * @param  int    $id
	 * @param CreateBoxCutRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateBoxCutRequest $request)
	{
		/** @var BoxCut $boxCut */
		$boxCut = BoxCut::find($id);

		if(empty($boxCut))
		{
			Flash::error('BoxCut not found');
			return redirect(route('boxCuts.index'));
		}

		$boxCut->fill($request->all());
		$boxCut->save();

		Flash::message('BoxCut updated successfully.');

		return redirect(route('boxCuts.index'));
	}

	/**
	 * Remove the specified BoxCut from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var BoxCut $boxCut */
		$boxCut = BoxCut::find($id);

		if(empty($boxCut))
		{
			Flash::error('BoxCut not found');
			return redirect(route('boxCuts.index'));
		}

		$boxCut->delete();

		Flash::message('BoxCut deleted successfully.');

		return redirect(route('boxCuts.index'));
	}
	public function showbox($id)
	{
		$user = User::find($id);
		$vault = $user->vault;

		

		return view('boxCuts.show')
		->with('user', $user)
		->with('vault', $vault);
	}
	public function cut(Request $request)
	{	
		$validator = Validator::make($request->all(), [
			'amount' => 'required|numeric',	
		]);

		if ($validator->fails()) {
			Toastr::error('Favor de introducir cantidad valida.', 'CORTE DE CAJA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
		
		$user = User::find($request->input('user_id'));
		$vault = $user->vault;

		$data_boxcut['amount'] = $request->input('amount');
		$data_boxcut['vault_id'] = $vault->id;
		$data_boxcut['user_id'] = $user->id;
		$boxCut = BoxCut::create($data_boxcut);

		// $mil = $boxCut->bills_1000 * 1000;
		// $quinientos = $boxCut->bills_500 * 500;
		// $doscientos = $boxCut->bills_200 * 200;
		// $cien  = $boxCut->bills_100 * 100;
		// $cincuenta = $boxCut->bills_50 * 50;
		// $veinte = $boxCut->bills_20 * 20;
		// $diez = $boxCut->coin_10 * 10;
		// $cinco = $boxCut->coin_5 * 5;
		// $dos = $boxCut->coin_2 * 2;
		// $peso = $boxCut->coin_1 * 1;
		// $centavo = $boxCut->cents_50 * 0.50;

		$rest = $boxCut->amount; 
		if ($rest > $vault->ammount) {
			Toastr::error('Estas introduciendo una cantidad mayor a tu saldo a liquidar.', 'CORTE DE CAJA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
		}
		else{	
			$vault->ammount = $vault->ammount - $rest; 
			$vault->save();
			if($vault->ammount == 0) {
				Toastr::success('Corte de caja realizado exitosamente.', 'CORTE DE CAJA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

				$user_collector = Auth::user();
				$vault_collector = $user_collector->vault;
				$vault_collector->ammount = $vault_collector->ammount + $rest;
				$vault_collector->save();
			}else{
				Toastr::info('Te falta $'.number_format($vault->ammount,2).' pesos para realizar el corte de caja', 'CORTE DE CAJA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				$user_collector = Auth::user();
				$vault_collector = $user_collector->vault;
				$vault_collector->ammount = $vault_collector->ammount + $rest;
				$vault_collector->save();
			}
		}
		return redirect()->back();
	}
}
