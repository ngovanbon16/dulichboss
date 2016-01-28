<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Thunghiem extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
       	/*$this->load->view('gmaps/thunghiem_view');*/
       	$this->load->library('googlemaps');
       	$vitri = "can tho";

		$config['center'] = $vitri;
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

			/*markers_map[0].setVisible(false);
		    var place = placesAutocomplete.getPlace();
		    if (!place.geometry) {
		      return;
		    }

		    if (place.geometry.viewport) {
		      map.fitBounds(place.geometry.viewport);
		      map.setZoom(15);
		    } else {
		      map.setCenter(place.geometry.location);
		      map.setZoom(15);
		    }

		    markers_map[0].setPosition(place.geometry.location);
		    markers_map[0].setVisible(true);

		    var address = '';
		    if (place.address_components) {
		      address = [
		        (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
		      ].join(' ');
		    }*/

		";
		$this->googlemaps->initialize($config);

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

		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('gmaps/thunghiem_view', $data);
	}
}