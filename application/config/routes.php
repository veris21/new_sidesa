<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'office';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['email/test']            = 'office/sendEmailTest';

/*
| -------------------------------------------------------------------------
|  REST API Routes
| -------------------------------------------------------------------------
*/

$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8


$route['api/notifikasi/users/(:num)'] = '';
$route['api/check_user']            = 'rest/api/users_get';
$route['api/get_provinsi_all']                  = 'rest/api/get_provinces';
$route['api/get_kabupaten_in_provinsi/(:num)']  = 'rest/api/get_regencies/$1';
$route['api/get_kecamatan_in_kabupaten/(:num)'] = 'rest/api/get_districts/$1';
$route['api/get_desa_in_kecamatan/(:num)']      = 'rest/api/get_villages/$1';
$route['api/get_desa/(:num)']                   = 'rest/api/get_villages_one/$1';
/*
| -------------------------------------------------------------------------
| -------------------------------------------------------------------------
*/

$route['login']                     = 'auth/login';
$route['logout']                    = 'auth/logout';
$route['setting/akun']              = 'auth/setting';
$route['get/uid/(:any)']            = 'auth/_get_uid/$1';
$route['auth']                      = 'auth/validate';


// APIS REST AUTH
$route['api/auth']                  = 'api/rest_auth';
$route['api/notifications/(:any)']  = 'api/notifications/$1';
$route['api/arsip']                 = 'api/arsip_list_api';


$route['api/koordinat/(:any)']      = 'api/koordinat_per_desa/$1';

/* -----------------------------------------------------------------------
                       PUBLIC ROUTE
 ----------------------------------------------------------------------- */
 $route['public']                           = 'stream';

 $route['public/grafik']                    = 'stream/grafik_public';
 $route['public/kelompok/umur']             = 'stream/kelompok_umur';
 $route['public/kelompok/pekerjaan']        = 'stream/kelompok_pekerjaan'; 

 $route['public/data/fasilitas_umum']       = 'stream/data_fasilitas_umum';
 $route['public/data/pertanian']            = 'stream/data_pertanian';
 $route['public/data/kelompok_usaha']       = 'stream/data_kelompok_usaha';
 $route['public/data/grafik_pertanahan']    = 'stream/data_grafik_pertanian';


 
$route['public/pertanahan/details/(:any)/(:any)']  = 'stream/details_skt/$1/$2';
$route['api/stream/desa/(:any)']            = 'stream/cari_data_per_desa/$1';
$route['api/stream/dusun/(:any)']           = 'stream/cari_data_per_dusun/$1';
$route['api/stream/nama/(:any)']            = 'stream/cari_data_per_nama/$1';

$route['api/stream/penduduk/jenis_kelamin'] = 'stream/api_jenis_kelamin_penduduk';
$route['api/stream/penduduk/pendidikan']    = 'stream/api_pendidikan_penduduk';
$route['api/stream/penduduk/pekerjaan']     = 'stream/api_pekerjaan_penduduk';
$route['api/stream/penduduk/kelompok_umur'] = 'stream/api_kelompok_umur_penduduk';

$route['api/stream/marker']                 = 'stream/get_marker_all';
$route['api/stream/marker/one/(:any)']      = 'stream/get_one_marker/$1';
$route['api/stream/marker/get_one/(:any)']  = 'stream/get_one_marker_id/$1';
$route['api/stream/marker/asset/(:any)']    = 'stream/get_asset_desa/$1';


$route['api/tanah_all/polygon/json']            = 'pertanahan/all_polygon_json';
$route['api/adm_all/polygon/json']              = 'pertanahan/semua_koordinat_adm';
$route['api/polygon/color/(:num)']              = 'pertanahan/get_polygon_color/$1';
$route['api/polygon/one/(:num)']                = 'pertanahan/get_adm_polygon_one/$1';
$route['api/get_details/pemilik/(:any)/(:any)'] = 'pertanahan/get_details_pemilik_one/$1/$2';
/* -----------------------------------------------------------------------
                       Validasi Check ROUTE
 ----------------------------------------------------------------------- */
$route['skt/validasi/(:any)']                = 'stream/cek_validasi/$1';
$route['berita_acara/validasi/(:any)']       = 'stream/cek_validasi_bap/$1';
$route['pernyataan/validasi/(:any)']         = 'stream/cek_validasi_pernyataan/$1';
$route['permohonan/validasi/(:any)']         = 'stream/cek_validasi_permohonan/$1';
$route['disposisi/validasi/(:any)']          = 'stream/cek_validasi_disposisi/$1';

/* -----------------------------------------------------------------------
                        RESET DATABASE ROUTE
 ----------------------------------------------------------------------- */
