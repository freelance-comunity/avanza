<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateIncomeRequest;
use App\Models\Income;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class IncomeController extends AppBaseController
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
		$query = Income::query();
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

        $incomes = $query->get();

        return view('incomes.index')
            ->with('incomes', $incomes)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Income.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('incomes.create');
	}

	/**
	 * Store a newly created Income in storage.
	 *
	 * @param CreateIncomeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateIncomeRequest $request)
	{
        $input = $request->all();

		$income = Income::create($input);

		Flash::message('Income saved successfully.');

		return redirect(route('incomes.index'));
	}

	/**
	 * Display the specified Income.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$income = Income::find($id);

		if(empty($income))
		{
			Flash::error('Income not found');
			return redirect(route('incomes.index'));
		}

		return view('incomes.show')->with('income', $income);
	}

	/**
	 * Show the form for editing the specified Income.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$income = Income::find($id);

		if(empty($income))
		{
			Flash::error('Income not found');
			return redirect(route('incomes.index'));
		}

		return view('incomes.edit')->with('income', $income);
	}

	/**
	 * Update the specified Income in storage.
	 *
	 * @param  int    $id
	 * @param CreateIncomeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateIncomeRequest $request)
	{
		/** @var Income $income */
		$income = Income::find($id);

		if(empty($income))
		{
			Flash::error('Income not found');
			return redirect(route('incomes.index'));
		}

		$income->fill($request->all());
		$income->save();

		Flash::message('Income updated successfully.');

		return redirect(route('incomes.index'));
	}

	/**
	 * Remove the specified Income from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Income $income */
		$income = Income::find($id);

		if(empty($income))
		{
			Flash::error('Income not found');
			return redirect(route('incomes.index'));
		}

		$income->delete();

		Flash::message('Income deleted successfully.');

		return redirect(route('incomes.index'));
	}
}
