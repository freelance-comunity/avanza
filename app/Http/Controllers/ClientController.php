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
use App\Models\Clientdocuments;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Credit;
use App\User;
use App\Models\LatePayments;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Image;
use Auth;
use App\Traits\DatesTranslator;
use \Excel;
use Validator;

class ClientController extends AppBaseController
{	
	use  DatesTranslator;
	public function getSubmitedAtAttribute($created_at)
	{
		return new Date($created_at);
	}
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
		$this->middleware('client',['only'=>['create','creditsClient']]);		
	}

	public function index(Request $request)
	{	
		
		if (Auth::user()->hasRole('director-general')) {
			$clients = Client::all();
		}
		elseif (Auth::user()->hasRole('administrador')) {
			$clients = Client::all();
		}
		elseif (Auth::user()->hasRole('coordinador-regional')) {
			$user_allocation = Auth::user();
			$region_allocation = $user_allocation->region;

			$clients = $region_allocation->clients;		
		}
		elseif (Auth::user()->hasRole('coordinador-sucursal')) {
			$user_allocation = Auth::user();
			$branch_allocation = $user_allocation->branch;

			$clients = $branch_allocation->clients;
		}
		elseif (Auth::user()->hasRole('ejecutivo-de-credito')) {
			$user_allocation = Auth::user();
			$branch_allocation = $user_allocation->branch;

			$clients = $branch_allocation->clients;
		}
		$products =	Product::all();
		return view('clients.index')
		->with('clients', $clients)
		->with('products',$products);
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
		}elseif (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('clients.index'));
		}
		else{
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
	public function store(Request $request)
	{	
		$curp_validate = $request->input('curp');
		// Valitador
		$validator = Validator::make($request->all(), [
			'curp' => 'required|unique:clients,curp',
			'avatar' => 'required|image|mimes:jpeg,png,jpg',
			'proof_of_addres' => 'required|image|mimes:jpeg,png,jpg',
			'ine_document' => 'required|image|mimes:jpeg,png,jpg',
			'curp_document' => 'required|image|mimes:jpeg,png,jpg',
			//COJB820320MCSRRL00
		]);

		if ($validator->fails()) {
			Toastr::error('La CURP: '.$curp_validate.' ya se encuentra registrada en la base de datos ó las imagenes no son validas.', 'CLIENTES', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect()->back();
		}
		//End 
		
		$input = $request->all();
		$branch = Branch::find($request->input('branch_id'));
		$region = $branch->region;
		$input['region_id'] = $region->id;
		/* Save avatar client */
		if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
			$input['avatar'] = $filename;
		}
		$number = Client::max('id') + 1;
		
		$input['folio'] ='CLTE'.$branch->nomenclature.'00'.$number;
		
		$client = Client::create($input);



		/* Get CLIENT location data  */		
		$data_location['street'] = $request->input('street');
		$data_location['number']   = $request->input('number');
		$data_location['colony']  = $request->input('colony');
		$data_location['municipality'] =strtoupper($request->input('municipality'));
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
		$data_company['municipality_company'] = strtoupper($request->input('municipality_company'));
		$data_company['state_company']   = $request->input('state_company');
		$data_company['postal_code_company'] = $request->input('postal_code_company');
		$data_company['phone_company'] = $request->input('phone_company');
		$data_company['name_company'] = $request->input('name_company');		
		$data_company['latitude_company'] = $request->input('latitude_company');
		$data_company['length_company'] = $request->input('length_company');
		$data_company['client_id'] = $client->id;

		$company = ClientCompany::create($data_company);
		
		/* Get client aval data */
		if ($request->input('name_aval')) {
			$data_aval['name_aval'] = $request->input('name_aval');
			$data_aval['last_name_aval'] = $request->input('last_name_aval');
			$data_aval['mothers_name_aval'] = $request->input('mothers_name_aval');
			$data_aval['curp_aval'] = $request->input('curp_aval');
			$data_aval['phone_aval'] = $request->input('phone_aval');
			$data_aval['civil_status_aval'] = $request->input('civil_status_aval');
			$data_aval['scholarship_aval'] = $request->input('scholarship_aval');
			$data_aval['street_aval'] = $request->input('street_aval');
			$data_aval['number_aval'] = $request->input('number_aval');
			$data_aval['colony_aval'] = $request->input('colony_aval');
			$data_aval['municipality_aval'] = strtoupper($request->input('municipality_aval'));
			$data_aval['state_aval'] = $request->input('state_aval');		
			$data_aval['postal_code_aval'] = $request->input('postal_code_aval');
			$data_aval['client_id'] = $client->id;	

			/* Save b aval data */	
			$aval = ClientAval::create($data_aval);
		}
		


		/*=============================================
		=            Save documentation client        =
		=============================================*/
		if($request->hasFile('ine_document')){
			$ine = $request->file('ine_document');
			$filename_ine = time() . '_'.$client->id.'_ine.' . $ine->getClientOriginalExtension();
			Image::make($ine)->resize(600, 600)->save( public_path('/uploads/documents/' . $filename_ine ) );
			$documents['ine'] = $filename_ine;
		}

		if($request->hasFile('curp_document')){
			$curp = $request->file('curp_document');
			$filename_curp = time() . '_'.$client->id.'_curp.' . $curp->getClientOriginalExtension();
			Image::make($curp)->resize(600, 600)->save( public_path('/uploads/documents/' . $filename_curp ) );
			$documents['curp'] = $filename_curp;
		}

		if($request->hasFile('proof_of_addres')){
			$proof_of_addres = $request->file('proof_of_addres');
			$filename_proof_of_addres = time() . '_'.$client->id.'_cfe.' . $proof_of_addres->getClientOriginalExtension();
			Image::make($proof_of_addres)->resize(600, 600)->save( public_path('/uploads/documents/' . $filename_proof_of_addres ) );
			$documents['proof_of_addres'] = $filename_proof_of_addres;
		}
		
		$documents['client_id'] = $client->id;
		$documentation = Clientdocuments::create($documents);
		/*=====  End of Save documentation client  ======*/
		
		Toastr::success('Cliente creado exitosamente.', 'CLIENTE', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('clients.index'))
		->with('client',$client);



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
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('clients.index'));
		}
		$client = Client::find($id);

		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		return view('clients.show')
		->with('client', $client);
	}

	/**
	 * Show the form for editing the specified Client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('clients.index'));
		}
		$client = Client::find($id);
		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		return view('clients.edit')
		->with('client', $client);
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
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('clients.index'));
		}
		/** @var Client $client */
		$client = Client::find($id);
		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		$client->fill($request->all());
		
		$client->save();
		
		Toastr::success('Cliente editado exitosamente.', 'CLIENTE', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

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
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('clients.index'));
		}
		/** @var Client $client */
		$client = Client::find($id);

		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		$client->delete();

		Toastr::success('Cliente eliminado exitosamente.', 'CLIENTE', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('clients.index'));
	}

	public function creditsClient($id, $product)
	{	
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('clients.index'));
		}
		$product = Product::find($product);
		$client = Client::find($id);
		$credit = Credit::find($id);
		$credits = $client->credits;
		//$LatePayments = LatePayments::where('debt_id', $debt->id)->where('status', 'Bloqueado')->count();
		
		// $status = 0;
		// $diario =0;
		// $semanal = 0;
		// foreach ($credits as $value) {
		// 	if ($value->status == 'MINISTRADO') {
		// 		$status ++;
		// 	}
		// 	if ($status == 3) {
		// 		break;
		// 	}
		// }
		// if ($status == 3) {
		// 	Toastr::error('Este cliente ya cuenta con 3 créditos','CRÉDITOS',["positionClass"=>"toast-bottom-right","progressBar"=>"true"]);
		// 	return redirect(route('clients.index'));
		// }



		/*elseif ($LatePayments >=1){
			Toastr::error('Este cliente esta Bloqueado','BLOQUADO',["positionClass"=>"toast-bottom-right","progressBar"=>"true"]);
			return redirect(route('clients.index'));
		}*/
		/*elseif ($diario == 2) {
			Toastr::error('Este cliente ya cuenta con 2 créditos diarios','CRÉDITOS',["positionClass"=>"toast-bottom-right","progressBar"=>"true"]);
			return redirect(route('clients.index'));
		}
		elseif ($semanal = 1) {
			Toastr::error('Este cliente ya cuenta con 1 créditos semanal','CRÉDITOS',["positionClass"=>"toast-bottom-right","progressBar"=>"true"]);
			return redirect(route('clients.index'));
		}*/
		// else{
			return view ('credits.create')
			->with('credits',$credits)
			->with('product', $product)
			->with('client', $client)
			->with('credit',$credit);
		//}
	}

	public function unlockedclient($id)
	{
		$locked = LatePayments::where('debt_id',$id)->where('status','bloqueado')->get();
		foreach ($locked as $value)
		{
			$value->status = "Acreditado";
			$value->save();
		}
		return redirect()->back();
	}

	public function importClients(Request $request)
	{
		\Excel::load($request->excel, function($reader) {

			$excel = $reader->get();

            //iteración
			$reader->each(function($row) {
				$client = new Client;
				$client->folio = $row->folio;
				$client->firts_name = $row->firts_name;
				$client->last_name = $row->last_name;
				$client->mothers_last_name = $row->mothers_last_name;
				$client->curp = $row->curp_txt;
				$client->ine = $row->ine_txt;
				$client->civil_status = $row->civil_status;
				$client->scholarship = $row->scholarship;
				$client->phone = $row->phone;
				$client->no_economic_dependent = $row->no_economic_dependent;
				$client->no_familys = $row->no_familys;
				$client->type_of_housing = $row->type_of_housing;
				$client->avatar = $row->avatar;
				$client->branch_id = $row->branch_id;
				$client->user_id = 14;
				$client->save();

				$location = new ClientLocation;
				$location->street = $row->street;
				$location->number = $row->number;
				$location->colony = $row->colony;
				$location->municipality = $row->municipality;
				$location->state = $row->state;
				$location->postal_code = $row->postal_code;
				$location->references = $row->references;
				$location->latitude = $row->latitude;
				$location->lenght = $row->lenght;
				$location->client_id = $client->id;
				$location->save();

				$company = new ClientCompany;
				$company->street_company = $row->street_company;
				$company->number_company = $row->number_company;
				$company->colony_company = $row->colony_company;
				$company->municipality_company = $row->municipality_company;
				$company->state_company = $row->state_company;
				$company->postal_code_company = $row->postal_code_company;
				$company->phone_company = $row->phone_company;
				$company->name_company = $row->name_company;
				$company->inventory = $row->inventory;
				$company->machinery_equipment = $row->machinery_equipment;
				$company->vehicles = $row->vehicles;
				$company->property = $row->property;
				$company->box_benck = $row->box_benck;
				$company->accounts = $row->accounts;
				$company->suppliers = $row->suppliers;
				$company->credits = $row->credits;
				$company->payments = $row->payments;
				$company->specify = $row->specify;
				$company->weekday = $row->weekday;
				$company->weekend = $row->weekend;
				$company->utility = $row->utility;
				$company->other_income = $row->other_income;
				$company->rent = $row->rent;
				$company->salary = $row->salary;
				$company->others = $row->others;
				$company->latitude_company = $row->latitude_company;
				$company->length_company = $row->length_company;
				$company->client_id = $client->id;
				$company->save();

				$aval = new ClientAval;
				$aval->name_aval = $row->name_aval;
				$aval->last_name_aval = $row->last_name_aval;
				$aval->mothers_name_aval = $row->mothers_name_aval;
				$aval->birthdate_aval = $row->birthdate_aval;
				$aval->curp_aval = $row->curp_aval;
				$aval->phone_aval = $row->phone_aval;
				$aval->civil_status_aval = $row->civil_status_aval;
				$aval->scholarship_aval = $row->scholarship_aval;
				$aval->street_aval = $row->street_aval;
				$aval->number_aval = $row->number_aval;
				$aval->colony_aval = $row->colony_aval;
				$aval->municipality_aval = $row->municipality_aval;
				$aval->state_aval = $row->state_aval;
				$aval->postal_code_aval = $row->postal_code_aval;
				$aval->client_id = $client->id;
				$aval->save();

				$reference_1 = new ClientReferences;
				$reference_1->firts_name_reference = $row->firts_name_reference_1;
				$reference_1->last_name_reference = $row->last_name_reference_1;
				$reference_1->mothers_last_name_reference = $row->mothers_last_name_reference_1;
				$reference_1->phone_reference = $row->phone_reference_1;
				$reference_1->client_id = $client->id;
				$reference_1->save();

				$reference_2 = new ClientReferences;
				$reference_2->firts_name_reference = $row->firts_name_reference_2;
				$reference_2->last_name_reference = $row->last_name_reference_2;
				$reference_2->mothers_last_name_reference = $row->mothers_last_name_reference_2;
				$reference_2->phone_reference = $row->phone_reference_2;
				$reference_2->client_id = $client->id;
				$reference_2->save();

				$documents = new Clientdocuments;
				$documents->ine = $row->ine;
				$documents->curp = $row->curp;
				$documents->proof_of_addres = $row->proof_of_addres;
				$documents->client_id = $client->id;
				$documents->save();


			});

});

Toastr::success('Archivo Excel procesado correctamente.', 'CLIENTES', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

return redirect(route('clients.index'));
}

public function aval($id)
{	
	$client = Client::find($id);

	if(empty($payment))
	{
		Flash::error('client not found');
		return redirect(route('client.index'));
	}	

	$data_aval['name_aval'] = $request->input('name_aval');
	$data_aval['last_name_aval'] = $request->input('last_name_aval');
	$data_aval['mothers_name_aval'] = $request->input('mothers_name_aval');
	$data_aval['curp_aval'] = $request->input('curp_aval');
	$data_aval['phone_aval'] = $request->input('phone_aval');
	$data_aval['civil_status_aval'] = $request->input('civil_status_aval');
	$data_aval['scholarship_aval'] = $request->input('scholarship_aval');
	$data_aval['street_aval'] = $request->input('street_aval');
	$data_aval['number_aval'] = $request->input('number_aval');
	$data_aval['colony_aval'] = $request->input('colony_aval');
	$data_aval['municipality_aval'] = strtoupper($request->input('municipality_aval'));
	$data_aval['state_aval'] = $request->input('state_aval');		
	$data_aval['postal_code_aval'] = $request->input('postal_code_aval');
	$data_aval['client_id'] = $client->id;	

	/* Save b aval data */	
	$aval = ClientAval::create($data_aval);
	return redirect()->back();	
}

public function avalClient($id)
{
	$client = Client::find($id);
	$clientAval = $client->clientAval;
	if (empty($clientAval)) {
		return view ('clientAvals.create')
		->with('client', $client);
	}
	else
	{
		Toastr::error('Este cliente ya cuenta con 3 créditos','CRÉDITOS',["positionClass"=>"toast-bottom-right","progressBar"=>"true"]);
		return redirect(route('client.show', [$client->id])); 
	}

}


}


