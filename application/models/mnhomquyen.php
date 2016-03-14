<?php
class Mnhomquyen extends CI_Model {
    protected $_table = 'nhomquyen';
    function __construct()
        {
            parent::__construct();
        }

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("NQ_TEN", "asc");
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

    public function getid($id){
        $this->db->select('*');
        $this->db->where('NQ_MA',$id);
        $this->db->from($this->_table);
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

    public function countAll(){
        return $this->db->count_all($this->_table); 
    }

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('NQ_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("NQ_MA", $id);
        return $this->db->update($this->_table, $data_update);
    }

    function testMa($ma) 
    {
        $this -> db -> select('NQ_MA, NQ_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('NQ_MA', $ma);
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
        $this -> db -> select('NQ_MA, NQ_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('NQ_TEN', $ten);
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

    function nhomquyennguoidung($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('nguoidung', 'nhomquyen.NQ_MA = nguoidung.NQ_MA');
        $this->db->where("nhomquyen.NQ_MA", $id);
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