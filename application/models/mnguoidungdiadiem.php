<?php
class Mnguoidungdiadiem extends CI_Model {
    protected $_table = 'nguoidung_diadiem';
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

    public function getchitiet($mand, $madd) // hien thi cho trang chi tiet dia diem
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('ND_MA', $mand);
        $this->db->where('DD_MA', $madd);
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

    public function getList1($size, $star)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
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
        $this->db->where("DD_MA", $id);
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
        $this->db->where('DD_MA', $id);
        $this->db->where('ND_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($mand, $madd, $data_update){
        $this->db->where('ND_MA', $mand);
        $this->db->where('DD_MA', $madd);
        $this->db->update($this->_table, $data_update);
    }        

    function testMa($mand, $madd) 
    {
        $this -> db -> select('*');
        $this -> db -> from($this->_table);
        $this->db->where('ND_MA', $mand);
        $this->db->where('DD_MA', $madd);
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