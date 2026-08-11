<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\author;
use App\Models\kategori;

class bukucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bukus = buku::with(['author', 'kategori'])
            ->when($request->search, function ($query, $search) {
                $query->where('judulbuku', 'like', "%{$search}%");
            })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('buku.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = author::orderBy('namaauthor')->get();
        $kategoris = kategori::orderBy('namakategori')->get();

        return view('buku.create', compact('authors', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judulbuku' => 'required|string|max:255',
            'author_id' => 'required|exists:App\Models\author,id',
            'kategori_id' => 'required|exists:App\Models\kategori,id',
            'jumlahbuku' => 'required|integer|min:0',
        ]);

        buku::create($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('buku.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = buku::findOrFail($id);
        $authors = author::orderBy('namaauthor')->get();
        $kategoris = kategori::orderBy('namakategori')->get();

        return view('buku.edit', compact('buku', 'authors', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = buku::findOrFail($id);

        $validated = $request->validate([
            'judulbuku' => 'required|string|max:255',
            'author_id' => 'required|exists:App\Models\author,id',
            'kategori_id' => 'required|exists:App\Models\kategori,id',
            'jumlahbuku' => 'required|integer|min:0',
        ]);

        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
