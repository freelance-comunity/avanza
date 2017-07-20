<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientAval extends Model
{
    
	public $table = "client_avals";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name_aval",
		"last_name_aval",
		"mothers_name_aval",
		"birthdate_aval",
		"curp_aval",
		"phone_aval",
		"civil_status_aval",
		"scholarship_aval",
		"street_aval",
		"number_aval",
		"colony_aval",
		"municipality_aval",
		"state_aval",
		"postal_code_aval",
		"client_id"
	];

	public static $rules = [
	    "name_aval" => "required",
		"last_name_aval" => "required",
		"mothers_name_aval" => "required",
		"birthdate_aval" => "required",
		"curp_aval" => "required",
		"phone_aval" => "require",
		"civil_status_aval" => "required",
		"scholarship_aval" => "required",		
		"street_aval" => "required",
		"number_aval" => "required",
		"colony_aval" => "required",
		"municipality_aval" => "required",
		"state_aval" => "required",
		"postal_code_aval" => "required"
	];
	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
