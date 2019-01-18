<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumentos extends Model
{
	protected $fillable = ['codigo', 'nombre'];
	protected $primaryKey = 'codigo';
	protected $table = 'tipodocumentos';
}