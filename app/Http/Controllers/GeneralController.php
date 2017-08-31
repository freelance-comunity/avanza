<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;

class GeneralController extends Controller
{
	public function getPromoter()
	{	
		$role = Role::find(4);
		$users = $role->users;
		
		return view('executives.index')
		->with('employees', $users);
	}
}
