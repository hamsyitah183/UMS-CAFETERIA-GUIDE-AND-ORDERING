@extends('UMS.dashboard.layouts.main')
{{-- @dd($orders) --}}
@section('dash-content')
<div class="topContent">
    <div class="title">
        <i class="ri-restaurant-line"></i>
        <span class="text">Order</span>

        
    </div>

    <div class="form">
        <form action="">
            <input type="text" name="announcement" id="" placeholder="search for customer">
            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
        </form>
    </div>

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

<!-- content -->
<div class="content">
    <div class="announcement">
        <h2 class="titles">Order</h2>

    <div class="announcementList">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Place</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    
                    <th>Activity</th>
                    
                </tr>
            </thead>

            <tbody>
                
                @foreach ($orders as $item)
                {{-- @dd($foodOption->orders->where('status', 'Pending')) --}}
                <tr>
                    <td>
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->foodOption->place_name }}
                    </td>
                    <td>
                        {{ $item->created_at }}
                    </td>
                    
                    <td>
                        RM {{ $item->total_price }}
                    </td>
                    <td>
                        {{ $item->status }}
                    </td>
                    
                    <td>
                        <ul class="activity">
                            <li class="view"><a href="/dashboard/order/{{ $item->id }}"><button><i class="bi bi-eye"></i></button></a></li>
                        </ul>
                    </td>

                </tr>
                @endforeach

                
                

                
            </tbody>
        </table>
    </div>
    </div>
</div>

@endsection