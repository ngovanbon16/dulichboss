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
       	 $this->load->view("registration_view");
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

		if($gioitinh == "Nam")
		{
			$gioitinh = "1";
		}
		else
		{
			$gioitinh = "0";
		}

		if(($this->mregistration->testEmail($email)))
		{
			$msg["email"] = "Email đã tồn tại";
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
            $query = $this->mregistration->getid($email);
            $id = $query['ND_MA'];
            $msg['email'] = $this->xacnhanemail($id, $email);
		}

		$response = array('status' => $status,'msg' => $msg, 'data' => $data_insert);
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	public function xacnhanemail($id, $email)
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

        $message = "<b>Chào người dùng mới</b> 
                    <br/>
                    <a href='".base_url()."index.php/nguoidung/xacnhanemail/".md5($id)."'>Nhấn vào đây để xác nhận</a>

        ";
        $this->email->message($message);
        if ($this->email->send()) {
            return 'Email Đã được gửi! Vui lòng đăng nhập email để xác nhận!';
        } else 
        {
            return 'Không gửi được mail! Vui lòng kiểm tra lại địa chỉ email!';
            //show_error($this->email->print_debugger());
        }
    }
}