@extends('UMS.dashboard.layouts.main')

@section('dash-content')

@php
    use app\models\Menu;

    $breakfasts = $category->where('category', 'Breakfast');
    $lunchs = $category->where('category', 'Lunch');
    // $drinks = Menu::latest()->where('category', 'Drink')->paginate(5);
    $drinks = $category->where('category', 'Drink');

@endphp
{{-- @dd($category->get()) --}}

@if (request()->is('dashboard/menu/list/all'))

    @php
        $items = $category;
        $icon = 'ri-sun-foggy-line';
        $name = 'Menu';
        $back = '/dashboard/menu';
    @endphp


@elseif (request()->is('dashboard/menu/list/breakfast'))
    @php
        $items = $breakfasts;
        $icon = 'ri-sun-foggy-line';
        $name = 'Breakfast';
        $back = '/dashboard/breakfast';
    @endphp

@elseif (request()->is('dashboard/menu/list/lunch'))
    @php
        $items = $lunchs;
        $icon = 'ri-sun-line';
        $name = 'Lunch';
        $back = '/dashboard/lunch';
    @endphp

@elseif (request()->is('dashboard/menu/list/drink'))
    @php
        $items = $drinks;
        $icon = 'bi bi-cup-straw';
        $name = 'Drink';
        $back = '/dashboard/drinks';
    @endphp


    
@endif


<div class="overview">
    <div class="title">
        <i class="bi bi-journals"></i>
        <span class="text">Menu</span>
        
    </div>

    <div class="date">
        <span id="date">{{ date('d M Y') }}</span>
    </div>




    <div class="button" style="margin-bottom: 20px">
        <button class="btn" style="border-radius: 10px; width: fit-length; padding: 5px"><a href="{{ $back }}" style="color:white">Back</a></button>
    </div>


   <h2 class="small__title"><i class="{{ $icon }}"></i> {{ $name }}</h2>
    
</div>

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


<!-- new breakfast item -->
<div class="add">
    
        @if($place_id == null) 
           <button class = "btn" onclick = "return alert('You cannot add menu, please create a food place first')">Addss</button>
        
    
        @else 
            <button class="btn"><a href="/dashboard/menu/create"><i class="ri-add-line"></i> Add new</a></button>
        

        @endif
</div>

<!-- content -->
<div class="content">
    <div class="announcement">
        <h2 class="titles">List of {{ $name }}</h2>

    <div class="announcementList">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Breakfast name</th>
                    <th>Price</th>
                    <th>Last added</th>
                    
                    <th>Activity</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                @php
                     
                    $imageUrl = $item->image
                        ? (Str::startsWith($item->image, ['http://', 'https://'])
                            ? $item->image
                            : asset('storage/' . $item->image))
                        : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQihCQgZa4NQhg2aMeP1hRGApIXvKoq6IH_AnLILn3xpA&s';
            
                    if ($item->image == NULL) {
                            $item->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQihCQgZa4NQhg2aMeP1hRGApIXvKoq6IH_AnLILn3xpA&s';
                        }
                @endphp
                <tr>
                    <td>
                        <img src="{{ $imageUrl }}" alt="" srcset="">
                    </td>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        RM {{ $item->price }}
                    </td>
                    <td>
                        {{ $item->updated_at->format('d M Y (h:i a)') }}
                    </td>
                    
                    <td>
                        <ul class="activity">
                            <li class="view"><a href="/dashboard/menu/{{ $item->id }}"><button><i class="bi bi-eye"></i> View</button></a></li>
                            <li class="edit"><a href="/dashboard/menu/{{ $item->id }}/edit"><button><i class="bi bi-pencil-square"></i> Edit</button></a></li>
                            <form action="/dashboard/menu/{{ $item->id }}" method="post" style="margin-top: -1px">
                                @method('delete')
                                @csrf
                                <li class="delete" onclick="return confirm('are you sure?')">
                                    <a>
                                        <button><i class="bi bi-trash"></i> 
                                            Delete
                                        </button>
                                    </a>
                                </li>
                            </form>
                        </ul>
                    </td>
                </tr>
                @endforeach

                
            </tbody>
        </table>
    </div>

    
    </div>
</div>

{{-- <div class="mt-5">
    @if (request()->is('dashboard/menu/list/all'))
        <div class="mt-5">
            {{ $category->paginate(10) }}
        </div>
    @endif
</div> --}}

@endsection