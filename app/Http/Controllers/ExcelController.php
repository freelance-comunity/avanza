<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Payment;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
	public function index()
	{

		Excel::create('Pagos', function($excel) {

			$excel->sheet('Pagos', function($sheet) {

				$payments = Payment::select('number','region_id','branch_id','user_id','ammount','capital','interest','moratorium','updated_at')->get();

				$sheet->fromArray($payments);

			});
		})->export('xls');

	}
}
