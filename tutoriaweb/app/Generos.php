<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generos extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'generos';
}