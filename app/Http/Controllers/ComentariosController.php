<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function getComentarios($casa_id){ 
        $comentarios=Comentarios::where("casa_id", $casa_id)->get()->toArray(); 
        return $comentarios;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()     
    {
        $comentarios= Comentario::all();
        return view('layouts.casas',['casa' => $comentarios]);
    }


    public function apagaComentario($id){
        $comentario= Comentarios::find($id);
        $casa_id= $comentario->casa_id;
        $comentario->delete();
        return redirect()->route('casaedit', ["id"=>$casa_id]);
    }


    public function aprovaComentario($id){
        $comentario= Comentarios::find($id);
        $casa_id= $comentario->casa_id;
        $comentario->estado=1;
        $comentario->save();
        return redirect()->route('casaedit', ["id"=>$casa_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.casas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
 
      
      $comentario = new Comentarios;
      
      $comentario ->user_id=auth()->user()->id;
      $comentario ->user_name=auth()->user()->name;
      $comentario ->casa_id=$_POST["casa_id"];
      $comentario ->comentario=$request->comentario;
         
   

      $comentario->save();
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(Comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentarios $comentarios)
    {
        //
    }
}
