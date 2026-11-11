@extends('layouts.app')

@section('title', 'Data Mata Kuliah')
@section('heading', 'DAFTAR MATA KULIAH')

@section('content')
<div class="crud-page">
    <div class="crud-toolbar">
        <p class="crud-description">Kelola daftar mata kuliah dan jumlah SKS.</p>
        <a href="{{ route('matakuliah.create') }}" class="crud-button crud-button-primary">+ Tambah Mata Kuliah</a>
    </div>

    @if (session('success'))
        <div class="crud-alert crud-alert-success" role="status">{{ session('success') }}</div>
    @endif

    <div class="crud-table-wrap">
        <table class="crud-table">
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th class="crud-actions-heading">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matakuliahs as $matakuliah)
                    <tr>
                        <td class="crud-code">{{ $matakuliah->kode_mk }}</td>
                        <td class="crud-primary-text">{{ $matakuliah->nama_mk }}</td>
                        <td>{{ $matakuliah->sks }} SKS</td>
                        <td>
                            <div class="crud-actions">
                                <a href="{{ route('matakuliah.edit', $matakuliah) }}" class="crud-button crud-button-edit">Edit</a>
                                <form action="{{ route('matakuliah.destroy', $matakuliah) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="crud-button crud-button-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="crud-empty">Belum ada data mata kuliah. Tambahkan data menggunakan tombol di atas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
