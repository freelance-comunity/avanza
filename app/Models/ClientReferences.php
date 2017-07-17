<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientReferences extends Model
{
    
	public $table = "client_references";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "firts_name_reference",
		"last_name_reference",
		"mothers_last_name_reference",
		"phone_reference",
		"client_id"
	];

	public static $rules = [
	    "firts_name_reference" => "required",
		"last_name_reference" => "required",
		"mothers_last_name_reference" => "required",
		"phone_reference" => "required"
	];
	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
