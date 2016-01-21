<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diadiem extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mdiadiem");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/diadiem_view';
       	$this->_data['title'] = 'Địa điểm';
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{
		$ma = $_POST["ND_MA"];
		$kichhoat = $_POST['ND_KICHHOAT'];

		$msg = array();

		date_default_timezone_set('Asia/Ho_Chi_Minh');  
        $date = date('Y-m-d H:i:s');

		$data = array(
            "ND_MA" => $ma,
       		"ND_KICHHOAT" => $kichhoat,
       		"ND_NGAYCAPNHAT" => $date
        );

		$status = "error";

        if($this->mdiadiem->testMa($ma))
		{
			$this->mdiadiem->update($ma, $data);
			$status = "success";
		}
		else
		{
			//$this->mdiadiem->insert($data);
			$status = "success";
		}
			
        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function data()
	{
		$data = $this->mdiadiem->getList();

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();

		if(!($this->mdiadiem->testMa($ma)))
		{
			$msg["ma"] = "Mã không tồn tại";
		}

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
            $this->mdiadiem->delete($ma);
            $status = "success";
		}

		$response = array('status' => $status,'msg' => $msg,'dta' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

}