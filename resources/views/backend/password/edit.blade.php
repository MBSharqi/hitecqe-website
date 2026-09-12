@extends('layouts.backend')

@section('title', 'Password')
@section('eyebrow', 'Account')
@section('heading', 'Change password')

@section('content')
    <section class="admin-panel admin-panel--narrow">
        <form method="POST" action="{{ route('admin.password.update') }}" class="admin-form">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-field admin-field--full">
                    <label for="current_password">Current password</label>
                    <input id="current_password" type="password" name="current_password" required autocomplete="current-password">
                    @error('current_password')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="admin-field admin-field--full">
                    <label for="password">New password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="admin-field admin-field--full">
                    <label for="password_confirmation">Confirm new password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="admin-btn">Update password</button>
            </div>
        </form>
    </section>
@endsection
