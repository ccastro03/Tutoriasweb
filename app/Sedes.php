<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'sedes';
}