<section class="slider_section">
    <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid">
                        <div class="row">
                        @php
$getSetting = App\Models\Setting::first();
@endphp
                            <div class="col-md-12">
                                <div class="image-container position-relative">
                                    <img src="{{url('upload/'.$getSetting->banner)}}" class="d-block w-100 custom-height" alt="Banner Image">
                                    <h1 class="text-overlay">Welcome To Our Webinars</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .image-container {
        position: relative;
        overflow: hidden; 
    }

    .custom-height {
        height: 400px;
        object-fit: cover; 
        width: 100%; 
    }

    .text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        background-color: rgba(109, 186, 231, 0.6); 
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 24px;
        text-align: center;
    }
</style>
