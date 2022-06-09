<?php

namespace App\Http\Controllers;

use App\Models\Imagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store($url, $casa_id, $numero)
    {
        $instance = Imagens::where('casa_id', $casa_id)->where("numero", $numero)->first();

        if($instance===null){
            $instance = new Imagens(['imagem' => $url, "casa_id"=>$casa_id, "numero"=>$numero]);
        }
        $instance->imagem=$url;
        $instance->numero=$numero;
        $instance->save();

    }
    public function getFirstImage($casa_id){ 

        $imagens=Imagens::where("casa_id", $casa_id)->orderBy('numero')->first();
        return $imagens;

    }
    public function getImages($casa_id){
        $imagens = Imagens::where("casa_id", $casa_id)->get()->toArray();
        return $imagens;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagens  $imagens
     * @return \Illuminate\Http\Response
     */
    public function show(Imagens $imagens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imagens  $imagens
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagens $imagens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagens  $imagens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagens $imagens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagens  $imagens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagens $imagens)
    {
        //
    }
}
