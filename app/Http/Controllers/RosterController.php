<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRosterRequest;
use App\Models\Roster;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use App\User;
use Toastr;
use App\Models\Vault;
use Auth;

class RosterController extends AppBaseController
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
		$query = Roster::query();
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

		$rosters = $query->get();

		return view('rosters.index')
		->with('rosters', $rosters)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Roster.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('rosters.create');
	}

	/**
	 * Store a newly created Roster in storage.
	 *
	 * @param CreateRosterRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRosterRequest $request)
	{	

		$input = $request->all();
		$id_user = $request->input('name_employee');
		$employee = User::find($id_user);
		if($request->input('coordinating_firm')){
			$data_uri = $request->input('coordinating_firm');
			$encoded_image = explode(",", $data_uri)[1];
			$decoded_image = base64_decode($encoded_image);
			$url_coordinating = 'signature_coordinating'. '-id-'. $request->input('user_id') . rand(111,9999).'.png';

			file_put_contents('../public/uploads/rosters/' . $url_coordinating, $decoded_image);
		}
		if($request->input('employee_firm')){
			$data_uri = $request->input('employee_firm');
			$encoded_image = explode(",", $data_uri)[1];
			$decoded_image = base64_decode($encoded_image);
			$url_employee = 'signature_employee'. '-id-'. $request->input('user_id') . rand(111,9999).'.png';

			file_put_contents('../public/uploads/rosters/' . $url_employee, $decoded_image);
		}
		

		$input['user_id'] = $id_user;
		$input['name_employee'] = $employee->name." ".$employee->father_last_name." ".$employee->mother_last_name;
		$input['number_employee'] = $employee->id;
		$input['position'] = $employee->roles;
		$input['coordinating_firm']   = $url_coordinating;
		$input['employee_firm']   = $url_employee;
		
		$roster = Roster::create($input);


		$user_collector = Auth::user();
		$vault = $user_collector->vault;
		$vault->ammount = $vault->ammount - $roster->grandchild_pay;
		$vault->save();
		Toastr::success('Sueldo Pagado', 'SUELDOS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('rosters.index'));
		// dd($input);
	}

	/**
	 * Display the specified Roster.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$roster = Roster::find($id);

		if(empty($roster))
		{
			Flash::error('Roster not found');
			return redirect(route('rosters.index'));
		}

		return view('rosters.show')->with('roster', $roster);
	}

	/**
	 * Show the form for editing the specified Roster.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$roster = Roster::find($id);

		if(empty($roster))
		{
			Flash::error('Roster not found');
			return redirect(route('rosters.index'));
		}

		return view('rosters.edit')->with('roster', $roster);
	}

	/**
	 * Update the specified Roster in storage.
	 *
	 * @param  int    $id
	 * @param CreateRosterRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateRosterRequest $request)
	{
		/** @var Roster $roster */
		$roster = Roster::find($id);

		if(empty($roster))
		{
			Flash::error('Roster not found');
			return redirect(route('rosters.index'));
		}

		$roster->fill($request->all());
		$roster->save();

		Flash::message('Roster updated successfully.');

		return redirect(route('rosters.index'));
	}

	/**
	 * Remove the specified Roster from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Roster $roster */
		$roster = Roster::find($id);

		if(empty($roster))
		{
			Flash::error('Roster not found');
			return redirect(route('rosters.index'));
		}

		$roster->delete();

		Flash::message('Roster deleted successfully.');

		return redirect(route('rosters.index'));
	}
}
