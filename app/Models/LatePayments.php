<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatePayments extends Model
{
    
	public $table = "late_payments";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "late_number",
	    "late_ammount",
	    "late_payment",
	    "payment_id"
	];

	public static $rules = [
	    "late_payment" => "required"
	];

	public function payments()
	{
		return $this->belongsTo('App\Models\Payment');
	}

}
