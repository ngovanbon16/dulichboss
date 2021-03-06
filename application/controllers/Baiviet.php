<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baiviet extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mbaiviet");
	}

	public function index()
	{
		/*$this->_data['subview'] = 'admin/baiviet_view';
       	$this->_data['title'] = lang('posts');
       	$this->load->view('main.php', $this->_data);*/
       	$this->load->model("mquyen");
		$email = $this->session->userdata["email"];
		if($this->mquyen->testquyen($email, "7"))
		{
			$this->_data['subview'] = 'admin/baiviet_view';
	       	$this->_data['title'] = lang('posts');
	       	$this->load->view('main.php', $this->_data);
       	}
       	else
       	{
       		$this->_data['subview'] = 'home';
	       	$this->_data['title'] = lang('home');
	       	$this->load->view('main.php', $this->_data);
       	}
	}

	public function theodiadiem($id)
	{
		$this->_data['subview'] = 'admin/baiviet_view';
       	$this->_data['title'] = lang('posts');
       	$this->load->view('main.php', $this->_data);
	}

	public function thembaiviet($id)
	{
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->load->model("mdiadiem");
		$data = $this->mdiadiem->getID($id);
		$this->_data['DD_MA'] = $id;
		$this->_data['DD_TEN'] = $data['DD_TEN'];

		$this->_data['subview'] = 'user/baiviet_view';
       	$this->_data['title'] = lang('posts');
       	$this->load->view('user/main.php', $this->_data);
	}

	public function addadmin()
	{
		$this->_data['subview'] = 'admin/thembaiviet_view';
       	$this->_data['title'] = lang('posts');
       	$this->load->view('main.php', $this->_data);
	}

	public function editadmin($id)
	{
		$query = "SELECT * FROM baiviet WHERE baiviet.BV_MA = '$id' ";
		$this->_data['baiviet'] = $this->mbaiviet->getdata($query);

		$this->_data['subview'] = 'admin/thembaiviet_view';
       	$this->_data['title'] = lang('posts');
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{	
		$DD_MA =  $this->db->escape_like_str($_POST["DD_MA"]);
		$BV_TIEUDE =  $this->db->escape_like_str($_POST["BV_TIEUDE"]);
		$BV_NOIDUNG =  $_POST["BV_NOIDUNG"];
		$BV_DUYET =  $this->db->escape_like_str($_POST["BV_DUYET"]);
		$ND_MA = $this->session->userdata['id'];

		if($BV_DUYET == "0")
		{
			$BV_NOIDUNG =  $this->db->escape_like_str($_POST["BV_NOIDUNG"]);
		}

		date_default_timezone_set('Asia/Ho_Chi_Minh');  
        $date = date('Y-m-d H:i:s');

		$data = array(
			"DD_MA" => $DD_MA,
            "ND_MA" => $ND_MA,
       		"BV_TIEUDE" => $BV_TIEUDE,
       		"BV_NOIDUNG" => $BV_NOIDUNG,
       		"BV_NGAYDANG" => $date,
       		"BV_DUYET" => $BV_DUYET,
       		"BV_LUOTXEM" => '0'
        );

		$status = "error";

        if($this->mbaiviet->insert($data))
		{
			$status = "success";
		}
			
        $response = array('status' => $status, 'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function edit()
	{	
		$DD_MA =  $this->db->escape_like_str($_POST["DD_MA"]);
		$BV_MA =  $this->db->escape_like_str($_POST["BV_MA"]);
		$BV_TIEUDE =  $this->db->escape_like_str($_POST["BV_TIEUDE"]);
		$BV_NOIDUNG =  $_POST["BV_NOIDUNG"];

		$data = array(
			"DD_MA" => $DD_MA,
       		"BV_TIEUDE" => $BV_TIEUDE,
       		"BV_NOIDUNG" => $BV_NOIDUNG
        );

		$status = "error";

        if($this->mbaiviet->update($BV_MA, $data))
		{
			$status = "success";
		}
			
        $response = array('status' => $status, 'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function updateluotxem()
	{
		$BV_MA = $_POST["BV_MA"];

		$baiviet = $this->mbaiviet->getID($BV_MA);

		$BV_LUOTXEM = $baiviet['BV_LUOTXEM'] + 1;

		$data_update = array(
	        "BV_LUOTXEM" => $BV_LUOTXEM
	    );

		$status = "error";
		if($this->mbaiviet->update($BV_MA, $data_update))
		{
	        $status = "success";
		}
		$response = array('status' => $status, 'data' => $data_update);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function detail($id)
	{	
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();
		
		$query = "SELECT * FROM baiviet JOIN diadiem ON diadiem.DD_MA = baiviet.DD_MA JOIN nguoidung ON nguoidung.ND_MA = baiviet.ND_MA JOIN tinh ON tinh.T_MA = diadiem.T_MA JOIN huyen ON huyen.H_MA = diadiem.H_MA WHERE baiviet.BV_MA = '$id' ";
		$result = $this->mbaiviet->getdata($query);
		$this->_data['baiviet'] = $result;

		$iddd = $result['DD_MA'];
		$matinh = $result['T_MA'];

		$queryall = "SELECT * FROM baiviet JOIN diadiem ON diadiem.DD_MA = baiviet.DD_MA JOIN nguoidung ON nguoidung.ND_MA = baiviet.ND_MA WHERE baiviet.DD_MA = '$iddd' AND baiviet.BV_MA <> '$id' AND baiviet.BV_DUYET = '1' ORDER BY baiviet.BV_NGAYDANG DESC LIMIT 0, 5";
		$allresult = $this->mbaiviet->gettimkiem($queryall);
		$this->_data['allbaiviet'] = $allresult;

		$this->load->model('mdiadiem');
		$query = "SELECT diadiem.DD_MA, diadiem.DD_TEN, tinh.T_TEN, huyen.H_TEN, hinhanh.HA_TEN, (SUM(binhluan.BL_CHATLUONG)+SUM(binhluan.BL_PHUCVU)+SUM(binhluan.BL_KHONGGIAN))/count(diadiem.DD_MA)/3 diem FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN binhluan ON diadiem.DD_MA = binhluan.DD_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' GROUP BY diadiem.DD_MA  ORDER BY diem DESC LIMIT 0, 6";
		$this->_data['danhgia'] = $this->mdiadiem->gettimkiem($query);

		$query = "SELECT baiviet.BV_TIEUDE, baiviet.BV_MA FROM baiviet JOIN diadiem ON diadiem.DD_MA = baiviet.DD_MA WHERE diadiem.T_MA = '$matinh' AND baiviet.BV_MA <> $id ORDER BY baiviet.BV_LUOTXEM DESC LIMIT 0,10";
		$result = $this->mbaiviet->gettimkiem($query);
		$this->_data['baivietkhuvuc'] = $result;

		$this->_data['subview'] = 'user/chitietbaiviet_view';
       	$this->_data['title'] = lang('posts');
       	$this->load->view('user/main.php', $this->_data);
	}

	public function getdata()
	{
		$DD_MA = $_POST['ma'];
		$start = $_POST['start'];
		$length = $_POST['length'];
		$query = "SELECT * FROM baiviet JOIN nguoidung ON baiviet.ND_MA = nguoidung.ND_MA WHERE baiviet.DD_MA = '$DD_MA' AND baiviet.BV_DUYET = '1'  ORDER BY baiviet.BV_NGAYDANG DESC LIMIT $start, $length";

		// Kết nối Database, thực hiện câu truy vấn
		$result = $this->mbaiviet->gettimkiem($query);		

		$jsonString = json_encode($result);
		echo $jsonString;
	}

	public function data0()
	{
		$this->load->model("mquyen");
		$email = $this->session->userdata["email"];
		$T_MA = $this->session->userdata["T_MA"];
		$test = "0";
		if($this->mquyen->testquyen($email, "10"))
		{
			$test = "1";
		}
		if (isset($_GET['update'])) // code update
		{
			$ma = $_GET["BV_MA"];
			$kichhoat = $_GET['BV_DUYET'];

			$data = array(
	       		"BV_DUYET" => $kichhoat
	        );
	        echo $this->mbaiviet->update($ma, $data);
		}
		else
		{
			$pagenum = $_GET['pagenum'];
			$pagesize = $_GET['pagesize'];
			$start = $pagenum * $pagesize;
			$where = "";
			$sort = "";
			$total_rows = $this->mbaiviet->countAll();
			
			$query = $where." LIMIT $start, $total_rows";
			$table = $this->mbaiviet->getList2($query);

			if (isset($_GET['sortdatafield'])) // code sap xep
			{
				$sortfield = $_GET['sortdatafield'];
				$sortorder = $_GET['sortorder'];
				
				if ($sortfield != NULL)
				{
					
					if ($sortorder == "desc")
					{
						/*$query = "SELECT * FROM tinh ORDER BY" . " " . $sortfield . " DESC LIMIT $start, $pagesize";*/
						$sort = " ORDER BY ".$sortfield." DESC ";
					}
					else if ($sortorder == "asc")
					{
						/*$query = "SELECT * FROM tinh ORDER BY" . " " . $sortfield . " ASC LIMIT $start, $pagesize";*/
						$sort = " ORDER BY ".$sortfield." ASC ";
					}
					/*$table = $this->mtinh->getList2($query);*/			
				}
			}
			else
			{
					$sort = " ORDER BY baiviet.BV_DUYET ASC, baiviet.BV_NGAYDANG DESC ";
			}

			if (isset($_GET['filterscount'])) // code tim kiem
			{
				$filterscount = $_GET['filterscount'];
				
				if ($filterscount > 0)
				{
					if($test == "1")
					{
						$where = " WHERE (";
					}
					else
					{
						$where = "WHERE (diadiem.T_MA='".$T_MA."' ) AND (";
					}
					$tmpdatafield = "";
					$tmpfilteroperator = "";
					for ($i=0; $i < $filterscount; $i++)
				    {
						// get the filter's value.
						$filtervalue = $_GET["filtervalue" . $i];
						// get the filter's condition.
						$filtercondition = $_GET["filtercondition" . $i];
						// get the filter's column.
						$filterdatafield = $_GET["filterdatafield" . $i];
						// get the filter's operator.
						$filteroperator = $_GET["filteroperator" . $i];
						
						if ($tmpdatafield == "")
						{
							$tmpdatafield = $filterdatafield;			
						}
						else if ($tmpdatafield <> $filterdatafield)
						{
							$where .= ")AND(";
						}
						else if ($tmpdatafield == $filterdatafield)
						{
							if ($tmpfilteroperator == 0)
							{
								$where .= " AND ";
							}
							else $where .= " OR ";	
						}
						
						// build the "WHERE" clause depending on the filter's condition, value and datafield.
						switch($filtercondition)
						{
							case "CONTAINS":
								$where .= " " . $filterdatafield . " LIKE '%" . $filtervalue ."%'";
								break;
							case "DOES_NOT_CONTAIN":
								$where .= " " . $filterdatafield . " NOT LIKE '%" . $filtervalue ."%'";
								break;
							case "EQUAL":
								$where .= " " . $filterdatafield . " = '" . $filtervalue ."'";
								break;
							case "NOT_EQUAL":
								$where .= " " . $filterdatafield . " <> '" . $filtervalue ."'";
								break;
							case "GREATER_THAN":
								$where .= " " . $filterdatafield . " > '" . $filtervalue ."'";
								break;
							case "LESS_THAN":
								$where .= " " . $filterdatafield . " < '" . $filtervalue ."'";
								break;
							case "GREATER_THAN_OR_EQUAL":
								$where .= " " . $filterdatafield . " >= '" . $filtervalue ."'";
								break;
							case "LESS_THAN_OR_EQUAL":
								$where .= " " . $filterdatafield . " <= '" . $filtervalue ."'";
								break;
							case "STARTS_WITH":
								$where .= " " . $filterdatafield . " LIKE '" . $filtervalue ."%'";
								break;
							case "ENDS_WITH":
								$where .= " " . $filterdatafield . " LIKE '%" . $filtervalue ."'";
								break;
						}
										
						if ($i == $filterscount - 1)
						{
							$where .= ")";
						}
						
						$tmpfilteroperator = $filteroperator;
						$tmpdatafield = $filterdatafield;			
					}
					// build the query.
				
					/*$query = "SELECT * FROM tinh ".$where." LIMIT $start, $total_rows";
					$table = $this->mtinh->getList2($query);*/			
				}
				else
				{
					if($test != "1")
					{
						$where = "WHERE diadiem.T_MA='".$T_MA."' ";
					}
				}
			}
			else
			{
				if($test != "1")
				{
					$where = "WHERE diadiem.T_MA='".$T_MA."' ";
				}
			}

			$query2 = $where." "; 
			$total_rows = $this->mbaiviet->countAll2($query2);

			$query = $where." ".$sort." LIMIT $start, $total_rows";
			$table = $this->mbaiviet->getList2($query);
			 
			$data[] = array(
			   'TotalRows' => $total_rows,
			   'Rows' => $table
			);
			echo json_encode($data);
		}
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();
		$status = "error";
		$error = "";

		if(!($this->mbaiviet->testMa($ma)))
		{
			$error = lang('code_does_not_exist');
		}

		if($error != "")
		{
			$msg["error"] = $error;
		}

		if(count($msg) == 0)
		{
            $this->mbaiviet->delete($ma);
            $status = "success";
		}

		$response = array('status' => $status,'msg' => $msg);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	/*public function data1($size, $star) // dung cho load du lieu tung phan co kich thuoc va vitri bat dau
	{
		$data = $this->mnguoidung->getList1($size, $star);

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function countAll() // dem tong so hang trong bang
	{
		$total = $this->mnguoidung->countAll();
		$response = array('total' => $total);
		$jsonString = json_encode($response);
		echo $jsonString;
	}*/
}