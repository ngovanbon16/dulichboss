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
			$center = "auto";
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
		$config['onboundschanged'] = 'if (!centreGot) {
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
		$this->googlemaps->add_marker($marker);

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

	public function index()
	{
		$data['map'] = $this->map("");
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
			$msg["error"] = "Tên địa điểm đã tồn tại!";
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
       	$this->load->view("admin/suadiadiem_view", $this->_data);
	}

	public function detail($id)
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
        $this->load->model("mhinhanh");
        $this->_data['info1'] = $this->mhinhanh->getList();
       	$this->load->view("admin/chitietdiadiem_view", $this->_data);
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

		date_default_timezone_set('Asia/Ho_Chi_Minh');  
	    $date = date('Y-m-d H:i:s');

		$ND_MA = $this->session->userdata('id');
		$DD_LUOTXEM = "0";
		$DD_DUYET = "0";
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
		        //"DD_DUYET" => $DD_DUYET,
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
}