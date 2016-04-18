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

	public function trangchu()
	{
		$this->_data['subview'] = 'user/trangchu_view';
		$this->_data['active'] = "trangchu";
		$this->load->model("mdiadiem");
		$this->load->model("mhinhanh");
		$this->_data['info'] = $this->mdiadiem->getList1(12, 0);
		$this->_data['info1'] = $this->mhinhanh->getList();

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->load->model("mhuyen");
		$this->_data["huyen"] = $this->mhuyen->getList();

		$T_MA = "";
		if(isset($this->session->userdata['T_MA']))
		{
			$T_MA = $this->session->userdata['T_MA'];
		}

		$this->_data['huyentt'] = $this->mhuyen->getid($T_MA);

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1'  ORDER BY diadiem.DD_LUOTXEM DESC LIMIT 0, 6";

		// Kết nối Database, thực hiện câu truy vấn
		$this->_data['luotxem'] = $this->mdiadiem->gettimkiem($query);

		$this->load->model("mbaiviet");
		$query = "SELECT BV_TIEUDE, BV_MA FROM baiviet WHERE BV_DUYET = '1' ORDER BY BV_NGAYDANG DESC LIMIT 0,10";
		$result = $this->mbaiviet->gettimkiem($query);
		$this->_data['baiviet'] = $result;

		$query = "SELECT diadiem.DD_MA, diadiem.DD_TEN, tinh.T_TEN, huyen.H_TEN, hinhanh.HA_TEN, (SUM(binhluan.BL_CHATLUONG)+SUM(binhluan.BL_PHUCVU)+SUM(binhluan.BL_KHONGGIAN))/count(diadiem.DD_MA)/3 diem FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN binhluan ON diadiem.DD_MA = binhluan.DD_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' GROUP BY diadiem.DD_MA  ORDER BY diem DESC LIMIT 0, 6";
		$this->_data['danhgia'] = $this->mdiadiem->gettimkiem($query);

       	$this->_data['title'] = 'Trang chủ';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function loadthemdiadiem()
	{
		$count = $_POST["count"];
		$this->load->model("mdiadiem");
		$data = $this->mdiadiem->getList1(6, $count);

		$this->load->model("mhinhanh");
		$hinh = $this->mhinhanh->getList();

		$this->load->model("mtinh");
		$tinh = $this->mtinh->getList();

		$this->load->model("mhuyen");
		$huyen = $this->mhuyen->getList();

		$status = "success";

		$response = array('status' => $status, 'data' => $data, 'hinh' => $hinh, 'tinh' => $tinh, 'huyen' => $huyen, 'count' => $count);
		$jsonString = json_encode($response);
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
		$config['zoom'] = '9';
		$config['cluster'] = TRUE;
		$config['onboundschanged'] = 'if (!centreGot) {
			var mapCentre = map.getCenter();
			marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
			});
		}
		centreGot = true;';

		/*$config['places'] = TRUE; // them cac maker xung quanh dia diem dinh san
		$config['placesLocation'] = '10.033046, 105.784651';
		$config['placesRadius'] = 200; */

		$this->googlemaps->initialize($config);
		   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$marker['onclick'] = 'alert("Bạn đang ở vị trí này!")';
		$this->googlemaps->add_marker($marker);

		$this->load->model("mdiadiem");

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' ".$WHERE_DM.$WHERE_T.$WHERE_H.$WHERE_X;

		$result = $this->mdiadiem->gettimkiem($query);

		foreach ($result as $item) {
			$local = $item['DD_VITRI'];
			$danhmuc = $item['DM_MA'];
			$marker = array();
			$marker['position'] = $local;

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
			$noidung = "<a target='_blank' href='".base_url()."index.php/aediadiem/detailuser1/".$madd."'><br/><b><i>".$item['DD_TEN']." </i></b></a>";
			$thongtin = '<br/><p><i class="fa fa-map-marker fa-fw"></i><b class="vitri">'.$item["DD_VITRI"].'</b>';
			$thongtin .= '<br/><i class="fa fa-road fa-fw"></i> '.$duong;
			$thongtin .= '<br/><i class="fa fa-phone fa-fw"></i> '.$sdt;
			$thongtin .= '<div class="mota"><i class="fa fa-bookmark fa-fw"></i> '.$mota.'</div></p>';
			$marker['infowindow_content'] = "<table><tr><td>".$hinh."</td><td valign='top' width='220'>".$noidung.$thongtin."</td></tr></table>";
			$marker['id'] = $madd;
			$marker['icon'] = base_url().'/uploads/danhmuc/'.$danhmuc.'.png';
			$this->googlemaps->add_marker($marker);
		}

		/*$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('admin/map_view', $data);*/

		$this->_data['map'] = $this->googlemaps->create_map();

		$this->_data['subview'] = 'user/map_view';
		$this->_data['active'] = "map";

       	$this->_data['title'] = 'Map';
       	$this->load->view('user/main.php', $this->_data);
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