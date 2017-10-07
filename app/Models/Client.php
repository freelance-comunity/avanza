<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DatesTranslator;	

class Client extends Model
{
	use DatesTranslator;
	
	public $table = "clients";

	public $primaryKey = "id";
	
	public $timestamps = true;

	public $fillable = [
	"folio",
	"firts_name",
	"last_name",
	"mothers_last_name",
	"curp",
	"ine",
	"civil_status",
	"phone",
	"no_economic_dependent",
	"type_of_housing",
	"avatar",
	"maximun_amount",
	"warranty",
	"branch_id",
	"region_id",
	"user_id"
	];

	public static $rules = [
	"firts_name" => "required",
	"last_name" => "required",
	"mothers_last_name" => "required",
	//"curp" => "required|exists:clients,curp",
	"ine" => "required",
	"civil_status" => "required",
	"phone" => "required",
	"no_economic_dependent" => "required",
	"type_of_housing" => "required",
	"maximun_amount"=>"required"
	
	];

	public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }
    
	public function branch()
	{
		return $this->belongsTo('App\Models\Branch');
	}

	public function location()
	{
		return $this->hasOne('App\Models\ClientLocation');
	}

	public function aval()
	{
		return $this->hasOne('App\Models\ClientAval');
	}
	public function company()
	{
		return $this->hasOne('App\Models\ClientCompany');
	}
	public function references()
	{
		return $this->hasMany('App\Models\ClientReferences');
	}

	public function document()
	{
		return $this->hasOne('App\Models\Clientdocuments');
	}
	public function credits()
	{
		return $this->hasMany('App\Models\Credit');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	

}
