@extends('layouts.app')



@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/simple-line-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/landing-page.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/form-validation.css') }}">

<script src="https://www.paypal.com/sdk/js?client-id=ZKAZSMK5P9SEU"> // Required. </script>
<script> paypal.Buttons().render('paypal-button-container');// This function displays Smart Payment Buttons on your web page.</script>
<link rel="canonical" href="{{ asset('https://getbootstrap.com/docs/4.5/examples/checkout/')}}">


@endsection

@section('content')
<main class="pagamento">    
    <body class="bg-light">
        <div class="container">
       
      
        <div class="row">
          <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Reserva</span>
            </h4>
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Taxa de limpeza</h6>
                </div>
              <span class="text-muted">€{{Session::get('total_limpeza')}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Valor da reserva</h6>
                </div>
                <span class="text-muted">€{{Session::get('total_reserva')}}</span>
              </li>
            
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (EUR)</span>
              <strong>€{{Session::get('total')}}</strong>
              </li>
            </ul>
      
          </div>
          <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Informação do cliente</h4>
            <form class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">Primeiro nome</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="lastName">Ultimo nome</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>
              </div>
      
           
      
              <div class="mb-3">
                <label for="email">Email <span class="text-muted"></span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
      
              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="country">Country</label>
                  <select class="custom-select d-block w-100" id="country" required>
                    <option value="">Choose...</option>
                    <option>United States</option>
                    <option>Portugal</option>
                    <option>Spain</option>
                    <option>UK</option>
                    <option>Poland</option>
                    
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>
               
              </div>
              
              <h4 class="mb-3">Pagamento</h4>


              <div id="paypal-button-container"></div>

                 <!-- Include the PayPal JavaScript SDK -->
                <script src="https://www.paypal.com/sdk/js?client-id=AavUptQzPkjmyIJCKZJVPIv2btRQ1FSXigWgy4FzCeCcutuZl4T7MWPxCrfr-XuqhNLBivuiCtH0UcYM"></script>

        <script>
                // Render the PayPal button into #paypal-button-container
                  paypal.Buttons({
                    style: {
                        layout: 'horizontal'
                      },
                  createOrder: function(data, actions) {
                      return actions.order.create({
                          purchase_units: [{
                              amount: {
                                value: {{Session::get('total')}}
                              }
                            }]
                        });
                    },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }
        }).render('#paypal-button-container');
      </script>

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
          </div>
        </div>
      
        </div>
    </body>
  </main>

  @endsection

  