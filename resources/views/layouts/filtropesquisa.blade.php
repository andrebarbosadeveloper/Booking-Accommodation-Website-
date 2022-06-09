@extends('layouts.app')



@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/simple-line-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/landing-page.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">

@endsection

@section('content')
<main>    
    <div class="card card-size" style="border-width: 0px; margin-top:75px">
        <div>
          <li class="list-group-item">Check-In: {{$checkin}}</li>
          <li class="list-group-item">Check-Out: {{$checkout}}</li>
        </div>
      </div>
    
    
      <section class="showcase">
        <div class="container-fluid ">
          @foreach ($casas as $casa)
          <div class="row row-casas">
            <div class="col-4 imagem">  {{-- Pq imagem->imagem --}}
            
              <img src="{{URL::asset('/images/'.$casa->imagem->imagem)}}" class="mw-100" alt="Responsive image">
            </div>
            <div class="col-8 texto-filtro">
              
              <h2>{{$casa->nome}}</h2>
           
              <p> {{$casa->descricao}}</p>
               
              <a href="{{'/casas'}}/{{$casa->id}} ">
              <div class="form-btn" >
              <a href="/casas/{{$casa->id}}?checkin={{$checkin}}&checkout={{$checkout}}" type="button" class="btn btn-outline-primary">Reservar</a>
              </div>
                </a>
            </div>
          </div>
           @endforeach
         

        </div>
      </section>
  </main>

  @endsection

  