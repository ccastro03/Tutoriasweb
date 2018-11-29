<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
}