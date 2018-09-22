<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Veris Juniardi <veris.juniardi@gmail.com>
 */
class Office extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    // $this->load->library("PHPExcel");
    // cek_login();
  }

  function index()
  {
      $data['title']          = TITLE . 'Dashboard';
      $data['main_content']   = 'dashboard';
      $data['arsip']          = $this->arsip_model->arsip_masuk()->num_rows();
      $data['pelayanan']      = 0;
      $data['surat']          = 0;
      $data['tanah']          = $this->pertanahan_model->koordinat_tengah_nik()->num_rows();
      $this->load->view('template', $data);
  }
 
  function sms_blast(){
    $desa_id = $this->session->userdata('desa_id');
    $kode_desa = $this->session->userdata('kode_desa');
    $sms = $this->master_model->get_user_on($desa_id)->result();
    foreach ($sms as $sms) {
          $pesan = "Yth.".$sms->fullname."(".$sms->keterangan_jabatan.") Akun anda telah diaktifkan dengan ID Desa : ".$kode_desa." username: ".$sms->uid." dan Password : 123456 . silahkan login ke Sistem dengan alamat ".base_url('login')." (--SiDesa ID)";
          sms_notifikasi($sms->hp, $pesan);          
        }
    echo json_encode(array("status" => TRUE));
  }

  function sms_kirim(){
    $pilihan = strip_tags($this->input->post('pilihan_type'));    
    $message = strip_tags($this->input->post('message'))."--No-replay SiDesa ID Gantung";
    $desa_id = $this->session->userdata('desa_id');
    switch ($pilihan) {
      case 0:
        $perDesa = $this->master_model->get_user_on($desa_id);
        foreach ($perDesa->result() as $perDesa) {
          $pesan = "Yth.".$perDesa->keterangan_jabatan.": ".$message;
          sms_notifikasi($perDesa->hp, $pesan);
        }
        echo json_encode(array("status" => TRUE));
        break;
      case 1:
        $dusun_id = strip_tags($this->input->post('pilihan_dusun')); 
        $dusun = $this->master_model->get_rt_dusun($dusun_id);
        $uidKadus = $dusun->row_array();
        $kadus = $this->master_model->_get_user_id($uidKadus['uid'])->row_array();
        $pesan = "Yth.".$kadus['keterangan_jabatan'].": ".$message;
        sms_notifikasi($kadus['hp'], $pesan);
        foreach ($dusun->result() as $perDusun) {
          $rt = $this->master_model->_get_user_id($perDusun->uid)->row_array();
          $pesan = "Yth.".$rt['keterangan_jabatan'].": ".$message;
          sms_notifikasi($rt['hp'], $pesan);
        }        
        echo json_encode(array("status" => TRUE));
        break;
      case 2:
      $pilihan_user = strip_tags($this->input->post('pilihan_user'));
      $perUser = $this->master_model->_get_user_id($pilihan_user)->row_array();
      $pesan = "Yth.".$perUser['keterangan_jabatan'].": ".$message;
      sms_notifikasi($perUser['hp'],$pesan);
      echo json_encode(array("status" => TRUE));
        break;
    }
  }

  function sms_undangan(){
    $data['title']          = TITLE . 'SMS Undangan';
    $data['users']          = $this->master_model->get_user_on($this->session->userdata('desa_id'));
    $data['dusun']          = $this->master_model->dusun_on($this->session->userdata('desa_id'));
    $data['main_content']   = MASTER.'sms_undangan';
    $this->load->view('template', $data);
  }

  function notifikasi_list(){
    $id = $this->session->userdata('id');
    $data['title']              = TITLE . 'Notifikasi List';
    $data['notifikasi']         = $this->notifikasi_model->get_notifikasi_user($id, 0)->result();
    $data['history_notifikasi'] = $this->notifikasi_model->get_notifikasi_user($id, 1)->result();
    $data['main_content']       = DISPOSISI . 'notifikasi_list';
    $this->load->view('template', $data);
  }

  

  public function notifikasi_baca($id){
    $update = array(
      'time_read'=>time(),
      'status'=>1
    );
    $check = $this->notifikasi_model->tandai_baca($id, $update);
    if ($check) {
      echo json_encode(array("status" => TRUE));
    }
  }

  public function notifikasi_details($id){
    $data['title']              = TITLE . 'Notifikasi Details';
    $data['main_content'] = DISPOSISI . 'notifikasi_details';
    $this->load->view('template', $data);

  }

  public function sendEmailTest()
  {
    $this->load->library('email');

    $subject = 'This is a test';
    $message = '<p>This message has been sent for testing purposes.</p>';

    // Get full html:
    $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
        <title>' . html_escape($subject) . '</title>
        <style type="text/css">
            body {
                font-family: Arial, Verdana, Helvetica, sans-serif;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
    ' . $message . '
    </body>
    </html>';
    // Also, for getting full html you may use the following internal method:
    //$body = $this->email->full_html($subject, $message);

    $result = $this->email
        ->from('juniart.studio@gmail.com')
        ->reply_to('veris.juniardi@gmail.com')    // Optional, an account where a human being reads.
        ->to('gantung.makmursejahtera@gmail.com')
        ->subject($subject)
        ->message($body)
        ->send();

    var_dump($result);
    echo '<br />';
    echo $this->email->print_debugger();

    exit;
  }
  

}

/* Office.php || Controller Handler Untuk Modul Office */ 
/*==============================================================
|    @Author     |      Version     |     Changelog     |
_______________________________________________________________
| Veris Juniardi      1.0.0-alfa      November 2017     |
|                |                  |                   |
|                |                  |                   |
================================================================*/