<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateVaultRequest;
use App\Models\Vault;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class VaultController extends AppBaseController
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
		$query = Vault::query();
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

        $vaults = $query->get();

        return view('vaults.index')
            ->with('vaults', $vaults)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Vault.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('vaults.create');
	}

	/**
	 * Store a newly created Vault in storage.
	 *
	 * @param CreateVaultRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateVaultRequest $request)
	{
        $input = $request->all();

		$vault = Vault::create($input);

		Flash::message('Vault saved successfully.');

		return redirect(route('vaults.index'));
	}

	/**
	 * Display the specified Vault.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$vault = Vault::find($id);

		if(empty($vault))
		{
			Flash::error('Vault not found');
			return redirect(route('vaults.index'));
		}

		return view('vaults.show')->with('vault', $vault);
	}

	/**
	 * Show the form for editing the specified Vault.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vault = Vault::find($id);

		if(empty($vault))
		{
			Flash::error('Vault not found');
			return redirect(route('vaults.index'));
		}

		return view('vaults.edit')->with('vault', $vault);
	}

	/**
	 * Update the specified Vault in storage.
	 *
	 * @param  int    $id
	 * @param CreateVaultRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateVaultRequest $request)
	{
		/** @var Vault $vault */
		$vault = Vault::find($id);

		if(empty($vault))
		{
			Flash::error('Vault not found');
			return redirect(route('vaults.index'));
		}

		$vault->fill($request->all());
		$vault->save();

		Flash::message('Vault updated successfully.');

		return redirect(route('vaults.index'));
	}

	/**
	 * Remove the specified Vault from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Vault $vault */
		$vault = Vault::find($id);

		if(empty($vault))
		{
			Flash::error('Vault not found');
			return redirect(route('vaults.index'));
		}

		$vault->delete();

		Flash::message('Vault deleted successfully.');

		return redirect(route('vaults.index'));
	}
}
