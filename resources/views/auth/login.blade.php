<x-layout>
    <div class="login-page-wrapper">
        @if (session('success'))
            <div style="color: green; background-color: #e8f5e9; padding: 20px; border-radius: 8px; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="login-container">
            <h2 style="text-align: center">Login</h2>
            <br>
            <form method="POST" action="{{ route('login.submit') }}">

                @csrf

                <div class="form-group">
                    <label for="email">Email:</label>
                    <br>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <br>
                    <input type="password" id="password" name="password" required>
                </div>
                
                @error('email' ?? 'password')
                    <span style="color: red;">{{ $message }}</span>
                    <br>
                @enderror
                <br>
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>

                <br><br>
                <button class="btn-submit" type="submit">Login</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
        <div class="register-link">
            <br>
            <p>Don't have an account? <a href="{{ route('register-form') }}">Register here</a></p>
        </div>
    </div>
</x-layout>