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
		"birthdate",
		"birth_entity",
		"gender",
		"civil_status",
		"country",
		"nationality",
		"scholarship",
		"phone_one",
		"phone_two",
		"no_children",
		"no_economic_dependent",
		"avatar",
		"branch_id"
	];

	public static $rules = [
		"folio" => "required",
	    "firts_name" => "required",
		"last_name" => "required",
		"mothers_last_name" => "required",
		"birthdate" => "required",
		"birth_entity" => "required",
		"gender" => "required",
		"civil_status" => "required",
		"country" => "required",
		"nationality" => "required",
		"scholarship" => "required",
		"phone_one" => "required",
		"phone_two" => "required",
		"no_children" => "required",
		"no_economic_dependent" => "required",
		"avatar" => "required"
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
