<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
	public $table = "employees";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"mother_last_name",
		"father_last_name",
		"address",
		"latitude",
		"length",
		"phone",
		"email",
		"branch_id"
	];

	public static $rules = [
	    "name" => "required",
		"mother_last_name" => "required",
		"father_last_name" => "required",
		"address" => "required",
		"latitude" => "required",
		"length" => "required",
		"phone" => "required",
		"email" => "required",
		"branch_id" => "required"
	];

}
