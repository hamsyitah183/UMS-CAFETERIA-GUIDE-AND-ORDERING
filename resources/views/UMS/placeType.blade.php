@extends('UMS.layout.main')

@section('container')
    <!-- hero -->
    <section class="dining__hero" id="hero">
        <img src="{{ $placeType->image }}" alt="" srcset="">

        <div class="dining__container container">
            <h3 class="small__title">{{ $placeType->name }}</h3>
            <h2 class="big__title">{{ $placeType->description }}</h2>
        </div>
    </section>


    <section class="list__place">
        <div class="list__container container" id="list__container">
            
                @foreach ($places as $place)
                <?php
                    $id = 1;
                    $currentDay = \Carbon\Carbon::now()->format('l');

                    // echo $currentDay . 'hello'
                ?>
                
                {{-- @dd($place->openingHour->where('foodOption_id', 1)->where('dayOfTheWeek', $currentDay)->first()->openTime) --}}

                {{-- @dd($place->openingHour) --}}
                
                    
                    <div class="places">
                        <div class="place__img">
                            <a href="/individual/{{ $place->id }}">
                                @php
                                $imageUrl = $place->image
                                    ? (Str::startsWith($place->image, ['http://', 'https://'])
                                        ? $place->image
                                        : asset('storage/' . $place->image))
                                    : asset('path/to/placeholder-image.jpg');
                                @endphp
                                <img src="{{ $imageUrl }}" alt="" srcset="">
                            </a>
                        </div>

                        <div class="place__detail">
                            <h3>{{ $place->place_name }}</h3>

                            <p class="paragraph">{{ $place->description }}</p>

                            <div class="details">
                                @if($openingHour = $place->openingHour->where('foodOption_id', $place->id)->where('dayOfTheWeek', $currentDay)->first()) 
                                {{-- optional($openingHour)->openTime ? optional($openingHour)->openTime->format('g:i A') : 'Closed' --}}

                                    <h4>HOURS OF OPERATION : {{\Carbon\Carbon::parse(optional($openingHour)->openTime)->format('g:i A')}} - {{\Carbon\Carbon::parse(optional($openingHour)->closeTime)->format('g:i A')}}</h4>
                                @else
                                    <h4>HOURS OF OPERATION : Closed</h4>
                                @endif
                                    {{-- <h4>HOURS OF OPERATION : </h4> --}}

                                <h4>NO.PHONE : {{$place->owner->no_phone}}</h4>
                            </div>

                            <div class="place__button">
                                <button class="btn"><a href="/individual/{{ $place->id }}/menu">Menu</a></button>

                            <button class="btn secondary">Location</button>
                        </div>
                    </div>

                    
                </div>
                @endforeach
                    
                
            
        </div>
    </section>
@endsection