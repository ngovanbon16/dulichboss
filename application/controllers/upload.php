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

    public function upload()
    {
        $target_dir = "./uploads/binhluan/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

            $this->load->model("manhbinhluan");
            $max = $this->manhbinhluan->max();
            $id = $max['maxid'] + 1;
            $name = $id.".".$imageFileType;
            $names = $target_dir.$name;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $names)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

                        $this->load->library("image_lib");
                        $config['file_name']= "20";
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
                            'BL_MA' => $idbinhluan,
                            'ABL_TEN' => $name
                        );
                        $this->manhbinhluan->insert($data);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

}