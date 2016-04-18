<?php
class Mthongtin extends CI_Model {
    protected $_table = 'thongtin';
    function __construct()
    {
        parent::__construct();
    }

    public function getID($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("TT_MA", $id);
        $query = $this -> db -> get();           
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        else
        {
            return $query->row_array();
        }
    }

    public function insert($data_insert){
        return $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('TT_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("TT_MA", $id);
        return $this->db->update($this->_table, $data_update);
    } 
}
?>