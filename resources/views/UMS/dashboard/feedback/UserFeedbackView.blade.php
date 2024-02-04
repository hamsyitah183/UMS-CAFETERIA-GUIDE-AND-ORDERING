@extends('UMS.dashboard.layouts.main')

@section('dash-content')

<style>
    .flex {
        flex-direction: column;
    }

    textarea {
        border:none;
        padding-left: 10px;
        font-size: 16px;
       padding-top: 10px;
       resize: none;
    }

    .box2 {
        background: #FF6347;
        color: white;
        margin-right: 50px;
    }

    .box2.notAdmin{
        margin-left: 50px;
    }

    .box2 .from {
        color: white;
    }

    .reply .button {
        display: flex;
        place-content: end;
    }

    .reply button {
        border-radius: 10px;
        width: fit-content;
        color: white;
        padding: 10px
    }
</style>

<!-- search box and title -->
<div class="topContent">
    <div class="icon">
        <button class="back">
            <a href="/dashboard/feedback">
                <i class="bi bi-arrow-90deg-left"></i>
                <span class="word">Return to list</span>
            </a>
        </button>
    </div>

</div>

<!-- content -->
<div class="content flex" >
    <div class="box1" style="margin-bottom: 10px;">
        <h1><i class="bi bi-sticky"></i> {{ $feedback->title }}<span class="feedback_id"></span></h1>
        <div class="from">
            <p class="name"><span class="label">Name </span>: {{ $feedback->user->username }}</p>
            <p class="feedback_id"><span class="label">Feedback id </span>: {{ $feedback->id }}</p>
            <p class="date"><span class="label">Date </span>: {{ $feedback->created_at }}</p>
            
        </div>

        <div class="body">
            <p>
                {{ $feedback->message }}
            </p>
        </div>

    </div>

    

    {{-- reply --}}

    @if ($feedback->reply)
        @foreach ($feedback->reply as $item)
        <div class="{{ auth()->user()->role === 'admin' ? 'box1 box2' : 'box1 box2 notAdmin' }}" style="margin-bottom: 10px;">
           
            <div class="from">
               
                <p class="name"><span class="label">Name </span>: {{ $item->user->username }}</p>
                <p class="date"><span class="label">Date </span>: {{ $item->created_at }}</p>
                
            </div>

            <div class="body">
                <p>
                    {{ $item->message }}
                </p>
            </div>

        </div>
        @endforeach
    @endif

    @if (auth()->user()->role == 'admin')
        <div class="box1 reply">
            <form action="/dashboard/reply/{{ $feedback->id }}" method="post">
                @csrf
                <textarea name="message" id="" cols="90" rows="10" placeholder="Reply...."></textarea>
           

            <div class="button">
                <button type="submit" class="btn">Reply</button>
            </div>
            </form>
        </div>
    @endif
    
</div>


    

@endsection