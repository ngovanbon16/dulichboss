<?php
class Mbaiviet extends CI_Model {
    protected $_table = 'baiviet';
    function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("BV_NGAYDANG", "desc");
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
        $string = "SELECT * FROM ".$this->_table." JOIN diadiem ON diadiem.DD_MA = baiviet.DD_MA ".$query;
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

    public function gettimkiem($query) // dung cho trang quan ly
    {
        $query = $this->db->query($query);          
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return $query->result_array();
        }
    }

    public function getdata($query) // dung cho trang quan ly
    {
        $query = $this->db->query($query);          
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        else
        {
            return $query->row_array();
        }
    }

    public function countAll(){ // dung cho load du lieu tung phan
        return $this->db->count_all($this->_table); 
    }

    public function countid($id){ // dem theo dia diem
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("DD_MA", $id);
        $this->db->where("BV_DUYET", "1");
        $query = $this -> db -> get();           
        return $query->num_rows(); 
    }

    public function countdaduyet()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("BV_DUYET", "0");
        $query = $this -> db -> get();           
        return $query->num_rows();
    }

    public function getID($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("BV_MA", $id);
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
        $this->db->where('BV_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("BV_MA", $id);
        return $this->db->update($this->_table, $data_update);
    }

    function testMa($ma) 
    {
        $this -> db -> select('BV_MA');
        $this -> db -> from($this->_table);
        $this -> db -> where('BV_MA', $ma);
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