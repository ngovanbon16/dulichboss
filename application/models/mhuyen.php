<?php
class Mhuyen extends CI_Model {
    protected $_table = 'huyen';
    function __construct()
        {
            parent::__construct();
        }

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("H_TEN", "asc");
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
        $string = "SELECT * FROM ".$this->_table." JOIN tinh ON huyen.T_MA = tinh.T_MA ".$query;
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

    public function getid($id) // lay cac huyen theo ma tinh
    {
        $this->db->select('*');
        $this->db->where('T_MA',$id);
        $this->db->order_by("H_TEN", "asc");
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

    public function getma($matinh, $tenhuyen)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("T_MA", $matinh);
        $this->db->where("H_TEN", $tenhuyen);
        $query = $this ->db->get();           
        return $query->row_array();
    }

    public function getten($matinh, $id)// lay ten cua huyen
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("T_MA", $matinh);
        $this->db->where("H_MA", $id);
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

    public function countAll2($query) // them ngay 15/3
    {
        $string = "SELECT * FROM ".$this->_table." JOIN tinh ON huyen.T_MA = tinh.T_MA ".$query;
        $query = $this->db->query($string);          
        return $query->num_rows();
    }

    public function countAll(){
        return $this->db->count_all($this->_table); 
    }

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('H_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("H_MA", $id);
        return $this->db->update($this->_table, $data_update);
    }

    function testMa($ma) 
    {
        $this -> db -> select('T_MA, H_MA, H_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('H_MA', $ma);
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

    function huyenxa($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('xa', 'huyen.H_MA = xa.H_MA');
        $this->db->where("huyen.H_MA", $id);
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

    function huyendiadiem($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('diadiem', 'huyen.H_MA = diadiem.H_MA');
        $this->db->where("huyen.H_MA", $id);
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

    function huyennguoidung($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('nguoidung', 'huyen.H_MA = nguoidung.H_MA');
        $this->db->where("huyen.H_MA", $id);
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

    /*function testMa($matinh, $ma) 
    {
        $this -> db -> select('T_MA, H_MA, H_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('T_MA', $matinh);
        $this -> db -> where('H_MA', $ma);
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

    function testTen($matinh, $ten) 
    {
        $this -> db -> select('T_MA, H_MA, H_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('T_MA', $matinh);
        $this -> db -> where('H_TEN', $ten);
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
    } */             
}            
?>