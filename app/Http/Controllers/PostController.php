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
        // $post = new Post;
        // $post->titulo = $request->titulo_post;
        // $post->contenido = $request->contenido;
        // $post->editor_id = $request->editor;

        
        // $post->save();
        $ver_extension = $request->file('archivos')->getClientOriginalExtension();
        $tipo_archivo = 'imagen';

        if($ver_extension == 'pdf'){
            $tipo_archivo = 'documento';
        }

        $path = $request->file('archivos')->store('archivos', 'public');

        $file = Storage::disk('public')->get($path);

        $path_si = Storage::path($path);
        dd($path_si);
        
        $post = Post::create([
            'titulo' => $request->titulo_post,
            'contenido' => $request->contenido,
            'editor_id' => $request->editor,
        ]);


        $archivo = Archivo::create([
            'archivo' => $path,
            'tipo' => $tipo_archivo,
            'post_id' => $post->id
        ]);
        

        return $post;
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

        $post->delete();
        return ['mensaje' => 'se elimino el post'];
    }
}
