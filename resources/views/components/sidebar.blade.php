@props(['title' => 'Dashboard'])

<x-layout title="{{ $title }} | {{ Session::get('user')->name }}">
    <div class="dashboard-container">
        <nav class="side-navbar">
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="{{ asset('images/logo.png') }}" alt="TaskMaster Logo" style="width: 150px;">
            </div>
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="{{ Session::get('user')->image ? asset('storage/' . Session::get('user')->image) : asset('images/default-avatar.png') }}" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #4CAF50; margin-bottom: 10px;">
            </div>
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Tasks
                    </a>
                </li>

                <li>
                    <a href="{{ route('tasks.complete') }}" class="{{ request()->routeIs('tasks.complete') ? 'active' : '' }}">
                        Completed Tasks
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile.edit', Session::get('user')->id) }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        Profile
                    </a>
                </li>
                                
                <li class="logout-item">
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </nav>
        {{ $slot }}
    </div>
</x-layout>