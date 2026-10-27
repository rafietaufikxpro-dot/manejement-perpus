<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $bukus = buku::with(['author', 'kategori'])
            ->when($request->search, fn ($q, $s) => $q->where('judulbuku', 'like', "%{$s}%"))
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return response()->json($bukus);
    }
}