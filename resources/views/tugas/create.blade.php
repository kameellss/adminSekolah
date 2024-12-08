<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Tambah Tugas</h1>
        <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg">
            @csrf

            <div class="mb-4">
                <label for="mata_pelajaran_id" class="block text-gray-700 font-medium mb-2">Mata Pelajaran</label>
                <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    @foreach($mataPelajaran as $mp)
                        <option value="{{ $mp->id }}">{{ $mp->nama_pelajaran }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="judul_tugas" class="block text-gray-700 font-medium mb-2">Judul Tugas</label>
                <input type="text" name="judul_tugas" id="judul_tugas" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 h-40"></textarea>
            </div>

            <div class="mb-4">
                <label for="tanggal_deadline" class="block text-gray-700 font-medium mb-2">Tanggal Deadline</label>
                <input type="date" name="tanggal_deadline" id="tanggal_deadline" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="file_tugas" class="block text-gray-700 font-medium mb-2">File Tugas</label>
                <input type="file" name="file_tugas" id="file_tugas" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Simpan</button>
        </form>
    </div>
</x-app-layout>
