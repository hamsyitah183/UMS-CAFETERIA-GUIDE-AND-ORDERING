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

    .text.flex {
        display:  flex;
        gap: 50px;
    }

    textarea {
        width: 50%;
    }
</style>
<div class="overview">
    <div class="title">
        <i class="ri-article-line"></i>
        <span class="text">Post</span>
        
    </div>

    <div class="date">
        <span id="date"></span>
    </div>

    
</div>


<div class="galleryForm">
    <form action="/dashboard/post/"  method="post" enctype="multipart/form-data">
        @csrf
        <div class="file">
            <img src="" alt="" srcset="" class="img-preview">
            <input type="file" name="image" id="image" onchange='previewImage()'>
        </div>


        <div class="text">

            <input type="text" name="title" id="" placeholder="Post title">
        </div>



        <div class="text flex">
            <div>
                <input type="radio" name="category" id="news" value="News" checked>
                <label for="news">News</label>
            </div>
           <div>
                <input type="radio" name="category" id="news" value="Promo" checked>
                <label for="news">Promo</label>
           </div>
        </div>

        <div class="text">

            <textarea type="text" name="content" id="" placeholder="Content" cols="30" rows="10"></textarea>
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