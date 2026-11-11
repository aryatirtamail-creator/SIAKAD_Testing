@extends('layouts.app')

@section('title', 'Edit Mata Kuliah')
@section('heading', 'EDIT MATA KULIAH')

@section('content')
<div class="crud-form-page">
    <div class="crud-form-heading">
        <h2>Edit Data Mata Kuliah</h2>
        <p>Perbarui informasi mata kuliah, lalu simpan perubahan.</p>
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

    <form action="{{ route('matakuliah.update', $matakuliah) }}" method="POST" class="crud-form">
        @csrf
        @method('PUT')
        <div class="crud-field">
            <label for="kode_mk">Kode Mata Kuliah</label>
            <input id="kode_mk" name="kode_mk" type="text" value="{{ old('kode_mk', $matakuliah->kode_mk) }}" required maxlength="255" autocomplete="off">
        </div>
        <div class="crud-field">
            <label for="nama_mk">Nama Mata Kuliah</label>
            <input id="nama_mk" name="nama_mk" type="text" value="{{ old('nama_mk', $matakuliah->nama_mk) }}" required minlength="3" maxlength="255">
        </div>
        <div class="crud-field">
            <label for="sks">Jumlah SKS</label>
            <input id="sks" name="sks" type="number" value="{{ old('sks', $matakuliah->sks) }}" required min="1" max="6">
            <small>Jumlah SKS harus antara 1 dan 6.</small>
        </div>
        <div class="crud-form-actions">
            <a href="{{ route('matakuliah.index') }}" class="crud-button crud-button-secondary">Batal</a>
            <button type="submit" class="crud-button crud-button-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
