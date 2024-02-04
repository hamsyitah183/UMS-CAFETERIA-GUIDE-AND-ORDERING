{{-- {!! $chart->container() !!} --}}
<style>
    .boxes {
    margin-bottom: 10px;
}

.boxes2 {
    display: flex;
    gap: 10px;
}

.boxes2 .chart {
    margin-top: 50px;
    border-radius: 10px;
    height: 400px;
    width: 60%;
}

.boxes2 .orders {
    background-color: var(--box1-color);
    width: 50%;
    margin-top: 50px;
    border-radius: 10px;
    height: 400px;
    overflow-y: scroll;

}

.boxes2 .orders h2 {
    padding: 10px;
}

.orders table th:first-child, .orders table td:first-child {
  
    width: 40%;
}

.orders table td, .orders table th  {

   width: 80%;
   padding: 10px;
}

.orders table td {
    text-align: center;
}
</style>
<h1>Quick stats</h1>

                <div class="boxes">
                    <div class="box box1">
                        <i class="bi bi-houses"></i>
                        <span class="text">Food option</span>
                        <span class="number">{{ $foodOption->count() }}</span>
                    </div>

                    <div class="box box2">
                        <i class="bi bi-megaphone"></i>                        
                        <span class="text">Announcement</span>
                        <span class="number">{{ $announcements->count() }}</span>
                    </div>

                    <div class="box box3">
                        <i class="bi bi-people-fill"></i>
                        <span class="text">Accounts</span>
                        <span class="number">{{ $user->count() }}</span>

                    </div>

                    <!-- <div class="box box4">
                        <i class="ri-thumb-up-line"></i>
                        <span class="text">Total Likes</span>
                        <span class="number">50,120</span>
                    </div> -->

                </div>

                <div class="boxes2">
                    <div class="box orders">
                        <h2>Latest order</h2>

                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Place</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <div class="customer">
                                                <div class="name">
                                                    <p>{{ $item->user->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="customer">
                                                <div class="name">
                                                    <p>{{ $item->foodOption->place_name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
            
                                    
                                 @endforeach
                               
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="chart">
                        {!! $chart->container() !!}
                    </div>
                </div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}