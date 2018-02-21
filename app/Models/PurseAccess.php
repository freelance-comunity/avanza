<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurseAccess extends Model
{

	public $table = "purse_accesses";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
		"ammount",
		"concept",
		"voucher",
		"date",
		"vault_id",
		"user_id",
		"branch_id",
		"region_id"
	];

	public static $rules = [
		"ammount" => "required",
		"concept" => "required",
		"date" => "required",

	];
	public function vault()
	{
		return $this->belongsTo('App\Models\Vault');
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
