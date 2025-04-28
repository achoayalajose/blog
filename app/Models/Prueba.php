<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    //
    public static function marcasAutos(){
        $marcas = ['toyota', 'nissan', 'BYD', 'Tesla', 'Jac'];
        return $marcas;
    }
}
