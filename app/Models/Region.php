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

	public function expenditures()
	{
		return $this->hasMany('App\Models\Expenditure');
	}

	public function incomes()
	{
		return $this->hasMany('App\Models\Income');
	}

	public function rosters()
	{
		return $this->hasMany('App\Models\Roster');
	}

	public function retreats()
	{
		return $this->hasMany('App\Models\Retreat');
	}

	public function purseAccess()
	{
		return $this->hasMany('App\Models\PurseAccess');
	}

	public function latePayments()
	{
		return $this->hasMany('App\Models\LatePayments');
	}

	public function investments()
	{
		return $this->hasMany('App\Models\Investment');
	}
	public function actives()
	{
		return $this->hasMany('App\Models\Active');
	}

}
