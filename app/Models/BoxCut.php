<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoxCut extends Model
{
    
	public $table = "box_cuts";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "bills_1000",
		"bills_500",
		"bills_200",
		"bills_100",
		"bills_50",
		"bills_20",
		"coin_10",
		"coi_5",
		"coin_2",
		"coin_1",
		"cents_50",
		"user_id"
	];

	public static $rules = [
	  
	];
	public function user()
	{
		return $this->belongsTo('App\Models\Vault');
	}
	public function incomes()
	{
		return $this->hasMany('App\Models\Income');
	}

	public function expenditures()
	{
		return $this->hasMany('App\Models\Expenditure');
	}

}
