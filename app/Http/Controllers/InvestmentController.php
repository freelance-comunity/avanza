<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateInvestmentRequest;
use App\Models\Investment;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class InvestmentController extends AppBaseController
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
		$query = Investment::query();
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

        $investments = $query->get();

        return view('investments.index')
            ->with('investments', $investments)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Investment.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('investments.create');
	}

	/**
	 * Store a newly created Investment in storage.
	 *
	 * @param CreateInvestmentRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInvestmentRequest $request)
	{
        $input = $request->all();

		$investment = Investment::create($input);

		Flash::message('Investment saved successfully.');

		return redirect(route('investments.index'));
	}

	/**
	 * Display the specified Investment.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$investment = Investment::find($id);

		if(empty($investment))
		{
			Flash::error('Investment not found');
			return redirect(route('investments.index'));
		}

		return view('investments.show')->with('investment', $investment);
	}

	/**
	 * Show the form for editing the specified Investment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$investment = Investment::find($id);

		if(empty($investment))
		{
			Flash::error('Investment not found');
			return redirect(route('investments.index'));
		}

		return view('investments.edit')->with('investment', $investment);
	}

	/**
	 * Update the specified Investment in storage.
	 *
	 * @param  int    $id
	 * @param CreateInvestmentRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateInvestmentRequest $request)
	{
		/** @var Investment $investment */
		$investment = Investment::find($id);

		if(empty($investment))
		{
			Flash::error('Investment not found');
			return redirect(route('investments.index'));
		}

		$investment->fill($request->all());
		$investment->save();

		Flash::message('Investment updated successfully.');

		return redirect(route('investments.index'));
	}

	/**
	 * Remove the specified Investment from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Investment $investment */
		$investment = Investment::find($id);

		if(empty($investment))
		{
			Flash::error('Investment not found');
			return redirect(route('investments.index'));
		}

		$investment->delete();

		Flash::message('Investment deleted successfully.');

		return redirect(route('investments.index'));
	}
}
