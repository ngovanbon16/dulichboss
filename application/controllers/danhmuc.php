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
		/*$this->_data['subview'] = 'admin/danhmuc_view';
       	$this->_data['title'] = lang('category');
       	$this->_data['info'] = $this->mdanhmuc->getList();
       	$this->load->view('main.php', $this->_data);*/

       	$this->load->model("mquyen");
		$email = $this->session->userdata["email"];
		if($this->mquyen->testquyen($email, "4"))
		{
			$this->_data['subview'] = 'admin/danhmuc_view';
	       	$this->_data['title'] = lang('category');
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
		$ma = $this->db->escape_like_str($_POST["DM_MA"]);
		$ten = $this->db->escape_like_str($_POST['DM_TEN']);
		$hinh = $_POST['DM_HINH'];
		$msg = array();
		$status = "error";
		$error = "";

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

		$mdata = $this->mdanhmuc->getid($ma);
		$mten = $mdata['DM_TEN'];

        if($this->mdanhmuc->testTen($ten))
        {
        	$error = lang("name_not_be_repeated")."<br/>";
        }

        if($this->mdanhmuc->testMa($ma))
		{
			$error .= lang("code_already_exists");
		}
        
        if($error != "")
        {
        	$msg["error"] = $error;
        }
        else
        {
        	$this->mdanhmuc->insert($data);
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
			$ma = $this->db->escape_like_str($_GET['DM_MA']);
			$ten = $this->db->escape_like_str($_GET['DM_TEN']);
			$result = "0";

			$data = array(
               "DM_MA" => $ma,
               "DM_TEN" => $ten
            );

			if($this->mdanhmuc->update($ma, $data))
			{
				$result = "1";
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
		$status = "error";
		$error = "";

		if(!($this->mdanhmuc->testMa($ma)))
		{
			$error = lang('code_does_not_exist');
		}

		if($this->mdanhmuc->danhmucdiadiem($ma))
		{
			$error = lang('have_data_relating_to_the_table')." \"DIADIEM\".";
		}

		if($error != "")
		{
			$msg["error"] = $error;
		}

		if(count($msg) == 0)
		{
			$query = $this->mdanhmuc->getId($ma);
			$ten = $query['DM_HINH'];
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

		$response = array('status' => $status,'msg' => $msg);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function upload($id)
    {
        $target_dir = "./uploads/danhmuc/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo lang('file_is_an_image')." - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo lang('file_is_not_an_image');
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo lang('sorry_file_already_exists');
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 2500000) {
            echo lang('sorry_your_file_is_too_large');
            $uploadOk = 0;
        }
        // Allow certain file formats
        if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg"
        && strtolower($imageFileType) != "gif" ) {
            echo lang('sorry_only_JPG_JPEG_PNG_GIF_files_are_allowed');
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo lang('sorry_your_file_was_not_uploaded');
        // if everything is ok, try to upload file
        } else {
            $name = $id.".".$imageFileType;
            $names = $target_dir.$name;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $names)) {

                $this->load->library("image_lib");
                $config['image_library'] = 'gd2';
                $config['source_image'] = './uploads/danhmuc/'.$name;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']     = 38;
                $config['height']   = 38;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($config);

                $this->load->model("mdanhmuc");
                $data = array(
                    "DM_MA" => $id,
                    "DM_HINH" => $name
                );
                
                if($this->mdanhmuc->update($id, $data))
                {	
                	echo lang('the_file')." ". basename( $_FILES["fileToUpload"]["name"])." ".lang('has_been_uploaded')."!";
                }
            }
        }
    }
}