<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Veris Juniardi <veris.juniardi@gmail.com>
 */
class Cron extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    // if($this->input->is_cli_request()){
      // $server = BASE_URL;
      // $datestring = '%d %M %Y - %h:%i %a';
      // $time = time();
      // $sekarang = mdate($datestring, $time);
      // // $to = '082281469926';
      // $to = '082269200372';
      // $message = 'Ini Pesan Dari '.$server.' Cron Sistem Pada : '.$sekarang;
      // sms_notifikasi($to, $message);
    // }else {
    //   echo "This script can only be accessed via the command line" . PHP_EOL;
    //   return;
    // }
  }


  public function peringatan(){

  }

  public function peringatan_jadwal(){
    
  }


  function reminder_input(){
    $deadline = $this->input->post('waktu_ingat');
    $dari =  $this->input->post('dari');
    $kepada =  $this->input->post('kepada');
    $type = $this->input->post('tipe_pengingat');
    $pesan =  $this->input->post('pesan');
    $datestring = '%d %M %Y - %h:%i %a';
    $time = time();
    $sekarang = mdate($datestring, $time); 

    $post = array(
      'dari'=>$dari,
      'kepada'=>$kepada,
      'pesan'=>$pesan,
      'deadline'=>$deadline,
      'timestamp_start'=>$sekarang,
      'timestamp_end'=>null,
      'type'=>$type,
      'status'=>0
    );

    $check = $this->notifikasi_model->posting_reminder($post);
    if($check){
      echo json_encode(array('status'=>TRUE));
    }
  }


  function reminder()
  {
    $datestring = '%d %M %Y - %h:%i %a';
    $time = time();
    $sekarang = mdate($datestring, $time);
    $reminder = $this->notifikasi_model->reminder_get()->result();
    foreach ($reminder as $reminder) {
      $init = explode(" ", $reminder->message);
      if ($init[0] == 'REMINDER') {
        $to = $reminder->hp;
        $pesan = $reminder->message;
        $message = "$pesan (##--$sekarang--SiDesa System##)";
        sms_notifikasi($to, $message);
        $id = $reminder->id;
        $this->notifikasi_model->update_status_kirim($id);
      }
    }
  }
}

/* Cron.php || Controller Handler Untuk Modul Cron */ 
/*==============================================================
|    @Author     |      Version     |     Changelog     |
_______________________________________________________________
| Veris Juniardi      1.0.0-alfa      November 2017     |
|                |                  |                   |
|                |                  |                   |
================================================================*/