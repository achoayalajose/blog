<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return $posts;
    }

    public function show($id){
        $post = Post::find($id);
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

        // dd($post);
        // $post->save();

        $post = Post::create([
            'titulo' => $request->titulo_post,
            'contenido' => $request->contenido,
            'editor_id' => $request->editor,
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
