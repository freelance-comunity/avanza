<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePaymentRequest;
use App\Models\Payment;
use App\Models\Client;
use App\Models\LatePayments;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Validator;
use App\Models\Income;
use App\Models\IncomePayment;
use Auth;
use Carbon\Carbon;


class PaymentController extends AppBaseController
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
		$this->middleware('login_mid');
	}
	
	public function index(Request $request)
	{
		$query = Payment::query();
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

		$payments = $query->get();

		return view('payments.index')
		->with('payments', $payments)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Payment.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('payments.create');
	}

	/**
	 * Store a newly created Payment in storage.
	 *
	 * @param CreatePaymentRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePaymentRequest $request)
	{
		$input = $request->all();

		$payment = Payment::create($input);

		Flash::message('Payment saved successfully.');

		return redirect(route('payments.index'));
	}

	/**
	 * Display the specified Payment.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$payment = Payment::find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');
			return redirect(route('payments.index'));
		}

		return view('payments.show')->with('payment', $payment);
	}

	/**
	 * Show the form for editing the specified Payment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$payment = Payment::find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');
			return redirect(route('payments.index'));
		}

		return view('payments.edit')->with('payment', $payment);
	}

	/**
	 * Update the specified Payment in storage.
	 *
	 * @param  int    $id
	 * @param CreatePaymentRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePaymentRequest $request)
	{
		/** @var Payment $payment */
		$payment = Payment::find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');
			return redirect(route('payments.index'));
		}

		$payment->fill($request->all());
		$payment->save();

		Flash::message('Payment updated successfully.');

		return redirect(route('payments.index'));
	}

	/**
	 * Remove the specified Payment from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Payment $payment */
		$payment = Payment::find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');
			return redirect(route('payments.index'));
		}

		$payment->delete();

		Flash::message('Payment deleted successfully.');

		return redirect(route('payments.index'));
	}

	public function process(Request $request)
	{	
		// Valitador
		$validator = Validator::make($request->all(), [
			'payment' => 'required|numeric',
			'payment_id' => 'required',
		]);

		if ($validator->fails()) {
			Toastr::error('Por favor introduce una cantidad correcta.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect()->back();
		}
		//End 

		//Get data payment, debt and ammount input
		$ammount = $request->input('payment'); /*$request->input('payment');*/
		$payment = Payment::find($request->input('payment_id'));
		if ($request->input('payment')) {
			# code...
		}
		$ammount_payment = $payment->balance;
		$ammount_payment_total = $payment->ammount;
		$debt = $payment->debt;
		//End

		// Check debt 
		if ($request->input('payment') > $debt->ammount) {
			Toastr::error('Estas introduciendo una cantitad mayor a tu adeudo, la cuota solicitada es de $'.$debt->ammount.' pesos', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect()->back();	
		}
		// else
		else
		{
			if ($ammount === $ammount_payment) {
			// Process payment
				$payment->status  = 'Pagado';
				$payment->payment = $payment->payment + $ammount;
				$payment->balance = 0;
				$payment->save();
				// Process debt
				$debt->ammount = $debt->ammount - $ammount;
				$debt->save();
				// show message 
				Toastr::success('Pago procesado exitosamente.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				$current = Carbon::today();
				$user = Auth::user();
				$vault = $user->vault;

				$data_incomePayment['ammount'] = $ammount;
				$data_incomePayment['concept'] = 'Recuperación';
				$data_incomePayment['date']    = $current;
				$data_incomePayment['payment_id'] = $payment->id;
				$data_incomePayment['debt_id'] = $debt->id;
				$data_incomePayment['vault_id'] = $vault->id;
				$incomePayment = IncomePayment::create($data_incomePayment);

				$vault->ammount = $vault->ammount + $incomePayment->ammount;
				$vault->save();
				if ($debt->ammount == 0) {
					$debt->status = "Pagado";
					$debt->credit->status = "Pagado";
					$debt->credit->save();
					$debt->save();	

				}

				return redirect()->back();	
			}

			elseif ($ammount < $ammount_payment) {
				// Process payment
				$payment->status  = 'Parcial';
				$payment->payment = $payment->payment + $ammount;
				$payment->balance = $ammount_payment - $ammount;
				$payment->save();
				// Process debt
				$debt->ammount = $debt->ammount - $ammount;
				$debt->save();
				// show message 
				Toastr::warning('Pago incompleto realizado.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				$current = Carbon::today();
				$user = Auth::user();
				$vault = $user->vault;

				$data_incomePayment['ammount'] = $ammount;
				$data_incomePayment['concept'] = 'Recuperación';
				$data_incomePayment['date']    = $current;
				$data_incomePayment['payment_id'] = $payment->id;
				$data_incomePayment['debt_id'] = $debt->id;
				$data_incomePayment['vault_id'] = $vault->id;
				$incomePayment = IncomePayment::create($data_incomePayment);

				$vault->ammount = $vault->ammount + $incomePayment->ammount;
				$vault->save();
				if ($debt->ammount == 0) {
					$debt->status = "Pagado";
					$debt->credit->status = "Pagado";
					$debt->credit->save();
					$debt->save();	

				}else if ($debt->credit->periodicity == 'CREDISEMANA') {
					$debt->status = "Renovación";
					$debt->credit->status = "Pagado";
					$debt->credit->save();
					$debt->save();	

				}

				return redirect()->back();	
			}

			// elseif ($debt->credit->periodicity == 'CREDISEMANA' && $ammount < $ammount_payment) {
			// 	// Process payment
			// 	$payment->status  = 'Parcial';
			// 	$payment->payment = $payment->payment + $ammount;
			// 	$payment->balance = $ammount_payment - $ammount;
			// 	$payment->save();
			// 	// Process debt
			// 	$debt->ammount = $debt->ammount - $ammount;
			// 	$debt->save();
			// 	// show message 
			// 	Toastr::warning('Pago incompleto realizado.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			// 	$current = Carbon::today();
			// 	$user = Auth::user();
			// 	$vault = $user->vault;

			// 	$data_incomePayment['ammount'] = $ammount;
			// 	$data_incomePayment['concept'] = 'Recuperación';
			// 	$data_incomePayment['date']    = $current;
			// 	$data_incomePayment['payment_id'] = $payment->id;
			// 	$data_incomePayment['debt_id'] = $debt->id;
			// 	$data_incomePayment['vault_id'] = $vault->id;
			// 	$incomePayment = IncomePayment::create($data_incomePayment);

			// 	$vault->ammount = $vault->ammount + $incomePayment->ammount;
			// 	$vault->save();
			// 	if ($debt->ammount == 250) {
			// 		$debt->status = "Pagado";
			// 		$debt->credit->status = "Pagado";
			// 		$debt->credit->save();
			// 		$debt->save();	

			// 	}

			// 	return redirect()->back();	
			// }

			elseif ($ammount > $ammount_payment) {

				// get exact quota
				$extra    = $ammount - $ammount_payment;
				$complete = $ammount - $extra;
				// Process payment
				$payment->status  = 'Pagado';
				$payment->payment = $payment->payment + $ammount_payment;
				$payment->balance = $payment->balance - $ammount_payment;
				$payment->save();
				// Process debt
				$debt->ammount = $debt->ammount - $ammount_payment;
				$debt->save();
				// Process news payments
				$budget  = intdiv($extra, $ammount_payment_total);
				$r       = fmod($extra, $ammount_payment_total);
				// 
				// get id payment online and next request
				$id_online = $payment->id;
				$id_next   = $id_online + 1;

				while ($budget > 0) {
					//$next_ammount = number_format($extra);
					$next_payment = Payment::find($id_next);
					$next_ammount_payment = $next_payment->balance;
					//$next_debt = $next_payment->debt;

					// Process next payment
					$next_payment->payment = $next_payment->payment + $next_payment->ammount;
					$next_payment->balance = $next_payment->balance - $next_payment->ammount;
					$next_payment->status  = 'Pagado';
					$next_payment->save();

					// Process debt
					$debt->ammount = $debt->ammount - $next_payment->ammount;
					$debt->save();

					$id_next = $id_next + 1;
					$budget = $budget - 1;
				}
				if ($r > 0) {
					$payment_extra = Payment::find($id_next);
					// 
					$payment_extra->payment = $payment_extra->payment + $r;
					$payment_extra->balance = $payment_extra->balance - $r;
					$payment_extra->status  = 'Parcial';
					$payment_extra->save();
					// Process debt
					$debt->ammount = $debt->ammount - $payment_extra->payment;
					$debt->save();

				}

				Toastr::info('Pagos realizados y 1 extra de '.number_format($r,2).' pesos.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				$current = Carbon::today();
				$user = Auth::user();
				$vault = $user->vault;

				$data_incomePayment['ammount'] = $ammount;
				$data_incomePayment['concept'] = 'Recuperación';
				$data_incomePayment['date']    = $current;
				$data_incomePayment['payment_id'] = $payment->id;
				$data_incomePayment['debt_id'] = $debt->id;
				$data_incomePayment['vault_id'] = $vault->id;
				$incomePayment = IncomePayment::create($data_incomePayment);

				$vault->ammount = $vault->ammount + $incomePayment->ammount;
				$vault->save();
				if ($debt->ammount == 0) {
					$debt->status = "Pagado";
					$debt->credit->status = "Pagado";
					$debt->credit->save();
					$debt->save();	

				}

				return redirect()->back();
			}

		//end else
		}
		

	}
	
	public function unlocked($id)
	{
		$locked = LatePayments::where('debt_id',$id)->where('status','bloqueado')->get();
		foreach ($locked as $value)
		{
			$value->status = "Acreditado";
			$value->save();
		}
		return redirect()->back();	
	}
	public function cancel($id)
	{	
		$payment = Payment::find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');
			return redirect(route('payments.index'));
		}	

		$payment->moratorium = 0;
		$payment->payment = 0;
		$payment->balance = $payment->ammount;;
		$payment->total = $payment->ammount;
		$payment->status = "Pendiente";
		$payment->save();
		$user = Auth::user();
		$vault = $user->vault;

		$vault->ammount = $vault->ammount - 50;
		$vault->save();

		
		return redirect()->back();	
	}
	public function mora($id)
	{	
		$payment = Payment::find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');
			return redirect(route('payments.index'));
		}	

		$payment->moratorium = 0;
		$payment->balance = $payment->balance - 20;
		$payment->total = $payment->ammount;
		$payment->save();

		return redirect()->back();	
	}
	
}
