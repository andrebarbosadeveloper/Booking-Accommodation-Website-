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

    <div    style="margin-top: 100px;">
      <section class="showcase">
        <div class="container-fluid ">
          @foreach ($casas as $casa)
          <div class="row row-casas">
            <div class="col-2 imagem">


              <img src="{{URL::asset('/images/'.$casa->imagem->imagem)}}" class="w-100" alt="Responsive image">
            </div>
            <div class="col-8 texto-filtro">


              <h2>{{$casa->nome}}</h2>

              <p>{{$casa->descricao}}</p>

                <a href="{{'/casas'}}/{{$casa->id}} ">
              <div class="form-btn" >
                <button  type="button" class="btn btn-outline-primary">Ver</button>
              </div>
                </a>
            </div>
          </div>
          @endforeach

        </div>
      </section>
      {!! $casas->links('pagination::bootstrap-4') !!}
    </div>
    
  </main>

  @endsection
