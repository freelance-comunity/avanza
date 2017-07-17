<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientCredentialRequest;
use App\Models\ClientCredential;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class ClientCredentialController extends AppBaseController
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
		$query = ClientCredential::query();
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

        $clientCredentials = $query->get();

        return view('clientCredentials.index')
            ->with('clientCredentials', $clientCredentials)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new ClientCredential.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientCredentials.create');
	}

	/**
	 * Store a newly created ClientCredential in storage.
	 *
	 * @param CreateClientCredentialRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClientCredentialRequest $request)
	{
        $input = $request->all();

		$clientCredential = ClientCredential::create($input);

		Flash::message('ClientCredential saved successfully.');

		return redirect(route('clientCredentials.index'));
	}

	/**
	 * Display the specified ClientCredential.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$clientCredential = ClientCredential::find($id);

		if(empty($clientCredential))
		{
			Flash::error('ClientCredential not found');
			return redirect(route('clientCredentials.index'));
		}

		return view('clientCredentials.show')->with('clientCredential', $clientCredential);
	}

	/**
	 * Show the form for editing the specified ClientCredential.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clientCredential = ClientCredential::find($id);

		if(empty($clientCredential))
		{
			Flash::error('ClientCredential not found');
			return redirect(route('clientCredentials.index'));
		}

		return view('clientCredentials.edit')->with('clientCredential', $clientCredential);
	}

	/**
	 * Update the specified ClientCredential in storage.
	 *
	 * @param  int    $id
	 * @param CreateClientCredentialRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClientCredentialRequest $request)
	{
		/** @var ClientCredential $clientCredential */
		$clientCredential = ClientCredential::find($id);

		if(empty($clientCredential))
		{
			Flash::error('ClientCredential not found');
			return redirect(route('clientCredentials.index'));
		}

		$clientCredential->fill($request->all());
		$clientCredential->save();

		Flash::message('ClientCredential updated successfully.');

		return redirect(route('clientCredentials.index'));
	}

	/**
	 * Remove the specified ClientCredential from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var ClientCredential $clientCredential */
		$clientCredential = ClientCredential::find($id);

		if(empty($clientCredential))
		{
			Flash::error('ClientCredential not found');
			return redirect(route('clientCredentials.index'));
		}

		$clientCredential->delete();

		Flash::message('ClientCredential deleted successfully.');

		return redirect(route('clientCredentials.index'));
	}
}
