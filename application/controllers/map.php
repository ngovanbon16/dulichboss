<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	public function __construct(){
        parent::__construct();
        //$this->load->helper(array("form", "url"));
        $this->load->library('googlemaps');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		//show cac marker, di chuyen len map
		//$this->load->library('googlemaps');

		$config = array();
		$config['center'] = 'auto';
		$config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
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
		$marker['position'] = '10.031050, 105.769752';
		$marker['title'] = 'Đại học Cần Thơ';
		$marker['infowindow_content'] = '1 - Trường đại học Cần Thơ!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=U|00F|000';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '10.021555, 105.764830';
		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';
		$marker['icon'] = base_url().'/assets/images/movelocal.png';
		$marker['onmouseup'] = " 

			/*alert(event.latLng.lat() + ' , ' + event.latLng.lng());*/ 
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();

			document.getElementById('lat').value = lat;
			document.getElementById('lng').value = lng;

		";
		$this->googlemaps->add_marker($marker);

		$this->load->model("mmap");
		$query = $this->mmap->getList();
		foreach ($query as $item) {
			$local = $item['lat'].", ".$item['lng'];
			$marker = array();
			$marker['position'] = $local;
			$marker['infowindow_content'] = $item['title'];
			//$marker['onclick'] = 'alert("You just clicked me!!")';
			$marker['icon'] = base_url().'/assets/images/local.png';
			$this->googlemaps->add_marker($marker);
		}

		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('map_view', $data);
	}


	public function map()
	{

		$config = array();
		$config['center'] = 'auto';
		$config['onclick'] = 'alert(\'Bạn vừa bấm vào vị trí: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
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
		$marker['onclick'] = 'alert("Bạn đang ở vị trí này!")';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '10.021555, 105.764830';
		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';
		$marker['icon'] = base_url().'/assets/images/movelocal.png';
		$marker['onmouseup'] = " 

			/*alert(event.latLng.lat() + ' , ' + event.latLng.lng());*/ 
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();

			document.getElementById('lat').value = lat;
			document.getElementById('lng').value = lng;

		";
		$this->googlemaps->add_marker($marker);

		$this->load->model("mdiadiem");
		$query = $this->mdiadiem->getList();
		foreach ($query as $item) {
			$local = $item['DD_VITRI'];
			$danhmuc = $item['DM_MA'];
			$marker = array();
			$marker['position'] = $local;
			$marker['infowindow_content'] = $item['DD_TEN'];
			//$marker['onclick'] = 'alert("You just clicked me!!")';
			$marker['icon'] = base_url().'/uploads/danhmuc/'.$danhmuc.'.png';
			$this->googlemaps->add_marker($marker);
		}

		/*$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('admin/map_view', $data);*/

		$this->_data['map'] = $this->googlemaps->create_map();
		$this->_data['subview'] = "admin/map_view";
		$this->_data['title'] = "Các vị trí đã thêm";
		$this->load->view("Main", $this->_data);
	}

	function mapvd()
	{
		//ẩn hiện marker
		/*$this->load->library('googlemaps');

		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['cluster'] = TRUE;
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
		$marker['onclick'] = 'alert("Bạn đang ở vị trí này!")';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '10.047296, 105.755602';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '10.041573, 105.791425';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '10.017806, 105.771470';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '10.021221, 105.764179';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('admin/map_view', $data);*/

		/*$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
			var mapCentre = map.getCenter();
			marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
			});
		}
		centreGot = true;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['onclick'] = 'alert("Bạn đang ở vị trí này!")';
		$this->googlemaps->add_marker($marker);*/


		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['directions'] = TRUE;
		$config['directionsStart'] = '10.021518, 105.764655';
		$config['directionsEnd'] = '10.032805, 105.774439';
		$config['directionsDivID'] = 'directionsDiv';
		$config['geocodeCaching'] = 'true';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '10.021555, 105.764830';
		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';
		$marker['icon'] = base_url().'/assets/images/A1.png';
		$marker['onmouseup'] = " 

			/*alert(event.latLng.lat() + ' , ' + event.latLng.lng());*/ 
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();
			var local = lat + ', ' + lng;

			document.getElementById('A').value = local;

		";
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '10.021555, 105.764830';
		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';
		$marker['icon'] = base_url().'/assets/images/B1.png';
		$marker['onmouseup'] = " 

			var lat = event.latLng.lat();
			var lng = event.latLng.lng();
			var local = lat + ', ' + lng;

			document.getElementById('B').value = local;

		";
		$this->googlemaps->add_marker($marker);

		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('admin/map_view', $data);
	}

	public function mapfromAtoB()
	{
		if(isset($_POST['lat']))
		{
			if($_POST['lat'] != "")
			{
				$lat = $_POST['lat'];
			}
			else
			{
				$lat = "10.022888, 105.762633";
			}
		}
		else
		{
			$lat = "10.022888, 105.762633";
		}
		if(isset($_POST['lng']))
		{
			if($_POST['lng'] != "")
			{
				$lng = $_POST['lng']; 
			}
			else
			{
				$lng = "10.023486, 105.766678";
			}
		}
		else
		{
			$lng = "10.023486, 105.766678";
		}
		
		$re = array('lat' => $lat, 'lng' => $lng);

		$jsonString = json_encode($re);
		echo $jsonString;

		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['directions'] = TRUE;
		$config['directionsStart'] = $lat;
		$config['directionsEnd'] = $lng;
		$config['directionsDivID'] = 'directionsDiv';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $lng;
		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';
		$marker['icon'] = base_url().'/assets/images/B1.png';
		$marker['onmouseup'] = " 

			var lat = event.latLng.lat();
			var lng = event.latLng.lng();
			var local = lat + ', ' + lng;

			document.getElementById('lng').value = local;

		";
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = $lat;
		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';
		$marker['icon'] = base_url().'/assets/images/A1.png';
		$marker['onmouseup'] = " 

			/*alert(event.latLng.lat() + ' , ' + event.latLng.lng());*/ 
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();
			var local = lat + ', ' + lng;

			document.getElementById('lat').value = local;

		";
		$this->googlemaps->add_marker($marker);

		/*$data['map'] = $this->googlemaps->create_map();
		$this->load->view('admin/map_view', $data);*/

		$this->_data['lat'] = $lat;
		$this->_data['lng'] = $lng;
		$this->_data['map'] = $this->googlemaps->create_map();
		$this->_data['subview'] = 'admin/map_view';
       	$this->_data['title'] = 'Map dẫn đường từ A đến B';
       	$this->load->view('main.php', $this->_data);
	}

	public function add()
	{
		$lat = $_POST["lat"];
		$lng = $_POST["lng"];
		$title = $_POST["title"];
		$data = array(
			'title' => $title,
			'lat' => $lat,
			'lng' => $lng,
			'note' => "dia diem moi"
		);

		$status = "error";

		$this->load->model("mmap");
		if($this->mmap->insert($data))
		{
			$status = "success";
		};

		$response = array('status' => $status, 'data' => $data);
		$jsonString = json_encode($response);
		echo $jsonString;


		//echo $lat." , ".$lng;
	}
}
