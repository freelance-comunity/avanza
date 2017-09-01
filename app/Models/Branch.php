<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
	
	public $table = "branches";

	public $primaryKey = "id";
	
	public $timestamps = true;

	public $fillable = [
	"name",
	"phone",
	"address",
	"latitude",
	"length"
	];

	public static $rules = [
	"name" => "required",
	"phone" => "required",
	"address" => "required",
	"latitude" => "required",
	"length" => "required"
	];

	public function clients()
	{
		return $this->hasMany('App\Models\Client');
	}

	public function users()
	{
		return $this->hasOne('App\User');
	}

}
