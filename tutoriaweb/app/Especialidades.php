<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'especialidades';
}