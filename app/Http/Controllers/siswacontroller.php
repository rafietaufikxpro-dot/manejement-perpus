<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\kelas;

class siswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswas = siswa::with('kelas')
            ->when($request->search, function ($query, $search) {
                $query->where('namasiswa', 'like', "%{$search}%")
                      ->orWhere('nis', 'like', "%{$search}%");
            })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = kelas::orderBy('nama_kelas')->get();

        return view('siswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namasiswa' => 'required|string|max:255',
            'nis' => 'required|string|max:50|unique:App\Models\siswa,nis',
            'kelas_id' => 'required|exists:App\Models\kelas,id',
        ]);

        siswa::create($validated);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('siswa.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = siswa::findOrFail($id);
        $kelas = kelas::orderBy('nama_kelas')->get();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = siswa::findOrFail($id);

        $validated = $request->validate([
            'namasiswa' => 'required|string|max:255',
            'nis' => 'required|string|max:50|unique:App\Models\siswa,nis,' . $siswa->id,
            'kelas_id' => 'required|exists:App\Models\kelas,id',
        ]);

        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
