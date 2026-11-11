@extends('layouts.app')

@section('title', 'Data Dosen')
@section('heading', 'DAFTAR DOSEN')

@section('content')
<div class="crud-page">
    <div class="crud-toolbar">
        <p class="crud-description">Kelola data dosen dan bidang keahlian.</p>
        <a href="{{ route('dosen.create') }}" class="crud-button crud-button-primary">+ Tambah Dosen</a>
    </div>

    @if (session('success'))
        <div class="crud-alert crud-alert-success" role="status">{{ session('success') }}</div>
    @endif

    <div class="crud-table-wrap">
        <table class="crud-table">
            <thead>
                <tr>
                    <th>NIDN</th>
                    <th>Nama Dosen</th>
                    <th>Bidang Keahlian</th>
                    <th class="crud-actions-heading">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dosens as $dosen)
                    <tr>
                        <td class="crud-code">{{ $dosen->nidn }}</td>
                        <td class="crud-primary-text">{{ $dosen->nama }}</td>
                        <td>{{ $dosen->bidang_keahlian }}</td>
                        <td>
                            <div class="crud-actions">
                                <a href="{{ route('dosen.edit', $dosen) }}" class="crud-button crud-button-edit">Edit</a>
                                <form action="{{ route('dosen.destroy', $dosen) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data dosen ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="crud-button crud-button-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="crud-empty">Belum ada data dosen. Tambahkan data menggunakan tombol di atas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
