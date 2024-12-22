<section>
  <div class="container py-5">
    <div class="heading_container heading_center">
      <h2>Latest Webinars</h2>
    </div>
    <div class="row">
      @php
        $webinars = App\Models\Webinar::all();
      @endphp
      @foreach ($webinars as $webinar)
        <div class="col-md-6 col-lg-4 mb-4"> 
          <div class="card">
            <div class="d-flex justify-content-between p-3">
              <h4 class="mb-0 text-black">{{$webinar->title}}</h4>
            </div>
            <img src="{{ url('upload/' . $webinar->image) }}" class="card-img-top" alt="Webinar Image" />
            <div class="card-body">
              <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0">Start Date:</h5>
                <h5 class="text-dark mb-0">{{$webinar->start_date}}</h5>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0">Price:</h5>
                <h5 class="text-dark mb-0">{{$webinar->price}}</h5>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <a href="{{ url('web_register', $webinar->id) }}" class="btn btn-primary" data-price="{{$webinar->price}}" onclick="setPaymentAmount(this)">Webinar Register</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ url('web_details', $webinar->id) }}">Webinar Details</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<script>
  function setPaymentAmount(element) {
      var price = element.getAttribute('data-price');
      document.getElementById('amount').value = price; 
  }
</script>
