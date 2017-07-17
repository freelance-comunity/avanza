<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientCredential extends Model
{
    
	public $table = "client_credentials";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ine",
		"curp",
		"rfc",
		"client_id"
	];

	public static $rules = [
	    "ine" => "required",
		"curp" => "required",
		"rfc" => "required"
	];
	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
