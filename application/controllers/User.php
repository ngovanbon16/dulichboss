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

			// Câu query lấy dữ liệu
			$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND ( DD_TEN LIKE '%$keyword%' OR DD_MOTA LIKE '%$keyword%' OR T_TEN LIKE '%$keyword%' OR H_TEN LIKE '%$keyword%' OR DM_TEN LIKE '%$keyword%' ) ORDER BY DD_TEN ASC LIMIT 0, 20";

			// Kết nối Database, thực hiện câu truy vấn
			$result = $this->mdiadiem->gettimkiem($query);

			// Kiểm tra có dòng record nào hay không?
			echo '<h3>'.count($result).' '.lang('result').': "'.$_GET['keyword'].'" </h3>';
			if(count($result) > 0)
			{
				foreach ($result as $row) {
					echo '<div> <img src="'.base_url().'uploads/diadiem/'.$row['HA_TEN'].'" style="width: 100px; hieght: 100px; float: left; margin-right: 10px; border-radius: 3px;"> <p class="title"> <a href="'.base_url()."aediadiem/detailuser1/".$row['DD_MA'].'" target="_blank" ><i style="font-size: 20px; font-weight: bolder; color: #B9D3EE;" class="fa fa-angle-double-right"></i> <b>'.$row['DD_TEN'].'</b></a> <i style="font-size: 15px;">'.$row['H_TEN'].' <i class="fa fa-angle-double-right"></i> '.$row['T_TEN'].'</i><br><i class="mota">'.$row['DD_MOTA'] .'</i></p> </div>'   ;
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

	public function account()
	{
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

		$ND_MA = $_POST["ND_MA"];
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

}

?>