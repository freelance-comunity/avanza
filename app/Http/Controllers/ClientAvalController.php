<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientAvalRequest;
use App\Models\ClientAval;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;

class ClientAvalController extends AppBaseController
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
		$query = ClientAval::query();
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

		$clientAvals = $query->get();

		return view('clientAvals.index')
		->with('clientAvals', $clientAvals)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new ClientAval.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientAvals.create');
	}

	/**
	 * Store a newly created ClientAval in storage.
	 *
	 * @param CreateClientAvalRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClientAvalRequest $request)
	{
		$input = $request->all();

		$clientAval = ClientAval::create($input);

		Flash::message('ClientAval saved successfully.');

		return redirect(route('clientAvals.index'));
	}

	/**
	 * Display the specified ClientAval.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$clientAval = ClientAval::find($id);

		if(empty($clientAval))
		{
			Flash::error('ClientAval not found');
			return redirect(route('clientAvals.index'));
		}

		return view('clientAvals.show')->with('clientAval', $clientAval);
	}

	/**
	 * Show the form for editing the specified ClientAval.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clientAval = ClientAval::find($id);

		if(empty($clientAval))
		{
			Flash::error('ClientAval not found');
			return redirect(route('clientAvals.index'));
		}

		return view('clientAvals.edit')->with('clientAval', $clientAval);
	}

	/**
	 * Update the specified ClientAval in storage.
	 *
	 * @param  int    $id
	 * @param CreateClientAvalRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClientAvalRequest $request)
	{
		/** @var ClientAval $clientAval */
		$clientAval = ClientAval::find($id);

		if(empty($clientAval))
		{
			Flash::error('ClientAval not found');
			return redirect(route('clientAvals.index'));
		}

		$clientAval->fill($request->all());
		$clientAval->save();

		Toastr::success('Datos del Aval  editado exitosamente.', 'AVAL CLIENTE', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('clients.index'));
	}

	/**
	 * Remove the specified ClientAval from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var ClientAval $clientAval */
		$clientAval = ClientAval::find($id);

		if(empty($clientAval))
		{
			Flash::error('ClientAval not found');
			return redirect(route('clientAvals.index'));
		}

		$clientAval->delete();

		Flash::message('ClientAval deleted successfully.');

		return redirect(route('clientAvals.index'));
	}
}
