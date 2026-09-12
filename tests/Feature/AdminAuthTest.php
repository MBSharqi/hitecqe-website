<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_admin_dashboard(): void
    {
        $this->get('/admin')->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_log_in_and_view_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@hitecqe.com',
            'password' => 'Hitecqe@Admin1',
        ]);

        $this->post('/admin/login', [
            'email' => $user->email,
            'password' => 'Hitecqe@Admin1',
        ])->assertRedirect(route('admin.dashboard'));

        $this->get('/admin')->assertOk()->assertSee('Dashboard');
    }

    public function test_invalid_login_is_rejected(): void
    {
        $this->post('/admin/login', [
            'email' => 'admin@hitecqe.com',
            'password' => 'wrong-password',
        ])->assertSessionHasErrors('email');
    }

    public function test_admin_can_view_and_delete_a_message(): void
    {
        $user = User::factory()->create();
        $message = ContactMessage::query()->create([
            'name' => 'Sara Ali',
            'email' => 'sara@example.com',
            'subject' => 'Website rebuild',
            'message' => 'Please help us rebuild the company site.',
            'status' => 'new',
        ]);

        $this->actingAs($user)
            ->get(route('admin.messages.show', $message))
            ->assertOk()
            ->assertSee('Sara Ali');

        $this->actingAs($user)
            ->delete(route('admin.messages.destroy', $message))
            ->assertRedirect(route('admin.messages.index'));

        $this->assertDatabaseMissing('contact_messages', ['id' => $message->id]);
    }
}
