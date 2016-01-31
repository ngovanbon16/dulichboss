<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Binhluan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mbinhluan");
	}

	public function add()
	{
		$ND_MA = $this->session->userdata('id');
		$DD_MA = $_POST["DD_MA"];
		$BL_TIEUDE = $_POST['BL_TIEUDE'];
		$BL_NOIDUNG = $_POST['BL_NOIDUNG'];
		$BL_CHATLUONG = $_POST['BL_CHATLUONG'];
		$BL_PHUCVU = $_POST['BL_PHUCVU'];
		$BL_KHONGGIAN = $_POST['BL_KHONGGIAN'];

		date_default_timezone_set('Asia/Ho_Chi_Minh');  
	    $BL_NGAYDANG = date('Y-m-d H:i:s');

		$msg = array();
		$status = "error";

		$data = array(
            "ND_MA" => $ND_MA,
       		"DD_MA" => $DD_MA,
       		"BL_TIEUDE" => $BL_TIEUDE,
       		"BL_NOIDUNG" => $BL_NOIDUNG,
       		"BL_CHATLUONG" => $BL_CHATLUONG,
       		"BL_PHUCVU" => $BL_PHUCVU,
       		"BL_KHONGGIAN" => $BL_KHONGGIAN,
       		"BL_NGAYDANG" => $BL_NGAYDANG
        );

		if($this->mbinhluan->insert($data))
		{
			$status = "success";
		}

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}
}