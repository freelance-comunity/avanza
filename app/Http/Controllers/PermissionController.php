<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePermissionRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Illuminate\Support\Str;
use Auth;

class PermissionController extends AppBaseController
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
	}
	
	public function index(Request $request)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return view('home');
		}
		$query = Permission::query();
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

		$permissions = $query->get();

		return view('permissions.index')
		->with('permissions', $permissions)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Permission.
	 *
	 * @return Response
	 */
	public function create()
	{	if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('permissions.index'));
		}
		return view('permissions.create');
	}

	/**
	 * Store a newly created Permission in storage.
	 *
	 * @param CreatePermissionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePermissionRequest $request)
	{	
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('permissions.index'));
		}
		$input = $request->all();
		$name = Str::lower($request->input('name'));
		$input['name'] = str_slug($name);

		$permission = Permission::create($input);

		Toastr::success('Permiso creado exitosamente.', 'PERMISOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('permissions.index'));
	}

	/**
	 * Display the specified Permission.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('permissions.index'));
		}
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		return view('permissions.show')->with('permission', $permission);
	}

	/**
	 * Show the form for editing the specified Permission.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('permissions.index'));
		}
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		return view('permissions.edit')->with('permission', $permission);
	}

	/**
	 * Update the specified Permission in storage.
	 *
	 * @param  int    $id
	 * @param CreatePermissionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePermissionRequest $request)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('permissions.index'));
		}
		/** @var Permission $permission */
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		$permission->fill($request->all());
		$permission->save();

		Toastr::info('Permiso editado exitosamente.', 'PERMISOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('permissions.index'));
	}

	/**
	 * Remove the specified Permission from storage.
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
		/** @var Permission $permission */
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		$permission->delete();

		Toastr::success('Permiso eliminado exitosamente.', 'PERMISOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('permissions.index'));
	}

	public function permissions($id)
	{	
		$role = Role::find($id);
		$permissions = Permission::all();
		$permissions_role = $role->permissions;
		$collection = $permissions;
		$diff = $collection->diff($permissions_role);
		$diff->all();

		return view('roles.permission-to-role')
		->with('permissions', $diff)
		->with('role', $role);
	}

	public function addPermission(Request $request)
	{	
		$id_role = $request->input('rol_id');
		$input = $request->all();
		
		foreach ($input['rows'] as $row) {
			$role = Role::find($id_role);
			$id_permission = $row['id'];
			$permission = Permission::find($id_permission);
			$assigmment = $role->attachPermission($permission);
		}
		Toastr::success('Permisos asignados correctamente.', 'PERMISOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
		return redirect(route('roles.index'));	
	}

	public function permissionEdit(Request $request)
	{
		$id_role = $request->input('rol_id');
		$input = $request->all();
		
		foreach ($input['rows'] as $row) {
			$role = Role::find($id_role);	
			$id_permission = $row['id'];
			$permission = Permission::find($id_permission);
			$revoke_permission = $role->permissions()->detach($permission);
		}
		Alert::success('Se eliminaron lor permisos al Rol.');
		return redirect(route('roles.index'));
	}
}
