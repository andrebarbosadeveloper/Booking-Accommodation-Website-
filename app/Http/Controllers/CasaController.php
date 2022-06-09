<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CasaController extends Controller
{

    private $comodidades_controller;
    private $imagens_controller;
    private $comentarios_controller;
    private $reservas_controller;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET["comodidade"])){
            $this->comodidades_controller= new ComodidadesController();
            $casas_com_comodidades=$this->comodidades_controller->getCasasComodidades($_GET["comodidade"]); //Retorna o array das casas que tem as comodidades que procuramos
            $casas= Casa::whereIn("id",$casas_com_comodidades)->where("estado", 0)->paginate(1);    //Relaciona o id das casas com a comodidade pretendida
        }else{
            $casas= Casa::where("estado", 0)->paginate(2);
        }


        $this->imagens_controller= new ImagensController();
        for($i=0; $i<count($casas); $i++){
            $casas[$i]["imagem"]=$this->imagens_controller->getFirstImage($casas[$i]["id"]);
        }
        if(isset($_GET["comodidade"])){     //Se existir get é porque esta a pesquisar por filtros senao lista as casas sem comodidades 
            return view('layouts.listacasas',[
                'casas' => $casas->appends('comodidade', $_GET["comodidade"])   //appends-Passa o get (comodidade) selecionado para o botao da pagina
            ]);
        }else{
            return view('layouts.listacasas',[  //Retorno da pagina 
                'casas' => $casas
            ]);
        }
    }


    public function getPrices($id){
        $data=Casa::where("id", $id)->first()->toArray(); 
        return $data;
    }




    public function procura_reserva(Request $request)
    {

        $this->imagens_controller= new ImagensController();
        $this->reservas_controller= new ReservaController();
        $casas_ocupadas=$this->reservas_controller->getReservas($request->checkin, $request->checkout);
        if(count($casas_ocupadas)>0){ 
            $casas= Casa::where("id", ">", 8)->whereNotIn('id', [implode(",", $casas_ocupadas)])->get(); //WhereNotIn->O id nao pode ser nunhum das casas ocupadas(Obrigatorio fazer implode)   //implode->junta os valores do array separando-os por virgulas
        }else{
            $casas= Casa::where("id", ">", 8)->get();
        }
        for($i=0; $i<count($casas); $i++){
            $casas[$i]["imagem"]=$this->imagens_controller->getFirstImage($casas[$i]["id"]);    //Retiramos o id da imagem de cada casa
        }
        return view('layouts.filtropesquisa',
            [
                'casas' => $casas,
                'checkin' => $request->checkin,
                'checkout' => $request->checkout
            ]
         );
    } 


    public function indextoarray()
    {
        $casas= Casa::all()->toArray();
        return $casas;
    }

    public function dados_casa($casa_id){
        $dados=Casa::where("id", $casa_id)->first()->toArray();
        return $dados;
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

       if(isset($request->casa_id)){
        $casa = Casa::firstOrNew(['id' => $request->casa_id]);  // firstOrNew-> Insert ou Update    
       }else{
        $casa = new Casa;
       }
      
      $casa ->user_id=auth()->user()->id;
      $casa ->morada=$request->morada;
      $casa ->nome=$request->nome;
      $casa ->descricao=$request->descricao;
      $casa ->valor_limpeza=$request->valor_limpeza;
      $casa ->valor_reserva=$request->valor_reserva;
      $casa->estado=0;

      $this->comodidades_controller = new ComodidadesController();
      $array_comodidades=array();

        if($request->ar=='on'){
            $array_comodidades["ar"]=1;
        }else{
            $array_comodidades["ar"]=0;
        }
        if($request->tv=='on'){
            $array_comodidades["tv"]=1;
        }else{
            $array_comodidades["tv"]=0;
        }
        if($request->wifi=='on'){
            $array_comodidades["wifi"]=1;
        }else{
            $array_comodidades["wifi"]=0;
        }


        $casa->save();
        $this->comodidades_controller->store($array_comodidades, $casa->id);





        $this->imagens_controller=new ImagensController();
        if ($request->hasFile('imagem1')) {     //Se o request é um ficheiro
            $request->validate([
                'imagem1' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $imageName = time() . '1.' . $request->imagem1->extension();        //faz date time(mete hora, minutos e segundos no nome da imagem para garantir que é unica) (acrescenta numero 1,2,3,4,5 para cada imagem)

            $request->imagem1->move(public_path('images'), $imageName);         //move a imagem para a pasta public com o nome defenido anteriormente

            $this->imagens_controller->store($imageName, $casa->id, 1);         // guarda imagem
        }
        if ($request->hasFile('imagem2')) {
            $request->validate([
                'imagem2' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $imageName = time() . '2.' . $request->imagem2->extension();

            $request->imagem2->move(public_path('images'), $imageName);

            $this->imagens_controller->store($imageName, $casa->id, 2);
        }
        if ($request->hasFile('imagem3')) {
            $request->validate([
                'imagem3' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $imageName = time() . '3.' . $request->imagem3->extension();

            $request->imagem3->move(public_path('images'), $imageName);

            $this->imagens_controller->store($imageName, $casa->id, 3);
        }
        if ($request->hasFile('imagem4')) {
            $request->validate([
                'imagem4' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $imageName = time() . '4.' . $request->imagem4->extension();

            $request->imagem4->move(public_path('images'), $imageName);

            $this->imagens_controller->store($imageName, $casa->id, 4);
        }
        if ($request->hasFile('imagem5')) {
            $request->validate([
                'imagem5' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $imageName = time() . '5.' . $request->imagem5->extension();

            $request->imagem5->move(public_path('images'), $imageName);

            $this->imagens_controller->store($imageName, $casa->id, 5);
        }

   
      return redirect()->route('casas', [$casa->id]);
      
    }

    public function apagaCasa($id){
        $casa= Casa::find($id);
        $casa->estado=1;
        $casa->save();
        return redirect()->route('listacasas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        $casas= Casa::where('id', $id)->get()->toArray();

        $this->comodidades_controller = new ComodidadesController();

        $comodidades=$this->comodidades_controller->get_comodidades($id);
        $ar=0;
        $wifi=0;
        $tv=0;

        if(isset($comodidades[0]["ar"]) && $comodidades[0]["ar"]==1){
            $ar=1;
        }
        if(isset($comodidades[0]["wifi"]) && $comodidades[0]["wifi"]==1){
            $wifi=1;
        }
        if(isset($comodidades[0]["tv"]) && $comodidades[0]["tv"]==1){
            $tv=1;
        }


        $this->comentarios_controller= new ComentariosController();
        $comentarios=$this->comentarios_controller->getComentarios($id);
        
        $i=0;
        foreach($comentarios as $index=>$value){    //percorre a tabela comentarios e vai à coluna created_at e subtrai 0,10 à data que la esta
            $comentarios[$i]["created_at"]=substr($value["created_at"], 0,10);      //Vai buscar os 10 primeiros caracteres(neste casa a data sema a hora)
            $i++;
        }

        $this->imagens_controller= new ImagensController();
        $imagens=$this->imagens_controller->getImages($id);
        for($i=0; $i<count($imagens); $i++){
            if($i==0){
                $imagens[$i]["class"]=" active ";
            }else{
                $imagens[$i]["class"]="  ";
            }
        }


        return view('layouts.casas',[
            'casas'=>$casas,
            'ar'=>$ar,
            'tv'=>$tv,
            'wifi'=>$wifi,
            'casa_id'=>$id,
            'comentarios' =>$comentarios,
            'imagens' =>$imagens
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function edit(Casa $casa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Casa $casa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Casa $casa)
    {
        //
    }
}
