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

/*$date = \Carbon\Carbon::now()->format('l')->diffForHumans();
echo $date;*/
echo $date = \Carbon\Carbon::now()->diffForHumans();
echo "<br>";

$payment = App\Models\Payment::first();
echo $payment->created_at->format('l d,F Y');
echo "<br>";
echo $payment->updated_at->format('l d,F Y');
echo "<br>";
echo $payment->day->format('l d,F Y');
echo "<br>";

$credits = App\Models\Credit::first();
echo $credits->created_at->format('l d,F Y');
echo "<br>";
echo $credits->updated_at->format('l d,F Y');
echo "<br>";
echo  $credits->date->format('l d,F Y');

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


Route::get('cl', function(){
    $latePayments = App\Models\LatePayments::find(54);
    echo $latePayments->id;
    echo "<br>";
    $payment = $latePayments->payment;
    echo $latePayments->payment->id;
    echo "<br>";
    $debt = $payment->debt;
    echo $debt->id;
    echo "<br>";
    $credit = $debt->credit;
    echo $credit->id;
    echo "<br>";
    $client = $credit->client;
    echo $client->id;
    echo "<br>";

    $cliente = $payment->debt->credit->client;
    echo $cliente->id;

    echo "<br>";
    $latePayments = $payment->latePayments;

    foreach ($latePayments as $key => $value) {
        echo $value->id;
        echo "<br>";
    }
});
Route::get('graphics',function(){

    return view('graphics');
});

Route::get('unlocked/{id}' , 'PaymentController@unlocked');
Route::get('unlockedclient/{id}' , 'ClientController@unlockedclient');

Route::get('pagado',function(){

    $payments = App\Models\Payment::where('debt_id',62)->where('status','Pagado')->get();
    foreach ($payments as  $value) {
      if ($payments->last() == $value) {
          echo $value->status;
      }

    }



});




