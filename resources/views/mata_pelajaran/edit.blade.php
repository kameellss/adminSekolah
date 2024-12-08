<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Mata Pelajaran</h1>
        <form action="{{ route('mata-pelajaran.update', $mataPelajaran->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="nama_pelajaran" class="block text-gray-700 font-semibold mb-2">Nama Mata Pelajaran</label>
                <input type="text" name="nama_pelajaran" id="nama_pelajaran" 
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                       value="{{ old('nama_pelajaran', $mataPelajaran->nama_pelajaran) }}" required>
            </div>
    
            <div class="flex justify-between mt-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Simpan Perubahan</button>
                <a href="{{ route('mata-pelajaran.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-200">Batal</a>
            </div>
        </form>
    </div>
    
</body>
</html>

