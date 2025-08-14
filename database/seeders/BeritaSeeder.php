<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        $beritas = [
            [
                'judul' => 'Peluncuran Program Magang Industri Terbaru',
                'isi' => 'Program magang industri terbaru telah resmi diluncurkan oleh Bursa Kerja Khusus (BKK) untuk membantu siswa mendapatkan pengalaman kerja di industri. Program ini akan berlangsung selama 6 bulan dan melibatkan lebih dari 50 perusahaan mitra.',
                'foto' => 'berita1.jpg',
                'slug' => 'peluncuran-program-magang-industri-terbaru',
                'user_id' => $admin->id
            ],
            [
                'judul' => 'Kerja Sama dengan 50 Perusahaan untuk Lowongan Kerja',
                'isi' => 'BKK telah menjalin kerja sama dengan 50 perusahaan untuk menyediakan lowongan kerja bagi lulusan. Kerja sama ini mencakup berbagai bidang seperti teknologi, manufaktur, dan jasa.',
                'foto' => 'berita2.jpg',
                'slug' => 'kerja-sama-dengan-50-perusahaan-untuk-lowongan-kerja',
                'user_id' => $admin->id
            ],
            [
                'judul' => 'Tips Sukses dalam Wawancara Kerja',
                'isi' => 'BKK memberikan tips sukses dalam wawancara kerja untuk membantu lulusan dalam menghadapi proses seleksi kerja. Tips ini mencakup persiapan mental, pengetahuan tentang perusahaan, dan teknik komunikasi.',
                'foto' => 'berita3.jpg',
                'slug' => 'tips-sukses-dalam-wawancara-kerja',
                'user_id' => $admin->id
            ],
            [
                'judul' => 'Panduan Membuat CV yang Menarik',
                'isi' => 'BKK memberikan panduan membuat CV yang menarik untuk membantu lulusan dalam membuat CV yang menarik perhatian pemberi kerja. Panduan ini mencakup format CV, isi CV, dan tips penulisan CV.',
                'foto' => 'berita4.jpg',
                'slug' => 'panduan-membuat-cv-yang-menarik',
                'user_id' => $admin->id
            ],
            [
                'judul' => 'Pelatihan Soft Skill untuk Lulusan',
                'isi' => 'BKK menyelenggarakan pelatihan soft skill untuk lulusan untuk membantu lulusan dalam meningkatkan kemampuan soft skill seperti komunikasi, kerja tim, dan kepemimpinan.',
                'foto' => 'berita5.jpg',
                'slug' => 'pelatihan-soft-skill-untuk-lulusan',
                'user_id' => $admin->id
            ]
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}
