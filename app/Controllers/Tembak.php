<?php

namespace App\Controllers;

class Tembak extends BaseController
{
    public function index()
    {
        // ============================================
        //  EDIT SEMUA TEKS DI BAWAH INI SESUAI CERITA KAMU
        // ============================================
        $data = [
            'namaCewek'  => 'Syifa',   // ganti nama dia
            'namaCowok'  => 'Noval',   // ganti nama kamu (buat closing message)

            // Isi surat, tiap elemen array = 1 paragraf yang muncul satu-satu
            'ceritaKita' => [
                'Aku nggak jago basa-basi, jadi aku coba cara lain buat ngomong ini.',
                'Dari semua obrolan random, ketawa garing, sama momen kecil yang kita lewatin bareng, ada satu hal yang makin lama makin jelas buat aku.',
                'Langit isinya jutaan bintang. Tapi entah kenapa, yang paling aku tungguin buat diceritain harinya cuma satu orang.',
                'Dan itu kamu.',
            ],

            'pertanyaan' => 'Maukah kamu jadi pacar aku?',
            'pesanIya'   => 'Makasih udah percaya sama momen kecil ini. Mulai sekarang, cerita hari kamu, biar aku yang dengerin duluan ya 🌠',
        ];

        return view('tembak', $data);
    }
}
