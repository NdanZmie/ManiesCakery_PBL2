<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityAndAuthTest extends TestCase
{
    /**
     * Unauthenticated users must be redirected to login when accessing admin dashboard.
     */
    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');

        $response2 = $this->get('/dashboard/products');
        $response2->assertRedirect('/login');

        $response3 = $this->get('/usersdashboard');
        $response3->assertRedirect('/login');
    }

    /**
     * Authenticated regular user (role: 'user') cannot access admin dashboard (403).
     */
    public function test_regular_user_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(403);
    }

    /**
     * Authenticated admin user (role: 'admin') can access admin dashboard.
     */
    public function test_admin_user_can_access_admin_dashboard(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get('/dashboard');
        $response->assertStatus(200);
    }

    /**
     * User can register as a regular customer without any admin key.
     */
    public function test_regular_user_can_register(): void
    {
        $payload = [
            'username' => 'testcustomer_' . uniqid(),
            'email' => 'customer_' . uniqid() . '@example.com',
            'no_hp' => '081234567890',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'user',
        ];

        $response = $this->post('/register', $payload);
        $response->assertRedirect('/login');

        $this->assertDatabaseHas('user', [
            'email' => $payload['email'],
            'role' => 'user',
        ]);
    }

    /**
     * Guest login creates a temporary guest user and logs them in.
     */
    public function test_guest_login_works(): void
    {
        $response = $this->get('/login/guest');
        $response->assertRedirect('/');
        $this->assertAuthenticated();

        $currentUser = auth()->user();
        $this->assertEquals('guest', $currentUser->role);

        // Logging out as guest should delete the guest user
        $logoutResponse = $this->post('/logout');
        $logoutResponse->assertRedirect('/login');
        $this->assertGuest();

        $this->assertDatabaseMissing('user', [
            'id' => $currentUser->id,
        ]);
    }
}
