@extends('layouts.appadmin')



@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/simple-line-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/landing-page.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">


@endsection

@section('admincontent')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">    
  <div>

  <div class="form-btn" style="padding: 5vh;">

  <form method="post" enctype="multipart/form-data" action="{{ url('/casaedit') }}">
    @csrf
      <div class ="form-group">
        <label for="exampleInputFile">Foto 1</label>
        <input type="file" name="imagem1" class="form-control" id="exampleInputFile">
      </div>
        <div class ="form-group">
          <label for="exampleInputFile">Foto 2</label>
          <input type="file" name="imagem2" class="form-control" id="exampleInputFile">
        </div>
          <div class ="form-group">
            <label for="exampleInputFile">Foto 3</label>
            <input type="file" name="imagem3" class="form-control" id="exampleInputFile">
          </div>
            <div class ="form-group">
              <label for="exampleInputFile4">Foto 4</label>
              <input type="file" name="imagem4" class="form-control" id="exampleInputFile">
            </div>
              <div class ="form-group">
                <label for="exampleInputFile">Foto 5</label>
                <input type="file" name="imagem5" class="form-control" id="exampleInputFile">
              </div>


              <div class="form-group mb-2">
                <h5>Nome:</h5>
                <input type="text" name= "nome" class="form-control" value="@if(isset($dados["nome"])){{$dados["nome"]}}@endif">
              </div>

              <div class="form-group mb-2">
                
                <h5>Morada:</h5>
                <input type="text" name="morada" class="form-control" value="@if(isset($dados["morada"])){{$dados["morada"]}}@endif" >
              </div>
              
              <div class="form-group mb-2">
                
                <h5>Valor Limpeza:</h5>
                <input type="text" name= "valor_limpeza" class="form-control" value="@if(isset($dados["valor_limpeza"])){{$dados["valor_limpeza"]}}@endif" >
              </div>

              <div class="form-group mb-2">
                
                <h5>Valor Noite:</h5>
                <input type="text" name= "valor_reserva" class="form-control" value="@if(isset($dados["valor_reserva"])){{$dados["valor_reserva"]}}@endif" >
              </div>
              
              <div class="form-group mb-2">
                
                <h5>Descrição:</h5>
                <input type="text" name= "descricao" class="form-control" value="@if(isset($dados["descricao"])){{$dados["descricao"]}}@endif" >
              </div>
            


       
  
  <div class="card btn-card" >
    <div class="card-body">
      <h5 class="card-title">Comodidades que a casa possui:</h5>
      <p class="card-text"></p>

      <div class="form-check" >
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tv" {{$check_tv}}>
        <label class="form-check-label" for="exampleCheck1"></label>
        <i href='#' class=" m-auto text-primary"><svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 0 24 24" width="25"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 3H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5v2h8v-2h5c1.1 0 1.99-.9 1.99-2L23 5c0-1.1-.9-2-2-2zm0 14H3V5h18v12z"/></svg></i>
        Smart TV
      </div>

      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck2" name="wifi" {{$check_wifi}}> 
        <label class="form-check-label" for="exampleCheck2"></label>
        <i href='#' class=" m-auto text-primary"><svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 0 24 24" width="25"><path d="M0 0h24v24H0z" fill="none"/><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3c-1.65-1.66-4.34-1.66-6 0zm-4-4l2 2c2.76-2.76 7.24-2.76 10 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg></i>
        High Wi-fi
      </div>
      
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck3" name="ar" {{$check_ar}}>
        <label class="form-check-label" for="exampleCheck3"></label>
        <i><svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="25" width="25" ><defs><path fill="#000000" id="i-439" d="M37.895,31.553l4,8l-1.789,0.895l-4-8L37.895,31.553z M23,41h2v-8.992L23,32V41z M6.105,39.553l1.789,0.895l4-8 l-1.789-0.895L6.105,39.553z M48,8v18c0,1.607-1.065,4-4,4H4c-2.935,0-4-2.393-4-4V8H48z M42,24H6v4h36V24z M46,10H2v16 c0.008,0.463,0.174,2,2,2v-6h40v6c1.903,0,2-1.666,2-2V10z M41,17c1.105,0,2-0.896,2-2s-0.895-2-2-2s-2,0.896-2,2S39.895,17,41,17z M40.15,25H7.85v2H40.15V25z"/> </defs><use x="0" y="0" xlink:href="#i-439"/></svg></i>        
        AC
      </div>
    </div>
    
  </div>

 

  @if(isset($comentarios) && count($comentarios)>0)
  @foreach($comentarios as $comentario)
  <div class="comments-list comments-card">
    <div class="media">

      <div class="media-body">
      <h3 class="media-heading user_name">{{$comentario["user_name"]}}</h3>{{$comentario["comentario"]}}
        <p class="pull-right"><small>&nbsp; {{$comentario["created_at"]}}</small></p>
      </div>
      <div class="form-btn">
        <a href="/apaga_comentario/{{$comentario["id"]}}" type="button" class="btn btn-outline-primary btn-remove">Remover comentário</a>
      </div>
      <div class="form-btn">
        <a href="/aprova_comentario/{{$comentario["id"]}}" type="button" class="btn btn-outline-primary btn-add">Adicionar comentário</a>
      </div>
    </div>
  </div>
  @endforeach
  @endif

  
  <div class="form-btn">
    
  </div>

  <input type="hidden" name="casa_id" value="@if(isset($casa_id)){{$casa_id}}@endif">
  <div class="form-inline">
    @if(isset($casa_id))
      <a href="/apaga_casa/{{$casa_id}}" type="button" class="btn btn-outline-primary btn-remove mr-2">Remover casa</a>
    @endif
   
    <button type="submit" class="btn btn-outline-primary btn-add"> Submeter</button>
  
  </div>
  
</div>
  </div>
</form>
  </div>
  </main>

  @endsection

  