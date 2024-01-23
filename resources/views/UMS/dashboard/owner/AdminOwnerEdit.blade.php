@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="overview">
    <!-- search box and title -->
    <div class="topContent">
        <div class="icon">
            <button class="back">
                <a href="/dashboard/owner/ownerView.html">
                    <i class="bi bi-x"></i>
                    <span class="word">Cancel</span>
                </a>
            </button>
        </div>

    </div>

    <!-- content -->
    <div class="content">
        <div class="editForm">
            <form action="/dashboard/customer/{{ $owner->id }}" method="post">
                @method('put')
                @csrf
                <div class="div">
                    <label for="title">Name</label>
                    <input type="text" name="name" id="title" @error('name') is-invalid @enderror value="{{ old('name', $owner->name) }}">

                    @error('name')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="placeName">Username</label>
                    <input type="text" name="username" id="title" @error('username') is-invalid @enderror value="{{ old('username', $owner->username) }}">

                    @error('username')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="noPhone">No Phone</label>
                    <input type="text" name="no_phone" id="noPhone" @error('no_phone') is-invalid @enderror value="{{ old('no_phone', $owner->no_phone) }}">

                    @error('no_phone')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="Email" @error('email') is-invalid @enderror value="{{ old('email', $owner->email) }}">

                    @error('email')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" @error('role') is-invalid @enderror value="{{ old('role', $owner->role) }}" disabled>

                    @error('role')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="image">Image</label>
                    <input type="file" src="" alt="" >
                </div>

                <div class="div">
                    <label for="address">Address</label>
                    <div class="addressLine">
                        <input type="text" name="addressLine1" id="" @error('addressLine1') is-invalid @enderror value="{{ old('addressLine1', $owner->addressLine1) }}">

                        @error('addressLine1')
                                <div class="invalid">
                                    {{ $message }}
                                </div>
                        @enderror

                        <input type="text" name="addressLine2" id="" @error('addressLine2') is-invalid @enderror value="{{ old('addressLine2', $owner->addressLine2) }}">

                        @error('addressLine2')
                                <div class="invalid">
                                    {{ $message }}
                                </div>
                        @enderror

                        <input type="text" name="addressLine3" id="" @error('addressLine3') is-invalid @enderror value="{{ old('addressLine3', $owner->addressLine3) }}">

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
@endsection