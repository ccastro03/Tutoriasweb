<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrios extends Model
{
	protected $fillable = ['cod_barrio', 'cod_ciudad', 'nombre'];
	protected $primaryKey = ['cod_ciudad','cod_barrio'];
	protected $table = 'barrios';
}