<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function post(){
        return $this->belongsTo(Post::class, 'post_id','id');
    }
}
