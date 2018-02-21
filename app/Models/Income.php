<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Traits\DatesTranslator;

class Income extends Model
{
    //use DatesTranslator;

	public $table = "incomes";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
		"ammount",
		"concept",
		"date",
		"emisor",
		"vault_id",
		"branch_id",
		"region_id"
	];

	public static $rules = [
		"ammount" => "required",
		"concept" => "required"
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
