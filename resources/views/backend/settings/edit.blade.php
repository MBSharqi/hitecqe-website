@extends('layouts.backend')

@section('title', 'Site Settings')
@section('eyebrow', 'Company')
@section('heading', 'Site settings')

@section('content')
    <div class="admin-actions">
        <p class="admin-help">Contact details for the website, plus where new contact-form emails should be delivered.</p>
    </div>

    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="admin-form">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-field">
                    <label for="email">Public email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $settings['email']) }}">
                    <p class="admin-help">Shown on the contact page and footer.</p>
                    @error('email') <p class="admin-error">{{ $message }}</p> @enderror
                </div>

                <div class="admin-field">
                    <label for="notification_email">Notification email</label>
                    <input id="notification_email" type="email" name="notification_email" value="{{ old('notification_email', $settings['notification_email']) }}">
                    <p class="admin-help">Receives an email when someone submits the contact form. Falls back to public email if empty.</p>
                    @error('notification_email') <p class="admin-error">{{ $message }}</p> @enderror
                </div>

                <div class="admin-field">
                    <label for="phone">Phone (display)</label>
                    <input id="phone" type="text" name="phone" value="{{ old('phone', $settings['phone']) }}">
                    @error('phone') <p class="admin-error">{{ $message }}</p> @enderror
                </div>

                <div class="admin-field">
                    <label for="phone_link">Phone link <span>(tel:)</span></label>
                    <input id="phone_link" type="text" name="phone_link" value="{{ old('phone_link', $settings['phone_link']) }}" placeholder="+94772067857">
                    <p class="admin-help">Digits only for click-to-call. Leave empty to auto-build from phone.</p>
                    @error('phone_link') <p class="admin-error">{{ $message }}</p> @enderror
                </div>

                <div class="admin-field">
                    <label for="address">Address / studio</label>
                    <input id="address" type="text" name="address" value="{{ old('address', $settings['address']) }}">
                    @error('address') <p class="admin-error">{{ $message }}</p> @enderror
                </div>

                <div class="admin-field">
                    <label for="hours">Hours</label>
                    <input id="hours" type="text" name="hours" value="{{ old('hours', $settings['hours']) }}">
                    @error('hours') <p class="admin-error">{{ $message }}</p> @enderror
                </div>

                <div class="admin-field">
                    <label for="response_note">Response note</label>
                    <input id="response_note" type="text" name="response_note" value="{{ old('response_note', $settings['response_note']) }}">
                    @error('response_note') <p class="admin-error">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="admin-btn">Save settings</button>
            </div>
        </form>
    </section>
@endsection
