<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{

	public $table = "rosters";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
		"date",
		"coordinating_name",
		"coordination",
		"branch_office",
		"name_employee",
		"number_employee",
		"position",
		"payment_scheme",
		"payment_period",
		"perceptions",
		"deductions",
		"grandchild_pay",
		"coordinating_firm",
		"employee_firm",
		"user_id",
		"branch_id",
		"region_id"
	];

	public static $rules = [
		"date" => "required",
		"coordinating_name" => "required",
		"coordination" => "required",
		"branch_office" => "required",
		"name_employee" => "required",
		// "number_employee" => "required",
		// "position" => "required",
		"payment_scheme" => "required",
		"payment_period" => "required",
		"perceptions" => "required",
		"deductions" => "required",
		"grandchild_pay" => "required",
		"coordinating_firm" => "required",
		"employee_firm" => "required"
	];

	public static $rules_edit = [
		"date" => "required",
		"coordinating_name" => "required",
		"coordination" => "required",
		"branch_office" => "required",
		"name_employee" => "required",
		
	];
	public function vault()
	{
		return $this->hasOne('App\Models\Vault');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function region()
	{
		return $this->belongsTo('App\Models\Region');
	}

	public function branch()
	{
		return $this->belongsTo('App\Models\Branch');
	}

}
