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

		$mdata = $this->mdanhmuc->getid($ma);
		$mten = $mdata['DM_TEN'];

		if($mten == $ten)
		{
			return;
		}

        if($this->mdanhmuc->testTen($ten))
        {
        	$msg["DM_TEN"] = lang('name_not_be_repeated');
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

	public function data0()
	{
		if (isset($_GET['update'])) // code update
		{
			$ma = $_GET['DM_MA'];
			$ten = $_GET['DM_TEN'];
			$result = "0";
			if(!$this->mdanhmuc->testTen($ten))
			{
				$data = array(
	               "DM_MA" => $ma,
	               "DM_TEN" => $ten
	            );
	            if($this->mdanhmuc->update($ma, $data))
	            {
	            	$result = "1";
	            }
			}
			echo $result;
		}
		else
		{
			$pagenum = $_GET['pagenum'];
			$pagesize = $_GET['pagesize'];
			$start = $pagenum * $pagesize;
			$where = "";
			$sort = "";
			$total_rows = $this->mdanhmuc->countAll();
			
			$query = $where." LIMIT $start, $total_rows";
			$table = $this->mdanhmuc->getList2($query);

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
			$table = $this->mdanhmuc->getList2($query);
			 
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

		if(!($this->mdanhmuc->testMa($ma)))
		{
			$msg["ma"] = lang('code_does_not_exist');
		}

		if($this->mdanhmuc->danhmucdiadiem($ma))
		{
			$msg["ma"] = lang('errors_associated_foreign_key');
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