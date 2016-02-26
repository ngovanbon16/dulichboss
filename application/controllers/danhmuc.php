<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Danhmuc extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mdanhmuc");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/danhmuc_view';
       	$this->_data['title'] = lang('category');
       	$this->_data['info'] = $this->mdanhmuc->getList();
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{
		$ma = $_POST["DM_MA"];
		$ten = $_POST['DM_TEN'];
		$hinh = $_POST['DM_HINH'];
		if($hinh == "")
		{
			$hinh = "0.png";
		}

		$msg = array();

		$data = array(
            "DM_MA" => $ma,
       		"DM_TEN" => $ten,
       		"DM_HINH" => $hinh
        );

		$status = "error";

        if($this->mdanhmuc->testTen($ten))
        {
        	$msg["DM_TEN"] = "Trùng tên";
        }
        else
        {
        	if($this->mdanhmuc->testMa($ma))
			{
				$this->mdanhmuc->update($ma, $data);
			}
			else
			{
				$this->mdanhmuc->insert($data);
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
		$data = $this->mdanhmuc->getList();

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();

		if(!($this->mdanhmuc->testMa($ma)))
		{
			$msg["ma"] = "Mã không tồn tại!";
		}

		if($this->mdanhmuc->danhmucdiadiem($ma))
		{
			$msg["ma"] = "Lỗi khóa ngoại!";
		}

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
			$query = $this->mdanhmuc->getId($ma);
			$ten = $query['DM_HINH'];
			//$status = print_r($query);
			if($ten != "0.png")
			{
	            $file_path = "uploads/danhmuc/".$ten;
	            if (file_exists($file_path)) 
	            {
	                   unlink("uploads/danhmuc/".$ten);
	            } 
        	}
            $this->mdanhmuc->delete($ma);
            $status = "success";
		}

		$response = array('status' => $status,'msg' => $msg,'dta' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}