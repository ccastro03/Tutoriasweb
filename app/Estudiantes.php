<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
	protected $fillable = ['codigo_est', 'tipodocumento','numdocumento','nombre','apellido1','direccion','barrio','numtelefono','numcelular','genero','email',
	'fechanace','cod_ciu_nace','cod_pais_nace','tiposangre','sede','grado','jornada','cobertura','grpetnico','desplazado','sisben','nvlsisben','cod_eps',
	'cod_prepagada','cod_ciud_proced','cole_proced','cod_religion','segurovida','asegurador','matriculado','fechamatri','foliomatri','foliolibro','becado',
	'tipobeca','pctbeca','becador','transporte','tipotransp','seccion','grupo','anolectivo','promociona','asistente','seguroest','activo','nuevo','exalumno',
	'retirado','cod_retiro','obsretiro','fecharetiro','anoretiro','cod_contable','cod_niif','cod_familia','alerta'];
	protected $primaryKey = ['codigo_est', 'numdocumento'];
	protected $table = 'estudiantes';
}