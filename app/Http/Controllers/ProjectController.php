<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ProjectController extends Controller
{
    private $casacontroller;
    private $comodidadescontroller;
    private $comentarioscontroller;
    private $reservas_controller;
    private $imagens_controller;


    public function homepage(){

        return view('layouts.homepage');

    }

    public function filtropesquisa(){

        return view('layouts.filtropesquisa');
    }

    public function listacasas(){

        return view('layouts.listacasas');
    }

    public function casas(){

        return view('layouts.casas');
    }

    public function admin(){

        $admin=Auth::user()->admin;
        if($admin==0){
            return  redirect(URL::to('/login'));
        }else{
            $this->reservas_controller=new ReservaController();
            $reservas=$this->reservas_controller->getReservasAdmin();
            return view('layouts.admin', [
                "reservas" => $reservas
            ]);
        }
    }

    public function editadmin(){

        
        $admin=Auth::user()->admin;
        if($admin==0){
            return  redirect(URL::to('/login'));
        }else {
            $this->casacontroller= new CasaController();
            $casas=$this->casacontroller->indextoarray();
            
            $this->imagens_controller= new ImagensController();
            for($i=0; $i<count($casas); $i++){
                $casas[$i]["imagem"]=$this->imagens_controller->getFirstImage($casas[$i]["id"]);
            }    
            
            
            return view('layouts.editadmin',[
                "casas" => $casas
                
            ]);
        }
    }

    public function casaedit($id){

        $this->casacontroller=new CasaController();
        $dados=$this->casacontroller->dados_casa($id);

        $this->comodidadescontroller= new ComodidadesController;
        $comodidades=$this->comodidadescontroller->get_comodidades($id);

        $check_ar="";
        $check_wifi="";
        $check_tv="";

        if(is_array($comodidades) && count($comodidades)){
            if($comodidades[0]["ar"]==1){
                $check_ar=' checked="checked" ';
            }
            if($comodidades[0]["wifi"]==1){
                $check_wifi=' checked="checked" ';
            }
            if($comodidades[0]["tv"]==1){
                $check_tv=' checked="checked" ';
            }
        }

        $this->comentarioscontroller=new ComentariosController();
        $comentarios=$this->comentarioscontroller->getComentarios($id);
        
        $i=0;
        foreach($comentarios as $index=>$value){
            $comentarios[$i]["created_at"]=substr($value["created_at"], 0,10);
            $i++;
        }
    
        
        
        return view('layouts.casaedit', [
            "casa_id"=>$id,
            "dados" => $dados,
            "check_ar" => $check_ar,
            "check_wifi" => $check_wifi,
            "check_tv" => $check_tv,
            "comentarios" => $comentarios
        ]);
    }

    public function casanova(){


        $check_ar="";
        $check_wifi="";
        $check_tv="";
        
        $dados=array();
        
        return view('layouts.casaedit', [
            "dados" => $dados,
            "check_ar" => $check_ar,
            "check_wifi" => $check_wifi,
            "check_tv" => $check_tv
        ]);
    }



    public function pagamento(){

        return view('layouts.pagamento');
    }

   
}
