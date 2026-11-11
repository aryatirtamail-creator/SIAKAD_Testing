<?php

namespace Tests\Feature;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AcademicCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_mahasiswa_pages_require_authentication(): void
    {
        $this->get(route('mahasiswa.index'))
            ->assertRedirect(route('login'));
    }

    public function test_article_and_category_pages_are_not_part_of_the_application(): void
    {
        $this->get('/articles')->assertNotFound();
        $this->get('/categories')->assertNotFound();
    }

    public function test_academic_routes_include_a_protected_class_page(): void
    {
        $this->get(route('kelas.index'))->assertRedirect(route('login'));

        $this->actingAs(User::factory()->create())
            ->get(route('kelas.index'))
            ->assertOk()
            ->assertSee('DAFTAR KELAS');
    }

    public function test_mahasiswa_can_be_created_updated_and_deleted(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $this->actingAs($user)
            ->get(route('mahasiswa.create'))
            ->assertOk()
            ->assertSee('crud-form-page')
            ->assertSee('Simpan Mahasiswa');

        $this->actingAs($user)
            ->post(route('mahasiswa.store'), [
                'nim' => '2026001',
                'nama' => 'Arya Putra',
                'prodi' => 'Informatika',
                'angkatan' => '2026',
            ])
            ->assertRedirect(route('mahasiswa.index'));

        $mahasiswa = Mahasiswa::firstOrFail();
        $this->assertSame('2026', $mahasiswa->angkatan);
        $this->actingAs($user)
            ->get(route('mahasiswa.edit', $mahasiswa))
            ->assertOk()
            ->assertSee('crud-form-page')
            ->assertSee('Simpan Perubahan');
        $this->actingAs($user)
            ->get(route('mahasiswa.index'))
            ->assertOk()
            ->assertSee('Arya Putra');

        $this->actingAs($user)
            ->put(route('mahasiswa.update', $mahasiswa), [
                'nim' => $mahasiswa->nim,
                'nama' => 'Arya Pratama',
                'prodi' => 'Sistem Informasi',
                'angkatan' => '2025',
            ])
            ->assertRedirect(route('mahasiswa.index'));

        $this->assertDatabaseHas('mahasiswas', [
            'id' => $mahasiswa->id,
            'nama' => 'Arya Pratama',
            'angkatan' => '2025',
        ]);

        $this->actingAs($user)
            ->delete(route('mahasiswa.destroy', $mahasiswa))
            ->assertRedirect(route('mahasiswa.index'));

        $this->assertDatabaseMissing('mahasiswas', ['id' => $mahasiswa->id]);
    }

    public function test_mahasiswa_name_must_have_at_least_three_characters(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $this->actingAs($user)
            ->from(route('mahasiswa.create'))
            ->post(route('mahasiswa.store'), [
                'nim' => '2026002',
                'nama' => 'AB',
                'prodi' => 'Informatika',
                'angkatan' => '2026',
            ])
            ->assertSessionHasErrors('nama');

        $this->assertDatabaseCount('mahasiswas', 0);
    }

    public function test_dosen_can_be_created_updated_and_deleted(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get(route('dosen.create'))->assertOk()->assertSee('crud-form-page');
        $this->post(route('dosen.store'), [
            'nidn' => '0123456789',
            'nama' => 'Dosen Pertama',
            'bidang_keahlian' => 'Pemrograman',
        ])->assertRedirect(route('dosen.index'));

        $dosen = Dosen::firstOrFail();
        $this->get(route('dosen.index'))
            ->assertOk()
            ->assertSee('crud-table')
            ->assertSee('Dosen Pertama')
            ->assertSee(route('dosen.edit', $dosen));
        $this->get(route('dosen.edit', $dosen))->assertOk();

        $this->put(route('dosen.update', $dosen), [
            'nidn' => $dosen->nidn,
            'nama' => 'Dosen Diperbarui',
            'bidang_keahlian' => 'Basis Data',
        ])->assertRedirect(route('dosen.index'));

        $this->assertDatabaseHas('dosens', [
            'id' => $dosen->id,
            'nama' => 'Dosen Diperbarui',
            'bidang_keahlian' => 'Basis Data',
        ]);

        $this->delete(route('dosen.destroy', $dosen))
            ->assertRedirect(route('dosen.index'));
        $this->assertDatabaseMissing('dosens', ['id' => $dosen->id]);
    }

    public function test_matakuliah_can_be_created_updated_and_deleted(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get(route('matakuliah.create'))->assertOk()->assertSee('crud-form-page');
        $this->post(route('matakuliah.store'), [
            'kode_mk' => 'IF101',
            'nama_mk' => 'Pemrograman Web',
            'sks' => 3,
        ])->assertRedirect(route('matakuliah.index'));

        $matakuliah = Matakuliah::firstOrFail();
        $this->get(route('matakuliah.index'))
            ->assertOk()
            ->assertSee('crud-table')
            ->assertSee('Pemrograman Web')
            ->assertSee(route('matakuliah.edit', $matakuliah));
        $this->get(route('matakuliah.edit', $matakuliah))->assertOk();

        $this->put(route('matakuliah.update', $matakuliah), [
            'kode_mk' => $matakuliah->kode_mk,
            'nama_mk' => 'Pemrograman Lanjut',
            'sks' => 4,
        ])->assertRedirect(route('matakuliah.index'));

        $this->assertDatabaseHas('matakuliahs', [
            'id' => $matakuliah->id,
            'nama_mk' => 'Pemrograman Lanjut',
            'sks' => 4,
        ]);

        $this->delete(route('matakuliah.destroy', $matakuliah))
            ->assertRedirect(route('matakuliah.index'));
        $this->assertDatabaseMissing('matakuliahs', ['id' => $matakuliah->id]);
    }
}
