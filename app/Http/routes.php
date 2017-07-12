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