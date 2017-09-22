<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateIncomePaymentRequest;
use App\Models\IncomePayment;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class IncomePaymentController extends AppBaseController
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
		$query = IncomePayment::query();
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

        $incomePayments = $query->get();

        return view('incomePayments.index')
            ->with('incomePayments', $incomePayments)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new IncomePayment.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('incomePayments.create');
	}

	/**
	 * Store a newly created IncomePayment in storage.
	 *
	 * @param CreateIncomePaymentRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateIncomePaymentRequest $request)
	{
        $input = $request->all();

		$incomePayment = IncomePayment::create($input);

		Flash::message('IncomePayment saved successfully.');

		return redirect(route('incomePayments.index'));
	}

	/**
	 * Display the specified IncomePayment.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$incomePayment = IncomePayment::find($id);

		if(empty($incomePayment))
		{
			Flash::error('IncomePayment not found');
			return redirect(route('incomePayments.index'));
		}

		return view('incomePayments.show')->with('incomePayment', $incomePayment);
	}

	/**
	 * Show the form for editing the specified IncomePayment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$incomePayment = IncomePayment::find($id);

		if(empty($incomePayment))
		{
			Flash::error('IncomePayment not found');
			return redirect(route('incomePayments.index'));
		}

		return view('incomePayments.edit')->with('incomePayment', $incomePayment);
	}

	/**
	 * Update the specified IncomePayment in storage.
	 *
	 * @param  int    $id
	 * @param CreateIncomePaymentRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateIncomePaymentRequest $request)
	{
		/** @var IncomePayment $incomePayment */
		$incomePayment = IncomePayment::find($id);

		if(empty($incomePayment))
		{
			Flash::error('IncomePayment not found');
			return redirect(route('incomePayments.index'));
		}

		$incomePayment->fill($request->all());
		$incomePayment->save();

		Flash::message('IncomePayment updated successfully.');

		return redirect(route('incomePayments.index'));
	}

	/**
	 * Remove the specified IncomePayment from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var IncomePayment $incomePayment */
		$incomePayment = IncomePayment::find($id);

		if(empty($incomePayment))
		{
			Flash::error('IncomePayment not found');
			return redirect(route('incomePayments.index'));
		}

		$incomePayment->delete();

		Flash::message('IncomePayment deleted successfully.');

		return redirect(route('incomePayments.index'));
	}
}
