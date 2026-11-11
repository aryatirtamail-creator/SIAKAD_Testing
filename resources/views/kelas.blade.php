@extends('layouts.app')

@section('title', 'Data Kelas')
@section('heading', 'DAFTAR KELAS')

@section('content')
<div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 14px; padding: 18px;">
    <div style="font-size: 13px; font-weight: 600; color: #38bdf8; margin-bottom: 12px; display: flex; justify-content: space-between;">
        <span>Kelas / Ruangan</span>
        <span>Program Studi</span>
    </div>
    <div style="display: flex; flex-direction: column; gap: 8px;">
        <div style="display: flex; justify-content: space-between; padding: 12px; background: rgba(255,255,255,0.02); border-radius: 8px; font-size: 13px; color: #6b7280; font-style: italic; text-align: center; width: 100%;">
            <span style="width: 100%;">Belum ada data kelas...</span>
        </div>
    </div>
</div>
@endsection