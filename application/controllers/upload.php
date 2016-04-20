<?php
/* được sử dụng cho upload anh cho binh luan */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model("mbinhluan");
        $max = $this->mbinhluan->max();
        $this->_data['id'] = $max['maxid'];
        $this->_data['subview'] = 'admin/upload_view';
        $this->_data['title'] = 'Upload hình ảnh';
        $this->load->view('main.php', $this->_data);
    }

    public function upload($idbinhluan)
    {
        $target_dir = "./uploads/binhluan/";
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

            $this->load->model("manhbinhluan");

            /*$this->load->model("mbinhluan");
            $max = $this->mbinhluan->max();
            $idbinhluan = $max['maxid'];*/

            $data = array(
                'BL_MA' => $idbinhluan
            );
            $this->manhbinhluan->insert($data);

            $max = $this->manhbinhluan->max();
            $id = $max['maxid'];
            $name = $id.".".$imageFileType;
            $names = $target_dir.$name;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $names)) {
                echo lang('the_file').' '. basename( $_FILES["fileToUpload"]["name"]).' '.lang('has_been_uploaded')."!";

                        $this->load->library("image_lib");
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './uploads/binhluan/'.$name;
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']     = 800;
                        $config['height']   = 600;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        unset($config);

                        $config['source_image'] = './uploads/binhluan/'.$name;
                        $config['create_thumb'] = FALSE;
                        $config['wm_type'] = 'overlay';
                        $config['wm_overlay_path'] = './assets/images/logo.png';
                        $config['wm_vrt_alignment'] = 'bottom';
                        $config['wm_hor_alignment'] = 'right';
                        $config['wm_padding'] = '-20';
                        $config['wm_opacity'] = '50';
                        $this->image_lib->initialize($config);
                        $this->image_lib->watermark();
                        $this->image_lib->clear();
                        unset($config);

                        $this->load->model("mbinhluan");
                        $max = $this->mbinhluan->max();
                        $idbinhluan = $max['maxid'];

                        $data = array(
                            'ABL_TEN' => $name
                        );
                        $this->manhbinhluan->update($id, $data);
            }
        }
    }

}