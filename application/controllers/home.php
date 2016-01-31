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

	public function trangchu()
	{
		$this->_data['subview'] = 'user/trangchu_view';
		$this->load->model("mdiadiem");
		$this->load->model("mhinhanh");
		$this->_data['info'] = $this->mdiadiem->getList1(8, 0);
		$this->_data['info1'] = $this->mhinhanh->getList();

       	$this->_data['title'] = 'Trang chủ';
       	$this->load->view('user/main.php', $this->_data);
	}
}