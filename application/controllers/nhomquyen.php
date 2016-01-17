<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nhomquyen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mnhomquyen");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/nhomquyen_view';
       	$this->_data['title'] = 'Nhóm quyền';
       	$this->_data['info'] = $this->mnhomquyen->getList();
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{
		$ma = $_POST["NQ_MA"];
		$ten = $_POST['NQ_TEN'];

		$msg = array();

		$data = array(
            "NQ_MA" => $ma,
       		"NQ_TEN" => $ten,
        );

		$status = "error";

        if($this->mnhomquyen->testTen($ten))
        {
        	$msg["NQ_TEN"] = "Trùng tên";
        }
        else
        {
        	if($this->mnhomquyen->testMa($ma))
			{
				$this->mnhomquyen->update($ma, $data);
			}
			else
			{
				$this->mnhomquyen->insert($data);
			}
			$status = "success";
        }

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function data()
	{
		$data = $this->mnhomquyen->getList();

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();

		if(!($this->mnhomquyen->testMa($ma)))
		{
			$msg["ma"] = "Mã không tồn tại";
		}

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
			$status = "success";
            $this->mnhomquyen->delete($ma);
		}

		$response = array('status' => $status,'msg' => $msg,'dta' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}