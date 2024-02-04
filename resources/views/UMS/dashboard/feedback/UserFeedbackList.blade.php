@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="topContent">
    <div class="title">
        <i class="ri-question-answer-line"></i>
        <span class="text">Feedback</span>

        
    </div>

    <div class="form">
        <form action="">
            <input type="text" name="announcement" id="" placeholder="search for feedback">
            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
        </form>
    </div>

</div>

    @if(auth()->user()->role != 'admin') 
        <div class="add">
            <button class="btn"><a href="/dashboard/feedback/create"><i class="ri-add-line"></i> Add new</a></button>
        </div>
    @endif()

    {{-- @dd(auth()->user()->role) --}}
<!-- content -->
<div class="content">
    <div class="announcement">
        <h2 class="titles">List of feedback</h2>

    <div class="announcementList">
        @if($feedbacks->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Feedback</th>
                    <th>Activity</th>
                    <th>Reply</th>
                </tr>
            </thead>
{{-- @dd($feedbacks) --}}
            @foreach ($feedbacks as $feedback)
            <tbody>
                <tr>
                    <td>
                        {{ $loop->index + 1 }}
                    </td>

                    <td>
                        {{ $feedback->user->username }}
                    </td>

                    <td>
                        {{ Str::limit($feedback->message, 20) }}..
                    </td>
                    
                    <td>
                        <ul class="activity">
                            <li class="view"><a href="/dashboard/feedback/{{ $feedback->id }}"><button><i class="bi bi-eye"></i>View</button></a></li>
                                <!-- <li class="edit"><a href="#"><button><i class="bi bi-pencil-square"></i></button></a></li> -->
                            @if (auth()->user()->role != 'admin')
                                <li class="delete"><a href="#"><button><i class="bi bi-trash"></i>Delete</button></a></li>
                            @endif
                        </ul>
                    </td>

                    <td>
                        {{ $feedback->reply->count() }} replies
                    </td>
                </tr>
                
            </tbody>
            @endforeach
        </table>

      
            
        @else
 
        @if (auth()->user()->role != 'admin')
            <p class="notice">Please add your feedback</p>
        @else
            <p class="notice">No feedback yet</p>
        @endif

        @endif
    </div>
    </div>
</div>
@endsection