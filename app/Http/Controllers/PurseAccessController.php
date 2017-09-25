<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePurseAccessRequest;
use App\Models\PurseAccess;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class PurseAccessController extends AppBaseController
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
		$query = PurseAccess::query();
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

        $purseAccesses = $query->get();

        return view('purseAccesses.index')
            ->with('purseAccesses', $purseAccesses)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new PurseAccess.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('purseAccesses.create');
	}

	/**
	 * Store a newly created PurseAccess in storage.
	 *
	 * @param CreatePurseAccessRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePurseAccessRequest $request)
	{
        $input = $request->all();

		$purseAccess = PurseAccess::create($input);

		Flash::message('PurseAccess saved successfully.');

		return redirect(route('purseAccesses.index'));
	}

	/**
	 * Display the specified PurseAccess.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$purseAccess = PurseAccess::find($id);

		if(empty($purseAccess))
		{
			Flash::error('PurseAccess not found');
			return redirect(route('purseAccesses.index'));
		}

		return view('purseAccesses.show')->with('purseAccess', $purseAccess);
	}

	/**
	 * Show the form for editing the specified PurseAccess.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$purseAccess = PurseAccess::find($id);

		if(empty($purseAccess))
		{
			Flash::error('PurseAccess not found');
			return redirect(route('purseAccesses.index'));
		}

		return view('purseAccesses.edit')->with('purseAccess', $purseAccess);
	}

	/**
	 * Update the specified PurseAccess in storage.
	 *
	 * @param  int    $id
	 * @param CreatePurseAccessRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePurseAccessRequest $request)
	{
		/** @var PurseAccess $purseAccess */
		$purseAccess = PurseAccess::find($id);

		if(empty($purseAccess))
		{
			Flash::error('PurseAccess not found');
			return redirect(route('purseAccesses.index'));
		}

		$purseAccess->fill($request->all());
		$purseAccess->save();

		Flash::message('PurseAccess updated successfully.');

		return redirect(route('purseAccesses.index'));
	}

	/**
	 * Remove the specified PurseAccess from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var PurseAccess $purseAccess */
		$purseAccess = PurseAccess::find($id);

		if(empty($purseAccess))
		{
			Flash::error('PurseAccess not found');
			return redirect(route('purseAccesses.index'));
		}

		$purseAccess->delete();

		Flash::message('PurseAccess deleted successfully.');

		return redirect(route('purseAccesses.index'));
	}
}
