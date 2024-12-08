<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Materi') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Materi</h1>
            <a href="{{ route('materi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                Tambah Materi
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Mata Pelajaran</th>
                        <th class="px-6 py-3 text-left">Nama Materi</th>
                        <th class="px-6 py-3 text-left">File Materi</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materis as $materi)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $materi->mataPelajaran->nama_pelajaran }}</td>
                            <td class="px-6 py-4">{{ $materi->nama_materi }}</td>
                            <td class="px-6 py-4">
                                @if ($materi->file_materi)
                                    <a href="{{asset('storage/' . $materi->file_materi) }}" target="_blank" class="text-blue-500 underline">Download</a>
                                @else
                                    <span class="text-gray-500">Tidak Ada</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('materi.edit', $materi->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded-lg shadow hover:bg-yellow-500">Edit</a>
                                <form action="{{ route('materi.destroy', $materi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
