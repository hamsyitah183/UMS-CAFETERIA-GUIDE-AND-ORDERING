@php
    $counter = 1;
@endphp

<x-app-layout>

<section class="contact">
    <div class="contact-container">
        <div class="contact-content">
            <h3 class="contact-sepilok">CONTACT US</h3>
            <ul class="contact-info">
                <li class="info1">Please get in touch for any questions and information about visiting, or to learn more about our mission and work.</li>
                <li class="info2">Office: 089-633 587</li>
                <li class="info3">Fax No.: 089-633 597</li>
                <li class="info4">Address:</li>
                <li class="info5">W.D.T 200, Sabah Wildlife Department, Jalan Sepilok, Sepilok, 90000 Sandakan, Sabah</li>
            </ul>
        </div>

        <div class="contact-content">
            <form method="POST" action="{{route('contact.contactPost')}}">
            @csrf
                @method('POST')
                <h3>Feedback</h3>
                <div class="contactType">
                <label for="contactType">Message Type:</label>
                    <select name="contactType" id="contactType">
                        <option value="feedback">Suggestions</option>
                        <option value="complaints">Complaints</option>
                        <option value="complaints">Compliments</option>
                        <option value="enquiry">Enquiry</option>
                    </select>
                    <x-input-error :messages="$errors->get('contactType')" class="mt-2" />
                </div>
                <div class="contactMessage">
                    <label for="contactMessage">Message:</label>
                    <input type="text" id="contactMessage" name="contactMessage" placeholder="Message" value="{{ old('contactMessage') }}"><br>
                    <x-input-error :messages="$errors->get('contactMessage')" class="mt-2" />
                </div>
                <div class="contactCategory">
                    <label for="contactCategory">Category:</label>
                    <select name="contactCategory" id="contactCategory">
                        <option value="service">Customer Service</option>
                        <option value="facilities">Facilities</option>
                        <option value="experience">Website/User Experiences</option>
                    </select>
                    <x-input-error :messages="$errors->get('contactCategory')" class="mt-2" />
                </div>
                    <button type="submit" class=" submit_bttn btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
    <div class="contact-table">
        <table class = "tablecontact">
                    <tr>
                        <th>No</th>
                        <th>Message Type</th>
                        <th>Message</th>
                        <th>Message Category</th>
                        <th>Edit</th>

                    </tr>
                    <!-- Example List of Staff -->
                    @foreach($contact as $contact)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td>{{$contact->contactType}}</td>
                        <td>{{$contact->contactMessage}}</td>
                        <td>{{$contact->contactCategory}}</td>
                        <td>
                            <a href="{{ route('editContact', ['contact' => $contact->contactID]) }}" class="btn btn-secondary">Edit</a>                            
                            <form action="/deleteContact/{{$contact->contactID}}" method="POST">
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

@include('main_footer')

            <script>
                function openForm() {
                document.getElementById("myForm").style.display = "block";
                }

                function closeForm() {
                document.getElementById("myForm").style.display = "none";
                }
            </script>


</x-app-layout>