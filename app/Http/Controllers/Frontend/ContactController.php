<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StoreContactMessageRequest;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('frontend.contact.index');
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        $message = ContactMessage::create([
            ...$request->validated(),
            'status' => 'new',
        ]);

        $this->notifyTeam($message);

        return redirect()
            ->route('contact')
            ->with('success', 'Thanks for reaching out. We will get back to you soon.');
    }

    private function notifyTeam(ContactMessage $message): void
    {
        $recipient = setting('notification_email') ?: setting('email');

        if (! is_string($recipient) || $recipient === '') {
            return;
        }

        try {
            Mail::to($recipient)->send(new ContactMessageReceived($message));
        } catch (Throwable $exception) {
            Log::warning('Contact notification email failed.', [
                'message_id' => $message->id,
                'error' => $exception->getMessage(),
            ]);
        }
    }
}
