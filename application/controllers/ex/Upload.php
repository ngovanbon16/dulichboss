<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->_data['subview'] = 'gmaps/upload_view.php';
       	$this->_data['title'] = lang('home');
       	$this->load->view('user/main.php', $this->_data);
	}
}