<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Tambahkan ini
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Method untuk mengambil semua data kategori
    public function index()
    {
        return response()->json(Kategori::all());
    }

    // Method untuk menyimpan data kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255', // Sesuaikan dengan kolom yang ada di tabel kategori
        ]);

        // Buat kategori baru
        $kategori = Kategori::create($validated);

        // Kembalikan response
        return response()->json($kategori, 201); // 201 Created
    }
}
