<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use DateTime;
use Session;
class ReservaController extends Controller
{
    private $casa_controller;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas= Reserva::all();
        return view('layouts.casas',['reserva' => $reservas]);
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


       
    public function getReservas($checkin, $checkout){ 
        $reservas=Reserva::Select("casa_id")->whereBetween('Checkout', [$checkin, $checkout])->orwhereBetween('Checkin', [$checkin, $checkout])->get()->toArray();
        $novo_array=array(); 
        for($i=0; $i<count($reservas); $i++){
            if(!in_array($reservas[$i]["casa_id"], $novo_array)){
                array_push($novo_array, $reservas[$i]["casa_id"]);
            }
            
        } 
        return $novo_array;
    }

    public function getReservasAdmin(){
        $reservas=Reserva::all()->toArray(); 
        $array_valores=array();                         //Criamos array novo para o novo array apenas ter a informaçao necessaria

        for($i=0; $i<count($reservas); $i++){
            $this->casa_controller=new CasaController();
            $prices=$this->casa_controller->getPrices($reservas[$i]["casa_id"]);
            
            $data_checkin=$reservas[$i]["Checkin"];
            $data_checkout=$reservas[$i]["Checkout"];
            $datatime_in= new DateTime($data_checkin);
            $datatime_out= new DateTime($data_checkout);
            $dias_dif=$datatime_in->diff($datatime_out);
            $dias= $dias_dif->format('%a');             //total dos dias
            
            $valor_reserva=$prices["valor_reserva"];
            $valor_limpeza=$prices["valor_limpeza"];
            $total=($dias*$valor_limpeza)+($dias*$valor_reserva);
            
            $array_valores[$i]["total"]=$total;
            $array_valores[$i]["total_reserva"]=$dias*$valor_reserva;
            $array_valores[$i]["total_limpeza"]=$dias*$valor_limpeza;
            $array_valores[$i]["id_reserva"]=$reservas[$i]["id"];

            $dados_casa=$this->casa_controller->dados_casa($reservas[$i]["casa_id"]);
            
            $array_valores[$i]["nome"]=$dados_casa["nome"];
            
        }
        return $array_valores;
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        


      $reserva_request = new Reserva;
      $reserva_request ->casa_id=$request->casa_id;
      $reserva_request ->FirstName=auth()->user()->name;
      $reserva_request ->LastName="*";
      $reserva_request ->email=auth()->user()->email;
      $reserva_request ->Checkin=$request->checkin;  
      $reserva_request ->Checkout=$request->checkout;  

      $reserva_request->save();



        $this->casa_controller=new CasaController();
        $prices=$this->casa_controller->getPrices($request->casa_id);
        
        $data_checkin=$request->checkin;
        $data_checkout=$request->checkout;
        $datatime_in= new DateTime($data_checkin);
        $datatime_out= new DateTime($data_checkout);
        $dias_dif=$datatime_in->diff($datatime_out);
        $dias= $dias_dif->format('%a'); 
        
        $valor_reserva=$prices["valor_reserva"];
        $valor_limpeza=$prices["valor_limpeza"];
        $total=($dias*$valor_limpeza)+($dias*$valor_reserva);
        
        Session::flash('total', $total);                //Variavel de sessao flash->So da para utilizar 1 vez
        Session::flash('total_reserva', $dias*$valor_reserva); 
        Session::flash('total_limpeza', $dias*$valor_limpeza); 
        
        return redirect('/pagamento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        //
    }
}
