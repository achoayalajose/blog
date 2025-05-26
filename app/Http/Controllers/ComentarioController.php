<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comentario;

class ComentarioController extends Controller
{
    //

    public function create(Request $request){
        $comentario = Comentario::create([
            'contenido' => $request->comentario,
            'post_id' => $request->post_id,
            'tipo' => 'comentario',
            'lector_id' => auth()->user()->id
        ]);

        return [
            'comentario' => $comentario->contenido,
            'post_id' => $comentario->id
        ];
    }

    public function update(Request $request){
        $comentario = Comentario::find($request->comentario_id);

        if($comentario->lector_id != auth()->user()->id){
            return [
                'error' => 'no puede actualizar este comentario'
            ];
        }

        $comentario->contenido = $request->comentario;
        $comentario->save();

        return [
            'comentario' => $comentario->contenido,
            'post_id' => $comentario->post_id,
            'comentario_id' => $comentario->id
        ];
    }

    public function delete($id){
        $comentario = Comentario::find($id);
        if($comentario->lector_id != auth()->user()->id){
            return [
                'error' => 'no puede eliminar este comentario'
            ];
        }

        $comentario->delete();

        return ['mensaje' => 'Se elimino el comentario'];
    }

}
