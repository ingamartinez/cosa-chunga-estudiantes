<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{

    protected $table ="asignaturas";

    protected $fillable=['nombre','semestre_asignatura','profesores_id'];

    public function profesor(){

        return $this->belongsTo('App\Model\Profesor','profesores_id');
    }
}
