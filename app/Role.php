<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = ['codigo', 'name', 'descripcion'];
	protected $primaryKey = 'codigo';
	protected $table = 'roles';
	
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}