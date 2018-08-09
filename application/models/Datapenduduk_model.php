<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapenduduk_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function _get_penduduk_all(){
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_group_sex()
  {
    $this->db->select('jenis_kelamin, COUNT(jenis_kelamin) as total');
    $this->db->group_by('jenis_kelamin'); 
    $this->db->order_by('total', 'desc'); 
    return $this->db->get('master_data_penduduk_');
  }

  public function _get_penduduk_pendidikan()
  {
    $this->db->select('pddk_akhir, COUNT(pddk_akhir) as total');
    $this->db->group_by('pddk_akhir'); 
    $this->db->order_by('total', 'desc'); 
    return $this->db->get('master_data_penduduk_');
  }

  public function _get_penduduk_laki(){
    return $this->db->get_where('master_data_penduduk_', array('jenis_kelamin'=>'Laki-Laki'));
  }

  public function _get_penduduk_perempuan(){
    return $this->db->get_where('master_data_penduduk_', array('jenis_kelamin'=>'Perempuan'));
  }


  // ============================================================
  public function _get_penduduk_belum_sekolah(){
    $this->db->where('pddk_akhir', 1);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_tidak_tamat_sd(){
    $this->db->where('pddk_akhir', 2);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_tamat_sd(){
    $this->db->where('pddk_akhir', 3);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_tamat_smp(){
    $this->db->where('pddk_akhir', 4);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_tamat_sma(){
    $this->db->where('pddk_akhir', 5);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_diploma(){
    $this->db->where('pddk_akhir', 6);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_diplomaIII(){
    $this->db->where('pddk_akhir', 7);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_sarjana(){
    $this->db->where('pddk_akhir', 8);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_magister(){
    $this->db->where('pddk_akhir', 9);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function _get_penduduk_doktoral(){
    $this->db->where('pddk_akhir', 10);
    $this->db->get('master_data_penduduk_');
    return;
  }

  public function get_nik_one($nik){
    $this->db->where('no_nik', $nik);
    return $this->db->get('master_data_penduduk_');
    
  }


// =----------------------------------=






  public function _get_data_nik($nik){
    $this->db->select('*')
    ->from('master_data_penduduk_')
    ->where('no_nik', $nik)
    ->or_where('nama', $nik);
    return $this->db->get();
    // return $this->db->get_where('master_data_penduduk_', array('no_nik'=>$nik));
  }

  public function _get_id_nik($id){
    return $this->db->get_where('master_data_penduduk_', array('id'=>$id));
  }

  public function _post_timeline($post){
    return $this->db->insert('timeline_data_penduduk_', $post);
  }



  public function _get_data()
  {
    return $this->db->get('master_data_penduduk_');
  }

  public function edit($id, $update)
  {
    $this->db->where('id', $id);
    return $this->db->update('master_data_penduduk_', $update);
  }

  public function input_penduduk($insert)
  {
    return $this->db->insert('master_data_penduduk_', $insert);
  }

  public function update_penduduk($id, $update){
    $this->db->where('id', $id);
    return $this->db->update('master_data_penduduk_', $update);
  }

  public function upload_data($filename)
  {
    ini_set('memory_limit', '-1');
    $inputFileName = './assets/uploader/import/'.$filename;
    try {
    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
    } catch(Exception $e) {
    die('Error loading file :' . $e->getMessage());
    }

    $worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    $numRows = count($worksheet);

    for ($i=1; $i < ($numRows+1) ; $i++) {
      $ins = array(
          'no_kk'                      => $worksheet[$i]['A'],
          'no_nik'                     => $worksheet[$i]['B'],
          'no_akta'                    => $worksheet[$i]['C'],
          'nama'                       => $worksheet[$i]['D'],
          'jenis_kelamin'              => $worksheet[$i]['E'],
          'tempat_lahir'               => $worksheet[$i]['F'],
          'tanggal_lahir'              => $worksheet[$i]['G'],
          'agama'                      => $worksheet[$i]['H'],
          'status'                     => $worksheet[$i]['I'],
          'shdk'                       => $worksheet[$i]['J'],
          'darah'                      => $worksheet[$i]['K'],
          'suku'                       => $worksheet[$i]['L'],
          'nama_ayah'                  => $worksheet[$i]['M'],
          'nama_ibu'                   => $worksheet[$i]['N'],
          'pddk_akhir'                 => $worksheet[$i]['O'],
          'pekerjaan'                  => $worksheet[$i]['P'],
          'disabilitas'                => $worksheet[$i]['Q'],
          'akseptor'                   => $worksheet[$i]['R'],
          'lembaga_pemerintahan'       => $worksheet[$i]['S'],
          'lembaga_kemasyarakatan'     => $worksheet[$i]['T'],
          'alamat'                     => $worksheet[$i]['U'],
          'rt'                         => $worksheet[$i]['V'],
          'dusun'                      => $worksheet[$i]['W'],
          'desa'                       => $worksheet[$i]['X'],
          'kecamatan'                  => $worksheet[$i]['Y'],
          'kabupaten'                  => $worksheet[$i]['Z'],
          'provinsi'                   => $worksheet[$i]['AA'],
          'kewarganegaraan'            => $worksheet[$i]['AB']
           );

      $this->db->insert('master_data_penduduk_', $ins);
    }
  }


}