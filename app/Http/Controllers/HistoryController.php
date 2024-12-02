<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai filter dari query parameter
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query data histori
        $histories = History::query();

        // Terapkan filter jika parameter tersedia
        if ($startDate) {
            $histories->whereDate('timestamp', '>=', $startDate);
        }

        if ($endDate) {
            $histories->whereDate('timestamp', '<=', $endDate);
        }

        // Ambil data dengan pagination
        $histories = $histories->paginate(10);

        // Kembalikan view dengan data histories
        return view('histories.index', compact('histories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'id_user' => 'required|integer',
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'timestamp' => 'required|date',
            'role' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        History::create($validated);

        return redirect()->route('histori.index')->with('success', 'Data berhasil ditambahkan.');
    }
}
