@extends('layouts.app')

@section('title', 'Edit Dosen')
@section('heading', 'EDIT DOSEN')

@section('content')
<div class="crud-form-page">
    <div class="crud-form-heading">
        <h2>Edit Data Dosen</h2>
        <p>Perbarui informasi dosen, lalu simpan perubahan.</p>
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

    <form action="{{ route('dosen.update', $dosen) }}" method="POST" class="crud-form">
        @csrf
        @method('PUT')
        <div class="crud-field">
            <label for="nidn">NIDN</label>
            <input id="nidn" name="nidn" type="text" value="{{ old('nidn', $dosen->nidn) }}" required maxlength="255" autocomplete="off">
        </div>
        <div class="crud-field">
            <label for="nama">Nama Dosen</label>
            <input id="nama" name="nama" type="text" value="{{ old('nama', $dosen->nama) }}" required minlength="3" maxlength="255">
        </div>
        <div class="crud-field">
            <label for="bidang_keahlian">Bidang Keahlian</label>
            <input id="bidang_keahlian" name="bidang_keahlian" type="text" value="{{ old('bidang_keahlian', $dosen->bidang_keahlian) }}" required maxlength="255">
        </div>
        <div class="crud-form-actions">
            <a href="{{ route('dosen.index') }}" class="crud-button crud-button-secondary">Batal</a>
            <button type="submit" class="crud-button crud-button-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
