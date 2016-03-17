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
		$ho = $_POST["ho"];
		$ten = $_POST["ten"];
		$email = $_POST["email"];
		$matkhau = $_POST["matkhau"];
		$matkhau1 = $_POST["matkhau1"];
		$ngaysinh = $_POST["ngaysinh"];
		$gioitinh = $_POST["gioitinh"];
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
            'smtp_user' => 'ngovanbon99@gmail.com', // change it to yours
            'smtp_pass' => '12345696',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('ngovanbon99@gmail.com', 'Trường Huy');
        $this->email->to($email);

        $this->email->subject('Email được gửi từ admin của website dulich.com.vn');

        $message = "
        <head>
          <style type='text/css'>
            b{
              text-align: center;
              font-family: georgia;
              color: #727272;
            }
            a{
              text-align: center;
              font-family: georgia;
              color: #727272;
              border-bottom: 1px solid #EEE;
              padding: 5px;
              font-size: x-large;
              margin-top: 50px;
            }
          </style>
        </head>
        <body>
        <b>Chào người dùng mới
          <br/>
          Đây là Email được gửi trang quản trị của Website du lịch!
          <br/>
          Để xác nhận người dùng mới vui lòng nhấn vào đường link bên dưới!
          <br/>
        </b> 
        <br/>
        <a href='".base_url()."index.php/nguoidung/xacnhanemail/".md5($email)."'>dulichdongbangsongcuulong.com.vn</a>
        </body>
        ";
        $this->email->message($message);
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