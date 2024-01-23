@extends('UMS.dashboard.layouts.main')

@section('dash-content')

<style>
    .img-preview {
        width: 200px;
        height: 300px;
        object-fit: cover;
    }
</style>

{{-- <button><a href="/announcement/all"></a></button> --}}

@php
    // use App\Models\Announcement;
    // $announcement = Announcement::all();


@endphp

{{-- @dd($announcement) --}}
<div class="overview">

    @if (session()->has('success'))
        <div class="success">
            {{ session('success') }}
            <i class="ri-close-line"></i>
        </div>
    
    @elseif (session()->has('delete'))
        <div class="success delete">
            {{ session('delete') }}
            <i class="ri-close-line"></i>
        </div>
    @endif

    {{-- @if (session()->has('delete'))
        <div class="success delete">
            {{ session('delete') }}
        </div>
    @endif --}}
    <!-- search box and title -->
    <div class="topContent">
        <div class="title">
            <i class="bi bi-megaphone"></i>                    
            <span class="text">Announcement</span>

            
        </div>

        

        <div class="form">
            @csrf
            <form action="/dashboard/announcement" method="GET">
                <input type="text" name="announcement" id="" placeholder="search for announcement" value="{{ request('announcement') }}">
                <button type="submit" class="btn"><i class="bi bi-search"></i></button>
            </form>
        </div>

    </div>

    
@if (auth()->user()->role == 'admin')
     <!-- add new announcement -->
     <div class="newAnnouncement">
        <ul id="accordion">
            <li>
                <label for="first"><h1>New announcement</h1><span>&#x3e</span></label>
                <input type="radio" name="accordion" id="first" >
                <div class="content">
                    <form action="/dashboard/announcement" method="post" enctype="multipart/form-data">
                        @csrf
                        <table>
                            <!-- <h1>New announcement</h1> -->
                            <div class="input titles">
                                <tr>
                                    <td>
                                        <label for="title">Title</label>
                                    </td>
                                    <td>
                                        <input type="text" name="title" id="title" placeholder="Enter title" 
                                        @error('title') is-invalid @enderror value="{{ old('title') }}">

                                        @error('title')
                                            <div class="invalid">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                            </div>

                            <div class="input titles">
                                <tr>
                                    <td>
                                        <label for="title">Slug</label>
                                    </td>
                                    <td>
                                        <input type="text" name="slug" id="slug" 
                                        placeholder="Enter slug" value="{{ old('slug') }}" disabled>
                                    </td>
                                </tr>
                            </div>
        
                            <div class="input start">
                                <tr>
                                    <td>
                                        <label for="start">Start</label>
                                    </td>

                                    <td>
                                        <input type="datetime-local" name="start" id="" @error('start')
                                            is-invalid
                                        @enderror value="{{ old('start') }}">

                                        @error('start')
                                            <div class="invalid">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                            </div>
        
                            <div class="input end">
                                <tr>
                                    <td>
                                        <label for="end">End</label>
                                    </td>
                                    <td>
                                        <input type="datetime-local" name="end" @error('end')
                                            is-invalide
                                        @enderror value="{{ old('end') }}">

                                        @error('end')
                                            <div class="invalid">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                            </div>
        
                            <div class="input image">
                                <tr>
                                    <td>
                                        <label for="image">Image</label>
                                    </td>
                                    <td>
                                        <img src="" alt="" srcset="" class="img-preview img">

                                        <input type="file" name="image" id="image"  @error('image')
                                        is-invalide
                                        @enderror value="{{ old('image') }}" onchange='previewImage()'>

                                        @error('image')
                                            <div class="invalid">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                            </div>

                            <div class="input image">
                                <tr>
                                    <td>
                                        <label for="place name">Place name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="place" id="" placeholder="Eg: Market" @error('place') is-invalid @enderror value="{{ old('value') }}">

                                        @error('place')
                                            <div class="invalid">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                            </div>
        
                            <div class="input content">
                                <tr>
                                    <td>
                                        <label for="content">Content</label>

                                    </td>
                                    <td>
                                        <textarea name="body" id="content" cols="30" rows="10" value = {{ old('content') }}></textarea>

                                    </td>
                                </tr>
                            </div>
                        </table>
                        <div class="submit">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
        
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/announcement/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
    </script>



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
    <!-- content -->
    <div class="content">
        <div class="announcement">
            <h2 class="title">List of announcement</h2>
            <div class="btn">
                <button style="width: fit-content; border-radius:10px; padding: 0px 10px">
                    <a href="/dashboard/announcement/generate" style="color: white">Download list</a>
                </button>
                <button style="width: fit-content; border-radius:10px; padding: 0px 10px">
                    <a href="/dashboard/announcement/view" style="color: white">View list</a>
                </button>
            </div>
                
            

            <div class="announcementList">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Admin Name</th>
                            <th>Title</th>
                            <th>Date posted</th>
                            <th>Activity</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @dd($announcement[0]->admin) --}}
                        @if ($announcement->count())
                            @foreach ($announcement as $a)
                                <tr>
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->admin->name }}</td>
                                    <td>{{ $a->title }}</td>
                                    <td>{{ $a->created_at }}</td>
                                    <td >
                                        <ul class="activity">
                                            <li class="view"><a href="/dashboard/announcement/{{ $a->id }}"><button><i class="bi bi-eye"></i> View</button></a></li>
                                            <li class="edit"><a href="/dashboard/announcement/{{ $a->id }}/edit"><button><i class="bi bi-pencil-square"></i> Edit</button></a></li>
                                            <form action="/dashboard/announcement/{{ $a->id}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <li class="delete" onclick="return confirm('are you sure?')"><button><i class="bi bi-trash"></i> Delete</button></li>
                                            </form>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        
                            
                        @else
                        <tr>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td >
                                <ul class="activity">
                                    <li class="view"><a href="/UMS/dashboard/announcement/"><button><i class="bi bi-eye"></i> View</button></a></li>
                                    <li class="edit"><a href="#"><button><i class="bi bi-pencil-square"></i> Edit</button></a></li>
                                    <li class="delete"><a href="#"><button><i class="bi bi-trash"></i> Delete</button></a></li>
                                </ul>
                            </td>
                        </tr>  
                        @endif
                        
                    </tbody>
                
                </table>

                    
                <div class="mt-5">
                    {{ $announcement->links() }}
                </div>
            </div>
        </div>
    </div>

