<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nguoidung extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mnguoidung");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/nguoidung_view';
       	$this->_data['title'] = lang('user');
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{
		$ma = $_POST["ND_MA"];
		$kichhoat = $_POST['ND_KICHHOAT'];

		$msg = array();

		date_default_timezone_set('Asia/Ho_Chi_Minh');  
        $date = date('Y-m-d H:i:s');

		$data = array(
            "ND_MA" => $ma,
       		"ND_KICHHOAT" => $kichhoat,
       		"ND_NGAYCAPNHAT" => $date
        );

		$status = "error";

        if($this->mnguoidung->testMa($ma))
		{
			$this->mnguoidung->update($ma, $data);
			$status = "success";
		}
		else
		{
			//$this->mnguoidung->insert($data);
			$status = "success";
		}
			
        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function data()
	{
		$data = $this->mnguoidung->getList();

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function data0()
	{
		if (isset($_GET['update'])) // code update
		{
			$ma = $_GET["ND_MA"];
			$kichhoat = $_GET['ND_KICHHOAT'];

			$data = array(
	            "ND_MA" => $ma,
	       		"ND_KICHHOAT" => $kichhoat
	        );
	        echo $this->mnguoidung->update($ma, $data);
		}
		else
		{
			$pagenum = $_GET['pagenum'];
			$pagesize = $_GET['pagesize'];
			$start = $pagenum * $pagesize;
			$where = "";
			$sort = "";
			$total_rows = $this->mnguoidung->countAll();
			
			$query = $where." LIMIT $start, $total_rows";
			$table = $this->mnguoidung->getList2($query);

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
			$table = $this->mnguoidung->getList2($query);
			 
			$data[] = array(
			   'TotalRows' => $total_rows,
			   'Rows' => $table
			);
			echo json_encode($data);
		}
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

	public function edit()
	{
		//$this->_data['subview'] = 'admin/suand_view';
       	//$this->_data['title'] = 'Người dùng';
       	$this->_data['info'] = $this->mnguoidung->getID($this->session->userdata("id"));
       	//$this->load->view('main.php', $this->_data);
       	$info = $this->mnguoidung->getID($this->session->userdata("id"));

       		$this->_data['indexnhomquyen'] = "-1";
       		$this->_data['indextinh'] = "-1";
       		$this->_data['indexhuyen'] = "-1";
       		$this->_data['indexxa'] = "-1";

       		$this->load->model("mnhomquyen");
       		$query = $this->mnhomquyen->getList();
            $manhomquyen = $info["NQ_MA"]; 
            $i = -1;
            if($query != false)
            {
	            foreach ($query as $item) {
	            	$i++;
	            	if($manhomquyen == $item["NQ_MA"])
	           		{
	                	$this->_data['indexnhomquyen'] = $i;
	                }
	            }
        	}

       		$this->load->model("mtinh");
       		$query = $this->mtinh->getList();
            $matinh = $info["T_MA"]; 
            $i = -1;
            if($query != false)
            {
	            foreach ($query as $item) {
	            	$i++;
	            	if($matinh == $item["T_MA"])
	           		{
	                	$this->_data['indextinh'] = $i;
	                }
	            }
        	}

            $this->load->model("mhuyen");
       		$query = $this->mhuyen->getid($matinh);
            $mahuyen = $info["H_MA"]; 
            $i = -1;
            if($query != false)
            {
	            foreach ($query as $item) {
	            	$i++;
	            	if($mahuyen == $item["H_MA"])
	           		{
	                	$this->_data['indexhuyen'] = $i;
	                }
	            }
        	}

            $this->load->model("mxa");
       		$query = $this->mxa->getid($matinh , $mahuyen);
            $mahuyen = $info["X_MA"]; 
            $i = -1;
            if($query != false)
            {
	            foreach ($query as $item) {
	            	$i++;
	            	if($mahuyen == $item["X_MA"])
	           		{
	                	$this->_data['indexxa'] = $i;
	                }
	            }
        	}

       	$this->load->view("admin/suand_view", $this->_data);
	}

	public function update()
	{
		$ND_MA = $_POST["ND_MA"];
		$NQ_MA = $_POST["NQ_MA"];
		$CB_MA = $_POST["CB_MA"];
		$ND_HO = $_POST["ND_HO"];
		$ND_TEN = $_POST["ND_TEN"];
		$ND_DIACHIMAIL = $_POST["ND_DIACHIMAIL"];
		$passwordold = $_POST["passwordold"];
		$ND_MATKHAU = $_POST["ND_MATKHAU"];
		$ND_NGAYSINH = $_POST["ND_NGAYSINH"];
		$ND_GIOITINH = $_POST["ND_GIOITINH"];
		$T_MA = $_POST["T_MA"];
		$H_MA = $_POST["H_MA"];
		$X_MA = $_POST["X_MA"];
		$ND_DIACHI = $_POST["ND_DIACHI"];
		$ND_SDT = $_POST["ND_SDT"];
		$ND_FACE = $_POST["ND_FACE"];
		$ND_GIOITHIEU = $_POST["ND_GIOITHIEU"];
		$ND_DIEM = $_POST["ND_DIEM"];
		$ND_THUONG = $_POST["ND_THUONG"];
		$msg = array();

		if($ND_GIOITINH == "Nam")
		{
			$ND_GIOITINH = "1";
		}
		else
		{
			$ND_GIOITINH = "0";
		}

		if($ND_MATKHAU != "")
		{
			if($passwordold == "")
			{
				$msg["matkhau"] = "Vui lòng nhập mật khẩu cũ trước!";
			}
			else
			{
				if(!($this->mnguoidung->testpassword($ND_MA, $passwordold)))
				{
					$msg["matkhau"] = "Mật khẩu không cũ không đúng!";
				}
				else
				{
					$data = array(
		               "ND_MATKHAU" => md5($ND_MATKHAU),
		            );
		            $this->mnguoidung->update($ND_MA, $data);
				}
			}
		}

		/*if(($this->mregistration->testEmail($email)))
		{
			$msg["email"] = "Email đã tồn tại";
		}*/

		$status = "error";
		$data = "";
		if(count($msg) == 0)
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');  
            $date = date('Y-m-d H:i:s');

            $data = array(
               "NQ_MA" => $NQ_MA,
               "CB_MA" => $CB_MA,
               "ND_HO" => $ND_HO,
               "ND_TEN" => $ND_TEN,
               "ND_DIACHIMAIL" => $ND_DIACHIMAIL,
               //"ND_MATKHAU" => md5($ND_MATKHAU),
               "ND_NGAYSINH" => $ND_NGAYSINH,
               "ND_GIOITINH" => $ND_GIOITINH,
               //"ND_HINH" => 'avata.png',
               //"ND_KICHHOAT" => '0',
               "T_MA" => $T_MA,
               "H_MA" => $H_MA,
               "X_MA" => $X_MA,
               "ND_DIACHI" => $ND_DIACHI,
               "ND_SDT" => $ND_SDT,
               "ND_FACE" => $ND_FACE,
               "ND_GIOITHIEU" => $ND_GIOITHIEU,
               //"ND_NGAYTAO" => $date,
               "ND_NGAYCAPNHAT" => $date,
               "ND_DIEM" => $ND_DIEM,
               "ND_THUONG" => $ND_THUONG,
            );
            $this->mnguoidung->update($ND_MA, $data);
            $status = "success";
		}

		$response = array('status' => $status,'msg' => $msg, 'data' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function delete()
	{
		$ma = $_POST["ma"];
		$msg = array();
		$status = "error";
		$error = "";

		if(!($this->mnguoidung->testMa($ma)))
		{
			$error = lang('code_does_not_exist');
		}

		if($this->mnguoidung->nguoidungdiadiem($ma))
		{
			$error .= lang('have_data_relating_to_the_table')." \"DIADIEM\". <br/>";
		}

		if($this->mnguoidung->nguoidungbinhluan($ma))
		{
			$error .= lang('have_data_relating_to_the_table')." \"BINHLUAN\". <br/>";;
		}

		if($this->mnguoidung->nguoidungnddd($ma))
		{
			$error .= lang('have_data_relating_to_the_table')." \"NGUOIDUNGDIADIEM\". <br/>";;
		}

		if($this->mnguoidung->nguoidunghinhanh($ma))
		{
			$error .= lang('have_data_relating_to_the_table')." \"HINHANH\". <br/>";;
		}

		if($error != "")
		{
			$msg["error"] = $error;
		}

		if(count($msg) == 0)
		{
            $this->mnguoidung->delete($ma);
            $status = "success";
		}

		$response = array('status' => $status,'msg' => $msg);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function xacnhanemail($email)
	{
		$data = array(
		    "ND_KICHHOAT" => "1"
		);
		//$this->mnguoidung->updatexacnhan($id, $data);
		$test = $this->mnguoidung->updatexacnhan($email, $data);
		if($test == 0)
		{
			echo "<center><h2>Tài khoản không tồn tại hoặc đã bị xóa!</h2>
			<a href='".base_url()."index.php/registration'>Nhấn vào đây để đăng ký thành viên</a>
			</center>";
		}
		if($test == 1)
		{
			echo "<center><h2>Xác nhận email thành công!</h2>
			<a href='".base_url()."index.php/login'>Nhấn vào đây để đăng nhập</a>
			</center>";
		}
		if($test == 2)
		{
			echo "<center><h2>Tài khoản đã xác nhận!</h2>
			<a href='".base_url()."index.php/login'>Nhấn vào đây để đăng nhập</a>
			</center>";
		}
		

	}
}