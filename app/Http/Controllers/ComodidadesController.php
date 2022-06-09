<?php

namespace App\Http\Controllers;

use App\Models\Comodidades;
use Illuminate\Http\Request;


class ComodidadesController extends Controller
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
    public function store($array_comodidades, $casa_id)
    {
        $instance = Comodidades::firstOrNew(['casa_id' => $casa_id]);
        $instance->fill($array_comodidades)->save();
    }



    public function get_comodidades($casa_id){

        $comodidades= Comodidades::where('casa_id', $casa_id)->get()->toArray();
        
        return $comodidades;
       
    }

    public function getCasasComodidades($comodidade){
       $casas=Comodidades::Select("casa_id")->where($comodidade, 1)->get()->toArray(); //Retira da BD as comodidades da casa
       $novo_array=array();
       for($i=0; $i<count($casas); $i++){
            array_push($novo_array, $casas[$i]["casa_id"]);
       }
       return $novo_array;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comodidades  $comodidades
     * @return \Illuminate\Http\Response
     */
    public function show(Comodidades $comodidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comodidades  $comodidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Comodidades $comodidades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comodidades  $comodidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comodidades $comodidades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comodidades  $comodidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comodidades $comodidades)
    {
        //
    }
}
