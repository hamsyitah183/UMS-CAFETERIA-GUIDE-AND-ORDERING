@php
    $item = $order->id;
@endphp

<script>
    window.onload = function () {
        var whatsappUrl = "{{ $whatsappUrl }}";

        // Create a form dynamically
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "/dashboard/order/processed/{{ $item }}");
        form.setAttribute("target", "_blank");

        // CSRF token
        var csrfToken = document.createElement("input");
        csrfToken.setAttribute("type", "hidden");
        csrfToken.setAttribute("name", "_token");
        csrfToken.setAttribute("value", "{{ csrf_token() }}");
        form.appendChild(csrfToken);

        // Your other form fields...

        // Submit the form
        document.body.appendChild(form);
        form.submit();
    };
</script>