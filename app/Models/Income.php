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
		"vault_id"
	];

	public static $rules = [
	    "ammount" => "required",
		"concept" => "required"
	];

	public function vault()
	{
		return $this->belongsTo('App\Models\Vault');
	}

}
