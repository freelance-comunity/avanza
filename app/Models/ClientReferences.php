<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientReferences extends Model
{
    
	public $table = "client_references";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name_reference",
		"last_name_reference",
		"mothers_name_reference",
		"phone_reference",
		"relationship",
		"client_id"
	];

	public static $rules = [
	    "name_reference" => "required",
		"last_name_reference" => "required",
		"mothers_name_reference" => "required",
		"phone_reference" => "required",
		"relationship" => "required"
	];
	public function client()
	{
		return $this->belongsTo('App\Models\Client');
	}

}
