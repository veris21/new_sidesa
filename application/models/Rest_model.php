<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_model extends CI_Model {

    function check_user($hp){
        return $this->db->get_where('users', array('hp'=>$hp));
    }
    function get_http_otp($hp){
        $this->db->get_where('users', array('hp'=>$hp));
    }

}

/* End of file Rest_model.php */