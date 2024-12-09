<?php

namespace App\Http\Controllers;

use App\Services\FonnteService;
use Illuminate\Http\Request;

class FonnteController extends Controller
{
    protected $fonnteService;

    public function __construct(FonnteService $fonnteService)
    {
        $this->fonnteService = $fonnteService;
    }

    public function showForm()
    {
        // Menampilkan halaman form HTML
        return view('send-message');
    }

    public function sendMessage(Request $request)
    {
        // Validasi input
        $request->validate([
            'message' => 'required|string|max:1000', // Maksimal 1000 karakter
            'file' => 'nullable|url', // URL file opsional
        ]);

        // Nomor telepon tetap (hardcoded)
        $phone = '6282251602866'; // Nomor penerima dalam format internasional
        $message = $request->input('message'); // Pesan dari input form
        $file = $request->input('file', null); // URL file opsional

        try {
            // Kirim pesan melalui FonnteService
            $response = $this->fonnteService->sendMessage($phone, $message, $file);

            // Cek respons dan arahkan kembali dengan pesan
            if ($response['status'] === true) {
                return redirect('/send-message')->with('success', 'Pesan berhasil dikirim!');
            } else {
                return redirect('/send-message')->with('error', 'Gagal mengirim pesan: ' . ($response['detail'] ?? 'Tidak ada detail error.'));
            }
        } catch (\Exception $e) {
            // Tangani error jika ada
            return redirect('/send-message')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
