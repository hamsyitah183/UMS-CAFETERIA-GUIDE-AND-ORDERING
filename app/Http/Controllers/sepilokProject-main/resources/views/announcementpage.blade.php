<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepilok Orangutan Rehabilitation Centre</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<body>


<div id="carouselExampleCaptions" class="carousel slide">

    @foreach($sliders as $key => $slider)
    <div class="carousel-inner">
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
            @if($slider->annImg)
                <img src="{{ asset($slider->annImg) }}" class="d-block w-100" alt="...">
            @endif

        <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                        {{$slider->annTitle}}
                        </h1>
                        <p>
                        {{$slider->annDesc}}
                        </p>
                    </div>
                </div>
        </div>
    @endforeach

  </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script></head>

</body>
</html>