// $route['reset/database']            = 'master/reset';
// $route['reset/pertanahan']          = 'master/reset_pertanahan';
// $route['reset/arsip']               = 'master/reset_arsip';
// $route['reset/notifikasi']          = 'master/reset_notifikasi';
// $route['reset/session']             = 'master/reset_session';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */
/* -----------------------------------------------------------------------
                        DISPOSISI SISTEM ROUTE
 --------------------------- -------------------------------------------- */
 $route['disposisi/list']                 = 'disposisi/list';
 $route['disposisi/keluar']               = 'disposisi/keluar';
 $route['disposisi/masuk']                = 'disposisi/masuk';

/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

/* -----------------------------------------------------------------------
                        SMS SISTEM ROUTE
 ----------------------------------------------------------------------- */

$route['sms/blast']                 = 'office/sms_blast';
$route['sms/undangan']              = 'office/sms_undangan';
$route['sms/kirim']                 = 'office/sms_kirim';
$route['sms/setting']               = 'master/sms_setting';
$route['sms/aktif/(:any)']          = 'master/sms_aktif/$1';
$route['sms/nonaktif/(:any)']       = 'master/sms_nonaktif/$1';
$route['sms/get/(:any)']            = 'master/sms_get/$1';
$route['sms/api/input']             = 'master/sms_api_input';
$route['sms/api/update']            = 'master/sms_api_update';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

 /* -----------------------------------------------------------------------
                        USER ROUTE
 ----------------------------------------------------------------------- */
$route['user/list']                 = 'master/user_list'; 
$route['user/administrasi']         = 'master/administrasi_data';
$route['user/input']                = 'master/user_input';
$route['user/update']               = 'master/user_update';
$route['user/get/(:any)']           = 'master/user_get/$1';
$route['user/delete/(:any)']        = 'master/user_delete/$1';


$route['history/akses_sistem']      = 'master/history_akses';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

/* -----------------------------------------------------------------------
                        ADMINISTRASI DESA ROUTE
 ----------------------------------------------------------------------- */
$route['details/desa/(:any)']       = 'master/detail_pejabat_desa/$1';
$route['desa/input']                = 'master/desa_input';
$route['desa/update']               = 'master/desa_update';

$route['dusun/get/(:any)']          = 'master/get_dusun/$1';
$route['rt/get/(:any)']             = 'master/get_rt/$1';
$route['dusun/input']               = 'master/input_dusun';
$route['dusun/update']              = 'master/update_dusun';
$route['dusun/delete/(:any)']       = 'master/delete_dusun/$1';
$route['rt/input']                  = 'master/input_rt';
$route['rt/update']                 = 'master/update_rt';
$route['rt/delete/(:any)']          = 'master/delete_rt/$1';

$route['input/kabupaten']           = 'master/input_kabupaten';
$route['input/kecamatan']           = 'master/input_kecamatan';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

/* -----------------------------------------------------------------------
                        ARSIP DATABASE ROUTE
 ----------------------------------------------------------------------- */
$route['arsip/klasifikasi']         = 'master/klasifikasi_arsip';
$route['klasifikasi/posting']       = 'master/posting_klasifikasi_arsip';
$route['klasifikasi/get/(:any)']    = 'master/get_klasifikasi_one/$1';
$route['klasifikasi/edit']          = 'master/update_klasifikasi';
$route['klasifikasi/delete/(:any)'] = 'master/delete_klasifikasi/$1';
$route['adm/json']                  = 'master/adm_json';

$route['arsip']                         = 'arsip/arsip';
$route['arsip/cari']                    = 'arsip/arsip_cari';
$route['arsip/cari_data']               = 'arsip/arsip_cari_data';
$route['arsip/input']                   = 'arsip/arsip_input';
$route['arsip/keluar']                  = 'arsip/surat_keluar';

$route['arsip/hapus/(:any)']            = 'arsip/hapus_arsip/$1';

$route['arsip/details/(:any)']          = 'arsip/arsip_detail/$1';
$route['arsip/balasan']                 = 'arsip/balasan_arsip';
$route['arsip/balasan/setujui/(:any)']  = 'arsip/balasan_setujui/$1'; 

$route['disposisi/tandai/baca/(:any)']  = 'disposisi/tandai_baca/$1';
$route['disposisi/post']                = 'disposisi/input';
$route['disposisi/cetak/']              = 'disposisi/cetak/$1';

$route['api/arsip/details/(:any)']      = 'arsip/arsip_detail_api/$1';

// API ARSIP

