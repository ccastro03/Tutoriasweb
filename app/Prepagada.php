<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prepagada extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'prepagada';
}