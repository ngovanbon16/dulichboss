<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quyen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mquyen");
    }

    public function index()
    {
        $this->_data['subview'] = 'admin/quyen_view';
        $this->_data['title'] = 'Quyền người dùng';
        $this->_data['info'] = $this->mquyen->getList();
        $this->load->view('main.php', $this->_data);
    }

    public function add()
    {
        $manhomquyen = $_POST["NQ_MA"];
        $ma = $_POST["Q_MA"];
        $ten = $_POST['Q_TEN'];

        $msg = array();

        $data = array(
            "NQ_MA" => $manhomquyen,
            "Q_MA" => $ma,
            "Q_TEN" => $ten,
        );

        $status = "error";

        if($this->mquyen->testTen($manhomquyen, $ten))
        {
            $msg["Q_TEN"] = "Trùng tên";
        }
        else
        {
            if($this->mquyen->testMa($manhomquyen, $ma))
            {
                $this->mquyen->update($manhomquyen, $ma, $data);
            }
            else
            {
                $this->mquyen->insert($data);
            }
            $status = "success";
        }

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
        $jsonString = json_encode($response);
        echo $jsonString;
    }

    public function data($id)
    {
        $data = $this->mquyen->getid($id);
        if(!($data))
        {
            $arrayName = array('0' => "Không có quyền này", );
            $data = $arrayName;
        }

        $jsonString = json_encode($data);
        echo $jsonString;
    }

    public function delete()
    {
        $manhomquyen = $_POST["NQ_MA"];
        $ma = $_POST["Q_MA"];
        $msg = array();

        if(!($this->mquyen->testMa($manhomquyen, $ma)))
        {
            $msg["ma"] = "Mã không tồn tại";
        }

        $status = "error";
        if(count($msg) == 0)
        {
            $status = "success";
            $this->mquyen->delete($manhomquyen, $ma);
        }

        $response = array('status' => $status,'msg' => $msg);
        $jsonString = json_encode($response);
        echo $jsonString;
    }
}