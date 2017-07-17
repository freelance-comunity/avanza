<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    
	public $table = "spouses";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "firts_name_spouse",
		"last_name_spouse",
		"mothers_name_spouse",
		"birthdate_spouse",
		"curp_spouse",
		"phone_spouse",
		"civil_status_spouse",
		"scholarship_spouse",
		"state_spouse",
		"municipality_spouse",
		"colony_spouse",
		"street_spouse",
		"number_spouse",
		"postal_code_spouse",
		"client_id"
	];

	public static $rules = [
	    "firts_name_spouse" => "required",
		"last_name_spouse" => "required",
		"mothers_name_spouse" => "required",
		"birthdate_spouse" => "required",
		"curp_spouse" => "required",
		"phone_spouse" => "required",
		"civil_status_spouse" => "required",
		"scholarship_spouse" => "required",
		"state_spouse" => "required",
		"municipality_spouse" => "required",
		"colony_spouse" => "required",
		"street_spouse" => "required",
		"number_spouse" => "required",
		"postal_code_spouse" => "required"
	];
	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
