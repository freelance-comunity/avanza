<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCreditRequest;
use App\Models\Credit;
use App\Models\Client;
use App\Models\Debt;
use App\Models\Payment;
use App\Models\Product;
use App\Models\LatePayments;
use App\Models\ClientLocation;
use App\Models\ClientReferences;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Carbon\Carbon;
use Auth;
use App\Models\Expenditure;



class CreditController extends AppBaseController
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
		if (Auth::user()->hasRole('administrador')) {
			$credits = Credit::all();
		}
		else
		{
			$credits = Auth::user()->credits;
		}

		return view('credits.index')
		->with('credits', $credits);
	}

	/**
	 * Show the form for creating a new Credit.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('credits.create');
		
	}

	/**
	 * Store a newly created Credit in storage.
	 *
	 * @param CreateCreditRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCreditRequest $request)
	{	
		$ammount = $request->input('ammount');
		$user = Auth::user();
		$vault = $user->vault;	
		if ($vault->ammount == 0) {
			Toastr::error('Aún no puedes comenzar tu día, ya que no dispones de efectivo.', 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('credits.index'));
		}
		else
		{
			if ($vault->ammount < $ammount) {
				Toastr::error('Ya no tienes saldo suficiente en tu caja.', 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				return redirect(route('credits.index'));
			}
			else
			{
				/* Get signature */
				$data_uri = $request->input('firm');
				$encoded_image = explode(",", $data_uri)[1];
				$decoded_image = base64_decode($encoded_image);
				$url = 'signature'. '-id-'. $request->input('client_id') . rand(111,9999).'.png';

				file_put_contents('../public/uploads/signatures/' . $url, $decoded_image);
				/* End get signature */

				$client = Client::find($request->input('client_id'));
				$input = $request->all();
				$product = Product::find($request->input('type_product'));
				if ($request->input('ammount') > $product->ammount_max) {
					Toastr::warning('El monto máximo es de: ' .$product->ammount_max, 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);		
					return redirect()->back()->withInput($request->all());
				}elseif ($request->input('ammount') < $product->ammount_min) {
					Toastr::warning('El monto mínimo es de: '.$product->ammount_min, 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);			
					return redirect()->back()->withInput($request->all());
				}
				elseif ($request->input('ammount') > $client->maximun_amount) {
					Toastr::warning('EL monto máximo de este cliente es: '.$client->maximun_amount,  'CLIENTE', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);			
					return redirect()->back()->withInput($request->all());
				}
				$number = Credit::max('id') + 1;
				$input['folio'] = $request->input('state').$request->input('branch').'00'.$number;	
				$input['civil_status'] = $client->civil_status;
				$input['phone'] = $client->phone;
				$input['no_familys'] = $client->no_familys;
				$input['type_of_housing'] = $client->type_of_housing;
				$input['street'] = $client->location->street;
				$input['number'] = $client->location->number;
				$input['colony'] = $client->location->colony;
				$input['municipality'] = $client->location->municipality;
				$input['state'] = $client->location->state;
				$input['postal_code'] = $client->location->postal_code;
				$input['references'] = $client->location->references;
				$input['street_company'] = $client->company->street_company;
				$input['number_company'] = $client->company->number_company;
				$input['colony_company'] = $client->company->colony_company;
				$input['municipality_company'] = $client->company->municipality_company;
				$input['state_company'] = $client->company->state_company;
				$input['postal_code_company'] = $client->company->postal_code_company;
				$input['phone_company'] = $client->company->phone_company;
				$input['name_company'] = $client->company->name_company;
				if (count($client->aval) > 0) {
					$input['name_aval'] = $client->aval->name_aval;
					$input['last_name_aval'] = $client->aval->last_name_aval;
					$input['mothers_name_aval'] = $client->aval->mothers_name_aval;
					$input['curp_aval'] = $client->aval->curp_aval;
					$input['phone_aval'] = $client->aval->phone_aval;
					$input['civil_status_aval'] = $client->aval->civil_status_aval;
					$input['scholarship_aval'] = $client->aval->scholarship_aval;
					$input['street_aval'] = $client->aval->street_aval;
					$input['number_aval'] = $client->aval->number_aval;
					$input['colony_aval'] = $client->aval->colony_aval;
					$input['municipality_aval'] = $client->aval->municipality_aval;
					$input['state_aval'] = $client->aval->state_aval;
					$input['postal_code_aval'] = $client->aval->postal_code_aval;
				}
				
					
			

				$input['firm']   = $url;
				$input['status'] = "MINISTRADO";


				$credit = Credit::create($input);

				$ammount= $credit->ammount;
				$dues = $credit->dues;
				$periodicity = $credit->periodicity;
				if ($periodicity == 'DIARIO' && $dues == 30) {
					$tasa = 0.17;
				}elseif ($periodicity == 'DIARIO' && $dues == 60) {
					$tasa = 0.17;
				}elseif ($periodicity == 'DIARIO' && $dues == 25) {
					$tasa = 0.15;
				}elseif ($periodicity == 'DIARIO' && $dues == 52) {
					$tasa = 0.15;
				}elseif ($periodicity == 'SEMANAL') {
					$tasa = 0.15;
				}
				$interes = $ammount*$tasa;
				$capital = $ammount/$dues;
				$total = $ammount + $interes;
				$pago = $total/$dues;
				$intpago = $pago-$capital;
				$date = new Carbon($credit->date);
				if ($periodicity == 'DIARIO' && $dues == 30) {
					$debt = new Debt;
					$debt->ammount = $credit->ammount + $interes;
					$debt->status = "Pendiente";
					$debt->credit_id = $credit->id;
					$debt->save();

					for ($i=1; $i <= $credit->dues; $i++) { 
						$var = $date->addDay();

						$fechaPago[$i] = $date->toDateString();
						$payment = new Payment;
						$payment->number = $i;
						$payment->day = $fechaPago[$i];
						$payment->date =$fechaPago[$i];
						$payment->ammount = ceil($pago);
						$payment->capital = ceil($capital);
						$payment->interest= $intpago;
						$payment->moratorium = '0';
						$payment->total = ceil($pago) + 0; 
						$payment->payment = 0;
						$payment->balance = ceil($pago) + 0;
						$payment->status = "Pendiente";
						$payment->debt_id = $debt->id;
						$payment->user_id = Auth::User()->id;
						$payment->branch_id = Auth::User()->branch_id;
						$payment->save();

					}
				}
				if ($periodicity == 'DIARIO' && $dues == 25) {
					$debt = new Debt;
					$debt->ammount = $credit->ammount +  $interes;
					$debt->status = "Pendiente";
					$debt->credit_id = $credit->id;
					$debt->save();

					for ($i=1; $i <= $credit->dues; $i++) { 
						$var = $date->addDay();
						if ($date->dayOfWeek === \Carbon\Carbon::SUNDAY) {
							$date->addDay(); 
						}

						$fechaPago[$i] = $date->toDateString();
						$payment = new Payment;
						$payment->number = $i;
						$payment->day = $fechaPago[$i];
						$payment->date =$fechaPago[$i];
						$payment->ammount = ceil($pago);
						$payment->capital = ceil($capital);
						$payment->interest= $intpago;
						$payment->moratorium = '0';
						$payment->total = ceil($pago) + 0; 
						$payment->payment = 0;
						$payment->balance = ceil($pago) + 0;
						$payment->status = "Pendiente";
						$payment->debt_id = $debt->id;
						$payment->user_id = Auth::User()->id;
						$payment->branch_id = Auth::User()->branch_id;
						$payment->save();

					}
				}
				if ($periodicity == 'DIARIO' && $dues == 52) {
					$debt = new Debt;
					$debt->ammount = $credit->ammount + $interes; 
					$debt->status = "Pendiente";
					$debt->credit_id = $credit->id;
					$debt->save();


					for ($i=1; $i <= $credit->dues; $i++) { 
						$var = $date->addDay();
						if ($date->dayOfWeek === \Carbon\Carbon::SUNDAY) {
							$date->addDay(); 
						}

						$fechaPago[$i] = $date->toDateString();
						$payment = new Payment;
						$payment->number = $i;
						$payment->day = $fechaPago[$i];
						$payment->date =$fechaPago[$i];
						$payment->ammount = ceil($pago);
						$payment->capital = ceil($capital);
						$payment->interest= $intpago;
						$payment->moratorium = '0';
						$payment->total = ceil($pago) + 0;
						$payment->payment = 0;
						$payment->balance = ceil($pago) + 0; 
						$payment->status = "Pendiente";
						$payment->debt_id = $debt->id;
						$payment->user_id = Auth::User()->id;
						$payment->branch_id = Auth::User()->branch_id;
						$payment->save();

					}
				}
				if ($periodicity == 'DIARIO' && $dues == 60) {
					$debt = new Debt;
					$debt->ammount = $credit->ammount + $interes;
					$debt->status = "Pendiente";
					$debt->credit_id = $credit->id;
					$debt->save();


					for ($i=1; $i <= $credit->dues; $i++) { 
						$var = $date->addDay();

						$fechaPago[$i] = $date->toDateString();
						$payment = new Payment;
						$payment->number = $i;
						$payment->day = $fechaPago[$i];
						$payment->date =$fechaPago[$i];
						$payment->ammount = ceil($pago);
						$payment->capital = ceil($capital);
						$payment->interest= $intpago;
						$payment->moratorium = '0';
						$payment->total = ceil($pago) + 0;
						$payment->payment = 0;
						$payment->balance = ceil($pago) + 0; 
						$payment->status = "Pendiente";
						$payment->debt_id = $debt->id;
						$payment->user_id = Auth::User()->id;
						$payment->branch_id = Auth::User()->branch_id;
						$payment->save();

					}
				}
				if ($periodicity == 'SEMANAL') {
					$debt = new Debt;
					$debt->ammount = $credit->ammount + $interes;
					$debt->status = "Pendiente";
					$debt->credit_id = $credit->id;
					$debt->save();


					for ($i=1; $i <= $credit->dues; $i++) { 
						$var = $date->addWeek();

						$fechaPago[$i] = $date->toDateString();
						$payment = new Payment;
						$payment->number = $i;
						$payment->day = $date;
						$payment->date =$fechaPago[$i];
						$payment->ammount = ceil($pago);
						$payment->capital = ceil($capital);
						$payment->interest= $intpago;
						$payment->moratorium = '0';
						$payment->total = ceil($pago) + 0; 
						$payment->payment = 0;
						$payment->balance = ceil($pago) + 0;
						$payment->status = "Pendiente";
						$payment->debt_id = $debt->id;
						$payment->user_id = Auth::User()->id;
						$payment->branch_id = Auth::User()->branch_id;
						$payment->save();

					}
				}

				$data_expenditure['ammount'] = $ammount;
				$data_expenditure['concept'] = 'Colocación';
				$data_expenditure['voucher'] = 'Sin comprobante';
				$data_expenditure['vault_id'] = $vault->id;

				$expenditure = Expenditure::create($data_expenditure);

				$vault->ammount = $vault->ammount - $expenditure->ammount;
				$vault->save();

				Toastr::success('Solicitud creada exitosamente.', 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				return redirect(route('credits.index'));
			}
		}
	}

	/**
	 * Display the specified Credit.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('credits.index'));
		}
		$credit = Credit::find($id);

		if(empty($credit))
		{
			Flash::error('Credit not found');
			return redirect(route('credits.index'));
		}

		return view('credits.show')->with('credit', $credit);
	}

	/**
	 * Show the form for editing the specified Credit.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$credit = Credit::find($id);

		if(empty($credit))
		{
			Flash::error('Credit not found');
			return redirect(route('credits.index'));
		}

		return view('credits.edit')->with('credit', $credit);
	}

	/**
	 * Update the specified Credit in storage.
	 *
	 * @param  int    $id
	 * @param CreateCreditRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCreditRequest $request)
	{
		/** @var Credit $credit */
		$credit = Credit::find($id);

		if(empty($credit))
		{
			Flash::error('Credit not found');
			return redirect(route('credits.index'));
		}

		$credit->fill($request->all());
		$credit->save();

		Flash::message('Credit updated successfully.');

		return redirect(route('credits.index'));
	}

	/**
	 * Remove the specified Credit from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Credit $credit */
		$credit = Credit::find($id);

		if(empty($credit))
		{
			Flash::error('Credit not found');
			return redirect(route('credits.index'));
		}

		$credit->delete();

		Flash::message('Credit deleted successfully.');

		return redirect(route('credits.index'));
	}
	public function renovation(Request $request)
	{
		$credit = new Credit;
		$input = $request->all();
		$credit->save();
	}
}