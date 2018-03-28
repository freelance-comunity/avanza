<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Final extends Model
{
    
	public $table = "finals";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "date",
		"region",
		"branch",
		"name",
		"vault",
		"incomes",
		"incomePayment",
		"access",
		"credit",
		"expenditures",
		"actives"
	];

	public static $rules = [
	    "date" => "required",
		"region" => "required",
		"branch" => "required",
		"name" => "required",
		"vault" => "required",
		"incomes" => "required",
		"incomePayment" => "required",
		"access" => "required",
		"credit" => "required",
		"expenditures" => "required",
		"actives" => "required"
	];

}
