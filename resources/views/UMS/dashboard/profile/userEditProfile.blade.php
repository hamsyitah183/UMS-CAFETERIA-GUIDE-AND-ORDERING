@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="overview">
    <!-- search box and title -->
    <div class="topContent">
        <div class="icon">
            <button class="back">
                <a href="/dashboard/profile">
                    <i class="bi bi-x"></i>
                    <span class="word">Cancel</span>
                </a>
            </button>
        </div>

    </div>

    <!-- content -->
    <div class="content">
        <div class="editForm">
            <form action="/dashboard/profile/{{ $customer->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="div">
                    <label for="title">Name</label>
                    <input type="text" name="name" id="title" @error('name') is-invalid @enderror value="{{ old('name', $customer->name) }}">

                    @error('name')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="placeName">Username</label>
                    <input type="text" name="username" id="title" @error('username') is-invalid @enderror value="{{ old('username', $customer->username) }}">

                    @error('username')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="noPhone">No Phone</label>
                    <input type="text" name="no_phone" id="noPhone" @error('no_phone') is-invalid @enderror value="{{ old('no_phone', $customer->no_phone) }}">

                    @error('no_phone')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="Email" @error('email') is-invalid @enderror value="{{ old('email', $customer->email) }}">

                    @error('email')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" @error('role') is-invalid @enderror value="{{ old('role', $customer->role) }}" disabled>

                    @error('role')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="image">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $customer->image }}">
                    @if ($customer->image)
                        @if (Str::startsWith($customer->image, ['http://', 'https://']))
                            <!-- External image from the internet -->
                            <div>
                                <img src="{{ $customer->image }}" alt="" class="image img-preview">
                            </div>
                        @else
                            <!-- Image from Laravel public storage -->
                            <div>
                                <img src="{{ asset('storage/' . $customer->image) }}" alt="" class="image img-preview">
                            </div>
                        @endif
                
                    <img src="" alt="" srcset="" class="img-preview">
                    <input type="file" name="image" id="image" onchange='previewImage()'>
                    
                    @else
                        <img src="" alt="" srcset="" class="img-preview">
                        <input type="file" name="image" id="image" onchange='previewImage()'>

                    @endif
                
                </div>

                <div class="div">
                    <label for="address">Address</label>
                    <div class="addressLine">
                        <input type="text" name="addressLine1" id="" @error('addressLine1') is-invalid @enderror value="{{ old('addressLine1', $customer->addressLine1) }}">

                        @error('addressLine1')
                                <div class="invalid">
                                    {{ $message }}
                                </div>
                        @enderror

                        <input type="text" name="addressLine2" id="" @error('addressLine2') is-invalid @enderror value="{{ old('addressLine2', $customer->addressLine2) }}">

                        @error('addressLine2')
                                <div class="invalid">
                                    {{ $message }}
                                </div>
                        @enderror

                        <input type="text" name="addressLine3" id="" @error('addressLine3') is-invalid @enderror value="{{ old('addressLine3', $customer->addressLine3) }}">

                        @error('addressLine3')
                                <div class="invalid">
                                    {{ $message }}
                                </div>
                        @enderror
                        

                    </div>
                </div>


                <div class="div">
                    <div class="icon">
                        <button type="submit">
                            <a href="">
                                <i class="bi bi-check"></i>
                                <span class="word">Change</span>
                            </a>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="container">
        <a href="#hero" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>
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
@endsection