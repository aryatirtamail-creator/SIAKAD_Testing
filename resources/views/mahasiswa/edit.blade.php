@extends('layouts.app')

@section('title', 'Edit Mahasiswa')
@section('heading', 'EDIT MAHASISWA')

@section('content')
<div class="crud-form-page">
    <div class="crud-form-heading">
        <h2>Edit Data Mahasiswa</h2>
        <p>Perbarui informasi mahasiswa, lalu simpan perubahan.</p>
    </div>

    @if ($errors->any())
        <div class="crud-alert crud-alert-error" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" class="crud-form">
        @csrf
        @method('PUT')
        <div class="crud-field">
            <label for="nim">NIM</label>
            <input id="nim" name="nim" type="text" value="{{ old('nim', $mahasiswa->nim) }}" required maxlength="255" autocomplete="off">
        </div>
        <div class="crud-field">
            <label for="nama">Nama Mahasiswa</label>
            <input id="nama" name="nama" type="text" value="{{ old('nama', $mahasiswa->nama) }}" required minlength="3" maxlength="255">
        </div>
        <div class="crud-field">
            <label for="prodi">Program Studi</label>
            <input id="prodi" name="prodi" type="text" value="{{ old('prodi', $mahasiswa->prodi) }}" required maxlength="255">
        </div>
        <div class="crud-field">
            <label for="angkatan">Angkatan</label>
            <input id="angkatan" name="angkatan" type="text" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required maxlength="255" inputmode="numeric">
        </div>
        <div class="crud-form-actions">
            <a href="{{ route('mahasiswa.index') }}" class="crud-button crud-button-secondary">Batal</a>
            <button type="submit" class="crud-button crud-button-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
