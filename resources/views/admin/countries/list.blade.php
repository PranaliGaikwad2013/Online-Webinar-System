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
    <div class="d-flex align-item-center">
    <a href="{{url('admin/countries/add')}}" class="btn btn-primary">Add Countries</a>
    </div>
   
    <div style="overflow-x: scroll;padding: 10px;">
    
    <table class="table hover data-table-export">
    <thead>
        <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Country Name</th>
            <th scope="col">Create Date</th>
            <th scope="col">Update Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($getRecord as $value)
        <tr>
        <td>{{$loop->iteration}}</td>
            <td>{{$value->country_name}}</td>
            <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
            <td>{{ date('d-m-Y', strtotime($value->updated_at))}}</td>
           
            <td>
                <a href="{{url('admin/countries/edit', $value->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{url('admin/countries/delete', $value->id)}}" class="btn btn-danger" onclick="conformation(event)">Delete</a>
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>

      
</div>

  </main><!-- End #main -->
  <script>
    function conformation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({
            title: "Are You Sure to Delete This",
            text: "This delete will be permanent",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })

        .then((willCancel)=>{

            if(willCancel)
        {
            window.location.href=urlToRedirect;
        }
        })
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('admin.footer')
</body>

</html>