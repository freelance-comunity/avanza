<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employeelocation extends Model
{
    
	public $table = "employeelocations";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "country",
		"state",
		"municipality",
		"colony",
		"type_of_road",
		"name_road",
		"outdoor_number",
		"interior_number",
		"postal_code",
		"user_id",
	];

	public static $rules = [
	    "country" => "required",
		"state" => "required",
		"municipality" => "required",
		"colony" => "required",
		"type_of_road" => "required",
		"name_road" => "required",
		"outdoor_number" => "required",
		"interior_number" => "required",
		"postal_code" => "required"
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
