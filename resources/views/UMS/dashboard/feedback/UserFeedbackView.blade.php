@extends('UMS.dashboard.layouts.main')

@section('dash-content')

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
<div class="content flex">
    <div class="box1">
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

    
</div>

@endsection