<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class default_bank extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_deposits')->insert(
            [
                'service'           => 'BCA',
                'no_rekening'       => '0',
                'nama_rekening'     => '-',
                'company_id'        => '-',
                'username_ibank'    => "-",
                'password_ibank'    => "-",
                'status'            => "tidak_aktif",
                'mutasi'            => "baru"
            ]
        );

        DB::table('bank_deposits')->insert(
            [
                'service'           => 'BRI',
                'no_rekening'       => '0',
                'nama_rekening'     => '-',
                'company_id'        => '-',
                'username_ibank'    => "-",
                'password_ibank'    => "-",
                'status'            => "tidak_aktif",
                'mutasi'            => "baru"
            ]
        );

        DB::table('bank_deposits')->insert(
            [
                'service'           => 'BNI',
                'no_rekening'       => '0',
                'nama_rekening'     => '-',
                'company_id'        => '-',
                'username_ibank'    => "-",
                'password_ibank'    => "-",
                'status'            => "tidak_aktif",
                'mutasi'            => "baru"
            ]
        );

        DB::table('bank_deposits')->insert(
            [
                'service'           => 'MANDIRI',
                'no_rekening'       => '0',
                'nama_rekening'     => '-',
                'company_id'        => '-',
                'username_ibank'    => "-",
                'password_ibank'    => "-",
                'status'            => "tidak_aktif",
                'mutasi'            => "baru"
            ]
        );
    }
}
