<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')

  <style>
    input[type="text"]{
        width: 400px;
        height: 50px;
    }
    .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
    }
  </style>
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
    <h1>Update Category</h1>
  <div class="div_deg">
   
    <form action="{{url('update_category', $data->id)}}" method="POST">
        @csrf
<input type="text" name="category" value="{{$data->category_name}}">
<input type="submit" class="btn btn-primary" value="Update Category">
    </form>
  </div>
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.footer')

</body>

</html>