



<div class="latest__menu container">
    <div class="title">
        <h1 class="main_title">Latest addition</h1>
        <div class="view">
            @if (request()->is('dashboard/menu'))
                <a href="/dashboard/menu/list/all">view all <i class="ri-arrow-right-s-line"></i></a>

            @elseif (request()->is('dashboard/breakfast'))
            <a href="/dashboard/menu/list/breakfast">view all <i class="ri-arrow-right-s-line"></i></a>

            @elseif (request()->is('dashboard/lunch'))
            <a href="/dashboard/menu/list/lunch">view all <i class="ri-arrow-right-s-line"></i></a>

            @elseif (request()->is('dashboard/drinks'))
            <a href="/dashboard/menu/list/drink">view all <i class="ri-arrow-right-s-line"></i></a>

            @endif
           
        </div>
    </div>
    <div class="menu">
        <div class="breakfast lists">
            
            @foreach ($items->take(6) as $item)
            @php
                if ($item->image == NULL) {
                    $item->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQihCQgZa4NQhg2aMeP1hRGApIXvKoq6IH_AnLILn3xpA&s';
                }
               
                if($item->status == 'in_stock') {
                    $status = 'In stock';
                }

                elseif ($item->status == 'out_of_stock') {
                    # code...
                    $status = 'Out of stock';
                }
            @endphp
            <div class="list" >
                <div class="item" >
                    <div class="option">
                        <!-- <i class="ri-more-line"></i>

                        <div class="list_option">
                            <p>Edit</p>
                            <p>Delete</p>
                        </div> -->
                        <i class="ri-eye-line" onclick="togglePopup('{{ $item->id }}')"></i>
                    </div>
                    <div class="img" onclick="togglePopup('{{ $item->id }}')">
                        @php
                            $imageUrl = $item->image
                                ? (Str::startsWith($item->image, ['http://', 'https://'])
                                    ? $item->image
                                    : asset('storage/' . $item->image))
                                : asset('path/to/placeholder-image.jpg');
                        @endphp
                        <img src="{{ $imageUrl }}" alt="">
                    </div>
                </div>
                <h3>{{ $item->name }}</h3>
                <div class="information">
                    <div class="info_1">
                        <span class="price">RM {{ $item->price }}</span>
                        <span class="status">{{ $status }}</span>
                    </div>

                    <div class="info_2">
                        latest add: {{ $item->updated_at->format('d M Y (h:i a)') }}
                    </div>
                </div>

                <div class="popup" id="{{ $item->id }}">
                    <div class="overlay">
                        <div class="content">
                            <div class="header">
                                <div class="close-btn" onclick="togglePopup('{{ $item->id }}')"><i class="ri-close-line"></i></div>
                                <h1>{{ $item->name }}</h1>
                            </div>
                            <div class="information">
                                @php
                                $imageUrl = $item->image
                                    ? (Str::startsWith($item->image, ['http://', 'https://'])
                                        ? $item->image
                                        : asset('storage/' . $item->image))
                                    : asset('path/to/placeholder-image.jpg');
                                @endphp
                                <img src="{{ $imageUrl }}" alt="">
                                <p class="description">{{ $item->description }}</p>
                                <p class="price">RM <span>{{ $item->price }}</span></p>
                                <p class="status">{{ $status }}</p>

                                <p class="info_2">latest add: {{ $item->updated_at->format('d M Y (h:i a)') }}</p>
                                
                            </div>
                            <ul class="button">
                                <button class="btn"><a href=""><i class="ri-edit-line"></i> Edit</a></button>
                                <button class="btn"><a href=""><i class="ri-delete-bin-line"></i> Delete</a></button>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            
            
            

                
        </div>
       
    </div>
    

        

        
        
</div>

<script>

function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.toggle('active');
    }
}
</script>