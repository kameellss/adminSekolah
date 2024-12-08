<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $mataPelajaran = MataPelajaran::all();
        // dd($mataPelajaran);
        return view('mata_pelajaran.index', compact('mataPelajaran'));
    }

    public function create()
    {
        return view('mata_pelajaran.create');
    }

    public function store(Request $request)
    {
    
        $request->validate(['nama_pelajaran' => 'required|string|max:255']);
        MataPelajaran::create([
            'nama_pelajaran' => $request->nama_pelajaran,
        ]);
        return redirect()->route('mata-pelajaran.index')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function edit(MataPelajaran $mataPelajaran)
    {
        return view('mata_pelajaran.edit', compact('mataPelajaran'));
    }

    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        $request->validate(['nama_pelajaran' => 'required|string|max:255']);
        $mataPelajaran->update($request->all());
        return redirect()->route('mata-pelajaran.index')->with('success', 'Mata Pelajaran berhasil diperbarui.');
    }

    public function destroy(MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->delete();
        return redirect()->route('mata-pelajaran.index')->with('success', 'Mata Pelajaran berhasil dihapus.');
    }
}
