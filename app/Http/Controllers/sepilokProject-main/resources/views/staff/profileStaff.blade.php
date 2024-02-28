<x-app-layout>

<section class="staffProfile">
<div class="profileStaff_table">

            <h2>SEPILOK ORANGUTAN REHABILITATION CENTER</h2>

            <div class="profileStaff_information">

            <h2>Staff Information</h2>

            <div class="newStaff">
            <form method="POST" action="{{route('profileStaff.viewStaffInfo')}}">
            @csrf
                @method('POST')
                <h3>Register New Staff Information</h3>
                <div class="nameStaff">
                    <div class="staffName">
                    <label for="staffName">Name:</label>
                        <!-- Use the readonly attribute to make the textarea non-editable -->
                    <textarea id="staffName" name="staffName" readonly>{{ $staff->staffName }}</textarea><br>
                    </div>
                </div>

                <div class="dobStaff">
                    <label for="staffDOB">Date of Birth:</label>
                    <textarea id="staffDOB" name="staffDOB" readonly>{{ $staff->staffDOB }}</textarea><br>

                </div>

                <div class="genderStaff">
                    <label for="staffGender">Gender:</label>
                    <textarea id="staffGender" name="staffGender" readonly>{{ $staff->staffGender }}</textarea><br>

                </div>

                <div class="raceStaff">
                    <label for="staffRace">Race:</label><br>
                    <textarea id="staffRace" name="staffRace" readonly>{{ $staff->staffRace }}</textarea><br>

                </div>

                <div class="contactStaff">
                    <label for="staffContact">Country:</label>
                    <textarea id="staffContact" name="staffContact" readonly>{{ $staff->staffContact }}</textarea><br>

                </div>

                <div class="addressStaff">
                    <label for="staffAddress">Address:</label>
                    <textarea id="staffAddress" name="staffAddress" readonly>{{ $staff->staffAddress }}</textarea><br>

                </div>

                <div class="positionStaff">
                    <label for="staffPosition">Position:</label>
                    <textarea id="staffPosition" name="staffPosition" readonly>{{ $staff->staffPosition }}</textarea><br>
                </div>

                <div class="hireStaff">
                    <label for="staffHireDate">Hire Date:</label>
                    <textarea id="staffHireDate" name="staffHireDate" readonly>{{ $staff->staffHireDate }}</textarea><br>
                </div>
                    <input type="hidden" name="userID" value="{{ request('userID') }}">
                
                    <!-- direct the staff to the edit blade view where it would be retrieve the data based on the staffID of the staff -->
                    <a href="{{ route('staff.editProfileStaff', ['staff' => $staff->staffID]) }}" class="btn btn-secondary">Edit</a>                            

            </form>
            </div>
            
        </div>


</section>

</x-app-layout>