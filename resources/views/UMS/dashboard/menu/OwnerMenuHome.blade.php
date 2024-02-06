


<div class="overview">
    
    @php
        $breakfasts = $all->where('category', 'Breakfast');
        $lunchs = $all->where('category', 'Lunch');
        $drinks = $all->where('category', 'Drink');

    @endphp
    
    <div class="boxes" id="breakfast">
        <div class="box box1">
            <i class="ri-sun-foggy-line"></i>
            <span class="text"><a href="/dashboard/breakfast">Breakfast</a></span>
            <span class="number">{{ $breakfasts->count() }} Items</span>
        </div>

        <div class="box box2" id="lunch" >
            <i class="ri-sun-line"></i>
            <span class="text"><a href="/dashboard/lunch">Lunch</a></span>
            <span class="number">{{ $lunchs->count() }} Items</span>
        </div>

        <div class="box box3" id="drink">
            <i class="bi bi-cup-straw"></i>                        
            <span class="text"><a href="/dashboard/drinks">Drinks</a></span>
            <span class="number">{{ $drinks->count() }} Items</span>
        </div>

        <!-- <div class="box box4">
            <i class="ri-thumb-up-line"></i>
            <span class="text">Total Likes</span>
            <span class="number">50,120</span>
        </div> -->

    </div>

    <script>
        function goToLink(url) {
            // Redirect to the desired URL
            window.location.href = url;
        }

        
    </script>
</div>