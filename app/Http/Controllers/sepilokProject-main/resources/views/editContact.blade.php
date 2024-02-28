



<x-app-layout>

        <div class="editForm">
        <form method="POST" >
            @csrf
                @method('PUT')
                <h3>Feedback</h3>
                <div class="contactType">
                <label for="contactType">Message Type:</label>
                    <select name="contactType" id="contactType">
                        @foreach(['feedback', 'complaints', 'compliments', 'enquiry'] as $type)
                            <option value="{{ $type }}" {{ $contact->contactType === $type ? 'selected' : '' }}>
                                {{ ucfirst($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="contactMessage">
                    <label for="contactMessage">Message:</label>
                    <input type="text" id="contactMessage" name="contactMessage" placeholder="Message" value="{{$contact->contactMessage}}"><br>
                </div>
                <div class="contactCategory">
                    <label for="contactCategory">Category:</label>
                    <select name="contactCategory" id="contactCategory">
                        @foreach(['service', 'facilities', 'experience'] as $category)
                            <option value="{{ $category }}" {{ $contact->contactCategory === $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }} {{-- Display the category with the first letter capitalized --}}
                            </option>
                        @endforeach
                    </select>
                </div>
                    <button>Save Changes</button>
            </form>
        </div>
    </div>

</div>

</x-app-layout>