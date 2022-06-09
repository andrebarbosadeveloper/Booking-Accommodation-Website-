@extends('layouts.app')



@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/simple-line-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/landing-page.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">


@endsection

@section('content')
<main>    
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">AS MELHORES OPORTUNIDADES AOS MELHORES PREÇOS</h1>
        </div>



        <!-- procura da reserva -->


        <div class="container">
          <div class="col col-reservas">
            <div class="booking-form">
              <form id="teste" method="POST" action="{{'/procura_reserva'}}">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <span class="form-label">Check In</span>
                      <input class="form-control" name="checkin" type="date" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <span class="form-label">Check Out</span>
                      <input class="form-control" type="date" name="checkout" required>
                    </div>
                  </div>
                </div>
                <div class="form-btn">
                  <button type="submit" class="btn btn-outline-primary">Verificar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <a href="/listacasas?comodidade=tv">
              <div class="features-icons-icon d-flex">
                {{-- <i href='#' class="icon-screen-desktop m-auto text-primary"></i> --}}
                <i href='#' class=" m-auto text-primary"><svg xmlns="http://www.w3.org/2000/svg" height="100" viewBox="0 0 24 24" width="100"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 3H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5v2h8v-2h5c1.1 0 1.99-.9 1.99-2L23 5c0-1.1-.9-2-2-2zm0 14H3V5h18v12z"/></svg></i>
              </div>
            </a>
            <h3>TV</h3>
            <p class="lead mb-0">Estas casas possuem Televisão </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <a href="/listacasas?comodidade=wifi">
              <div class="features-icons-icon d-flex">
                <i href='#' class=" m-auto text-primary"><svg xmlns="http://www.w3.org/2000/svg" height="100" viewBox="0 0 24 24" width="100"><path d="M0 0h24v24H0z" fill="none"/><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3c-1.65-1.66-4.34-1.66-6 0zm-4-4l2 2c2.76-2.76 7.24-2.76 10 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg></i>
              </div>
            </a>
            <h3>High Wi-Fi</h3>
            <p class="lead mb-0">Rápido Wi-Fi </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <a href="/listacasas?comodidade=ar">
              <div class="features-icons-icon d-flex">
                <i class=" m-auto text-primary" ><svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="100" width="100" ><defs><path fill="#000000" id="i-439" d="M37.895,31.553l4,8l-1.789,0.895l-4-8L37.895,31.553z M23,41h2v-8.992L23,32V41z M6.105,39.553l1.789,0.895l4-8 l-1.789-0.895L6.105,39.553z M48,8v18c0,1.607-1.065,4-4,4H4c-2.935,0-4-2.393-4-4V8H48z M42,24H6v4h36V24z M46,10H2v16 c0.008,0.463,0.174,2,2,2v-6h40v6c1.903,0,2-1.666,2-2V10z M41,17c1.105,0,2-0.896,2-2s-0.895-2-2-2s-2,0.896-2,2S39.895,17,41,17z M40.15,25H7.85v2H40.15V25z"/> </defs><use x="0" y="0" xlink:href="#i-439"/></svg></i>        
              </div>
            </a>
            <h3>Ar Condicionado</h3>
            <p class="lead mb-0">Estas casas possuem Ar Condicionado</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  </main>

  @endsection

  