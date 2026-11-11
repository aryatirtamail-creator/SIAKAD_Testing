@extends('layouts.app')

@section('title', 'Data Mahasiswa')
@section('heading', 'DAFTAR MAHASISWA')

@section('content')
<div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 14px; padding: 18px;">
    <div style="font-size: 13px; font-weight: 600; color: #38bdf8; margin-bottom: 12px; display: flex; justify-content: space-between;">
        <span>Nama Mahasiswa</span>
        <span>NIM / Prodi</span>
    </div>
    <div style="display: flex; flex-direction: column; gap: 8px;">
        @forelse($mahasiswas as $mhs)
            <div style="display: flex; justify-content: space-between; padding: 10px 12px; background: rgba(255,255,255,0.02); border-radius: 8px; font-size: 13px;">
                <span style="color: #f3f4f6; font-weight: 500;">{{ $mhs->nama }}</span>
                <span style="color: #9ca3af;">{{ $mhs->nim }} // {{ $mhs->prodi }}</span>
            </div>
        @empty
            <div style="padding: 12px; text-align: center; color: #6b7280; font-style: italic;">
                Belum ada data mahasiswa di database...
            </div>
        @endforelse
    </div>
</div>
@endsection