<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;

class kelascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelas = kelas::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_kelas', 'like', "%{$search}%")
                      ->orWhere('tingkat', 'like', "%{$search}%");
            })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|string|max:50',
        ]);

        kelas::create($validated);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('kelas.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kela = kelas::findOrFail($id);

        return view('kelas.edit', ['kela' => $kela]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kela = kelas::findOrFail($id);

        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|string|max:50',
        ]);

        $kela->update($validated);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kela = kelas::findOrFail($id);

        if ($kela->siswas()->exists()) {
            return redirect()->route('kelas.index')
                ->with('error', 'Kelas tidak bisa dihapus karena masih memiliki data siswa.');
        }

        $kela->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
