<x-app-layout>

<section class="dashboard">

    <div class="dashboard_chart">
        <canvas id="doughnutChart">
            <!-- Doughnut Chart of the total number of visitors based on their country-->
        </canvas>

        <script>
            var ctx = document.getElementById('doughnutChart').getContext('2d');
            var visitorChart = new Chart(ctx, {
                type: 'doughnut', // bar, pie, line, doughnut, radar
                data:{
                    labels: {!! json_encode($tags) !!},
                    datasets: {!! json_encode($numberofCountry) !!}
                },
            });

            
        </script>
    </div>
    
    
</section>
</x-app-layout>