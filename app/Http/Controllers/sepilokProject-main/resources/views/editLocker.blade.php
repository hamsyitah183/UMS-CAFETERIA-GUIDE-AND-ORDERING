<x-app-layout>

<div class="editForm">
                <form method="POST">
                    @csrf
                    @method('PUT')
                            
                    <h3>Assign Locker: </h3>
                    <div class="lockerNumber">
                        <label for="lockerNumber">Locker Number:</label>
                        <input type="number" id="lockerNumber" name="lockerNumber" min="1" max="20" value="{{$locker->lockerNumber}}">
                    </div>

                    <div class="occupant">
                        <label for="occupant">Occupant:</label><br>
                        <input type="text" id="occupant" name="occupant" placeholder="Occupant" value="{{$locker->occupant}}"><br>
                    </div>

                    <div class="lockerContact">
                        <label for="lockerContact">Contact:</label><br>
                        <input type="text" id="lockerContact" name="lockerContact" placeholder="Contact" value="{{$locker->lockerContact}}"><br>
                    </div>

                    <div class="lockerStart">
                        <label for="lockerStart">Time:</label>
                        <input type="datetime-local" id="lockerStart" name="lockerStart" placeholder="Time" value="{{$locker->lockerStart}}">
                    </div>

                    <div class="lockerStatus">
                        <label for="lockerStatus">Status:</label>
                        <select name="lockerStatus" id="lockerStatus">
                            @foreach(['Occupied', 'Free'] as $lockerStatus)
                                <option value="{{ $lockerStatus }}" {{ $locker->lockerStatus === $lockerStatus ? 'selected' : '' }}>
                                    {{ ucfirst($lockerStatus) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>


                </form>             
        </div>

</x-app-layout>