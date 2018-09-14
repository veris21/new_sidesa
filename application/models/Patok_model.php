<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Patok_model extends CI_Model{
    var $table = 'koordinat_batas_RTRW';
    var $column_order = array(null, 'id_batas','lat','lng'); //set column field database for datatable orderable
    var $column_search = array('id_batas','lat','lng'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

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
}