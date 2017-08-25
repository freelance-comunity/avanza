<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\DatesTranslator;	

class Credit extends Model
{
	 use DatesTranslator;
    
	public $table = "credits";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "adviser",											
		"date",
		"folio",
		"branch",
		"ammount",
		"interest_rate",
		"dues",		
		"periodicity",
		"warranty_type",
		"firts_name",
		"last_name",
		"mothers_last_name",
		"curp",
		"ine",
		"civil_status",
		"scholarship",
		"phone",
		"dependents",
		"no_familys",
		"type_of_housing",
		"street",
		"number",
		"colony",
		"municipality",
		"state",
		"postal_code",		
		"references",
		"street_company",
		"number_company",
		"colony_company",
		"municipality_company",
		"state_company",
		"postal_code_company",
		"phone_company",
		"name_company",
		"inventory",
		"maq_equi",
		"vehicles",
		"property",
		"box_benck",
		"accounts",
		"suppliers",
		"credits",
		"payments",
		"specify",
		"weekday",
		"weekend",
		"utility",
		"other_income",
		"rent",
		"salary",
		"others",
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
		"firts_name_reference",
		"last_name_reference",
		"mothers_last_name_reference",
		"phone_reference",
		"firts_name_reference2",
		"last_name_reference2",
		"mothers_last_name_reference2",
		"phone_reference2",
		"collection_period",
		"firm",
		"status",
		"client_id",
		"user_id"
	];

	public static $rules = [
	    "adviser" => "required",
		"date" => "required",
		"branch" => "required",
		"ammount" => "required",
		"interest_rate" => "required",
		"dues" => "required",		
		"periodicity" => "required",
		"warranty_type" => "required",
		"firts_name" => "required",
		"last_name" => "required",
		"mothers_last_name" => "required",
		"curp" => "required",
		"ine" => "required",
		
	
		"collection_period" => "required",
		"firm" => "required"
	];

	 public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function debt()
	{
		return $this->hasOne('App\Models\Debt');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
