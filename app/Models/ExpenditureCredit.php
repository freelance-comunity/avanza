<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenditureCredit extends Model
{

	public $table = "expenditure_credits";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
		"ammount",
		"concept",
		"date",
		"credit_id",
		"vault_id",
		"branch_id",
		"region_id",
	];

	public static $rules = [
		"ammount" => "required",
		"concept" => "required",
		"date" => "required"
	];
	public function vault()
	{
		return $this->belongsTo('App\Models\Vault');
	}
	public function credit()
	{
		return $this->belongsTo('App\Models\Credit');
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
