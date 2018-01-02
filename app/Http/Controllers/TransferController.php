<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTransferRequest;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class TransferController extends AppBaseController
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
		$query = Transfer::query();
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

        $transfers = $query->get();

        return view('transfers.index')
            ->with('transfers', $transfers)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Transfer.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('transfers.create');
	}

	/**
	 * Store a newly created Transfer in storage.
	 *
	 * @param CreateTransferRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTransferRequest $request)
	{
        $input = $request->all();

		$transfer = Transfer::create($input);

		Flash::message('Transfer saved successfully.');

		return redirect(route('transfers.index'));
	}

	/**
	 * Display the specified Transfer.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$transfer = Transfer::find($id);

		if(empty($transfer))
		{
			Flash::error('Transfer not found');
			return redirect(route('transfers.index'));
		}

		return view('transfers.show')->with('transfer', $transfer);
	}

	/**
	 * Show the form for editing the specified Transfer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$transfer = Transfer::find($id);

		if(empty($transfer))
		{
			Flash::error('Transfer not found');
			return redirect(route('transfers.index'));
		}

		return view('transfers.edit')->with('transfer', $transfer);
	}

	/**
	 * Update the specified Transfer in storage.
	 *
	 * @param  int    $id
	 * @param CreateTransferRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTransferRequest $request)
	{
		/** @var Transfer $transfer */
		$transfer = Transfer::find($id);

		if(empty($transfer))
		{
			Flash::error('Transfer not found');
			return redirect(route('transfers.index'));
		}

		$transfer->fill($request->all());
		$transfer->save();

		Flash::message('Transfer updated successfully.');

		return redirect(route('transfers.index'));
	}

	/**
	 * Remove the specified Transfer from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Transfer $transfer */
		$transfer = Transfer::find($id);

		if(empty($transfer))
		{
			Flash::error('Transfer not found');
			return redirect(route('transfers.index'));
		}

		$transfer->delete();

		Flash::message('Transfer deleted successfully.');

		return redirect(route('transfers.index'));
	}
}
