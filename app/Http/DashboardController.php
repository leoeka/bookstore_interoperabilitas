<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku; // Pastikan model yang sesuai

class DashboardController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Buku::where('judul', 'LIKE', "%{$query}%")->get(); // Sesuaikan model & kolom

        return view('dashboard.search', compact('query', 'results'));
    }
}
