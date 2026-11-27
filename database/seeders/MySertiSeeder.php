<?php

// Data contoh untuk mencoba tampilan backend.
// Akun uji (sudah terverifikasi email):
//   email    : demo@myserti.test   (atau username: demo)
//   password : password123

namespace Database\Seeders;

use App\Models\Certificates;
use App\Models\DetailsCertificate;
use App\Models\Member;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class MySertiSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(['email' => 'demo@myserti.test'], [
            'name' => 'Demo MySerti',
            'username' => 'demo',
            'password' => 'password123',
        ]);
        $user->forceFill(['email_verified_at' => now()])->save();

        $org = Organization::updateOrCreate(['Kode' => 'hmti2026demo'], ['Nama' => 'HMTI Kampus']);
        Member::updateOrCreate(['id_User' => $user->id, 'id_Organisasi' => $org->id], ['role' => 'Owner']);

        $cert = Certificates::updateOrCreate(['id_Organisasi' => $org->id, 'Judul' => 'Seminar Nasional 2026'], ['is_Premium' => false]);
        foreach (['Budi Santoso', 'Siti Aminah', 'Andi Pratama'] as $i => $nama) {
            DetailsCertificate::updateOrCreate(
                ['id_Sertifikat' => $cert->id, 'NomorSertifikat' => sprintf('SN26-%03d', $i + 1)],
                ['NamaPenerima' => $nama]
            );
        }
    }
}
