<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table ="actividades";

    protected $fillable=['nombre'];

    public function seguimiento()
    {
        return $this->hasOne('App\Model\Seguimiento');
    }
}
