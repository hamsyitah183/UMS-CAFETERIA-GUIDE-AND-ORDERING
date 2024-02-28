<x-app-layout>

<div class="editForm">
                <form method="POST">
                    @csrf
                    @method('PUT')
                            
                    <h3>Check In Staff: </h3>

                    <div class="checkIn">
                        <label for="checkIn">Check In:</label>
                        <input type="time" id="checkIn" name="checkIn" value="{{ $check->checkIn }}">
                    </div>

                    <div class="checkOut">
                        <label for="checkOut">Check Out:</label>
                        <input type="time" id="checkOut" name="checkOut" value="{{ $check->checkOut }}">
                    </div>

                    <div class="checkDate">
                        <label for="checkDate">Check In Date:</label>
                        <input type="date" id="checkDate" name="checkDate" value="{{ $check->checkDate }}">                    
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>

                </form>   
        </div>

</x-app-layout>