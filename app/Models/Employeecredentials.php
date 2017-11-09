<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employeecredentials extends Model
{
    
	public $table = "employeecredentials";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ine",
		"curp",
		"rfc",
		"passport",
		"number_imss",
		"driver_license",
		"professional_id",
		"user_id",
	];

	public static $rules = [
	    "ine" => "required",
		"curp" => "required",
		"rfc" => "required",
		"passport" => "required",
		"number_imss" => "required",
		"driver_license" => "required",
		"professional_id" => "required"
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
