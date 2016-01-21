<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Huyen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mhuyen");
    }

    public function index()
    {
        $this->_data['subview'] = 'admin/huyen_view';
        $this->_data['title'] = 'Quận/Huyện';
        $this->_data['info'] = $this->mhuyen->getList();
        $this->load->view('main.php', $this->_data);
    }

    public function add()
    {
        $matinh = $_POST["T_MA"];
        $ma = $_POST["H_MA"];
        $ten = $_POST['H_TEN'];

        $msg = array();

        $data = array(
            "T_MA" => $matinh,
            "H_MA" => $ma,
            "H_TEN" => $ten,
        );

        $status = "error";

        if($this->mhuyen->testTen($matinh, $ten))
        {
            $msg["H_TEN"] = "Trùng tên";
        }
        else
        {
            if($this->mhuyen->testMa($matinh, $ma))
            {
                $this->mhuyen->update($matinh, $ma, $data);
            }
            else
            {
                $this->mhuyen->insert($data);
                $msg["insert"] = "insert";
            }
            $status = "success";
        }

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
        $jsonString = json_encode($response);
        echo $jsonString;
    }

    public function data($id)
    {
        $data = $this->mhuyen->getid($id);
        if(!($data))
        {
            $arrayName = array('0' => "Không có huyện", );
            $data = $arrayName;
        }

        $jsonString = json_encode($data);
        echo $jsonString;
    }

    public function delete()
    {
        $matinh = $_POST["T_MA"];
        $ma = $_POST["H_MA"];
        $msg = array();

        if(!($this->mhuyen->testMa($matinh, $ma)))
        {
            $msg["ma"] = "Mã không tồn tại";
        }

        $status = "error";
        if(count($msg) == 0)
        {
            $status = "success";
            $this->mhuyen->delete($matinh, $ma);
        }

        $response = array('status' => $status,'msg' => $msg);
        $jsonString = json_encode($response);
        echo $jsonString;
    }
}