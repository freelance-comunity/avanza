<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientLocation extends Model
{
    
	public $table = "client_locations";

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
		"references",
		"latitude",
		"lenght",
		"client_id"
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
		"postal_code" => "required",
		"references"=>"references",
		"latitude" => "required",
		"lenght" => "required"
	];
	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
