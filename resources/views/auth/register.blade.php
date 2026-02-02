<x-layout title="Register">
    <div class="login-page-wrapper">

        <div class="login-container">
            <h2>Register</h2>
            <br>
            <form method="POST" action="{{ route('register.submit') }}">

                @csrf

                <div class="form-group">
                    <label for="name">Username:</label>
                    <br>
                    <input type="text" id="name" name="name" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <br>
                    <input type="email" id="email" name="email" required>
                </div>

                @error('email')
                    <span style="color: red;">{{ $message }}</span>
                <br>
                @enderror

                <br>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <br>
                    <input type="password" id="password" name="password" required>
                    
                    @error('password')
                        <br>
                        <span style="color: red;">{{ $message }}</span>
                        <br>
                    @enderror
                    
                    <br>
                    <label for="password_confirmation">Confirm Password:</label>
                    <br>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <br>
                <button class="btn-submit" type="submit">Register</button>
            </form>
        </div>
            <div class="register-link">
            <br>
            <p>Already have an account? <a href="/">Login</a></p>
        </div>

    </div>
</x-layout>