<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoxCut extends Model
{
    
	public $table = "box_cuts";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "amount",
		"vault_id",
		"user_id"
	];

	public static $rules = [
	  "amount" => "required",  
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
