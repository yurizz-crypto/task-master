<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Session;

class PageNavigator extends Controller
{
    public function goToDashboard()
    {
        $user = Session::get('user');

        $tasks = Task::orderBy('is_completed', 'asc')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function goToCompletedTasks()
    {
        $user = Session::get('user');

        $tasks = Task::where('user_id', $user->id)
            ->where('is_completed', 1)
            ->get();

        return view('tasks.complete', compact('tasks'));
    }
}
