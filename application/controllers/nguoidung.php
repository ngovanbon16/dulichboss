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
		$this->load->model("mquyen");
		$email = $this->session->userdata["email"];
		if($this->mquyen->testquyen($email, "2") || $this->mquyen->testquyen($email, "10"))
		{
			$this->_data['subview'] = 'admin/nguoidung_view';
	       	$this->_data['title'] = lang('user');
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

	public function dataid()
	{	
		$id = "0";
		if(isset($this->session->userdata['id']))
		{
			$id = $this->session->userdata['id'];
		}
		$data = $this->mnguoidung->getID($id);

		$jsonString = json_encode($data);
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
				$sort = " ORDER BY nguoidung.ND_KICHHOAT ASC, nguoidung.ND_NGAYTAO DESC ";
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
						$where = "WHERE (nguoidung.T_MA='".$T_MA."' && nguoidung.NQ_MA <> '2' && nguoidung.NQ_MA <> '1' ) AND (";
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
						$where = "WHERE nguoidung.T_MA='".$T_MA."' && nguoidung.NQ_MA <> '2' && nguoidung.NQ_MA <> '1' ";
					}
				}
			}
			else
			{
				if($test != "1")
				{
					$where = "WHERE nguoidung.T_MA='".$T_MA."' && nguoidung.NQ_MA <> '2' && nguoidung.NQ_MA <> '1' ";
				}
			}

			$query2 = $where." "; // them ngay 15/3
			$total_rows = $this->mnguoidung->countAll2($query2);

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

	public function edit($id)
	{
		//$this->_data['subview'] = 'admin/suand_view';
       	//$this->_data['title'] = 'Người dùng';
       		
       	//$this->load->view('main.php', $this->_data);
		$this->load->model("mquyen");
		$email = $this->session->userdata["email"];
		if($this->mquyen->testquyen($email, "2") || $this->mquyen->testquyen($email, "10"))
		{

       		$this->_data['info'] = $this->mnguoidung->getID($id);
       		$info = $this->mnguoidung->getID($id);

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

	        $this->_data['title'] = lang("edit").' '.lang('profile');
	       	$this->load->view("admin/suand_view", $this->_data);
       }
       else
       {
       		$this->_data['subview'] = 'home';
	       	$this->_data['title'] = lang('home');
	       	$this->load->view('main.php', $this->_data);
       }
	}

	public function update()
	{
		$password = "";

		$ND_MA = $this->db->escape_like_str($_POST["ND_MA"]);
		$NQ_MA = $this->db->escape_like_str($_POST["NQ_MA"]);
		//$CB_MA = $_POST["CB_MA"];
		$ND_HO = $this->db->escape_like_str($_POST["ND_HO"]);
		$ND_TEN = $this->db->escape_like_str($_POST["ND_TEN"]);
		$ND_DIACHIMAIL = $this->db->escape_like_str($_POST["ND_DIACHIMAIL"]);
		$passwordold = $this->db->escape_like_str($_POST["passwordold"]);
		$ND_MATKHAU = $this->db->escape_like_str($_POST["ND_MATKHAU"]);
		$ND_NGAYSINH = $this->db->escape_like_str($_POST["ND_NGAYSINH"]);
		$ND_GIOITINH = $this->db->escape_like_str($_POST["ND_GIOITINH"]);
		$T_MA = $this->db->escape_like_str($_POST["T_MA"]);
		$H_MA = $this->db->escape_like_str($_POST["H_MA"]);
		$X_MA = $this->db->escape_like_str($_POST["X_MA"]);
		$ND_DIACHI = $this->db->escape_like_str($_POST["ND_DIACHI"]);
		$ND_SDT = $this->db->escape_like_str($_POST["ND_SDT"]);
		$ND_FACE = $this->db->escape_like_str($_POST["ND_FACE"]);
		$ND_GIOITHIEU = $this->db->escape_like_str($_POST["ND_GIOITHIEU"]);
		$ND_DIEM = $this->db->escape_like_str($_POST["ND_DIEM"]);
		$ND_THUONG = $this->db->escape_like_str($_POST["ND_THUONG"]);
		$msg = array();

		$gender = lang('male');
		if($ND_GIOITINH == $gender)
		{
			$ND_GIOITINH = "1";
		}
		else
		{
			$ND_GIOITINH = "0";
		}

		if($passwordold != "")
		{
			$password = lang('password_has_not_been_changed');
		}

		if($ND_MATKHAU != "")
		{
			if($passwordold == "")
			{
				$msg["matkhau"] = lang('please_input').' '.lang('password').' '.lang('new');
			}
			else
			{
				if(!($this->mnguoidung->testpassword($ND_MA, $passwordold)))
				{
					$msg["matkhau"] = lang('password').' '.lang('current').' '.lang('is').' '.lang('invalid');
				}
				else
				{
					$data = array(
		               "ND_MATKHAU" => md5($ND_MATKHAU),
		            );
		            $this->mnguoidung->update($ND_MA, $data);
		            $password = lang('password_has_been_changed');
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
               //"CB_MA" => $CB_MA,
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

		$response = array('status' => $status,'msg' => $msg, 'data' => $data, 'password' => $password);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function updatenhomquyen()
	{
		$ND_MA = $_POST["ND_MA"];
		$NQ_MA = $_POST["NQ_MA"];
		
		$status = "error";
		
		$data = array(
           "NQ_MA" => $NQ_MA
        );
        if($this->mnguoidung->update($ND_MA, $data))
        {
        	$status = "success";
        }

		$response = array('status' => $status, 'data' => $data);
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
			$query = "SELECT * FROM nguoidung WHERE ND_MA = '$ma'";
            $this->load->model("mdiadiem");
			$result = $this->mdiadiem->getdata($query);

			$ten = $result["ND_HINH"];
            $file_path = "uploads/user/".$ten;
            if (file_exists($file_path) && $ten != "avata.png") 
            {
                unlink("uploads/user/".$ten);
            }
            if($this->mnguoidung->delete($ma))
            { 
	            $status = "success";
            }
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
		$test = $this->mnguoidung->updatexacnhan($email, $data);

		$query = $this->mnguoidung->getList();
		$namemail = "";
		foreach ($query as $item) {
			if(md5($item['ND_DIACHIMAIL']) == $email)
			{
				$namemail = $item['ND_DIACHIMAIL'];
			}
		}

		if($test == 0)
		{
			$this->_data['info'] = "Email ".$namemail." của bạn không tồn tại hoặc đã bị xóa! <br/> Your email does not exist or has been deleted.";
			$this->load->view('sys/email', $this->_data);
		}
		if($test == 1)
		{
			$this->_data['info'] = "Email ".$namemail." của bạn đã được kích hoạt thành công! <br/> Your email has been successfully activated.";
			$this->load->view('sys/email', $this->_data);
		}
		if($test == 2)
		{
			$this->_data['info'] = "Email ".$namemail." của bạn đã kích hoạt! <br/> Your email has been activated.";
			$this->load->view('sys/email', $this->_data);
		}
	}

	public function guimatkhau()
    {
    	$status = "error";
    	$email = $_POST['email'];
    	if($this->mnguoidung->testEmail($email))
    	{
	        $config = Array(

	            'protocol' => 'smtp',
	            'smtp_host' => 'ssl://smtp.gmail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'smartmekong16@gmail.com', // change it to yours
	            'smtp_pass' => 'smartmekong',
	            'mailtype' => 'html',
	            'charset' => 'utf-8',
	            'wordwrap' => TRUE
	        );

	        $this->load->library('email', $config);
	        $this->email->set_newline("\r\n");

	        $this->email->from('smartmekong16@gmail.com', 'Mekong Tourism');
	        $this->email->to($email);

	        $this->email->subject('Email phục hồi mật khẩu cho người dùng!');

	        $mk = "";

	        for ($i=0; $i < 6; $i++) { 
	        	$mk = $mk.rand(0, 9);
	        }

	        $password = $mk;

	        $note = '
	          <head>
	            <meta charset="utf-8">
	            <meta http-equiv="X-UA-Compatible" content="IE=edge">
	            <meta name="viewport" content="width=device-width, initial-scale=1">
	            <meta name="description" content="">
	            <meta name="author" content="">
	            <style type="text/css">
	              h3{
	                font-style: italic;
	                font-weight: bolder;
	                text-align: center;
	                font-size: 18px;
	              }
	              h4{
	                text-align: center;
	              }
	            </style>
	          </head>
	          <body>
	            <div style="margin: auto; width: 50%;" class="panel panel-success">
	                <a href="'.base_url().'home/trangchu">Trang chủ</a>
	                <h3>
	                  Chào mừng bạn đã đến với Website Du lịch Cửu Long! <br/>
	                  <p style="font-size: 15px; margin: 5px;" >Welcome to Website Mekong Tourism!</p>
	                </h3>

	                <h4> Mật khẩu mới của bạn là: '.$password.' | Vui lòng bấm vào link bên dưới để hoàn thành việc lấy lại mật khẩu! <br> 
	                  <a href="'.base_url().'index.php/nguoidung/forgotpassword/'.md5($email).'/'.$password.'">http://smartmekong.vn/dulich</a>
	                  <br/>
	                  <b>Chú ý:</b> <i style="color: #F00;">Sau khi xác nhận thành công bạn nên đăng nhập vào website và đổi mật khẩu mới!</i>
	                </h4>
	              </div>
	            </div>
	          </body>
	        ';
	        
	        $this->email->message($note);
	        if ($this->email->send()) {
	            //return true;
	            $status = "success";
	        } 
	        else 
	        {
	        	$status = "error";
	            //return false;
	            //show_error($this->email->print_debugger());
	        }
	    }
        $response = array('status' => $status);
		$jsonString = json_encode($response);
		echo $jsonString;
    }

	public function forgotpassword($email, $password)
	{
		$test = '0';

		$query = $this->mnguoidung->getList();
		$namemail = "";
		foreach ($query as $item) {
			if(md5($item['ND_DIACHIMAIL']) == $email)
			{
				$namemail = $item['ND_DIACHIMAIL'];
				$password1 = $item['ND_MATKHAU'];
				if(md5($password) != $password1)
				{
					$test = '1';
				}
				else
				{
					$test = '2';
				}
			}
		}

		if($test == '0')
		{
			$this->_data['info'] = "Email ".$namemail." của bạn không tồn tại hoặc đã bị xóa! <br/> Your email does not exist or has been deleted.";
			$this->load->view('sys/email', $this->_data);
		}
		if($test == '1')
		{
			$data = array(
			    "ND_MATKHAU" => md5($password)
			);
			if($this->mnguoidung->updateemail($namemail, $data))
			{
				$this->_data['info'] = "Mật khẩu của tài khoản ".$namemail." đã được phục hồi!";
				$this->load->view('sys/email', $this->_data);
			}
			else
			{
				$this->_data['info'] = "Mật khẩu của tài khoản ".$namemail." phục hồi không thành công!";
				$this->load->view('sys/email', $this->_data);
			}
			
		}
		if($test == '2')
		{
			$this->_data['info'] = "Link này đã bị xóa!";
			$this->load->view('sys/email', $this->_data);
		}
	}

	public function guimailkhoataikhoan()
    {
    	$status = "error";
    	$email = $_POST['email'];
    	$noidung = $_POST['noidung'];
    	if($this->mnguoidung->testEmail($email))
    	{
	        $config = Array(

	            'protocol' => 'smtp',
	            'smtp_host' => 'ssl://smtp.gmail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'smartmekong16@gmail.com', // change it to yours
	            'smtp_pass' => 'smartmekong',
	            'mailtype' => 'html',
	            'charset' => 'utf-8',
	            'wordwrap' => TRUE
	        );

	        $this->load->library('email', $config);
	        $this->email->set_newline("\r\n");

	        $this->email->from('smartmekong16@gmail.com', 'Mekong Tourism');
	        $this->email->to($email);

	        $this->email->subject('Email thông báo khóa tài khoản người dùng!');

	        if($noidung == "")
	        {
	        	$noidung = "Vì một lý do nào đó!";
	        }

	        $note = '
	          <head>
	            <meta charset="utf-8">
	            <meta http-equiv="X-UA-Compatible" content="IE=edge">
	            <meta name="viewport" content="width=device-width, initial-scale=1">
	            <meta name="description" content="">
	            <meta name="author" content="">
	            <style type="text/css">
	              h3{
	                font-style: italic;
	                font-weight: bolder;
	                text-align: center;
	                font-size: 18px;
	              }
	              h4{
	                text-align: center;
	              }
	            </style>
	          </head>
	          <body>
	            <div style="margin: auto; width: 50%;" class="panel panel-success">
	                <a href="'.base_url().'home/trangchu">Trang chủ</a>
	                <h3>
	                  Chào mừng bạn đã đến với Website Du lịch Cửu Long! <br/>
	                  <p style="font-size: 15px; margin: 5px;" >Welcome to Website Mekong Tourism!</p>
	                </h3>

	                <h4> Chúng tôi rất tiếc phải báo với bạn rằng tài khoản trên Website Mekong Tourism của bạn đã bị khóa! <br>
	                	Với lý do: <b style="color: #F00;">'.$noidung.'</b> <br>
	                	Để mở khóa tài khoản vui lòng liên hệ với quản trị website qua địa chỉ email: 
	                  <a href="mailto:smartmekong16@gmail.com">smartmekong16@gmail.com</a>
	                </h4>
	              </div>
	            </div>
	          </body>
	        ';
	        
	        $this->email->message($note);
	        if ($this->email->send()) {
	            //return true;
	            $status = "success";
	        } 
	        else 
	        {
	        	$status = "error";
	            //return false;
	            //show_error($this->email->print_debugger());
	        }
	    }
        $response = array('status' => $status);
		$jsonString = json_encode($response);
		echo $jsonString;
    }
}