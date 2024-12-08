<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Tugas;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $tugas = Tugas::with('mataPelajaran')->get();
        // dd($tugas);
        return view('tugas.index', compact('tugas'));
    }

    public function create()
    {
        $mataPelajaran = MataPelajaran::all();
        // dd($mataPelajaran); // Assuming you have a MataPelajaran model
        return view('tugas.create', compact('mataPelajaran'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_deadline' => 'required|date',
            'file_tugas' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);

        if ($request->hasFile('file_tugas')) {
            $validated['file_tugas'] = $request->file('file_tugas')->store('tugas_files');
        }

        Tugas::create($validated);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);
        $mataPelajaran = MataPelajaran::all();
        return view('tugas.edit', compact('tugas', 'mataPelajaran'));
    }
    
    public function update(Request $request, $id)
    {
        $tugas = Tugas::findOrFail($id);
    
        $validated = $request->validate([
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_deadline' => 'required|date',
            'file_tugas' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);
    
        if ($request->hasFile('file_tugas')) {
            if ($tugas->file_tugas) {
                Storage::delete($tugas->file_tugas);
            }
            $validated['file_tugas'] = $request->file('file_tugas')->store('tugas_files');
        }
    
        $tugas->update($validated);
    
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diubah.');
    }
    
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
    
        if ($tugas->file_tugas) {
            Storage::delete($tugas->file_tugas);
        }
        $tugas->delete();
    
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
