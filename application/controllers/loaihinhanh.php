<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loaihinhanh extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mloaihinhanh");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/loaihinhanh_view';
       	$this->_data['title'] = 'Loại hình ảnh';
       	$this->_data['info'] = $this->mloaihinhanh->getList();
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{
		$ma = $_POST["LHA_MA"];
		$ten = $_POST['LHA_TEN'];

		$msg = array();

		$data = array(
            "LHA_MA" => $ma,
       		"LHA_TEN" => $ten,
        );

		$status = "error";

        if($this->mloaihinhanh->testTen($ten))
        {
        	$msg["LHA_TEN"] = "Trùng tên";
        }
        else
        {
        	if($this->mloaihinhanh->testMa($ma))
			{
				$this->mloaihinhanh->update($ma, $data);
			}
			else
			{
				$this->mloaihinhanh->insert($data);
				$msg["insert"] = "insert";
			}
			$status = "success";
        }

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function data()
	{
		$data = $this->mloaihinhanh->getList();

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();

		if(!($this->mloaihinhanh->testMa($ma)))
		{
			$msg["ma"] = "Mã không tồn tại";
		}

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
			$status = "success";
            $this->mloaihinhanh->delete($ma);
		}

		$response = array('status' => $status,'msg' => $msg,'dta' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}