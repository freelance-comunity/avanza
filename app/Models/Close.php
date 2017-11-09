<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Close extends Model
{
    
	public $table = "closes";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name_user",
		"user_id"
	];

	public static $rules = [
	    "name_user" => "required",
		"role_user" => "required"
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
