<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class TaskController extends Controller
{
    //
    public function viewTask() {
        $staff = Staff::all(); 

        return view('task', compact('staff'));
    }

    //create new data to database when user submits the contact information
    public function taskPost(Request $request){

        
        $data = $request->validate([
            'taskName' => ['required', 'string'],
            'taskDesc' => ['required', 'string'],
            'taskDate' => ['nullable', 'date'],
            'taskTime' => ['nullable', 'date_format:H:i'], 
            'staffID' => ['nullable', 'exists:staffs,staffID'], 
            'taskStatus' => ['required', 'string']
            
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['taskName'] = strip_tags($data['taskName']);
        $data['taskDesc'] = strip_tags($data['taskDesc']);
        $data['taskDate'] = strip_tags($data['taskDate']);
        $data['taskTime'] = strip_tags($data['taskTime']);
        $data['staffID'] = strip_tags($data['staffID']);
        $data['taskStatus'] = strip_tags($data['taskStatus']);

        $data['user_ID'] = auth()->user()->id;

        $newTask = Task::create($data);

        if ($data['staffID']) {
            $staff = Staff::find($data['staffID']);
            $staff->task()->save($newTask);
        }

        Alert::success('Task Added Successfully');

        return redirect(route('task.taskPost'));
    }

    public function taskGet() {

        //getting the data from the tasks table
        $task = Task::all();

        $staff = Staff::all();
        
        return view('task', compact('task', 'staff'));

    }

    //view the task edit page
    public function editTask(Task $task){

        $staff = Staff::all();
        return view('editTask', compact('task', 'staff'));
        
    }

    public function updateTask(Task $task, Request $request){
        $data = $request->validate([
            'taskName' => ['required', 'string'],
            'taskDesc' => ['required', 'string'],
            'taskDate' => ['nullable', 'date'],
            'taskTime' => ['nullable', 'date_format:H:i'], 
            'staffID' => ['nullable', 'exists:staffs,staffID'], 
            'taskStatus' => ['required', 'string']
            
        ]);

            // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['taskName'] = strip_tags($data['taskName']);
        $data['taskDesc'] = strip_tags($data['taskDesc']);
        $data['taskDate'] = strip_tags($data['taskDate']);
        $data['taskTime'] = strip_tags($data['taskTime']);
        $data['staffID'] = strip_tags($data['staffID']);
        $data['taskStatus'] = strip_tags($data['taskStatus']);

        $task->update($data);

        Alert::success('Task Updated Successfully');

        return redirect(route('task.taskGet'));
    } 
    // got some problems with the edit so later go back and check again
    // very weird as if you did not update the taskTime, the other data such as taskName would not be updated
    // still figuring out what is wrong with this
    // why is it that if the situation is needed where only the status needs to be updated, 
    // the taskTime also needs to update although it should not be

    //also the same case with the CheckIn and checkOut time data :/

    public function deleteTask(Task $task) {

        $task->delete();

        return redirect(route('task.taskGet'));

    }

}