@else

<!-- content -->
<div class="content">
    <div class="announcement">
        <h2 class="title">List of announcement</h2>
       
            
        

        <div class="announcementList">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        @if (auth()->user()->role == 'admin' )
                            <th>Admin Name</th>
                        @endif
                        
                        <th>Title</th>
                        <th>Date posted</th>
                        <th>Activity</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- @dd($announcement[0]->admin) --}}
                    @if ($announcement->count())
                        @foreach ($announcement as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                @if (auth()->user()->role == 'admin' )
                                    <td>{{ $a->admin->name }}</td>
                                @endif
                                <td>{{ $a->title }}</td>
                                <td>{{ $a->created_at }}</td>
                                <td >
                                    <ul class="activity">
                                        <li class="view"><a href="/dashboard/announcement/{{ $a->id }}"><button><i class="bi bi-eye"></i> View</button></a></li>
                                        
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    
                        
                    @else
                    <tr>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                        
                        <td >
                            <ul class="activity">
                                <li class="view"><a href="/UMS/dashboard/announcement/"><button><i class="bi bi-eye"></i> View</button></a></li>
                                
                            </ul>
                        </td>
                    </tr>  
                    @endif
                    
                </tbody>
            
            </table>

                
            <div class="mt-5">
                {{ $announcement->links() }}
            </div>
        </div>
    </div>
</div>

    
@endif


    
</div>

<script>
    var success = document.querySelector('.success');
    var iconClose = document.querySelector('.success i');

    iconClose.addEventListener('click', function() {
        success.classList.add('gone');
    });
</script>


<div class="container">
    <a href="#hero" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>
 </div>

 
@endsection