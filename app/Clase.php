<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    //
    public function alumnos()
    {
        return $this->belongsToMany('App\Alumno');
    }

}
