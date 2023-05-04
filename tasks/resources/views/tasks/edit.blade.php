@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Task</div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="post"> 
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="title" class="col-form-label text-start">Title</label>
                        <input 
                            autofocus
                            type="text"
                            id="title"
                            name="title"
                            value="{{ $task->title }}"
                            class="form-control"
                        >            
                    </div>

                    <div class="mb-3">
                        <label for="description" class="col-form-label text-start">Description</label>
                        <input 
                            type="text"
                            id="description"
                            name="description"                
                            value="{{ $task->description }}"
                            class="form-control"
                        >            
                    </div>

                    <div class="mb-3">
                        <label for="deadline"  class="col-form-label text-start">Deadline</label>
                        <input 
                            type="date"
                            id="deadline"
                            name="deadline"                
                            value="{{ $task->deadline }}"
                            class="form-control"
                        >            
                    </div>        
                    
                    <button type="submit" class="btn btn-primary px-5">Edit</button>
                </form>
            <div>
        </div>
    </div>
</div>

@endsection