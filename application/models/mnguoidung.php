<?php
class Mnguoidung extends CI_Model {
    protected $_table = 'nguoidung';
    function __construct()
        {
            parent::__construct();
        }

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("ND_NGAYTAO", "desc");
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
        $this->db->order_by("ND_NGAYCAPNHAT", "desc");
        $this->db->order_by("ND_NGAYTAO", "desc");
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
        $this->db->where("ND_MA", $id);
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
        $this->db->where('ND_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("ND_MA", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function updatexacnhan($email, $data_update){
        $query = $this->getList();
        $test = 0;
        foreach ($query as $item) {
            if($email == md5($item["ND_DIACHIMAIL"]))
            {
                if($item["ND_KICHHOAT"] != "1")
                {
                    $email=$item["ND_DIACHIMAIL"];
                    $test = 1;
                    $this->db->where("ND_DIACHIMAIL", $email);
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
        $this -> db -> select('ND_MA');
        $this -> db -> from($this->_table);
        $this -> db -> where('ND_MA', $ma);
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
        $this -> db -> select('ND_MA, ND_MATKHAU');
        $this -> db -> from($this->_table);
        $this -> db -> where('ND_MA', $id);
        $this -> db -> where('ND_MATKHAU', md5($password));
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
        $this -> db -> where('ND_DIACHIMAIL', $email);
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

    function nguoidungdiadiem($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('diadiem', 'nguoidung.ND_MA = diadiem.ND_MA');
        $this->db->where("nguoidung.ND_MA", $id);
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