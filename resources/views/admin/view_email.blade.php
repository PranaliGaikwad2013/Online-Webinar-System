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
    <div style="overflow-x: scroll;padding: 10px;">
    <table class="table hover data-table-export">
    <thead>
        <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Email Verified</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
        <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->email_verified_at)
                    {{ \Carbon\Carbon::parse($user->email_verified_at)->format('Y-m-d') }}
                @else
                    N/A
                @endif
            </td>
            <td>{{$user->usertype}}</td>
            <td>
            @if($user->email_verified_at)
                    <span style="color: green;">Done</span>
                @else
                    <span style="color: red;">Pending</span>
                @endif
            </td>
            <td>
                <!-- <a href="{{url('edit_user', $user->id)}}" class="btn btn-primary">Edit</a> -->
                <a href="{{url('delete_email', $user->id)}}" class="btn btn-danger" onclick="conformation(event)">Delete</a>
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>
{{$users->links()}}
      
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