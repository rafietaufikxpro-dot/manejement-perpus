<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\author;

class authorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = author::query()
            ->when($request->search, function ($query, $search) {
                $query->where('namaauthor', 'like', "%{$search}%");
            })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaauthor' => 'required|string|max:255',
        ]);

        author::create($validated);

        return redirect()->route('author.index')->with('success', 'Author berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('author.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = author::findOrFail($id);

        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = author::findOrFail($id);

        $validated = $request->validate([
            'namaauthor' => 'required|string|max:255',
        ]);

        $author->update($validated);

        return redirect()->route('author.index')->with('success', 'Author berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = author::findOrFail($id);

        if ($author->bukus()->exists()) {
            return redirect()->route('author.index')
                ->with('error', 'Author tidak bisa dihapus karena masih memiliki data buku.');
        }

        $author->delete();

        return redirect()->route('author.index')->with('success', 'Author berhasil dihapus.');
    }
}
