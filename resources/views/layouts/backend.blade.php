<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/backend.css', 'resources/js/backend.js'])
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a href="{{ route('admin.dashboard') }}" class="admin-brand">
                <img src="{{ asset('images/logo/hitecqe-mark.svg') }}" alt="" width="34" height="34">
                <span>{{ config('app.name') }}</span>
            </a>
            <nav class="admin-nav" aria-label="Admin">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'is-active' : '' }}">Messages</a>
                <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'is-active' : '' }}">Posts</a>
                <a href="{{ route('home') }}" target="_blank" rel="noopener">View website</a>
            </nav>
            <form method="POST" action="{{ route('admin.logout') }}" class="admin-logout">
                @csrf
                <button type="submit">Log out</button>
            </form>
        </aside>

        <div class="admin-main">
            <header class="admin-topbar">
                <div>
                    <p class="admin-eyebrow">@yield('eyebrow', 'Admin')</p>
                    <h1>@yield('heading', 'Dashboard')</h1>
                </div>
                <div class="admin-user">
                    <span>{{ auth()->user()->name }}</span>
                </div>
            </header>

            <div class="admin-content">
                @if (session('success'))
                    <div class="admin-alert">{{ session('success') }}</div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
