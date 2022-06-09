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
  
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Todas as casas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="{{'/casanova'}}">
        <button  type="button" class="btn btn-sm btn-outline-secondary" >Adicionar Casa</button>
      </a>
      </div>
    </div>
  </div>
  <section class="showcase">
    <div class="container-fluid ">
      @if(is_array($casas) && count($casas)>0)
      @foreach($casas as $casa)
      <div class="row " style="margin-bottom: 5vh;">
        <div class="col-6">
          <img src="{{URL::asset('/images/'.$casa['imagem']->imagem)}}" class="img-fluid " alt="Responsive image">
        </div>
        <div class="col-6">
          <h2>{{$casa["nome"]}}</h2>
          <p>{{$casa["descricao"]}} </p>

          <div class="form-btn">
            
                
          <a href="{{'/casaedit'}}/{{$casa["id"]}}">
            <button type="button" class="btn btn-outline-primary">Editar</button>
            </a>
          </div>
        </div>
      </div>
      @endforeach
      @endif

    </div>
    
  </div>
  </section>
  </main>

  @endsection

  