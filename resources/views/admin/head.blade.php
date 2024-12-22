<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @php
$getSetting = App\Models\Setting::first();
@endphp
  <title>{{ $getSetting->website_name }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

@php
$getSetting = App\Models\Setting::first();
@endphp
        <link rel="icon" type="image/x-icon" href="{{url('upload/'.$getSetting->logo)}}">
 

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('admincss/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('admincss/assets/css/style.css')}}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  