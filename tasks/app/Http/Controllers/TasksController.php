<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $tasks = Task::where('users_id', Auth::user()->id)->get();
            $message = session('message'); 
            return view('tasks.index')->with('tasks', $tasks)->with('message', $message);
        }

        return to_route('login')->withErrors(['email' => 'Please login to access the dashboard.'])->onlyInput('email');                         
    }     

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        $task->users_id = Auth::user()->id;
        $task->save();
         
        return to_route('tasks.index')->with('message','Task created successfully.');
    }

    public function destroy(Task $task, Request $request)
    {
        $task->delete();
        
        return to_route('tasks.index')->with('message', "Task deleted successfully.");
    }
}