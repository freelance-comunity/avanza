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
		$ammount = number_format($request->input('payment'),2);
		$payment = Payment::find($request->input('payment_id'));
		$ammount_payment = number_format($payment->balance,2);
		$debt = $payment->debt;
		//End

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
			return redirect()->back();	
		}
		elseif ($ammount > $ammount_payment) {
			// get exact quota
			$extra    = $ammount - $ammount_payment;
			$complete = $ammount - $extra;
			// get id payment online and next request
			$id_online = $payment->id;
			$id_next   = $id_online + 1;
			// Process payment
			$payment->status  = 'Pagado';
			$payment->payment = $payment->payment + $ammount_payment;
			$payment->balance = $payment->balance - $ammount_payment;
			$payment->save();
			// Process debt
			$debt->ammount = $debt->ammount - $complete;
			$debt->save();

			while ($extra > 0) {
				$next_ammount = number_format($extra);
				$next_payment = Payment::find($id_next);
				$next_ammount_payment = number_format($next_payment->balance,2);
				$next_debt = $next_payment->debt;

				// Process next payment
				$next_payment->payment = $next_payment->payment + $next_ammount;
				$next_payment->balance = $next_payment->balance - $next_ammount;
				if ($next_payment->balance === 0) {
					$next_payment->status = 'Pagado';
				}
				else
				{
					$next_payment->status = 'Parcial';
				}
				$next_payment->save();
				// Process next debt
				$next_debt->ammount = $next_debt->ammount - $next_ammount;
				$next_debt->save();
				echo $next_payment->id;
				echo "<br>";
				echo $next_ammount;
				echo "<br>";
				$extra = $extra - $next_payment->payment;
				$id_next = $next_payment->id + 1;
				echo $id_next;
				echo "<br>";
				echo $extra;
			}

			Toastr::info('Pago realizado y sobran '.number_format($extra,2).' pesos.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect()->back();
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
