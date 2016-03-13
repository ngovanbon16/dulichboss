<?php
class Mdanhmuc extends CI_Model {
    protected $_table = 'danhmuc';
    function __construct()
        {
            parent::__construct();
        }

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("DM_MA", "asc");
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

    public function getList2($query) // dung cho trang quan ly
    {
        $string = "SELECT * FROM ".$this->_table." ".$query;
        $query = $this->db->query($string);          
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return $query->result_array();
        }
    }

    function getId($ma) 
    {
        $this ->db->select('*');
        $this ->db->from($this->_table);
        $this ->db->where('DM_MA', $ma);
        $this ->db->limit(1);
        $query = $this->db->get();           
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        else
        {
            return $query->row_array(); //row_array() moi co the lay du lieu truc tiep duoc
        }
    }

    public function countAll(){
        return $this->db->count_all($this->_table); 
    }

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('DM_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("DM_MA", $id);
        return $this->db->update($this->_table, $data_update);
    }

    function testMa($ma) 
    {
        $this -> db -> select('DM_MA, DM_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('DM_MA', $ma);
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
        $this -> db -> select('DM_MA, DM_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('DM_TEN', $ten);
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

    function danhmucdiadiem($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('diadiem', 'diadiem.DM_MA = danhmuc.DM_MA');
        $this->db->where("diadiem.DM_MA", $id);
        $query = $this->db->get();           
        if($query->num_rows() > 0)
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