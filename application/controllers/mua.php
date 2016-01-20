<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mua extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mmua");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/mua_view';
       	$this->_data['title'] = 'Các mùa trong năm';
       	$this->_data['info'] = $this->mmua->getList();
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{
		$ma = $_POST["M_MA"];
		$ten = $_POST['M_TEN'];

		$msg = array();

		$data = array(
            "M_MA" => $ma,
       		"M_TEN" => $ten,
        );

		$status = "error";

        if($this->mmua->testMa($ma))
		{
			$this->mmua->update($ma, $data);
		}
		else
		{
			$this->mmua->insert($data);
		}
		$status = "success";

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function data()
	{
		$data = $this->mmua->getList();

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();

		if(!($this->mmua->testMa($ma)))
		{
			$msg["ma"] = "Mã không tồn tại";
		}

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
			$status = "success";
            $this->mmua->delete($ma);
		}

		$response = array('status' => $status,'msg' => $msg,'dta' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}