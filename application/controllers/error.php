<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model("mnguoidung");
		$this->_data['info'] = $this->mnguoidung->getnotactived();

       	$this->_data['title'] = lang('error');
       	$this->load->view('error', $this->_data);
	}
}

?>