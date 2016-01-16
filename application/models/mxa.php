<?php
class Mxa extends CI_Model {
    protected $_table = 'xa';
    function __construct()
        {
            parent::__construct();
        }

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("X_TEN", "asc");
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

    public function getid($id1, $id){
        $this->db->select('*');
        $this->db->where('T_MA',$id1);
        $this->db->where('H_MA',$id);
        $this->db->order_by("X_TEN", "asc");
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

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function delete($matinh, $mahuyen, $id)
    {
        $this->db->where('T_MA', $matinh);
        $this->db->where('H_MA', $mahuyen);
        $this->db->where('X_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($matinh, $mahuyen, $id, $data_update){
        $this->db->where("T_MA", $matinh);
        $this->db->where("H_MA", $mahuyen);
        $this->db->where("X_MA", $id);
        $this->db->update($this->_table, $data_update);
    }

    function testMa($matinh, $mahuyen, $ma) 
    {
        $this -> db -> select('T_MA, H_MA, X_MA, X_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('T_MA', $matinh);
        $this -> db -> where('H_MA', $mahuyen);
        $this -> db -> where('X_MA', $ma);
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

    function testTen($matinh, $mahuyen, $ten) 
    {
        $this -> db -> select('T_MA, H_MA, X_MA, X_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('T_MA', $matinh);
        $this -> db -> where('H_MA', $mahuyen);
        $this -> db -> where('X_TEN', $ten);
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