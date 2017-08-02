<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePermissionRequest;
use App\Permission;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class PermissionController extends AppBaseController
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
		$query = Permission::query();
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

        $permissions = $query->get();

        return view('permissions.index')
            ->with('permissions', $permissions)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Permission.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('permissions.create');
	}

	/**
	 * Store a newly created Permission in storage.
	 *
	 * @param CreatePermissionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePermissionRequest $request)
	{
        $input = $request->all();

		$permission = Permission::create($input);

		Flash::message('Permission saved successfully.');

		return redirect(route('permissions.index'));
	}

	/**
	 * Display the specified Permission.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		return view('permissions.show')->with('permission', $permission);
	}

	/**
	 * Show the form for editing the specified Permission.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		return view('permissions.edit')->with('permission', $permission);
	}

	/**
	 * Update the specified Permission in storage.
	 *
	 * @param  int    $id
	 * @param CreatePermissionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePermissionRequest $request)
	{
		/** @var Permission $permission */
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		$permission->fill($request->all());
		$permission->save();

		Flash::message('Permission updated successfully.');

		return redirect(route('permissions.index'));
	}

	/**
	 * Remove the specified Permission from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Permission $permission */
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		$permission->delete();

		Flash::message('Permission deleted successfully.');

		return redirect(route('permissions.index'));
	}
}
