<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Veris Juniardi <veris.juniardi@gmail.com>
 */
class Pemutihan extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
  }

  public function list_skt(){
        
  }
  
  public function input_skt(){
        
  }

  public function update_skt(){
        
  }

  public function cetak_skt(){
        
  }

  public function pemutihan_koordinat_tengah(){
    if(isset($_FILES['patok'])){
      $patok = time()."-".$_FILES['patok']['name'];
      $config['upload_path'] = './assets/uploader/patok/'; //buat folder dengan nama assets di root folder
      $config['allowed_types'] = 'png|jpg|jpeg';
      $config['max_size'] = 10000;
      $config['file_name'] = $patok;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('patok') ); 

      $nik = strip_tags($this->input->post('nik'));
      $lat = strip_tags($this->input->post('lat'));
      $lng = strip_tags($this->input->post('lng'));
      $area = strip_tags($this->input->post('area'));
      $verified = strip_tags($this->input->post('verified'));
      $status = strip_tags($this->input->post('status'));

      $post = array('nik'=>$nik, 'latitude'=>$lat,'longitude'=>$lng, 'area'=> $area, 'verified'=>$verified,'dokumentasi'=>$patok, 'status'=>$status);
      $check = $this->pertanahan_model->_post_titik_pemutihan($post);
      if($check){
        echo json_encode(array("status" => TRUE));
      }
    }
  }


  public function verifikasi_pemutihan()
  {
      $data['title']                   =   TITLE.'Pemutihan Data Pertanahan';
      $data['main_content']            =   PERTANAHAN.'v2/pemutihan_tengah_all';
      $this->load->view('template', $data);
  }

}