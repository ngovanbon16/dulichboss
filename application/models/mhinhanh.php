<?php
class Mhinhanh extends CI_Model {
    protected $_table = 'hinhanh';
    function __construct()
        {
            parent::__construct();
        }

    public function getList()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("HA_NGAYDANG", "desc");
        $this->db->order_by("HA_DUYET", "asc");
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

    public function getList1($size, $star) // dung cho load du lieu tung phan
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
            return $query->result_array();
        }
    }

    public function getID($id) // trả về một dòng không cần dùng for để lấy giá trị
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
            return $query->row_array();
        }
    }

    public function getloc($madd)// loc hinh anh da duyet trong xem chi tiet dia diem
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('DD_MA', $madd);
        $query = $this->db->get();           
        if($query->num_rows() > 0)
        {
            return $query->result_array(); // trả về một mảng nhiều hơn 1 dòng phải dùng for để lấy giá trị
        }
        else
        {
            return $query->result_array();
        }
    }

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function maxid()
    {
        /*$this->db->select('*');
        $this->db->select_max("HA_MA");*/
        $query = $this->db->query("select max(HA_MA) maxid from hinhanh");
        //$this->db->from($this->_table);
        //$max = $this->db->get();
        $data = $query->row_array();
        return $data;
    }

    public function delete($ten)
    {
        $this->db->where('HA_TEN', $ten);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("HA_MA", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function updateanhdaidien($madd, $id, $data_update){ // update anh dai dien cho mot dia diem madd: mã địa điểm, 
        $this->db->where("DD_MA", $madd);
        $this->db->where("HA_MA", $id);
        $this->db->update($this->_table, $data_update);
    }
           
}