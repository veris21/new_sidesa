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
      // $verified = strip_tags($this->input->post('verified'));
      $status = strip_tags($this->input->post('status'));

      $post = array('nik'=>$nik,
       'latitude'=>$lat,
       'longitude'=>$lng, 
       'area'=> $area, 'verified'=> 0,
       'is_pemutihan'=> 1,
       'dokumentasi'=>$patok, 'status'=>$status); 
     
      $check = $this->pertanahan_model->_post_titik_pemutihan($post);
      if($check){
        echo json_encode(array("status" => TRUE));
      }
    }
  }

  public function update_pemutihan_koordinat_tengah(){
    if(isset($_FILES['patok_update'])){
      $patok_update = time()."-".$_FILES['patok_update']['name'];
      $config['upload_path'] = './assets/uploader/patok/'; //buat folder dengan nama assets di root folder
      $config['allowed_types'] = 'png|jpg|jpeg';
      $config['max_size'] = 10000;
      $config['file_name'] = $patok;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('patok') );
      $id = strip_tags($this->input->post('id'));
      $nik = strip_tags($this->input->post('nik'));
      $lat = strip_tags($this->input->post('latitude'));
      $lng = strip_tags($this->input->post('longitude'));
      // $verified = strip_tags($this->input->post('verified'));
      $area = strip_tags($this->input->post('area'));
      $status = strip_tags($this->input->post('status'));
       $update = array(
        'nik'=>$nik, 
        'latitude'=>$lat,
        'longitude'=>$lng,
        'verified'=>0, 
        'area'=>$area, 
        'status'=>$status, 
        'dokumentasi'=>$patok
      );
      $check = $this->pertanahan_model->update_titik_pemutihan($id, $update);
      if($check){
        echo json_encode(array("status" => TRUE));
      }    
    }else{
      $id = strip_tags($this->input->post('id'));
      $nik = strip_tags($this->input->post('nik'));
      $lat = strip_tags($this->input->post('latitude'));
      $lng = strip_tags($this->input->post('longitude'));
      // $verified = strip_tags($this->input->post('verified'));
      $area = strip_tags($this->input->post('area'));
      $status = strip_tags($this->input->post('status'));
       $update = array(
        'nik'=>$nik, 
        'latitude'=>$lat,
        'longitude'=>$lng,
        'verified'=>0, 
        'area'=>$area, 
        'status'=>$status
      );
      $check = $this->pertanahan_model->update_titik_pemutihan($id, $update);
      if($check){
        echo json_encode(array("status" => TRUE));
      }    
    }
  }


  public function verifikasi_pemutihan()
  { 
      $data['title']                   =   TITLE.'Pemutihan Data Pertanahan';
      $data['koorNik']                 =   $this->pertanahan_model->koordinat_tengah_nik()->result();
      $data['list']                    =   $this->pertanahan_model->koordinat_tengah_all()->result();
      $data['provinsi']                =   $this->master_model->_get_provinces()->result();
      $data['main_content']            =   PERTANAHAN.'v2/pemutihan_tengah_all';
      $this->load->view('template', $data);
  }
 
  public function get_patok_status($id)
  {
    $tanah_id = $id;
    // $id_pemutihan = 'pemutihan-'.$id;
    $patok = $this->pertanahan_model->_get_data_link($tanah_id)->row_array();
    $this->output->set_content_type('application/json')->set_output(json_encode($patok));    
  }

  public function get_one($id)
  {
    $data = $this->pertanahan_model->koordinat_tengah_one($id)->row_array();
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($data));
  }

  public function validate_koordinat_nik($nik){
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($this->pertanahan_model->koordinat_tengah_nik_one($nik)->row_array()));
  }

  public function push_pemutihan_ke_data_utama()
  {
    $user = $this->session->userdata('fullname');
    $now = time();
    $waktu = mdate("%d %D %Y - %H:%i %a",$now);
    $lat = strip_tags($this->input->post('latitude'));
    $lng = strip_tags($this->input->post('longitude'));
    $keterangan = "Penginputan Pemutihan Data Pertanahan oleh ".$user." Pada ".$waktu;
    $tanah_id = strip_tags($this->input->post('tanah_id'));
    $dokumentasi = strip_tags($this->input->post('dokumentasi'));
    $kode_desa = $this->session->userdata('kode_desa');

    $post = array(
      'is_normal'=>0,
      'lat'=>$lat,
      'lng'=>$lng,
      'keterangan'=>$keterangan, 
      'tanah_id'=>$tanah_id,
      'foto_tanah'=>$dokumentasi, 
      'kode_desa'=>$kode_desa,
      'status'=>1
    ); 
    $check = $this->pertanahan_model->_post_titik_marker($post);
    if($check){
      echo json_encode(array("status" => TRUE));
    }
  }
  
  public function get_patok_one($id)
  {
    $patok = $this->pertanahan_model->_get_data_patok($id)->result();
    $this->output->set_content_type('application/json')->set_output(json_encode($patok));    
  }


  // 
  public function input_koordinat(){
    // if(isset($_FILES['patok'])){
    //   $patok = time()."-".$_FILES['patok']['name'];
    //   $config['upload_path'] = './assets/uploader/patok/'; //buat folder dengan nama assets di root folder
    //   $config['allowed_types'] = 'png|jpg|jpeg';
    //   $config['max_size'] = 10000;
    //   $config['file_name'] = $patok;
    //   $this->load->library('upload');
    //   $this->upload->initialize($config);
    //   if(! $this->upload->do_upload('patok') );
      $lat = strip_tags($this->input->post('lat'));
      $lng = strip_tags($this->input->post('lng'));   
      $data_link_id = strip_tags($this->input->post('data_link_id'));
      $utara = strip_tags($this->input->post('utara'));
      $selatan = strip_tags($this->input->post('selatan'));
      $barat = strip_tags($this->input->post('barat'));
      $timur = strip_tags($this->input->post('timur'));

      $post = array(
        // 'link_dokumentasi'=>$patok,
        'lat'=>$lat,
        'lng'=>$lng,
        'utara'=>$utara,
        'selatan'=>$selatan,
        'timur'=>$timur,
        'barat'=>$barat, 
        'id_data_link'=>$data_link_id
      );

        $check = $this->pertanahan_model->_post_titik_polygon($post);
        if($check){
         $this->output->set_content_type('application/json')->set_output(json_encode(array("status" => TRUE, "data"=>$post)));    
          // echo json_encode(array("status" => TRUE, "data"=>$post));
        }
    }
    
  // }

}