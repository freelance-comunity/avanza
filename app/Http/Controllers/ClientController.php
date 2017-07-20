<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientRequest;
use App\Models\Client;
use App\Models\ClientLocation;
use App\Models\ClientCredential;
use App\Models\ClientAval;
use App\Models\Spouse;
use App\Models\ClientCompany;
use App\Models\ClientReferences;
use App\Models\Branch;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Image;

class ClientController extends AppBaseController
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
		$query = Client::query();
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

		$clients = $query->get();

		return view('clients.index')
		->with('clients', $clients)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Client.
	 *
	 * @return Response
	 */
	public function create()
	{
		$branch = Branch::all();
		if ($branch->count()==0) {			
			Toastr::info('Actualmente no se cuenta con sucursales.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('clients.index'));
		}else{
			$branch = Branch::all();
			return view('clients.create')
			->with('branch', $branch);
		}
	}

	/**
	 * Store a newly created Client in storage.
	 *
	 * @param CreateClientRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClientRequest $request)
	{
		
		$input = $request->all();
		/* Save avatar client */
		if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
			$input['avatar'] = $filename;
		}
		$client = Client::create($input);



		/* Get CLIENT location data  */		
		$data_location['street'] = $request->input('street');
		$data_location['number']   = $request->input('number');
		$data_location['colony']  = $request->input('colony');
		$data_location['municipality'] = $request->input('municipality');
		$data_location['state']  = $request->input('state');
		$data_location['postal_code'] = $request->input('postal_code');
		$data_location['references'] = $request->input('references');
		$data_location['latitude'] = $request->input('latitude');
		$data_location['lenght'] = $request->input('lenght');
		$data_location['client_id'] = $client->id;

		$location = ClientLocation::create($data_location);

		/* Get COMPANY  data  */
		$data_company['street_company'] = $request->input('street_company');
		$data_company['number_company'] = $request->input('number_company');
		$data_company['colony_company']  = $request->input('colony_company');
		$data_company['municipality_company'] = $request->input('municipality_company');
		$data_company['state_company']   = $request->input('state_company');
		$data_company['postal_code_company'] = $request->input('postal_code_company');
		$data_company['phone_company'] = $request->input('phone_company');
		$data_company['name_company'] = $request->input('name_company');		
		$data_company['inventory'] = $request->input('inventory');
		$data_company['machinery_equipment'] = $request->input('machinery_equipment');
		$data_company['vehicles'] = $request->input('vehicles');
		$data_company['property'] = $request->input('property');
		$data_company['box_benck'] = $request->input('box_benck');
		$data_company['accounts'] = $request->input('accounts');
		$data_company['suppliers'] = $request->input('suppliers');
		$data_company['credits'] = $request->input('credits');
		$data_company['payments'] = $request->input('payments');
		$data_company['specify'] = $request->input('specify');
		$data_company['weekday'] = $request->input('weekday');
		$data_company['weekend'] = $request->input('weekend');
		$data_company['utility'] = $request->input('utility');
		$data_company['other_income'] = $request->input('other_income');
		$data_company['rent'] = $request->input('rent');
		$data_company['salary'] = $request->input('salary');
		$data_company['others'] = $request->input('others');
		$data_company['latitude_company'] = $request->input('latitude_company');
		$data_company['length_company'] = $request->input('length_company');
		$data_company['client_id'] = $client->id;

		$company = ClientCompany::create($data_company);
		
		/* Get client aval data */
		$data_aval['name_aval'] = $request->input('name_aval');
		$data_aval['last_name_aval'] = $request->input('last_name_aval');
		$data_aval['mothers_name_aval'] = $request->input('mothers_name_aval');
		$data_aval['birthdate_aval'] = $request->input('birthdate_aval');
		$data_aval['curp_aval'] = $request->input('curp_aval');
		$data_aval['phone_aval'] = $request->input('phone_aval');
		$data_aval['civil_status_aval'] = $request->input('civil_status_aval');
		$data_aval['scholarship_aval'] = $request->input('scholarship_aval');
		$data_aval['street_aval'] = $request->input('street_aval');
		$data_aval['number_aval'] = $request->input('number_aval');
		$data_aval['colony_aval'] = $request->input('colony_aval');
		$data_aval['municipality_aval'] = $request->input('municipality_aval');
		$data_aval['state_aval'] = $request->input('state_aval');		
		$data_aval['postal_code_aval'] = $request->input('postal_code_aval');
		$data_aval['client_id'] = $client->id;

		/* Save b aval data */	
		$aval = ClientAval::create($data_aval);




		/* Get REFERENCE data  */
		$date_reference_1['firts_name_reference'] = $request->input('firts_name_reference_1');		
		$date_reference_1['last_name_reference'] = $request->input('last_name_reference_1');
		$date_reference_1['mothers_last_name_reference']   = $request->input('mothers_last_name_reference_1');
		$date_reference_1['phone_reference'] = $request->input('phone_reference_1');
		$date_reference_1['client_id'] = $client->id;

		$reference_1 = ClientReferences::create($date_reference_1);

		$data_reference_2['firts_name_reference'] = $request->input('firts_name_reference_2');		
		$data_reference_2['last_name_reference'] = $request->input('last_name_reference_2');
		$data_reference_2['mothers_last_name_reference']   = $request->input('mothers_last_name_reference_2');
		$data_reference_2['phone_reference'] = $request->input('phone_reference_2');
		$data_reference_2['client_id'] = $client->id;

		$reference_2 = ClientReferences::create($data_reference_2);


		Toastr::success('Cliente creado exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('clients.index'));
	}

	/**
	 * Display the specified Client.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$client = Client::find($id);

		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		return view('clients.show')->with('client', $client);
	}

	/**
	 * Show the form for editing the specified Client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$client = Client::find($id);
		$clientLocation = ClientLocation::find($id);
		$clientcompany = ClientCompany::find($id);
		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		return view('clients.edit')
		->with('client', $client)
		->with('clientLocation',$clientLocation)
		->with('clientcompany',$clientcompany);
	}

	/**
	 * Update the specified Client in storage.
	 *
	 * @param  int    $id
	 * @param CreateClientRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClientRequest $request)
	{
		/** @var Client $client */
		$client = Client::find($id);
		$client->fill($request->all());
		$client->save();
		/* Get CLIENT location data  */		
		$location = ClientLocation::find($id);
		$location->fill($request->all());
		$location->save();
		

		/* Get client credentials data */
		$credential = ClientCredential::find($id);	

		$credential->fill($request->all());
		$credential->save();
		

		/* Get client aval data */
		$aval = ClientAval::find($id);		
		$aval->fill($request->all());
		$aval->save();
		
		/* Get spouse data */
		$spouse = Spouse::find($id);		
		$spouse->fill($request->all());
		$spouse->save();
		

		/* Get COMPANY location data  */
		$company = ClientCompany::find($id);		
		$company->fill($request->all());
		$company->save();
		

		/* Get REFERENCE data  */
		$reference = ClientReferences::find($id);		
		$reference->fill($request->all());
		$reference->save();

		Toastr::info('Cliente editado exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('clients.index'));
	}

	/**
	 * Remove the specified Client from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Client $client */
		$client = Client::find($id);

		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		$client->delete();

		Toastr::success('Cliente eliminado exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('clients.index'));
	}
}
