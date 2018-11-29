<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
	protected $fillable = ['cod_ciudad', 'nombre'];
	protected $primaryKey = 'cod_ciudad';
}