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
		"photo_ine",
		"photo_curp",
		"photo_cd",
		"client_id"
	];

	public static $rules = [
	   
	];
	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
