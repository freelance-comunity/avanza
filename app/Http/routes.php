<?php
Route::get('/toastr', function(){
	Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);

    return view('toastr');
});

Route::get('/', function () {
	return redirect('login');
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
