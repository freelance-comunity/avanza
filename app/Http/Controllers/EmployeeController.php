<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEmployeeRequest;
use App\User;
use App\Models\Branch;
use App\Models\Employeelocation;
use App\Models\Employeecredentials;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Image;
use Hash;

class EmployeeController extends AppBaseController
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
		$query = User::query();
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

		$employees = $query->get();

		return view('employees.index')
		->with('employees', $employees)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Employee.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$branches = Branch::pluck('name', 'id');
		return view('employees.create')
		->with('branches', $branches);
	}

	/**
	 * Store a newly created Employee in storage.
	 *
	 * @param CreateEmployeeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEmployeeRequest $request)
	{
		$input = $request->all();
		$input['password'] = Hash::make('micontraseña');

		/* Save avatar employee */
		if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
			$input['avatar'] = $filename;
		}

		/* Save new employee */		
		$employee = User::create($input);

		/* Attach roles */
		$employee->roles()->sync($request->input('roles', []));
		

		/* Get employee location data  */		
		$data_location['country'] = $request->input('country');
		$data_location['state']   = $request->input('state');
		$data_location['municipality'] = $request->input('municipality');
		$data_location['colony']  = $request->input('colony');
		$data_location['type_of_road'] = $request->input('type_of_road');
		$data_location['name_road'] = $request->input('name_road');
		$data_location['outdoor_number'] = $request->input('outdoor_number');
		$data_location['interior_number'] = $request->input('interior_number');
		$data_location['postal_code'] = $request->input('postal_code');
		$data_location['user_id'] = $employee->id;

		/* Save employee location data */
		$location = Employeelocation::create($data_location);

		/* Get employee credentials data */
		$data_credentials['ine'] = $request->input('ine');
		$data_credentials['curp'] = $request->input('curp');
		$data_credentials['rfc'] = $request->input('rfc');
		$data_credentials['passport'] = $request->input('passport');
		$data_credentials['number_imss'] = $request->input('number_imss');
		$data_credentials['driver_license'] = $request->input('driver_license');
		$data_credentials['professional_id'] = $request->input('professional_id');
		$data_credentials['user_id'] = $employee->id;

		/* Save employee credentials data */	
		$credentials = Employeecredentials::create($data_credentials);
		
		
		Toastr::success('Personal creado exitosamente.', 'PERSONAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('employees.index'));
	}

	/**
	 * Display the specified Employee.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$employee = User::find($id);

		if(empty($employee))
		{
			Toastr::error('Personal no encontrado en nuestros registros.', 'PERSONAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('employees.index'));
		}

		return view('employees.show')->with('employee', $employee);
	}

	/**
	 * Show the form for editing the specified Employee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$employee = User::find($id);

		if(empty($employee))
		{
			Toastr::error('Personal no encontrado en nuestros registros.', 'PERSONAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('employees.index'));
		}

		return view('employees.edit')->with('employee', $employee);
	}

	/**
	 * Update the specified Employee in storage.
	 *
	 * @param  int    $id
	 * @param CreateEmployeeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateEmployeeRequest $request)
	{
		/** @var Employee $employee */
		$employee = User::find($id);

		if(empty($employee))
		{
			Toastr::error('Personal no encontrado en nuestros registros.', 'PERSONAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('employees.index'));
		}

		$employee->fill($request->all());
		$employee->save();

		Toastr::info('Personal editado exitosamente.', 'PERSONAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('employees.index'));
	}

	/**
	 * Remove the specified Employee from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Employee $employee */
		$employee = User::find($id);

		if(empty($employee))
		{
			Toastr::error('Personal no encontrado en nuestros registros.', 'PERSONAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('employees.index'));
		}

		$employee->delete();

		Toastr::info('Personal eliminado exitosamente.', 'PERSONAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('employees.index'));
	}

	public function updatePassword(Request $request)
	{
		$user = User::find($request->input('user_id'));
		$user->password = Hash::make($request->input('password'));
		$user->save();

		Toastr::info('Contraseña actualizada exitosamente.', 'PERSONAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect()->back();
	}

}
