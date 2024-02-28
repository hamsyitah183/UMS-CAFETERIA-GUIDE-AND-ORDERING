@php
    $counter = 1;
@endphp

<x-app-layout>
    

    <section class="register">
        <div class="register-staff">

            <h2>SEPILOK ORANGUTAN REHABILITATION CENTER</h2>

            <!-- List of Staff -->
            <div class="staff-list">
                <table>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach($staff as $staff)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td>{{ $staff->id }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>
                            <a href="{{ route('registerNew', ['userID' => $staff->id]) }}" class="btn btn-success" >Register</a>
                        </td>
                        </tr>
                    @endforeach
                </table>
            </div>            
        </div>
    </section>
</x-app-layout>
