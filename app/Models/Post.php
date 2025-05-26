<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function archivos(){
        return $this->hasMany(Archivo::class, 'post_id', 'id');
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class, 'post_id', 'id');
    }
}
