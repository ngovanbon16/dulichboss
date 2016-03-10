<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
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
		$this->_data['info'] = $this->mdiadiem->getList1(8, 0);
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

       	$this->_data['title'] = 'Trang chủ';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function loadthemdiadiem()
	{
		$count = $_POST["count"];
		$this->load->model("mdiadiem");
		$data = $this->mdiadiem->getList1(4, $count);

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

       	$this->_data['title'] = 'Giới thiệu';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function lienhe()
	{
		$this->_data['subview'] = 'user/lienhe_view';
		$this->_data['active'] = "lienhe";

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

       	$this->_data['title'] = 'Liên hệ';
       	$this->load->view('user/main.php', $this->_data);
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

	public function map()
	{
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$DM_MA = "";
		if(isset($this->session->userdata['DM_MA']))
		{
			$DM_MA = $this->session->userdata['DM_MA'];
		}

		$T_MA = "";
		if(isset($this->session->userdata['T_MA']))
		{
			$T_MA = $this->session->userdata['T_MA'];
		}

		$H_MA = "";
		if(isset($this->session->userdata['H_MA']))
		{
			$H_MA = $this->session->userdata['H_MA'];
		}

		$X_MA = "";
		if(isset($this->session->userdata['X_MA']))
		{
			$X_MA = $this->session->userdata['X_MA'];
		}

		$this->load->model("mdanhmuc"); // lay ten
       	$xa = $this->mdanhmuc->getID($DM_MA);
       	$this->_data['tendanhmuc'] = $xa["DM_TEN"];

       	$this->load->model("mtinh");
       	$tinh = $this->mtinh->getID($T_MA);
       	$this->_data['tentinh'] = $tinh["T_TEN"];

       	$this->load->model("mhuyen");
       	$huyen = $this->mhuyen->getten($T_MA, $H_MA);
       	$this->_data['tenhuyen'] = $huyen["H_TEN"];

       	$this->load->model("mxa");
       	$xa = $this->mxa->getten($T_MA, $H_MA, $X_MA);
       	$this->_data['tenxa'] = $xa["X_TEN"];

		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = 'can tho';
		$config['zoom'] = '9';
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
		$this->load->model("mhinhanh");
		$query = $this->mdiadiem->getloc($T_MA, $H_MA, $X_MA, $DM_MA);
		foreach ($query as $item) {
			$local = $item['DD_VITRI'];
			$danhmuc = $item['DM_MA'];
			$marker = array();
			$marker['position'] = $local;

			$madd = $item['DD_MA'];
            $anhdaidien = "anhdaidien.jpg";
            $info1 = $this->mhinhanh->getloc($madd);
            if($info1 != "") 
            foreach ($info1 as $key) {  
	            $dd = $key['HA_DAIDIEN'];
	            if($dd == "1")
	            {
	                $anhdaidien = $key['HA_TEN'];
	            }
            }

			$hinh = "<img src='".base_url()."uploads/diadiem/".$anhdaidien."' width='150' hgiht='150'>";
			$noidung = "<a target='_blank' href='".base_url()."index.php/aediadiem/detailuser/".$madd."'><br/><b><i>".$item['DD_TEN']." </i></b></a><br/>".$item['DD_DIACHI'];
			$marker['infowindow_content'] = $hinh.$noidung;
			$marker['id'] = $madd;
			//$marker['onclick'] = 'alert("You just clicked me!!")';
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