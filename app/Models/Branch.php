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
	"nomenclature",
	"latitude",
	"length",
	"region_id"
	];

	public static $rules = [
	"name" => "required",
	"phone" => "required",
	"address" => "required",
	"nomenclature"=>'required',
	"latitude" => "required",
	"length" => "required"
	];

	public function region()
	{
		return $this->belongsTo('App\Models\Region');
	}

	public function clients()
	{
		return $this->hasMany('App\Models\Client');
	}

	public function credits()
	{
		return $this->hasMany('App\Models\Credit');
	}

	public function users()
	{
		return $this->hasMany('App\User');
	}

	public function payments()
	{
		return $this->hasMany('App\Models\Payment');
	}

	public function debts()
	{
		return $this->hasMany('App\Models\Debt');
	}

	public function incomePayments()
	{
		return $this->hasMany('App\Models\IncomePayment');
	}

	public function expenditureCredits()
	{
		return $this->hasMany('App\Models\ExpenditureCredit');
	}

}
