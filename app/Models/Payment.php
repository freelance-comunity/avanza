<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DatesTranslator;	

class Payment extends Model
{
    use DatesTranslator;

	public $table = "payments";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "number",
		"day",
		"date_payment",
		"ammount",
		"capital",
		"interest",
		"moratorium",
		"total",
		"payment",
		"status"
	];

	public static $rules = [
	    "number" => "required",
		"day" => "required",
		"date_payment" => "required",
		"ammount" => "required",
		"capital" => "required",
		"interest" => "required",
		"moratorium" => "required",
		"total" => "required",
		"payment" => "required",
		"status" => "required"
	];

}
