<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FonnteService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('FONNTE_API_KEY');
        $this->apiUrl = env('FONNTE_API_URL');
    }

    public function sendMessage($phone, $message, $file = null)
    {
        $payload = [
            'target' => $phone,
            'message' => $message,
        ];

        if ($file) {
            $payload['file'] = $file; // URL file jika ada
        }

        $response = Http::withHeaders([
            'Authorization' => $this->apiKey,
        ])->post($this->apiUrl, $payload);

        return $response->json(); // Mengembalikan response dari API
    }
}
