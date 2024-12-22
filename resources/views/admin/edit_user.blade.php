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

 <h1>Update User</h1>
 <form action="{{url('update_user', $user->id)}}" method="POST">
        @csrf
        <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="name" id="staticEmail" value="{{$user->name}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-5">
       
      <input type="text" class="form-control" name="email" id="staticEmail" value="{{$user->email}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="phone" id="staticEmail" value="{{$user->phone}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="address" id="staticEmail" value="{{$user->address}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">User Type</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="usertype" id="staticEmail" value="{{$user->usertype}}">
    </div>
  </div>
  <br>
  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
    <input type="submit" class="btn btn-primary" value="Update User">
    </div>
  </div>
  
</form>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.footer')

</body>

</html>