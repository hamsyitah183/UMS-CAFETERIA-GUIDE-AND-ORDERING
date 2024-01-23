<div class="orderPending cancelOrder">
    <h1>Complete Order</h1>
    
    
    <div class="orderPendingTable table">
        @foreach ($foodOption->orders->where('status', 'Completed') as $item)
        <div class="item">
            <p class="date">{{ $item->updated_at->format('H:i A') }}</p>
            <h2 class="orderId">Order ID: {{ $item->id }}</h2>
           
                <div class="activity">
                    
                    <div class="accept view">
                        <div class="button"><a href="/dashboard/order/{{ $item->id }}">View order</a></div>
                    </div>
                </div>
            

        </div>
        @endforeach

        
    </div>
</div>