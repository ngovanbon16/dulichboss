<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mnguoidung');
	}

	public function searchplace()
	{
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->load->model("mdanhmuc");
		$this->_data['danhmuc'] = $this->mdanhmuc->getList();

		$this->_data['title'] = lang('search');
        $this->_data['subview'] = 'user/timkiem_view';
        $this->load->view('user/main.php', $this->_data);
        //$this->load->view('user/timkiem_view');
	}

	public function search()
	{
		$this->load->model("mdiadiem");
		if(isset($_GET['keyword']))
		{		
		    $keyword = 	trim($_GET['keyword']) ;		// Cắt bỏ khoảng trắng
			$keyword = $this->db->escape_like_str($keyword);	// Lọc các ký tự đặc biệt

			$chuoi = "";

			$str = $keyword.",";

			$a = array();
			$i = 0;
			while ($str != "") 
			{
				$lenght = strlen($str);
				$start = strpos($str, ",");
				$chuoi = substr($str, 0, $lenght - strlen(substr($str, $start)));
				$str = substr($str, $start + 1);
				$a[$i] = $chuoi;
				$i++;
			}

			$str0 = "";
			$str1 = "";
			$str2 = "";
			$str3 = "";
			$kytu = "x";
			if(isset($a[0]))
			{
				$value = trim($a[0]);
				if($value != $kytu)
				{
					$str0 = $value;
				}
			}
			if(isset($a[1]))
			{
				$value = trim($a[1]);
				if($value != $kytu)
				{
					$str1 = $value;
				}
			}
			if(isset($a[2]))
			{
				$value = trim($a[2]);
				if($value != $kytu)
				{
					$str2 = $value;
				}
			}
			if(isset($a[3]))
			{
				$value = trim($a[3]);
				if($value != $kytu)
				{
					$str3 = $value;
				}
			}

			/*echo $str0;
			echo  " | ";
			echo $str1;
			echo  " | ";
			echo $str2;
			echo  " | ";
			echo $str3;*/

			$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND (( DD_TEN LIKE '%$str0%' ) AND ( DM_TEN LIKE '%$str1%' ) AND ( H_TEN LIKE '%$str2%' ) AND ( T_TEN LIKE '%$str3%' )) ORDER BY DD_TEN ASC LIMIT 0, 10";

			$result = $this->mdiadiem->gettimkiem($query);

			echo '<h3>'.count($result).' '.lang('result').': "'.$_GET['keyword'].'" </h3>';
			if(count($result) > 0)
			{
				foreach ($result as $row) {
					echo '<div> <img src="'.base_url().'uploads/diadiem/'.$row['HA_TEN'].'" style="width: 150px; height: 100px; float: left; margin-right: 10px; border-radius: 3px;"> <div style="min-height: 100px;"> <p class="title"> <a href="'.base_url()."aediadiem/detailuser1/".$row['DD_MA'].'" target="_blank" ><i style="font-size: 20px; font-weight: bolder; color: #1AA5D1;" class="fa fa-angle-double-right"></i> <b>'.$row['DD_TEN'].'</b></a> <i style="font-size: 15px;">'.$row['DM_TEN'].' | '.$row['H_TEN'].' <i class="fa fa-angle-double-right"></i> '.$row['T_TEN'].'</i><br><i class="mota">'.$row['DD_MOTA'] .'</i></p> </div> </div>'   ;
				}
			}


			// Câu query lấy dữ liệu
			$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND ( DD_TEN LIKE '%$keyword%' OR DD_MOTA LIKE '%$keyword%' OR T_TEN LIKE '%$keyword%' OR H_TEN LIKE '%$keyword%' OR DM_TEN LIKE '%$keyword%' ) ORDER BY DD_TEN ASC LIMIT 0, 20";

			// Kết nối Database, thực hiện câu truy vấn
			$result = $this->mdiadiem->gettimkiem($query);

			// Kiểm tra có dòng record nào hay không?
			echo '<h3>'.count($result).' '.lang('result').': "'.$_GET['keyword'].'" </h3>';
			if(count($result) > 0)
			{
				foreach ($result as $row) {
					echo '<div> <img src="'.base_url().'uploads/diadiem/'.$row['HA_TEN'].'" style="width: 130px; height: 90px; float: left; margin-right: 10px; border-radius: 3px;"> <div style="min-height: 90px;"> <p class="title"> <a href="'.base_url()."aediadiem/detailuser1/".$row['DD_MA'].'" target="_blank" ><i style="font-size: 20px; font-weight: bolder; color: #1AA5D1;" class="fa fa-angle-double-right"></i> <b>'.$row['DD_TEN'].'</b></a> <i style="font-size: 15px;">'.$row['DM_TEN'].' | '.$row['H_TEN'].' <i class="fa fa-angle-double-right"></i> '.$row['T_TEN'].'</i><br><i class="mota">'.$row['DD_MOTA'] .'</i></p> </div> </div>'   ;
				}
			}
			else 
			{
				//echo 'Không có kết quả nào cho từ khóa :"'.$_GET['keyword'].'"';
			}
		}
		else 
		{
			echo 'Không có từ khóa nào được gởi đến.';
		}
	}

	public function search1()
	{
		$this->load->model("mdiadiem");
		$keyworddd1 = "";
		if(isset($_GET['keyworddd']))
		{
			$keyworddd = trim($_GET['keyworddd']);
			$keyworddd = $this->db->escape_like_str($keyworddd);
			if($keyworddd != "")
			{
				$keyworddd1 = " AND ( DD_TEN LIKE '%".$keyworddd."%' ) ";
			}
		}

		$keyworddm1 = "";
		if(isset($_GET['keyworddm']))
		{
			$keyworddm = trim($_GET['keyworddm']);
			$keyworddm = $this->db->escape_like_str($keyworddm);
			if($keyworddm != "")
			{
				$keyworddm1 = " AND ( diadiem.DM_MA = '".$keyworddm."' ) ";
			}
		}

		$keywordt1 = "";
		if(isset($_GET['keywordt']))
		{
			$keywordt = trim($_GET['keywordt']);
			$keywordt = $this->db->escape_like_str($keywordt);
			if($keywordt != "")
			{
				$keywordt1 = " AND ( diadiem.T_MA = '".$keywordt."' ) ";
			}
		}

		$keywordh1 = "";
		if(isset($_GET['keywordh']))
		{
			$keywordh = trim($_GET['keywordh']);
			$keywordh = $this->db->escape_like_str($keywordh);
			if($keywordh != "")
			{
				$keywordh1 = " AND ( diadiem.H_MA = '".$keywordh."' ) ";
			}
		}

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' ".$keyworddd1.$keyworddm1.$keywordt1.$keywordh1." ORDER BY DD_TEN ASC LIMIT 0, 20";

		$result = $this->mdiadiem->gettimkiem($query);

		echo '<h2>'.count($result).' '.lang('result').': </h2>';
		if(count($result) > 0)
		{
			foreach ($result as $row) {
				echo '<div> <img src="'.base_url().'uploads/diadiem/'.$row['HA_TEN'].'" style="width: 150px; height: 100px; float: left; margin-right: 10px; border-radius: 3px;"> <div style="min-height: 100px;"> <p class="title"> <a href="'.base_url()."aediadiem/detailuser1/".$row['DD_MA'].'" target="_blank" ><i style="font-size: 20px; font-weight: bolder; color: #1AA5D1;" class="fa fa-angle-double-right"></i> <b>'.$row['DD_TEN'].'</b></a> <i style="font-size: 15px;">'.$row['DM_TEN'].' | '.$row['H_TEN'].' <i class="fa fa-angle-double-right"></i> '.$row['T_TEN'].'</i><br><i class="mota">'.$row['DD_MOTA'] .'</i></p> </div> </div>'   ;
			}
		}
	}

	public function account()
	{
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$id = "0";
		if(isset($this->session->userdata['id']))
		{
			$id = $this->session->userdata['id'];
		
			$data = $this->_data['info'] = $this->mnguoidung->getID($id);

			$matinh = $data["T_MA"];
			$mahuyen = $data["H_MA"];
			$maxa = $data["X_MA"];

			$this->load->model('mtinh');
			$this->load->model('mhuyen');
			$this->load->model('mxa');

			$tinh = $this->mtinh->getID($matinh);//lay ten tinh
	       	$this->_data['tentinh'] = $tinh["T_TEN"];

			$huyen = $this->mhuyen->getten($matinh, $mahuyen);//lay ten huyen
	       	$this->_data['tenhuyen'] = $huyen["H_TEN"];

	       	$xa = $this->mxa->getten($matinh, $mahuyen, $maxa);//lay ten xa
	       	$this->_data['tenxa'] = $xa["X_TEN"];

			$this->_data['title'] = lang('account');
	        $this->_data['subview'] = 'user/nguoidung_view';
	        $this->load->view('user/main.php', $this->_data);
    	}
    	else
    	{
    		redirect("./");
    	}
	}

	public function edit($id)
	{
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		if(isset($this->session->userdata['id']))
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
	        $this->_data['subview'] = 'user/suand_view';
	        $this->load->view('user/main.php', $this->_data);
	    }
	    else
	    {
	    	redirect("./");
	    }
	}

	public function update()
	{
		$password = "";

		$ND_MA = $this->db->escape_like_str($_POST["ND_MA"]);
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
               "ND_HO" => $ND_HO,
               "ND_TEN" => $ND_TEN,
               "ND_DIACHIMAIL" => $ND_DIACHIMAIL,
               "ND_NGAYSINH" => $ND_NGAYSINH,
               "ND_GIOITINH" => $ND_GIOITINH,
               "T_MA" => $T_MA,
               "H_MA" => $H_MA,
               "X_MA" => $X_MA,
               "ND_DIACHI" => $ND_DIACHI,
               "ND_SDT" => $ND_SDT,
               "ND_FACE" => $ND_FACE,
               "ND_GIOITHIEU" => $ND_GIOITHIEU,
               "ND_NGAYCAPNHAT" => $date,
            );
            $this->mnguoidung->update($ND_MA, $data);
            $status = "success";
		}

		$response = array('status' => $status,'msg' => $msg, 'data' => $data, 'password' => $password);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	function map($local)
	{
		if($local == "")
		{
			$local = '10.021555, 105.764830';
			$center = "can tho";
		}
		else
		{
			$center = $local;
		}

		$this->load->library('googlemaps');

		$config = array();
		$config['center'] = $center;

		$config['zoom'] = 'auto';
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
		$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
		$config['placesAutocompleteOnChange'] = "

			var place = placesAutocomplete.getPlace();
			map.setCenter(place.geometry.location);
		    map.setZoom(15);
		    markers_map[0].setPosition(place.geometry.location);
		    markers_map[0].setVisible(true);

		";
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $local;
		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';
		$marker['icon'] = base_url().'/assets/images/movelocal.png';
		$marker['onmouseup'] = " 

			/*alert(event.latLng.lat() + ' , ' + event.latLng.lng());*/ 
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();
			var vitri = lat + ', ' + lng;
			document.getElementById('lat').value = lat;
			document.getElementById('lng').value = lng;
			document.getElementById('DD_VITRI').value = vitri;

		";
		$this->googlemaps->add_marker($marker);
		return $this->googlemaps->create_map();
	}

	public function addnewplace()
	{
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();
		
		if(isset($this->session->userdata['id']))
		{
			$this->_data['map'] = $this->map("");
			$this->_data['title'] = lang('add_new_place');
	        $this->_data['subview'] = 'user/themdiadiem_view';
	        $this->load->view('user/main.php', $this->_data);
	    }
	    else
	    {
	    	redirect('./');
	    }
	}

	public function poster($id)
	{
		$this->load->model("mdiadiem");
		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_MA = '$id' ";

		// Kết nối Database, thực hiện câu truy vấn
		$result = $this->mdiadiem->getdata($query);

		$query1 = "SELECT * FROM hinhanh WHERE DD_MA = '$id'";
		$result1 = $this->mdiadiem->gettimkiem($query1);
		$this->_data['hinhanh'] = $result1;

		$this->_data['map'] = $this->mapuser($id, $result["DD_VITRI"]);

		$this->_data['vitri'] = $result["DD_VITRI"];
		$this->_data['data'] = $result;
		$this->_data['title'] = lang('poster');
        $this->_data['subview'] = 'user/poster_view';
        //$this->load->view('user/main.php', $this->_data);
        $this->load->view('user/poster_view1', $this->_data);
	}

	function mapuser($id, $local)
	{
		$this->load->library('googlemaps');

		$config = array();
		$config['center'] = $local;
		$config['zoom'] = '5';

		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $local;
		$this->googlemaps->add_marker($marker);
		
		return $this->googlemaps->create_map();
	}

	public function info()
	{
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$id = "0";
		if(isset($this->session->userdata['id']))
		{
			$id = $this->session->userdata['id'];

			$this->load->model("mdiadiem");
			$query = "SELECT * FROM nguoidung WHERE ND_MA = '$id' ";
			$this->_data["info"] = $this->mdiadiem->getdata($query);

			$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA JOIN nguoidung_diadiem ON diadiem.DD_MA = nguoidung_diadiem.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND nguoidung_diadiem.ND_MA = '$id' AND nguoidung_diadiem.NDDD_YEUTHICH = '1' ";
			$this->_data["yeuthich"] = $this->mdiadiem->gettimkiem($query);

			$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA JOIN nguoidung_diadiem ON diadiem.DD_MA = nguoidung_diadiem.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND nguoidung_diadiem.ND_MA = '$id' AND nguoidung_diadiem.NDDD_MUONDEN = '1' ";
			$this->_data["muonden"] = $this->mdiadiem->gettimkiem($query);

			$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA JOIN nguoidung_diadiem ON diadiem.DD_MA = nguoidung_diadiem.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND nguoidung_diadiem.ND_MA = '$id' AND nguoidung_diadiem.NDDD_DADEN = '1' ";
			$this->_data["daden"] = $this->mdiadiem->gettimkiem($query);

			$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA JOIN nguoidung ON nguoidung.ND_MA = diadiem.ND_MA WHERE hinhanh.HA_DAIDIEN = '1' AND nguoidung.ND_MA = '$id'";
			$this->_data["diadiem"] = $this->mdiadiem->gettimkiem($query);

			$query = "SELECT * FROM baiviet WHERE ND_MA = '$id' ";
			$this->_data["baiviet"] = $this->mdiadiem->gettimkiem($query);

			$this->_data['title'] = lang('account');
	        $this->_data['subview'] = 'user/thongtinnguoidung_view';
	        $this->load->view('user/main.php', $this->_data);
    	}
    	else
    	{
    		redirect("./");
    	}
	}

	public function getdatainfo()
	{
		$id = $this->session->userdata['id'];
		$ten = $_POST["ten"];
		$start = $_POST["start"];
		$length = $_POST["length"];

		$str = "";
		if($ten == "yeuthich")
		{
			$str = "nguoidung_diadiem.NDDD_YEUTHICH";
		}
		if($ten == "muonden")
		{
			$str = "nguoidung_diadiem.NDDD_MUONDEN";
		}
		if($ten == "daden")
		{
			$str = "nguoidung_diadiem.NDDD_DADEN";
		}

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA JOIN nguoidung_diadiem ON diadiem.DD_MA = nguoidung_diadiem.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND nguoidung_diadiem.ND_MA = '$id' AND ".$str." = '1' LIMIT $start, $length";
		
		if($ten == "diadiem")
		{
			$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA JOIN nguoidung ON diadiem.ND_MA = nguoidung.ND_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.ND_MA = '$id' LIMIT $start, $length";
		}

		$this->load->model("mdiadiem");
		$response = $this->mdiadiem->gettimkiem($query);

		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function getdatainfobaiviet()
	{
		$id = $this->session->userdata['id'];
		$start = $_POST["start"];
		$length = $_POST["length"];

		$query = "SELECT * FROM baiviet WHERE ND_MA = '$id' LIMIT $start, $length";
		
		$this->load->model("mdiadiem");
		$response = $this->mdiadiem->gettimkiem($query);

		$jsonString = json_encode($response);
		echo $jsonString;
	}

}

?>