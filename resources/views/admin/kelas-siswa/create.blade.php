@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-xl shadow-lg p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Tambah Siswa Baru</h3>

    @include('admin.kelas-siswa._form')
</div>
@endsection
