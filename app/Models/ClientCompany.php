<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientCompany extends Model
{
    
	public $table = "client_companies";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name_company",
		"state_company",
		"municipality_company",
		"colony_company",
		"type_of_road_company",
		"name_road_company",
		"outdoor_number_company",
		"interior_number_company",
		"postal_code_company",
		"latitude_company",
		"length_company",
		"client_id"
	];

	public static $rules = [
	    "name_company" => "required",
		"state_company" => "required",
		"municipality_company" => "required",
		"colony_company" => "required",
		"type_of_road_company" => "required",
		"name_road_company" => "required",
		"outdoor_number_company" => "required",
		"interior_number_company" => "required",
		"postal_code_company" => "required",
		"latitude_company" => "required",
		"length_company" => "company"
	];
	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
