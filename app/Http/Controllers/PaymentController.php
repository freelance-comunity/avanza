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
		$ammount = $request->input('payment');
		$payment = Payment::find($request->input('payment_id'));
		$payment->balance = $payment->total - $ammount;

		if ($payment->balance == 0) {
			$payment->status = "Pagado";
			$payment->payment = $ammount;
			Toastr::success('Pago confirmado.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
		}elseif ($payment->balance >= 1) {
			$payment->status = "Vencido";
			$payment->payment = $ammount;
			Toastr::info('Pago confirmado con adeudo.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
		}
		$payment->save();

		return redirect()->back();

	}
}
