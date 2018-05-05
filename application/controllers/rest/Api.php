<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH . 'libraries/REST_Controller.php';
/**
 * @author Veris Juniardi <veris.juniardi@gmail.com>
 */
// class Api extends REST_Controller{
class Api extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
    // $this->methods['users_otp']['limit'] = 500; // 100 requests per hour per user/key
  }

  public function users_get(){
    $hpid = $this->input->post('hp');
    echo json_encode($hpid);
  }

  public function get_provinces(){
    $data['status'] = TRUE;
    $data['results'] = $this->master_model->_get_provinces()->result();
    echo json_encode($data);
  }

  public function get_regencies($id){
    $data['status'] = TRUE;
    $data['results'] = $this->master_model->_get_regencies($id)->result();
    echo json_encode($data);
  }

  public function get_districts($id){
    $data['status'] = TRUE;
    $data['results'] = $this->master_model->_get_districts($id)->result();
    echo json_encode($data);
  }

  public function get_villages($id){
    $data['status'] = TRUE;
    $data['results'] = $this->master_model->_get_villages($id)->result();
    echo json_encode($data);
  }
  public function get_villages_one($id){
    $data['status'] = TRUE;
    $data['results'] = $this->master_model->_get_villages_one($id)->row_array();
    echo json_encode($data);
  }

}
