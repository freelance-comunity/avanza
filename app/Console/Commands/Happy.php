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
       $user = User::find(2);
       $user->name = "wili";
       $user->save();
   }
}
