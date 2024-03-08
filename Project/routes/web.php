<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\autonotifAdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntegrasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\PacketController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('home');
});

Auth::routes();

Route::get('cek_email_user', [Controller::class, 'cek_email_user']);
Route::get('/forgot_password', [Controller::class, 'page_forgot_password'])->name('forgot_password');
Route::get('/verify_otp', [Controller::class, 'page_otp_forgot']);
Route::get('/verify_otp_user', [Controller::class, 'verify_otp']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/layanan_mutasi', [LayananController::class, 'index'])->name('layanan_mutasi');
Route::get('/data_autonotif', [HomeController::class, 'page_autonotif'])->name('data_autonotif');
Route::get('/riwayat_autonotif', [NotifController::class, 'index'])->name('riwayat_autonotif');
Route::get('/tambah_rekening', [LayananController::class, 'tambah_rekening'])->name('tambah_rekening');
Route::get('/update_rekening', [LayananController::class, 'update_rekening']);
Route::get('/update_masa_aktif', [LayananController::class, 'update_masa_aktif']);
Route::get('/mutasi_saldo', [DepositController::class, 'page_mutasi_saldo'])->name('mutasi_saldo');
Route::get('/riwayat_transaksi', [DepositController::class, 'riwayat_transaksi'])->name('riwayat_transaksi');
Route::get('/get_bank_received', [DepositController::class, 'get_bank_received']);
Route::get('/request_deposit', [DepositController::class, 'request_deposit']);

Route::get('ajax_track_message', [NotifController::class, 'ajax_track_message']);
Route::get('ajax_mutasi_saldo', [DepositController::class, 'ajax_mutasi_saldo']);
Route::get('ajax_mutasi_transaksi', [DepositController::class, 'ajax_mutasi_transaksi']);

// ----- Begin Get Data JSON ------
Route::get('/get_data', [LayananController::class, 'show']);
Route::get('/details_bank', [LayananController::class, 'edit']);
Route::get('/get_list_bank', [LayananController::class, 'get_list_bank']);
Route::get('/graph_bank', [LayananController::class, 'graph_bank']);
Route::get('/graph_input_output', [LayananController::class, 'graph_input_output']);
Route::get('/get_user_data', [HomeController::class, 'get_user_data']);
Route::get('/get_data_api', [IntegrasiController::class, 'show']);
Route::get('/update_api', [IntegrasiController::class, 'update']);
Route::get('/callback_tester', [IntegrasiController::class, 'callback_tester']);
Route::get('/graph_refresh', [LayananController::class, 'graph_refresh']);
Route::get('/getPengumuman', [HomeController::class, 'getPengumuman']);
Route::get('/log_data', [NotifController::class, 'get_log']);
Route::get('/search_message', [NotifController::class, 'search_message']);
Route::get('/find_bank', [LayananController::class, 'store']);
Route::get('/get_package', [LayananController::class, 'get_package']);
Route::get('/perpanjang_paket', [LayananController::class, 'perpanjang_paket']);
Route::get('/save_update_masa_aktif', [LayananController::class, 'save_update_durasi']);

// ----- End Get Data JSON ------


// ----- Begin Send Data to Controller (Without return) -----
Route::get('/bank_update', [LayananController::class, 'update']);
Route::get('/bank_delete', [LayananController::class, 'destroy']);
Route::get('/add_bank', [LayananController::class, 'create']);
Route::get('/change_password', [HomeController::class, 'change_password']);
Route::get('/profil_data', [HomeController::class, 'profil_data']);
Route::get('/kontak_data', [HomeController::class, 'send_kontak']);
Route::get('/testimoni', [HomeController::class, 'testimoni']);
Route::get('/log_visible', [NotifController::class, 'log_visible']);
Route::get('/alert_visible', [NotifController::class, 'alert_visible']);
Route::get('/save_key_autonotif', [NotifController::class, 'save_key_autonotif']);
Route::get('/save_message_autonotif', [NotifController::class, 'save_message_autonotif']);
Route::get('/save_phone_autonotif', [NotifController::class, 'save_phone_autonotif']);
Route::get('/save_message_report_self', [NotifController::class, 'save_message_report_self']);
Route::get('/form_deposit_user', [DepositController::class, 'show']);
Route::get('/form_transaksi_user', [DepositController::class, 'store']);
Route::get('/stop_packet', [LayananController::class, 'stop_packet']);

// ----- End Send Data to Controller (Without return) -----


// User Data
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/integrasi', [IntegrasiController::class, 'index'])->name('integrasi');
Route::get('/alat_pengujian', [IntegrasiController::class, 'alat_pengujian'])->name('alat_pengujian');
Route::get('/dokumentasi', [DokumentasiController::class, 'dokumentasi'])->name('dokumentasi');
Route::get('/info_rekening', [HomeController::class, 'page_info_rekening'])->name('info_rekening');


Route::resource('layanan', LayananController::class);

//---------------------------//
//-----Begin Admin Route-----//
//---------------------------//

Route::get('/data_event', [EventController::class, 'index'])->name('data_event');
Route::get('/autonotif', [adminController::class, 'autoNotif'])->name('autonotif');
Route::get('/setting_admin', [adminController::class, 'setting_admin'])->name('setting_admin');
Route::get('/user', [adminController::class, 'data_user'])->name('user');
Route::get('/page_add_user', [adminController::class, 'page_add_user'])->name('page_add_user');
Route::get('/form_update_user', [adminController::class, 'show']);
Route::get('/form_update_rekening', [adminController::class, 'store']);
Route::get('/page_update_event', [adminController::class, 'page_update_event']);
Route::get('/page_update_autonotif', [adminController::class, 'page_update_autonotif']);
Route::get('/linegraph_admin', [adminController::class, 'linegraph_admin']);
Route::get('/save_phone_autonotif_user', [adminController::class, 'save_phone_autonotif_user']);

Route::resource('admin', adminController::class);

// Setting Profil
Route::get('/save_profil', [adminController::class, 'save_profil']);
Route::get('/save_kontak', [adminController::class, 'save_kontak']);
Route::get('/change_password_admin', [adminController::class, 'change_password']);


// Get Data User
Route::get('/add_user', [adminController::class, 'create']);
Route::get('/delete_user', [adminController::class, 'destroy']);
Route::get('/password_user', [adminController::class, 'edit']);
Route::get('/update_user', [adminController::class, 'update']);

//Get Rekening User
Route::get('/cek_rekening', [adminController::class, 'cek_rekening']);
Route::get('/add_rekening', [adminController::class, 'add_rekening']);
Route::get('/delete_rekening', [adminController::class, 'delete_rekening']);
Route::get('/ubah_rekening', [adminController::class, 'update_rekening']);
Route::get('/admin_board', [adminController::class, 'admin_board']);
Route::get('/data_bank', [adminController::class, 'data_bank_wallet']);
Route::get('/data_paket', [adminController::class, 'data_paket_layanan']);
Route::get('/get_bank_user', [adminController::class, 'get_list_bank']);
Route::get('/perpanjang_rekening', [adminController::class, 'perpanjang_rekening']);
Route::get('/stop_rekening', [adminController::class, 'stop_user']);

// Pengumuman
Route::get('/add_pengumuman', [EventController::class, 'create'])->name('add_pengumuman');

//  Testimonials
Route::get('/delete_testimonial', [EventController::class, 'delete_testimonial']);
Route::get('/cari_testimonial', [EventController::class, 'cari_testimonial']);

// Event
Route::get('/save_event', [EventController::class, 'save_event']);
Route::get('/delete_event', [EventController::class, 'delete_event']);
Route::get('/save_ubah_event', [EventController::class, 'save_ubah_event']);

// Auto Notif
Route::get('/save_autonotif', [adminController::class, 'save_autonotif']);
Route::get('/update_autonotif', [adminController::class, 'update_autonotif']);
Route::get('/pesan_autonotif', [autonotifAdminController::class, 'index'])->name('pesan_autonotif');
Route::get('/send_message_fast', [autonotifAdminController::class, 'send_fast_message']);
Route::get('/save_message_admin', [autonotifAdminController::class, 'edit']);

// Packet
Route::get('/data_packet', [PacketController::class, 'index'])->name('data_packet');
Route::get('/add_packet', [PacketController::class, 'store']);
Route::get('/delete_packet', [PacketController::class, 'del_packet']);
Route::get('/find_packet', [PacketController::class, 'src_packet']);
Route::get('/update_packet', [PacketController::class, 'edit']);


// OTP
Route::get('/change_to_enable', [autonotifAdminController::class, 'change_to_enable']);
Route::get('/change_to_disabled', [autonotifAdminController::class, 'change_to_disabled']);

// Deposit
Route::get('/deposit_bank', [DepositController::class, 'index'])->name('deposit_bank');
Route::get('/data_deposit', [DepositController::class, 'page_data_deposit'])->name('data_deposit');
Route::get('/data_pembelian', [DepositController::class, 'page_data_pembelian'])->name('data_pembelian');
Route::get('/data_bank_admin', [DepositController::class, 'data_bank_admin']);
Route::get('/save_deposit_bank', [DepositController::class, 'save_deposit_bank']);
Route::get('/search_deposit', [DepositController::class, 'search_deposit']);


Route::get('ajax_user_datatables', [adminController::class, 'ajax_user_datatables']);
Route::get('ajax_event_datatables', [EventController::class, 'ajax_event_datatables']);
Route::get('ajax_autonotif_datatables', [adminController::class, 'ajax_autonotif_datatables']);
Route::get('ajax_packet_datatables', [PacketController::class, 'ajax_packet_datatables']);
Route::get('ajax_deposit_datatables', [DepositController::class, 'ajax_deposit_datatables']);
Route::get('ajax_riwayat_deposit_datatables', [DepositController::class, 'ajax_riwayat_deposit_datatables']);
Route::get('ajax_riwayat_pembelian_datatables', [DepositController::class, 'ajax_riwayat_pembelian_datatables']);

Route::get('/send_verifikasi', [autonotifAdminController::class, 'store']);


//---------------------------//
//-----End Admin Route-----//
//---------------------------//
