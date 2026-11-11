@extends('layouts.app')

@section('title', 'Data Mahasiswa')
@section('heading', 'DAFTAR MAHASISWA')

@section('content')
<div class="crud-page">
    <div class="crud-toolbar">
        <p class="crud-description">Kelola data mahasiswa, program studi, dan angkatan.</p>
        <a href="{{ route('mahasiswa.create') }}" class="crud-button crud-button-primary">+ Tambah Mahasiswa</a>
    </div>

    @if (session('success'))
        <div class="crud-alert crud-alert-success" role="status">{{ session('success') }}</div>
    @endif

    <div class="crud-table-wrap">
        <table class="crud-table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th class="crud-actions-heading">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                    <tr>
                        <td class="crud-code">{{ $mahasiswa->nim }}</td>
                        <td class="crud-primary-text">{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->prodi }}</td>
                        <td>{{ $mahasiswa->angkatan }}</td>
                        <td>
                            <div class="crud-actions">
                                <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="crud-button crud-button-edit">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="crud-button crud-button-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="crud-empty">Belum ada data mahasiswa. Tambahkan data menggunakan tombol di atas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection