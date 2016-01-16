<?php
class Mregistration extends CI_Model {
    protected $_table = 'nguoidung';
    function __construct()
        {
            parent::__construct();
        }
    public function testEmail($email) 
    {
        $this -> db -> select('ND_MA, ND_DIACHIMAIL, ND_MATKHAU');
        $this -> db -> from($this->_table);
        $this -> db -> where('ND_DIACHIMAIL', $email);
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

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }     

    public function getid($email){
        $this->db->select('ND_MA, ND_DIACHIMAIL');
        $this->db->from($this->_table);
        $this->db->where("ND_DIACHIMAIL", $email);
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
}            
?>