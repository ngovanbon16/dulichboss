<?php
class Avata extends CI_Controller{
    public function __construct(){
        parent::__construct();
        //$this->load->helper(array("form", "url"));
    }
      
    public function index(){
        //$data['errors'] = '';
        //$this->load->view("upload_view", $data);
        $this->_data['title'] = lang('photo');
        $this->_data['errors'] = '';
        $this->_data['subview'] = 'admin/avata_view';
        $this->load->view('Main.php', $this->_data);
    }

    public function upload($id)
    {
        $target_dir = "./uploads/user/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo lang('file_is_an_image')." - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo lang('file_is_not_an_image');
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo lang('sorry_file_already_exists');
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 6000000) {
            echo lang('sorry_your_file_is_too_large');
            $uploadOk = 0;
        }
        // Allow certain file formats
        if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg"
        && strtolower($imageFileType) != "gif" ) {
            echo lang('sorry_only_JPG_JPEG_PNG_GIF_files_are_allowed');
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo lang('sorry_your_file_was_not_uploaded');
        // if everything is ok, try to upload file
        } else {
            $name = $id.".".$imageFileType;
            $names = $target_dir.$name;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $names)) {

                date_default_timezone_set('Asia/Ho_Chi_Minh');  
                $date = date('Y-m-d H:i:s');
                $namenew = $name;
                $data_update = array(
                   "ND_HINH" => $namenew,
                   "ND_NGAYCAPNHAT" => $date,
                );
                $this->load->model('mnguoidung');
                $this->mnguoidung->update($id, $data_update);

                $array = array(
                    'avata' => $namenew, 
                );

                $ten = $this->session->userdata('avata');
                $file_path = "uploads/user/".$ten;
                if (file_exists($file_path) && $ten != $namenew && $ten != "avata.png") 
                {
                    unlink("uploads/user/".$ten);
                } 
                $this->session->unset_userdata("avata");
                $this->session->set_userdata($array);

                $this->load->library("image_lib");
                $config['image_library'] = 'gd2';
                $config['source_image'] = './uploads/user/'.$name;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']     = 200;
                $config['height']   = 200;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($config);

                echo lang('the_file')." ". basename( $_FILES["fileToUpload"]["name"])." ".lang('has_been_uploaded')."!";
            }
        }
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
                    if (file_exists($file_path) && $ten != $namenew && $ten != "avata.png") 
                    {
                        unlink("uploads/user/".$ten);
                    } 
                    else 
                    {
                        //echo "This file does not exist";
                    }

                    $this->session->unset_userdata("avata");
                    $this->session->set_userdata($array);

                    $this->_data['errors'] = "success";
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
                $this->_data['title'] = lang('photo');
                $this->_data['errors'] = $this->upload->display_errors();
                $this->_data['subview'] = 'admin/avata_view';
                $this->load->view('Main.php', $this->_data);
            }
        }
    }       
}