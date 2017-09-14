<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    
	public $table = "regions";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"area"
	];

	public static $rules = [
	    "name" => "required",
		"area" => "required"
	];

	public function branches()
	{
		return $this->hasMany('App\Models\Branch');
	}

	public function clients()
	{
		return $this->hasMany('App\Models\Client');
	}

	public function users()
	{
		return $this->hasMany('App\User');
	}

}
