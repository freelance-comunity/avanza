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
		"phone",
		"dependents",
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
		"name_aval",
		"last_name_aval",
		"mothers_name_aval",
		"curp_aval",
		"phone_aval",
		"civil_status_aval",
		"street_aval",
		"number_aval",
		"colony_aval",
		"municipality_aval",
		"state_aval",
		"postal_code_aval",
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
	public function tests()
	{
		return $this->hasManyThrough(
			'App\Models\LatePayments', 'App\Models\Debt', 
			'credit_id','debt_id','id');
	}
}
