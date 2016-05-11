<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table ="estudiantes";

    protected $fillable=['cod_estudiante','nombre','semestre'];

    public function seguimiento()
    {
        return $this->hasOne('App\Model\Seguimiento');
    }


}
