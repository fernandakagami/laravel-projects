<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
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

    public function store(TaskFormRequest $request)
    {
        Task::create($request->all());
         
        return to_route('tasks.index')->with('message','Task created successfully.');
    }
}