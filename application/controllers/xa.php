<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Xa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mxa");
    }

    public function index()
    {
        $this->_data['subview'] = 'admin/xa_view';
        $this->_data['title'] = lang('town');
        //$this->_data['info'] = $this->mxa->getList();
        $this->load->view('main.php', $this->_data);
    }

    public function add()
    {
        $matinh = $_POST["T_MA"];
        $mahuyen = $_POST["H_MA"];
        $ma =$_POST["X_MA"];
        $ten = $_POST['X_TEN'];

        $msg = array();

        $data = array(
            "T_MA" => $matinh,
            "H_MA" => $mahuyen,
            "X_MA" => $ma,
            "X_TEN" => $ten
        );

        $status = "error";

        
            if($this->mxa->testMa($matinh, $mahuyen, $ma))
            {
                $this->mxa->update($matinh, $mahuyen, $ma, $data);
                $status = "success";
            }
            else
            {
                if($this->mxa->testTen($matinh, $mahuyen, $ten))
                {
                    $msg["X_TEN"] = "Trùng tên";
                }
                else
                {
                    $this->mxa->insert($data);
                    $msg["insert"] = "insert";
                    $status = "success";
                }
            }
            
        

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
        $jsonString = json_encode($response);
        echo $jsonString;
    }

    public function data($matinh, $mahuyen)
    {

        $data = $this->mxa->getid($matinh, $mahuyen);

        //$data["tinh"] = $matinh;
        //$data["huyen"] = $mahuyen;

        $jsonString = json_encode($data);
        echo $jsonString;
    }

    public function delete()
    {
        $matinh = $_POST["T_MA"];
        $mahuyen = $_POST["H_MA"];
        $ma = $_POST["X_MA"];
        $msg = array();

        if(!($this->mxa->testMa($matinh, $mahuyen, $ma)))
        {
            $msg["ma"] = "Mã không tồn tại";
        }

        $status = "error";
        if(count($msg) == 0)
        {
            $status = "success";
            $this->mxa->delete($matinh, $mahuyen, $ma);
        }

        $response = array('status' => $status,'msg' => $msg);
        $jsonString = json_encode($response);
        echo $jsonString;
    }
}