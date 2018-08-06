<?php
$file = dirname(__FILE__).'/outputs.txt';
$data = "Hello it's ".date('d/m/y H:i:s') ."\n";
file_put_contents($file, $data, FILE_APPEND);

$server = BASE_URL;
$datestring = '%d %M %Y - %h:%i %a';
$time = time();
$sekarang = mdate($datestring, $time);
// $to = '082281469926';
$to = '082269200372';
$message = 'Ini Pesan Dari '.$server.' Cron Sistem Pada : '.$sekarang;
sms_notifikasi($to, $message);