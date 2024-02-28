<style>
    .today {
        margin-top: 50px;
    }
</style>


@php
    $today_pick = $all->where('today_pick', 1);
@endphp
<div class="today container" >
    <h1>Today pick</h1> <p><a href="/">Edit</a></p>
    <div class="populars">
        @foreach ($today_pick->take(4) as $item)
            <div class="popular">
                <div class="img">
                    @php
                        $imageUrl = $item->image
                            ? (Str::startsWith($item->image, ['http://', 'https://'])
                                ? $item->image
                                : asset('storage/' . $item->image))
                            : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQihCQgZa4NQhg2aMeP1hRGApIXvKoq6IH_AnLILn3xpA&s';
                    @endphp
                    <img src="{{ $imageUrl }}" alt="" srcset="">
                </div>
                <div class="information">
                    <h3>{{ $item->name }}</h3>
                    <p class="price">RM {{ $item->price }}</p>
                </div>
            </div>

        @endforeach
       
        
        
    </div>
    
</div>