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

	public function index()
	{
		$this->_data['subview'] = 'admin/binhluan_view';
       	$this->_data['title'] = 'Bình luận';
       	$this->load->view('main.php', $this->_data);
	}

	public function data1($size, $star) // dung cho load du lieu tung phan co kich thuoc va vitri bat dau
	{
		$data = $this->mbinhluan->getList1($size, $star);

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function countAll() // dem tong so hang trong bang dung cho lot du lieu tung phan
	{
		$total = $this->mbinhluan->countAll();
		$response = array('total' => $total);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function add() // dung cho them binh luan cua user
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
			$max = $this->mbinhluan->max();
            $idbinhluan = $max['maxid'];
            $msg['idbinhluan'] = $idbinhluan;
		}

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
			$this->load->model("manhbinhluan");

			$query = $this->manhbinhluan->getbl($ma);
			foreach ($query as $iteam) {
				$ten = $iteam['ABL_TEN'];
                $file_path = "uploads/binhluan/".$ten;
                if (file_exists($file_path)) 
                {
                    unlink($file_path);
                } 
			}

			if($this->manhbinhluan->delete($ma))
			{
				$this->mbinhluan->delete($ma);
            	$status = "success";
			}
		}

		$response = array('status' => $status,'msg' => $msg,'dta' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function deleteanhbinhluan()
	{
		$maanh = $_POST['ma'];
		$ten = $_POST['ten'];

		$status = "error";

		$this->load->model("manhbinhluan");
		if($this->manhbinhluan->deleteabl($maanh))
		{
            $file_path = "uploads/binhluan/".$ten;
            if (file_exists($file_path)) 
            {
                unlink($file_path);
            } 
            $status = "success";
		}

		$response = array('status' => $status, 'dta' => $maanh);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}