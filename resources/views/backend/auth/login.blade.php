<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/backend.css', 'resources/js/backend.js'])
</head>
<body class="admin-auth-body">
    <main class="admin-auth">
        <div class="admin-auth__card">
            <div class="admin-auth__brand">
                <img src="{{ asset('images/logo/hitecqe-mark.svg') }}" alt="" width="42" height="42">
                <div>
                    <strong>{{ config('app.name') }}</strong>
                    <p>Admin access</p>
                </div>
            </div>

            <h1>Sign in to continue</h1>
            <p class="admin-auth__lead">Manage contact messages and studio operations.</p>

            <form method="POST" action="{{ route('admin.login.store') }}" class="admin-auth__form">
                @csrf

                <div class="admin-field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <label class="admin-check">
                    <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
                    <span>Remember me</span>
                </label>

                <button type="submit" class="admin-btn">Sign in</button>
            </form>
        </div>
    </main>
</body>
</html>
