<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCreditRequest;
use App\Models\Credit;
use App\Models\Client;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;

class CreditController extends AppBaseController
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
		$query = Credit::query();
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

		$credits = $query->get();

		return view('credits.index')
		->with('credits', $credits)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Credit.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('credits.create');
	}

	/**
	 * Store a newly created Credit in storage.
	 *
	 * @param CreateCreditRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCreditRequest $request)
	{
		$input = $request->all();
		$number = Credit::max('id') + 1;
		$input['folio'] = $request->input('state').$request->input('branch').'00'.$number;
		
		$credit = Credit::create($input);
		Toastr::success('Solicitud creada exitosamente.', 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
		return redirect(route('credits.index'));
	}

	/**
	 * Display the specified Credit.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$credit = Credit::find($id);

		if(empty($credit))
		{
			Flash::error('Credit not found');
			return redirect(route('credits.index'));
		}

		return view('credits.show')->with('credit', $credit);
	}

	/**
	 * Show the form for editing the specified Credit.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$credit = Credit::find($id);

		if(empty($credit))
		{
			Flash::error('Credit not found');
			return redirect(route('credits.index'));
		}

		return view('credits.edit')->with('credit', $credit);
	}

	/**
	 * Update the specified Credit in storage.
	 *
	 * @param  int    $id
	 * @param CreateCreditRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCreditRequest $request)
	{
		/** @var Credit $credit */
		$credit = Credit::find($id);

		if(empty($credit))
		{
			Flash::error('Credit not found');
			return redirect(route('credits.index'));
		}

		$credit->fill($request->all());
		$credit->save();

		Flash::message('Credit updated successfully.');

		return redirect(route('credits.index'));
	}

	/**
	 * Remove the specified Credit from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Credit $credit */
		$credit = Credit::find($id);

		if(empty($credit))
		{
			Flash::error('Credit not found');
			return redirect(route('credits.index'));
		}

		$credit->delete();

		Flash::message('Credit deleted successfully.');

		return redirect(route('credits.index'));
	}
}
