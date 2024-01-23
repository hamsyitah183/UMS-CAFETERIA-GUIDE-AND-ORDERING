@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="topContent">
    <div class="title">
        <i class="ri-restaurant-line"></i>
        <span class="text">Order</span>

        
    </div>

    
</div>

{{-- @dd($foodOption->orders->where('status', 'Cancel')) --}}
<div class="middle">
    <div class="orderPending">
        <h1>Pending Order</h1>
        <p>18 Jan 2024</p>
        
        @include('UMS.dashboard.order.OwnerOrderPending')

    </div>

    @include('UMS.dashboard.order.OwnerOrderProcessed')

</div>

<div class="bottom">
    @include('UMS.dashboard.order.OwnerOrderComplete')

</div>

<div class="after">
    @include('UMS.dashboard.order.OwnerOrderCancel')

</div>
<script>
   function submitForm(radioButtonId, confirmationMessage) {
    // Show the confirmation dialog
    var isConfirmed = confirm(confirmationMessage);

    // If confirmed, proceed with form submission
    if (isConfirmed) {
        var radioButton = document.getElementById(radioButtonId);
        radioButton.checked = true;
        var form = radioButton.closest('form');
        form.submit();
    }
}


    // var accept = document.getElementById('acceptButton');
    // var acceptRadio = document.getElementById('acceptRadio');

    // var notAccept = document.getElementById('notAcceptButton');
    // var notAcceptRadio = document.getElementById('notAcceptRadio');

    // accept.addEventListener('click', function() {
    //     submitForm('acceptRadio');
    // });

    // notAccept.addEventListener('click', function() {
    //     submitForm('notAcceptRadio');
    // });

    function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.toggle('active');
    }
}
</script>

@endsection