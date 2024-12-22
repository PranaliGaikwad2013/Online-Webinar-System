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
<h1>Add Country</h1>
    <form method="POST" action="{{ url('admin/state/add') }}">
        @csrf
        <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Country Name</label>
    <div class="col-sm-5">
        <select name="countries_id" id="countries_id" class="form-control" required>
            <option value="">Select Country Name</option>
            @foreach($getCountries as $value)
                <option value="{{ $value->id }}">{{ $value->country_name }}</option>
            @endforeach
        </select>
    </div>
</div>


        <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label"> State Name</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="state_name" id="staticEmail">
    </div>
  </div>
  <br>
    <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
    <input type="submit" class="btn btn-primary" value="Submit">
    <a href="{{url('admin/state/list')}}">Back</a>
    </div>
  </div>
  
</form>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.footer')

</body>

</html>