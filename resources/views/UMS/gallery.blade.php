<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $foodOption->name }} Gallery</title>
    
    <!-- <link rel="stylesheet" href="individual.css"> -->
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery.min.css" integrity="sha512-8CD2yLDF1AmNik2UdGxxZLkJ5QlmCqER75U2O3r1vOyobV9QVeXaFblFkTDUnZfoOxwwJp3PdI+gp9s0GYYLDA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js" integrity="sha512-jEJ0OA9fwz5wUn6rVfGhAXiiCSGrjYCwtQRUwI/wRGEuWRZxrnxoeDoNc+Pnhx8qwKVHs2BRQrVR9RE6T4UHBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css" integrity="sha512-nUqPe0+ak577sKSMThGcKJauRI7ENhKC2FQAOOmdyCYSrUh0GnwLsZNYqwilpMmplN+3nO3zso8CWUgu33BDag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    @for ($i = 0; $i < count($style); $i++)
        <link rel="stylesheet" href={{ asset('css/'.$style[$i].'.css')}}>
     @endfor

</head>
<body>
     <!-- header -->
     @include('UMS.partials.navBar')

    <section class="hero container">
        <h1 class="big__title">Gallery</h1>
        <!-- <p class="medium__title"></p> -->
        <a href="/individual/{{ $foodOption->id }}">Back to page</a>
    </section>

    <!-- gallery -->
    {{-- @dd($foodOption->gallery) --}}

    @if (count($foodOption->gallery)> 0)
        
        {{-- @dd($item --}}
        <section class="gallery container" id="gallery">
            @foreach ($foodOption->gallery as $item)
            {{-- {{ $item->description }} --}}
            @php
                $imageUrl = $item->image
                    ? (Str::startsWith($item->image, ['http://', 'https://'])
                        ? $item->image
                        : asset('storage/' . $item->image))
                    : asset('path/to/placeholder-image.jpg');
            @endphp

            <a href="{{ $imageUrl }}" data-sub-html = "{{ $item->title }}">
                @if ($item->image)
                    @if (Str::startsWith($item->image, ['http://', 'https://']))
                        <!-- External image from the internet -->
                        <img src="{{ $item->image }}" alt="" class="image">
                    @else
                        <!-- Image from Laravel public storage -->
                        <img src="{{ asset('storage/' . $item->image) }}" alt="" class="image">
                    @endif
                @else
                    <!-- Display a placeholder or default image when no image is available -->
                    <img src="{{ asset('path/to/placeholder-image.jpg') }}" alt="" class="image">
                @endif
            </a>
            @endforeach
            
        </section>
        
        
    @endif
    

    



    <div class="container">
        <a href="#hero" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>
     </div>

     <script type="text/javascript">
        lightGallery(document.getElementById('gallery'), {
            
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src={{ asset('js/main.js') }}></script>
</body>
</html>