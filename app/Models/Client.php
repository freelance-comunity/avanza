<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
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
		"scholarship",
		"phone",
		"no_economic_dependent",
		"no_familys",
		"type_of_housing",
		"avatar",
		"branch_id"
	];

	public static $rules = [
		"folio" => "required",
	    "firts_name" => "required",
		"last_name" => "required",
		"mothers_last_name" => "required",
		"curp" => "required",
		"ine" => "required",
		"civil_status" => "required",
		"scholarship" => "required",
		"phone" => "required",
		"no_economic_dependent" => "required",
		"no_familys" => "required",
		"type_of_housing" => "required",
		"avatar" => "required",
	
	];
	public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }

    public function location()
    {
        return $this->hasOne('App\Models\ClientLocation');
    }

    public function credential()
    {
        return $this->hasOne('App\Models\ClientCredential');
    }
    public function aval()
    {
        return $this->hasMany('App\Models\ClientAval');
    }
    public function spouse()
    {
        return $this->hasOne('App\Models\Spouse');
    }
     public function company()
    {
        return $this->hasOne('App\Models\ClientCompany');
    }
    public function references()
    {
        return $this->hasMany('App\Models\ClientReferences');
    }

}
