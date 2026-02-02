<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $user = Session::get('user');

        Task::create([
            'title' => $request->title,
            'user_id' => $user->id,
            'is_completed' => false,
        ]);

        return back()->with('success', 'Task added successfully!');
    }

    public function updateStatus($id)
    {
        $task = Task::findOrFail($id);

        $task->update(['is_completed' => true]);

        return back()->with('success', 'Task done. Grats!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back()->with('success', 'Task deleted successfully!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'is_completed' => $request->has('is_completed') ? true : false, 
        ]);

        return redirect()->route('dashboard')->with('success', 'Task updated successfully!');
    }
}