<x-app-layout>

<div class="booking">
    
<div class="booking-tourist">
                    <h3>Enter Details to Pre-Book Ticket </h3>
                    <div class="booking-form">
                        <form method="POST" action="{{route('bookTourist.bookingTouristPost')}}" >
                            @csrf
                            @method('POST')
                            <h3>Pre-Booking Tickets: </h3>
                            <label for="booking_Name">Name:</label><br>
                                <div class="touristName">
                                <input type="text" id="booking_Name" name="booking_Name" placeholder="Name" value="{{ old('booking_Name', count($booking) > 0 ? $booking[0]->booking_Name : auth()->user()->name) }}"><br>
                                <x-input-error :messages="$errors->get('booking_Name')" class="mt-2" />
                            </div>
                            <div class="touristContact">
                                <label for="booking_Contact">Contact No.:</label><br>
                                <input type="text" id="booking_Contact" name="booking_Contact" placeholder="Contact" value="{{ old('booking_Contact', count($booking) > 0 ? $booking[0]->booking_Contact : '') }}"><br>
                                <x-input-error :messages="$errors->get('booking_Contact')" class="mt-2" />
                            </div>
                            <div class="radiobutton">
                                <label for="booking_Nationality">Nationality:</label>
                                <input type="radio" id="malaysian" name="booking_Nationality" value="malaysian"  @if(old('booking_Nationality', count($booking) > 0 ? $booking[0]->booking_Nationality : '') === 'malaysian') checked @endif>
                                <label for="malaysian">Malaysian</label>
                                <input type="radio" id="non-malaysian" name="booking_Nationality" value="non-malaysian" @if(old('booking_Nationality', count($booking) > 0 ? $booking[0]->booking_Nationality : '') === 'non-malaysian') checked @endif>                                
                                <label for="non-malaysian">Non-Malaysian</label><br>
                                <x-input-error :messages="$errors->get('booking_Nationality')" class="mt-2" />
                            </div>
                            <div class="touristCountries">
                                <label for="booking_Country">Country:</label>
                                <input type="text" id="booking_Country" name="booking_Country" placeholder="Country" value="{{ old('booking_Country', count($booking) > 0 ? $booking[0]->booking_Country : '') }}"><br>
                                <x-input-error :messages="$errors->get('booking_Country')" class="mt-2" />
                            </div>
                            <div class="touristNumber">
                                <label for="booking_Adults">No. Of Adults: RM5 (Malaysian) @ RM30 (Non-Malaysia)</label>
                                <input type="number" id="booking_Adults" name="booking_Adults" min="0" max="10" value="{{old('booking_Adults')}}">
                                <x-input-error :messages="$errors->get('booking_Adults')" class="mt-2" />
                                <label for="booking_Children">No. Of Children: RM2 (Malaysian) @ RM15 (Non-Malaysia)</label>
                                <input type="number" id="booking_Children" name="booking_Children" min="0" max="10" value="{{old('booking_Children')}}">
                                <x-input-error :messages="$errors->get('booking_Children')" class="mt-2" />
                            </div>
                            <div class="tourDate">
                                <label for="booking_Date">Date Slot:</label>
                                <input type="date" id="booking_Date" name="booking_Date" onchange="checkAvailability()">
                                <span id="availabilityMessage"></span>
                                <x-input-error :messages="$errors->get('booking_Date')" class="mt-2" />
                            </div>
                            <div class="radiobutton">
                                <label for="time_slot">Time Slot :</label>
                                <input type="radio" id="10AM" name="time_slot" value="10AM" value="10AM" {{old('time_slot')==='10AM' ? 'checked' : '' }}>
                                <label for="time_slot">10AM</label>
                                <input type="radio" id="3PM" name="time_slot" value="3PM" value="3PM" {{ old('time_slot')==='3PM' ? 'checked' : '' }}>
                                <label for="time_slot">3PM</label>
                                <x-input-error :messages="$errors->get('time_slot')" class="mt-2" />
                            </div>
                            <div class="radiobutton">
                                <label for="paymentMethod">Payment Method :</label>
                                <input type="radio" id="Cash" name="paymentMethod" value="Cash" value="Cash" {{old('paymentMethod')==='Cash' ? 'checked' : '' }}>
                                <label for="paymentMethod">Cash</label>
                                <input type="radio" id="Online Transfer" name="paymentMethod" value="Online Transfer" value="Online Transfer" {{ old('paymentMethod')==='OnlineTransfer' ? 'checked' : '' }}>
                                <label for="paymentMethod">Online Transfer</label>
                                <x-input-error :messages="$errors->get('paymentMethod')" class="mt-2" />
                            </div>
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to book your tickets ?')">Submit</button>
                        </form>
                    </div>
                        <h3> Booking Submission Details</h3>
                        <ul>
                            <li>
                            <button class="open-button btn btn-success" onclick='openForm()'>View Booking</button>         

                            </li>
                        </ul>   
                        
                        <div class="payment_notice" style="background-color: #bebebe; padding: 10px; border-radius: 5px;  font-size: 15px; color: #006400">
                        <ul>
                            <li>
                                <h2>Payment can be done either through cash or online transfer.</h2>
                            </li>
                            <li>
                                <h2>Payment for online transfer, PLEASE provide payment proof that can be done in the View Booking.</h2>
                            </li>
                        </ul>
                        </div>
                    </div>

                </div>


    <div class="bookingList" id="bookingForm">

        <button class="open-button btn btn-secondary" onclick='closeForm()'><i class='bx bx-x-circle'></i> Close </button>   

            <div class="visitorBooking_list"  >
                <table>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Nationality</th>
                        <th>Country</th>
                        <th>Adults</th>
                        <th>Children</th>
                        <th>Date</th>
                        <th>Time Slot</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Invoice Prev</th>

                    </tr>
                    @foreach($allbookings as $allbookings)
                    <tr>
                        <td>{{$allbookings->booking_ID}}</td>
                        <td>{{$allbookings->booking_Name}}</td>
                        <td>{{$allbookings->booking_Contact}}</td>
                        <td>{{$allbookings->booking_Nationality}}</td>
                        <td>{{$allbookings->booking_Country}}</td>
                        <td>{{$allbookings->booking_Adults}}</td>
                        <td>{{$allbookings->booking_Children}}</td>
                        <td>{{$allbookings->booking_Date}}</td>
                        <td>{{$allbookings->time_slot}}</td>
                        <td>RM {{$allbookings->totalPrice}}</td>
                        <td>{{$allbookings->booking_Status}}</td>
                        <td>
                            @if($allbookings->paymentMethod == 'Cash')
                                Cash
                            @elseif($allbookings->paymentMethod == 'Online Transfer')
                                @if($allbookings->payment_proof)
                                    <a href="{{ url('payment.viewPayment/'.$allbookings->booking_ID) }}" target="_blank" class="btn btn-success">View Payment Proof</a>
                                @else
                                    <button class="open-button btn btn-success" onclick="openPaymentForm({{ $allbookings->booking_ID }})">Pay</button>
                                @endif
                            @endif
                        </td>
                        <td>

                            <a href="{{ url('invoice.invoicePage/'.$allbookings->booking_ID.'/generate') }}" class="btn btn-primary">Download</a>  
                            <a href="{{ url('invoice.invoicePage/'.$allbookings->booking_ID) }}" target="_blank" class="btn btn-warning">View</a>                        
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>

    <div id="paymentForm" class="popup">
    
        <form method="POST" action="{{route('sendPayment')}}" enctype="multipart/form-data" style="font-size: 15px; padding: 15px;">
            <img src="{{ asset('img/qrcode.jpg') }}" style="height:300px; width: 300px; padding-top: 10px" alt="qr">

            @csrf
            <h3 style="padding: 15px;">Upload Payment Proof</h3>
            <input type="hidden" name="booking_ID" id="bookingIdInput">
            <input type="file" id="payment_proof" name="payment_proof" required>
            <button type="submit" style="color:#FF8C00" class="btn btn-success">Submit</button>
            <button class="btn btn-secondary" onclick="closePaymentForm()">Cancel</button>

        </form>
    </div>


