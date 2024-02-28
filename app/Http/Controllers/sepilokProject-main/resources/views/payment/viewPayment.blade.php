
<section class="annStaffview">

<div class="popup">

    <div class="annStaff">

    @if($booking->payment_proof)
        <img src="{{ asset($booking->payment_proof) }}" alt="Payment Proof" >
    @endif 
    </div>
    
</section>