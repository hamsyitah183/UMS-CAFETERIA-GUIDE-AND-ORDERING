@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<style>
    nav ~ .dashboard, body {
        background-color: #fff;
    }

    .img-preview {
        width: 400px;
        height: 300px;
        object-fit: cover
    }
</style>
<div class="overview">
    <div class="title">
        <i class="ri-gallery-line"></i>
        <span class="text">Gallery</span>
        
    </div>

    <div class="date">
        <span id="date"></span>
    </div>

    
</div>


<div class="galleryForm">
    <form action="/dashboard/gallery/"  method="post" enctype="multipart/form-data">
        @csrf
        <div class="file">
            <img src="" alt="" srcset="" class="img-preview">
            <input type="file" name="image" id="image" onchange='previewImage()'>
        </div>


        <div class="text">

            <input type="text" name="title" id="" placeholder="image title">
        </div>

        <div class="activity">
            <button class="btn">Submit</button>
        </div>
    </form>
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
@endsection