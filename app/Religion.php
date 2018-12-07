<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'religion';
}