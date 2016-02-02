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
		$this->_data['active'] = "trangchu";
		$this->load->model("mdiadiem");
		$this->load->model("mhinhanh");
		$this->_data['info'] = $this->mdiadiem->getList1(8, 0);
		$this->_data['info1'] = $this->mhinhanh->getList();

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

       	$this->_data['title'] = 'Trang chủ';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function gioithieu()
	{
		$this->_data['subview'] = 'user/gioithieu_view';
		$this->_data['active'] = "gioithieu";

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

       	$this->_data['title'] = 'Giới thiệu';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function lienhe()
	{
		$this->_data['subview'] = 'user/lienhe_view';
		$this->_data['active'] = "lienhe";

		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

       	$this->_data['title'] = 'Liên hệ';
       	$this->load->view('user/main.php', $this->_data);
	}

	public function khuvuc($matinh)
	{
		$this->_data['subview'] = 'user/khuvuc_view';
		$this->_data['active'] = "khuvuc";
		$this->load->model("mtinh");
		$this->_data['tinh'] = $this->mtinh->getList();

		$this->load->model("mdiadiem");
		$this->load->model("mhinhanh");
		$this->_data['info'] = $this->mdiadiem->getList();
		$this->_data['info1'] = $this->mhinhanh->getList();

		// $this->_data['T_MA'] = $matinh; 
		$datatinh = array( 
			'T_MA' => $matinh 
		);
		$this->session->set_userdata($datatinh); // tao session tinh

       	$this->_data['title'] = 'Khu vực';
       	$this->load->view('user/main.php', $this->_data);
	}
}