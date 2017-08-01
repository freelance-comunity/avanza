<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientCompanyRequest;
use App\Models\ClientCompany;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;

class ClientCompanyController extends AppBaseController
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
		$query = ClientCompany::query();
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

        $clientCompanies = $query->get();

        return view('clientCompanies.index')
            ->with('clientCompanies', $clientCompanies)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new ClientCompany.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientCompanies.create');
	}

	/**
	 * Store a newly created ClientCompany in storage.
	 *
	 * @param CreateClientCompanyRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClientCompanyRequest $request)
	{
        $input = $request->all();

		$clientCompany = ClientCompany::create($input);

		Flash::message('ClientCompany saved successfully.');

		return redirect(route('clientCompanies.index'));
	}

	/**
	 * Display the specified ClientCompany.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$clientCompany = ClientCompany::find($id);

		if(empty($clientCompany))
		{
			Flash::error('ClientCompany not found');
			return redirect(route('clientCompanies.index'));
		}

		return view('clientCompanies.show')->with('clientCompany', $clientCompany);
	}

	/**
	 * Show the form for editing the specified ClientCompany.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clientCompany = ClientCompany::find($id);

		if(empty($clientCompany))
		{
			Flash::error('ClientCompany not found');
			return redirect(route('clientCompanies.index'));
		}

		return view('clientCompanies.edit')->with('clientCompany', $clientCompany);
	}

	/**
	 * Update the specified ClientCompany in storage.
	 *
	 * @param  int    $id
	 * @param CreateClientCompanyRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClientCompanyRequest $request)
	{
		/** @var ClientCompany $clientCompany */
		$clientCompany = ClientCompany::find($id);

		if(empty($clientCompany))
		{
			Flash::error('ClientCompany not found');
			return redirect(route('clientCompanies.index'));
		}

		$clientCompany->fill($request->all());
		$clientCompany->save();

		Toastr::success('Datos del Negocio  editado exitosamente.', 'NEGOCIO CLIENTE', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('clients.index'));
	}

	/**
	 * Remove the specified ClientCompany from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var ClientCompany $clientCompany */
		$clientCompany = ClientCompany::find($id);

		if(empty($clientCompany))
		{
			Flash::error('ClientCompany not found');
			return redirect(route('clientCompanies.index'));
		}

		$clientCompany->delete();

		Flash::message('ClientCompany deleted successfully.');

		return redirect(route('clientCompanies.index'));
	}
}
