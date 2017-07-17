<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientLocationRequest;
use App\Models\ClientLocation;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class ClientLocationController extends AppBaseController
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
		$query = ClientLocation::query();
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

        $clientLocations = $query->get();

        return view('clientLocations.index')
            ->with('clientLocations', $clientLocations)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new ClientLocation.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientLocations.create');
	}

	/**
	 * Store a newly created ClientLocation in storage.
	 *
	 * @param CreateClientLocationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClientLocationRequest $request)
	{
        $input = $request->all();

		$clientLocation = ClientLocation::create($input);

		Flash::message('ClientLocation saved successfully.');

		return redirect(route('clientLocations.index'));
	}

	/**
	 * Display the specified ClientLocation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$clientLocation = ClientLocation::find($id);

		if(empty($clientLocation))
		{
			Flash::error('ClientLocation not found');
			return redirect(route('clientLocations.index'));
		}

		return view('clientLocations.show')->with('clientLocation', $clientLocation);
	}

	/**
	 * Show the form for editing the specified ClientLocation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clientLocation = ClientLocation::find($id);

		if(empty($clientLocation))
		{
			Flash::error('ClientLocation not found');
			return redirect(route('clientLocations.index'));
		}

		return view('clientLocations.edit')->with('clientLocation', $clientLocation);
	}

	/**
	 * Update the specified ClientLocation in storage.
	 *
	 * @param  int    $id
	 * @param CreateClientLocationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClientLocationRequest $request)
	{
		/** @var ClientLocation $clientLocation */
		$clientLocation = ClientLocation::find($id);

		if(empty($clientLocation))
		{
			Flash::error('ClientLocation not found');
			return redirect(route('clientLocations.index'));
		}

		$clientLocation->fill($request->all());
		$clientLocation->save();

		Flash::message('ClientLocation updated successfully.');

		return redirect(route('clientLocations.index'));
	}

	/**
	 * Remove the specified ClientLocation from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var ClientLocation $clientLocation */
		$clientLocation = ClientLocation::find($id);

		if(empty($clientLocation))
		{
			Flash::error('ClientLocation not found');
			return redirect(route('clientLocations.index'));
		}

		$clientLocation->delete();

		Flash::message('ClientLocation deleted successfully.');

		return redirect(route('clientLocations.index'));
	}
}
