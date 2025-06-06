@php
    $isEdit = isset($siswa);
@endphp

<div class="bg-white p-6 rounded-lg shadow-md w-full max-w-3xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">{{ $isEdit ? 'Edit Siswa' : 'Tambah Siswa' }}</h2>

    <form action="{{ $isEdit ? route('kelas-siswa.update', $siswa->id) : route('kelas-siswa.store') }}" method="POST" class="space-y-4">
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="name" id="name" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('name', $siswa->name ?? '') }}">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('email', $siswa->email ?? '') }}">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
            <select name="kelas_id" id="kelas_id" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelasList as $kelas)
                    <option value="{{ $kelas->id }}" {{ old('kelas_id', $siswa->kelas_id ?? '') == $kelas->id ? 'selected' : '' }}>
                        {{ $kelas->nama }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" id="password" {{ $isEdit ? '' : 'required' }}
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @if ($isEdit)
                <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
            @endif
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2 pt-2">
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                {{ $isEdit ? 'Update Siswa' : 'Simpan Siswa' }}
            </button>
            <a href="{{ route('kelas-siswa.index') }}"
               class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                Kembali
            </a>
        </div>
    </form>
</div>
