<div class="foodList" id="breakfast">
    @foreach ($breakfast as $item)

    
    <?php 
        if(!($item->image)) $item->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'   
    
        
    ?>
     @php
     $imageUrl = $item->image
         ? (Str::startsWith($item->image, ['http://', 'https://'])
             ? $item->image
             : asset('storage/' . $item->image))
         : asset('path/to/placeholder-image.jpg');
    @endphp
        <div class="item">
            <div class="foodItem">
                
                <img src="{{ $imageUrl }}" alt="" srcset=""  onclick="togglePopup({{ $item->id }})">
                <div class="information">
                    <p>{{ $item->name }}</p>
                    <p class="price">RM {{ $item->price }}</p>

                    

                    <form action="{{ url('addCart', $item->id) }}" method="POST">

                         @csrf 

                        <div class="ordering">
                            <input type="number" value="1" min='1' class="form-comtrol" name="quantityOfCart" >
                            <br>
                            <input type="submit" value="Add to cart" class="btn button">
                        </div>

                    </form>
                    
                </div>

            </div>

            <div class="popup" id="{{ $item->id }}">
                <div class="overlay">
                    <div class="content">
                        <div class="header">
                            <div class="close-btn" onclick="togglePopup({{ $item->id }})">&times;</div>
                            <h1>{{ $item->name }}</h1>
                        </div>
                        <div class="information">
                            <img src="{{ $imageUrl }}" alt="">
                            <p class="description">{{ $item->description }}</p>
                            <p class="price">RM <span>{{ $item->price }}</span></p>

                            
                        </div>
                        <form action="{{ url('addCart', $item->id) }}" method="POST">

                            @csrf 
   
                           <div class="ordering" style="flex-direction: row; gap: 10px; place-content: end; margin-left: 40px;">
                               <input type="number" value="1" min='1' class="form-comtrol" name="quantityOfCart" >
                               <br>
                               <input type="submit" value="Add to cart" class="btn button" style="width: fit-content; padding: 10px">
                           </div>
   
                       </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
</div>