<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table ="profesores";

    protected $fillable=['nombre'];

    public function asignaturas()
    {
        return $this->hasMany('App\Model\Asignatura');
    }
}
