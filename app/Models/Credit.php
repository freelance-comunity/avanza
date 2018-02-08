<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\DatesTranslator;	

class Credit extends Model
{
	 use DatesTranslator;
    
	public $table = "credits";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "adviser",											
		"date",
		"folio",
		"branch",
		"ammount",
		"interest_rate",
		"dues",		
		"periodicity",
		"firts_name",
		"last_name",
		"mothers_last_name",
		"firm",
		"status",
		"client_id",
		"user_id",
		"branch_id",
		"region_id"
	];

	public static $rules = [
	    // "adviser" => "required",
		"date" => "required",
		"branch" => "required",
		"ammount" => "required",
		"interest_rate" => "required",
		"dues"=>"required",	
		"periodicity" => "required",
		"firts_name" => "required",
		"last_name" => "required",
		"mothers_last_name" => "required",
		"firm" =>'required',
	];

	public function branch()
	{
		return $this->belongsTo('App\Models\Branch');
	}

	public function region()
	{
		return $this->belongsTo('App\Models\Region');
	}

	 public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function debt()
	{
		return $this->hasOne('App\Models\Debt');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function tests()
	{
		return $this->hasManyThrough(
			'App\Models\LatePayments', 'App\Models\Debt', 
			'credit_id','debt_id','id');
	}
	public function expendituresCredit()
	{
		return $this->hasOne('App\Models\ExpenditureCredit');
	}
}
