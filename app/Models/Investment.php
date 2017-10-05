<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    
	public $table = "investments";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ammount",
	    "user_id",
	    "vault_id"
	];

	public static $rules = [
	    "ammount" => "required"
	];

}
