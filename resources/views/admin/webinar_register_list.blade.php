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
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="{{url('register_search')}}">
        @csrf
        <input type="text" name="search" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
    <div style="overflow-x: scroll;padding: 10px;">
    <table class="table hover data-table-export">
        <thead>
          <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Webinar Register</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">City</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $register)
    <tr>
    <td>{{$loop->iteration}}</td>
        <td>{{$register->webinar->title ?? 'N/A'}}</td>
        <td>{{$register->name}}</td>
        <td>{{$register->email}}</td>
        <td>{{$register->phone}}</td>
        <td>{{$register->country}}</td>
        <td>{{$register->state}}</td>
        <td>{{$register->city}}</td>
        <td>
            <a href="{{url('delete_list', $register->id)}}" class="btn btn-danger" onclick="conformation(event)">Delete</a>
        </td>
    </tr> 
@endforeach

        </tbody>
      </table>
      <div class="pagination">
        {{ $data->links() }} 
    </div>
      
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