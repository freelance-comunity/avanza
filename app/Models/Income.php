<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    
	public $table = "incomes";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ammount",
		"concept",
		"vault_id"
	];

	public static $rules = [
	    "ammount" => "required",
		"concept" => "required"
	];

	public function vault()
	{
		return $this->belongsTo('App\Models\Vault');
	}
	public function boxcut()
	{
		return $this->belongsTo('App\Models\BoxCut');
	}

}
