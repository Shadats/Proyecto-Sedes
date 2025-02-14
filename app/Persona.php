<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Persona extends Model
{
     protected $table = 'personas';
     
     protected $fillable = ['dni','nombre','apellido','email','edad','telefono','ciudadProcedencia','areaConocimiento','nivelEjerce','estudianteActual','categoria_id'];

     public function categoria(){
   		return	$this->belongsTo(Categoria::class);
     }

	 
	 static function validarEdad ($edad)
	 {

		$fecha=$edad;

	    $dia=date("d");
	    $mes=date("m");
	    $ano=date("Y");

		$dianac=date("d",strtotime($fecha));
	    $mesnac=date("m",strtotime($fecha));
	    $anonac=date("Y",strtotime($fecha));

	    if (($mesnac == $mes) && ($dianac > $dia)) {
	   		 $ano=($ano-1);
		}


	    if ($mesnac > $mes) {
	   		 $ano=($ano-1);
		}
	 
	    $edadusuario=($ano-$anonac);

		return $edadusuario;
	}
}
