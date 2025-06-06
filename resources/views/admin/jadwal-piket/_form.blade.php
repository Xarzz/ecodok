
@php
    $isEdit = isset($isEdit) && $isEdit === true;
@endphp

<div class="bg-white p-6 rounded-lg shadow-md w-full max-w-3xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">
        {{ $isEdit ? 'Edit Jadwal Piket' : 'Tambah Jadwal Piket' }}
    </h2>

<form action="{{ $isEdit ? route('jadwal-piket.update', $jadwal->id) : route('jadwal-piket.store') }}" method="POST">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif


        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
            <input type="date" name="tanggal" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('tanggal', $jadwal->tanggal ?? '') }}">
            @error('tanggal')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="kategori" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Kategori --</option>
                @foreach (['Siraman', 'cek_kebersihan', 'buang_sampah'] as $kategori)
                    <option value="{{ $kategori }}" {{ old('kategori', $jadwal->kategori ?? '') == $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
            <select name="kelas_id" class="w-full p-2 border rounded" required
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
                @endforeach
            </select>
            @error('kelas_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
            <input type="text" name="lokasi" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('lokasi', $jadwal->lokasi ?? '') }}">
            @error('lokasi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Link Dokumentasi (Opsional)</label>
            <input type="url" name="dokumentasi"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('dokumentasi', $jadwal->dokumentasi ?? '') }}">
            @error('dokumentasi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Sudah" {{ old('status', $jadwal->status ?? '') == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                <option value="Belum" {{ old('status', $jadwal->status ?? '') == 'Belum' ? 'selected' : '' }}>Belum</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-2 flex space-x-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                {{ $isEdit ? 'Update Jadwal' : 'Simpan Jadwal' }}
            </button>
            <a href="{{ route('jadwal-piket.index') }}"
               class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                Kembali
            </a>
        </div>
    </form>
</div>
