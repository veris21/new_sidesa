<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function kirimperintah($perintah){
    $token = '638688094:AAGMidOoU469g2jyr7InQqXoHJ5W1KhZDUw';
    $url="https://api.telegram.org/bot".$token."/".$perintah;
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

?>