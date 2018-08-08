<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Veris Juniardi <veris.juniardi@gmail.com>
 */
class Stream extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
      $data['title']          = TITLE . 'Open Data Pertanahan Publik';
      $data['desa']           = $this->master_model->desa()->result();
      $data['province']       = $this->master_model->_get_provinces()->result();
      $data['regency']        = $this->master_model->_get_regencies($data['province']['id'])->result();
      $data['districts']      = $this->master_model->_get_districts($data['regency']['id'])->result();
      $desa['villages']       = $this->master_model->_get_villages($data['districts']['id'])->result();
      // $data['main_content']   = UMUM.'public';
      // $this->load->view(UMUM. 'public_stream', $data);
      $data['main_content']   = UMUM.'v2/pertanahan';
      $this->load->view(UMUM. 'v2/template', $data);
  }


  function get_pendidikan()
  {
      $data['title']          = TITLE . 'Open Data Pertanahan Publik';
      $data['main_content']   = UMUM.'v2/pertanahan';
      $this->load->view(UMUM. 'v2/template', $data);
  }

// MAINTENANCE TEMPLATE
  function perbaikan()
  {
      $data['title']          = TITLE . 'Open Data Pertanahan Publik';
      $this->load->view(UMUM.'maintenance', $data);
  }

  function details($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    $data['data']           = array('id'=>$id);
    $data['main_content']   = UMUM.'details';
    $this->load->view(UMUM. 'public_stream', $data);
  }
// 
  public function details_skt($nik, $id){
    $data['status'] = TRUE;
    $data['penduduk'] = [];
    $tanah = $this->pertanahan_model->koordinat_tengah_nik_one($nik)->row_array();
    $penduduk = $this->datapenduduk_model->get_nik_one($nik)->row_array();
    switch ($penduduk['jenis_kelamin']) {
      case 1:
      $jenis_kelamin = 'Laki-Laki';
        break;
      case 2:
      $jenis_kelamin = 'Perempuan';
          break;
      default:
      $jenis_kelamin = $penduduk['jenis_kelamin'];
        break;
    }
    $data['penduduk'] = array(
      "id"=> (int)($tanah['nik']),
      "tanah_id"=> (int)($tanah['id']),
      "nama"=>$penduduk['nama'],
      // "kk"=>substr_replace($penduduk['no_kk'], '********', 8),
      "tempat_tanggal_lahir"=>$penduduk['tempat_lahir'].",".$penduduk['tanggal_lahir'],
      "jenis_kelamin"=> $jenis_kelamin,
      "alamat"=>$penduduk['alamat'],
      "luas"=>$tanah['area'],
      "status_tanah"=> $tanah['status'],
      "link_thumbnails"=> base_url('assets/uploader/patok/'.$tanah['dokumentasi']),
      "koordinat" => array(
        "latitude"=> floatval($tanah['latitude']),
        "longitude"=>floatval($tanah['longitude']),
      ),

    );
    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }
// 
  public function cek_validasi($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    $data['data']           = $this->pertanahan_model->_get_validasi_skt($id)->row_array();
    $data['koordinat']      = $this->pertanahan_model->get_koordinat_tengah_id($data['data']['bap_id'])->row_array();
    $data['patok']          = $this->pertanahan_model->_get_data_patok($data['koordinat']['id']);
    $data['main_content']   = UMUM.'cek_qr_skt';
    $this->load->view(UMUM. 'public_stream', $data);
  }

  public function cek_validasi_bap($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    $data['data']  = $this->pertanahan_model->_get_bap_valid($id)->row_array();
    $data['ketua_pemeriksa'] = $this->auth_model->get_user_id($data['data']['ketua_pemeriksa_id'])->row_array();
    $data['pemeriksa_1'] = $this->auth_model->get_user_id($data['data']['pemeriksa_1_id'])->row_array();
    $data['pemeriksa_2'] = $this->auth_model->get_user_id($data['data']['pemeriksa_2_id'])->row_array();
    $data['pemeriksa_3'] = $this->auth_model->get_user_id($data['data']['pemeriksa_3_id'])->row_array();
    $data['pemeriksa_4'] = $this->auth_model->get_user_id($data['data']['pemeriksa_4_id'])->row_array();
    $data['titik_tengah'] = $this->pertanahan_model->_get_data_link($data['data']['id'])->row_array();
    $data['patok']        = $this->pertanahan_model->_get_data_patok($data['titik_tengah']['id'])->result();
    $data['main_content']   = UMUM.'cek_qr_bap';
    $this->load->view(UMUM. 'public_stream', $data);
  }

  public function cek_validasi_pernyataan($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    // Data Pernyataan

    $data['main_content']   = UMUM.'cek_qr_pernyataan';
    $this->load->view(UMUM. 'public_stream', $data);
  }

  public function cek_validasi_permohonan($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    // Data Permohonan

    $data['main_content']   = UMUM.'cek_qr_permohonan';
    $this->load->view(UMUM. 'public_stream', $data);
  }

  public function cek_validasi_disposisi($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    // Data Disposisi
    
    $data['main_content']   = UMUM.'cek_qr_disposisi';
    $this->load->view(UMUM. 'public_stream', $data);
  }



  /*========================= STREAM DATA TANAH VIEW PUBLIC ======================= */
  public function get_marker_all(){
    $data['results'] = $this->pertanahan_model->get_marker_all()->result();
    echo json_encode($data);
  }
  public function get_one_marker($key){
    $data['results'] = $this->pertanahan_model->get_marker($key)->row_array();
    echo json_encode($data);
  }

  public function get_one_marker_id($key){
    $data['results'] = $this->pertanahan_model->get_one_marker($key)->row_array();
    echo json_encode($data);
  }

  public function cari_data_per_desa($key){
    $data['results'] = $this->pertanahan_model->cari_data_tanah_desa($key)->result();
    echo json_encode($data);
  }

  public function get_asset_desa($key){
    $data['results'] = $this->pertanahan_model->cari_aset_tanah_desa($key)->result();
    echo json_encode($data);
  }
 
  public function cari_data_per_dusun($key){
    echo json_encode($data);
  }

  public function cari_data_per_nama($key){
    echo json_encode($data);
  }

  // public function v2_koordinat_tanah(){
  //   $this->output
  //       ->set_content_type('application/json')
  //       ->set_output(json_encode($this->pertanahan_model->koordinat_tengah_nik()->result()));
  // }

  public function v2_koordinat_nik($nik){
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($this->pertanahan_model->koordinat_tengah_nik_one($nik)->result()));
  }



  public function grafik_public(){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    // $data['main_content']   = UMUM.'v2/Belum_tersedia';
    $data['penduduk'] = $this->datapenduduk_model->_get_penduduk_group_sex();
    $data['laki'] = $this->datapenduduk_model->_get_penduduk_laki();
    $data['perempuan'] = $this->datapenduduk_model->_get_penduduk_perempuan();
    $data['main_content']   = UMUM.'v2/grafik_publik';
    $this->load->view(UMUM. 'v2/template', $data);
}




  /*===============================================================================*/

}

/* Stream.php || Controller Handler Untuk Modul Stream */ 
/*==============================================================
|    @Author     |      Version     |     Changelog     |
_______________________________________________________________
| Veris Juniardi      1.0.0-alfa      November 2017     |
|                |                  |                   |
|                |                  |                   |
================================================================*/
