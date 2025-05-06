<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    //
    protected $table = 'archivos';

    protected $fillable = [
        'id',
        'archivo',
        'tipo',
        'post_id',
        'created_at',
        'update_at'
    ];
}
