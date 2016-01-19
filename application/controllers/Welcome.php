<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->library('googlemaps');

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
		$marker['onmouseup'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '10.021487, 105.761060';
		$marker['onclick'] = 'alert("You just clicked me!!")';
		$marker['icon'] = base_url().'/assets/images/mylocal.png';
		$this->googlemaps->add_marker($marker);


		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('view_file', $data);
	}
}
