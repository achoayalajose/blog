<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


use App\Models\Post;
use App\Models\Archivo;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return $posts;
    }

    public function show($id){
        $post = Post::find($id);
        // $post = DB::table('posts')->where('id', $id)->first();
        if(!isset($post)){
            return ['error' => 'no existe el post con el id ' . $id];    
        }
        return $post;
    }

    public function create(Request $request){
        $archivos_response = [];

        $post = Post::create([
            'titulo' => $request->titulo_post,
            'contenido' => $request->contenido,
            'editor_id' => $request->editor,
        ]);

        foreach($request->archivos as $archivo){

            $path = $archivo['archivo']->store('archivos', 'public');

            $archivo_creado = Archivo::create([
                'archivo' => $path,
                'tipo' => $archivo['tipo'],
                'post_id' => $post->id
            ]);

            $archivos_response []= [
                'archivo' => asset('storage/' . $path),
                'tipo' => $archivo['tipo']
            ];
            
        }
        
        $response = [
            'id' => $post->id,
            'titulo_post' => $post->titulo,
            'contenido' => $post->contenido,
            'editor' => $post->editor_id,
            'archivos' => $archivos_response
        ];

        return $response;
    }

    public function update(Request $request){
        $post = Post::find($request->post_id);
        if(!isset($post)){
            return ['error' => 'no existe el post con el id ' . $id];    
        }
        
        $post->titulo = $request->titulo_post;
        $post->contenido = $request->contenido;
        $post->editor_id = $request->editor;

        $post->update();

        return $post;

    }

    public function destroy($id){
        $post = Post::find($id);
        if(!isset($post)){
            return ['error' => 'no existe el post con el id ' . $id];    
        }

        $archivos = Archivo::where('post_id', $id)->get();
        $paths = $archivos->pluck('archivo')->toArray();

        Storage::disk('public')->delete($paths);

        Archivo::where('post_id', $id)->delete();

        $post->delete();
        return ['mensaje' => 'se elimino el post'];
    }
}
