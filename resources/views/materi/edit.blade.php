<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Materi') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Materi</h1>

        <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="mata_pelajaran_id" class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                <select id="mata_pelajaran_id" name="mata_pelajaran_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @foreach ($mataPelajarans as $mp)
                        <option value="{{ $mp->id }}" {{ $mp->id == $materi->mata_pelajaran_id ? 'selected' : '' }}>
                            {{ $mp->nama_pelajaran }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="nama_materi" class="block text-sm font-medium text-gray-700">Nama Materi</label>
                <input type="text" name="nama_materi" id="nama_materi" value="{{ $materi->nama_materi }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <label for="file_materi" class="block text-sm font-medium text-gray-700">File Materi</label>
                <input type="file" name="file_materi" id="file_materi" class="mt-1 block w-full">
                @if ($materi->file_materi)
                    <p class="mt-2 text-sm text-gray-500">File saat ini: <a href="{{ asset('storage/' . $materi->file_materi) }}" target="_blank" class="text-blue-500 underline">Download</a></p>
                @endif
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Simpan</button>
                <a href="{{ route('materi.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
