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


Route::resource('employees', 'EmployeeController');

Route::get('employees/{id}/delete', [
    'as' => 'employees.delete',
    'uses' => 'EmployeeController@destroy',
]);

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