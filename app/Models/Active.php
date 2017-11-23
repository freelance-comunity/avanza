<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{

	public $table = "actives";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
		"ammount",
		"concept",
		"voucher",
		"date",
		"type",
		"description",
		"vault_id",
		"branch_id",
		"region_id"
	];

	public static $rules = [
		"ammount" => "required",
		"concept" => "required",
		"voucher" => "required",
		"date" => "required",
		"type" => "required",
		"description" => "required"
	];

	public function vault()
	{
		return $this->belongsTo('App\Models\Vault');
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
