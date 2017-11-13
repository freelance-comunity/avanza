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
