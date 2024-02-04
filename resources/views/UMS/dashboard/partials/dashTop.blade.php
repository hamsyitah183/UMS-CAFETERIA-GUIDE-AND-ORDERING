<style>
    .profile {
        display: flex;
        place-items: center;
        gap: 20px;
    }
    .profile .icon, .profile p a {
        font-size: 14px;
        color: var(--primary-color);
        
    }

    .icon a {
        color: var(--primary-color);
    }
</style>

<div class="top">
    <i class="ri-bar-chart-horizontal-line sidebar-toggle"></i>

    

    
        {{-- <div class="profile">
            <p class="icon"><a href="/dashboard/profile/{{ auth()->user()->id }}">Edit profile</a></p>
            <img src="https://images.pexels.com/photos/2071882/pexels-photo-2071882.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
        </div> --}}
        
        @php
            $item = auth()->user();
            $imageUrl = $item->image
            ? (Str::startsWith($item->image, ['http://', 'https://'])
                ? $item->image
                : asset('storage/' . $item->image))
            // : asset('path/to/placeholder-image.jpg');
                : 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Unknown_person.jpg/434px-Unknown_person.jpg'
        @endphp

        <div class="profile">
            <p><a href="/dashboard/profile">User profile</a></p>
        
            <img src="{{ $imageUrl }}" alt="" srcset="">
        </div>

       
        
</div>