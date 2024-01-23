@extends('UMS.layout.main')

@php
    // dd($shopping_cart);
@endphp

@section('container')
<section class="hero" id="hero">
    <img src="https://images.unsplash.com/photo-1588964895597-cfccd6e2dbf9?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" srcset="">
    <div class="hero__container container">
        <div class="small__title">Cart</div>
        <div class="medium__title">Your Campus Cravings, <br><span class="highlight">Ready to Order</span></div>
    </div>
</section>

<form class="shoppingCart container">
    <div class="left">
        @include('UMS.showCartTable')
    </div>

    <div class="right">
        @include('UMS.showCartDetail')
        

        <div class="tableTotal">
            <h3>Cart total</h3>

            <div class="totalPayment">
                <div class="info">
                    <p>No. of item(s)</p>
                    <p class="total">{{ $carts->count() }}</p>
                </div>

                

                <div class="info">
                    <p>Total</p>
                    @php
                    $sum = 0;
                        foreach ($carts as $cart) {
                            # code...
                            

                            $sum += $cart->quantity * $cart->price;
                        }
                    @endphp
                    <p class="total">{{ number_format($sum, 2) }}</p>
                </div>

                <div class="checkout">
                    <div class="btn" onclick="togglePopup('popup-1')">Proceed to checkout</div>
                </div>

                <div class="popup" id="popup-1">
                    <div class="overlay">
                        <div class="content">
                            <div class="header">
                                <div class="close-btn" onclick="togglePopup('popup-1')">&times;</div>
                                <h1>Self pickup notice <i class="bi bi-exclamation-square"></i>
                                </h1>
                            </div>
                            <div class="information">
                                <ul>
                                    <li>Please be advised that this service operates on a self-pickup basis, requiring customers to collect their orders personally.</li>
                                    <li>Kindly note that all orders come with a self-pickup requirement, ensuring a convenient and swift collection process for our valued customers.</li>
                                    <li>Attention: Our self-pickup policy is in effect for all orders, providing you with the flexibility to retrieve your items at your convenience.</li>
                                </ul>

                                <!-- <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg0ZEAByUkyqBy3KA2XqgOY81nFk84IScMXOw95FEGAbTRcXTaBN8w0eF_S19Wo90ZGQtCXMGL8U1WLWU5-VH1DjHvIMVofxYq-si0Mq-ePzJP2jZCAj_hi1KiwujOMr_txRi6raO6JQF2aEuTIH-9rqylSPEBNJRvc_7ywnzKwQ5cP_DdbBWnb4n_YQFY/s16000/orange-woman-with-packages-in-shopping-cart.png" alt="" srcset=""> -->
                                
                            </div>
                            <div class="button">
                                <form action="/addCartTime/{{ $shopping_cart->id }}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="text" name="delivery_time" id="delivery_time" hidden>
                                    {{-- <button class="btn" type="submit"><a href="/checkout">Proceed to Checkout</a></button> --}}
                                    <button class="btn" type="submit">Proceed to Checkout</a></button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</form>

<script>
    function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.toggle('active');
    }
}
</script>

@include('UMS.showCartJs')

@endsection