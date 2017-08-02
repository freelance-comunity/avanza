<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDebtRequest;
use App\Models\Debt;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class DebtController extends AppBaseController
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
		$query = Debt::query();
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

        $debts = $query->get();

        return view('debts.index')
            ->with('debts', $debts)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Debt.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('debts.create');
	}

	/**
	 * Store a newly created Debt in storage.
	 *
	 * @param CreateDebtRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDebtRequest $request)
	{
        $input = $request->all();

		$debt = Debt::create($input);

		Flash::message('Debt saved successfully.');

		return redirect(route('debts.index'));
	}

	/**
	 * Display the specified Debt.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$debt = Debt::find($id);

		if(empty($debt))
		{
			Flash::error('Debt not found');
			return redirect(route('debts.index'));
		}

		return view('debts.show')->with('debt', $debt);
	}

	/**
	 * Show the form for editing the specified Debt.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$debt = Debt::find($id);

		if(empty($debt))
		{
			Flash::error('Debt not found');
			return redirect(route('debts.index'));
		}

		return view('debts.edit')->with('debt', $debt);
	}

	/**
	 * Update the specified Debt in storage.
	 *
	 * @param  int    $id
	 * @param CreateDebtRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateDebtRequest $request)
	{
		/** @var Debt $debt */
		$debt = Debt::find($id);

		if(empty($debt))
		{
			Flash::error('Debt not found');
			return redirect(route('debts.index'));
		}

		$debt->fill($request->all());
		$debt->save();

		Flash::message('Debt updated successfully.');

		return redirect(route('debts.index'));
	}

	/**
	 * Remove the specified Debt from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Debt $debt */
		$debt = Debt::find($id);

		if(empty($debt))
		{
			Flash::error('Debt not found');
			return redirect(route('debts.index'));
		}

		$debt->delete();

		Flash::message('Debt deleted successfully.');

		return redirect(route('debts.index'));
	}
}
