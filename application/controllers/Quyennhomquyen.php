<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quyennhomquyen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mquyennhomquyen");
    }

    public function phanquyen()
    {
        $NQ_MA = $_POST['NQ_MA'];
        $Q_MA = $_POST['Q_MA'];
        $checked = $_POST['checked'];

        $data = array(
            'NQ_MA' => $NQ_MA,
            'Q_MA' =>  $Q_MA
        );

        if($checked == "true")
        {
            $this->mquyennhomquyen->insert($data);
        }
        
        if($checked == "false")
        {
            $this->mquyennhomquyen->delete($NQ_MA, $Q_MA);
            //$query = "DELETE FROM q_nq WHERE NQ_MA = '".$NQ_MA."' ";
            //$this->mquyennhomquyen->query($query);
        }

        $jsonString = json_encode($NQ_MA);
        echo $jsonString;
    }
}