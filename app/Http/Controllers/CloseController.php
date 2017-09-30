<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCloseRequest;
use App\Models\Close;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class CloseController extends AppBaseController
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
		$query = Close::query();
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

        $closes = $query->get();

        return view('closes.index')
            ->with('closes', $closes)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Close.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('closes.create');
	}

	/**
	 * Store a newly created Close in storage.
	 *
	 * @param CreateCloseRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCloseRequest $request)
	{
        $input = $request->all();

		$close = Close::create($input);

		Flash::message('Close saved successfully.');

		return redirect(route('closes.index'));
	}

	/**
	 * Display the specified Close.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$close = Close::find($id);

		if(empty($close))
		{
			Flash::error('Close not found');
			return redirect(route('closes.index'));
		}

		return view('closes.show')->with('close', $close);
	}

	/**
	 * Show the form for editing the specified Close.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$close = Close::find($id);

		if(empty($close))
		{
			Flash::error('Close not found');
			return redirect(route('closes.index'));
		}

		return view('closes.edit')->with('close', $close);
	}

	/**
	 * Update the specified Close in storage.
	 *
	 * @param  int    $id
	 * @param CreateCloseRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCloseRequest $request)
	{
		/** @var Close $close */
		$close = Close::find($id);

		if(empty($close))
		{
			Flash::error('Close not found');
			return redirect(route('closes.index'));
		}

		$close->fill($request->all());
		$close->save();

		Flash::message('Close updated successfully.');

		return redirect(route('closes.index'));
	}

	/**
	 * Remove the specified Close from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Close $close */
		$close = Close::find($id);

		if(empty($close))
		{
			Flash::error('Close not found');
			return redirect(route('closes.index'));
		}

		$close->delete();

		Flash::message('Close deleted successfully.');

		return redirect(route('closes.index'));
	}
}
