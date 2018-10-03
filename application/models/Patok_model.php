<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Patok_model extends CI_Model{
    var $table = 'koordinat_batas_RTRW';
    var $column_order = array(null, 'kode_rtrw','keterangan','dasar_hukum'); //set column field database for datatable orderable
    var $column_search = array('kode_rtrw','keterangan','dasar_hukum'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

    var $table_rtrw = 'batas_RTRW';
    var $column_order_rtrw = array(null, 'kode_rtrw','keterangan','dasar_hukum'); //set column field database for datatable orderable
    var $column_search_rtrw = array('kode_rtrw','keterangan','dasar_hukum'); //set column field database for datatable searchable 
    var $order_rtrw = array('id' => 'asc'); // default order 


    var $table_aset = 'data_link';
    var $column_order_aset = array(null, 'kode_desa','lat','lng','keterangan', 'tanah_id', 'foto_tanah', null, 'status'); //set column field database for datatable orderable
    var $column_search_aset = array('keterangan'); //set column field database for datatable searchable 
    var $order_aset = array('id' => 'asc'); // default order 


    public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  public function _get_datatables_rtrw()
  {
        $this->db->from($this->table_rtrw);
        $i = 0;     
        foreach ($this->column_search_rtrw as $item_rtrw) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item_rtrw, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item_rtrw, $_POST['search']['value']);
                }
 
                if(count($this->column_search_rtrw) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_rtrw[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_rtrw))
        {
            $order = $this->order_rtrw;
            $this->db->order_by(key($order), $order[key($order)]);
        }

  }

  function get_datatables_rtrw()
  {
      $this->_get_datatables_rtrw();
      if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
      $query = $this->db->get();
      return $query->result();
  }

  function count_filtered_rtrw()
  {
      $this->_get_datatables_rtrw();
      $query = $this->db->get();
      return $query->num_rows();
  }

  public function count_all_rtrw()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }
// ===========================
  public function _get_datatables_query($id)
    {
         
        $this->db->from($this->table);
        $this->db->where('id_batas', $id);
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($id)
    {
        $this->_get_datatables_query($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($id)
    {
        $this->_get_datatables_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_batas', $id);
        return $this->db->count_all_results();
    }

    // ============================================================================
    // ===========================
  public function _get_aset_query($id)
  {
       
      $this->db->from($this->table_aset);
      $this->db->like('tanah_id', $id);
      $i = 0;
   
      foreach ($this->column_search_aset as $item) // loop column 
      {
          if($_POST['search']['value']) // if datatable send POST for search
          {                 
              if($i===0) // first loop
              {
                  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                  $this->db->like($item, $_POST['search']['value']);
              }
              else
              {
                  $this->db->or_like($item, $_POST['search']['value']);
              }

              if(count($this->column_search_aset) - 1 == $i) //last loop
                  $this->db->group_end(); //close bracket
          }
          $i++;
      }
       
      if(isset($_POST['order'])) // here order processing
      {
          $this->db->order_by($this->column_order_aset[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } 
      else if(isset($this->order_aset))
      {
          $order = $this->order_aset;
          $this->db->order_by(key($order), $order[key($order)]);
      }
  }

  function get_aset($id)
  {
      $this->_get_aset_query($id);
      if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
      $query = $this->db->get();
      return $query->result();
  }

  function count_filtered_aset($id)
  {
      $this->_get_aset_query($id);
      $query = $this->db->get();
      return $query->num_rows();
  }

  public function count_all_aset($id)
  {
      $this->db->from($this->table_aset);
      $this->db->like('tanah_id', $id);
      return $this->db->count_all_results();
  }
}