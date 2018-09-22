<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bot extends CI_Controller {

    // function get_me(){
    //     $get = 'https://api.telegram.org/bot692869944:AAGBR2GqRQxon1bBIKjhEkXOo7QcT5qFVcE/getMe';
    // }

    public function get_updates()
    {
       $perintah = "getUpdates";
       $data = kirimperintah($perintah);
       $parse = json_decode($data,false);
       echo print_r($parse);
    
    }


    // function sendMessage()
    // {
    //     $post = 'https://api.telegram.org/bot692869944:AAGBR2GqRQxon1bBIKjhEkXOo7QcT5qFVcE/sendMessage?chat_id=421905874&text=Hai%20User';
    // }

}

/* End of file Bot.php */