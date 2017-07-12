<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
	public $table = "users";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
	    "email", 
	    "password",
		"mother_last_name",
		"father_last_name",
		"birthdate",
		"birth_entity",
		"place_of_birth",
		"gender",
		"civil_status",
		"country_of_birth",
		"nationality",
		"scholarship",
		"phone_1",
		"phone_2",
		"avatar"
	];

	public static $rules = [
	    "name" => "required",
		"mother_last_name" => "required",
		"father_last_name" => "required",
		"birthdate" => "required",
		"birth_entity" => "required",
		"place_of_birth" => "required",
		"gender" => "required",
		"civil_status" => "required",
		"country_of_birth" => "required",
		"nationality" => "required",
		"scholarship" => "required",
		"phone_1" => "required",
		"phone_2" => "required",
		"avatar" => "required"
	];

}
