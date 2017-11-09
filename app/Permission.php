<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
 protected $fillable = [
 'name',
 'display_name',
 'description',
 'code',
 ];

 public static $rules = [
 "name" => "required",
 "display_name" => "required",
 "description" => "required",
 "code"        => "required",
 ];
 
   //establecemos las relacion de muchos a muchos con el modelo Role, ya que un permiso
   //lo pueden tener varios roles y un rol puede tener varios permisos
 public function roles(){
  return $this->belongsToMany('App\Role');
}
}