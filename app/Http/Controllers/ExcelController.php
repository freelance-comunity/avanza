<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
class ExcelController extends Controller
{
	public function index()
	{

		Excel::create('Usuarios', function($excel) {

			$excel->sheet('Productos', function($sheet) {

				$users = User::all();

				$sheet->fromArray($users);

			});
		})->export('xls');

	}
}
