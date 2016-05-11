<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table ="notas";

    protected $fillable=['corte1','corte2','corte3','definitiva','estudiantes_id','asignaturas_id'];

    public function asignatura(){

        return $this->belongsTo('App\Model\Asignatura','asignaturas_id');
    }
    public function estudiante(){

        return $this->belongsTo('App\Model\Estudiante','estudiantes_id');
    }
}
