<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_registration_and_login_return_sanctum_tokens(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => 'password123',
            'c_password' => 'password123',
        ]);

        $response->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.name', 'Test Admin');
        $this->assertNotEmpty($response->json('data.token'));

        $this->postJson('/api/login', [
            'email' => 'admin@example.com',
            'password' => 'password123',
        ])->assertOk()->assertJsonPath('success', true);
    }

    public function test_api_requires_sanctum_authentication_for_protected_routes(): void
    {
        $this->getJson('/api/mahasiswa')->assertUnauthorized();
        $this->getJson('/api/matakuliah')->assertUnauthorized();
        $this->getJson('/api/articlesAPI')->assertNotFound();
    }

    public function test_authenticated_api_can_list_academic_data(): void
    {
        Mahasiswa::create([
            'nim' => '2026003',
            'nama' => 'API Student',
            'prodi' => 'Informatika',
            'angkatan' => '2026',
        ]);
        Matakuliah::create([
            'kode_mk' => 'IF101',
            'nama_mk' => 'Pemrograman Web',
            'sks' => 3,
        ]);

        $registered = $this->postJson('/api/register', [
            'name' => 'API Admin',
            'email' => 'api-admin@example.com',
            'password' => 'password123',
            'c_password' => 'password123',
        ]);
        $token = $registered->json('data.token');

        $this->withToken($token)
            ->getJson('/api/mahasiswa')
            ->assertOk()
            ->assertJsonFragment(['nim' => '2026003']);

        $this->withToken($token)
            ->getJson('/api/matakuliah')
            ->assertOk()
            ->assertJsonFragment(['kode_mk' => 'IF101']);
    }
}
