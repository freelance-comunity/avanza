<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientLocation extends Model
{
    
	public $table = "client_locations";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "street",
		"number",
		"colony",
		"municipality",
		"state",
		"postal_code",
		"references",
		"latitude",
		"lenght",
		"client_id"
	];

	public static $rules = [
	    "street" => "required",
		"number" => "required",
		"colony" => "required",
		"municipality" => "required",
		"state" => "required",
		"postal_code" => "required",
		"references" => "required",
		"latitude" => "required",
		"lenght" => "required"
	];
	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
