<?php

namespace App\Controllers;

class Tembak extends BaseController
{
    public function index()
    {
        // ============================================================
        //  EDIT SEMUA TEKS DI BAWAH INI SESUAI CERITA KAMU
        // ============================================================
        $data = [
            'namaCewek'  => 'Syifa',
            'namaCowok'  => 'Noval',

            // Stage 2 — Surat: muncul satu per satu dengan animasi mengetik
            'ceritaKita' => [
                'Aku nggak pernah nyangka...',
                'Kalau orang yang dulu cuma jadi bagian kecil dari masa kecilku, suatu hari nanti bisa jadi alasan kenapa aku kembali percaya sama yang namanya perasaan.',
                'Lucu ya...',
                'Dari sekian banyak orang di dunia, ternyata kita pernah saling kenal bahkan sebelum kita ngerti apa itu rasa suka.',
                'Dulu kita cuma dua anak kecil yang kebetulan ada di sekolah yang sama.',
                'Lalu waktu berjalan.',
                'Kita tumbuh.',
                'Punya jalan hidup masing-masing.',
                'Dan semesta membawa kita ke arah yang berbeda.',
                'Sampai akhirnya...',
                'Semesta mempertemukan kita lagi.',
                'Jujur...',
                'Sebelum kita ngobrol lagi, aku sempat ada di fase di mana hati ini rasanya udah lama membeku.',
                'Aku tetap ketemu banyak orang.',
                'Bahkan ada beberapa yang bisa dibilang cocok diajak ngobrol.',
                'Tapi entah kenapa...',
                'Nggak pernah ada rasa yang benar-benar tumbuh.',
                'Aku mulai percaya kalau mungkin...',
                'Hatiku memang udah nggak bisa jatuh cinta lagi.',
                'Sampai akhirnya...',
                'Kamu datang lagi.',
                'Pelan-pelan...',
                'Tanpa kamu sadar...',
                'Kamu bikin sesuatu yang selama ini terasa dingin mulai hangat lagi.',
                'Kamu bikin aku nungguin chat.',
                'Kamu bikin aku senyum sendiri.',
                'Dan untuk pertama kalinya setelah sekian lama...',
                'Aku ngerasa nyaman buat membuka hati lagi.',
                'Mungkin kamu nggak sadar.',
                'Tapi buatku...',
                'Kamu berhasil melakukan sesuatu yang selama ini nggak bisa dilakukan siapa pun.',
                'Kamu mencairkan hati yang sempat membeku.',
                'Dan sejak itu...',
                'Orang yang paling pengen aku ceritain tentang hariku...',
                'selalu kamu.',
            ],

            // Stage 3 — Konfesi: muncul sebelum pilihan
            'konfesiKita' => [
                'Aku nggak bikin website ini cuma karena iseng.',
                'Aku juga nggak bikin ini buat sekadar nunjukin kalau aku bisa ngoding.',
                'Aku bikin ini...',
                'Karena ada sesuatu yang udah lama pengen aku sampaikan.',
                'Selama ini aku selalu percaya...',
                'Kalau perasaan yang tulus itu sebaiknya diungkapkan.',
                'Bukan dipendam sampai akhirnya jadi penyesalan.',
                'Jadi...',
                'Hari ini aku memilih jujur.',
                'Aku suka sama kamu.',
                'Bukan karena kita pernah satu sekolah.',
                'Bukan juga karena kita punya masa kecil yang sama.',
                'Tapi karena...',
                'Di saat aku hampir percaya kalau aku nggak akan bisa membuka hati lagi...',
                'Kamu datang.',
                'Dan membuat semuanya terasa hangat kembali.',
                'Aku nggak tahu...',
                'Cerita kita nanti bakal seperti apa.',
                'Aku juga nggak minta kamu menjawab karena merasa nggak enakan.',
                'Aku cuma berharap...',
                'Kalau memang kamu merasakan hal yang sama...',
                'Maukah kamu berjalan bersamaku?',
                'Bukan untuk hubungan yang sempurna.',
                'Tapi untuk hubungan yang saling belajar, saling memahami, dan saling pulang.',
            ],

            // Stage 5 — Pesan setelah dia bilang iya
            'pesanIya' => [
                'Kalau kamu lagi membaca halaman ini...',
                'Artinya...',
                'Aku sekarang punya alasan baru untuk tersenyum.',
                'Terima kasih...',
                'Karena hari ini...',
                'Kamu nggak cuma menerima perasaanku.',
                'Tapi juga menerima seseorang...',
                'Yang sempat kehilangan keberanian untuk jatuh cinta lagi.',
                'Aku nggak janji bakal selalu jadi orang yang sempurna.',
                'Aku juga nggak janji hubungan kita nanti bakal selalu mudah.',
                'Karena aku tahu...',
                'Hubungan yang baik bukan hubungan yang nggak pernah punya masalah.',
                'Tapi hubungan yang memilih tetap saling menggenggam, bahkan ketika keadaan sedang nggak mudah.',
                'Yang bisa aku janjikan cuma satu.',
                'Aku akan terus belajar.',
                'Belajar jadi pendengar yang baik.',
                'Belajar jadi seseorang yang bisa kamu percaya.',
                'Belajar menghargai setiap cerita, tawa, dan air mata yang nanti kita lewati bersama.',
                'Aku berharap...',
                'Semoga hari ini bukan akhir dari sebuah cerita.',
                'Melainkan...',
                'Halaman pertama dari kisah panjang yang akan kita tulis bersama.',
                'Terima kasih...',
                'Sudah membuat hati yang sempat membeku...',
                'Akhirnya hangat kembali.',
                'Dan terima kasih...',
                'Sudah memilih untuk berjalan bersamaku.',
                'Dengan sepenuh hati,',
                'Noval 🩵',
            ],
        ];

        return view('tembak', $data);
    }
}
