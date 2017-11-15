<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRetreatRequest;
use App\Models\Retreat;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Validator;
use App\User;
use App\Models\Vault;

class RetreatController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = Retreat::query();
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

		$retreats = $query->get();

		return view('retreats.index')
		->with('retreats', $retreats)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Retreat.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('retreats.create');
	}

	/**
	 * Store a newly created Retreat in storage.
	 *
	 * @param CreateRetreatRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRetreatRequest $request)
	{

		$validator = Validator::make($request->all(), [
			'ammount' => 'required|numeric',	
		]);

		if ($validator->fails()) {
			Toastr::error('Favor de introducir cantidad valida.', 'CARTERA ACCESS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
		$user = User::find($request->input('user_id'));
		$vault = $user->vault;
		if ($vault->ammount < $request->input('ammount')) {
			Toastr::error('No cuentas con el dinero suficiente para retirar $'.number_format($request->input('ammount')), 'RETIRO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
		elseif ($request->input('ammount') < 0) {
			Toastr::error('No puedes retirar esa cantidad', 'RETIRO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
		$data_retreat['ammount'] = $request->input('ammount');
		$data_retreat['vault_id'] = $vault->id;
		$data_retreat['user_id'] = $user->id;
		// $data_retreat['branch_id'] = $user->branch_id;
		// $data_retreat['region_id'] = $user->region_id;
		$retreat = Retreat::create($data_retreat);

		$vault->ammount = $vault->ammount - $retreat->ammount;
		$vault->save();
		Toastr::success('Monto retirado exitosamente.', 'RETIRO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect()->back();
	}

	/**
	 * Display the specified Retreat.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		$retreats = $user->retreats;

		if(empty($retreats))
		{
			Flash::error('Retreat not found');
			return redirect(route('retreats.index'));
		}

		return view('retreats.show')
		->with('retreats', $retreats)
		->with('user',$user);
	}

	/**
	 * Show the form for editing the specified Retreat.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$retreat = Retreat::find($id);

		if(empty($retreat))
		{
			Flash::error('Retreat not found');
			return redirect(route('retreats.index'));
		}

		return view('retreats.edit')->with('retreat', $retreat);
	}

	/**
	 * Update the specified Retreat in storage.
	 *
	 * @param  int    $id
	 * @param CreateRetreatRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateRetreatRequest $request)
	{
		/** @var Retreat $retreat */
		$retreat = Retreat::find($id);

		if(empty($retreat))
		{
			Flash::error('Retreat not found');
			return redirect(route('retreats.index'));
		}

		$retreat->fill($request->all());
		$retreat->save();

		Flash::message('Retreat updated successfully.');

		return redirect(route('retreats.index'));
	}

	/**
	 * Remove the specified Retreat from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Retreat $retreat */
		$retreat = Retreat::find($id);

		if(empty($retreat))
		{
			Flash::error('Retreat not found');
			return redirect(route('retreats.index'));
		}

		$retreat->delete();

		Flash::message('Retreat deleted successfully.');

		return redirect(route('retreats.index'));
	}
}