</div>


<script>
        function openForm() {
        document.getElementById("bookingForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("bookingForm").style.display = "none";
        }

        function openPaymentForm(bookingId) {
            document.getElementById("paymentForm").style.display = "block";
            document.getElementById("bookingIdInput").value = bookingId;
        }

        function closePaymentForm() {
            document.getElementById("paymentForm").style.display = "none";
        }

        function checkAvailability() {
    var selectedDate = document.getElementById('booking_Date').value;

    // Make an AJAX request to get availability
    axios.get('/get-availability/' + selectedDate)
         .then(function (response) {
             var availabilityMessage = document.getElementById('availabilityMessage');
             availabilityMessage.innerText = 'Availability: ' + response.data.availability + ' tickets left';
         })
         .catch(function (error) {
             console.error('Error fetching availability:', error);
         });
}

        // Get the current date
    var today = new Date();
    // Set the minimum date to today's date
    var minDate = today.getFullYear() + "-" + ("0" + (today.getMonth() + 1)).slice(-2) + "-" + ("0" + today.getDate()).slice(-2);
    // Get the date input field
    var dateInput = document.getElementById("booking_Date");
    // Set the minimum date of the input field
    dateInput.min = minDate;

    // Get the radio buttons and the country input field
    const nationalityRadios = document.querySelectorAll('input[name="booking_Nationality"]');
    const countryInput = document.getElementById('booking_Country');

    // Add an event listener to the radio buttons
    nationalityRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'malaysian') {
                countryInput.value = 'Malaysia';
            } else {
                countryInput.value = ''; // Clear the value if not Malaysian
            }
        });
    });
    
    </script>

@extends('main_footer')

</x-app-layout>