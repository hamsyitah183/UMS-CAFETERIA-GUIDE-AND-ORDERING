
<x-app-layout>

<section>
<div class="editForm">
                <form method="POST">
                    @csrf
                    @method('PUT')
                    
                    <h3>New Task </h3>
                    <label for="taskName">Task Name:</label><br>
                        <div class="taskName">
                        <input type="text" id="taskName" name="taskName" placeholder="Task Name" value="{{$task->taskName}}"><br>
                    </div>
                    <div class="taskDesc">
                        <label for="taskDesc">Description:</label><br>
                        <input type="text" id="taskDesc" name="taskDesc" placeholder="Description" value="{{$task->taskDesc}}"><br>
                    </div>
                    <div class="taskDate">
                        <label for="taskDate">Due Date:</label>
                        <input type="date" id="taskDate" name="taskDate" value="{{$task->taskDate}}">
                    </div>
                    <div class="taskTime">
                        <label for="taskTime">Due Time:</label>
                        <input type="time" id="taskTime" name="taskTime" value="{{$task->taskTime}}"> 
                    </div>
                    <div class="taskAssignee">
                        <label for="staffID">Task Assigned To:</label>
                        <select name="staffID" id="staffID" placeholder="Assigned To:">
                            @foreach ($staff as $staff)
                                <option value="{{$staff->staffID}}" {{$task->staffID === $staff->staffID ? 'selected' : ''}}>
                                    {{$staff->staffName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="taskStatus">
                        <label for="taskStatus">Status:</label>
                        <select name="taskStatus" id="taskStatus">
                            @foreach(['complete', 'ongoing', 'incomplete'] as $taskStatus)
                                <option value="{{ $taskStatus }}" {{ $task->taskStatus === $taskStatus ? 'selected' : '' }}>
                                    {{ ucfirst($taskStatus) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button>Save Changes</button>

                </form>
            </div>

</section>


</x-app-layout>