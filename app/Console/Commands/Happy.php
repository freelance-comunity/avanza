<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;


class Happy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'w:hayppy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Esta es una prueba';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $credit = App\Models\Credit::all();
    $date_now = \Carbon\Carbon::now()->toDateString();
    $hour_now = \Carbon\Carbon::now()->toTimeString();
    foreach ($credit as $key => $credit) {
        $debt = $credit->debt;
        $payments = $debt->payments;

        foreach ($payments as $key => $payment) {
            if ($payment->date <= $date_now && $payment->status == 'Pendiente' && $hour_now >= '11:00:00') {
                $payment = App\Models\Payment::find($payment->id);
                $payment->status = 'Vencido';
                $payment->moratorium = 20;
                $payment->total = $payment->ammount + $payment->moratorium;
                $payment->balance = $payment->balance + 20;
                $payment->save();

                $debt = $payment->debt;
                $debt->ammount = $debt->ammount + 20;
                $debt->save();
            }
            if ($payment->date <= $date_now && $payment->status == 'Parcial' && $hour_now >= '11:00:00') {
                $payment = App\Models\Payment::find($payment->id);
                $payment->status = 'Vencido';
                $payment->moratorium = 20;
                $payment->total = $payment->ammount + $payment->moratorium;
                $payment->balance = $payment->balance + 20;
                $payment->save();

                $debt = $payment->debt;
                $debt->ammount = $debt->ammount + 20;
                $debt->save();
            }
            
        }
        if ($payments->status == 'Vencido') {
                $latePayments = new App\Models\LatePayments;
                $latePayments->late_number = $payment->number;
                $latePayments->late_ammount = $payment->total;
                $latePayments->late_payment = $payment->payment;
                $latePayments->status = "Atrasado";
                $latePayments->payment_id = $payment->id;
                $latePayments->debt_id    = $debt->id;
                $latePayments->branch_id = $debt->branch_id;
                $latePayments->region_id = $debt->region_id;
                $latePayments->save();
            }
    }
    echo "MORATORIO APLICADO CORRECTAMENTE";
   }
}
