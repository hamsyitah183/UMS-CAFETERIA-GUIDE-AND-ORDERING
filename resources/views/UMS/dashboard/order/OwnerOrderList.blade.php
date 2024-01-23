@extends('UMS.dashboard.layouts.main')

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
        <h2 class="titles">Pending order</h2>

    <div class="announcementList">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Customer name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    
                    <th>Activity</th>
                    <th>Accept</th>
                </tr>
            </thead>

            <tbody>
                
                @foreach ($foodOption->orders->where('status', 'Pending') as $item)
                {{-- @dd($foodOption->orders->where('status', 'Pending')) --}}
                <tr>
                    <td>
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->created_at }}
                    </td>
                    <td>
                        {{ $item->user->name }}
                    </td>
                    <td>
                        RM {{ $item->total_price }}
                    </td>
                    <td>
                        {{ $item->status }}
                    </td>
                    
                    <td>
                        <ul class="activity">
                            <li class="view"><a href="/dashboard/customer/customerView.html"><button><i class="bi bi-eye"></i></button></a></li>
                        </ul>
                    </td>

                    <td>
                        <form action="/dashboard/order/status/{{ $item->id }}" method="post">
                            {{-- @method('put') --}}
                            @csrf
                            <div class="activity">
                                <div class="accept yes" onclick="submitForm('acceptRadio{{ $item->id }}')">
                                    <input type="radio" name="accept" id="acceptRadio{{ $item->id }}" value="Processed">
                                    <div class="button" onclick="return confirm('Accept the order?')"><i class="ri-check-line"></i></div>
                                </div>
                                <div class="accept no" onclick="submitForm('notAcceptRadio{{ $item->id }}')">
                                    <input type="radio" name="accept" id="notAcceptRadio{{ $item->id }}" value="Cancel">
                                    <div class="button" onclick="return confirm('Reject the order?')"><i class="ri-close-line"></i></div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach

                
                

                
            </tbody>
        </table>
    </div>
    </div>
</div>
<script>
    function submitForm(radioButtonId) {
        // Get the radio button by ID
        var radioButton = document.getElementById(radioButtonId);

        // Check the radio button
        radioButton.checked = true;

        // Get the form associated with the clicked button
        var form = radioButton.closest('form');

        // Submit the form
        form.submit();
    }
</script>
@endsection