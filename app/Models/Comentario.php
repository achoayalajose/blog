<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    //
    protected $table = 'comentarios';
    protected $guarded = [];

    public function post(){
        return $this->belongTo(Post::class, 'post_id', 'id');
    }
}
