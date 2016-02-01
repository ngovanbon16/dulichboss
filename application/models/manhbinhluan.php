<?php
class Manhbinhluan extends CI_Model {
    protected $_table = 'anhbinhluan';
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

    public function getList1($size, $star)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("ABL_MA", "asc");
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
        $this->db->where("ABL_MA", $id);
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

    public function max()// được sử dụng để up anh cho bình luận: luu y id luon tang len nen trong du lieu phai co it nhat mot dong
    {
        $query = $this->db->query("SELECT MAX(ABL_MA) maxid FROM anhbinhluan");
        return $query->row_array();
    }

    public function insert($data_insert){
        return $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('ABL_MA', $id);
        return $this->db->delete($this->_table);
    }            
}            
?>