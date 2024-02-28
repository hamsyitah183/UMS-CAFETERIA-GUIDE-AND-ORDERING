@php
    $counter = 1;
@endphp

<x-app-layout>

    <section class="checkView">
        <div class="checkIn-table">
                <table class = "tableCheck">
                    <ul>
                        <li>
                        <a href="task" class="btn btn-secondary">Back</a>
                        </li>
                    </ul>
                    <tr>
                        <th>No</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Check Date</th>
                        <th>Action</th>
                    </tr>
                    <!-- Example List of Check In -->
                        @foreach($check as $check)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td>{{$check->checkIn}}</td>
                        <td>{{$check->checkOut}}</td>
                        <td>{{$check->checkDate}}</td>
                        <td>                                                     
                            <a href="{{ route('editCheck', ['check' => $check->checkID]) }}" class="btn btn-secondary">Edit</a>                            
                                                 
                            <form action="/deleteCheck/{{$check->checkID}}" method="POST">
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

</x-app-layout>