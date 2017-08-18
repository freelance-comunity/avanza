<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Validator;


class PaymentController extends AppBaseController
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
		$validator = Validator::make($request->all(), [
			'payment' => 'required|numeric',
			'payment_id' => 'required',
			]);

		if ($validator->fails()) {
			Toastr::error('Por favor introduce una cantidad correcta.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect()->back();
		}

		$ammount = $request->input('payment');
		$payment = Payment::find($request->input('payment_id'));
		$debt = $payment->debt;
		if ($ammount > $payment->balance) {
			$budget = intdiv($ammount, $payment->balance);
			$r = fmod($ammount, $payment->balance);
			$count = $payment->id + $budget;

			if ($budget >= 1 AND $r >= 1) {
				for ($i=$payment->id; $i < $count; $i++) { 
					$payment_process = Payment::find($i);
					$payment_process->payment = $payment->balance;
					$payment_process->balance = 0;
					$payment_process->status = "Pagado";
					$payment_process->save();
					$debt->ammount = $debt->ammount - $payment->balance;
					$debt->save();

				}
			}else{
				for ($i=$payment->id; $i < $count; $i++) { 
					$payment_process = Payment::find($i);
					$payment_process->payment = $payment->balance;
					$payment_process->balance = 0;
					$payment_process->status = "Pagado";
					$payment_process->save();
					$debt->ammount = $debt->ammount - $payment->balance;
					$debt->save();
				}
				Toastr::success('Pagos confirmados.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			}
		}else{
			if ($payment->status == "Vencido") {
				$ammount = $request->input('payment');
				$rest = $payment->balance;
				$paid_out = $payment->payment;
				$new_balance = $rest - $ammount;
				if ($new_balance == 0) {
					$payment->balance = $new_balance;
					$payment->status = "Pagado";
					$payment->payment = $paid_out + $ammount;
					$debt->ammount = $debt->ammount - $rest;
					$debt->save();
					Toastr::success('Pago confirmado.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				}else{
					$payment->status = "Vencido";
					$payment->balance = $new_balance;
					$payment->payment = $paid_out + $ammount;

					$debt->ammount = $debt->ammount - $ammount;
					$debt->save();
					Toastr::info('Pago realizado parcialmente.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				}
			}else{
				$payment->balance = $payment->total - $ammount;
				if ($payment->balance == 0) {
					$payment->status = "Pagado";
					$payment->payment = $ammount;
					$debt->ammount = $debt->ammount - $payment->payment;
					$debt->save();
					Toastr::success('Pago confirmado.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				}elseif ($payment->balance >= 1) {
					$payment->status = "Vencido";
					$payment->payment = $ammount;
					$debt->ammount = $debt->ammount - $payment->payment;
					$debt->save();
					Toastr::info('Pago realizado parcialmente.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
				}
			}
			$payment->save();
		}
		return redirect()->back();	
	}
}
