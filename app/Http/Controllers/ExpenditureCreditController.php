<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateExpenditureCreditRequest;
use App\Models\ExpenditureCredit;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class ExpenditureCreditController extends AppBaseController
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
		$query = ExpenditureCredit::query();
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

        $expenditureCredits = $query->get();

        return view('expenditureCredits.index')
            ->with('expenditureCredits', $expenditureCredits)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new ExpenditureCredit.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('expenditureCredits.create');
	}

	/**
	 * Store a newly created ExpenditureCredit in storage.
	 *
	 * @param CreateExpenditureCreditRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateExpenditureCreditRequest $request)
	{
        $input = $request->all();

		$expenditureCredit = ExpenditureCredit::create($input);

		Flash::message('ExpenditureCredit saved successfully.');

		return redirect(route('expenditureCredits.index'));
	}

	/**
	 * Display the specified ExpenditureCredit.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$expenditureCredit = ExpenditureCredit::find($id);

		if(empty($expenditureCredit))
		{
			Flash::error('ExpenditureCredit not found');
			return redirect(route('expenditureCredits.index'));
		}

		return view('expenditureCredits.show')->with('expenditureCredit', $expenditureCredit);
	}

	/**
	 * Show the form for editing the specified ExpenditureCredit.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$expenditureCredit = ExpenditureCredit::find($id);

		if(empty($expenditureCredit))
		{
			Flash::error('ExpenditureCredit not found');
			return redirect(route('expenditureCredits.index'));
		}

		return view('expenditureCredits.edit')->with('expenditureCredit', $expenditureCredit);
	}

	/**
	 * Update the specified ExpenditureCredit in storage.
	 *
	 * @param  int    $id
	 * @param CreateExpenditureCreditRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateExpenditureCreditRequest $request)
	{
		/** @var ExpenditureCredit $expenditureCredit */
		$expenditureCredit = ExpenditureCredit::find($id);

		if(empty($expenditureCredit))
		{
			Flash::error('ExpenditureCredit not found');
			return redirect(route('expenditureCredits.index'));
		}

		$expenditureCredit->fill($request->all());
		$expenditureCredit->save();

		Flash::message('ExpenditureCredit updated successfully.');

		return redirect(route('expenditureCredits.index'));
	}

	/**
	 * Remove the specified ExpenditureCredit from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var ExpenditureCredit $expenditureCredit */
		$expenditureCredit = ExpenditureCredit::find($id);

		if(empty($expenditureCredit))
		{
			Flash::error('ExpenditureCredit not found');
			return redirect(route('expenditureCredits.index'));
		}

		$expenditureCredit->delete();

		Flash::message('ExpenditureCredit deleted successfully.');

		return redirect(route('expenditureCredits.index'));
	}
}
