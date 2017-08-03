<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{

	public $table = "debts";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	"ammount",
	"status",
	"credit_id"
	];

	public static $rules = [
	"ammount" => "required",
	"status" => "required"
	];
	public function credits()
	{
		return $this->belongsTo('App\Models\Credit');
	}

	public function payments()
	{
		return $this->hasMany('App\Models\Payment');
	}
}
