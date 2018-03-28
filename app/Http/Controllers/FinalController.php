<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFinalRequest;
use App\Models\Final;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class FinalController extends AppBaseController
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
		$query = Final::query();
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

        $finals = $query->get();

        return view('finals.index')
            ->with('finals', $finals)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Final.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('finals.create');
	}

	/**
	 * Store a newly created Final in storage.
	 *
	 * @param CreateFinalRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFinalRequest $request)
	{
        $input = $request->all();

		$final = Final::create($input);

		Flash::message('Final saved successfully.');

		return redirect(route('finals.index'));
	}

	/**
	 * Display the specified Final.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$final = Final::find($id);

		if(empty($final))
		{
			Flash::error('Final not found');
			return redirect(route('finals.index'));
		}

		return view('finals.show')->with('final', $final);
	}

	/**
	 * Show the form for editing the specified Final.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$final = Final::find($id);

		if(empty($final))
		{
			Flash::error('Final not found');
			return redirect(route('finals.index'));
		}

		return view('finals.edit')->with('final', $final);
	}

	/**
	 * Update the specified Final in storage.
	 *
	 * @param  int    $id
	 * @param CreateFinalRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateFinalRequest $request)
	{
		/** @var Final $final */
		$final = Final::find($id);

		if(empty($final))
		{
			Flash::error('Final not found');
			return redirect(route('finals.index'));
		}

		$final->fill($request->all());
		$final->save();

		Flash::message('Final updated successfully.');

		return redirect(route('finals.index'));
	}

	/**
	 * Remove the specified Final from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Final $final */
		$final = Final::find($id);

		if(empty($final))
		{
			Flash::error('Final not found');
			return redirect(route('finals.index'));
		}

		$final->delete();

		Flash::message('Final deleted successfully.');

		return redirect(route('finals.index'));
	}
}
