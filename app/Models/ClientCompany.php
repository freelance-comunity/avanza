<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientCompany extends Model
{
    
	public $table = "client_companies";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "street_company",
		"number_company",
		"colony_company",
		"municipality_company",
		"state_company",
		"postal_code_company",
		"phone_company",
		"name_company",
		"latitude_company",
		"length_company",
		"client_id"
	];

	public static $rules = [
	    "street_company" => "required",
		"number_company" => "required",
		"colony_company" => "required",
		"municipality_company" => "required",
		"state_company" => "required",
		"postal_code_company" => "required",
		"phone_company" => "required",
		"name_company" => "required",
		"latitude_company",
		"length_company"
 
	];
	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
