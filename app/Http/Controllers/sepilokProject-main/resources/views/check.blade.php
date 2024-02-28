
<x-app-layout>

<section class="checkForm">
        <div class="check-form">
                <form method="POST" action="{{route('check.checkPost')}}">
                    @csrf
                    @method('POST')
                            
                    <h3>Check In Staff: </h3>
                    <div class="checkIn">
                        <label for="checkIn">Check In:</label>
                        <input type="time" id="checkIn" name="checkIn" value="{{ old('checkIn') }}">
                        <x-input-error :messages="$errors->get('checkIn')" class="mt-2" />
                    </div>
                    <div class="checkOut">
                        <label for="checkOut">Check Out:</label>
                        <input type="time" id="checkOut" name="checkOut" value="{{ old('checkOut') }}">
                        <x-input-error :messages="$errors->get('checkOut')" class="mt-2" />
                    </div>
                    <div class="checkDate">
                        <label for="checkDate">Check In Date:</label>
                        <input type="date" id="checkDate" name="checkDate" value="{{ old('checkDate') }}">
                        <x-input-error :messages="$errors->get('checkDate')" class="mt-2" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-warning" onclick="history.back()">Cancel</button>


                </form>
                            
        </div>
</section>

</x-app-layout>