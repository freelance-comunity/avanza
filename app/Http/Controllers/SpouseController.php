<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSpouseRequest;
use App\Models\Spouse;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class SpouseController extends AppBaseController
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
		$query = Spouse::query();
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

        $spouses = $query->get();

        return view('spouses.index')
            ->with('spouses', $spouses)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Spouse.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('spouses.create');
	}

	/**
	 * Store a newly created Spouse in storage.
	 *
	 * @param CreateSpouseRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSpouseRequest $request)
	{
        $input = $request->all();

		$spouse = Spouse::create($input);

		Flash::message('Spouse saved successfully.');

		return redirect(route('spouses.index'));
	}

	/**
	 * Display the specified Spouse.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$spouse = Spouse::find($id);

		if(empty($spouse))
		{
			Flash::error('Spouse not found');
			return redirect(route('spouses.index'));
		}

		return view('spouses.show')->with('spouse', $spouse);
	}

	/**
	 * Show the form for editing the specified Spouse.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$spouse = Spouse::find($id);

		if(empty($spouse))
		{
			Flash::error('Spouse not found');
			return redirect(route('spouses.index'));
		}

		return view('spouses.edit')->with('spouse', $spouse);
	}

	/**
	 * Update the specified Spouse in storage.
	 *
	 * @param  int    $id
	 * @param CreateSpouseRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateSpouseRequest $request)
	{
		/** @var Spouse $spouse */
		$spouse = Spouse::find($id);

		if(empty($spouse))
		{
			Flash::error('Spouse not found');
			return redirect(route('spouses.index'));
		}

		$spouse->fill($request->all());
		$spouse->save();

		Flash::message('Spouse updated successfully.');

		return redirect(route('spouses.index'));
	}

	/**
	 * Remove the specified Spouse from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Spouse $spouse */
		$spouse = Spouse::find($id);

		if(empty($spouse))
		{
			Flash::error('Spouse not found');
			return redirect(route('spouses.index'));
		}

		$spouse->delete();

		Flash::message('Spouse deleted successfully.');

		return redirect(route('spouses.index'));
	}
}
