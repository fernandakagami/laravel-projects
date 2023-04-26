<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
<form action="{{ route('tasks.store') }}" method="post"> 
        @csrf
    
        <div>
            <label for="name">Name</label>
            <input 
                autofocus
                type="text"
                id="name"
                name="name"                    
                value="{{ old('name') }}"
            >            
        </div>

        <div>
            <label for="description">Description</label>
            <input 
                type="text"
                id="description"
                name="description"                
                value="{{ old('description') }}"
            >            
        </div>

        <div>
            <label for="deadline">Deadline</label>
            <input 
                type="text"
                id="deadline"
                name="deadline"                
                value="{{ old('deadline') }}"
            >            
        </div>

        <div>
            <label for="created">Created At</label>
            <input 
                type="text"
                id="created"
                name="created"                
                value="{{ old('created') }}"
                disabled
            >            
        </div>
        
        <button>Add</button>
    </form>
</body>
</html>