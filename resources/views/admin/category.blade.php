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
    <h3>Add Category</h3>
<div class="div_deg">
    <form action="{{url('add_category')}}" method="POST">
        @csrf
        <div>
            <input type="text" name="category">
       
            <input type="submit" class="btn btn-primary" value="Add Category">
        </div>
    </form>
</div>
<br><br>
<div style="overflow-x: scroll;padding: 10px;">
    <table class="table hover data-table-export">
        <thead>
          <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Category Name</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->category_name}}</td>
                <td>
                    <a href="{{url('edit_category', $data->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('delete_category', $data->id)}}" class="btn btn-danger" onclick="conformation(event)">Delete</a>
                    
                </td>
              </tr> 
            @endforeach
         
        </tbody>
      </table>
      {{$datas->links()}}
      
</div>


    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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