/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */
/* -----------------------------------------------------------------------
                       CRON ROUTE
 ----------------------------------------------------------------------- */
 $route['cron/test']                = 'cron';
 $route['cron/peringatan/mingguan'] = 'cron/peringatan';
 $route['cron/peringatan/jadwal']   = 'cron/pengingat_jadwal';

 $route['posting/reminder']         = 'cron/reminder_input';



/* -----------------------------------------------------------------------
                       NOTIFIKASI ROUTE
 ----------------------------------------------------------------------- */
$route['cek_sms']                   = 'sms/notifikasi_cek';
$route['notifikasi/list']           = 'office/notifikasi_list';
$route['notifikasi/baca/(:any)']    = 'office/notifikasi_baca/$1';
$route['notifikasi/details/(:any)'] = 'office/notifikasi_details/$1';

/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

 /* -----------------------------------------------------------------------
                        PERTANAHAN SISTEM ROUTE
 ----------------------------------------------------------------------- */
$route['koordinat']                       = 'pertanahan/koordinat';
$route['delete/titik_tengah/(:num)']      = 'pertanahan/delete_master_tengah/$1';

$route['import/koordinat_tengah']         = 'pertanahan/import_koordinat_tengah';


$route['pertanahan/data']                 = 'pertanahan/data_view';
$route['pertanahan/permohonan']           = 'pertanahan/permohonan';
$route['pertanahan/berita_acara']         = 'pertanahan/berita_acara';
$route['pertanahan/surat_tanah']          = 'pertanahan/list_skt';

$route['pertanahan/aset_tanah_desa']      = 'pertanahan/tanah_desa_list';

$route['pertanahan/get_aset']             = 'master/get_aset_desa';

$route['permohonan/setuju']              = 'pertanahan/permohonan_setuju';

$route['permohonan/input']                = 'pertanahan/permohonan_input';
$route['pernyataan/input']                = 'pertanahan/pernyataan_input';
$route['pernyataan/update']               = 'pertanahan/pernyataan_update';
// 
$route['pernyataan/get_saksi/(:num)']     = 'pertanahan/pernyataan_get/$1';
// 
$route['berita_acara/input']              = 'pertanahan/berita_acara_input';

$route['permohonan/view/(:any)']          = 'pertanahan/permohonan_view/$1';

$route['berita_acara/view/(:any)']        = 'pertanahan/berita_acara_view/$1';
$route['surat_tanah/details/(:any)']      = 'pertanahan/skt_view_one/$1';

$route['tim_pemeriksa/input']             = 'pertanahan/input_petugas_pemeriksa';


$route['permohonan/get/(:any)']           = 'pertanahan/get_permohonan/$1';
$route['permohonan/delete/(:any)']        = 'pertanahan/delete_permohonan/$1';

$route['permohonan/update']               = 'pertanahan/update_permohonan';


$route['semua/koordinat']                 = 'pertanahan/semua_koordinat';
$route['semua/koordinat/valid']           = 'pertanahan/semua_koordinat_valid';

/* -----------------------------------------------------------------------
                       PRINT / CETAK PDF ROUTE
 ----------------------------------------------------------------------- */
$route['cetak/permohonan/(:any)']         = 'pertanahan/permohonan_print_alternatif/$1';
$route['cetak/pernyataan/(:any)']         = 'pertanahan/pernyataan_print_alternatif/$1';
$route['permohonan/cetak/(:any)']         = 'pertanahan/permohonan_print/$1';
$route['pernyataan/cetak/(:any)']         = 'pertanahan/pernyataan_print/$1';
$route['berita_acara/cetak/(:any)']       = 'pertanahan/cetak_bap/$1';
$route['final/cetak/(:any)']              = 'pertanahan/cetak_skt/$1';
$route['denah/cetak/(:any)']              = 'pertanahan/cetak_denah_skt/$1';
$route['patok/cetak/(:any)']              = 'pertanahan/cetak_patok_skt/$1';
$route['lampiran/cetak/(:any)']           = 'pertanahan/cetak_lampiran_skt/$1';
$route['cover/cetak/(:any)']              = 'pertanahan/cetak_cover/$1';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

/* -----------------------------------------------------------------------
                      CARI DATA FORM ROUTE
 ----------------------------------------------------------------------- */
$route['cari/nik/(:any)']           = 'datapenduduk/cari_nik/$1';
$route['cari/skt/(:any)']           = 'pertanahan/cari_skt/$1';
$route['get/kabupaten/(:any)']      = 'datapenduduk/get_kabupaten/$1';
$route['get/kecamatan/(:any)']      = 'datapenduduk/get_kecamatan/$1';
$route['get/desa/(:any)']           = 'datapenduduk/get_desa/$1';
$route['get/dusun/(:any)']          = 'datapenduduk/get_dusun/$1';
$route['get/rt/(:any)']             = 'datapenduduk/get_rt/$1';
/* ---------------------------------------------------- -------------------
                       ADMINISTRASI PENDUDUK ROUTE
 ----------------------------------------------------------------------- */
