@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="overview">
    <!-- search box and title -->
    <div class="topContent">
        <div class="icon">
            <button class="back">
                <a href="/dashboard/announcement">
                    <i class="bi bi-arrow-90deg-left"></i>
                    <span class="word">Return to list</span>
                </a>
            </button>
        </div>

    </div>

    <!-- content -->
    <div class="content">
        <div class="post">
            

            <div class="postContent">
                <h1 class="title">{{ $announcement->title }}</h1>
            
                @if ($announcement->image)
                    @if (Str::startsWith($announcement->image, ['http://', 'https://']))
                        <!-- External image from the internet -->
                        <img src="{{ $announcement->image }}" alt="" class="image">
                    @else
                        <!-- Image from Laravel public storage -->
                        <img src="{{ asset('storage/' . $announcement->image) }}" alt="" class="image">
                    @endif
                @else
                    <!-- Display a placeholder or default image when no image is available -->
                    <img src="{{ asset('path/to/placeholder-image.jpg') }}" alt="" class="image">
                @endif
            
                <div class="text__box">
                    <table>
                        <tr>
                            <td>
                                <p>Created By: </p>
                            </td>
                            <td>
                                <p class="admin">{{ $announcement->admin->name }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Posted On: </p>
                            </td>
                            <td>
                                <p class="date">{{ $announcement->created_at }} </p>
                            </td>
                        </tr>

                    </table>
                </div>

                <div class="body">

                    <div class="time">
                        <h3><span class="start">{{ $announcement->start }}</span> until <span class="end">{{ $announcement->end }}</span></h3>
                    </div>
                    
                    <p>
                        {{ $announcement->body }}
                    </p>

                   

                    @if (auth()->user()->role == 'admin')
                        <div class="buttons">
                            <ul class="activity">
                                <li class="edit"><a href="/dashboard/announcement/announcementEdit.html"><button><i class="bi bi-pencil-square"></i> Edit</button></a></li>
                                <form action="/dashboard/announcement/{{ $announcement->id}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <li class="delete" onclick="return confirm('are you sure?')"><button><i class="bi bi-trash"></i> Delete</button></li>
                                </form>
                            </ul>
                        </div>
                    @endif
                </div>

                
            </div>
        </div>
    </div>
    <div class="container">
        <a href="#hero" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>
     </div>
</div>
@endsection