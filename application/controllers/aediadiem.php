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

	function mapuser($id, $local)
	{
		$this->load->library('googlemaps');

		$config = array();
		$config['center'] = $local;
		$config['zoom'] = '17';

		$this->googlemaps->initialize($config);

		$this->load->model("mdiadiem");
		$this->load->model("mhinhanh");

		$diadiem = $this->mdiadiem->getID($id);
		$matinhdd = $diadiem['T_MA'];
		$mahuyendd = $diadiem['H_MA']; 

		$query = $this->mdiadiem->getList();
		foreach ($query as $item) {
			if($matinhdd == $item['T_MA'] && $mahuyendd == $item['H_MA'])
			{
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

				$hinh = "<img src='".base_url()."uploads/diadiem/".$anhdaidien."' width='180' hgiht='150'>";
				$noidung = "<div style='text-transform: uppercase; font-size: 16px; margin: -20px 0px -20px 0px; padding: 0px; width: 180px;'><a href='".base_url()."index.php/aediadiem/detailuser1/".$madd."'><br/><b><i>".$item['DD_TEN']." </i></b></a></div><br/><div style='width: 180px; text-transform: capitalize; color: #FFF; background-color: #39F; padding: 5px; font-weight: bold;'>".$item['DD_DIACHI']."</div>";
				$marker['infowindow_content'] = $hinh.$noidung;
				$marker['id'] = $madd;
				//$marker['onclick'] = 'alert("You just clicked me!!")';
				$marker['icon'] = base_url().'/uploads/danhmuc/'.$danhmuc.'.png';
				$this->googlemaps->add_marker($marker);
			}
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
		$DD_TEN = $_POST["DD_TEN"];
		$DM_MA = $_POST["DM_MA"];
		$T_MA = $_POST["T_MA"];
		$H_MA = $_POST["H_MA"];
		$X_MA = $_POST["X_MA"];
		$DD_DIACHI = $_POST["DD_DIACHI"];
		$DD_SDT = $_POST["DD_SDT"];
		$DD_EMAIL = $_POST["DD_EMAIL"];
		$DD_WEBSITE = $_POST["DD_WEBSITE"];
		$DD_MOTA = $_POST["DD_MOTA"];
		$DD_VITRI = $_POST["DD_VITRI"];
		$DD_GIOITHIEU = $_POST["DD_GIOITHIEU"];
		$DD_BATDAU = $_POST["DD_BATDAU"];
		$DD_KETTHUC = $_POST["DD_KETTHUC"];
		$DD_GIATU = $_POST["DD_GIATU"];
		$DD_GIADEN = $_POST["DD_GIADEN"];
		$DD_NOIDUNG = $_POST["DD_NOIDUNG"];

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

       	
        $this->_data['map'] = $this->mapuser($id, $info["DD_VITRI"]);
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

       	$diem = $this->mbinhluan->diemtrungbinh($id, "BL_CHATLUONG");
       	$this->_data['diemchatluong'] = round($diem['BL_CHATLUONG'], 1);

       	$diem = $this->mbinhluan->diemtrungbinh($id, "BL_PHUCVU");
       	$this->_data['diemphucvu'] = round($diem['BL_PHUCVU'], 1); 

       	$diem = $this->mbinhluan->diemtrungbinh($id, "BL_KHONGGIAN");
       	$this->_data['diemkhonggian'] = round($diem['BL_KHONGGIAN'], 1); 

       	$query = "SELECT *, count(*) count FROM diadiem JOIN tinh ON diadiem.T_MA = tinh.T_MA JOIN huyen ON diadiem.H_MA = huyen.H_MA JOIN nguoidung_diadiem ON diadiem.DD_MA = nguoidung_diadiem.DD_MA JOIN hinhanh ON diadiem.DD_MA = hinhanh.DD_MA WHERE hinhanh.HA_DAIDIEN = '1' GROUP BY diadiem.DD_MA  ORDER BY count DESC LIMIT 0, 5";

		// Kết nối Database, thực hiện câu truy vấn
		$this->_data['yeuthich'] = $this->mdiadiem->gettimkiem($query);

        $this->_data['subview'] = "user/chitietdiadiem_view1";
        $this->_data['title'] = "Địa điểm";
       	$this->load->view("user/main.php", $this->_data);
	}

	public function update()
	{
		$DD_MA = $_POST["DD_MA"];
		$DD_TEN = $_POST["DD_TEN"];
		$DM_MA = $_POST["DM_MA"];
		$T_MA = $_POST["T_MA"];
		$H_MA = $_POST["H_MA"];
		$X_MA = $_POST["X_MA"];
		$DD_DIACHI = $_POST["DD_DIACHI"];
		$DD_SDT = $_POST["DD_SDT"];
		$DD_EMAIL = $_POST["DD_EMAIL"];
		$DD_WEBSITE = $_POST["DD_WEBSITE"];
		$DD_MOTA = $_POST["DD_MOTA"];
		$DD_VITRI = $_POST["DD_VITRI"];
		$DD_GIOITHIEU = $_POST["DD_GIOITHIEU"];
		$DD_BATDAU = $_POST["DD_BATDAU"];
		$DD_KETTHUC = $_POST["DD_KETTHUC"];
		$DD_GIATU = $_POST["DD_GIATU"];
		$DD_GIADEN = $_POST["DD_GIADEN"];
		$DD_NOIDUNG = $_POST["DD_NOIDUNG"];
		$DD_DUYET = $_POST["DD_DUYET"];

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