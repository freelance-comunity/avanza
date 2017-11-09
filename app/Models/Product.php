<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
	public $table = "products";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "code",
		"name",
		"interest_of_cup",
		"ammount_max",
		"ammount_min",
		"surcharge"
	];

	public static $rules = [
	    "code" => "required",
		"name" => "required",
		"interest_of_cup" => "required",
		"ammount_max" => "required",
		"ammount_min" => "required",
		"surcharge" => "required"
	];

}
