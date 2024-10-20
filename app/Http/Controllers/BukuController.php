<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return Buku::with('kategori')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $buku = Buku::create($request->all());
        return response()->json($buku, 201);
    }

    public function show($id)
    {
        $buku = Buku::find($id);

        // Jika buku tidak ditemukan, return 404
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        return response()->json($buku);
    }

    // PUT: Update buku berdasarkan ID
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        // Jika buku tidak ditemukan, return 404
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric|min:1000',
            'stok' => 'required|integer',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        // Update data buku
        $buku->update($request->all());

        return response()->json($buku);
    }

    // DELETE: Hapus buku berdasarkan ID
    public function destroy($id)
    {
        $buku = Buku::find($id);

        // Jika buku tidak ditemukan, return 404
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        // Hapus buku
        $buku->delete();

        return response()->json(['message' => 'Buku berhasil dihapus']);
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input pencarian
        $bukus = Buku::where('judul', 'LIKE', "%{$query}%")->get(); // Ganti 'judul' dengan kolom yang sesuai

        return response()->json($bukus); // Kembalikan hasil dalam format JSON
    }
}