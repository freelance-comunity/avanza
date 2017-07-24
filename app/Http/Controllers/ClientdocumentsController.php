<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientdocumentsRequest;
use App\Models\Clientdocuments;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;

class ClientdocumentsController extends AppBaseController
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
		$query = Clientdocuments::query();
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

		$clientdocuments = $query->get();

		return view('clientdocuments.index')
		->with('clientdocuments', $clientdocuments)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Clientdocuments.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientdocuments.create');
	}

	/**
	 * Store a newly created Clientdocuments in storage.
	 *
	 * @param CreateClientdocumentsRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClientdocumentsRequest $request)
	{
		$input = $request->all();

		$clientdocuments = Clientdocuments::create($input);

		Flash::message('Clientdocuments saved successfully.');

		return redirect(route('clientdocuments.index'));
	}

	/**
	 * Display the specified Clientdocuments.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$clientdocuments = Clientdocuments::find($id);

		if(empty($clientdocuments))
		{
			Flash::error('Clientdocuments not found');
			return redirect(route('clientdocuments.index'));
		}

		return view('clientdocuments.show')->with('clientdocuments', $clientdocuments);
	}

	/**
	 * Show the form for editing the specified Clientdocuments.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clientdocuments = Clientdocuments::find($id);

		if(empty($clientdocuments))
		{
			Flash::error('Clientdocuments not found');
			return redirect(route('clientdocuments.index'));
		}

		return view('clientdocuments.edit')->with('clientdocuments', $clientdocuments);
	}

	/**
	 * Update the specified Clientdocuments in storage.
	 *
	 * @param  int    $id
	 * @param CreateClientdocumentsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClientdocumentsRequest $request)
	{
		/** @var Clientdocuments $clientdocuments */
		$clientdocuments = Clientdocuments::find($id);

		if(empty($clientdocuments))
		{
			Flash::error('Clientdocuments not found');
			return redirect(route('clientdocuments.index'));
		}

		$clientdocuments->fill($request->all());
		
		$clientdocuments->save();

		Toastr::success('Documentos editados exitosamente.', 'DOCUMENTOS CLIENTE', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('clients.index'));
	}

	/**
	 * Remove the specified Clientdocuments from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Clientdocuments $clientdocuments */
		$clientdocuments = Clientdocuments::find($id);

		if(empty($clientdocuments))
		{
			Flash::error('Clientdocuments not found');
			return redirect(route('clientdocuments.index'));
		}

		$clientdocuments->delete();

		Flash::message('Clientdocuments deleted successfully.');

		return redirect(route('clientdocuments.index'));
	}
}
