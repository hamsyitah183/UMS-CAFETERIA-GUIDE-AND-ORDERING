@php
    $counter = 1;
@endphp

<x-app-layout>

    <section class="staffbooking">

    <div class="search_bar">


         <form action="/search" method="POST">
            <div class="searchInput">
                @csrf
                <input type="search" id="search" name="search" placeholder="Search" class="form-control" style="font-size: 16px;">

                <button type="submit"  class="open-button btn btn-success" value = "null" placeholder="Search" >Search</button>         

            </div>
            </form>

        </div>

        <div class="staffbooking_table">

            <div class="staffbooking_list" >
                <table>
                    <tr>
                        <th>Booking ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Identification Number</th>
                        <th>Nationality</th>
                        <th>Country</th>
                        <th>Adults</th>
                        <th>Children</th>
                        <th>Date</th>
                        <th>Time Slot</th>
                        <th>Status</th>
                        <th>Edit</th>

                    </tr>

                    @foreach($booking as $booking)
                    <tr>
                        <td>{{$booking->booking_ID}}</td>
                        <td>{{$booking->booking_Name}}</td>
                        <td>{{$booking->booking_Contact}}</td>
                        <td>{{$booking->booking_IC}}</td>
                        <td>{{$booking->booking_Nationality}}</td>
                        <td>{{$booking->booking_Country}}</td>
                        <td>{{$booking->booking_Adults}}</td>
                        <td>{{$booking->booking_Children}}</td>
                        <td>{{$booking->booking_Date}}</td>
                        <td>{{$booking->time_slot}}</td>
                        <td>{{$booking->booking_Status}}</td>
                        <td>

                            <a href="{{ route('edit', ['booking' => $booking->booking_ID]) }}" class="btn btn-secondary">Edit</a>                            
                            <form action="/delete/{{$booking->booking_ID}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach


                </table>

            </div>

    </section>

    <script>

      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {    
                window.location.href = urlToRedirect;
               
            }  

        });    
    }

</script>

</x-app-layout>