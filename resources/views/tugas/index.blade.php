<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Tugas</h1>
            <a href="{{ route('tugas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Tambah Tugas</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-gray-100">
                    <tr class="text-left">
                        <th class="px-4 py-2 text-gray-600 font-medium">No</th>
                        <th class="px-4 py-2 text-gray-600 font-medium">Mata Pelajaran</th>
                        <th class="px-4 py-2 text-gray-600 font-medium">Judul</th>
                        <th class="px-4 py-2 text-gray-600 font-medium">Deskripsi</th>
                        <th class="px-4 py-2 text-gray-600 font-medium">Deadline</th>
                        <th class="px-4 py-2 text-gray-600 font-medium">File</th>
                        <th class="px-4 py-2 text-gray-600 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugas as $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $item->mataPelajaran->nama_pelajaran }}</td>
                            <td class="px-4 py-2">{{ $item->judul_tugas }}</td>
                            <td class="px-4 py-2">{{ $item->deskripsi }}</td>
                            <td class="px-4 py-2">{{ $item->tanggal_deadline }}</td>
                            <td class="px-4 py-2">
                                @if ($item->file_tugas)
                                    <a href="{{ Storage::url($item->file_tugas) }}" target="_blank" class="text-blue-500 hover:underline">Download</a>
                                @else
                                    <span class="text-gray-500">Tidak ada file</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('tugas.edit', $item) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-200">Edit</a>
                                <form action="{{ route('tugas.destroy', $item) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
