<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aediadiem extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mdiadiem");
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
			//$local = "auto";
			$center = $local;
		}

		$this->load->library('googlemaps');

		$config = array();
		$config['center'] = $center;
		//$config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		/*$config['onboundschanged'] = 'if (!centreGot) {
			var mapCentre = map.getCenter();
			marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
			});
		}
		centreGot = true;';
		$this->googlemaps->initialize($config);
		   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$this->googlemaps->add_marker($marker);*/

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

	function danduong($id)
	{
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();
		
		$diadiem = $this->mdiadiem->getID($id);
		$matinhdd = $diadiem['T_MA'];
		$mahuyendd = $diadiem['H_MA']; 
       	$local = $diadiem['DD_VITRI'];

		$this->load->library('googlemaps');

		$config = array();
		$config['center'] = 'auto';
		$config['zoom'] = '17';

		//$config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		/*$config['onboundschanged'] = 'if (!centreGot) {
			var mapCentre = map.getCenter();
			marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
			});
		}
		centreGot = true;';*/
		$config['directions'] = TRUE;
		//$config['cluster'] = TRUE;
		$config['directionsStart'] = $config['center'];
		$config['directionsEnd'] = $local;
		$config['directionsDivID'] = 'directionsDiv';
		$this->googlemaps->initialize($config);
		   
		/*$marker = array();
		$this->googlemaps->add_marker($marker);*/

		/*$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.T_MA = '$matinhdd' AND diadiem.H_MA = '$mahuyendd'";*/

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_MA = '$id'";

		$result = $this->mdiadiem->gettimkiem($query);

		foreach ($result as $item) {
			$local = $item['DD_VITRI'];
			$marker = array();
			$marker['position'] = $local;
			$anhdaidien = $item['HA_TEN'];
            if($anhdaidien == "")
            {
            	$anhdaidien = "anhdaidien.jpg";
            }

			$hinh = "<a href='".base_url()."aediadiem/detailuser1/".$item['DD_MA']."'><img class='img' src='".base_url()."uploads/diadiem/".$anhdaidien."' width='180' hgiht='150'>";
			$noidung = "<div style='text-transform: uppercase; font-size: 16px; margin: 0px 0px 0px 0px; padding: 0px; width: 180px; max-height: 30px;'><input style='width: 180px; cursor: pointer; font-weight: bold;' type='text' value='".$item['DD_TEN']."' > </a></div><div style='width: 180px; text-transform: capitalize; color: #1AA5D1; background-color: #FFF; font-weight: bold;'><i>".$item['DD_DIACHI']."</i></div>";
			$marker['infowindow_content'] = $hinh.$noidung;
			$marker['icon'] = base_url().'/uploads/danhmuc/'.$item['DM_MA'].'.png';
			$this->googlemaps->add_marker($marker);
		}
		
		//return $this->googlemaps->create_map();
		$this->_data['map'] = $this->googlemaps->create_map();

		$this->_data['subview'] = "user/danduong_view";
        $this->_data['title'] = lang('map');
       	$this->load->view("user/main.php", $this->_data);
	}

	function mapuser($id)
	{	
		$diadiem = $this->mdiadiem->getID($id);
		$matinhdd = $diadiem['T_MA'];
		$mahuyendd = $diadiem['H_MA']; 
       	$local = $diadiem['DD_VITRI'];

		$this->load->library('googlemaps');

		$config = array();
		$config['center'] = $local;
		$config['zoom'] = '15';
		//$config['cluster'] = TRUE;
		$this->googlemaps->initialize($config);

		/*$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.T_MA = '$matinhdd' AND diadiem.H_MA = '$mahuyendd'";*/

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN danhmuc ON diadiem.DM_MA = danhmuc.DM_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_MA = '$id'";

		$result = $this->mdiadiem->gettimkiem($query);

		foreach ($result as $item) {
			$local = $item['DD_VITRI'];
			$marker = array();
			$marker['position'] = $local;
			$anhdaidien = $item['HA_TEN'];
            if($anhdaidien == "")
            {
            	$anhdaidien = "anhdaidien.jpg";
            }

			$hinh = "<a href='".base_url()."aediadiem/detailuser1/".$item['DD_MA']."'><img class='img' src='".base_url()."uploads/diadiem/".$anhdaidien."' width='180' hgiht='150'>";
			$noidung = "<div style='text-transform: uppercase; font-size: 16px; margin: 0px 0px 0px 0px; padding: 0px; width: 180px; max-height: 30px;'><input style='width: 180px; cursor: pointer; font-weight: bold;' type='text' value='".$item['DD_TEN']."' > </a></div><div style='width: 180px; text-transform: capitalize; color: #1AA5D1; background-color: #FFF; font-weight: bold;'><i>".$item['DD_DIACHI']."</i></div>";
			$marker['infowindow_content'] = $hinh.$noidung;
			$marker['icon'] = base_url().'/uploads/danhmuc/'.$item['DM_MA'].'.png';
			$this->googlemaps->add_marker($marker);
		}
		
		return $this->googlemaps->create_map();
	}

	public function index()
	{
		$data['map'] = $this->map("");
		$data['title'] = lang('add_new_place');
		$this->load->view('admin/themdiadiem_view', $data);
	}

	public function add()
	{
		$DD_TEN =  $this->db->escape_like_str($_POST["DD_TEN"]);
		$DM_MA =  $this->db->escape_like_str($_POST["DM_MA"]);
		$T_MA =  $this->db->escape_like_str($_POST["T_MA"]);
		$H_MA =  $this->db->escape_like_str($_POST["H_MA"]);
		$X_MA =  $this->db->escape_like_str($_POST["X_MA"]);
		$DD_DIACHI =  $this->db->escape_like_str($_POST["DD_DIACHI"]);
		$DD_SDT =  $this->db->escape_like_str($_POST["DD_SDT"]);
		$DD_EMAIL =  $this->db->escape_like_str($_POST["DD_EMAIL"]);
		$DD_WEBSITE =  $this->db->escape_like_str($_POST["DD_WEBSITE"]);
		$DD_MOTA =  $this->db->escape_like_str($_POST["DD_MOTA"]);
		$DD_VITRI =  $this->db->escape_like_str($_POST["DD_VITRI"]);
		$DD_GIOITHIEU =  $this->db->escape_like_str($_POST["DD_GIOITHIEU"]);
		$DD_BATDAU =  $this->db->escape_like_str($_POST["DD_BATDAU"]);
		$DD_KETTHUC =  $this->db->escape_like_str($_POST["DD_KETTHUC"]);
		$DD_GIATU =  $this->db->escape_like_str($_POST["DD_GIATU"]);
		$DD_GIADEN =  $this->db->escape_like_str($_POST["DD_GIADEN"]);
		$DD_NOIDUNG =  $this->db->escape_like_str($_POST["DD_NOIDUNG"]);

		date_default_timezone_set('Asia/Ho_Chi_Minh');  
	    $date = date('Y-m-d H:i:s');

		$ND_MA = $this->session->userdata('id');
		$DD_LUOTXEM = "0";
		$DD_DUYET = "0";
		$DD_NGAYDANG = $date;
		$DD_NGAYCAPNHAT = $date;

		$msg = array();

		if(($this->mdiadiem->testTen($DD_TEN)))
		{
			$msg["error"] = lang('place_name_already_exists');
		}

		$status = "error";
		$data_insert = array();
		if(count($msg) == 0)
		{
		      $data_insert = array(
		      	"ND_MA" => $ND_MA,
		        "DD_TEN" => $DD_TEN,
		        "DM_MA" => $DM_MA,
		        "T_MA" => $T_MA,
		        "H_MA" => $H_MA,
		        "X_MA" => $X_MA,
		        "DD_DIACHI" => $DD_DIACHI,
		        "DD_SDT" => $DD_SDT,
		        "DD_EMAIL" => $DD_EMAIL,
		        "DD_WEBSITE" => $DD_WEBSITE,
		        "DD_MOTA" => $DD_MOTA,
		        "DD_VITRI" => $DD_VITRI,
		        "DD_LUOTXEM" => $DD_LUOTXEM,
		        "DD_DUYET" => $DD_DUYET,
		        "DD_NGAYDANG" => $DD_NGAYDANG,
		        "DD_NGAYCAPNHAT" => $DD_NGAYCAPNHAT,
		        "DD_GIOITHIEU" => $DD_GIOITHIEU,
		        "DD_BATDAU" => $DD_BATDAU,
		        "DD_KETTHUC" => $DD_KETTHUC,
		        "DD_GIATU" => $DD_GIATU,
		        "DD_GIADEN" => $DD_GIADEN,
		        "DD_NOIDUNG" => $DD_NOIDUNG
		      );
	          $this->mdiadiem->insert($data_insert);
	          $status = "success";
		}
		$response = array('status' => $status,'msg' => $msg, 'data' => $data_insert);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function edit($id)
	{
       	$info = $this->mdiadiem->getID($id);

       		$this->_data['indexdanhmuc'] = "-1";
       		$this->_data['indextinh'] = "-1";
       		$this->_data['indexhuyen'] = "-1";
       		$this->_data['indexxa'] = "-1";

       		$this->load->model("mdanhmuc");
       		$query = $this->mdanhmuc->getList();
            $danhmuc = $info["DM_MA"]; 
            $i = -1;
            if($query != false)
            {
	            foreach ($query as $item) {
	            	$i++;
	            	if($danhmuc == $item["DM_MA"])
	           		{
	                	$this->_data['indexdanhmuc'] = $i;
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

        $this->_data['map'] = $this->map($info["DD_VITRI"]);
        $this->_data['info'] = $this->mdiadiem->getID($id);
        $this->_data["title"] = lang('edit_place_information');
       	$this->load->view("admin/suadiadiem_view", $this->_data);
	}

	public function detail($id) // id la ma cua dia diem - ham dung cho quan ly dia diem
	{
       	$info = $this->mdiadiem->getID($id);
       	$madanhmuc = $info['DM_MA'];
       	$matinh = $info['T_MA'];
       	$mahuyen = $info['H_MA'];
       	$maxa = $info['X_MA'];

       	$this->load->model("mdanhmuc");
       	$xa = $this->mdanhmuc->getID($madanhmuc);
       	$this->_data['tendanhmuc'] = $xa["DM_TEN"];

       	$this->load->model("mtinh");
       	$tinh = $this->mtinh->getID($matinh);
       	$this->_data['tentinh'] = $tinh["T_TEN"];

       	$this->load->model("mhuyen");
       	$huyen = $this->mhuyen->getten($matinh, $mahuyen);
       	$this->_data['tenhuyen'] = $huyen["H_TEN"];

       	$this->load->model("mxa");
       	$xa = $this->mxa->getten($matinh, $mahuyen, $maxa);
       	$this->_data['tenxa'] = $xa["X_TEN"];

       	$this->load->model("mbinhluan"); // them binh luan
       	$this->_data['binhluan'] = $this->mbinhluan->getdd($id);

       	$this->load->model("manhbinhluan"); // them anh binh luan
       	$this->_data['anhbinhluan'] = $this->manhbinhluan->getList();
       	
        $this->_data['map'] = $this->map($info["DD_VITRI"]);
        $this->_data['info'] = $this->mdiadiem->getID($id);
        $this->load->model("mhinhanh");
        $this->_data['info1'] = $this->mhinhanh->getloc($id);
       	$this->load->view("admin/chitietdiadiem_view", $this->_data);
	}

	public function detailadmin($id) // id la ma cua dia diem - ham dung cho quan ly dia diem
	{
		$this->load->model("mquyen");
		$email = $this->session->userdata["email"];
		if(!$this->mquyen->testquyen($email, "5"))
		{
			redirect(base_url() . "admin");
       	}

       	$info = $this->mdiadiem->getID($id);
       	$madanhmuc = $info['DM_MA'];
       	$matinh = $info['T_MA'];
       	$mahuyen = $info['H_MA'];
       	$maxa = $info['X_MA'];

       	$this->load->model("mdanhmuc");
       	$xa = $this->mdanhmuc->getID($madanhmuc);
       	$this->_data['tendanhmuc'] = $xa["DM_TEN"];

       	$this->load->model("mtinh");
       	$tinh = $this->mtinh->getID($matinh);
       	$this->_data['tentinh'] = $tinh["T_TEN"];

       	$this->load->model("mhuyen");
       	$huyen = $this->mhuyen->getten($matinh, $mahuyen);
       	$this->_data['tenhuyen'] = $huyen["H_TEN"];

       	$this->load->model("mxa");
       	$xa = $this->mxa->getten($matinh, $mahuyen, $maxa);
       	$this->_data['tenxa'] = $xa["X_TEN"];

       	/*$this->load->model("mbinhluan"); // them binh luan
       	$this->_data['binhluan'] = $this->mbinhluan->getdd($id);

       	$this->load->model("manhbinhluan"); // them anh binh luan
       	$this->_data['anhbinhluan'] = $this->manhbinhluan->getList();*/

       	$data = array( 
			'DD_MA' => $id 
		);
		$this->session->set_userdata($data);
       	
        $this->_data['map'] = $this->map($info["DD_VITRI"]);
        $this->_data['info'] = $this->mdiadiem->getID($id);
        $this->load->model("mhinhanh");
        $this->_data['info1'] = $this->mhinhanh->getloc($id);

        $this->_data['title'] = lang('detail');
        $this->_data['subview'] = "admin/ctdd_view";
       	$this->load->view("main.php", $this->_data);
	}

	public function detailuser($id) // id là mã cua địa điểm - ham dung cho user
	{
       	$info = $this->mdiadiem->getID($id);
       	$madanhmuc = $info['DM_MA'];
       	$matinh = $info['T_MA'];
       	$mahuyen = $info['H_MA'];
       	$maxa = $info['X_MA'];

       	$this->load->model("mdanhmuc");
       	$xa = $this->mdanhmuc->getID($madanhmuc);
       	$this->_data['tendanhmuc'] = $xa["DM_TEN"];

       	$this->load->model("mtinh");
       	$tinh = $this->mtinh->getID($matinh);
       	$this->_data['tentinh'] = $tinh["T_TEN"];

       	$this->load->model("mhuyen");
       	$huyen = $this->mhuyen->getten($matinh, $mahuyen);
       	$this->_data['tenhuyen'] = $huyen["H_TEN"];

       	$this->load->model("mxa");
       	$xa = $this->mxa->getten($matinh, $mahuyen, $maxa);
       	$this->_data['tenxa'] = $xa["X_TEN"];

       	
        $this->_data['map'] = $this->mapuser($id);
        $this->_data['info'] = $this->mdiadiem->getID($id);
        $this->load->model("mhinhanh");
        $this->_data['info1'] = $this->mhinhanh->getloc($id); // load hinh anh theo ma dia diem

        $this->load->model("mnguoidungdiadiem");
        $mand = $this->session->userdata('id');
        $this->_data['danhgia'] = $this->mnguoidungdiadiem->getchitiet($mand, $id);

        $this->_data['active'] = "khuvuc"; // co the bi  thay doi
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->load->model("mbinhluan"); // them binh luan
       	$this->_data['binhluan'] = $this->mbinhluan->getdd($id);

       	$this->load->model("manhbinhluan"); // them anh binh luan
       	$this->_data['anhbinhluan'] = $this->manhbinhluan->getList();

       	$this->_data['counthinhanh'] = $this->mhinhanh->counthinhanh($id); // dem so luong binh luan

       	$this->_data['countbinhluan'] = $this->mbinhluan->countbinhluan($id); // dem so luong binh luan

       	$this->_data['countcheckin'] = $this->mnguoidungdiadiem->countcheckin($id); // dem so luong check in
       	$this->_data['countyeuthich'] = $this->mnguoidungdiadiem->countyeuthich($id); // dem so luong yeu thich
       	$this->_data['countmuonden'] = $this->mnguoidungdiadiem->countmuonden($id); // dem so luong muon den

       	$diem = $this->mbinhluan->diemtrungbinh($id, "BL_CHATLUONG");
       	$this->_data['diemchatluong'] = round($diem['BL_CHATLUONG'], 1);

       	$diem = $this->mbinhluan->diemtrungbinh($id, "BL_PHUCVU");
       	$this->_data['diemphucvu'] = round($diem['BL_PHUCVU'], 1); 

       	$diem = $this->mbinhluan->diemtrungbinh($id, "BL_KHONGGIAN");
       	$this->_data['diemkhonggian'] = round($diem['BL_KHONGGIAN'], 1); 

        $this->_data['subview'] = "user/chitietdiadiem_view";
        $this->_data['title'] = "Địa điểm";
       	$this->load->view("user/main.php", $this->_data);
	}

	public function detailuser1($id) // id là mã cua địa điểm - ham dung cho user
	{
		$this->load->model('mbaiviet');

       	$info = $this->mdiadiem->getID($id);
       	$madanhmuc = $info['DM_MA'];
       	$matinh = $info['T_MA'];
       	$mahuyen = $info['H_MA'];
       	$maxa = $info['X_MA'];

       	$this->load->model("mdanhmuc");
       	$xa = $this->mdanhmuc->getID($madanhmuc);
       	$this->_data['tendanhmuc'] = $xa["DM_TEN"];

       	$this->load->model("mtinh");
       	$tinh = $this->mtinh->getID($matinh);
       	$this->_data['tentinh'] = $tinh["T_TEN"];

       	$this->load->model("mhuyen");
       	$huyen = $this->mhuyen->getten($matinh, $mahuyen);
       	$this->_data['tenhuyen'] = $huyen["H_TEN"];

       	$this->load->model("mxa");
       	$xa = $this->mxa->getten($matinh, $mahuyen, $maxa);
       	$this->_data['tenxa'] = $xa["X_TEN"];

       	
        $this->_data['map'] = $this->mapuser($id, $info["DD_VITRI"]);
        $this->_data['info'] = $this->mdiadiem->getuser($id);
        $this->load->model("mhinhanh");
        $this->_data['info1'] = $this->mhinhanh->getloc($id); // load hinh anh theo ma dia diem

        $this->load->model("mnguoidungdiadiem");
        $mand = $this->session->userdata('id');
        $this->_data['danhgia'] = $this->mnguoidungdiadiem->getchitiet($mand, $id);

        $this->_data['active'] = "khuvuc"; // co the bi  thay doi
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->load->model("mbinhluan"); // them binh luan
       	$this->_data['binhluan'] = $this->mbinhluan->getdd($id);

       	$this->load->model("manhbinhluan"); // them anh binh luan
       	$this->_data['anhbinhluan'] = $this->manhbinhluan->getList();

       	$this->_data['counthinhanh'] = $this->mhinhanh->counthinhanh($id); // dem so luong binh luan

       	$this->_data['countbinhluan'] = $this->mbinhluan->countbinhluan($id); // dem so luong binh luan

       	$this->_data['countcheckin'] = $this->mnguoidungdiadiem->countcheckin($id); // dem so luong check in
       	$this->_data['countyeuthich'] = $this->mnguoidungdiadiem->countyeuthich($id); // dem so luong yeu thich
       	$this->_data['countmuonden'] = $this->mnguoidungdiadiem->countmuonden($id); // dem so luong muon den
       	$this->_data['countbaiviet'] = $this->mbaiviet->countid($id); // dem so luong bai viet

       	$diem = $this->mbinhluan->diemtrungbinh($id, "BL_CHATLUONG");
       	$this->_data['diemchatluong'] = round($diem['BL_CHATLUONG'], 1);

       	$diem = $this->mbinhluan->diemtrungbinh($id, "BL_PHUCVU");
       	$this->_data['diemphucvu'] = round($diem['BL_PHUCVU'], 1); 

       	$diem = $this->mbinhluan->diemtrungbinh($id, "BL_KHONGGIAN");
       	$this->_data['diemkhonggian'] = round($diem['BL_KHONGGIAN'], 1); 

       	$query = "SELECT *, count(*) count FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN nguoidung_diadiem ON diadiem.DD_MA = nguoidung_diadiem.DD_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' GROUP BY diadiem.DD_MA  ORDER BY count DESC LIMIT 0, 6";
		$this->_data['yeuthich'] = $this->mdiadiem->gettimkiem($query);

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE (diadiem.DM_MA <> '7' AND diadiem.DM_MA <> '11' AND diadiem.DM_MA <> '8' AND diadiem.DM_MA <> '12') AND diadiem.H_MA = '$mahuyen' AND hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' AND diadiem.DD_MA <> '$id' ORDER BY diadiem.DD_NGAYDANG DESC LIMIT 0, 6";
		$this->_data['danhmuc'] = $this->mdiadiem->gettimkiem($query);

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE (diadiem.DM_MA = '7' OR diadiem.DM_MA = '11') AND diadiem.H_MA = '$mahuyen' AND hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' AND diadiem.DD_MA <> '$id' ORDER BY diadiem.DD_NGAYDANG DESC LIMIT 0, 6";
		$this->_data['nhahang'] = $this->mdiadiem->gettimkiem($query);

		$query = "SELECT * FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE (diadiem.DM_MA = '8' OR diadiem.DM_MA = '12') AND diadiem.H_MA = '$mahuyen' AND hinhanh.HA_DAIDIEN = '1' AND diadiem.DD_DUYET = '1' AND diadiem.DD_MA <> '$id' ORDER BY diadiem.DD_NGAYDANG DESC LIMIT 0, 6";
		$this->_data['khachsan'] = $this->mdiadiem->gettimkiem($query);

		$query = "SELECT * FROM baiviet JOIN diadiem ON diadiem.DD_MA = baiviet.DD_MA JOIN nguoidung ON nguoidung.ND_MA = baiviet.ND_MA WHERE baiviet.DD_MA = '$id' AND baiviet.BV_DUYET = '1' ORDER BY baiviet.BV_NGAYDANG DESC LIMIT 0,6";
		$this->_data['baiviet'] = $this->mbaiviet->gettimkiem($query);

        $this->_data['subview'] = "user/chitietdiadiem_view1";
        $this->_data['title'] = "Địa điểm";
       	$this->load->view("user/main.php", $this->_data);
	}

	public function getdata()
	{
		$DD_MA = $_POST['ma'];
		$start = $_POST['start'];
		$length = $_POST['length'];
		$query = "SELECT * FROM diadiem JOIN nguoidung ON diadiem.ND_MA = nguoidung.ND_MA JOIN binhluan ON binhluan.DD_MA = diadiem.DD_MA WHERE diadiem.DD_MA = '$DD_MA' ORDER BY binhluan.BL_NGAYDANG DESC LIMIT $start, $length";
		$diadiem = $this->mdiadiem->gettimkiem($query);

		$this->load->model("manhbinhluan");
		$binhluan = array();

		$i = 0;
		foreach ($diadiem as $row) {
			$tam = array();
			$tam["BL_MA"] = $row["BL_MA"];
			$tam["BL_TIEUDE"] = $row["BL_TIEUDE"];
			$tam["BL_NOIDUNG"] = $row["BL_NOIDUNG"];
			$tam["BL_CHATLUONG"] = $row["BL_CHATLUONG"];
			$tam["BL_PHUCVU"] = $row["BL_PHUCVU"];
			$tam["BL_KHONGGIAN"] = $row["BL_KHONGGIAN"];
			$tam["BL_NGAYDANG"] = $row["BL_NGAYDANG"];
			$tam["ND_HO"] = $row["ND_HO"];
			$tam["ND_TEN"] = $row["ND_TEN"];
			$tam["ND_HINH"] = $row["ND_HINH"];
			$tam["ANHBINHLUAN"] = $this->manhbinhluan->getanhbinhluan($row["BL_MA"]);

			$binhluan[$i] = $tam;
			$i++;
		}

		$response = array('diadiem' => $binhluan);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function update()
	{
		$DD_MA =  $this->db->escape_like_str($_POST["DD_MA"]);
		$DD_TEN =  $this->db->escape_like_str($_POST["DD_TEN"]);
		$DM_MA =  $this->db->escape_like_str($_POST["DM_MA"]);
		$T_MA =  $this->db->escape_like_str($_POST["T_MA"]);
		$H_MA =  $this->db->escape_like_str($_POST["H_MA"]);
		$X_MA =  $this->db->escape_like_str($_POST["X_MA"]);
		$DD_DIACHI =  $this->db->escape_like_str($_POST["DD_DIACHI"]);
		$DD_SDT =  $this->db->escape_like_str($_POST["DD_SDT"]);
		$DD_EMAIL =  $this->db->escape_like_str($_POST["DD_EMAIL"]);
		$DD_WEBSITE =  $this->db->escape_like_str($_POST["DD_WEBSITE"]);
		$DD_MOTA =  $this->db->escape_like_str($_POST["DD_MOTA"]);
		$DD_VITRI =  $this->db->escape_like_str($_POST["DD_VITRI"]);
		$DD_GIOITHIEU =  $this->db->escape_like_str($_POST["DD_GIOITHIEU"]);
		$DD_BATDAU =  $this->db->escape_like_str($_POST["DD_BATDAU"]);
		$DD_KETTHUC =  $this->db->escape_like_str($_POST["DD_KETTHUC"]);
		$DD_GIATU =  $this->db->escape_like_str($_POST["DD_GIATU"]);
		$DD_GIADEN =  $this->db->escape_like_str($_POST["DD_GIADEN"]);
		$DD_NOIDUNG =  $this->db->escape_like_str($_POST["DD_NOIDUNG"]);
		$DD_DUYET =  $this->db->escape_like_str($_POST["DD_DUYET"]);

		if($DD_DUYET == 'true')
		{
			$DD_DUYET = "1";
		}
		else
		{
			$DD_DUYET = "0";
		}

		date_default_timezone_set('Asia/Ho_Chi_Minh');  
	    $date = date('Y-m-d H:i:s');

		$ND_MA = $this->session->userdata('id');
		$DD_LUOTXEM = "0";
		$DD_NGAYDANG = $date;
		$DD_NGAYCAPNHAT = $date;

		$msg = array();

/*		if(($this->mdiadiem->testTen($DD_TEN)))
		{
			$msg["error"] = "Tên địa điểm đã tồn tại!";
		}*/

		$status = "error";
		$data_update = array();
		if(count($msg) == 0)
		{
		      $data_update = array(
		      	//"ND_MA" => $ND_MA,
		        "DD_TEN" => $DD_TEN,
		        "DM_MA" => $DM_MA,
		        "T_MA" => $T_MA,
		        "H_MA" => $H_MA,
		        "X_MA" => $X_MA,
		        "DD_DIACHI" => $DD_DIACHI,
		        "DD_SDT" => $DD_SDT,
		        "DD_EMAIL" => $DD_EMAIL,
		        "DD_WEBSITE" => $DD_WEBSITE,
		        "DD_MOTA" => $DD_MOTA,
		        "DD_VITRI" => $DD_VITRI,
		        //"DD_LUOTXEM" => $DD_LUOTXEM,
		        "DD_DUYET" => $DD_DUYET,
		        //"DD_NGAYDANG" => $DD_NGAYDANG,
		        "DD_NGAYCAPNHAT" => $DD_NGAYCAPNHAT,
		        "DD_GIOITHIEU" => $DD_GIOITHIEU,
		        "DD_BATDAU" => $DD_BATDAU,
		        "DD_KETTHUC" => $DD_KETTHUC,
		        "DD_GIATU" => $DD_GIATU,
		        "DD_GIADEN" => $DD_GIADEN,
		        "DD_NOIDUNG" => $DD_NOIDUNG
		      );
	          $this->mdiadiem->update($DD_MA, $data_update);
	          $status = "success";
		}
		$response = array('status' => $status,'msg' => $msg, 'data' => $data_update);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function updateluotxem()
	{
		$DD_MA = $_POST["DD_MA"];

		$diadiem = $this->mdiadiem->getID($DD_MA);

		$DD_LUOTXEM = $diadiem['DD_LUOTXEM'] + 1;

		$msg = array();
		$status = "error";
		$data_update = array();
		if(count($msg) == 0)
		{
		      $data_update = array(
		        "DD_LUOTXEM" => $DD_LUOTXEM
		      );
	          $this->mdiadiem->update($DD_MA, $data_update);
	          $status = "success";
		}
		$response = array('status' => $status,'msg' => $msg, 'data' => $data_update);
		$jsonString = json_encode($response);
		echo $jsonString;
	}
}