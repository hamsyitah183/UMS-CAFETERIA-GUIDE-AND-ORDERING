@php
    $counter = 1;
@endphp

<x-app-layout>

<div class="contact-table" style="margin-top: 100px;">
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

</x-app-layout>