@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Detail Siswa</h2>
    <div class="space-y-2">
        <p><strong>Nama:</strong> {{ $siswa->name }}</p>
        <p><strong>Email:</strong> {{ $siswa->email }}</p>
        <p><strong>Kelas:</strong> {{ $siswa->kelas->nama ?? '-' }}</p>
        <p><strong>Role:</strong> {{ ucfirst($siswa->role) }}</p>
    </div>
    <div class="mt-4">
        <a href="{{ route('kelas-siswa.index') }}" class="text-blue-600 hover:underline">Kembali</a>
    </div>
</div>
@endsection
