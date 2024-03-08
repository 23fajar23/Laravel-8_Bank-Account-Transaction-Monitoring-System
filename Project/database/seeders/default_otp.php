<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class default_otp extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        DB::table('otps')->insert(
            [
                'uid'           => 'admin@gmail.com',
                'kode'          => '123456',
                'status_resend' => "available",
                'date_expired'  => $time
            ]
        );
    }
}
