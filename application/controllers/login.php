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
		$email = $this->db->escape_like_str($_POST["email"]);
		$password = $this->db->escape_like_str($_POST["password"]);
		$msg = array();
		$error = "";

		if(empty($email))
		{
			$msg["email"] = lang('please').' '.lang('input').' '.lang('email');
			$error = lang('error');
		} else if(!($this->mlogin->testEmail($email)))
		{
			$msg["email"] = lang('email').' '.lang('is').' '.lang('invalid');
			$error = lang('error');
		}
		else
		{
			if($this->mlogin->khoa($email))
			{
				$error  = lang('your_account_has_been_locked');
			}
			else
			{
				if(!$this->mlogin->kichhoat($email))
				{
					$error = lang('your_account_not_activated');
					//$error = lang('error');
				}
				else
				{
					if(empty($password))
					{
						$msg["password"] = lang('please').' '.lang('input').' '.lang('password');
						$error = lang('error');
					} else if(!($this->mlogin->testpassword($email, $password)))
					{
						$msg["password"] = lang('password').' '.lang('is').' '.lang('invalid');
						$error = lang('error');
					}
				}
			}
		}

		if($error != "")
		{
			$msg['error'] = $error;
		}

		$status = "error";
		if(count($msg) == 0)
		{
			$status = "success";
			$query = $this->mlogin->getuser($email, $password);
			$quyen = "0";
			if($this->mlogin->testquyen($email))
			{
				$quyen = "1";
			}

			if($query)
			{
				foreach ($query as $row) {
					$newdata = array(
						'admin' => $quyen,
                        'id' => $row->ND_MA,
                        'email'   => $row->ND_DIACHIMAIL,
                        'avata' => $row->ND_HINH,
                        'T_MA' => $row->T_MA,
                        'NQ_MA' => $row->NQ_MA
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

    public function logout($trang)
    {
        if($this->_user_is_login())
        {
           //neu thanh vien da dang nhap thi xoa session login
           $this->session->unset_userdata('admin');
           $this->session->unset_userdata('id');
           $this->session->unset_userdata('email');
           $this->session->unset_userdata('avata');
           $this->session->unset_userdata('T_MA');
           $this->session->unset_userdata('NQ_MA');
           $this->session->set_flashdata('flash_message', 'Đăng xuất thành công');
           redirect(base_url() . "index.php/home/".$trang);
        }
        else
        {
        	redirect(base_url() . "index.php/login");
        }
    }
}