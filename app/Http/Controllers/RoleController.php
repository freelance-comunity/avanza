<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRoleRequest;
use App\Role;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Illuminate\Support\Str;
use Auth;

class RoleController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');

    }
    
	public function index(Request $request)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return view('home');
		}
		$query = Role::query();
        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute){
            if($request[$attribute] == true)
            {
                $query->where($attribute, $request[$attribute]);
                $attributes[$attribute] =  $request[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        $roles = $query->get();

        return view('roles.index')
            ->with('roles', $roles)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Role.
	 *
	 * @return Response
	 */
	public function create()
	{	if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('roles.index'));
		}
		return view('roles.create');
	}

	/**
	 * Store a newly created Role in storage.
	 *
	 * @param CreateRoleRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRoleRequest $request)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('roles.index'));
		}

        $input = $request->all();
       	$name = Str::lower($request->input('name'));
        $input['name'] = str_slug($name);

		$role = Role::create($input);

		Toastr::success('Rol creado exitosamente.', 'Title', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('roles.index'));
	}

	/**
	 * Display the specified Role.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('roles.index'));
		}
		$role = Role::find($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('roles.index'));
		}

		return view('roles.show')->with('role', $role);
	}

	/**
	 * Show the form for editing the specified Role.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('roles.index'));
		}
		$role = Role::find($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('roles.index'));
		}

		return view('roles.edit')->with('role', $role);
	}

	/**
	 * Update the specified Role in storage.
	 *
	 * @param  int    $id
	 * @param CreateRoleRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateRoleRequest $request)
	{	
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('roles.index'));
		}
		/** @var Role $role */
		$role = Role::find($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('roles.index'));
		}

		$role->fill($request->all());
		$role->save();

		Toastr::info('Rol editado exitosamente.', 'Title', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('roles.index'));
	}

	/**
	 * Remove the specified Role from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('roles.index'));
		}
		/** @var Role $role */
		$role = Role::find($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('roles.index'));
		}

		$role->delete();

		Toastr::success('Rol eliminado exitosamente.', 'Roles del Sistema', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('roles.index'));
	}
}
