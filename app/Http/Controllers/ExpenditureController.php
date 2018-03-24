<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateExpenditureRequest;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use App\User;
use Toastr;
use Validator;
use Auth;
use Image;
use Carbon\Carbon;

class ExpenditureController extends AppBaseController
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
	}
	
	public function index(Request $request)
	{
		$query = Expenditure::query();
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

		$expenditures = $query->get();

		return view('expenditures.index')
		->with('expenditures', $expenditures)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Expenditure.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('expenditures.create');
	}

	/**
	 * Store a newly created Expenditure in storage.
	 *
	 * @param CreateExpenditureRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateExpenditureRequest $request)
	{
		$input = $request->all();

		$expenditure = Expenditure::create($input);

		Flash::message('Expenditure saved successfully.');

		return redirect(route('expenditures.index'));
	}

	/**
	 * Display the specified Expenditure.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$expenditure = Expenditure::find($id);

		if(empty($expenditure))
		{
			Flash::error('Expenditure not found');
			return redirect(route('expenditures.index'));
		}

		return view('expenditures.show')->with('expenditure', $expenditure);
	}

	/**
	 * Show the form for editing the specified Expenditure.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$expenditure = Expenditure::find($id);

		if(empty($expenditure))
		{
			Flash::error('Expenditure not found');
			return redirect(route('expenditures.index'));
		}

		return view('expenditures.edit')->with('expenditure', $expenditure);
	}

	/**
	 * Update the specified Expenditure in storage.
	 *
	 * @param  int    $id
	 * @param CreateExpenditureRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateExpenditureRequest $request)
	{
		/** @var Expenditure $expenditure */
		$expenditure = Expenditure::find($id);

		if(empty($expenditure))
		{
			Flash::error('Expenditure not found');
			return redirect(route('expenditures.index'));
		}

		$expenditure->fill($request->all());
		$expenditure->save();

		Flash::message('Expenditure updated successfully.');

		return redirect(route('expenditures.index'));
	}

	/**
	 * Remove the specified Expenditure from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Expenditure $expenditure */
		$expenditure = Expenditure::find($id);

		if(empty($expenditure))
		{
			Flash::error('Expenditure not found');
			return redirect(route('expenditures.index'));
		}

		$expenditure->delete();

		Flash::message('Expenditure deleted successfully.');

		return redirect(route('expenditures.index'));
	}
	public function gastoDA(Request $request)
	{    
		$id_user = $request->input('user_id');
		$user = User::find($id_user);
		$vault = $user->vault;
		if ($vault->ammount == 0) {
			Toastr::error('No puedes registrar un gasto, ya que no cuentas con efectivo.', 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
			return redirect()->back();
		} else {
			$validator = Validator::make($request->all(), [
				'ammount' => 'required|numeric',
				'voucher' => 'required|image|mimes:jpeg,png,jpg',
			]);

			if ($validator->fails()) {
				Toastr::error('Favor de introducir cantidad valida ó la imagen correctamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

				return redirect()->back();
			}

			if ($request->hasFile('voucher')) {
				$voucher = $request->file('voucher');
				$filename = time() . '.' . $voucher->getClientOriginalExtension();
				Image::make($voucher)->resize(400, 400)->save(public_path('/uploads/voucher' . $filename));
			}

			$current = Carbon::today();
			$ammount = $request->input('ammount');
			$concept = $request->input('concept');
			$id_user = $request->input('user_id');
			$user = User::find($id_user);
			$vault = $user->vault;
			$data_expenditure['ammount'] = $ammount;
			$data_expenditure['concept'] = 'Gasto';
			$data_expenditure['voucher'] = $filename;
			$data_expenditure['date']    = $current;
			$data_expenditure['description']= $request->input('description');
			$data_expenditure['type']= $request->input('type');
			if ($request->input('type') == 'Accesorios Celulares' ) {
				$data_expenditure['category']= 'Activo';
			}
			$data_expenditure['employee']=$request->input('employee');
			$data_expenditure['vault_id'] = $vault->id;
			$data_expenditure['branch_id'] = $user->branch_id;
			$data_expenditure['region_id'] = $user->region_id;

            // dd($data_expenditure);
			$expenditure = Expenditure::create($data_expenditure);

			$vault->ammount = $vault->ammount - $expenditure->ammount;
			$vault->save();

			Toastr::success('Gasto agregado exitosamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

			return redirect()->back();
		}
	}
}
