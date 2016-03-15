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
		if(isset($this->session->userdata['DD_MA']))
		{
			$this->session->unset_userdata("DD_MA");
		}

		$this->_data['subview'] = 'admin/binhluan_view';
       	$this->_data['title'] = lang('comment');
       	$this->load->view('main.php', $this->_data);
	}

	public function data0()
	{
		if (isset($_GET['update'])) // code update
		{
			/*$ma = $_GET['T_MA'];
			$ten = $_GET['T_TEN'];
			$result = "0";
			if(!$this->mtinh->testTen($ten))
			{
				$data = array(
	               "T_MA" => $ma,
	               "T_TEN" => $ten
	            );
	            if($this->mtinh->update($ma, $data))
	            {
	            	$result = "1";
	            }
			}
			echo $result;*/
		}
		else
		{
			$pagenum = $_GET['pagenum'];
			$pagesize = $_GET['pagesize'];
			$start = $pagenum * $pagesize;
			$where = "";
			$sort = "";
			$total_rows = $this->mbinhluan->countAll();

			$iddd = "";
			if(isset($this->session->userdata['DD_MA']))
			{
				$iddd = $this->session->userdata['DD_MA'];
			}
			
			$query = $where." LIMIT $start, $total_rows";
			$table = $this->mbinhluan->getList2($query);

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
				/* code neu khong tim thay du lieu */
			}

			if (isset($_GET['filterscount'])) // code tim kiem
			{
				$filterscount = $_GET['filterscount'];
				
				if ($filterscount > 0)
				{
					if($iddd == "")
					{
						$where = " WHERE (";
					}
					else
					{
						$where = "WHERE (binhluan.DD_MA='".$iddd."') AND (";
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
					if($iddd != "")
					{
						$where = "WHERE binhluan.DD_MA='".$iddd."' ";
					}
				}
			}
			else
			{
				if($iddd != "")
				{
					$where = "WHERE binhluan.DD_MA='".$iddd."' ";
				}
			}

			$query2 = $where." "; // them ngay 15/3
			$total_rows = $this->mbinhluan->countAll2($query2); 

			$query = $where." ".$sort." LIMIT $start, $total_rows";
			$table = $this->mbinhluan->getList2($query);
			 
			$data[] = array(
			   'TotalRows' => $total_rows,
			   'Rows' => $table
			);
			echo json_encode($data);
		}
	}

	public function data1($size, $star) // dung cho load du lieu tung phan co kich thuoc va vitri bat dau
	{
		$data = $this->mbinhluan->getList1($size, $star);

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function anhbinhluan()
	{
		$ma = $_POST["ma"];

		$this->load->model("manhbinhluan");
		$anhbinhluan = $this->manhbinhluan->getanhbinhluan($ma);

		$response = array('data' => $anhbinhluan);
	    $jsonString = json_encode($response);
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

		$response = array('status' => $status,'msg' => $msg);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function deleteanhbinhluan()
	{
		$ten = $_POST['ten'];

		$status = "error";

		$this->load->model("manhbinhluan");
		if($this->manhbinhluan->deleteabl($ten))
		{
            $file_path = "uploads/binhluan/".$ten;
            if (file_exists($file_path)) 
            {
                unlink($file_path);
            } 
            $status = "success";
		}

		$response = array('status' => $status, 'dta' => $ten);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}