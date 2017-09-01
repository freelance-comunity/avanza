<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DatesTranslator;

class Vault extends Model
{	
	use DatesTranslator;
    
	public $table = "vaults";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ammount", "user_id"
	];

	public static $rules = [
	    "ammount" => "required"
	];

	public function user()
	{
		return $this->belongsTo('App\Models\Vault');
	}

	public function incomes()
	{
		return $this->hasMany('App\Models\Income');
	}

	public function expenditures()
	{
		return $this->hasMany('App\Models\Expenditure');
	}

}
