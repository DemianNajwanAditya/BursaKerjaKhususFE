<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'user_id'     => 1, // Pastikan user dengan ID 1 ada di tabel users
            'name'        => 'PT Maju Jaya',
            'address'     => 'Jl. Merdeka No. 45, Bandung',
            'website'     => 'https://www.majujaya.com',
            'description' => 'Perusahaan yang bergerak di bidang teknologi informasi.',
            'logo'        => 'logos/majujaya.png'
        ]);

        Company::create([
            'user_id'     => 2,
            'name'        => 'CV Kreatif Solusi',
            'address'     => 'Jl. Diponegoro No. 20, Jakarta',
            'website'     => 'https://www.kreatifsolusi.com',
            'description' => 'Menyediakan jasa desain grafis dan branding.',
            'logo'        => 'logos/kreatifsolusi.png'
        ]);
    }
}
