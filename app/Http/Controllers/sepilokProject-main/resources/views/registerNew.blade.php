
<x-app-layout>

    <section class="register">
        <div class="register-staff">

            <h2>SEPILOK ORANGUTAN REHABILITATION CENTER</h2>

            <div class="newStaff">
            <form method="POST" action="{{route('registerNew.registerPost')}}">
            @csrf
                @method('POST')
                <h3>Register New Staff Information</h3>
                <div class="nameStaff">
                <div class="staffName">
                    <label for="staffName">Message:</label>
                    <input type="text" id="staffName" name="staffName" placeholder="Name" value="{{old('staffName')}}"><br>
                </div>
                <div class="dobStaff">
                    <label for="staffDOB">Date of Birth:</label>
                    <input type="date" id="staffDOB" name="staffDOB" value="{{old('staffDOB')}}">
                    <x-input-error :messages="$errors->get('staffDOB')" class="mt-2" />
                    </div>
                <div class="genderStaff">
                    <label for="staffGender">Gender:</label>
                    <input type="radio" id="female" name="staffGender" value="female" {{old('staffGender')==='female' ? 'checked' : '' }}>
                    <label for="female">Female</label>
                    <input type="radio" id="male" name="staffGender" value="male" {{ old('staffGender')==='male' ? 'checked' : '' }}>                                
                    <label for="male">Male</label><br>
                    <x-input-error :messages="$errors->get('staffGender')" class="mt-2" />
                </div>
                <div class="raceStaff">
                    <label for="staffRace">Race:</label><br>
                    <input type="text" id="staffRace" name="staffRace" placeholder="Race" value="{{old('staffRace')}}"><br>
                    <x-input-error :messages="$errors->get('staffRace')" class="mt-2" />
                </div>
                <div class="contactStaff">
                    <label for="staffContact">Country:</label>
                    <input type="text" id="staffContact" name="staffContact" placeholder="Contact" value="{{old('staffContact')}}"><br>
                    <x-input-error :messages="$errors->get('staffContact')" class="mt-2" />
                </div>
                <div class="addressStaff">
                    <label for="staffAddress">Address:</label>
                    <input type="text" id="staffAddress" name="staffAddress" placeholder="Address" value="{{old('staffAddress')}}"><br>
                    <x-input-error :messages="$errors->get('staffAddress')" class="mt-2" />
                </div>
                <div class="positionStaff">
                    <label for="staffPosition">Position:</label>
                    <input type="text" id="staffPosition" name="staffPosition" placeholder="Position" value="{{old('staffPosition')}}"><br>
                    <x-input-error :messages="$errors->get('staffPosition')" class="mt-2" />
                </div>
                <div class="hireStaff">
                    <label for="staffHireDate">Hire Date:</label>
                    <input type="date" id="staffHireDate" name="staffHireDate" value="{{old('staffHireDate')}}">
                    <x-input-error :messages="$errors->get('staffHireDate')" class="mt-2" />
                </div>

                    <!-- this hidden input is to hide from the view where this input would request the userID from the selected staff in the table and would connect the information of the registerForm with the userID -->
                    <input type="hidden" name="userID" value="{{request('userID')}}">

                    <button type="submit" class="btn btn-primary">Submit</button>

            </form>
            </div>
            
        </div>
    </section>

</x-app-layout>
