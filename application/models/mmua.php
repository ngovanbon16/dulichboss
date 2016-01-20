<?php
class Mmua extends CI_Model {
    protected $_table = 'mua';
    function __construct()
        {
            parent::__construct();
        }

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("M_MA", "asc");
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

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('M_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("M_MA", $id);
        $this->db->update($this->_table, $data_update);
    }

    function testMa($ma) 
    {
        $this -> db -> select('M_MA, M_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('M_MA', $ma);
        $this -> db -> limit(1);
        $query = $this -> db -> get();           
        if($query -> num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    } 

    function testTen($ten) 
    {
        $this -> db -> select('M_MA, M_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('M_TEN', $ten);
        $this -> db -> limit(1);
        $query = $this -> db -> get();           
        if($query -> num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }              
}            
?>