<div class="orderPending cancel">
    <h1>Cancel Order</h1>
    {{-- $foodOption->orders->where('status', 'Cancel') --}}
    
    <div class="orderPendingTable table">
        @foreach ($foodOption->orders->where('status', 'Cancel') as $item)
            <div class="item">
                <p class="date">{{ $item->updated_at }}</p>
                <h2 class="orderId">{{ $item->id }}</h2>
                

            </div>
        @endforeach

        
    </div>
</div>