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

		$input['user_id'] = $id_user;
		$input['name_employee'] = $employee->name." ".$employee->father_last_name." ".$employee->mother_last_name;
		$input['number_employee'] = $employee->id;
		$input['position'] = $employee->roles;
		$roster = Roster::create($input);

		Flash::message('Roster saved successfully.');

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
