<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    
	public $table = "transfers";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ammount",
		"date",
		"transsmitter",
		"receiver"
	];

	public static $rules = [
	    "ammount" => "required",
		"date" => "required",
		"transsmitter" => "required",
		"receiver" => "required"
	];

}
