@extends('layouts.app')

@section('title', 'Tambah Dosen')
@section('heading', 'TAMBAH DOSEN')

@section('content')
<div class="crud-form-page">
    <div class="crud-form-heading">
        <h2>Data Dosen Baru</h2>
        <p>Lengkapi informasi dosen di bawah ini.</p>
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

    <form action="{{ route('dosen.store') }}" method="POST" class="crud-form">
        @csrf
        <div class="crud-field">
            <label for="nidn">NIDN</label>
            <input id="nidn" name="nidn" type="text" value="{{ old('nidn') }}" required maxlength="255" autocomplete="off">
        </div>
        <div class="crud-field">
            <label for="nama">Nama Dosen</label>
            <input id="nama" name="nama" type="text" value="{{ old('nama') }}" required minlength="3" maxlength="255">
        </div>
        <div class="crud-field">
            <label for="bidang_keahlian">Bidang Keahlian</label>
            <input id="bidang_keahlian" name="bidang_keahlian" type="text" value="{{ old('bidang_keahlian') }}" required maxlength="255">
        </div>
        <div class="crud-form-actions">
            <a href="{{ route('dosen.index') }}" class="crud-button crud-button-secondary">Batal</a>
            <button type="submit" class="crud-button crud-button-primary">Simpan Dosen</button>
        </div>
    </form>
</div>
@endsection
