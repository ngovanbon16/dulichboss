<?php
class Mlogin extends CI_Model {
    protected $_table = 'nguoidung';
    function __construct()
        {
            parent::__construct();
        }
    function testEmail($email) 
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

     function testpassword($email, $password) 
    {
        $this -> db -> select('ND_MA, ND_DIACHIMAIL, ND_MATKHAU');
        $this -> db -> from($this->_table);
        $this -> db -> where('ND_DIACHIMAIL', $email);
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

    function getuser($email, $password) 
    {
        $this -> db -> select('ND_MA, ND_DIACHIMAIL, ND_MATKHAU, ND_HINH');
        $this -> db -> from($this->_table);
        $this -> db -> where('ND_DIACHIMAIL', $email);
        $this -> db -> where('ND_MATKHAU', md5($password));
        $this -> db -> limit(1);
        $query = $this -> db -> get();           
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }  

    public function kichhoat($id)
    {
        $this -> db -> select('ND_MA, ND_KICHHOAT');
        $this -> db -> from($this->_table);
        $this -> db -> where('ND_DIACHIMAIL', $id);
        $this -> db -> where('ND_KICHHOAT', "1");
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
}            
?>