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
                'Aku nggak pernah nyangka...

                Kalau orang yang dulu cuma jadi bagian kecil dari masa kecilku, suatu hari nanti bisa jadi alasan kenapa aku kembali percaya sama yang namanya perasaan.

                Lucu ya...

                Dari sekian banyak orang di dunia, ternyata kita pernah saling kenal bahkan sebelum kita ngerti apa itu rasa suka.

                Dulu kita cuma dua anak kecil yang kebetulan ada di sekolah yang sama.

                Lalu waktu berjalan.

                Kita tumbuh.

                Punya jalan hidup masing-masing.

                Dan semesta membawa kita ke arah yang berbeda.

                Sampai akhirnya...

                Semesta mempertemukan kita lagi.

                Jujur...

                Sebelum kita ngobrol lagi, aku sempat ada di fase di mana hati ini rasanya udah lama membeku.

                Aku tetap ketemu banyak orang.

                Aku tetap kenalan sama beberapa perempuan.

                Bahkan ada beberapa yang bisa dibilang cocok diajak ngobrol.

                Tapi entah kenapa...

                Nggak pernah ada rasa yang benar-benar tumbuh.

                Aku mulai percaya kalau mungkin...

                Hatiku memang udah nggak bisa jatuh cinta lagi.

                Sampai akhirnya...

                Kamu datang lagi.

                Pelan-pelan...

                Tanpa kamu sadar...

                Kamu bikin sesuatu yang selama ini terasa dingin mulai hangat lagi.

                Kamu bikin aku nungguin chat.

                Kamu bikin aku senyum sendiri.

                Dan untuk pertama kalinya setelah sekian lama...

                Aku ngerasa nyaman buat membuka hati lagi.

                Mungkin kamu nggak sadar.

                Tapi buatku...

                Kamu berhasil melakukan sesuatu yang selama ini nggak bisa dilakukan siapa pun.

                Kamu mencairkan hati yang sempat membeku.

                Dan sejak itu...

                Orang yang paling pengen aku ceritain tentang hariku...

                selalu kamu.',
            ],

            'pertanyaan' => 'Maukah kamu jadi pacar aku?',
            'pesanIya'   => 'Makasih udah percaya sama momen kecil ini. Mulai sekarang, cerita hari kamu, biar aku yang dengerin duluan ya 🌠',
        ];

        return view('tembak', $data);
    }
}
