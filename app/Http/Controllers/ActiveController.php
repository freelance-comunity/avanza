<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateActiveRequest;
use App\Models\Active;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class ActiveController extends AppBaseController
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
		$query = Active::query();
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

        $actives = $query->get();

        return view('actives.index')
            ->with('actives', $actives)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Active.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('actives.create');
	}

	/**
	 * Store a newly created Active in storage.
	 *
	 * @param CreateActiveRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateActiveRequest $request)
	{
        $input = $request->all();

		$active = Active::create($input);

		Flash::message('Active saved successfully.');

		return redirect(route('actives.index'));
	}

	/**
	 * Display the specified Active.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$active = Active::find($id);

		if(empty($active))
		{
			Flash::error('Active not found');
			return redirect(route('actives.index'));
		}

		return view('actives.show')->with('active', $active);
	}

	/**
	 * Show the form for editing the specified Active.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$active = Active::find($id);

		if(empty($active))
		{
			Flash::error('Active not found');
			return redirect(route('actives.index'));
		}

		return view('actives.edit')->with('active', $active);
	}

	/**
	 * Update the specified Active in storage.
	 *
	 * @param  int    $id
	 * @param CreateActiveRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateActiveRequest $request)
	{
		/** @var Active $active */
		$active = Active::find($id);

		if(empty($active))
		{
			Flash::error('Active not found');
			return redirect(route('actives.index'));
		}

		$active->fill($request->all());
		$active->save();

		Flash::message('Active updated successfully.');

		return redirect(route('actives.index'));
	}

	/**
	 * Remove the specified Active from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Active $active */
		$active = Active::find($id);

		if(empty($active))
		{
			Flash::error('Active not found');
			return redirect(route('actives.index'));
		}

		$active->delete();

		Flash::message('Active deleted successfully.');

		return redirect(route('actives.index'));
	}
}
