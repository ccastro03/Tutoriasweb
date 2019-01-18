<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesiones extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'profesiones';
}