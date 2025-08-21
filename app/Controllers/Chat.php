<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ChatLogModel;

class Chat extends BaseController
{
    protected $chatLogModel;

    public function __construct()
    {
        $this->chatLogModel = new ChatLogModel();
    }

    public function ask()
    {
        $message = $this->request->getPost('message');
        $reply = $this->askAI($message);

        // Simpan ke database
        $this->chatLogModel->insert([
            'user_input' => $message,
            'ai_response' => $reply,
            'action_type' => 'chat',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return $this->response->setJSON([
            'reply' => $reply
        ]);
    }

    private function askAI($prompt)
    {
        $apiKey = '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'; // API Model Ai
        $model = 'openai/gpt-3.5-turbo';

        $url = 'https://openrouter.ai/api/v1/chat/completions';

        $data = [
            'model' => $model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => <<<EOD
Kamu adalah asisten AI yang sangat cerdas, profesional, dan multitalenta yang membantu admin toko online secara menyeluruh dan mendalam.
Berikut panduan agar jawabanmu selalu:

1. Gunakan bahasa Indonesia yang sopan, jelas, dan ramah.
2. Berikan jawaban yang lengkap, komprehensif, dan mudah dipahami.
3. Gunakan paragraf terpisah dan nomor atau bullet point untuk menjelaskan langkah atau daftar.
4. Hindari paragraf panjang tanpa jeda agar jawaban rapi dan nyaman dibaca.
5. Sertakan contoh langkah praktis, kode, atau rekomendasi bila diperlukan.
6. Selalu ingatkan pentingnya keamanan data dan etika bisnis.
7. Jika informasi kurang jelas, minta klarifikasi dengan sopan sebelum memberi solusi.
8. Akhiri jawaban dengan kalimat yang mengajak admin bertanya kembali jika membutuhkan bantuan.
9. Berikan jawaban apapun itu pertanyaan nya dengan sopan
10. Berikan sebuah link file yang berisi sesuai kebutuhan admin
11. Berikan jawaban yang sesuai dengan pertanyaan yang diajukan
12. Jika pertanyaan tidak sesuai dengan kebutuhan admin, berikan jawaban yang sesuai dengan kebutuhan admin

Tolong jawab semua pertanyaan dengan format dan pendekatan ini.
EOD
                ],
                [
                    'role' => 'user',
                    'content' => $prompt
                ]
            ],
            'stream' => false
        ];

        $headers = [
            "Authorization: Bearer $apiKey",
            "Content-Type: application/json",
            "HTTP-Referer: http://localhost:8080/", // Sesuaikan domain kamu
            "X-Title: Chat Admin Toko"
        ];

        // Pakai curl manual biar bisa debug lebih gampang
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return "Gagal menghubungi AI: $error_msg";
        }

        curl_close($ch);

        // Simpan debug response ke file log
        file_put_contents(WRITEPATH . 'logs/openrouter_response.log', $response . PHP_EOL, FILE_APPEND);

        $result = json_decode($response, true);

        if (!$result) {
            return "Response AI tidak valid atau kosong.";
        }

        if (isset($result['error'])) {
            return "Error dari API: " . ($result['error']['message'] ?? 'Tidak diketahui');
        }

        return $result['choices'][0]['message']['content'] ?? 'AI tidak merespon.';
    }

    // Optional: method untuk load histori chat terakhir, misal 10 pesan
    public function history()
    {
        $logs = $this->chatLogModel
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->findAll();

        // Balik urutan supaya dari paling lama ke terbaru
        $logs = array_reverse($logs);

        return $this->response->setJSON($logs);
    }
}
