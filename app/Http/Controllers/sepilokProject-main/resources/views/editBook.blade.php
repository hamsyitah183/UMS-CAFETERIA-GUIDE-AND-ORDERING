
<x-app-layout>

        <div class="editForm">
            <form method="POST">
                @csrf
                @method('PUT')
                
                <h3>Visitor's Booking Details: </h3>
                
                <div class="touristStatus">
                    <label for="booking_Status">Status:</label>
                    <select name="booking_Status" id="booking_Status">
                        <option value="unconfirmed" {{$booking->booking_Status == 'unconfirmed' ? 'selected' : ''}}>UNCONFIRMED</option>
                        <option value="unconfirmed" {{$booking->booking_Status == 'pending' ? 'selected' : ''}}>PENDING</option>
                        <option value="confirmed" {{$booking->booking_Status == 'confirmed' ? 'selected' : ''}}>CONFIRMED</option>
                    </select>
                </div>
                <div class="touristPaymentProof">

                    @if($booking->payment_proof)
                        <img src="{{ asset($booking->payment_proof) }}"style="height:300px; width: 300px; padding: 10px; justify-content:center; text-align: center;" alt="Payment Proof" >
                    @endif 
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-warning" onclick="history.back()">Cancel</button> 

            </form>
        </div>
</x-app-layout>

