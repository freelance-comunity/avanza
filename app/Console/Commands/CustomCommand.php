<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\User;
use App\Models\Vault;
use App\Models\Finals;


class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:cut';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Corte de caja';

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
       $users = User::all();


       foreach ($users as $user){

         $current =  Carbon::today()->toDateString();
         $vault = $user->vault;
         $vault_total = Vault::all();
         $incomes = $vault->incomes->where('date', $current);
         $incomePayment = $vault->incomePayment->where('date', $current);
         $purseAccess = $vault->purseAccess->where('date', $current);
         $expendituresCredit = $vault->expendituresCredit->where('date', $current);
         $expenditures = $vault->expenditures->where('date', $current);
         $actives = $vault->actives->where('date', $current);


         $final = new Finals;
         $final->date = $current;
         $final->region = $user->region['name'];
         $final->branch = $user->branch['name'];
         $final->name = $user->name.' '.$user->father_last_name.' '.$user->mother_last_name;
         $final->vault= $vault->ammount;
         $final->incomes = $incomes->sum('ammount');
         $final->incomePayment =  $incomePayment->sum('ammount');
         $final->access = $purseAccess->sum('ammount');
         $final->credit = $expendituresCredit->sum('ammount');
         $final->expenditures = $expenditures->sum('ammount');
         $final->actives = $actives->sum('ammount');
         $final->save();

       
     }
 }
}
