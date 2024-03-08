<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class default_autonotif extends Seeder
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

        // Seeder Default API
        DB::table('autonotifs')->insert(
            [
                'uid'           => 'admin@gmail.com',
                'username'      => "-",
                'api_key'       => "-",
                'kategori'      => "admin",
                'otoritas'      => "admin",
                'message'       => "-",
                'status'        => "tidak_aktif",
            ]
        );

        // Seeder OTP
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "otp",
                'otoritas'      => "admin",
                'message'       => 'Pelanggan Yth,' .
                    "\n" .
                    '*(otp)* adalah kode konfirmasi Mutasi Rekening anda.' .
                    "\n" . 'OTP ini akan berlaku selama 30 menit ke depan.',
                'status'        => "aktif",
            ]
        );

        // Seeder Register
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "register",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "Pendaftaran akun telah berhasil, dengan rincian" .
                    "\n\n" .
                    "   Nama : (name)" . "\n" .
                    "   Nama Lengkap : (fullname)" . "\n" .
                    "   Alamat : (alamat)" . "\n" .
                    "   No HP : (no_hp)" . "\n" .
                    "   Email : (email)" . "\n\n" .
                    "Terimakasih telah menggunakan layanan kami." . "\n" .
                    "Lakukan verifikasi akun anda dengan kode OTP yang telah kami kirimkan sebelumnya." .
                    "\n\n" . "*Catatan :* " .  "\n" .
                    "Seluruh data penting anda akan di enkripsi pada sistem kami, " .
                    "jadi ingat baik-baik data penting anda supaya tidak " .
                    "terjadi hal yang tidak diinginkan.",
                'status'        => "aktif",
            ]
        );

        // Seeder Gagal Login Scrap
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "gagal_scrap",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "Sistem kami mendeteksi adanya kesalahan pada paket anda, dengan rincian"
                    . "\n\n" .
                    "   Service : (service)" . "\n" .
                    "   Nama Paket : (nama_paket)" . "\n" .
                    "   Jatuh Tempo : (expired)" . "\n" .
                    "   Nomor rekening : (no_rekening)" . "\n\n" .
                    "Harap segera melakukan pembaruan username dan password internet banking anda " .
                    "pada website kami untuk dapat tetap menikmati layanan ini." . "\n" .
                    "Terimakasih.",
                'status'        => "aktif",
            ]
        );

        // Seeder Rekening Baru
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "add_bank",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "Pembelian Paket telah berhasil, dengan rincian"
                    . "\n\n" .
                    "   Paket : (nama_paket)" . "\n" .
                    "   Service : Bank (service)" . "\n" .
                    "   Harga : Rp (harga)" . "\n" .
                    "   Masa Aktif : (durasi) Hari" . "\n" .
                    "   Jatuh Tempo : (expired)" . "\n\n" .
                    "Terimakasih telah menggunakan layanan kami." . "\n" .
                    "Selamat menggunakan dan hubungi kami jika anda memiliki kendala.",
                'status'        => "aktif",
            ]
        );

        // Seeder Paket Expired
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "paket_expired",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "*Masa aktif paket anda telah habis*, dengan rincian "
                    . "\n\n" .
                    "   Paket : (nama_paket)" . "\n" .
                    "   Service : Bank (service)" . "\n" .
                    "   Harga : Rp (harga)" . "\n" .
                    "   Masa Aktif : (durasi) Hari" . "\n" .
                    "   Jatuh Tempo : (expired)" . "\n\n" .
                    "Terimakasih telah menggunakan layanan kami." . "\n" .
                    "Silahkan lakukan perpanjangan dan hubungi kami jika anda memiliki kendala.",
                'status'        => "aktif",
            ]
        );

        // Seeder Topup
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "top_up",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "Permintaan isi ulang saldo telah berhasil, dengan rincian"
                    . "\n\n" .
                    "   Nominal : Rp (nominal)" . "\n" .
                    "   Nama Bank : (nama_rekening)" . "\n" .
                    "   Bank Tujuan : (service)" . "\n" .
                    "   Nomor Rekening : (no_rekening)" . "\n" .
                    "   Jatuh Tempo : (expired)" . "\n" .
                    "   Tagihan : Rp (tagihan)" . "\n\n" .
                    "Silahkan lakukan pembayaran dan simpan bukti pembayaran telah berhasil." . "\n" .
                    "Terimakasih.",
                'status'        => "aktif",
            ]
        );

        // Seeder Pembayaran Berhasil
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "payment_success",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "Pembayaran sebesar Rp (tagihan) telah terkonfirmasi, dengan rincian"
                    . "\n\n" .
                    "   Nominal : Rp (nominal)" . "\n" .
                    "   Nama Bank : (nama_rekening)" . "\n" .
                    "   Bank Tujuan : (service)" . "\n" .
                    "   Nomor Rekening : (no_rekening)" . "\n" .
                    "   Terbayarkan : Rp (tagihan)" . "\n\n" .
                    "Terimakasih telah menggunakan layanan kami. " . "\n" .
                    "Selamat menggunakan dan hubungi kami jika anda memiliki kendala.",
                'status'        => "aktif",
            ]
        );

        // Seeder Pembayaran Gagal
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "payment_failed",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "Pembayaran *Gagal*, dengan rincian"
                    . "\n\n" .
                    "   Nominal : Rp (nominal)" . "\n" .
                    "   Nama Bank : (nama_rekening)" . "\n" .
                    "   Bank Tujuan : (service)" . "\n" .
                    "   Nomor Rekening : (no_rekening)" . "\n" .
                    "   Jatuh Tempo : (expired)" . "\n" .
                    "   Tagihan : Rp (tagihan) *(Kadaluarsa)* " . "\n\n" .
                    "Jika anda telah melakukan pembayaran harap hubungi kami." . "\n" .
                    "Abaikan pesan ini jika memang anda belum melakukan pembayaran.",
                'status'        => "aktif",
            ]
        );

        // Seeder Paket Harian (Paket Dihapus)
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "paket_harian_delete",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "*Paket Layanan Harian (nama_paket) dengan harga Rp (harga)*, " .
                    "saat ini *sudah tidak tersedia*, silahkan lakukan perpanjangan paket layanan anda." .
                    "\n" .
                    "Terimakasih telah menggunakan layanan kami. " . "\n" .
                    "Selamat menggunakan dan hubungi kami jika anda memiliki kendala.",
                'status'        => "aktif",
            ]
        );

        // Seeder Paket Harian (Saldo Tidak Mencukupi)
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "paket_harian_saldo",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "Perpanjangan Paket Layanan Harian *Gagal*, dengan rincian" .
                    "\n\n" .
                    "   Paket : (nama_paket)" . "\n" .
                    "   Service : Bank (service)" . "\n" .
                    "   Harga : Rp (harga)" . "\n" .
                    "   Masa Aktif : (durasi) Hari" . "\n" .
                    "   Jatuh Tempo : (expired)" .
                    "\n\n" .
                    "Silahkan lakukan isi ulang saldo untuk tetap dapat menikmati layanan ini." . "\n" .
                    "Terimakasih.",
                'status'        => "aktif",
            ]
        );

        // Seeder Paket Harian (Pemberitahuan Perpanjangan)
        DB::table('autonotifs')->insert(
            [
                'uid'           => '-',
                'username'      => '-',
                'api_key'       => "-",
                'kategori'      => "paket_harian_perpanjangan",
                'otoritas'      => "admin",
                'message'       =>
                "Pelanggan Yth," .
                    "\n" .
                    "Perpanjangan Paket Layanan Harian *Berhasil*, dengan rincian" .
                    "\n\n" .
                    "   Paket : (nama_paket)" . "\n" .
                    "   Service : Bank (service)" . "\n" .
                    "   Harga : Rp (harga)" . "\n" .
                    "   Masa Aktif : (durasi) Hari" . "\n" .
                    "   Jatuh Tempo : (expired)" .
                    "\n\n" .
                    "Terimakasih telah menggunakan layanan kami. " . "\n" .
                    "Selamat menggunakan dan hubungi kami jika anda memiliki kendala.",
                'status'        => "aktif",
            ]
        );
    }
}
