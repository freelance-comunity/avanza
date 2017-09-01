<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateExpenditureRequest;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class ExpenditureController extends AppBaseController
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
		$query = Expenditure::query();
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

        $expenditures = $query->get();

        return view('expenditures.index')
            ->with('expenditures', $expenditures)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Expenditure.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('expenditures.create');
	}

	/**
	 * Store a newly created Expenditure in storage.
	 *
	 * @param CreateExpenditureRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateExpenditureRequest $request)
	{
        $input = $request->all();

		$expenditure = Expenditure::create($input);

		Flash::message('Expenditure saved successfully.');

		return redirect(route('expenditures.index'));
	}

	/**
	 * Display the specified Expenditure.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$expenditure = Expenditure::find($id);

		if(empty($expenditure))
		{
			Flash::error('Expenditure not found');
			return redirect(route('expenditures.index'));
		}

		return view('expenditures.show')->with('expenditure', $expenditure);
	}

	/**
	 * Show the form for editing the specified Expenditure.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$expenditure = Expenditure::find($id);

		if(empty($expenditure))
		{
			Flash::error('Expenditure not found');
			return redirect(route('expenditures.index'));
		}

		return view('expenditures.edit')->with('expenditure', $expenditure);
	}

	/**
	 * Update the specified Expenditure in storage.
	 *
	 * @param  int    $id
	 * @param CreateExpenditureRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateExpenditureRequest $request)
	{
		/** @var Expenditure $expenditure */
		$expenditure = Expenditure::find($id);

		if(empty($expenditure))
		{
			Flash::error('Expenditure not found');
			return redirect(route('expenditures.index'));
		}

		$expenditure->fill($request->all());
		$expenditure->save();

		Flash::message('Expenditure updated successfully.');

		return redirect(route('expenditures.index'));
	}

	/**
	 * Remove the specified Expenditure from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Expenditure $expenditure */
		$expenditure = Expenditure::find($id);

		if(empty($expenditure))
		{
			Flash::error('Expenditure not found');
			return redirect(route('expenditures.index'));
		}

		$expenditure->delete();

		Flash::message('Expenditure deleted successfully.');

		return redirect(route('expenditures.index'));
	}
}
