@extends('UMS.dashboard.layouts.main')

@section('dash-content')

<style>
    .img-preview {
        width: 200px;
        height: 300px;
        object-fit: cover;
    }

    .activity  {
        display: flex;
        place-content: end;
        margin-right: 50px;
    }

    .activity .button button {
        border-radius: 10px;
        width: fit-content;
        padding: 10px;
       
    }

    .activity .button button a {
        color: white;
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
            <i class="ri-article-line"></i>                   
            <span class="text">Post</span>

            
        </div>

        

        <div class="form">
            @csrf
            <form action="/dashboard/announcement" method="GET">
                <input type="text" name="announcement" id="" placeholder="search for announcement" value="{{ request('announcement') }}">
                <button type="submit" class="btn"><i class="bi bi-search"></i></button>
            </form>
        </div>

    </div>

    
<!-- content -->
@if (Auth::user()->role == 'owner')
<div class="activity">
    <div class="button">
        <button><a href="/dashboard/post/create">Add new post</a></button>
    </div>
</div>
@endif

<div class="content">
    <div class="announcement">
        <h2 class="title">List of Post</h2>
       
        
        

        <div class="announcementList">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Place</th>
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
                                <td>{{ $a->foodOption->place_name }}</td>
                                <td>{{ $a->title }}</td>
                                <td>{{ $a->created_at }}</td>
                                <td >
                                    <ul class="activity">
                                        <li class="view"><a href="/dashboard/post/{{ $a->id }}"><button><i class="bi bi-eye"></i> View</button></a></li>
                                        @if (auth()->user()->role == 'owner')
                                            <li class="edit"><a href="/dashboard/post/{{ $a->id }}/edit"><button><i class="bi bi-pencil-square"></i> Edit</button></a></li>
                                            <form action="/dashboard/post/{{ $a->id}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <li class="delete" onclick="return confirm('are you sure?')"><button><i class="bi bi-trash"></i> Delete</button></li>
                                            </form>
                                        @endif
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

                
            {{-- <div class="mt-5">
                {{ $announcement->links() }}
            </div> --}}
        </div>
    </div>
</div>

    
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