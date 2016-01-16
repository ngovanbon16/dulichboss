<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mlogin");
	}

	public function index()
	{
		//$this->_data['subview'] = 'login_view';
       	//$this->_data['title'] = 'Đăng nhập';
       	//$this->load->view('main.php', $this->_data);
       	$this->load->view("login_view");
	}

	public function login()
	{
		$email = $_POST["email"];
		$password = $_POST["password"];
		$msg = array();

		if(empty($email))
		{
			$msg["email"] = "Họ tên người dùng không được rỗng";
		} else if(!($this->mlogin->testEmail($email)))
		{
			$msg["email"] = "Email không tồn tại";
		}

		if(empty($password))
		{
			$msg["password"] = "Mật khẩu không được rỗng";
		} else if(!($this->mlogin->testpassword($email, $password)))
		{
			$msg["password"] = "Mật khẩu không đúng";
		}

		if(!($this->mlogin->kichhoat($email)))
		{
			$msg["kichhoat"] = "Tài khoản chưa được kích hoạt vui lòng vào gmail kích hoạt tài khoản!";
		}

		$status = "error";
		if(count($msg) == 0)
		{
			$status = "success";
			$query = $this->mlogin->getuser($email, $password);
			if($query)
			{
				foreach ($query as $row) {
					$newdata = array(
                        'id' => $row->ND_MA,
                        'email'   => $row->ND_DIACHIMAIL,
                    );
                    $this->session->set_userdata($newdata); // Tạo Session cho Users                 
                    //redirect(base_url() . "index.php/home");
				}

			}
		}

		$response = array('status' => $status,'msg' => $msg );
		$jsonString = json_encode($response);
		echo $jsonString;
	}

	private function _user_is_login()
    {
        $id = $this->session->userdata('id');
        if(!$id)
        {
            return false;
        }
        return true;
    }

    public function logout()
    {
        if($this->_user_is_login())
        {
           //neu thanh vien da dang nhap thi xoa session login
           $this->session->unset_userdata('id');
           $this->session->unset_userdata('email');
           $this->session->set_flashdata('flash_message', 'Đăng xuất thành công');
           redirect(base_url() . "index.php/home");
        }
        else
        {
        	redirect(base_url() . "index.php/login");
        }
    }
}