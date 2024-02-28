@php
    $counter = 1;
@endphp

<x-app-layout>

<section class="lockerForm">
        <div class="tableLocker">
                    <h2>Locker Management</h2>
                    <ul>
                        <li>
                        <button class="open-button btn btn-secondary" onclick='openForm()'>Locker Assign : </button>                        
                        </li>
                    </ul>                
                    <table class = "lockerTable">
                        <tr>
                            <th>Locker Number</th>
                            <th>Occupant</th>
                            <th>Contact</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                            @foreach($locker as $locker)
                                <tr>
                                    <td>{{$locker->lockerNumber}}</td>
                                    <td>{{$locker->occupant}}</td>
                                    <td>{{$locker->lockerContact}}</td>
                                    <td>{{$locker->lockerStart}}</td>
                                    <td>{{$locker->lockerStatus}}</td>
                                    <td>
                                        <a href="{{ route('editLocker', ['locker' => $locker->lockerID]) }}" class="btn btn-secondary">Edit</a>                            
                                        <form action="/deleteLocker/{{$locker->lockerID}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
            </div>

        <div class="locker_Form inv-form" id="formLocker">
                <form method="POST" action="{{route('locker.lockerPost')}}">
                    @csrf
                    @method('POST')
                            
                    <h3>Assign Locker: </h3>
                    <div class="lockerNumber">
                        <label for="lockerNumber">Locker Number:</label>
                        <input type="number" id="lockerNumber" name="lockerNumber" min="1" max="20" value="{{old('lockerNumber')}}">
                        <x-input-error :messages="$errors->get('lockerNumber')" class="mt-2" />
                    </div>

                    <div class="occupant">
                        <label for="occupant">Occupant:</label><br>
                        <input type="text" id="occupant" name="occupant" placeholder="Occupant" value="{{ old('occupant') }}"><br>
                        <x-input-error :messages="$errors->get('occupant')" class="mt-2" />
                    </div>

                    <div class="lockerContact">
                        <label for="lockerContact">Contact:</label><br>
                        <input type="text" id="lockerContact" name="lockerContact" placeholder="Contact" value="{{ old('lockerContact') }}"><br>
                        <x-input-error :messages="$errors->get('lockerContact')" class="mt-2" />
                    </div>

                    <div class="lockerStart">
                        <label for="lockerStart">Time:</label>
                        <input type="datetime-local" id="lockerStart" name="lockerStart" placeholder="Time" value="{{ old('lockerStart') }}">
                        <x-input-error :messages="$errors->get('lockerStart')" class="mt-2" />
                    </div>

                    <div class="lockerStatus">
                        <label for="lockerStatus">Status:</label>
                        <select name="lockerStatus" id="lockerStatus">
                            <option value="Occupied">Occupied</option>
                            <option value="Free">Free</option>
                        </select>
                        <x-input-error :messages="$errors->get('lockerStatus')" class="mt-2" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="action" value="assign">Assign</button>
                    <button type="submit" class="btn btn-primary" name="action" value="free">Free Locker</button>
                    <button type="button" class="btn btn-warning" onclick='closeForm()'>Cancel</button>


                </form>             
        </div>

        

</section>


    <script>
        function openForm() {
        document.getElementById("formLocker").style.display = "block";
        }

        function closeForm() {
        document.getElementById("formLocker").style.display = "none";
        }
    </script>

</x-app-layout>