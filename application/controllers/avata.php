<?php
class Avata extends CI_Controller{
    public function __construct(){
        parent::__construct();
        //$this->load->helper(array("form", "url"));
    }
      
    public function index(){
        //$data['errors'] = '';
        //$this->load->view("upload_view", $data);
        $this->_data['title'] = 'Avata';
        $this->_data['errors'] = '';
        $this->_data['subview'] = 'admin/avata_view';
        $this->load->view('Main.php', $this->_data);
    }
      
    public function doupload(){
        $ma = $this->session->userdata("id");
        if($this->input->post("ok")){
            $config['overwrite'] = true;
            $config['file_name']=$ma;
            $config['upload_path'] = './uploads/user/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5000';
            $config['max_width']  = '4000';
            $config['max_height']  = '4000';
            $this->load->library("upload", $config);
            
            

            if($this->upload->do_upload("img")){
                    $check = $this->upload->data();

                    date_default_timezone_set('Asia/Ho_Chi_Minh');  
                    $date = date('Y-m-d H:i:s');
                    $namenew = $check['file_name'];
                    $data_update = array(
                       "ND_HINH" => $namenew,
                       "ND_NGAYCAPNHAT" => $date,
                    );
                    $this->load->model('mnguoidung');
                    $this->mnguoidung->update($ma, $data_update);

                    $array = array(
                        'avata' => $namenew, 
                    );

                    $ten = $this->session->userdata('avata');
                    $file_path = "uploads/user/".$ten;
                    if (file_exists($file_path) && $ten != $namenew) 
                    {
                        unlink("uploads/user/".$ten);
                    } 
                    else 
                    {
                        //echo "This file does not exist";
                    }

                    $this->session->unset_userdata("avata");
                    $this->session->set_userdata($array);

                    $this->_data['errors'] = $check;
                    $this->_data['title'] = "Avata";
                    $this->_data['subview'] = 'admin/avata_view';
                    $this->load->view('Main.php', $this->_data);

                    $this->load->library("image_lib");
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './uploads/user/'.$check['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 200;
                    $config['height']   = 200;
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    unset($config);

                    //redirect(base_url() . "index.php/admin/dangky");
            }
            else
            {
                $this->_data['title'] = "Avata";
                $this->_data['errors'] = $this->upload->display_errors();
                $this->_data['subview'] = 'admin/avata_view';
                $this->load->view('Main.php', $this->_data);
            }
        }
    }       
}