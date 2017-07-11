<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class EmployeeController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = Employee::query();
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
		return view('employees.create');
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

		$employee = Employee::create($input);

		Flash::message('Employee saved successfully.');

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
		$employee = Employee::find($id);

		if(empty($employee))
		{
			Flash::error('Employee not found');
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
		$employee = Employee::find($id);

		if(empty($employee))
		{
			Flash::error('Employee not found');
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
		$employee = Employee::find($id);

		if(empty($employee))
		{
			Flash::error('Employee not found');
			return redirect(route('employees.index'));
		}

		$employee->fill($request->all());
		$employee->save();

		Flash::message('Employee updated successfully.');

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
		$employee = Employee::find($id);

		if(empty($employee))
		{
			Flash::error('Employee not found');
			return redirect(route('employees.index'));
		}

		$employee->delete();

		Flash::message('Employee deleted successfully.');

		return redirect(route('employees.index'));
	}
}
