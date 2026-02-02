<x-sidebar>
    <div class="dashboard-content">
        <h1>Welcome back, {{ Session::get('user')->name }}!</h1>

        @if(session('success'))
            <div style="padding: 15px; background-color: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="task-form" style="margin-bottom: 30px; background: #f9f9f9; padding: 20px; border-radius: 8px;">
            <h3>Add a New Task</h3>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="What needs to be done?" required 
                       style="padding: 10px; width: 100%; border-radius: 4px; border: 1px solid #ccc;">
                <button type="submit" class="btn-submit" style="padding: 10px 20px; margin-top: 10px; cursor: pointer;">Add Task</button>
            </form>
        </div>

        <div class="task-list">
            <h3>Your Pending Tasks</h3>
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px; table-layout: fixed;">
                <thead>
                    <tr style="background-color: #eee; text-align: left;">
                        <th style="padding: 12px; border-bottom: 2px solid #ddd; width: 45%;">Task Name</th>
                        <th style="padding: 12px; border-bottom: 2px solid #ddd; width: 40%; text-align: center;">Actions</th>
                        <th style="padding: 12px; border-bottom: 2px solid #ddd; width: 15%; text-align: center;">Complete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        @if (!$task->is_completed)
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 12px; word-wrap: break-word;">{{ $task->title }}</td>

                                <td style="padding: 12px; text-align: center;">
                                    <a href="{{ route('tasks.edit', $task->id) }}" 
                                    style="display: inline-block; background: #007bff; color: white; text-decoration: none; padding: 6px 12px; border-radius: 4px; font-size: 14px; margin-right: 5px; transition: 0.3s;">
                                        Edit
                                    </a> 

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this task?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 14px; transition: 0.3s;">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                                <td style="padding: 12px; text-align: center;">
                                    <form action="{{ route('task.change', $task->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" style="background: #28a745; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 14px; transition: 0.3s;">
                                            Done
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @else

                        <tr>
                            <td colspan="4" style="padding: 40px; text-align: center; color: #888;">
                                <del>{{ $task->title }}</del>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 40px; text-align: center; color: #888;">
                                No pending tasks! Time to relax.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-sidebar>