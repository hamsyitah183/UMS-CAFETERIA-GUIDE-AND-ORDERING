<div class="newStaff">
            <form method="POST">
            @csrf
                @method('PUT')
                <h3>Staff Information</h3>
                <div class="nameStaff">
                    <div class="staffName">
                    <label for="staffName">Name:</label>
                    <input type="text" id="staffName" name="staffName" placeholder="Name" value="{{$staff->staffName}}"><br>
                    </div>
                </div>

                <div class="dobStaff">
                    <label for="staffDOB">Date of Birth:</label>
                    <input type="date" id="staffDOB" name="staffDOB" value="{{$staff->staffDOB}}">

                </div>

                <div class="genderStaff">
                    <label for="staffGender">Gender:</label>
                    <!-- Display radio buttons with a checked attribute if the condition is met -->
                    <input type="radio" id="female" name="staffGender" value="female" @if($staff->staffGender === 'female') checked @endif>
                    <label for="female">Female</label>
                    
                    <input type="radio" id="male" name="staffGender" value="male" @if($staff->staffGender === 'male') checked @endif>                                
                    <label for="male">Male</label><br>
                    <x-input-error :messages="$errors->get('staffGender')" class="mt-2" />
                
                </div>

                <div class="raceStaff">
                    <label for="staffRace">Race:</label><br>
                    <input type="text" id="staffRace" name="staffRace" placeholder="Race" value="{{$staff->staffRace}}"><br>
                    <x-input-error :messages="$errors->get('staffRace')" class="mt-2" />
                
                </div>

                <div class="contactStaff">
                    <label for="staffContact">Country:</label>
                    <input type="text" id="staffContact" name="staffContact" placeholder="Contact" value="{{$staff->staffContact}}"><br>
                    <x-input-error :messages="$errors->get('staffContact')" class="mt-2" />
                
                </div>

                <div class="addressStaff">
                    <label for="staffAddress">Address:</label>
                    <input type="text" id="staffAddress" name="staffAddress" placeholder="Address" value="{{$staff->staffAddress}}"><br>
                    <x-input-error :messages="$errors->get('staffAddress')" class="mt-2" />
                
                </div>

                <div class="positionStaff">
                    <label for="staffPosition">Position:</label>
                    <input type="text" id="staffPosition" name="staffPosition" placeholder="Position" value="{{$staff->staffPosition}}"><br>
                    <x-input-error :messages="$errors->get('staffPosition')" class="mt-2" />
                </div>

                <div class="hireStaff">
                    <label for="staffHireDate">Hire Date:</label>
                    <input type="date" id="staffHireDate" name="staffHireDate" value="{{$staff->staffHireDate}}">
                    <x-input-error :messages="$errors->get('staffHireDate')" class="mt-2" />
                </div>
                    <!-- Include a hidden input for userId -->
                    <input type="hidden" name="userID" value="{{ request('userID') }}">
                
                    <button>Save Changes</button>

                </form>

</div>