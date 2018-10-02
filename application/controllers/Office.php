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
    echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
    $this->load->library("Phpmailer_library","email");
    $this->phpmailer_library->load();
    // ==========================================

    //  $this->load->library("Phpmailer_library","email");
    //  $this->phpmailer_library->load();
        $email = 'veris.juniardi@gmail.com';
        $role = 'PETUGAS PERTANAHAN Tk. Kecamatan';
        $hp = '082281469926';
        $token = randomString(32);
        $url = $hp."-".$token.":".time();
        $subject = '(Aktivasi Akun) - Selamat Datang Bergabung';
        $body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
        <head style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
            <meta name='viewport' content='width=device-width' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
            <style type='text/css' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
        * { margin: 0; padding: 0; font-size: 100%; font-family: 'Avenir Next', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; line-height: 1.65; }
        img { max-width: 100%; margin: 0 auto; display: block; }
        body, .body-wrap { width: 100% !important; height: 100%; background: #f8f8f8; }        
        a { color: #71bc37; text-decoration: none; }        
        a:hover { text-decoration: underline; }
        .text-center { text-align: center; }        
        .text-right { text-align: right; }        
        .text-left { text-align: left; }        
        .button { display: inline-block; color: white; background: #71bc37; border: solid #71bc37; border-width: 10px 20px 8px; font-weight: bold; border-radius: 4px; }
        .button:hover { text-decoration: none; }
        h1, h2, h3, h4, h5, h6 { margin-bottom: 20px; line-height: 1.25; }        
        h1 { font-size: 32px; }        
        h2 { font-size: 28px; }
        h3 { font-size: 24px; }
        h4 { font-size: 20px; }
        h5 { font-size: 16px; }
        p, ul, ol { font-size: 16px; font-weight: normal; margin-bottom: 20px; }
        .container { display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important; }
        .container table { width: 100% !important; border-collapse: collapse; }
        .container .masthead { padding: 80px 0; background: #71bc37; color: white; }
        .container .masthead h1 { margin: 0 auto !important; max-width: 90%; text-transform: uppercase; }
        .container .content { background: white; padding: 30px 35px; }
        .container .content.footer { background: none; }
        .container .content.footer p { margin-bottom: 0; color: #888; text-align: center; font-size: 14px; }
        .container .content.footer a { color: #888; text-decoration: none; font-weight: bold; }
        .container .content.footer a:hover { text-decoration: underline; }
            </style>
        </head>
        <body style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;height: 100%;background: #f8f8f8;width: 100% !important;'>
        <table class='body-wrap' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;height: 100%;background: #f8f8f8;width: 100% !important;'>
            <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                <td class='container' style='margin: 0 auto !important;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;display: block !important;clear: both !important;max-width: 580px !important;'>
               <table style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;'>
                        <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                            <td class='content' style='margin: 0;padding: 30px 35px;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background: white;'>
                                <h2 style='margin: 0;padding: 0;font-size: 28px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;'>Hai <i style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>".$nama."</i>,</h2>
                                <p style='margin: 0;padding: 0;font-size: 16px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;'>Selamat bergabung di Sistem Informasi Administrasi Pertanahan Terintegrasi dan Aktual <b>(SIAP - Terindak)</b>.</p>
                                <p style='margin: 0;padding: 0;font-size: 16px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;'>Ini Merupakan Aplikasi hasil kerjasama antara Pemerintah Kabupaten Belitung Bersama dengan UPTI BUMDesa Gantung Makmur Sejahtera di bawah Naungan Platform Si-Desa.id </p>
                                <p style='margin: 0;padding: 0;font-size: 16px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;'>Untuk Mengkativasi Akun Anda dan Instansi Silahkan Tekan Tombol Dibawah</p>
                                <p style='margin: 0;padding: 0;font-size: 16px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;'>
                                    <h5 style='margin: 0;padding: 0;font-size: 16px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;'>Detail Pengguna</h5>
                                    Username : <i style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>(gunakan email atau nomor HP terdaftar)</i> <br style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                                    Password : <b>".$password."</b>
                                    <table style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;'>
                                        <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>Nama Pengguna</td>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>: ".$nama."</td>
                                        </tr>
                                        <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>Email Terdaftar</td>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>: ".$email."</td>
                                        </tr>
                                        <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>No. HP</td>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>: ".$hp."</td>
                                        </tr>
                                        <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>Kode Token Sistem Desa </td>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>: <b>".$token."</b></td>
                                        </tr>
                                        <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>Role Akses Pengguna</td>
                                            <td style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>: ".$role."</td>
                                        </tr>
                                    </table>
                                </p>
                                <table style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;'>
                                    <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                                        <td align='center' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                                            <p style='margin: 0;padding: 0;font-size: 16px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;'>
                                                <a target='__black' href='".$link."' class='button' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: white;text-decoration: none;display: inline-block;background: #71bc37;border: solid #71bc37;border-width: 10px 20px 8px;font-weight: bold;border-radius: 4px;'>Aktivasi Akun Anda</a>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <p style='margin: 0;padding: 0;font-size: 16px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;'>Jika kode dibawah tidak berfungsi silahkan <i style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>Copy &amp; Paste</i> Code Berikut ke Browser anda : ".$link."</p>
                                <p style='margin: 0;padding: 0;font-size: 16px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;'><em style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>– Team. Si-Desa ID</em></p>
                            </td>
                        </tr>
                    </table>        
                </td>
            </tr>
            <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                <td class='container' style='margin: 0 auto !important;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;display: block !important;clear: both !important;max-width: 580px !important;'>
                    <table style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;'>
                        <tr style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'>
                            <td class='content footer' align='center' style='margin: 0;padding: 30px 35px;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background: none;'>
                                <p style='margin: 0;padding: 0;font-size: 14px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #888;text-align: center;'>Sent by <a href='https://si-desa.id/about' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: #888;text-decoration: none;font-weight: bold;'>Si Desa ID</a>, Jl. Jenderal Sudirman No. 181 Desa Gantung <br style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;'> Gantung - Belitung Timur, 33562</p>
                                <p style='margin: 0;padding: 0;font-size: 14px;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #888;text-align: center;'><a href='mailto:' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: #888;text-decoration: none;font-weight: bold;'>id.sidesa@gmail.com</a> | <a href='#' style='margin: 0;padding: 0;font-size: 100%;font-family: 'Avenir Next', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: #888;text-decoration: none;font-weight: bold;'>Unsubscribe</a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        </body>
        </html>";
         $result = $this->email
        ->from('id.sidesa@gmail.com','Sistem Si-desaID')
        ->to('veris.juniardi@gmail.com')
        ->subject($subject)
        ->message($body)
        ->send();

    var_dump($result);
    echo '<br />';
    echo $this->email->print_debugger();

    exit;
        // $send = $this->email
        // ->from('id.sidesa@gmail.com','<no-replay>Team Si-DesaID')
        // ->to($email)
        // ->subject($subject)
        // ->message($body)
        // ->send();
        // if ($send) {
        //     $this->output
        //                   ->set_status_header(200)
        //                   ->set_content_type('application/json', 'utf-8')
        //                   ->set_output(json_encode(array('status'=>$send), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        //                   ->_display();
        //                   exit;      
        // } else {
        //     $this->output
        //     ->set_status_header(401)
        //     ->set_content_type('application/json', 'utf-8')
        //     ->set_output(json_encode(array('status'=>FALSE,'message'=> 'Unauthorized'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        //     ->_display();
        //     exit;
        // }

    // ==========================================




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