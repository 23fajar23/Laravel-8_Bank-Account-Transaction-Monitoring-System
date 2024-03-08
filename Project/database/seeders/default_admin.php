<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class default_admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'          => 'admin',
                'fullname'      => 'admin123',
                'jenis_kelamin' => "laki-laki",
                'alamat'        => "-",
                'kota'          => "-",
                'no_hp'         => "-",
                'api_key'       => "-",
                'api_signature' => '-',
                'otoritas'      => "admin",
                'perusahaan'    => "-",
                'jabatan'       => "-",
                'notif_wa'      => "aktif",
                'saldo'         => "-",
                'status'        => 'aktif',
                'email'         => "admin@gmail.com",
                'password'      => Hash::make("12345678")
            ]
        );
    }
}
