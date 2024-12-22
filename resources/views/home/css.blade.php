<!-- Basic -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!-- Site Metas -->
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<!-- @php
    $getSetting = \App\Models\Setting::first();
@endphp

@if($getSetting)
<div style="display: flex; align-items: center; gap: 10px;">
    <img src="{{ url('upload/' . $getSetting->logo) }}" alt="Logo" style="max-width: 50px; max-height: 50px; object-fit: contain;">
    <h1 style="margin: 0;">Webinar</h1>
</div>
@else
<h1>Webinar</h1>
@endif -->


<!-- slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

<!-- Custom styles for this template -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" />
<!-- responsive style -->
<link href="{{asset('css/responsive.css')}}" rel="stylesheet" />