@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Jadwal Piket</h1>

    <div class="bg-white p-6 rounded shadow">
        @php $isEdit = true; @endphp
      @include('admin.jadwal-piket._form', ['jadwal' => $jadwal, 'kelas' => $kelas])
    </div>
@endsection
