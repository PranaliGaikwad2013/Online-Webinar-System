<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  
@include('home.css')

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel - Razorpay Payment Gateway Integration</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
<div class="hero_area">
@include('home.header')
        <!-- end header section -->
    <!-- slider section -->

</div>
    <div id="app">

        <main class="py-4">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 offset-3 col-md-offset-6">

  

                        @if($message = Session::get('error'))

                            <div class="alert alert-danger alert-dismissible fade in" role="alert">

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                    <span aria-hidden="true">×</span>

                                </button>

                                <strong>Error!</strong> {{ $message }}

                            </div>

                        @endif

  

                        @if($message = Session::get('success'))

                            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                    <span aria-hidden="true">×</span>

                                </button>

                                <strong>Success!</strong> {{ $message }}

                            </div>

                        @endif

  

                        <div class="card card-default">
                        <div class="card-header text-center">
                            Webinar Payment
                        </div>

                        <div class="card-body text-center">
                            <form action="{{ route('razorpay.payment.store') }}" method="POST" id="payment-form">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Enter Amount (INR):</label>
                                    <input type="text" id="amount" name="amount" class="form-control" required>
                                </div>
                                <button type="button" id="rzp-button1" class="btn btn-primary">Pay</button>
                            </form>
                        </div>
                    </div>

                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
           <script>
    document.getElementById('rzp-button1').onclick = function(e) {
        var amount = document.getElementById('amount').value;
        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}", 
            "amount": amount * 100, 
            "currency": "INR",
            "name": "ItSolutionStuff.com",
            "description": "Rozerpay",
            "image": "https://www.itsolutionstuff.com/frontTheme/images/logo.png",
            "handler": function (response){
               
                document.getElementById('payment-form').submit();
            },
            "prefill": {
                "name": "name",
                "email": "email"
            },
            "theme": {
                "color": "#ff7529"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault();
    }
</script>

                            

                            </div>

                        </div>

  

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>

</html>