<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEmployeelocationRequest;
use App\Models\Employeelocation;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use App\User;
use Toastr;

class EmployeelocationController extends AppBaseController
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
		$query = Employeelocation::query();
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

		$employeelocations = $query->get();

		return view('employeelocations.index')
		->with('employeelocations', $employeelocations)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Employeelocation.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('employeelocations.create');
	}

	/**
	 * Store a newly created Employeelocation in storage.
	 *
	 * @param CreateEmployeelocationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEmployeelocationRequest $request)
	{
		$input = $request->all();

		$employeelocation = Employeelocation::create($input);

		Flash::message('Employeelocation saved successfully.');

		return redirect(route('employeelocations.index'));
	}

	/**
	 * Display the specified Employeelocation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$employeelocation = Employeelocation::find($id);

		if(empty($employeelocation))
		{
			Flash::error('Employeelocation not found');
			return redirect(route('employeelocations.index'));
		}

		return view('employeelocations.show')->with('employeelocation', $employeelocation);
	}

	/**
	 * Show the form for editing the specified Employeelocation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$employeelocation = Employeelocation::find($id);

		if(empty($employeelocation))
		{
			Flash::error('Employeelocation not found');
			return redirect(route('employeelocations.index'));
		}

		return view('employeelocations.edit')->with('employeelocation', $employeelocation);
	}

	/**
	 * Update the specified Employeelocation in storage.
	 *
	 * @param  int    $id
	 * @param CreateEmployeelocationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateEmployeelocationRequest $request)
	{
		/** @var Employeelocation $employeelocation */
		$employeelocation = Employeelocation::find($id);

		if(empty($employeelocation))
		{
			Flash::error('Employeelocation not found');
			return redirect(route('employeelocations.index'));
		}

		$employeelocation->fill($request->all());
		$employeelocation->save();

		Toastr::info('Personal editado exitosamente.', 'PERSONAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('employees.index'));
	}

	/**
	 * Remove the specified Employeelocation from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Employeelocation $employeelocation */
		$employeelocation = Employeelocation::find($id);

		if(empty($employeelocation))
		{
			Flash::error('Employeelocation not found');
			return redirect(route('employeelocations.index'));
		}

		$employeelocation->delete();

		Flash::message('Employeelocation deleted successfully.');

		return redirect(route('employeelocations.index'));
	}
}
