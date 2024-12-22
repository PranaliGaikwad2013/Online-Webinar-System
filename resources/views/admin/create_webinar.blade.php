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

    <section class="p-3 p-md-4 p-xl-5">
      <div class="container">
           <!-- Display success or error messages -->
           @if(session('success'))
                    <div class="alert alert-success">
                      {{ session('success') }}
                    </div>
                  @endif
      
                  @if($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <h3 class="text-center">Create Webinar here</h3>
                  <form class="form-horizontal" role="form" method="POST" action="{{url('upload_webinar')}}" enctype="multipart/form-data">
                  @csrf
                     
                      <div class="form-group">
                          <label for="title" class="col-sm-3 control-label">Title</label><br><br>
                          <div class="col-sm-9">
                              <input type="text" id="title" name="title" :value="old('title')" placeholder="Webinar Title" class="form-control" autofocus required>
                              <x-input-error :messages="$errors->get('title')" class="mt-2" />
                          </div>
                      </div>
                      <br>
                      <div class="form-group">
                          <label for="start_date" class="col-md-6 control-label">Webinar Start Date</label><br><br>
                          <div class="col-md-9">
                              <input type="date" id="web_start_date" placeholder="Start Date" class="form-control" name="start_date" required>
                          </div>
                      </div><br>
                      <div class="form-group">
                          <label for="start_time" class="col-md-6 control-label">Webinar Start Time</label><br><br>
                          <div class="col-md-9">
                              <input type="time" id="web_start_time" placeholder="Start Time" class="form-control" name="start_time" required>
                          </div>
                      </div><br>
                      <div class="form-group">
                          <label for="end_date" class="col-md-6 control-label">Webinar End Date</label><br><br>
                          <div class="col-md-9">
                              <input type="date" id="web_end_date" class="form-control" placeholder="End date" name="end_date" required>
                          </div>
                      </div><br>
      
                      <div class="form-group">
                          <label for="end_time" class="col-md-6 control-label">Webinar End Time </label><br><br>
                          <div class="col-md-9">
                              <input type="time" id="web_end_time" placeholder="End Time" class="form-control" name="end_time" required>
      
                          </div>
                      </div><br>
                      <div class="form-group">
                          <label for="name" class="col-sm-3 control-label">Speaker Name</label><br><br>
                          <div class="col-sm-9">
                              <input type="text" id="name" name="speaker_name" placeholder="Name" class="form-control" autofocus required>
                          </div>
                      </div><br>
                      <div class="form-group">
                   <label for="about">About Speaker</label>
                  <textarea class="form-control" id="about" rows="3" name="about_speaker" required></textarea>
                  </div><br>
                      <div class="form-group">
             <label for="webinarType" class="col-md-6 control-label">Webinar Type (Free or Paid)</label><br><br>
             <div class="col-md-9">
              <select id="web_type" class="form-control" name="web_type" required>
                  <option value="">Select Webinar Type</option>
                  <option value="free">Free</option>
                  <option value="paid">Paid</option>
              </select>
          </div><br>
          <div class="form-group" style="display:none;" id="price">
             <label for="paid" class="col-md-6 control-label">Webinar Price</label>
             <div class="col-sm-3">
            <input type="text" name="price" placeholder="price" class="form-control">
            </div>
          </div>

      <br>
          <div class="form-check" id="web_gst" style="display:none;">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">
         Include GST
        </label>
      </div>
      </div>
      <br>
      <div class="form-group">
          <label for="webinarMode" class="col-sm-3 control-label web_mode">Webinar Mode</label><br>
          <div class="col-sm-9">
              <select id="webinarMode" class="form-control web_mode" name="web_mode" required>
                  <option value="">Select Webinar Mode</option>
                  <option value="online">Online</option>
                  <option value="offline">Offline</option>
              </select>
          </div><br>
          
      </div>
      
      <div class="form-group"  id="web_add" style="display:none;">
          <label for="web_add">Webinar Address</label>
          <textarea class="form-control web_add" id="web_add1" rows="3" name="web_add"></textarea>
        </div><br>
      <div class="form-group" id="web_link" style="display:none;">
                          <label for="link" class="col-md-6 control-label">Webinar Link </label>
                          <div class="col-md-9">
                              <input type="text" id="web_link1" placeholder="Webinar Link" class="form-control web_link" name="web_link">
      
                          </div>
                      </div>      
      
      <div class="form-group"> 
          <label for="web_desc">Webinar Desciption</label>&nbsp;&nbsp;&nbsp;<button onclick="myFunction()" class="btn btn-primary text-white mb-3">+</button>
          <textarea class="form-control" id="web_desc" rows="3" name="web_desc" required></textarea>
        </div> 
       <br>
        <div class="form-group">
                  <label for="image">Upload Image</label>
                  <input type="file" class="form-control" id="image" name="image">
                  @if(!empty($webinar->image))
      @if(file_exists('upload/'.$webinar->image))<img src="{{url('upload/'.$webinar->image)}}" style="height:100px; width:100px;">
      @endif
      @endif
              </div><br>
            <button class="btn btn-primary" type="submit">Register Webinar</button> 
                  
          </form>
          </div> 
      
      <script>
            document.getElementById('webinarMode').addEventListener('change', function() {
              var selectedValue = this.value;
              var webAddDiv = document.getElementById('web_add');
              var webLinkDiv = document.getElementById('web_link');
      
              if (selectedValue === 'online') {
                  webLinkDiv.style.display = 'block'; 
                  webAddDiv.style.display = 'none'; 
              } else if (selectedValue === 'offline') {
                  webAddDiv.style.display = 'block'; 
                  webLinkDiv.style.display = 'none'; 
              } else {
                  webAddDiv.style.display = 'none'; 
                  webLinkDiv.style.display = 'none';
              }
          });
      
          document.addEventListener('DOMContentLoaded', function() {
          const webTypeSelect = document.getElementById('web_type');
          const gstCheckbox = document.getElementById('web_gst'); 
          const priceCheckbox = document.getElementById('price'); 
          webTypeSelect.addEventListener('change', function() {
          if (this.value === 'paid') {
            gstCheckbox.style.display = 'block'; 
            priceCheckbox.style.display = 'block';
           } else {
            gstCheckbox.style.display = 'none'; 
            priceCheckbox.style.display = 'none'; 
            
            document.getElementById('flexCheckChecked').checked = false; 
        }
      });
     });
      
      
      </script>
      </section>
      

  </main><!-- End #main -->

 @include('admin.footer')

</body>

</html>