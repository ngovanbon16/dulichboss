<?php
class Mbinhluan extends CI_Model {
    protected $_table = 'binhluan';
    function __construct()
        {
            parent::__construct();
        }

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $query = $this -> db -> get();           
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    public function getList1($size, $star)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("BL_MA", "asc");
        $this->db->limit($size, $star);
        $query = $this->db->get();           
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    public function getID($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("BL_MA", $id);
        $query = $this ->db->get();           
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        else
        {
            return $query->row_array();
        }
    }

    public function countAll(){
        return $this->db->count_all($this->_table); 
    }

    public function insert($data_insert){
        return $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('BL_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("BL_MA", $id);
        $this->db->update($this->_table, $data_update);
    }             
}            
?>