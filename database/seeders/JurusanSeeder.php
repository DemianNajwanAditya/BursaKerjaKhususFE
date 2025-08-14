<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $jurusans = [
            [
                'nama' => 'Teknik Komputer Jaringan',
                'icon' => 'tkj.png',
                'deskripsi' => 'Program studi yang mempelajari tentang perakitan komputer, instalasi jaringan, dan troubleshooting komputer.',
                'slug' => 'teknik-komputer-jaringan'
            ],
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'icon' => 'rpl.png',
                'deskripsi' => 'Program studi yang fokus pada pengembangan software, pemrograman, dan desain aplikasi.',
                'slug' => 'rekayasa-perangkat-lunak'
            ],
            [
                'nama' => 'Desain Komunikasi Visual',
                'icon' => 'dkv.png',
                'deskripsi' => 'Program studi yang mempelajari desain grafis, branding, dan komunikasi visual.',
                'slug' => 'desain-komunikasi-visual'
            ],
            [
                'nama' => 'Teknik Instalasi Tenaga Listrik',
                'icon' => 'titl.png',
                'deskripsi' => 'Program studi yang mempelajari instalasi listrik, perawatan sistem kelistrikan, dan keselamatan kerja.',
                'slug' => 'teknik-instalasi-tenaga-listrik'
            ],
            [
                'nama' => 'Teknik Audio Video',
                'icon' => 'tav.png',
                'deskripsi' => 'Program studi yang mempelajari sistem audio video, editing, dan produksi media.',
                'slug' => 'teknik-audio-video'
            ],
            [
                'nama' => 'Teknik Automasi Industri',
                'icon' => 'tai.png',
                'deskripsi' => 'Program studi yang mempelajari sistem kontrol industri, PLC, dan robotika.',
                'slug' => 'teknik-automasi-industri'
            ]
        ];

        foreach ($jurusans as $jurusan) {
            Jurusan::create($jurusan);
        }
    }
}
