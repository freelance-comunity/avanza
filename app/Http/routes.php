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
