<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    
	public $table = "expenditures";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ammount",
		"concept",
		"voucher",
		"vault_id"
	];

	public static $rules = [
	    "ammount" => "required",
		"concept" => "required",
		"voucher" => "required"
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
