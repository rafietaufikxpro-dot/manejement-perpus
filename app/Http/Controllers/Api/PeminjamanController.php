<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'buku_id' => 'required|integer|exists:bukus,id',
        ]);

        return DB::transaction(function () use ($data, $request) {
            $buku = buku::lockForUpdate()->findOrFail($data['buku_id']);

            if ($buku->jumlahbuku < 1) {
                return response()->json(['message' => 'Stok buku habis.'], 422);
            }

            $buku->decrement('jumlahbuku');

            $pinjam = peminjaman::create([
                'user_id' => $request->user()->id,
                'buku_id' => $buku->id,
                'tanggal_pinjam' => now()->toDateString(),
                'status' => 'dipinjam',
            ]);

            return response()->json($pinjam->load('buku'), 201);
        });
    }
}