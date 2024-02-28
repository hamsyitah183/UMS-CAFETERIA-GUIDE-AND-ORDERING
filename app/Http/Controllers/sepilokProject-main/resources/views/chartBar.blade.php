<x-app-layout>

<section class="dashboard">
    <div class="dashboard_chart">
        <canvas id="barChart">
            <!-- Bar Chart of the total number of booking visitors  -->
        </canvas>

        <script>
            var ctx = document.getElementById('barChart').getContext('2d');
            var visitorChart = new Chart(ctx, {
                type: 'bar', // bar, pie, line, doughnut, radar
                data:{
                    labels: {!! json_encode($labels) !!},
                    datasets: {!! json_encode($datasets) !!}
                },
            });

            
        </script>

    </div>
    
</section>
</x-app-layout>
