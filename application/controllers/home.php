<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function auto() // chay ngam xoa cac tai khoan het han kich hoat
	{
		$this->load->model("mnguoidung"); 
		$info = $this->mnguoidung->getnotactived();
		$today = date('Y-m-d');
        foreach ($info as $iteam) {
            $date = date("Y-m-d", strtotime($iteam["ND_NGAYTAO"]));
            $days = (strtotime(date("Y-m-d")) - strtotime($date)) / (60 * 60 * 24);
            if($days > 3)
            {   
                $this->mnguoidung->delete($iteam['ND_MA']);
            }
        }
	}

	public function index()
	{
		$this->auto();

		$this->load->model("mdiadiem");
		$this->_data['newplace'] = $this->mdiadiem->countnewplace();

		$this->load->model("mbaiviet");
		$this->_data['baivietmoi'] = $this->mbaiviet->countdaduyet();

		$this->_data['subview'] = 'home';
       	$this->_data['title'] = lang('home');
       	$this->load->view('main.php', $this->_data);
	}

	public function loaddata()
	{
		$this->load->model("mdiadiem");
		$txtdiadiem = $this->mdiadiem->countnewplace();

		$this->load->model("mbaiviet");
		$txtbaiviet = $this->mbaiviet->countdaduyet();

		$this->load->model("mnguoidung");
		$txtnguoidung = $this->mnguoidung->countkichhoat();

		$this->load->model("mhinhanh");
		$txthinhanh = $this->mhinhanh->countdaduyet();

		$response = array('txtdiadiem' => $txtdiadiem, 'txtbaiviet' => $txtbaiviet, 'txtnguoidung' => $txtnguoidung, 'txthinhanh' => $txthinhanh);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function trangchu()
	{
		$this->_data['subview'] = 'user/trangchu_view';
		$this->_data['active'] = "trangchu";
		$this->load->model("mdiadiem");

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' ORDER BY diadiem.DD_NGAYCAPNHAT DESC, diadiem.DD_NGAYDANG DESC LIMIT 0, 21";
		$this->_data['info'] = $this->mdiadiem->gettimkiem($query);

		$T_MA = "";
		if(isset($this->session->userdata['T_MA']))
		{
			$T_MA = $this->session->userdata['T_MA'];
		}

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' ORDER BY diadiem.DD_LUOTXEM DESC LIMIT 0, 14";
		$this->_data['luotxem'] = $this->mdiadiem->gettimkiem($query);

		$this->load->model("mbaiviet");
		$query = "SELECT BV_TIEUDE, BV_MA FROM baiviet WHERE BV_DUYET = '1' ORDER BY BV_NGAYDANG DESC LIMIT 0,10";
		$result = $this->mbaiviet->gettimkiem($query);
		$this->_data['baiviet'] = $result;

		$query = "SELECT diadiem.DD_MA, diadiem.DD_TEN, tinh.T_TEN, huyen.H_TEN, hinhanh.HA_TEN, (SUM(binhluan.BL_CHATLUONG)+SUM(binhluan.BL_PHUCVU)+SUM(binhluan.BL_KHONGGIAN))/count(diadiem.DD_MA)/3 diem FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN binhluan ON diadiem.DD_MA = binhluan.DD_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' GROUP BY diadiem.DD_MA  ORDER BY diem DESC LIMIT 0, 6";
		$this->_data['danhgia'] = $this->mdiadiem->gettimkiem($query);

       	$this->_data['title'] = 'Trang chủ';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function loadthemdiadiem()
	{
		$start = $_POST["start"];
		$length = $_POST["length"];
		$this->load->model("mdiadiem");

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' ORDER BY diadiem.DD_NGAYCAPNHAT DESC, diadiem.DD_NGAYDANG DESC LIMIT $start, $length";
		$data = $this->mdiadiem->gettimkiem($query);

		$jsonString = json_encode($data);
		echo $jsonString;
	}

	public function gioithieu()
	{
		$this->_data['subview'] = 'user/gioithieu_view';
		$this->_data['active'] = "gioithieu";

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->load->model("mthongtin");
		$this->_data["gioithieu"] = $this->mthongtin->getID("1");

       	$this->_data['title'] = 'Giới thiệu';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function lienhe()
	{
		$this->_data['subview'] = 'user/lienhe_view';
		$this->_data['active'] = "lienhe";

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->load->model("mthongtin");
		$this->_data["gioithieu"] = $this->mthongtin->getID("1");

       	$this->_data['title'] = 'Liên hệ';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function theodanhmuc()
	{
		$this->_data['subview'] = 'user/danhmuc_view';
		$this->_data['active'] = "danhmuc";

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->load->model("mdanhmuc");
		$this->_data['danhmuc'] = $this->mdanhmuc->getList();

       	$this->_data['title'] = 'Danh mục';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function getdanhmuc()
	{
		$this->load->model("mdiadiem");
		$DM_MA = $_POST['ma'];
		$start = $_POST['start'];
		$length = $_POST['length'];
		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE danhmuc.DM_MA = '$DM_MA' AND hinhanh.HA_DAIDIEN = '1'  ORDER BY diadiem.DD_NGAYDANG DESC LIMIT $start, $length";

		// Kết nối Database, thực hiện câu truy vấn
		$result = $this->mdiadiem->gettimkiem($query);		

		$jsonString = json_encode($result);
		echo $jsonString;
	}	

	public function khuvuc($matinh)
	{
		$this->_data['subview'] = 'user/khuvuc_view';
		$this->_data['active'] = "khuvuc";
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$tinh = $this->mtinh->getID($matinh);//lay ten tinh
       	$this->_data['tentinh'] = $tinh["T_TEN"];

		$this->load->model("mhuyen");
		$this->_data['huyen'] = $this->mhuyen->getid($matinh);

		$this->load->model("mdiadiem");
		$this->load->model("mhinhanh");
		$this->_data['info'] = $this->mdiadiem->getList();
		$this->_data['info1'] = $this->mhinhanh->getList();

		if(isset($this->session->userdata['H_MA']))
		{
			$this->session->unset_userdata("H_MA");
		}

		// $this->_data['T_MA'] = $matinh; 
		$datatinh = array( 
			'T_MA' => $matinh 
		);
		$this->session->set_userdata($datatinh); // tao session tinh

       	$this->_data['title'] = 'Khu vực';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function theohuyen($matinh, $mahuyen)
	{
		$this->_data['subview'] = 'user/khuvuc_view';
		$this->_data['active'] = "khuvuc";
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$tinh = $this->mtinh->getID($matinh);//lay ten tinh
       	$this->_data['tentinh'] = $tinh["T_TEN"];

		$this->load->model("mhuyen");
		$this->_data['huyen'] = $this->mhuyen->getid($matinh);

		$this->load->model("mdiadiem");
		$this->load->model("mhinhanh");
		$this->_data['info'] = $this->mdiadiem->getList();
		$this->_data['info1'] = $this->mhinhanh->getList();

		// $this->_data['T_MA'] = $matinh; 
		$datatinh = array( 
			'T_MA' => $matinh,
			'H_MA' => $mahuyen 
		);
		$this->session->set_userdata($datatinh); // tao session tinh

       	$this->_data['title'] = 'Khu vực';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function gethuyen()
	{
		$this->load->model("mdiadiem");
		$H_MA = $_POST['ma'];
		$start = $_POST['start'];
		$length = $_POST['length'];
		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE huyen.H_MA = '$H_MA' AND hinhanh.HA_DAIDIEN = '1'  ORDER BY diadiem.DD_NGAYDANG DESC LIMIT $start, $length";

		// Kết nối Database, thực hiện câu truy vấn
		$result = $this->mdiadiem->gettimkiem($query);		

		$jsonString = json_encode($result);
		echo $jsonString;
	}

	public function map()
	{
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$WHERE_DM = "";
		$WHERE_T = "";
		$WHERE_H = "";
		$WHERE_X = "";

		$DM_MA = "";
		if(isset($this->session->userdata['DM_MA']))
		{
			$DM_MA = $this->session->userdata['DM_MA'];
			$WHERE_DM = " AND diadiem.DM_MA = '".$DM_MA."' ";
		}

		$T_MA = "";
		if(isset($this->session->userdata['T_MA']))
		{
			$T_MA = $this->session->userdata['T_MA'];
			$WHERE_T = " AND diadiem.T_MA = '".$T_MA."' ";
		}

		$H_MA = "";
		if(isset($this->session->userdata['H_MA']))
		{
			$H_MA = $this->session->userdata['H_MA'];
			$WHERE_H = " AND diadiem.H_MA = '".$H_MA."' ";
		}

		$X_MA = "";
		if(isset($this->session->userdata['X_MA']))
		{
			$X_MA = $this->session->userdata['X_MA'];
			$WHERE_X = " AND diadiem.X_MA = '".$X_MA."' ";
		}

		$this->_data['DM_MA'] = $DM_MA;
		$this->_data['T_MA'] = $T_MA;
		$this->_data['H_MA'] = $H_MA;
		$this->_data['X_MA'] = $X_MA;

		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = 'can tho';
		$config['zoom'] = '8';
		$config['cluster'] = TRUE;
		$config['onclick'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';

		$this->googlemaps->initialize($config);

		$this->load->model("mdiadiem");

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' ".$WHERE_DM.$WHERE_T.$WHERE_H.$WHERE_X;

		$result = $this->mdiadiem->gettimkiem($query);

		foreach ($result as $item) {
			$danhmuc = $item['DM_MA'];
			$marker = array();
			$marker['position'] = $item['DD_VITRI'];

			$madd = $item['DD_MA'];
            $anhdaidien = $item['HA_TEN'];

            $duong = lang('information_is_being_updated');
            if($item["DD_DIACHI"] != "")
            {
            	$duong = $item["DD_DIACHI"];
            }

            $sdt = lang('information_is_being_updated');
            if($item["DD_SDT"] != "")
            {
            	$sdt = $item["DD_SDT"];
            }

            $mota = lang('information_is_being_updated');
            if($item["DD_MOTA"] != "")
            {
            	$mota = $item["DD_MOTA"];
            }

			$hinh = "<img class='img' src='".base_url()."uploads/diadiem/".$anhdaidien."' width='150' hgiht='150'>";
			$noidung = "<a target='_blank' href='".base_url()."aediadiem/detailuser1/".$madd."'><br/><b><i>".$item['DD_TEN']." </i></b></a>";
			$thongtin = '<br/><p><i class="fa fa-map-marker fa-fw"></i><b class="vitri">'.$item["DD_VITRI"].'</b>';
			$thongtin .= '<br/><i class="fa fa-road fa-fw"></i> '.$duong;
			$thongtin .= '<br/><i class="fa fa-phone fa-fw"></i> '.$sdt;
			$thongtin .= '<div class="mota"><i class="fa fa-bookmark fa-fw"></i> '.$mota.'</div></p>';
			$marker['infowindow_content'] = "<table><tr><td>".$hinh."</td><td valign='top' width='220'>".$noidung.$thongtin."</td></tr></table>";
			$marker['icon'] = base_url().'/uploads/danhmuc/'.$danhmuc.'.png';

			$str = trim($item["DD_VITRI"]);
			$length = strlen($str);
			$start = strpos($str, ',' );
			$lng = substr( $str,  $start + 1, $length - $start);
			$lat = substr( $str, '0', $length - strlen($lng) - 1 );
			$lng = trim($lng);
			$lat = trim($lat);

			$marker['onclick'] = 'updateDatabase("'.$lat.'","'.$lng.'");';
			$this->googlemaps->add_marker($marker);
		}

		/*$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('admin/map_view', $data);*/

		$this->_data['map'] = $this->googlemaps->create_map();
		$this->_data['count']= count($result);

		$this->_data['subview'] = 'user/map_view';
		$this->_data['active'] = "map";

       	$this->_data['title'] = 'Map';
       	$this->load->view('user/mainmap.php', $this->_data);
	}

	public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);

	  if ($unit == "K") {
	    return ($miles * 1.609344);
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}

	public function maparound($lat1, $lng1, $km)
	{
		$local = $lat1.', '.$lng1;
		if($lat1 == '0' && $lng1 == '0')
		{
			$local = "can tho";
		}

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->_data['DM_MA'] = "";
		$this->_data['T_MA'] = "";
		$this->_data['H_MA'] = "";
		$this->_data['X_MA'] = "";

		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = $local;
		$config['zoom'] = '15';
		//$config['cluster'] = TRUE;
		$config['onclick'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';

		$this->googlemaps->initialize($config);

		$this->load->model("mdiadiem");

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' ";

		$result = $this->mdiadiem->gettimkiem($query);

		$i = 0;
		foreach ($result as $item) {
			$str = trim($item["DD_VITRI"]);
			$length = strlen($str);
			$start = strpos($str, ',' );
			$lng = substr( $str,  $start + 1, $length - $start);
			$lat = substr( $str, '0', $length - strlen($lng) - 1 );
			$lng = trim($lng);
			$lat = trim($lat);

			if($this->distance($lat1, $lng1, $lat, $lng, "K") <= $km)
			{
				$danhmuc = $item['DM_MA'];
				$marker = array();
				$marker['position'] = $item['DD_VITRI'];

				$madd = $item['DD_MA'];
	            $anhdaidien = $item['HA_TEN'];

	            $duong = lang('information_is_being_updated');
	            if($item["DD_DIACHI"] != "")
	            {
	            	$duong = $item["DD_DIACHI"];
	            }

	            $sdt = lang('information_is_being_updated');
	            if($item["DD_SDT"] != "")
	            {
	            	$sdt = $item["DD_SDT"];
	            }

	            $mota = lang('information_is_being_updated');
	            if($item["DD_MOTA"] != "")
	            {
	            	$mota = $item["DD_MOTA"];
	            }

				$hinh = "<img class='img' src='".base_url()."uploads/diadiem/".$anhdaidien."' width='150' hgiht='150'>";
				$noidung = "<a target='_blank' href='".base_url()."aediadiem/detailuser1/".$madd."'><br/><b><i>".$item['DD_TEN']." </i></b></a>";
				$thongtin = '<br/><p><i class="fa fa-map-marker fa-fw"></i><b class="vitri">'.$item["DD_VITRI"].'</b>';
				$thongtin .= '<br/><i class="fa fa-road fa-fw"></i> '.$duong;
				$thongtin .= '<br/><i class="fa fa-phone fa-fw"></i> '.$sdt;
				$thongtin .= '<div class="mota"><i class="fa fa-bookmark fa-fw"></i> '.$mota.'</div></p>';
				$marker['infowindow_content'] = "<table><tr><td>".$hinh."</td><td valign='top' width='220'>".$noidung.$thongtin."</td></tr></table>";
				$marker['icon'] = base_url().'/uploads/danhmuc/'.$danhmuc.'.png';

				$marker['onclick'] = 'updateDatabase("'.$lat.'", "'.$lng.'");';
				$this->googlemaps->add_marker($marker);
				$i++;
			}
		}

		$marker = array();
		$marker['position'] = $local;
		//$marker['draggable'] = TRUE;
		//$marker['animation'] = 'DROP';
		$marker['icon'] = base_url().'/assets/images/movelocal2.png';
		$marker['onclick'] = 'thongbao("", "'.lang('you_have_chosen_the_location').': "+event.latLng.lat()+", "+event.latLng.lng(), "success");';
		$this->googlemaps->add_marker($marker);

		$circle = array();
		$circle['center'] = $local;
		$circle['radius'] = $km*1000;
		$circle['strokeColor'] = '#F8F8FF';
		$circle['fillColor'] = '#F8F8FF';
		$this->googlemaps->add_circle($circle);

		$this->_data['map'] = $this->googlemaps->create_map();

		$this->_data['lat'] = $lat1;
		$this->_data['lng'] = $lng1;
		$this->_data['km'] = $km;
		$this->_data['count'] = $i;

		$this->_data['subview'] = 'user/map_view';
		//$this->_data['active'] = "map";

       	$this->_data['title'] = 'Map';
       	$this->load->view('user/mainmap.php', $this->_data);
	}

	public function danhmuc()
	{
		$status = "success";
		if(isset($_POST['DM_MA']))
		{
			$DM_MA = $_POST['DM_MA'];

			$data = array( 
				'DM_MA' => $DM_MA 
			);
			$this->session->set_userdata($data); // tao session tinh

			$response = array('status' => $status, 'data' => $DM_MA);
			$jsonString = json_encode($response);
			echo $jsonString;
		}
	}

	public function tinh()
	{
		$status = "success";
		if(isset($_POST['T_MA']))
		{
			$T_MA = $_POST['T_MA'];

			$data = array( 
				'T_MA' => $T_MA 
			);
			$this->session->set_userdata($data); // tao session tinh
			$this->session->unset_userdata("H_MA");
			$this->session->unset_userdata("X_MA");
			$this->session->unset_userdata("DM_MA");

			$response = array('status' => $status, 'data' => $T_MA);
			$jsonString = json_encode($response);
			echo $jsonString;
		}
	}

	public function huyen()
	{
		$status = "success";
		if(isset($_POST['H_MA']))
		{
			$H_MA = $_POST['H_MA'];

			$data = array( 
				'H_MA' => $H_MA 
			);
			$this->session->set_userdata($data); // tao session huyen
			$this->session->unset_userdata("X_MA");
			$this->session->unset_userdata("DM_MA");

			$response = array('status' => $status, 'data' => $H_MA);
			$jsonString = json_encode($response);
			echo $jsonString;
		}
	}

	public function xa()
	{
		$status = "success";
		if(isset($_POST['X_MA']))
		{
			$X_MA = $_POST['X_MA'];

			$data = array( 
				'X_MA' => $X_MA 
			);
			$this->session->set_userdata($data); // tao session xa
			$this->session->unset_userdata("DM_MA");

			$response = array('status' => $status, 'data' => $X_MA);
			$jsonString = json_encode($response);
			echo $jsonString;
		}
	}

	public function xoa()
	{
		$status = "success";

		$this->session->unset_userdata("T_MA");
		$this->session->unset_userdata("H_MA");
		$this->session->unset_userdata("X_MA");
		$this->session->unset_userdata("DM_MA");

		$response = array('status' => $status);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}