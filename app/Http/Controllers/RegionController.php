<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRegionRequest;
use App\Models\Region;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;

class RegionController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('is_admin');
		$this->middleware('login_mid');
	}
	
	public function index(Request $request)
	{
		$query = Region::query();
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

        $regions = $query->get();

        return view('regions.index')
            ->with('regions', $regions)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Region.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('regions.create');
	}

	/**
	 * Store a newly created Region in storage.
	 *
	 * @param CreateRegionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRegionRequest $request)
	{
        $input = $request->all();

		$region = Region::create($input);

		Flash::message('Region saved successfully.');

		Toastr::success('Región creada exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('regions.index'));
	}

	/**
	 * Display the specified Region.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$region = Region::find($id);

		if(empty($region))
		{
			Flash::error('Region not found');
			return redirect(route('regions.index'));
		}

		return view('regions.show')->with('region', $region);
	}

	/**
	 * Show the form for editing the specified Region.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$region = Region::find($id);

		if(empty($region))
		{
			Flash::error('Region not found');
			return redirect(route('regions.index'));
		}

		return view('regions.edit')->with('region', $region);
	}

	/**
	 * Update the specified Region in storage.
	 *
	 * @param  int    $id
	 * @param CreateRegionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateRegionRequest $request)
	{
		/** @var Region $region */
		$region = Region::find($id);

		if(empty($region))
		{
			Flash::error('Region not found');
			return redirect(route('regions.index'));
		}

		$region->fill($request->all());
		$region->save();

		Flash::message('Region updated successfully.');

		return redirect(route('regions.index'));
	}

	/**
	 * Remove the specified Region from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Region $region */
		$region = Region::find($id);

		if(empty($region))
		{
			Flash::error('Region not found');
			return redirect(route('regions.index'));
		}

		$region->delete();

		Flash::message('Region deleted successfully.');

		return redirect(route('regions.index'));
	}
	public function transferRegion(Request $request)
	{
		$transmitter = User::find($request->input('transmitter'));

		$receiver = User::find($request->input('receiver'));

		$clients  = $transmitter->clients;
		
		// echo $transmitter->name;
		// echo "<br>";
		// echo $receiver->name;
		$credits  = $transmitter->credits;

		$payments = $transmitter->payments;
	
		foreach ($clients as $client) {
			$client->user_id = $receiver->id;
			$client->save();
		}

		foreach ($credits as $credit) {
			$credit->user_id = $receiver->id;
			$credit->save();
		}

		foreach ($payments as $payment) {
			$payment->user_id = $receiver->id;
			$payment->save();
		}

		Toastr::success('Se ha realizado la transferencia de cartera exitosamente.', 'TRANSFERENCIA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
		return redirect()->back();
	}
}
