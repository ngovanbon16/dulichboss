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
       	$this->_data['title'] = 'Trang chủ';
       	$this->load->view('main.php', $this->_data);
	}
}