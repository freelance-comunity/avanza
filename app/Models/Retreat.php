<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retreat extends Model
{

	public $table = "retreats";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "ammount",
	    "user_id",
	    "vault_id"
	];

	public static $rules = [
	    "ammount" => "required"
	];
	public function user()
  {
    return $this->belongsTo('App\User');
  }
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
