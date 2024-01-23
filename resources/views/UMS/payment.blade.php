@extends('UMS.layout.main')

{{-- @dd($carts) --}}

@section('container')


<section class="hero" id="hero">
    <img src="https://images.pexels.com/photos/2293367/pexels-photo-2293367.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
    <div class="hero__container container">
        <div class="small__title">Cart</div>
        <div class="medium__title">Your Campus Cravings, <br><span class="highlight">Ready to Order</span></div>
    </div>
</section>

<p class="container back"><a href="">Back to order</a></p>

<div class="cart container">
    <div class="left">
        <h3>Scan this QR</h3>
        <div class="img payment">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgelT3XyG8BefyT2-zAuGp9I8FoE9TN2BEKsJ2EsCUTxUg3DvDJqDCyLveXZ7QrkLnNa9KlrP5DBtDYvMiFzKNEKr7s42H4rISmWGjhKToViNcSR6xEkUmxr_cuYJX2mWfhIpLn4ZvQ1ls-gzyxk0lM44UQIX6YAff5CTei4iZAiZa3_0auak1IYcGa9X8/s1600/WhatsApp%20Image%202024-01-15%20at%2008.16.02.jpeg" alt="">
        </div>
    </div>

    <div class="right payment">
        <form action="/payment/confirm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="image">
                <h2 class="title">Payment</h2>

                <img src="" alt="" srcset="" class="img-preview">
                <input type="file"  name="image" id="image" onchange='previewImage()'  @error('image')
                    is-invalid
                @enderror value="{{ old('image') }}">

                @error('image')
                    <div class="invalid">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="payment_no">
                <h2 class="title">Payment ref no</h2>
                <textarea name="payment_ref_no" id="payment_no" cols="30" rows="10"  @error('payment_ref_no')
                is-invalide
                @enderror value="{{ old('payment_ref_no') }}">

                @error('end')
                    <div class="invalid">
                        {{ $message }}
                    </div>
                @enderror
            </textarea>
            </div>
            

            <div class="activty">
                <button class="btn">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');


        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>



<div class="container">
    <a href="#hero" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>
 </div>

@endsection