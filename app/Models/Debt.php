<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    
	public $table = "debts";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ammount",
		"status"
	];

	public static $rules = [
	    "ammount" => "required",
		"status" => "required"
	];

}
