@extends('layouts.appadmin')



@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/simple-line-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/landing-page.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">


<link rel="stylesheet" type="text/css" href="{{ asset('https://getbootstrap.com/docs/4.5/examples/dashboard/') }}">



@endsection

@section('admincontent')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">    
  
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Geral</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week

      </button>
    </div>
  </div>


  <h2>Receitas</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>id</th>
          <th>Nome</th>
          <th>Rendimento</th>
          <th>Taxa de limpeza</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reservas as $reserva)
        <tr>
          <td>{{$reserva["id_reserva"]}}</td>
          <td>{{$reserva["nome"]}}</td>
          <td>{{$reserva["total_reserva"]}}</td>
          <td>{{$reserva["total_limpeza"]}}</td>
          <td>{{$reserva["total"]}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
</div>
</main>
</div>

  @endsection

  