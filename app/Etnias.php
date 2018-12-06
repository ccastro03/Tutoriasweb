<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etnias extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'etnias';
}