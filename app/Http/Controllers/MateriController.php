<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Materi;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $materis = Materi::with('mataPelajaran')->get();
    
        return view('materi.index', compact('materis'));
    }

    public function create()
    {
        $mataPelajarans = MataPelajaran::all();
        return view('materi.create', compact('mataPelajarans'));
    }

    public function store(Request $request)
    {
    
 
        $request->validate([
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'nama_materi' => 'required|string|max:255',
            'file_materi' => 'required|file',
        ]);


        $filePath = $request->file('file_materi') ? $request->file('file_materi')->store('materi') : null;

        Materi::create([
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'nama_materi' => $request->nama_materi,
            'file_materi' => $filePath,
        ]);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function edit(Materi $materi)
    {
        $mataPelajarans = MataPelajaran::all();
        return view('materi.edit', compact('materi', 'mataPelajarans'));
    }

    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'nama_materi' => 'required|string|max:255',
            'file_materi' => 'nullable|file|mimes:pdf,docx,pptx|max:2048',
        ]);

        if ($request->file('file_materi')) {
            $filePath = $request->file('file_materi')->store('materi');
            $materi->update(['file_materi' => $filePath]);
        }

        $materi->update($request->only('mata_pelajaran_id', 'nama_materi'));

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Materi $materi)
    {
        $materi->delete();
        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus.');
    }
}
