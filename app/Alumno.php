<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public function clases(){
        return $this->belongsToMany('App\Clase');
    }
}
