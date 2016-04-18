<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Thongtin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mthongtin");
	}

	public function index()
	{
       	$this->load->model("mquyen");
		$email = $this->session->userdata["email"];
		if($this->mquyen->testquyen($email, "10"))
		{
			$this->_data["gioithieu"] = $this->mthongtin->getID("1");

			$this->_data['subview'] = 'admin/gioithieu_view';
	       	$this->_data['title'] = lang('information');
	       	$this->load->view('main.php', $this->_data);
       	}
       	else
       	{
       		$this->_data['subview'] = 'home';
	       	$this->_data['title'] = lang('home');
	       	$this->load->view('main.php', $this->_data);
       	}
	}

	public function add()
	{	
		$TT_GIOITHIEU =  $_POST["TT_GIOITHIEU"];

		date_default_timezone_set('Asia/Ho_Chi_Minh');  
        $date = date('Y-m-d H:i:s');

		$data = array(
       		"TT_GIOITHIEU" => $TT_GIOITHIEU,
       		"TT_NGAYCAPNHAT" => $date
        );

		$status = "error";

        if($this->mthongtin->insert($data))
		{
			$status = "success";
		}
			
        $response = array('status' => $status, 'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function update()
	{	
		$TT_GIOITHIEU =  $_POST["TT_GIOITHIEU"];
		$TT_LIENHE =  $_POST["TT_LIENHE"];

		date_default_timezone_set('Asia/Ho_Chi_Minh');  
        $date = date('Y-m-d H:i:s');

		$data = array(
       		"TT_GIOITHIEU" => $TT_GIOITHIEU,
       		"TT_LIENHE" => $TT_LIENHE,
       		"TT_NGAYCAPNHAT" => $date
        );

		$status = "error";

        if($this->mthongtin->update('1', $data))
		{
			$status = "success";
		}
			
        $response = array('status' => $status, 'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}
}