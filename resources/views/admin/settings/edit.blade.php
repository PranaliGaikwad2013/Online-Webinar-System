<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

 <h1>Setting</h1>
 <form method="POST" action="{{ url('admin/settings/edit') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Website Name:-</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="website_name" id="staticEmail" value="{{ $getRecord->website_name }}">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Website Logo:-</label>
    <div class="col-sm-5">    
      <input type="file" class="form-control" name="logo" id="staticEmail">
      @if(!empty($getRecord->logo))
      @if(file_exists('upload/'.$getRecord->logo))<img src="{{url('upload/'.$getRecord->logo)}}" style="height:100px; width:100px;">
      @endif
      @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Website Banner:-</label>
    <div class="col-sm-5">
       
      <input type="file" class="form-control" name="banner" id="staticEmail">
      @if(!empty($getRecord->banner))
      @if(file_exists('upload/'.$getRecord->banner))<img src="{{url('upload/'.$getRecord->banner)}}" style="height:100px; width:100px;">
      @endif
      @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Profile Image:-</label>
    <div class="col-sm-5">
       
      <input type="file" class="form-control" name="profile_pic" id="staticEmail">
      @if(!empty($getRecord->profile_pic))
      @if(file_exists('upload/'.$getRecord->profile_pic))<img src="{{url('upload/'.$getRecord->profile_pic)}}" style="height:100px; width:100px;">
      @endif
      @endif
    </div>
  </div>

  
  <br>
  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
    <input type="submit" class="btn btn-primary" value="Submit">
    </div>
  </div>
  
</form>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.footer')

</body>

</html>