<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePaymentRequest;
use App\Models\Payment;
use App\Models\Credit;
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

        foreach ($columns as $attribute) {
            if ($request[$attribute] == true) {
                $query->where($attribute, $request[$attribute]);
                $attributes[$attribute] =  $request[$attribute];
            } else {
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

        if (empty($payment)) {
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

        if (empty($payment)) {
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

        if (empty($payment)) {
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

        if (empty($payment)) {
            Flash::error('Payment not found');
            return redirect(route('payments.index'));
        }

        $payment->delete();

        Flash::message('Payment deleted successfully.');

        return redirect(route('payments.index'));
    }

    public function unlocked($id)
    {
        $locked = LatePayments::where('debt_id', $id)->where('status', 'bloqueado')->get();
        foreach ($locked as $value) {
            $value->status = "Acreditado";
            $value->save();
        }
        return redirect()->back();
    }
    public function cancel($id)
    {
        $payment = Payment::find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');
            return redirect(route('payments.index'));
        }

        $payment->moratorium = 0;
        $payment->payment = 0;
        $payment->balance = $payment->ammount;
        ;
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

        if (empty($payment)) {
            Flash::error('Payment not found');
            return redirect(route('payments.index'));
        }

        $payment->moratorium = 0;
        $payment->balance = $payment->balance - 20;
        $payment->total = $payment->ammount;
        $payment->save();

        return redirect()->back();
    }

    public function processPayments(Request $request)
    {
        // Valitador
        $validator = Validator::make($request->all(), [
            'payment' => 'required|numeric',
            'credit' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Por favor introduce una cantidad correcta.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        }
        //End
        $amountAvailable = $request->input('payment');
        $discount = $request->input('payment');
        $credit = Credit::find($request->input('credit'));
        $debt   = $credit->debt;
        $payments = $debt->payments;

        $current = Carbon::today();
        $user = Auth::user();
        $vault = $user->vault;

        if ($amountAvailable > $debt->ammount) {
            Toastr::error('Estas introduciendo una cantitad mayor a tu adeudo, la cuota solicitada es de $'.number_format($debt->ammount, 2).' pesos', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        }

        foreach ($payments as $payment) {
            // Pendiente
            if ($payment->status == 'Pendiente') {
                if ($amountAvailable >= $payment->balance) {
                    $payment->status  = 'Pagado';
                    $payment->capital = 0;
                    $payment->interest = 0;
                    $payment->moratorium = 0;
                    $payment->payment = $payment->total;
                    $payment->balance = $payment->balance - $payment->total;
                    $payment->save();

                    $data_incomePayment['ammount'] = $payment->payment;
                    $data_incomePayment['concept'] = 'Recuperación';
                    $data_incomePayment['date']    = $current;
                    $data_incomePayment['payment_id'] = $payment->id;
                    $data_incomePayment['debt_id'] = $debt->id;
                    $data_incomePayment['vault_id'] = $vault->id;
                    $data_incomePayment['branch_id'] = $debt->branch_id;
                    $data_incomePayment['region_id'] = $debt->region_id;
                    $incomePayment = IncomePayment::create($data_incomePayment);

                    $vault->ammount = $vault->ammount + $incomePayment->ammount;
                    $vault->save();

                    $amountAvailable = $amountAvailable - $payment->payment;
                } elseif ($amountAvailable < $payment->balance) {
                    $payment->status  = 'Parcial';
                    $payment->payment = $amountAvailable;
                    $cuota = $amountAvailable;
                    if ($cuota > 0) {
                        if ($cuota >= $payment->interest) {
                            $cuota = $cuota - $payment->interest;
                            $payment->interest = 0;
                        } else {
                            $payment->interest = $payment->interest - $cuota;
                            $cuota = 0;
                        }
                    }
                    if ($cuota > 0) {
                        if ($cuota >= $payment->capital) {
                            $cuota = $cuota - $payment->capital;
                            $payment->capital = 0;
                        } else {
                            $payment->capital = $payment->capital - $cuota;
                            $cuota = 0;
                        }
                    }
                    $payment->balance = $payment->balance - $payment->payment;
                    $payment->save();

                    $data_incomePayment['ammount'] = $payment->payment;
                    $data_incomePayment['concept'] = 'Recuperación';
                    $data_incomePayment['date']    = $current;
                    $data_incomePayment['payment_id'] = $payment->id;
                    $data_incomePayment['debt_id'] = $debt->id;
                    $data_incomePayment['vault_id'] = $vault->id;
                    $data_incomePayment['branch_id'] = $debt->branch_id;
                    $data_incomePayment['region_id'] = $debt->region_id;
                    $incomePayment = IncomePayment::create($data_incomePayment);

                    $vault->ammount = $vault->ammount + $incomePayment->ammount;
                    $vault->save();

                    $amountAvailable = $amountAvailable - $payment->payment;
                }
            }
            // Fin pendiente
            // Parcial
            elseif ($payment->status == 'Parcial') {
                if ($amountAvailable >= $payment->balance) {
                    $rest = $payment->balance;
                    $payment->status  = 'Pagado';
                    $payment->capital = 0;
                    $payment->interest = 0;
                    $payment->moratorium = 0;
                    $payment->payment = $payment->total;
                    $payment->balance = 0;
                    $payment->save();

                    $data_incomePayment['ammount'] = $rest;
                    $data_incomePayment['concept'] = 'Recuperación';
                    $data_incomePayment['date']    = $current;
                    $data_incomePayment['payment_id'] = $payment->id;
                    $data_incomePayment['debt_id'] = $debt->id;
                    $data_incomePayment['vault_id'] = $vault->id;
                    $data_incomePayment['branch_id'] = $debt->branch_id;
                    $data_incomePayment['region_id'] = $debt->region_id;
                    $incomePayment = IncomePayment::create($data_incomePayment);

                    $vault->ammount = $vault->ammount + $incomePayment->ammount;
                    $vault->save();

                    $amountAvailable = $amountAvailable - $rest;
                } elseif ($amountAvailable < $payment->balance) {
                    $payment->status  = 'Parcial';
                    $payment->payment = $payment->payment + $amountAvailable;
                    $payment->balance = $payment->balance - $amountAvailable;
                    $cuota = $amountAvailable;
                    if ($cuota > 0) {
                        if ($payment->interest > 0) {
                            if ($cuota >= $payment->interest) {
                                $cuota = $cuota - $payment->interest;
                                $payment->interest = 0;
                            } else {
                                $payment->interest = $payment->interest - $cuota;
                                $cuota = 0;
                            }
                        }
                    }
                    if ($cuota > 0) {
                        if ($payment->capital > 0) {
                            if ($cuota >= $payment->capital) {
                                $cuota = $cuota - $payment->capital;
                                $payment->capital = 0;
                            } else {
                                $payment->capital = $payment->capital - $cuota;
                                $cuota = 0;
                            }
                        }
                    }
                    $payment->save();

                    $data_incomePayment['ammount'] = $amountAvailable;
                    $data_incomePayment['concept'] = 'Recuperación';
                    $data_incomePayment['date']    = $current;
                    $data_incomePayment['payment_id'] = $payment->id;
                    $data_incomePayment['debt_id'] = $debt->id;
                    $data_incomePayment['vault_id'] = $vault->id;
                    $data_incomePayment['branch_id'] = $debt->branch_id;
                    $data_incomePayment['region_id'] = $debt->region_id;
                    $incomePayment = IncomePayment::create($data_incomePayment);

                    $vault->ammount = $vault->ammount + $incomePayment->ammount;
                    $vault->save();

                    $amountAvailable = $amountAvailable - $discount;
                }
            }
            // Fin parcial
            // Vencido
            elseif ($payment->status == 'Vencido') {
                if ($amountAvailable >= $payment->balance) {
                    $rest = $payment->balance;
                    $payment->status  = 'Pagado';
                    $payment->capital = 0;
                    $payment->interest = 0;
                    $payment->moratorium = 0;
                    $payment->payment = $payment->total;
                    $payment->balance = 0;
                    $payment->save();

                    $data_incomePayment['ammount'] = $rest;
                    $data_incomePayment['concept'] = 'Recuperación';
                    $data_incomePayment['date']    = $current;
                    $data_incomePayment['payment_id'] = $payment->id;
                    $data_incomePayment['debt_id'] = $debt->id;
                    $data_incomePayment['vault_id'] = $vault->id;
                    $data_incomePayment['branch_id'] = $debt->branch_id;
                    $data_incomePayment['region_id'] = $debt->region_id;
                    $incomePayment = IncomePayment::create($data_incomePayment);

                    $vault->ammount = $vault->ammount + $incomePayment->ammount;
                    $vault->save();

                    $amountAvailable = $amountAvailable - $rest;
                } elseif ($amountAvailable < $payment->balance) {
                    $payment->status  = 'Vencido';
                    $payment->payment = $payment->payment + $amountAvailable;
                    $cuota = $amountAvailable;
                    if ($cuota > 0) {
                        if ($payment->moratorium > 0) {
                            if ($cuota >= $payment->moratorium) {
                                $cuota = $cuota - $payment->moratorium;
                                $payment->moratorium = 0;
                            } else {
                                $payment->moratorium = $payment->moratorium - $cuota;
                                $cuota = 0;
                            }
                        }
                    }
                    if ($cuota > 0) {
                        if ($payment->interest > 0) {
                            if ($cuota >= $payment->interest) {
                                $cuota = $cuota - $payment->interest;
                                $payment->interest = 0;
                            } else {
                                $payment->interest = $payment->interest - $cuota;
                                $cuota = 0;
                            }
                        }
                    }
                    if ($cuota > 0) {
                        if ($payment->capital > 0) {
                            if ($cuota >= $payment->capital) {
                                $cuota = $cuota - $payment->capital;
                                $payment->capital = 0;
                            } else {
                                $payment->capital = $payment->capital - $cuota;
                                $cuota = 0;
                            }
                        }
                    }
                    $payment->balance = $payment->balance - $amountAvailable;
                    $payment->save();

                    $data_incomePayment['ammount'] = $amountAvailable;
                    $data_incomePayment['concept'] = 'Recuperación';
                    $data_incomePayment['date']    = $current;
                    $data_incomePayment['payment_id'] = $payment->id;
                    $data_incomePayment['debt_id'] = $debt->id;
                    $data_incomePayment['vault_id'] = $vault->id;
                    $data_incomePayment['branch_id'] = $debt->branch_id;
                    $data_incomePayment['region_id'] = $debt->region_id;
                    $incomePayment = IncomePayment::create($data_incomePayment);

                    $vault->ammount = $vault->ammount + $incomePayment->ammount;
                    $vault->save();

                    $amountAvailable = $amountAvailable - $discount;
                }
            }
            // Fin vencido
            if ($amountAvailable <= 0) {
                $debt->ammount = $debt->ammount - $discount;
                $debt->save();

                if ($debt->ammount == 0) {
                    $debt->status = "Pagado";
                    $debt->credit->status = "Pagado";
                    $debt->credit->save();
                    $debt->save();
                }

                break;
            }
        }

        // echo "Ahora contamos con: ".$amountAvailable;
        Toastr::success('Pago aplicado correctamente.', 'PAGOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return redirect()->back();
    }
}
