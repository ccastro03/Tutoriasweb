<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornadas extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'jornadas';
}