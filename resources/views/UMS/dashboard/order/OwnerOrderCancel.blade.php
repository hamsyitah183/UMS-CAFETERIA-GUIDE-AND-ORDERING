<div class="orderPending cancel">
    <h1>Cancel Order</h1>
    {{-- $foodOption->orders->where('status', 'Cancel') --}}
    
    <div class="orderPendingTable table">
        @foreach ($foodOption->orders->where('status', 'Cancel') as $item)
            <div class="item">
                <p class="date">{{ $item->updated_at }}</p>
                <h2 class="orderId">{{ $item->id }}</h2>
                
                <div class="activity" >
                    
                    <div class="accept view" style="border-radius: 10px; width: fit-length;">
                        <div class="button" ><a href="/dashboard/order/{{ $item->id }}"><p style="font-size: 15px">View order</p></a></div>
                    </div>
                </div>
            </div>
        @endforeach

        
    </div>
</div>