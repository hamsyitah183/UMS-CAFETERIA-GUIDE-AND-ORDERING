@php
    $counter = 1;
@endphp

<x-app-layout>

    <section class="checkIn">
            <div class="checkIn_Out">

                <div class="checkIn_buttons">
                    <ul>
                        <li>
                            <h3>Check In Attendance</h3>
                            <a href="check" class="check_bttn btn btn-success" >Check In</a>
                        </li>
                        <li>
                            <h3>View Attendance</h3>
                            <a href="viewCheck" class="view_bttn btn btn-secondary" >Attendance</a>
                        </li>
                        <li>
                            <h3>Add Announcement</h3>
                            <a href="annStaff" class="view_bttn btn btn-secondary" >Announcement</a>
                        </li>
                    </ul>
                </div>

            </div>


            <div class="taskManage">
                    <h2>Task Management</h2>

                    <ul>
                        <li>
                        
                        <button class="open-button btn btn-secondary" onclick='openForm()'>Create New +</button>                        

                        </li>
                    </ul>
                
                    <table class = "task_table">
                        <tr>
                            <th>No</th>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Due Date</th>
                            <th>Due Time</th>
                            <th>Assigned To:</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <!-- List of Tasks  -->
                        @foreach($task as $task)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$task->taskName}}</td>
                                <td>{{$task->taskDesc}}</td>
                                <td>{{$task->taskDate}}</td>
                                <td>{{$task->taskTime}}</td>
                                <td>{{$task->user_ID}}</td>
                                <td>{{$task->taskStatus}}</td>
                                <td>
                                    <a href="{{ route('editTask', ['task' => $task->tasksID]) }}" class="btn btn-secondary">Edit</a>                            
                                    <form action="/deleteTask/{{$task->tasksID}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </table>`
            </div>

            <div class="taskForm inv-form" id="taskForm">
                <form method="POST" action="{{route('task.taskPost')}}">
                    @csrf
                    @method('POST')
                    
                    <h3>New Task </h3>
                        <div class="taskName">
                        <label for="taskName">Task Name:</label><br>
                        <input type="text" id="taskName" name="taskName" placeholder="Task Name" value="{{ old('taskName') }}"><br>
                        <x-input-error :messages="$errors->get('taskName')" class="mt-2" />
                    </div>
                    <div class="taskDesc">
                        <label for="taskDesc">Description:</label><br>
                        <input type="text" id="taskDesc" name="taskDesc" placeholder="Description" value="{{ old('taskDesc') }}"><br>
                        <x-input-error :messages="$errors->get('taskDesc')" class="mt-2" />
                    </div>
                    <div class="taskDate">
                        <label for="taskDate">Due Date:</label>
                        <input type="date" id="taskDate" name="taskDate" value="{{ old('taskDate') }}">
                        <x-input-error :messages="$errors->get('taskDate')" class="mt-2" />
                    </div>
                    <div class="taskTime">
                        <label for="taskTime">Due Time:</label>
                        <input type="time" id="taskTime" name="taskTime">
                    </div>
                    <div class="taskAssignee">
                        <label for="staffID">Task Assigned To:</label>
                        <select name="staffID" id="staffID" placeholder="Assigned To:">
                            @foreach ($staff as $staff)
                                <option value="{{$staff->staffID}}" {{ old('staffID') == $staff->staffID ? 'selected' : '' }}>
                                    {{$staff->staffName }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('staffID')" class="mt-2" />
                    </div>
                    <div class="taskStatus">
                        <label for="taskStatus">Status:</label>
                        <select name="taskStatus" id="taskStatus">
                            <option value="complete">Complete</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="incomplete">Incomplete</option>
                        </select>
                        <x-input-error :messages="$errors->get('taskStatus')" class="mt-2" />
                    </div>

                        <input type="hidden" name="formType" value="formTask">

                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="button" class="btn btn-warning" onclick='closeForm()'>Cancel</button>
                </form>
            </div>


        </div>


    </section>
    <script>
        function openForm() {
        document.getElementById("taskForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("taskForm").style.display = "none";
        }
    </script>
    
</x-app-layout>