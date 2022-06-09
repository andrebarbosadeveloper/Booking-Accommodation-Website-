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
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @if(is_array($imagens) && count($imagens)>0)
          @foreach($imagens as $index=>$imagem )
        <li data-target="#myCarousel" data-slide-to="{{$index}}" class="{{$imagem["class"]}}"></li>
          @endforeach
          @endif
        </ol>
        <div class="carousel-inner">
          @if(is_array($imagens) && count($imagens)>0)
          @foreach($imagens as $imagem)
            <div class="carousel-item {{$imagem["class"]}}">
            <img class="d-block w-100" alt="..." src="{{URL::asset('/images/'.$imagem['imagem'])}}">
            </div>
          @endforeach
          @endif
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
      </div>
    
      <!-- Reserva -->
      <div>
        <div class="container">
          <div class="col container-style">
            <div class="booking-form">
              <form id="teste" method="POST" action="{{'/faz_reserva'}}">
                <input type="hidden" name="casa_id" value="{{$casa_id}}">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <span class="form-label">Check In</span>
                      <input class="form-control" type="date" name="checkin" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <span class="form-label">Check out</span>
                      <input class="form-control" type="date" name="checkout" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <span class="form-label">Quartos</span>
                      <select class="form-control" name="quartos">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </select>
                      <span class="select-arrow"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <span class="form-label">Adultos</span>
                      <select class="form-control" name="adultos">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </select>
                      <span class="select-arrow"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <span class="form-label" name="criancas">Crianças</span>
                      <select class="form-control">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                      </select>
                      <span class="select-arrow"></span>
                    </div>
                  </div>
                </div>
                <a href="{{'/pagamento'}} ">
                <div class="form-btn">
                  <button type="submit" class="btn btn-outline-primary" style="margin-left:500px;">Reserva</button>
                </div>
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Room Section Begin -->
      <section class="room-section">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-lg-6">
              <div id="myCarousel1" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                  @if(is_array($imagens) && count($imagens)>0)
                  @foreach($imagens as $index=>$imagem )
                <li data-target="#myCarousel1" data-slide-to="{{$index}}" class="{{$imagem["class"]}}"></li>
                  @endforeach
                  @endif
                </ol>
                <div  class="carousel-inner" >
                  
                  @if(is_array($imagens) && count($imagens)>0)
                  @foreach($imagens as $imagem)
                    <div class="carousel-item {{$imagem["class"]}}">
                    <img class="d-block w-100" alt="..." src="{{URL::asset('/images/'.$imagem['imagem'])}}">
                    </div>
                  @endforeach
                  @endif
                </div>
                <a class="carousel-control-prev" href="#myCarousel1" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel1" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="ri-text">
                <div class="section-title">
                  <div class="section-title">

                    @foreach ($casas as $casa)
                    <h2>{{$casa['nome'] }}</h2>
                    @endforeach
                   
                    <h6>{{$casa['descricao'] }}</h6>
                   
                    
                 

                  </div>

                 
    
                </div>
              </div>
            </div>
          </div>
          <div class="row">
             <div class="col-lg-6 order-lg-2">
              <div id="myCarousel3" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                  @if(is_array($imagens) && count($imagens)>0)
                  @foreach($imagens as $index=>$imagem )
                <li data-target="#myCarousel3" data-slide-to="{{$index}}" class="{{$imagem["class"]}}"></li>
                  @endforeach
                  @endif
                </ol>
                <div  class="carousel-inner" >
                  
                  @if(is_array($imagens) && count($imagens)>0)
                  @foreach($imagens as $imagem)
                    <div class="carousel-item {{$imagem["class"]}}">
                    <img class="d-block w-100" alt="..." src="{{URL::asset('/images/'.$imagem['imagem'])}}">
                    </div>
                  @endforeach
                  @endif
                </div>
                <a class="carousel-control-prev" href="#myCarousel3" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel3" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="col-lg-6 order-lg-1 centro">
              <div class="ri-features">
                <div class="ri-info center">
                  @if($tv==1)
                  <div class="i">
                  <i href='#' class=" m-auto text-primary"><svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 0 24 24" width="50"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 3H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5v2h8v-2h5c1.1 0 1.99-.9 1.99-2L23 5c0-1.1-.9-2-2-2zm0 14H3V5h18v12z"/></svg></i>
                  Smart TV
                  </div>
                  @endif
                  @if($wifi==1)
                  <div class="i">
                  <i href='#' class=" m-auto text-primary"><svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 0 24 24" width="50"><path d="M0 0h24v24H0z" fill="none"/><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3c-1.65-1.66-4.34-1.66-6 0zm-4-4l2 2c2.76-2.76 7.24-2.76 10 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg></i>
                  High Wi-fi
                  </div>
                  @endif
                  @if($ar==1)
                  <div class="i">
                  <i> <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="50" width="50" ><defs><path fill="#000000" id="i-439" d="M37.895,31.553l4,8l-1.789,0.895l-4-8L37.895,31.553z M23,41h2v-8.992L23,32V41z M6.105,39.553l1.789,0.895l4-8 l-1.789-0.895L6.105,39.553z M48,8v18c0,1.607-1.065,4-4,4H4c-2.935,0-4-2.393-4-4V8H48z M42,24H6v4h36V24z M46,10H2v16 c0.008,0.463,0.174,2,2,2v-6h40v6c1.903,0,2-1.666,2-2V10z M41,17c1.105,0,2-0.896,2-2s-0.895-2-2-2s-2,0.896-2,2S39.895,17,41,17z M40.15,25H7.85v2H40.15V25z"/> </defs><use x="0" y="0" xlink:href="#i-439"/></svg></i>        
                  AC
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
    
          <div class="row">
            <div class="col-lg-6">
              <div id="myCarousel2" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                  @if(is_array($imagens) && count($imagens)>0)
                  @foreach($imagens as $index=>$imagem )
                <li data-target="#myCarousel2" data-slide-to="{{$index}}" class="{{$imagem["class"]}}"></li>
                  @endforeach
                  @endif
                </ol>
                <div  class="carousel-inner" >
                  
                  @if(is_array($imagens) && count($imagens)>0)
                  @foreach($imagens as $imagem)
                    <div class="carousel-item {{$imagem["class"]}}">
                    <img class="d-block w-100" alt="..." src="{{URL::asset('/images/'.$imagem['imagem'])}}">
                    </div>
                  @endforeach
                  @endif
                </div>
                <a class="carousel-control-prev" href="#myCarousel2" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel2" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="ri-text">
                <div class="section-title">
                  <div class="section-title">
                    <h1>Comentários </h1>
                  </div>
                  <div class="comments-list">
                    @if(is_array($comentarios) && count($comentarios)>0)
                      @foreach($comentarios as $comentario)
                        <div class="media" style="margin-top:30px;">
                          <div class="media-body">
                          <h3 class="media-heading user_name">{{$comentario["user_name"]}}</h3>{{$comentario["comentario"]}}
                            <p class="pull-right"><small>{{$comentario["created_at"]}}</small></p>
                          </div>
                        </div>
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
    
              <div class="container pb-cmnt-container">
                <div class="row">
                  <div class="col-md-6 col-md-offset-6 ">

                      <form class="form-inline" method="post" enctype="multipart/form-data" action="{{ url('/guardarcomentario') }}">
                        @csrf
                        <textarea placeholder="Escreva o ser comentário!" name= "comentario" class="form-control w-100 mb-2"></textarea>
                      <input type="hidden" value="{{$casa_id}}" name=casa_id >
                          <button class="btn btn-primary pull-right" type="submit">Comentar</button>
                        </form>
                   
                  </div>
                </div>
              </div>
    
            </div>
          </div>

        </div>
    
      </section>
      <!-- Room Section End -->
    
    
      </div><!-- /.container -->
    
    
  </main>

  @endsection

  