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
		"coin_5",
		"coin_2",
		"coin_1",
		"cents_50",
		"vault_id",
		"user_id"
	];

	public static $rules = [
	  "bills_1000" => "required",
	  "bills_500" => "required",
	  "bills_200"=> "required",
	  "bills_100" => "required",
	  "bills_50" =>  "required",
	  "bills_20" =>"required",
	  "coin_10" => "required",
	  "coin_5" => "required",
	  "coin_2" => "required",
	  "coin_1" => "required",
	  "cents_50" => "required",
	];
	public function user()
	{
		return $this->belongsTo('App\Models\Vault');
	}
	 public function vault()
    {
        return $this->hasOne('App\Models\Vault');
    }
	

}
