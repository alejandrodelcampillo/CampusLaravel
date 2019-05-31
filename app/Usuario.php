<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function materias(){
        return $this->belongsToMany("App\Materia");
    }
}
