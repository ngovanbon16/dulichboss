<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email extends CI_Controller
{
    function index()
    {
        echo "Gửi email xác nhận người dùng: <br/>";
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

        $this->email->from('ngovanbon99@gmail.com');
        $this->email->to('ngovanbon16@gmail.com');

        $this->email->subject('Email gửi tự động');

        $message = "<b>Chào người dùng mới</b> 
                    <br/>
                    <a href='".base_url()."index.php/home'>Nhấn vào đây để xác nhận</a>

        ";
        $this->email->message($message);
        if ($this->email->send()) {
            echo '<b>Email Đã được gửi</b>';
        } else 
        {
            show_error($this->email->print_debugger());
        }
    }

    /*public function sendMail() {
        $name = "huy";
         $to = 'ngovanbon16@gmail.com';
         $from = 'ngovanbon38@gmail.com';
         $subject = "Gửi mail tự động";
         $messenger = "Tin nhắn tự động";
        $config = Array(
            'protocol' => 'smtp',
            'charset' => 'utf-8',
            'mailtype' => 'html',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_crypto' => 'ssl',
            'smtp_auth' => true,
            'smtp_user' => 'ngovanbon38@gmail.com',
            'smtp_pass' => 'Bon18593'
        );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($from, $name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($messenger);
        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
        } else {
            echo  'Thư đã được gửi đến địa chỉ: ' . $to . '!\n';
        }
    }*/
}