<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Capbac extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mcapbac");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/capbac_view';
       	$this->_data['title'] = 'Cấp bậc người dùng';
       	$this->_data['info'] = $this->mcapbac->getList();
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{
		$ma = $_POST["CB_MA"];
		$ten = $_POST['CB_TEN'];
		$diemtu = $_POST['CB_DIEMTU'];
		$diemden = $_POST['CB_DIEMDEN'];

		$msg = array();

		$data = array(
            "CB_MA" => $ma,
       		"CB_TEN" => $ten,
       		"CB_DIEMTU" => $diemtu,
       		"CB_DIEMDEN" => $diemden
        );

		$status = "error";

        if($this->mcapbac->testMa($ma))
		{
			$this->mcapbac->update($ma, $data);
		}
		else
		{
			$this->mcapbac->insert($data);
			$msg["insert"] = "insert";
		}
		$status = "success";

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function data()
	{
		$data = $this->mcapbac->getList();

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();

		if(!($this->mcapbac->testMa($ma)))
		{
			$msg["ma"] = "Mã không tồn tại";
		}

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
			$status = "success";
            $this->mcapbac->delete($ma);
		}

		$response = array('status' => $status,'msg' => $msg,'dta' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}