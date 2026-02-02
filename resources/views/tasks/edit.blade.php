<x-sidebar title="Edit Task">
    <div class="dashboard-content" style="padding: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 80vh;">
        
        <h1 style="margin-bottom: 20px;">Edit Task</h1>

        <div class="task-form" style="background: #f9f9f9; padding: 40px; border-radius: 12px; max-width: 500px; width: 100%; box-shadow: 0 10px 25px rgba(0,0,0,0.1); text-align: left;">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PATCH') 
                
                <div style="margin-bottom: 25px;">                    
                    <input type="text" name="title" value="{{ $task->title }}" required 
                           style="width: 100%; padding: 0 15px; border-radius: 6px; border: 1px solid #ccc; box-sizing: border-box; font-size: 16px;">
                </div>

                <div style="text-align: center; display: flex; flex-direction: column; align-items: center; gap: 15px;">
                    <button type="submit" style="background-color: #007bff; padding: 12px 30px; border: none; border-radius: 6px; color: #ffffff; cursor: pointer; font-weight: bold; width: 200px; font-size: 14px;">
                        Update Task
                    </button>
                    
                    <a href="{{ route('dashboard') }}" style="background-color: rgb(244, 119, 119); padding: 12px 30px; border-radius: 6px; color: #ffffff; text-decoration: none; font-weight: bold; width: 200px; box-sizing: border-box; text-align: center; font-size: 14px;">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-sidebar>