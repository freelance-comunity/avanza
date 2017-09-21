<?php
/*===================================
=            Test Routes            =
===================================*/
Route::get('pdf/{id}', function($id){
    $client = App\Models\Client::find($id);
    $document = $client->document;
    $pdf = PDF::loadView('clients.documents', compact('document'));
    return $pdf->download('documents.pdf');
});


Route::get('signature', function(){
    return view('signature');
});

Route::post('save-signature', function(Illuminate\Http\Request  $request){
    $data_uri = $request->input('signature');
    $encoded_image = explode(",", $data_uri)[1];
    $decoded_image = base64_decode($encoded_image);
    $url = 'signature'. rand(111,9999).'.png';

    file_put_contents('../public/uploads/signatures/' . $url, $decoded_image);
    echo $url;
});

Route::get('validation', function(){
    return view('validation');
});

Route::get('test-relationship', function(){
    $client = App\Models\Client::find(1);

    $references = $client->references;
    echo $client->firts_name;
    echo "<br>";
    foreach ($references as $key => $value) {
        echo $value->firts_name_reference;
        echo "<br>";
    }

});

Route::get('geolocation', function(){
    return view('geolocation');
});

Route::get('division', function(){
 $payment = App\Models\Payment::find(2242);
 $debt = $payment->debt;
 echo $debt->ammount;
 $credit = $debt->credit;

 echo $credit->ammount;
});

Route::post('process', 'PaymentController@process');

Route::post('/import-excel', 'ClientController@importClients');

Route::get('test-boveda', function(){
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

Route::get('testDate', function(){
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

Route::get('ciclos', function(){
    $payment = 150;
    $extra   = $payment - 50;
    $budget  = intdiv($extra, 50);
    $r       = fmod($extra, 50);

    $id_online = 1;
    $id_next   = $id_online + 1;

    echo "Nos alcanza para pagar ".$budget." pagos completos";
    echo "<br>";
    if ($r > 0) {
        echo "Y uno por la cantidad de ".$r;
        echo "<br>";
    }

    while ($budget > 0) {
     echo "PAGO #".$id_next;
     echo "<br>";
     $id_next = $id_next + 1;
     $budget = $budget - 1;
 }
});

/*=====  End of Test Routes  ======*/


Route::get('/', function () {
    if($user = Auth::user())
        {
            return view('home');
        }
        if(Auth::guest())
            {
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

Route::get('/deletepermission/{role}/{permission}', function($role, $permission){
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

Route::get('charts','BranchController@charts');

/*========================================
=            Routes for Employee            =
========================================*/
Route::resource('employees', 'EmployeeController');

Route::get('employees/{id}/delete', [
    'as' => 'employees.delete',
    'uses' => 'EmployeeController@destroy',
]);

Route::get('/deleterole/{employee}/{role}', function($employee, $role){
  $employee_quit = App\User::find($employee);
  $role = App\Role::find($role);
  $employee_quit->roles()->detach($role);
  Toastr::success('Privilegios removidos exitosamente.', 'ROLES', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
  return redirect(route('employees.index'));
});

Route::post('/updateroles', function(Illuminate\Http\Request  $request) {
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

Route::get('update', function(){
    return view('employees.updatepassword');
});

Route::get('profile', function(){
    return view('employees.profile');
});

Route::post('updatepassword', 'EmployeeController@updatePassword');

Route::get('vault', 'GeneralController@getPromoter');

Route::get('showVault/{id}', 'GeneralController@showVault');

Route::post('addVault', 'GeneralController@addVault');

Route::post('addCash', 'GeneralController@addCash');

Route::post('recordExpense', 'GeneralController@recordExpense');

/*=====  End of Routes for Employee  ======*/

Route::get('formwizard', function(){
	return view('wizard');
});
Route::get('teclado', function(){
    return view('teclado');
});
Route::resource('clients', 'ClientController');

Route::get('clients/{id}/delete', [
    'as' => 'clients.delete',
    'uses' => 'ClientController@destroy',
]);

Route::get('client/{id}/',[
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


Route::get('creditsClient/{id}/{product}',[
    'as' => 'client.creditsClient',
    'uses' => 'ClientController@creditsClient',
]);


Route::get('renovate/{id}/{product}', function($id){
    $client = App\Models\Client::find($id);
    return view('credits.renovate')
    ->with('client',$client);
});

Route::post('renovation', 'CreditController@renovation');

Route::get('solicitud/{id}', function($id){
    $credit = App\Models\Credit::find($id);
    $pdf = PDF::loadView('credits.solicitud', compact('credit'));
    return $pdf->download('solicitud.pdf');
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

Route::get('carbon',function(){
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


Route::get('graphics',function(){

    return view('graphics');
});

Route::get('unlocked/{id}' , 'PaymentController@unlocked');
Route::get('unlockedclient/{id}' , 'ClientController@unlockedclient');
Route::get('cancel/{id}' , 'PaymentController@cancel');
Route::get('mora/{id}' , 'PaymentController@mora');



Route::get('mexico', function(){
    return view('mexico');
});

Route::get('executives', function(){
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

Route::get('updatephoto/{id}', function($id) {
    $client = App\Models\Client::find($id);
    return view('clients.upload')
    ->with('client', $client);
});
Route::get('updatephotos/{id}', function($id) {
    $document = App\Models\Clientdocuments::find($id);
    return view('clientdocuments.uploads')
    ->with('document', $document);
});
Route::get('ine/{id}', function($id) {
    $document = App\Models\Clientdocuments::find($id);
    return view('clientdocuments.ine')
    ->with('document', $document);
});
Route::get('curps/{id}', function($id) {
    $document = App\Models\Clientdocuments::find($id);
    return view('clientdocuments.curps')
    ->with('document', $document);
});
Route::post('updatephoto', 'Photocontroller@update');
Route::post('ine', 'Photocontroller@ine');
Route::post('curps', 'Photocontroller@curps');
Route::post('updatephotos', 'Photocontroller@cfe');
Route::post('avatar','Photocontroller@avatar');


Route::get('ajax', function(){
    $date = \Carbon\Carbon::now();
    $dues = 25;
    $amount = 39;
    for ($i=0; $i <= $dues ; $i++) { 
        echo $dues; echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
        echo $date->addDay(); echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
        echo $amount; echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
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

Route::get('id',function(){
$expenditures = App\Models\Expenditure::find(1);
echo $expenditures->id;

$credit = $expenditures->credit;
echo $credit->id;
});


Route::resource('expenditureCredits', 'ExpenditureCreditController');

Route::get('expenditureCredits/{id}/delete', [
    'as' => 'expenditureCredits.delete',
    'uses' => 'ExpenditureCreditController@destroy',
]);
