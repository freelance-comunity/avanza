<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomePayment extends Model
{
    
	public $table = "income_payments";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ammount",
		"concept",
		"date",
		"payment_id",
		"debt_id",
		"vault_id"
	];

	public static $rules = [
	    "ammount" => "required",
		"concept" => "required",
		"date" => "required"
	];
	public function vault()
	{
		return $this->belongsTo('App\Models\Vault');
	}
	public function payment()
	{
		return $this->belongsTo('App\Models\Payment');
	}
	public function debt()
	{
		return $this->belongsTo('App\Models\Debt');
	}

}
