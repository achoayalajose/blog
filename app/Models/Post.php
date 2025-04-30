<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';

    protected $fillable = [
        'id',
        'titulo',
        'contenido',
        'editor_id',
        'created_at',
        'update_at'
    ];
}
