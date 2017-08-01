<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientReferencesRequest;
use App\Models\ClientReferences;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;

class ClientReferencesController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(Request $request)
	{
		$query = ClientReferences::query();
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

		$clientReferences = $query->get();

		return view('clientReferences.index')
		->with('clientReferences', $clientReferences)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new ClientReferences.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientReferences.create');
	}

	/**
	 * Store a newly created ClientReferences in storage.
	 *
	 * @param CreateClientReferencesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClientReferencesRequest $request)
	{
		$input = $request->all();

		$clientReferences = ClientReferences::create($input);

		Flash::message('ClientReferences saved successfully.');

		return redirect(route('clientReferences.index'));
	}

	/**
	 * Display the specified ClientReferences.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$clientReferences = ClientReferences::find($id);

		if(empty($clientReferences))
		{
			Flash::error('ClientReferences not found');
			return redirect(route('clientReferences.index'));
		}

		return view('clientReferences.show')->with('clientReferences', $clientReferences);
	}

	/**
	 * Show the form for editing the specified ClientReferences.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clientReferences = ClientReferences::find($id);

		if(empty($clientReferences))
		{
			Flash::error('ClientReferences not found');
			return redirect(route('clientReferences.index'));
		}

		return view('clientReferences.edit')->with('clientReferences', $clientReferences);
	}

	/**
	 * Update the specified ClientReferences in storage.
	 *
	 * @param  int    $id
	 * @param CreateClientReferencesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClientReferencesRequest $request)
	{
		/** @var ClientReferences $clientReferences */
		$clientReferences = ClientReferences::find($id);

		if(empty($clientReferences))
		{
			Flash::error('ClientReferences not found');
			return redirect(route('clientReferences.index'));
		}

		$clientReferences->fill($request->all());
		$clientReferences->save();

		Toastr::success('Referencia editada exitosamente.', 'REFERENCIA CLIENTE', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('clients.index'));
	}

	/**
	 * Remove the specified ClientReferences from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var ClientReferences $clientReferences */
		$clientReferences = ClientReferences::find($id);

		if(empty($clientReferences))
		{
			Flash::error('ClientReferences not found');
			return redirect(route('clientReferences.index'));
		}

		$clientReferences->delete();

		Flash::message('ClientReferences deleted successfully.');

		return redirect(route('clientReferences.index'));
	}
}
