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
       	$this->_data['title'] = lang('place');
       	$this->load->view('main.php', $this->_data);
	}

	public function update()
	{
		$ma = $_POST["DD_MA"];
		$kichhoat = $_POST['DD_DUYET'];
		$status = "error";
		$msg = array();

		$data = array(
            "DD_MA" => $ma,
       		"DD_DUYET" => $kichhoat
        );

        if($this->mdiadiem->testMa($ma))
		{
			$this->mdiadiem->update($ma, $data);
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
			$total_rows = $this->mdiadiem->countAll();
			
			$query = $where." LIMIT $start, $total_rows";
			$table = $this->mdiadiem->getList2($query);

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
					$where = " WHERE (";
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
			}

			$query = $where." ".$sort." LIMIT $start, $total_rows";
			$table = $this->mdiadiem->getList2($query);
			 
			$data[] = array(
			   'TotalRows' => $total_rows,
			   'Rows' => $table
			);
			echo json_encode($data);
		}
	}

	public function data1($size, $star) // dung cho load du lieu tung phan co kich thuoc va vitri bat dau
	{
		$data = $this->mdiadiem->getList1($size, $star);

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function countAll() // dem tong so hang trong bang
	{
		$total = $this->mdiadiem->countAll();
		$response = array('total' => $total);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();
		$status = "error";
		$error = "";

		if(!($this->mdiadiem->testMa($ma)))
		{
			$error = lang('code_does_not_exist');
		}

		if($this->mdiadiem->diadiemhinhanh($ma))
		{
			$error .= lang('have_data_relating_to_the_table')." \"HINHANH\". <br/>";
		}

		if($this->mdiadiem->diadiembinhluan($ma))
		{
			$error .= lang('have_data_relating_to_the_table')." \"BINHLUAN\". <br/>";
		}

		if($this->mdiadiem->diadiemnddd($ma))
		{
			$error .= lang('have_data_relating_to_the_table')." \"NGUOIDUNGDIADIEM\". <br/>";
		}

		if($error == "")
		{
            $this->mdiadiem->delete($ma);
            $status = "success";
		}
		else
		{
			$msg["error"] = $error;
		}

		$response = array('status' => $status,'msg' => $msg);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

}