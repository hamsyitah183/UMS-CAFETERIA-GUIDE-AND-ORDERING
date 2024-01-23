@extends('UMS.layout.main')

@section('container')
<section class="result container">
    @if (count($search) > 0)
    <h4 class="title">Result (<span class="number">60</span>)</h4>
    {{-- @dd($search) --}}
    <div class="results">
        
        @foreach ($search as $item)
        <div class="resultItem">
            <div class="flex">
                <div class="image">
                    <a href="">
                        <img src="{{ $item->image }}" alt="" srcset="">

                    </a>
                </div>

                <div class="information">
                    <div class="name">
                        <h5>{{ $item->name }}</h5>
                    </div>

                    {{-- <div class="address">
                        <h5><i class="ri-map-pin-line"></i>{{ $sear }}</h5>
                    </div> --}}
                    <div class="price">
                        <h5>{{ $item->price }}</h5>
                    </div>

                    {{-- <div class="link">
                        <a href="">foodOp</a>
                    </div> --}}
                </div>
            </div>
        </div>
        @endforeach
        
        
    </div>
    @else
    <h4 class="title">No result</h4>
    @endif
</section>
@endsection