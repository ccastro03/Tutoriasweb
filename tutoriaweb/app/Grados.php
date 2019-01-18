<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grados extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'grados';
}