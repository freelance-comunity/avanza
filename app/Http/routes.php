<?php
/*===================================
=            Test Routes            =
===================================*/
Route::get('pdf/{id}', function ($id) {
    $client = App\Models\Client::find($id);
    $document = $client->document;
    $pdf = PDF::loadView('clients.documents', compact('document'));
    return $pdf->download('documents.pdf');
});


Route::get('signature', function () {
    return view('signature');
});

Route::post('save-signature', function (Illuminate\Http\Request  $request) {
    $data_uri = $request->input('signature');
    $encoded_image = explode(",", $data_uri)[1];
    $decoded_image = base64_decode($encoded_image);
    $url = 'signature'. rand(111, 9999).'.png';

    file_put_contents('../public/uploads/signatures/' . $url, $decoded_image);
    echo $url;
});

Route::get('validation', function () {
    return view('validation');
});

Route::get('test-relationship', function () {
    $client = App\Models\Client::find(1);

    $references = $client->references;
    echo $client->firts_name;
    echo "<br>";
    foreach ($references as $key => $value) {
        echo $value->firts_name_reference;
        echo "<br>";
    }
});

Route::get('geolocation', function () {
    return view('geolocation');
});

Route::get('division', function () {
    $now = Carbon\Carbon::today()->toDateString();
    $user = Auth::user();
    $region = $user->region;
    $branches = $region->branches;

    $total_promoter = 0;

    foreach ($branches as $key => $value) {
        $users = $value->users;
        foreach ($users as $key => $user) {
            $vault = $user->vault;
            $total_incomes = DB::table('income_payments')->where([
                ['vault_id', '=', $vault->id],
                ['date', '=', $now],
            ])->sum('ammount');
            $total_promoter = $total_promoter + $total_incomes;
        }
        echo $value->name;
        echo "<br>";
        $total_payments = DB::table('payments')->where([
            ['branch_id', '=', $value->id],
            ['date', '=', $now],
        ])->sum('total');
        echo "Proyectado: ".$total_payments;
        echo "<br>";
        echo "Recuperado: ".$total_promoter;
        echo "<br>";
        echo "===================================";
        echo "<br>";
    }
});

Route::post('process', 'PaymentController@process');

Route::post('/import-excel', 'ClientController@importClients');

Route::get('test-boveda', function () {
    $incomes = App\Models\Income::all();
    echo number_format($incomes->sum('ammount'));

    $si = $incomes->where('concept', 'Saldo Inicial');
    $rc = $incomes->where('concept', 'Recuperación');
    $af = $incomes->where('concept', 'Asignación de efectivo');

    echo "<br>";
    echo number_format($si->sum('ammount'));
    echo "<br>";
    echo number_format($rc->sum('ammount'));
    echo "<br>";
    echo number_format($af->sum('ammount'));
});

Route::get('testDate', function () {
    $current = Carbon\Carbon::today()->toDateString();
    echo $current;


    $user = App\User::find(3);
    $vault = $user->vault;
    $incomes = $vault->incomes->where('date', '2017-09-05');
    echo "<br>";
    dd($incomes);
    $si = $incomes->where('concept', 'Saldo Inicial')->where('date', $current);
    $rc = $incomes->where('concept', 'Recuperación')->where('date', $current);
    $af = $incomes->where('concept', 'Asignación de efectivo')->where('date', $current);
});

Route::get('ciclos', function () {
    $date_now = Carbon\Carbon::today()->toDateString();
    $payments = Auth::user()->payments->sortBy('payment');
    $ammount_total = $payments->where('date', $date_now);
    $pagos_pendientes = DB::table('payments')->where([['user_id', '=', Auth::user()->id], ['date', '<=', $date_now],['status', '=', 'Pendiente']])->get();
    $pagos_parciales = DB::table('payments')->where([['user_id', '=', Auth::user()->id], ['date', '<=', $date_now],['status', '=', 'Parcial']])->get();
    $pagos_vencidos = DB::table('payments')->where([['user_id', '=', Auth::user()->id], ['date', '<=', $date_now],['status', '=', 'Vencido']])->get();
});

Route::get('LoginMid', function () {
    $td = Carbon\Carbon::now();
    if ($td->hour <= 20) {
        echo "Ya esta sobre el horario te uso del sistema, intenta mañana.";
    }
});

