<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLatePaymentsRequest;
use App\Models\LatePayments;
use App\Models\Payment;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class LatePaymentsController extends AppBaseController
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
		$query = LatePayments::query();
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

		$latePayments = $query->get();

		return view('latePayments.index')
		->with('latePayments', $latePayments)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new LatePayments.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('latePayments.create');
	}

	/**
	 * Store a newly created LatePayments in storage.
	 *
	 * @param CreateLatePaymentsRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateLatePaymentsRequest $request)
	{
		$input = $request->all();

		$latePayments = LatePayments::create($input);

		Flash::message('LatePayments saved successfully.');

		return redirect(route('latePayments.index'));
	}

	/**
	 * Display the specified LatePayments.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$latePayments = LatePayments::find($id);

		if(empty($latePayments))
		{
			Flash::error('LatePayments not found');
			return redirect(route('latePayments.index'));
		}

		return view('latePayments.show')->with('latePayments', $latePayments);
	}

	/**
	 * Show the form for editing the specified LatePayments.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$latePayments = LatePayments::find($id);

		if(empty($latePayments))
		{
			Flash::error('LatePayments not found');
			return redirect(route('latePayments.index'));
		}

		return view('latePayments.edit')->with('latePayments', $latePayments);
	}

	/**
	 * Update the specified LatePayments in storage.
	 *
	 * @param  int    $id
	 * @param CreateLatePaymentsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateLatePaymentsRequest $request)
	{
		/** @var LatePayments $latePayments */
		$latePayments = LatePayments::find($id);

		if(empty($latePayments))
		{
			Flash::error('LatePayments not found');
			return redirect(route('latePayments.index'));
		}

		$latePayments->fill($request->all());
		$latePayments->save();

		Flash::message('LatePayments updated successfully.');

		return redirect(route('latePayments.index'));
	}

	/**
	 * Remove the specified LatePayments from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var LatePayments $latePayments */
		$latePayments = LatePayments::find($id);

		if(empty($latePayments))
		{
			Flash::error('LatePayments not found');
			return redirect(route('latePayments.index'));
		}

		$latePayments->delete();

		Flash::message('LatePayments deleted successfully.');

		return redirect(route('latePayments.index'));
	}
	public function desbloquear($id, Request $request)
	{
		$latePayments = LatePayments::find($id);
		$latePayments->late_number = 2;
		$latePayments->late_ammount = 2;
		$latePayments->late_payment = 2;
		$latePayments->status = "Acreditado";
		$latePayments->save();
	
	}

}
