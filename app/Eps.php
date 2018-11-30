<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eps extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'eps';
}