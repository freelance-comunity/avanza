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

Route::get('solicitud/{id}', function($id){
    $credit = App\Models\Credit::find($id);
    $pdf = PDF::loadView('credits.solicitud', compact('credit'));
    return $pdf->download('solicitud.pdf');
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
    $client = App\Models\Client::find(3);

    $references = $client->references;
    echo $client->firts_name;
    echo "<br>";
    foreach ($references as $key => $value) {
        echo $value->firts_name_reference;
        echo "<br>";
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

Route::resource('roles', 'RoleController');

Route::get('roles/{id}/delete', [
    'as' => 'roles.delete',
    'uses' => 'RoleController@destroy',
    ]);


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

Route::post('updatepassword', 'EmployeeController@updatePassword');
/*=====  End of Routes for Employee  ======*/

Route::get('formwizard', function(){
	return view('wizard');
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

