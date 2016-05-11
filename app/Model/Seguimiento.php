<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table ="seguimientos";

    protected $fillable=['estudiantes_id','actividades_id'];

    public function estudiante()
    {
        return $this->belongsTo('App\Model\Estudiante','estudiantes_id');
    }

    public function actividad(){

        return $this->belongsTo('App\Model\Actividad','actividades_id');
    }

}
