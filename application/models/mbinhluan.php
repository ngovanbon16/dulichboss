<?php
class Mbinhluan extends CI_Model {
    protected $_table = 'binhluan';
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

    public function getList1($size, $star) // dung cho load du lieu tung phan
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join("diadiem", "diadiem.DD_MA=binhluan.DD_MA");
        $this->db->join("nguoidung", "nguoidung.ND_MA=binhluan.ND_MA");
        $this->db->order_by("binhluan.BL_NGAYDANG", "desc");
        $this->db->limit($size, $star);
        $query = $this->db->get();           
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return $query->result_array();
        }
    }

    public function countAll(){ // dung cho load du lieu tung phan
        return $this->db->count_all($this->_table); 
    }

    public function getID($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("BL_MA", $id);
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
        $query = $this->db->query("SELECT MAX(BL_MA) maxid FROM binhluan");
        return $query->row_array();
    }

    public function insert($data_insert){
        return $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('BL_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("BL_MA", $id);
        $this->db->update($this->_table, $data_update);
    }             
}            
?>