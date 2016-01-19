<?php
class Mmap extends CI_Model {
    protected $_table = 'map';
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
            return $query->result_array();
        }
    }

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('T_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("T_MA", $id);
        $this->db->update($this->_table, $data_update);
    }           
}            
?>