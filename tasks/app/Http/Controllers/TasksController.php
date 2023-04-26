<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $message = session('message'); 

        return view('tasks.index')->with('tasks', $tasks)->with('message', $message);
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