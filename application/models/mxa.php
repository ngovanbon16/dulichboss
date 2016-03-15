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
            return $query->result_array();
        }
     }

    public function getList2($query) // dung cho trang quan ly
    {
        $string = "SELECT * FROM ".$this->_table." JOIN huyen ON huyen.H_MA = xa.H_MA JOIN tinh ON tinh.T_MA = xa.T_MA ".$query;
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

    public function countAll2($query) // them ngay 15/3
    {
        $string = "SELECT * FROM ".$this->_table." JOIN huyen ON huyen.H_MA = xa.H_MA JOIN tinh ON tinh.T_MA = xa.T_MA ".$query;
        $query = $this->db->query($string);          
        return $query->num_rows();
    }

    public function countAll(){
        return $this->db->count_all($this->_table); 
    }

    public function getma($matinh, $mahuyen, $tenxa)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("T_MA", $matinh);
        $this->db->where("H_MA", $mahuyen);
        $this->db->where("X_TEN", $tenxa);
        $query = $this ->db->get();           
        return $query->row_array();
    }

    public function getten($matinh, $mahuyen, $id)// lay ten cua xa
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("T_MA", $matinh);
        $this->db->where("H_MA", $mahuyen);
        $this->db->where("X_MA", $id);
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

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('X_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("X_MA", $id);
        return $this->db->update($this->_table, $data_update);
    }

    function testMa($ma) 
    {
        $this -> db -> select('T_MA, H_MA, X_MA, X_TEN');
        $this -> db -> from($this->_table);
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

    function xadiadiem($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('diadiem', 'xa.X_MA = diadiem.X_MA');
        $this->db->where("xa.X_MA", $id);
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

    function xanguoidung($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('nguoidung', 'xa.X_MA = nguoidung.X_MA');
        $this->db->where("xa.X_MA", $id);
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