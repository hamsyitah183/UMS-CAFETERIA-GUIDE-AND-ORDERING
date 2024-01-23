<div class="content3">
    <h1>My Order</h1>

    {{-- <form action="" method="GET">

        <div class="buttons">
            <div class="buttonFilter">
                <p class="filterLabel">Filter by Date</p>
                <input type="date" name="date" id="" value="{{ date('Y-m-d') }}">
            </div>

            <div class="buttonFilter">
                <p class="filterLabel">Filter by Status</p>
                <select name="status" id="">
                    <option value="">Select status</option>
                    <option value="Pending">Pending</option>
                    <option value="Processed">Processed</option>
                    <option value="Cancel">Cancel</option>
                    <option value="Completed">Completed</option>

                </select>
            </div>

            <button type="submit" class="btn">Submit</button>
        </div>

       
    </form> --}}

    
    <div class="orderContainer">
        <div class="orders">
            @foreach ($customer->order as $order)
                <div class="item">
                    <div class="left">
                        <p class="orderName">Id: {{ $order->id }}</p>
                        <p class="date">{{ $order->created_at->format('j M Y, g:i A') }}</p>
                    </div>

                    <div class="middle">
                        <p class="totalPrice">RM {{ $order->total_price }}</p>
                        <p class="location">{{ $order->foodOption->place_name }}, {{ $order->foodOption->addressLine1 }}</p>
                    </div>

                    <div class="right">
                        <div class="status">
                            Pending
                        </div>
                    </div>
                </div>
            @endforeach

           
        </div>
    </div>
</div>