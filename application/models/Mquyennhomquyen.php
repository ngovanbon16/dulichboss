<?php
class Mquyennhomquyen extends CI_Model {
    protected $_table = 'quyen_nhomquyen';
    function __construct()
    {
        parent::__construct();
    }

    public function countAll(){
        return $this->db->count_all($this->_table); 
    }

    public function insert($data_insert){
        return $this->db->insert($this->_table,$data_insert);
    }

    public function delete($idnq, $idq)
    {
        $this->db->where('NQ_MA', $idnq);
        $this->db->where('Q_MA', $idq);
        $this->db->delete($this->_table);
    }

    public function update($id, $data_update){
        $this->db->where("Q_MA", $id);
        return $this->db->update($this->_table, $data_update);
    }

    public function gettimkiem($query) // dung cho trang quan ly
    {
        $query = $this->db->query($query);          
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return $query->result_array();
        }
    }
             
}            
?>