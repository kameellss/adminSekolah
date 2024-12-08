<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Daftar Mata Pelajaran</h1>

        <!-- Form Tambah Mata Pelajaran -->
        <form method="POST" action="/dashboard/mata-pelajaran" class="mb-6 bg-white p-4 shadow rounded-lg">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="nama_pelajaran" placeholder="Nama Mata Pelajaran"
                       class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Tambah</button>
            </div>
        </form>

        <!-- Tabel Mata Pelajaran -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-lg rounded-lg">
                <thead>
                    <tr class="bg-blue-100 border-b">
                        <th class="px-4 py-2 text-left text-gray-600">No</th>
                        <th class="px-4 py-2 text-left text-gray-600">Nama</th>
                        <th class="px-4 py-2 text-center text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mataPelajaran as $pelajaran)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $pelajaran->nama_pelajaran }}</td>
                        <td class="px-4 py-2 text-center flex justify-center gap-2">
                            <a href="{{ route('mata-pelajaran.edit', $pelajaran) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-200">Edit</a>
                            <form action="{{ route('mata-pelajaran.destroy', $pelajaran) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
