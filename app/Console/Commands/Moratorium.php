<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Payment;
use App\Models\LatePayments;
use Carbon\Carbon;


class Moratorium extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:moratorium';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Applying Moratorium for late payments';

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
        $date_now = Carbon::now()->toDateString();
        $hour_now = Carbon::now()->toTimeString();
        $payments = Payment::where('date', $date_now)->where('status', 'Pendiente')->get();

        foreach ($payments as $key => $payment) {
            if ($hour_now >= '20:15:00') {
            
              $payment = Payment::find($payment->id);
              $payment->status = 'Vencido';
              $payment->moratorium = 20;
              $payment->total = $payment->ammount + $payment->moratorium;
              $payment->balance = $payment->balance + 20;
              $payment->save();

              $debt = $payment->debt;
              $debt->ammount = $debt->ammount + 20;
              $debt->save();

          }
          $latePayments = $payment->latePayments;

          if ($payment->status == "Vencido") {
            if ($latePayments->count() == 0) {
                $latePayments = new LatePayments;
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

    }
}
}