Route::get('join', function () {
    $user_allocation = Auth::user();
    $region_allocation = $user_allocation->region;

    $users = DB::table('regions')
    ->join('rosters', 'users.id', '=', 'rosters.user_id')
    ->join('regions', 'users.id', '=', 'orders.user_id')
    ->select('users.*', 'contacts.phone', 'orders.price')
    ->get();
});
/*=====  End of Test Routes  ======*/


Route::get('/', function () {
    if ($user = Auth::user()) {
        return view('home');
    }
    if (Auth::guest()) {
        return redirect('login');
    }
});

Route::auth();

Route::get('/home', 'HomeController@index');
/*=============================================
=            Routes for Roles            =
=============================================*/
Route::resource('roles', 'RoleController');

Route::get('roles/{id}/delete', [
    'as' => 'roles.delete',
    'uses' => 'RoleController@destroy',
]);

Route::get('permission-to-role/{id}', 'PermissionController@permissions');

Route::Post ('/asignamment', 'PermissionController@addPermission');

Route::Post ('/permissionEdit', 'PermissionController@permissionEdit');

Route::get('/deletepermission/{role}/{permission}', function ($role, $permission) {
    $users = App\User::all();
    $role_quit = App\Role::find($role);
    $permission = App\Permission::find($permission);
    $role_quit->permissions()->detach($permission);
    Toastr::info('Permiso eliminado exitosamente.', 'ROLES', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

    return redirect(route('roles.index'));
});
/*=====  End of Routes for Roles  ======*/

Route::resource('branches', 'BranchController');

Route::get('branches/{id}/delete', [
    'as' => 'branches.delete',
    'uses' => 'BranchController@destroy',
]);

Route::get('charts', 'BranchController@charts');

/*========================================
=            Routes for Employee            =
========================================*/
Route::resource('employees', 'EmployeeController');

Route::get('employees/{id}/delete', [
    'as' => 'employees.delete',
    'uses' => 'EmployeeController@destroy',
]);

Route::get('/deleterole/{employee}/{role}', function ($employee, $role) {
    $employee_quit = App\User::find($employee);
    $role = App\Role::find($role);
    $employee_quit->roles()->detach($role);
    Toastr::success('Privilegios removidos exitosamente.', 'ROLES', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
    return redirect(route('employees.index'));
});

Route::post('/updateroles', function (Illuminate\Http\Request  $request) {
    $user = App\User::find($request->input('user_id'));
    $users = App\User::all();
    $roles = $request->input($user->id);
    foreach ($roles as $role) {
        $name_role = App\Role::find($role);
        $user->attachRole($name_role);
    }
    Toastr::success('Privilegios agregados exitosamente.', 'ROLES', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
    return redirect(route('employees.index'));
});

Route::get('update', function () {
    return view('employees.updatepassword');
});

Route::get('profile', function () {
    return view('employees.profile');
});

Route::post('updatepassword', 'EmployeeController@updatePassword');

Route::get('vault', 'GeneralController@getPromoter');

Route::get('showVault/{id}', 'GeneralController@showVault');

Route::post('addVault', 'GeneralController@addVault');

Route::post('addCash', 'GeneralController@addCash');

Route::post('recordExpense', 'GeneralController@recordExpense');

Route::post('recordActive', 'GeneralController@recordActive');

Route::post('purseAccess', 'GeneralController@purseAccess');

/*=====  End of Routes for Employee  ======*/

Route::get('formwizard', function () {
    return view('wizard');
});
Route::get('teclado', function () {
    return view('teclado');
});
Route::resource('clients', 'ClientController');

Route::get('clients/{id}/delete', [
    'as' => 'clients.delete',
    'uses' => 'ClientController@destroy',
]);

Route::get('client/{id}/', [
    'as' => 'branch.client',
    'uses' => 'BranchController@client',
]);

Route::resource('employeelocations', 'EmployeelocationController');

Route::get('employeelocations/{id}/delete', [
    'as' => 'employeelocations.delete',
    'uses' => 'EmployeelocationController@destroy',
]);


Route::resource('employeecredentials', 'EmployeecredentialsController');

Route::get('employeecredentials/{id}/delete', [
    'as' => 'employeecredentials.delete',
    'uses' => 'EmployeecredentialsController@destroy',
]);

Route::resource('clientLocations', 'ClientLocationController');

Route::get('clientLocations/{id}/delete', [
    'as' => 'clientLocations.delete',
    'uses' => 'ClientLocationController@destroy',
]);


Route::resource('clientCredentials', 'ClientCredentialController');

Route::get('clientCredentials/{id}/delete', [
    'as' => 'clientCredentials.delete',
    'uses' => 'ClientCredentialController@destroy',
]);


Route::resource('clientAvals', 'ClientAvalController');

Route::get('avalClient/{id}/', [
  'as' => 'client.avalClient',
  'uses' => 'ClientController@avalClient',
]);

Route::get('referencesClient/{id}/', [
  'as' => 'client.referencesClient',
  'uses' => 'ClientController@referencesClient',
]);

Route::get('clientAvals/{id}/delete', [
    'as' => 'clientAvals.delete',
    'uses' => 'ClientAvalController@destroy',
]);


Route::resource('spouses', 'SpouseController');

Route::get('spouses/{id}/delete', [
    'as' => 'spouses.delete',
    'uses' => 'SpouseController@destroy',
]);


Route::resource('clientCompanies', 'ClientCompanyController');

Route::get('clientCompanies/{id}/delete', [
    'as' => 'clientCompanies.delete',
    'uses' => 'ClientCompanyController@destroy',
]);


Route::resource('clientReferences', 'ClientReferencesController');

Route::get('clientReferences/{id}/delete', [
    'as' => 'clientReferences.delete',
    'uses' => 'ClientReferencesController@destroy',
]);


Route::resource('clientdocuments', 'ClientdocumentsController');

Route::get('clientdocuments/{id}/delete', [
    'as' => 'clientdocuments.delete',
    'uses' => 'ClientdocumentsController@destroy',
]);


Route::resource('products', 'ProductController');

Route::get('products/{id}/delete', [
    'as' => 'products.delete',
    'uses' => 'ProductController@destroy',
]);


Route::resource('credits', 'CreditController');

Route::get('credits/{id}/delete', [
    'as' => 'credits.delete',
    'uses' => 'CreditController@destroy',
]);

Route::resource('creditsValid', 'CreditController@creditsValid');
Route::resource('creditsPaidOut','CreditController@creditsPaidOut');

Route::get('creditsClient/{id}/{product}', [
    'as' => 'client.creditsClient',
    'uses' => 'ClientController@creditsClient',
]);

Route::get('creditsMigrate/{id}/{product}', [
    'as' => 'client.creditsMigrate',
    'uses' => 'ClientController@creditsMigrate',
]);

Route::get('creditsClientSemanal/{id}/{product}', [
    'as' => 'client.creditsClientSemanal',
    'uses' => 'ClientController@creditsClientSemanal',
]);
Route::get('renovate/{id}/{product}', function ($id) {
    $product = App\Models\Product::find(3);
    $client = App\Models\Client::find($id);
    return view('credits.renovate')
    ->with('client', $client)
    ->with('product', $product);
});


Route::post('renovation', 'CreditController@renovation');

Route::get('solicitud/{id}', function ($id) {
    $credit = App\Models\Credit::find($id);
    $pdf = PDF::loadView('credits.solicitud', compact('credit'));
    return $pdf->download('solicitud.pdf');
});

Route::get('account_pdf/{id}', function ($id) {
    $credit = App\Models\Credit::find($id);
    $pdf = PDF::loadView('credits.account_pdf', compact('credit'));
    return $pdf->download('Estado-De-Cuenta.pdf');
});

Route::get('account/{id}', function ($id) {
    $credit = App\Models\Credit::find($id);
    return view('credits.account')
    ->with('credit', $credit);
});

Route::resource('debts', 'DebtController');

Route::get('debts/{id}/delete', [
    'as' => 'debts.delete',
    'uses' => 'DebtController@destroy',
]);


Route::resource('payments', 'PaymentController');

Route::get('payments/{id}/delete', [
    'as' => 'payments.delete',
    'uses' => 'PaymentController@destroy',
]);

Route::get('carbon', function () {
    echo $date = \Carbon\Carbon::now()->diffForHumans();
    echo "<br>";
});

Route::resource('permissions', 'PermissionController');

Route::get('permissions/{id}/delete', [
    'as' => 'permissions.delete',
    'uses' => 'PermissionController@destroy',
]);


Route::resource('latePayments', 'LatePaymentsController');

Route::get('latePayments/{id}/delete', [
    'as' => 'latePayments.delete',
    'uses' => 'LatePaymentsController@destroy',
]);


Route::get('graphics', function () {

    return view('graphics');
});

Route::get('graphics2', function () {

    return view('reports.graphics');
});

Route::get('unlocked/{id}', 'PaymentController@unlocked');
Route::get('unlockedclient/{id}', 'ClientController@unlockedclient');
Route::get('cancel/{id}', 'PaymentController@cancel');
Route::get('mora/{id}', 'PaymentController@mora');




Route::get('mexico', function () {
    return view('mexico');
});

Route::get('executives', function () {
    return view('executives');
});


Route::resource('vaults', 'VaultController');

Route::get('vaults/{id}/delete', [
    'as' => 'vaults.delete',
    'uses' => 'VaultController@destroy',
]);


Route::resource('incomes', 'IncomeController');

Route::get('incomes/{id}/delete', [
    'as' => 'incomes.delete',
    'uses' => 'IncomeController@destroy',
]);


Route::resource('expenditures', 'ExpenditureController');

Route::get('expenditures/{id}/delete', [
    'as' => 'expenditures.delete',
    'uses' => 'ExpenditureController@destroy',
]);

Route::get('updatephoto/{id}', function ($id) {
    $client = App\Models\Client::find($id);
    return view('clients.upload')
    ->with('client', $client);
});
Route::get('updatephotos/{id}', function ($id) {
    $document = App\Models\Clientdocuments::find($id);
    return view('clientdocuments.uploads')
    ->with('document', $document);
});
Route::get('ine/{id}', function ($id) {
    $document = App\Models\Clientdocuments::find($id);
    return view('clientdocuments.ine')
    ->with('document', $document);
});
Route::get('curps/{id}', function ($id) {
    $document = App\Models\Clientdocuments::find($id);
    return view('clientdocuments.curps')
    ->with('document', $document);
});
Route::post('updatephoto', 'PhotoController@update');
Route::post('ine', 'PhotoController@ine');
Route::post('curps', 'PhotoController@curps');
Route::post('updatephotos', 'PhotoController@cfe');
Route::post('avatar', 'PhotoController@avatar');


Route::get('ajax', function () {
    $date = \Carbon\Carbon::now();
    $dues = 25;
    $amount = 39;
    for ($i=0; $i <= $dues; $i++) {
        echo $dues;
        echo "&nbsp;";
        echo "&nbsp;";
        echo "&nbsp;";
        echo $date->addDay();
        echo "&nbsp;";
        echo "&nbsp;";
        echo "&nbsp;";
        echo $amount;
        echo "&nbsp;";
        echo "&nbsp;";
        echo "&nbsp;";
        echo "<br>";
    }
});

Route::resource('boxCuts', 'BoxCutController');

Route::get('boxCuts/{id}/delete', [
    'as' => 'boxCuts.delete',
    'uses' => 'BoxCutController@destroy',
]);

Route::get('boxcut', 'BoxCutController@getPromoter');
Route::get('showbox/{id}', 'BoxCutController@showbox');
Route::post('cut', 'BoxCutController@cut');





Route::resource('regions', 'RegionController');

Route::get('regions/{id}/delete', [
    'as' => 'regions.delete',
    'uses' => 'RegionController@destroy',
]);

Route::get('usuarios', function () {
    $now = \Carbon\Carbon::now()->toDateString();
    $quincena= \Carbon\Carbon::now()->addDays(15);
    echo "De: ".$now;
    echo "<br>";
    echo "hasta: ".$quincena;
});


Route::resource('expenditureCredits', 'ExpenditureCreditController');

Route::get('expenditureCredits/{id}/delete', [
    'as' => 'expenditureCredits.delete',
    'uses' => 'ExpenditureCreditController@destroy',
]);


Route::resource('incomePayments', 'IncomePaymentController');

Route::get('incomePayments/{id}/delete', [
    'as' => 'incomePayments.delete',
    'uses' => 'IncomePaymentController@destroy',
]);


Route::resource('purseAccesses', 'PurseAccessController');

Route::get('purseAccesses/{id}/delete', [
    'as' => 'purseAccesses.delete',
    'uses' => 'PurseAccessController@destroy',
]);

/*========================================
=            Download reports            =
========================================*/
Route::get('report-vault', function () {
    // $pdf = PDF::loadView('reports.vault')->setPaper('a4', 'landscape');
    // return $pdf->download('reporte-bovéda.pdf');
    return view('reports.vault');
});

Route::get('report-clients', function () {
    // $pdf = PDF::loadView('reports.clients')->setPaper('a4', 'landscape');
    // return $pdf->download('reporte-clientes.pdf');
    return view('reports.clients');
});

Route::get('report-credits', function () {
    // $pdf = PDF::loadView('reports.credits')->setPaper('a4', 'landscape');
    // return $pdf->download('reporte-créditos.pdf');
    return view('reports.credits');
});

Route::get('report-credits-month', function () {
    // $pdf = PDF::loadView('reports.credits')->setPaper('a4', 'landscape');
    // return $pdf->download('reporte-créditos.pdf');
    return view('reports.credits-month');
});

Route::get('report-rosters-month', function () {
    // $pdf = PDF::loadView('reports.credits')->setPaper('a4', 'landscape');
    // return $pdf->download('reporte-créditos.pdf');
    return view('reports.rosters-month');
});

Route::get('report-expenditures-month', function () {
    // $pdf = PDF::loadView('reports.expenditures')->setPaper('a4', 'landscape');
    // return $pdf->download('reporte-gastos.pdf');
    return view('reports.expenditures-month');
});

Route::get('report-credits-day', function () {
    // $pdf = PDF::loadView('reports.expenditures')->setPaper('a4', 'landscape');
    // return $pdf->download('reporte-gastos.pdf');
    return view('reports.credits-day');
});

Route::get('report-payments-day', function () {
    // $pdf = PDF::loadView('reports.expenditures')->setPaper('a4', 'landscape');
    // return $pdf->download('reporte-gastos.pdf');
    return view('reports.collection_day');
});

Route::get('report-payments-now', function () {
    // $pdf = PDF::loadView('reports.expenditures')->setPaper('a4', 'landscape');
    // return $pdf->download('reporte-gastos.pdf');
    return view('reports.payments_now');
});


Route::get('report-payments', function () {
    $pdf = PDF::loadView('reports.payments')->setPaper('a4', 'landscape');
    return $pdf->download('reporte-cobranza.pdf');
});

/*=====  End of Download reports  ======*/

/*=====================================
=            Lock payments            =
=====================================*/
Route::get('lock-payments', 'GeneralController@lockPayments');

/*=====  End of Lock payments  ======*/




Route::resource('closes', 'CloseController');

Route::get('closes/{id}/delete', [
    'as' => 'closes.delete',
    'uses' => 'CloseController@destroy',
]);

Route::get('unlock', function () {
    //return "Hello, world!";

    $date_now = \Carbon\Carbon::now()->toDateString();
        //$hour_now = Carbon::now()->toTimeString();
    $payments = App\Models\Payment::where('date', $date_now)->where('status', 'Pendiente')->get();

    foreach ($payments as $key => $value) {
            //echo "Estamos listos para bloquear";
        $payment = App\Models\Payment::find($value->id);
            // $payment->status = 'Pendiente';
            // $payment->moratorium = 0;
        $payment->total = $payment->total + 20;
            // $payment->balance = $payment->balance - 20;
        $payment->save();

            // $debt = $payment->debt;
            // $debt->ammount = $debt->ammount - 20;
            // $debt->save();
    }

    Toastr::info('Se han anulado los pagos con mora del día de hoy.', 'INFO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
    return redirect()->back();
});

// Route::get('movements', function(){
//     return view('partials.movements');
// });
Route::get('movements', 'GeneralController@movements');
Route::get('movementsBalance', 'GeneralController@movementsBalance');
Route::get('movementsBeginning', 'GeneralController@movementsBeginning');
Route::get('movementsEffective', 'GeneralController@movementsEffective');
Route::get('movementsRecovery', 'GeneralController@movementsRecovery');
Route::get('movementsRecoveryAccess', 'GeneralController@movementsRecoveryAccess');
Route::get('movementsPlacement', 'GeneralController@movementsPlacement');
Route::get('movementsExpenses', 'GeneralController@movementsExpenses');
Route::get('movementsSalaries', 'GeneralController@movementsSalaries');
Route::get('movementsCut', 'GeneralController@movementsCut');

Route::get('expenses-admin', function () {
    return view('partials.expenses');
});

Route::get('actives-admin', function () {
    return view('partials.actives');
});

Route::resource('rosters', 'RosterController');

Route::get('rosters/{id}/delete', [
    'as' => 'rosters.delete',
    'uses' => 'RosterController@destroy',
]);
Route::get('roster/{id}', function ($id) {
    $roster = App\Models\Roster::find($id);
    $pdf = PDF::loadView('rosters.roster', compact('roster'));
    return $pdf->download('Nomina.pdf');
});

Route::resource('investments', 'InvestmentController');

Route::get('investments/{id}/delete', [
    'as' => 'investments.delete',
    'uses' => 'InvestmentController@destroy',
]);
Route::get('/showInvestments/{id}', 'InvestmentController@showInvestments');
Route::get('/showRetreats/{id}', 'RetreatController@show');

Route::resource('retreats', 'RetreatController');

Route::get('retreats/{id}/delete', [
    'as' => 'retreats.delete',
    'uses' => 'RetreatController@destroy',
]);

Route::get('/transfer', function () {
    //$users = App\User::all();
    $collection = App\Role::all();
    $role = $collection->where('name', 'ejecutivo-de-credito')->first();

    $users = $role->users;
    return view('partials.transfer')
    ->with('users', $users);
});

Route::get('transferClients', function () {
    $branch = App\Models\Branch::find(4);
    $clients = $branch->clients;
    foreach ($clients as $key => $value) {
        $value->region_id = 4;
        $value->save();
    }
    $branch = App\Models\Branch::find(9);
    $clients = $branch->clients;
    foreach ($clients as $key => $value) {
        $value->region_id = 4;
        $value->save();
    }
});

Route::get('transferCredits', function () {
    $branch = App\Models\Branch::find(4);
    $credits = $branch->credits;
    foreach ($credits as $key => $value) {
        $value->region_id = 4;
        $value->save();
    }
    $branch = App\Models\Branch::find(9);
    $credits = $branch->credits;
    foreach ($credits as $key => $value) {
        $value->region_id = 4;
        $value->save();
    }
});

Route::post('transferProcess', 'GeneralController@transferProcess');

Route::get('moratorio', function () {
    $credit = App\Models\Credit::all();

    $date_now = \Carbon\Carbon::now()->toDateString();
    $hour_now = \Carbon\Carbon::now()->toTimeString();

    foreach ($credit as $key => $credit) {
        $debt = $credit->debt;
        $payments = $debt->payments;
        if ($credit->periodicity == "CREDISEMANA") {
            $payments = App\Models\Payment::where('status', 'Pendiente')->get();
            foreach ($payments as $key => $value) {
                if ($value->date <= $date_now) {
                    $payment = App\Models\Payment::find($value->id);
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
        } else {
            $payments = App\Models\Payment::where('status', 'Pendiente')->where('status', 'Parcial')->get();
            foreach ($payments as $key => $value) {
                if ($value->date <= $date_now) {
                    $payment = App\Models\Payment::find($value->id);
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
        }
        if ($value->status == 'Vencido') {
            $latePayments = new App\Models\LatePayments;
            $latePayments->late_number = $payment->number;
            $latePayments->late_ammount = $payment->total;
            $latePayments->late_payment = $payment->payment;
            $latePayments->payment_id = $payment->id;
            $latePayments->debt_id    = $debt->id;
            $latePayments->save();
        }
    }
    echo "moratorio aplicado";
});

Route::get('walletExpired', 'GeneralController@walletExpired');

Route::post('processPayments', 'PaymentController@processPayments');
Route::get('totalVault', 'GeneralController@totalVault');
Route::get('currentCredits', 'GeneralController@currentCredits');


Route::get('adviser', function () {

    $user_allocation = Auth::user();
    $region_allocation = $user_allocation->region;
    $collection = App\Role::all();
    $role = $collection->where('name', 'ejecutivo-de-credito')->first();
    $filtered = App\User::where('id', '!=', Auth::id())->get();
    $users = $filtered->where('region_id', $region_allocation->id);

    foreach ($users as $key => $value) {
        echo $value->name;
        echo "<br>";
    }
});

Route::get('proyeccion', function () {
    $date_now = Carbon\Carbon::today();
    $payments = Auth::user()->payments;
    $date = \Carbon\Carbon::now()->toDateString();
    $payment = App\Models\Payment::where('date', $date)->sum('ammount');

    echo $payment;
});

Route::get('najera', function () {

    $credits = App\Models\Credit::all();

    foreach ($credits as $key => $value) {
        if ($value->adviser == "CARLOS EDUARDO TRUJILLO CORDERO") {
            $value->adviser = "IVAN MOISES HERNANDEZ NAJERA";
            $value->save();
        }
    }
    foreach ($credits as $key => $value) {
        if ($value->adviser == "SELVIN ANTONIO HERNANDEZ JIMENEZ") {
            $value->adviser = "IVAN MOISES HERNANDEZ NAJERA";
            $value->save();
        }
    }
    echo "chido se cambio el nombre del promotor";
});


Route::get('reportPayment', 'GeneralController@reportPayment');



Route::resource('clientReferences', 'ClientReferencesController');

Route::get('clientReferences/{id}/delete', [
    'as' => 'clientReferences.delete',
    'uses' => 'ClientReferencesController@destroy',
]);

Route::get('applyMoratorium',function(){
    $credit = App\Models\Credit::all();
    $date_now = \Carbon\Carbon::now()->toDateString();
    $hour_now = \Carbon\Carbon::now()->toTimeString();
    foreach ($credit as $key => $credit) {
        $debt = $credit->debt;
        $payments = $debt->payments;

        foreach ($payments as $key => $payment) {
            if ($payment->date <= $date_now && $payment->status == 'Pendiente' ) {
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
            if ($payment->date <= $date_now && $payment->status == 'Parcial') {
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
            $latePayments = $payment->latePayments;

            if ($payment->status == "Vencido") {
                if ($latePayments->count() == 0) {
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

        }
    }
    echo "MORATORIO APLICADO CORRECTAMENTE";
});

Route::get('productos', function () {

 $credit = App\Models\Credit::all();
 foreach ($credit as $key => $credit) {
    if ($credit->periodicity == "SEMANAL") {
     echo $credit->periodicity;
     echo $credit->adviser;
     echo "<br>";
 }

}
});


Route::resource('actives', 'ActiveController');

Route::get('actives/{id}/delete', [
    'as' => 'actives.delete',
    'uses' => 'ActiveController@destroy',
]);

Route::get('changePayments', function(){
  $payments = App\Models\Payment::all();

  foreach ($payments as $key => $py) {
    $branch = $py->branch;

    $py->region_id = $branch->region_id;
    $py->save();
}
echo "Listo";
});

Route::get('changeDebts', function(){
  $debts = App\Models\Debt::all();

  foreach ($debts as $key => $debt) {
    $credit = $debt->credit;
    $debt->branch_id = $credit->branch_id;
    $debt->region_id = $credit->region_id;
    $debt->save();
}
echo "Listo";
});

Route::get('changeIncomePayments', function(){
  $incomePayments = App\Models\IncomePayment::all();

  foreach ($incomePayments as $key => $ip) {
    $debt = $ip->debt;
    $credit = $debt->credit;

    $ip->branch_id = $credit->branch_id;
    $ip->region_id = $credit->region_id;
    $ip->save();
}
echo "Listo";
});

Route::get('expenditureCreditsChange', function(){
  $expenditureCredits = App\Models\ExpenditureCredit::all();

  foreach ($expenditureCredits as $key => $ec) {
    $credit = $ec->credit;
    $ec->branch_id = $credit->branch_id;
    $ec->region_id = $credit->region_id;
    $ec->save();
}
echo "Listo";
});

Route::get('expendituresChange', function(){
  $expenditures = App\Models\Expenditure::all();

  foreach ($expenditures as $key => $ex) {
    $vault = $ex->vault;
    $user  = $vault->user;

    $ex->branch_id = $user->branch_id;
    $ex->region_id = $user->region_id;
    $ex->save();
}
echo "Listo";
});

Route::get('incomesChange', function(){
  $incomes = App\Models\Income::all();

  foreach ($incomes as $key => $in) {
    $vault = $in->vault;
    $user  = $vault->user;

    $in->branch_id = $user->branch_id;
    $in->region_id = $user->region_id;
    $in->save();
}
echo "Listo";
});

Route::get('rostersChange', function(){
  $rosters = App\Models\Roster::all();

  foreach ($rosters as $key => $ro) {
    $user = $ro->user;

    $ro->branch_id = $user->branch_id;
    $ro->region_id = $user->region_id;
    $ro->save();
}
echo "Listo";
});

Route::get('retreatsChange', function(){
  $retreats = App\Models\Retreat::all();

  foreach ($retreats as $key => $re) {
    $vault = $re->vault;
    $user  = $vault->user;

    $re->branch_id = $user->branch_id;
    $re->region_id = $user->region_id;
    $re->save();
}
echo "Listo";
});

Route::get('accessChange', function(){
  $purses = App\Models\PurseAccess::all();

  foreach ($purses as $key => $pur) {
    $vault = $pur->vault;
    $user  = $vault->user;

    $pur->branch_id = $user->branch_id;
    $pur->region_id = $user->region_id;
    $pur->save();
}
echo "Listo";
});

Route::get('latesChange', function(){
  $lates = App\Models\LatePayments::all();

  foreach ($lates as $key => $la) {
    $debt = $la->debt;

    $la->branch_id = $debt->branch_id;
    $la->region_id = $debt->region_id;
    $la->save();
}
echo "Listo";
});

Route::get('investmnetsChange', function(){
  $investments = App\Models\Investment::all();

  foreach ($investments as $key => $inv) {
    $vault = $inv->vault;
    $user  = $vault->user;

    $inv->branch_id = $user->branch_id;
    $inv->region_id = $user->region_id;
    $inv->save();
}
echo "Listo";
});

Route::get('boxCutsChange', function(){
  $boxcut = App\Models\BoxCut::all();

  foreach ($boxcut as $key => $box) {

    $user  = $box->user;

    $box->branch_id = $user->branch_id;
    $box->region_id = $user->region_id;
    $box->save();
}
echo "Listo";
});

// Routes credits restructures

Route::get('restructures', function()
{
  $clients = App\Models\Client::all();
  return view('restructures.index')
  ->with('clients', $clients);
});

Route::get('view-restructures/{id}', function($id)
{
  $client = App\Models\Client::find($id);
  $collection_credits = $client->credits;
  $credits = $collection_credits->where('status', 'MINISTRADO');
  // echo $client->folio;
  // dd($credits);
  return view('restructures.index-credits')
  ->with('credits', $credits);
});

Route::Post('consolidate', 'GeneralController@consolidate');

Route::get('paymentsCorrection', function(){
    $payments = App\Models\Payment::all()->where('status','Pagado');
    foreach ($payments as $key => $payment) {
     $payment->capital = 0;
     $payment->interest = 0;
     $payment->moratorium = 0;
     $payment->save();
 }
 echo "Pagos Pagados corregidos";
});

Route::get('paymentsCorrectionVencido', function(){
    $payments = App\Models\Payment::all()->where('status','Vencido');
    foreach ($payments as $key => $payment) {
        $cuota = $payment->payment;
        if ($cuota > 0) {
          if ($payment->moratorium > 0) {
            if ($cuota >= $payment->moratorium ) {
              $cuota = $cuota - $payment->moratorium;
              $payment->moratorium = 0;
          }
          else {
              $payment->moratorium = $payment->moratorium - $cuota;
              $cuota = 0;
          }
      }
  }
  if ($cuota > 0) {
      if ($payment->interest > 0) {
        if ($cuota >= $payment->interest ) {
          $cuota = $cuota - $payment->interest;
          $payment->interest = 0;
      }
      else {
          $payment->interest = $payment->interest - $cuota;
          $cuota = 0;
      }
  }
}
if ($cuota > 0) {
  if ($payment->capital > 0) {
    if ($cuota >= $payment->capital ) {
      $cuota = $cuota - $payment->capital;
      $payment->capital = 0;
  }
  else {
      $payment->capital = $payment->capital - $cuota;
      $cuota = 0;
  }
}
}

$payment->save();



}
echo "CORRECCION DE PAGOS VENCIDOS LISTO";

});

Route::get('reportPaymentCentro', 'GeneralController@reportPaymentCentro');
Route::get('reportPaymentAltos', 'GeneralController@reportPaymentAltos');
Route::get('reportPaymentMezcalapa', 'GeneralController@reportPaymentMezcalapa');
Route::get('reportPaymentNorte', 'GeneralController@reportPaymentNorte');
