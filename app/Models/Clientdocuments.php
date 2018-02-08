<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientdocuments extends Model
{
    
	public $table = "clientdocuments";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ine",
		"curp",
		"proof_of_addres",
		"client_id",
	];

	public static $rules = [
	 //    "ine" => "required",
		// "curp" => "required",
		// "proof_of_addres" => "required"
	];

	public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
