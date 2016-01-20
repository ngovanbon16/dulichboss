<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Map extends CI_Controller {
function __construct()
{
parent::__construct();
}
function index()
{
//basic default controls/properties    
$this->load->library('googlemaps');
$config['zoom'] = "auto";
$this->googlemaps->initialize($config);
$data = array();
$data['map'] = $this->googlemaps->create_map();
$this->load->view('gmaps/map_view', $data);
}
function show($place='Crescent Park, Palo Alto')
{
$this->load->library('googlemaps');
$config['zoom'] = "auto";
$this->googlemaps->initialize($config);
$marker = array();
$marker['position'] ="$place";
$marker['animation']='BOUNCE';
$this->googlemaps->add_marker($marker);
$data = array();
$data['map'] = $this->googlemaps->create_map();
$this->load->view('gmaps/map_view', $data);    
}
function drag()
{
  $this->load->library('googlemaps');
 
$config['center'] = '37.4419, -122.1419';
$config['zoom'] = 'auto';
$this->googlemaps->initialize($config);
 
$marker = array();
$marker['position'] = '37.429, -122.1419';
$marker['draggable'] = true;
$marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map();
 
$this->load->view('gmaps/map_drag_view', $data);  
}
function geolocation()
{
    $this->load->library('googlemaps');
 
$config = array();
$config['center'] = 'auto';
$config['onboundschanged'] = 'if (!centreGot) {
	var mapCentre = map.getCenter();
	marker_0.setOptions({
		position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
	});
}
centreGot = true;';
$this->googlemaps->initialize($config);
$marker = array();
$marker['title']='your location';
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map();
 
$this->load->view('gmaps/map_view', $data);
}
function direction()
{
if($this->input->post('submit'))
{ 
$this->load->library('googlemaps');
$config['zoom'] = 'auto';
$config['directions'] = TRUE;
$config['directionsStart'] = $this->input->post('place1');
$config['directionsEnd'] =  $this->input->post('place2');
$config['directionsDivID'] = 'directionsDiv';
$this->googlemaps->initialize($config);
$data['map'] = $this->googlemaps->create_map();
$this->load->view('gmaps/direction_view', $data);
}
else
{
  $data['map']=false;  
  $this->load->view('gmaps/direction_view',$data);  
}
}
}