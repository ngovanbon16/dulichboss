<?php
class Mdiadiem extends CI_Model {
    protected $_table = 'diadiem';
    function __construct()
        {
            parent::__construct();
        }

    public function show()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('danhmuc', 'danhmuc.DM_MA = diadiem.DM_MA');
        $this->db->join('nguoidung', 'nguoidung.ND_MA = diadiem.ND_MA');
        $this->db->order_by("DD_NGAYDANG", "desc");
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

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("DD_NGAYDANG", "desc");
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

    public function getList1($size, $star) // dung cho load du lieu tung phan
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join("danhmuc", "danhmuc.DM_MA=diadiem.DM_MA");
        $this->db->order_by("diadiem.DD_NGAYCAPNHAT", "desc");
        $this->db->order_by("diadiem.DD_NGAYDANG", "desc");
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

    public function countAll(){ // dung cho load du lieu tung phan
        return $this->db->count_all($this->_table); 
    }

    public function getID($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("DD_MA", $id);
        $query = $this -> db -> get();           
        if($query->num_rows() > 0)
        {
            return $query->row_array();
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
        $this->db->where('DD_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("DD_MA", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function updatexacnhan($email, $data_update){
        $query = $this->getList();
        $test = 0;
        foreach ($query as $item) {
            if($email == md5($item["DD_DIACHIMAIL"]))
            {
                if($item["DD_KICHHOAT"] != "1")
                {
                    $email=$item["DD_DIACHIMAIL"];
                    $test = 1;
                    $this->db->where("DD_DIACHIMAIL", $email);
                    $this->db->update($this->_table, $data_update);
                }
                else
                {
                    $test = 2;
                }
            }
        }
        return $test;
    }

    function testMa($ma) 
    {
        $this -> db -> select('DD_MA');
        $this -> db -> from($this->_table);
        $this -> db -> where('DD_MA', $ma);
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

    public function testTen($ten) 
    {
        $this -> db -> select('DD_MA, DD_TEN');
        $this -> db -> from($this->_table);
        $this -> db -> where('DD_TEN', $ten);
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

    function testpassword($id, $password)
    {
        $this -> db -> select('DD_MA, DD_MATKHAU');
        $this -> db -> from($this->_table);
        $this -> db -> where('DD_MA', $id);
        $this -> db -> where('DD_MATKHAU', md5($password));
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

    function testEmail($email) 
    {
        $this -> db -> select('*');
        $this -> db -> from($this->_table);
        $this -> db -> where('DD_DIACHIMAIL', $email);
        //$this -> db -> limit(1);
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

    function diadiemhinhanh($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('hinhanh', 'hinhanh.DD_MA = diadiem.DD_MA');
        $this->db->where("diadiem.DD_MA", $id);
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