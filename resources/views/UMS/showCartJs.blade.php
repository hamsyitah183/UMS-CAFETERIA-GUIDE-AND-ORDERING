<script>
    var delivery_time = document.getElementById('delivery_time');

    var time = document.getElementById('time');

    time.addEventListener('change', function () {

        // Get the selected value
        var selectedValue = time.value;

        delivery_time.value = selectedValue;

    });
</script>