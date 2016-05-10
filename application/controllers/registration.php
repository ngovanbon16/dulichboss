<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mregistration");
	}

	public function index()
	{
		/*$this->_data['subview'] = 'registration_view';
       	$this->_data['title'] = 'Đăng ký';
       	$this->load->view('main.php', $this->_data);*/
        $this->_data['title'] = lang('register_account');
       	$this->load->view("registration_view", $this->_data);
	}

	public function registration()
	{
		$ho = $this->db->escape_like_str($_POST["ho"]);
		$ten = $this->db->escape_like_str($_POST["ten"]);
		$email = $this->db->escape_like_str($_POST["email"]);
		$matkhau = $this->db->escape_like_str($_POST["matkhau"]);
		$matkhau1 = $this->db->escape_like_str($_POST["matkhau1"]);
		$ngaysinh = $this->db->escape_like_str($_POST["ngaysinh"]);
		$gioitinh = $this->db->escape_like_str($_POST["gioitinh"]);
		$msg = array();

    $gender = lang('male');

		if($gioitinh == $gender)
		{
			$gioitinh = "1";
		}
		else
		{
			$gioitinh = "0";
		}

		if(($this->mregistration->testEmail($email)))
		{
			$msg["email"] = lang('email_already_exists');
		}

    if(!($this->xacnhanemail($email)))
    {
      $msg['email'] = lang('registration_failed').'! '.lang('undeliverable_email').'! '.lang('please_verify_your_email_address').'!';
    }

		$status = "error";
		$data_insert = "";
		if(count($msg) == 0)
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');  
      $date = date('Y-m-d H:i:s');

      $data_insert = array(
        "ND_HO" => $ho,
        "ND_TEN" => $ten,
        "ND_DIACHIMAIL" => $email,
        "ND_MATKHAU" => md5($matkhau),
        "ND_NGAYSINH" => $ngaysinh,
        "ND_GIOITINH" => $gioitinh,
        "ND_HINH" => 'avata.png',
        "ND_KICHHOAT" => '0',
        "T_MA" => "0",
        "H_MA" => "0",
        "X_MA" => "0",
        "ND_NGAYTAO" => $date,
        "ND_NGAYCAPNHAT" => $date,
        "ND_DIEM" => '0',
        "ND_THUONG" => '0',
        "CB_MA" => '0',
      );
          $this->mregistration->insert($data_insert);
          $status = "success";
          $msg["email"] = lang('email_was_sent').'! '.lang('please_login_email_to_activate_your_account').'!';
          /*$query = $this->mregistration->getid($email);
          $id = $query['ND_MA'];
          $msg['email'] = $this->xacnhanemail($id, $email);*/
		}

		$response = array('status' => $status,'msg' => $msg, 'data' => $data_insert);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function xacnhanemail($email)
    {
        //echo "Truy cập vào trang web của bạn để kích hoạt tài khoản: <br/>";
        $config = Array(

            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'smartmekong16@gmail.com', // change it to yours
            'smtp_pass' => 'smartmekong',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('smartmekong16@gmail.com', 'Mekong Tourism');
        $this->email->to($email);

        $this->email->subject('Email kích hoạt tài khoản - Account activation');

        $note = '
          <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <style type="text/css">
              h3{
                font-style: italic;
                font-weight: bolder;
                text-align: center;
                font-size: 18px;
              }
              h4{
                text-align: center;
              }
            </style>
          </head>
          <body>
            <div style="margin: auto; width: 50%;" class="panel panel-success">
                <a href="'.base_url().'home/trangchu">Trang chủ</a>
                <h3>
                  Chào mừng bạn đã đến với Website Du lịch Cửu Long! <br/>
                  <p style="font-size: 15px; margin: 5px;" >Welcome to Website Mekong Tourism!</p>
                </h3>

                <h4> Vui lòng bấm vào đường dẫn sau để kích hoạt tài khoản <br>
                  <a href="'.base_url().'index.php/nguoidung/xacnhanemail/'.md5($email).'">http://smartmekong.vn/dulich</a>
                </h4>
              </div>
            </div>
          </body>
        ';

        $this->email->message($note);
        if ($this->email->send()) {
            return true;
        } 
        else 
        {
            return false;
            //show_error($this->email->print_debugger());
        }
    }
}