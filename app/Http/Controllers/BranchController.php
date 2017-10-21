<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;
use Auth;
use App\Models\Region;

class BranchController extends AppBaseController
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
		$this->middleware('login_mid');
		// $this->middleware('is_admin');
	}
	
	public function index(Request $request)
	{
		$query = Branch::query();
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

		$branches = $query->get();

		return view('branches.index')
		->with('branches', $branches)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Branch.
	 *
	 * @return Response
	 */
	public function create()
	{	if (Auth::User()->branch_id == 0) {
		Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
		return redirect(route('branches.index'));
	}
	$collection = Region::all();
	$regions = $collection->pluck('name', 'id');
	return view('branches.create')
	->with('regions', $regions);
}

	/**
	 * Store a newly created Branch in storage.
	 *
	 * @param CreateBranchRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBranchRequest $request)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('branches.index'));
		}
		$input = $request->all();

		$branch = Branch::create($input);

		Toastr::success('Sucursal creada exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('branches.index'));
	}

	/**
	 * Display the specified Branch.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('branches.index'));
		}
		$branch = Branch::find($id);

		if(empty($branch))
		{
			Flash::error('Branch not found');
			return redirect(route('branches.index'));
		}

		return view('branches.show')->with('branch', $branch);
	}
	public function charts()
	{
		$branch = Branch::all();

		if(empty($branch))
		{
			Flash::error('Branch not found');
			return redirect(route('branches.index'));
		}

		return view('branches.charts')->with('branch', $branch);
	}

	/**
	 * Show the form for editing the specified Branch.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('branches.index'));
		}
		$branch = Branch::find($id);

		if(empty($branch))
		{
			Flash::error('Branch not found');
			return redirect(route('branches.index'));
		}

		return view('branches.edit')->with('branch', $branch);
	}

	/**
	 * Update the specified Branch in storage.
	 *
	 * @param  int    $id
	 * @param CreateBranchRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateBranchRequest $request)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('branches.index'));
		}
		/** @var Branch $branch */
		$branch = Branch::find($id);

		if(empty($branch))
		{
			Flash::error('Branch not found');
			return redirect(route('branches.index'));
		}

		$branch->fill($request->all());
		$branch->save();

		Toastr::info('Sucursal editada exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('branches.index'));
	}

	/**
	 * Remove the specified Branch from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::User()->branch_id == 0) {
			Toastr::error('Actualmente no cuentas con una sucursal aignada.', 'SUCURSAL', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('branches.index'));
		}
		/** @var Branch $branch */
		$branch = Branch::find($id);

		if(empty($branch))
		{
			Flash::error('Branch not found');
			return redirect(route('branches.index'));
		}

		$branch->delete();
		Toastr::success('Sucursal eliminada exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('branches.index'));
	}
	/*public function client($id)
	{
		$branch = Branch::find($id);
		$client = $branch->client;
		if (Empty($client)) {
			return view ('clients.create')
		->with('branch', $branch);
		}
		else
		{
			Toastr::info('aguas.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect(route('branches.index', [$branch->id])); 
		}
	}*/
	
}
