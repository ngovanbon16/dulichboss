<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tinh extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mtinh");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/tinh_view';
       	$this->_data['title'] = 'Tỉnh/Thành phố';
       	$this->_data['info'] = $this->mtinh->getList();
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{
		$ma = $_POST["T_MA"];
		$ten = $_POST['T_TEN'];

		$msg = array();

		$data = array(
            "T_MA" => $ma,
       		"T_TEN" => $ten,
        );

		$status = "error";

        if($this->mtinh->testTen($ten))
        {
        	$msg["T_TEN"] = "Trùng tên";
        }
        else
        {
        	if($this->mtinh->testMa($ma))
			{
				$this->mtinh->update($ma, $data);
			}
			else
			{
				$this->mtinh->insert($data);
			}
			$status = "success";
        }

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function add1()
	{
		$ma = $_POST["ma"];
		$ten = $_POST["ten"];
		$msg = array();

		if($this->mtinh->testMa($ma))
		{
			$msg["ma"] = "Mã đã tồn tại";
		}

		if(empty($ten))
		{
			$msg["ten"] = "Tên không được rỗng";
		} else if($this->mtinh->testTen($ten))
		{
			$msg["ten"] = "Tên đã tồn tại";
		}

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
			/*$i=0;
			for($i; $i<1000; $i++)
			{
				$status = "success";
				$data_insert = array(
               "T_TEN" => "Tỉnh ".$i,
            	);
            	$this->mtinh->insert($data_insert);
            	$data = $this->show();
			}*/
			$status = "success";
			$data_insert = array(
               "T_MA" => $ma,
               "T_TEN" => $ten,
            );
            $this->mtinh->insert($data_insert);
            $data = $this->show();
		}

		$response = array('status' => $status,'msg' => $msg,'dta' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function data()
	{
		$data = $this->mtinh->getList();

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();

		if(!($this->mtinh->testMa($ma)))
		{
			$msg["ma"] = "Mã không tồn tại";
		}

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
			$status = "success";
            $this->mtinh->delete($ma);
		}

		$response = array('status' => $status,'msg' => $msg,'dta' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}