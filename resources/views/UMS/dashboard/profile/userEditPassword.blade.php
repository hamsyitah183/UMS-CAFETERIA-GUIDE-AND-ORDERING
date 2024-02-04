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
            <form action="/dashboard/profile/password/{{ $customer->id }}" method="post">
                @method('put')
                @csrf
                <div class="div">
                    <label for="title">Old password</label>
                    <input type="password" name="password" id="title" @error('old_password') is-invalid @enderror>

                    @error('old_password')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="div">
                    <label for="title">New password</label>
                    <input type="password" name="new_password" id="title" @error('new_password') is-invalid @enderror>

                    @error('new_password')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

             
                <div class="div">
                    <label for="title">Confirm password</label>
                    <input type="password" name="confirm_password" id="title" @error('confirm_password') is-invalid @enderror>

                    @error('confirm_password')
                            <div class="invalid">
                                {{ $message }}
                            </div>
                    @enderror
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