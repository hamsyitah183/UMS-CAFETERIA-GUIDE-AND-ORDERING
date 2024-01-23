{{-- @dd($shopping_cart->foodOption) --}}

<div class="cartDetail">
    <div class="flex">
        <h3>Cart details</h3> 
        <a href="">
            <i class="bi bi-pencil"></i>
        </a>
    </div>

    <div class="totalPayment">
        <div class="info">
            <i class="bi bi-bag"></i>
            <p>Self pickup</p>
        </div>
        <div class="info">
            <i class="bi bi-geo-alt"></i>
            <p>{{ $shopping_cart->foodOption->place_name }}</p>
        </div>
        <div class="info">
            <i class="bi bi-calendar"></i>
            <p>{{  $shopping_cart->created_at->format('d M Y') }}</p>
        </div>
        <div class="info">
            <i class="bi bi-clock"></i>
            <select name="" id="time">
                <option value="10" selected>10.00 AM</option>
                <option value="14">14.00 PM</option>

            </select>
        </div>
    </div>
</div>