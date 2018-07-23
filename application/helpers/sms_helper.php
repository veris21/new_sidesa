<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function sms_notifikasi($to, $message, $return = '0')
{
  $CI =& get_instance();
  $key = $CI->option_model->sms_opt()->row_array(); 
  // $userkey="cmtiad"; // userkey lihat di zenziva
  // $passkey="v3r15juniard1"; // set passkey di zenziva
  $userkey=$key['user']; // userkey lihat di zenziva
  $passkey=$key['pass']; // set passkey di zenziva
  $link = $key['url'];
  $url = $link."/apps/smsapi.php";
  $curlHandle = curl_init();
  curl_setopt($curlHandle, CURLOPT_URL, $url);
  curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$to.'&pesan='.urlencode($message));
  curl_setopt($curlHandle, CURLOPT_HEADER, 0);
  curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
  curl_setopt($curlHandle, CURLOPT_POST, 1);
  $results = curl_exec($curlHandle);
  curl_close($curlHandle);
}

function check_sisa_sms(){
  $CI =& get_instance();
  $key = $CI->option_model->sms_opt()->row_array();
  $userkey=$key['user']; // userkey lihat di zenziva
  $passkey=$key['pass']; // set passkey di zenziva
  $link = $key['url'];
  $url = $link."/apps/smsapibalance.php";
  $curlHandle = curl_init();
  curl_setopt($curlHandle, CURLOPT_URL, $url);
  curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey);
  curl_setopt($curlHandle, CURLOPT_HEADER, 0);
  curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
  curl_setopt($curlHandle, CURLOPT_POST, 1);
  $results = curl_exec($curlHandle);
  curl_close($curlHandle);
  return $results;
}



// http://www.freesms4us.com/kirimsms.php?user=budi&pass=budi123&no=08123456789&isi=Ada yang konfirmasi dari user : Rudi dengan nilai Transfer Rp. 350.000 pada tanggal 1 januari jam 15:30

// Jika anda perhatikan diatas,
// - Pertama-tama masukkan alamat link http://www.freesms4us.com/kirimsms.php
// - Lalu tambahkan "?" kemudian kode datanya diikuti "=" lalu masukkan isinya yang dipisahkan dengan &
// - Lanjutkan sampai semua data terisi sesuai petunjuk diatas

// Tambahan
// Karena encoding dari URL maka 2 simbol berikut ini akan hilang saat anda mengirim SMS yaitu simbol + dan \ ada 2 simbol lagi, yaitu # dan &, jika 2 simbol ini ada maka karakter apapun yang ditulis sesudahnya akan hilang. Oleh karena itu, hindari penggunaan 4 simbol tersebut agar pesan anda bisa sampai dengan baik.
