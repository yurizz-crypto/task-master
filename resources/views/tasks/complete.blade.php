<x-sidebar title="Completed Tasks">
    <div class="dashboard-content">

        <div class="task-list">
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr style="background-color: #eee; text-align: left;">
                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Completed Task Name</th>
                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        @if ($task->is_completed)
                            <tr>
                                <td style="padding: 12px; border-bottom: 1px solid #eee;">{{ $task->title }}</td>
                                <td style="padding: 12px; border-bottom: 1px solid #eee;">
                                    <span style="color: green;">Complete</span>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="2" style="padding: 20px; text-align: center; color: #888;">
                                No tasks completed. Complete some in Tasks Page!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-sidebar>