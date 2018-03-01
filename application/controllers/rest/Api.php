<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
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

}
