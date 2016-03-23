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

    public function getList2($query) // dung cho trang quan ly
    {
        $string = "SELECT * FROM ".$this->_table." JOIN nguoidung ON nguoidung.ND_MA = binhluan.ND_MA JOIN diadiem ON diadiem.DD_MA = binhluan.DD_MA ".$query;
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
        $string = "SELECT * FROM ".$this->_table." JOIN nguoidung ON nguoidung.ND_MA = binhluan.ND_MA JOIN diadiem ON diadiem.DD_MA = binhluan.DD_MA ".$query;
        $query = $this->db->query($string);          
        return $query->num_rows();
    }

    public function countAll(){ // dung cho load du lieu tung phan
        return $this->db->count_all($this->_table); 
    }

    public function countbinhluan($iddd){ // dung cho dem so luong binh luan
        $this->db->where("DD_MA", $iddd);
        $this->db->from($this->_table);
        return $this->db->count_all_results();
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

    public function getidchitiet($id) // dung chi tiet binh luan
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join("nguoidung", "nguoidung.ND_MA=binhluan.ND_MA");
        $this->db->join("diadiem", "diadiem.DD_MA=binhluan.DD_MA");
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

    public function getdd($id) // su dung quan ly chi tiet dia diem get theo ma dd
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join("nguoidung", "nguoidung.ND_MA=binhluan.ND_MA");
        $this->db->where("DD_MA", $id);
        $this->db->order_by("BL_NGAYDANG", "desc");
        $query = $this ->db->get();           
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return $query->result_array();
        }
    }

    public function max()// được sử dụng để up anh cho bình luận: luu y id luon tang len nen trong du lieu phai co it nhat mot dong
    {
        $query = $this->db->query("SELECT MAX(BL_MA) maxid FROM binhluan");
        return $query->row_array();
    }

    public function insert($data_insert){ // su dung cho them binh luan
        return $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id) // su dung xoa binh luan them ma binh luan
    {
        $this->db->where('BL_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("BL_MA", $id);
        $this->db->update($this->_table, $data_update);
    }  

    public function diemtrungbinh($iddd, $loai)// lay diem trung binh cua chat luong, phuc vu, khong gian
    {
        $this->db->select_avg($loai);
        $this->db->from($this->_table);
        $this->db->where("DD_MA", $iddd);
        $query = $this->db->get();        
        return $query->row_array();
    }           
}            
?>