$route['data_penduduk']             = 'datapenduduk/data_penduduk';
$route['data_mutasi']               = 'datapenduduk/mutasi_penduduk';


$route['data_penduduk/input']       = 'datapenduduk/input_penduduk';
$route['data_penduduk/update']      = 'datapenduduk/update_penduduk';
// =============  API DATA PENDUDUK =================
$route['data_penduduk/get/(:any)']  = 'datapenduduk/get_penduduk/$1';
// ==================================================
$route['data_penduduk/details/(:num)']    = 'datapenduduk/details_penduduk/$1';


$route['import/data']               = 'datapenduduk/import';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

 /* -----------------------------------------------------------------------
                                MAP DATA ROUTE
 ----------------------------------------------------------------------- */
// KOORDINAT ROUTE
$route['koordinat/tengah']                  = 'pertanahan/input_koordinat_tengah';
$route['get/koordinat/tengah/(:any)']       = 'pertanahan/get_koordinat_tengah/$1';
$route['update/koordinat/tengah']           = 'pertanahan/update_koordinat_tengah';


$route['titik_berdasar_nik/(:any)']         = 'stream/v2_koordinat_nik/$1';

// =========================== API =============================================
$route['api/titik_tengah/json']             = 'pertanahan/api_koordinat_tanah';

 
$route['pemutihan/titik_tengah']            = 'pemutihan/pemutihan_koordinat_tengah';
$route['pemutihan/update/titik_tengah']     = 'pemutihan/update_pemutihan_koordinat_tengah';
$route['pemutihan/titik_koordinat']         = 'pemutihan/input_koordinat';


$route['verifikasi/pemutihan']              = 'pemutihan/verifikasi_pemutihan';

$route['pemutihan/one/(:any)']              = 'pemutihan/get_one/$1';
$route['push/pemutihan']                    = 'pemutihan/push_pemutihan_ke_data_utama';
$route['pemutihan/validate_nik/(:any)']     = 'pemutihan/validate_koordinat_nik/$1';
$route['get/status/pemutihan/(:any)']       = 'pemutihan/get_patok_status/$1';
$route['get/patok/pemutihan/(:any)']        = 'pemutihan/get_patok_one/$1';

/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */
$route['koordinat/tanah']                   = 'pertanahan/input_koordinat';
$route['get/koordinat/tanah/(:any)']        = 'pertanahan/get_koordinat/$1';
$route['update/koordinat']                  = 'pertanahan/update_koordinat';
$route['delete/koordinat/(:any)']           = 'pertanahan/delete_koordinat/$1';


$route['rtrw/get_master']                   = 'master/rtrw_master';
$route['rtrw/save']                         = 'master/rtrw_post';
$route['rtrw/details/(:num)']               = 'master/rtrw_details/$1';
$route['rtrw/koordinat/(:num)']             = 'master/rtrw_koordinat/$1';
$route['rtrw/koordinat/posting']            = 'master/rtrw_koordinat_post';
$route['rtrw/hapus_koordinat/(:num)']       = 'master/rtrw_koordinat_hapus/$1';



/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */
// DATA KOORDINAT DIPUSH ke SKT
$route['polygon/push']                      = 'pertanahan/skt_input';
// Laporkan Permasalahan Data BAP PERTANAHAN 
$route['berita_acara/laporkan_masalah']     = 'pertanahan/masalah_bap_lapor';
$route['aktivasi/download']                 = 'pertanahan/skt_update';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */
// GEO JSON 
$route['geojson/input']                     = 'pertanahan/geojson_input';


/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */
 $route['user/get/otp/(:num)']              = 'master/user_get_otp/$1';
 $route['otp/check']                        = 'master/otp_check';
 $route['otp/generate/(:num)']              = 'master/generate_otp/$1';


 $route['update/password']                  = 'auth/update_password';
 $route['update/user']                      = 'auth/update_user';

 $route['bot']                              = 'bot/get_updates';
/* ===================================================================== */
/* -----------------------------------------------------------------------
|                           MASTER ROUTE SYSTEM                           |
|                           @Author     Veris Juniardi                    |
|                           @veris_juniardi                               |
|                           veris.juniardi@gmail.com                      |
|                           +6282281469926                                |
 ----------------------------------------------------------------------- */
/* ===================================================================== */


$route['terindak/login']                   = 'version-2/template/auth';