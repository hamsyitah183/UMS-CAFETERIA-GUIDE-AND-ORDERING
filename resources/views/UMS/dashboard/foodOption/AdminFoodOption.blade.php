@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="topContent">
    <div class="title">
        <i class="ri-restaurant-2-line"></i>                  
        <span class="text">Food Option</span>

        
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
        <h2 class="titles">List of food option</h2>

    <div class="announcementList">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th >Owner</th>
                    <th>Date Joined</th>
                    <th>Activity</th>
                </tr>
            </thead>

            <tbody>
                
                {{-- @dd($customers) --}}
                @if($customers->count() > 0) 
                @foreach ($customers as $customer)
                    
                        <tr>
                            <td>
                                {{ $customer->id  }}
                            </td>
                            <td>
                                {{ $customer->place_name }}
                            </td>
                            <td>
                                @php
                                    if($customer->type == 1) {
                                        $type = 'Cafeteria';
                                    }

                                    elseif($customer->type == 2) {
                                        $type = 'Kiosk';
                                    }

                                    elseif($customer->type == 3) {
                                        $type = 'Vendor';
                                    }

                                    
                                @endphp
                                {{ $type }}
                            </td>
                            <td>
                                <div style="width:100px; word-wrap: break-word;">
                                    {{ $customer->owner->username }}
                                </div>
                            </td>
                            
                            <td>
                                {{ $customer->created_at }}
                            </td>
                            <td>
                                <ul class="activity">
                                    <li class="view"><a href="/dashboard/foodOption/{{ $customer->id }}"><button><i class="bi bi-eye"></i></button></a></li>
                                    
                                </ul>
                            </td>
                        </tr>
                    
                @endforeach
                
                

               
                
                    
                @else
                    
                @endif
            </tbody>

           
        </table>

        
    </div>
    
    </div>

    <div class="mt-5">
        {{-- {{ $customers->links() }} --}}
    </div>
</div>

@endsection