<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diadiemhinh extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mdiadiem");
		$this->load->model("mhinhanh");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/diadiemhinh_view';
       	$this->_data['title'] = 'Hình địa điểm';
       	$this->_data['info'] = $this->mdiadiem->show();
       	$this->_data['info1'] = $this->mhinhanh->getList();
       	$this->load->view('main.php', $this->_data);
	}

	protected $_data;

	  function upload()
	  {
	    $this->_data['errors'] = "";
	      if($this->input->post('submit'))
	      {
	        
	         //Khai bao bien cau hinh upload
	         $config = array();
	         //Ghi đè hình
	         $config['overwrite'] = true;
	         //thuc mục chứa file
	         $config['upload_path']   = './uploads/diadiem/';
	         //Định dạng file được phép tải
	         $config['allowed_types'] = 'jpg|png|gif';
	         //Dung lượng tối đa
	         $config['max_size']      = '5000';
	         //Chiều rộng tối đa
	         $config['max_width']     = '1028';
	         //Chiều cao tối đa
	         $config['max_height']    = '1028';
	         //load thư viện upload
	         //bien chua cac ten file upload
	        $name_array = array();
	         
	        //lưu biến môi trường khi thực hiện upload
	        $file  = $_FILES['image_list'];
	        $msdd = $_POST['ma'];
	        $msnd = $this->session->userdata['id'];
	        date_default_timezone_set('Asia/Ho_Chi_Minh');  
       		$date = date('Y-m-d H:i:s');

	        $count = count($file['name']);//lấy tổng số file được upload
	        
	        for($i=0; $i<=$count-1; $i++) {
	              //$config['file_name']=$i;
	              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
	              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
	              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
	              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
	              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
	              //load thư viện upload và cấu hình
	              $max = $this->mhinhanh->maxid();
	              $tenhinh = $max['maxid'];
	              $config['file_name']=$tenhinh;
	              $this->load->library('upload', $config);
	              //thực hiện upload từng file
	              if($this->upload->do_upload())
	              {
	                  //nếu upload thành công thì lưu toàn bộ dữ liệu
	                  $data = $this->upload->data();
	                  //in cấu trúc dữ liệu của các file
	                  $ten = $data['file_name'];
	                  
	                  $data = array(
	                      "DD_MA" => $msdd,
	                      "ND_MA" => $msnd,
	                      "HA_TEN" => $ten,
	                      "HA_DUYET" => "0",
	                      "HA_NGAYDANG" => $date,
	                  );
	                  $this->mhinhanh->insert($data);
	                  
	                  //$this->_data['errors'] = "<h3>Upload thành công!</h3>".print_r($max);
	                  //$this->_data['errors'] = $max['maxid'];

	                   /* $this->load->library("image_lib");
	                    $config['image_library'] = 'gd2';
	                    $config['source_image'] = './uploads/diadiem/'.$ten;
	                    $config['create_thumb'] = FALSE;
	                    $config['maintain_ratio'] = TRUE;
	                    $config['width']     = 900;
	                    $config['height']   = 800;
	                    $this->image_lib->initialize($config);
	                    $this->image_lib->resize();
	                    $this->image_lib->clear();
	                    unset($config);

		                $config['source_image'] = './uploads/diadiem/'.$ten;
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
	                    unset($config);*/

	              }
	              else{
	                  $this->_data['errors'] = $this->upload->display_errors();
	              }     
	         }
	          
	      }
	      
	      // Hien thi view
	      //$this->load->view('admin/uploads_view',$this->_data);
	    $this->_data['subview'] = 'admin/diadiemhinh_view';
       	$this->_data['title'] = 'Hình của địa điểm';
       	$this->_data['info'] = $this->mdiadiem->show();
       	$this->load->view('main.php', $this->_data);  
	  }

	  function uploads()
  {
    $this->_data['errors'] = "";
      if($this->input->post('submit'))
      {
        
         //Khai bao bien cau hinh upload
         $config = array();
         //thuc mục chứa file
         $config['upload_path']   = './uploads/diadiem/';
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|png|gif';
         //Dung lượng tối đa
         $config['max_size']      = '5000';
         //Chiều rộng tối đa
         $config['max_width']     = '1028';
         //Chiều cao tối đa
         $config['max_height']    = '1028';
         //load thư viện upload
         //bien chua cac ten file upload
        $name_array = array();
        $this->load->model("mhinhanh");
        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES['image_list'];
        $count = count($file['name']);//lấy tổng số file được upload
        $msdd = $_POST['ma'];
	    $msnd = $this->session->userdata['id'];
	    date_default_timezone_set('Asia/Ho_Chi_Minh');  
       	$date = date('Y-m-d H:i:s');
        for($i=0; $i<=$count-1; $i++) {
            
	          $config['file_name']= $msdd;
              //$config['file_name']=$i;
              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
              //load thư viện upload và cấu hình
              $this->load->library('upload', $config);
              //thực hiện upload từng file
              if($this->upload->do_upload())
              {
              		$data = $this->upload->data();
              		$ten = $data['file_name'];
	                  
	               $data = array(
	                      "DD_MA" => $msdd,
	                      "ND_MA" => $msnd,
	                      "HA_TEN" => $ten,
	                      "HA_DUYET" => "0",
	                      "HA_NGAYDANG" => $date,
	                );
	              $this->mhinhanh->insert($data);
	              
                  //nếu upload thành công thì lưu toàn bộ dữ liệu
                  $data = $this->upload->data();

                  $this->load->library("image_lib");
	                    $config['image_library'] = 'gd2';
	                    $config['source_image'] = './uploads/diadiem/'.$ten;
	                    $config['create_thumb'] = FALSE;
	                    $config['maintain_ratio'] = TRUE;
	                    $config['width']     = 900;
	                    $config['height']   = 800;
	                    $this->image_lib->initialize($config);
	                    $this->image_lib->resize();
	                    $this->image_lib->clear();
	                    unset($config);

		                $config['source_image'] = './uploads/diadiem/'.$ten;
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


                  //in cấu trúc dữ liệu của các file
                 /*echo "<pre>";
                 print_r($data);
                 echo "</pre>";*/
                 $this->_data['errors'] = "<h3>Upload thành công!</h3>";
              }
              else{
                  $this->_data['errors'] = $this->upload->display_errors();
              }     
         }
          
      }
      
      // Hien thi view
      	/*$this->_data['subview'] = 'admin/diadiemhinh_view';
       	$this->_data['title'] = 'Hình của địa điểm';
       	$this->_data['info'] = $this->mdiadiem->show();
       	$this->load->view('main.php', $this->_data);*/  
       	redirect(base_url() . "index.php/diadiemhinh");
  }

  function uploadsuser($ma)
  {
    $this->_data['errors'] = "";
      if($this->input->post('submit'))
      {
        
         //Khai bao bien cau hinh upload
         $config = array();
         //thuc mục chứa file
         $config['upload_path']   = './uploads/diadiem/';
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|png|gif';
         //Dung lượng tối đa
         $config['max_size']      = '20000';
         //Chiều rộng tối đa
         $config['max_width']     = '6000';
         //Chiều cao tối đa
         $config['max_height']    = '6000';
         //load thư viện upload
         //bien chua cac ten file upload
        $name_array = array();
        $this->load->model("mhinhanh");
        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES['image_list'];
        $count = count($file['name']);//lấy tổng số file được upload
        $msdd = $_POST['ma'];
	    $msnd = $this->session->userdata['id'];
	    date_default_timezone_set('Asia/Ho_Chi_Minh');  
       	$date = date('Y-m-d H:i:s');
        for($i=0; $i<=$count-1; $i++) {
            
	          $config['file_name']= $msdd;
              //$config['file_name']=$i;
              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
              //load thư viện upload và cấu hình
              $this->load->library('upload', $config);
              //thực hiện upload từng file
              if($this->upload->do_upload())
              {
              		$data = $this->upload->data();
              		$ten = $data['file_name'];
	                  
	               $data = array(
	                      "DD_MA" => $msdd,
	                      "ND_MA" => $msnd,
	                      "HA_TEN" => $ten,
	                      "HA_DUYET" => "0",
	                      "HA_NGAYDANG" => $date,
	                );
	              $this->mhinhanh->insert($data);
	              
                  //nếu upload thành công thì lưu toàn bộ dữ liệu
                  $data = $this->upload->data();

                  $this->load->library("image_lib");
	                    $config['image_library'] = 'gd2';
	                    $config['source_image'] = './uploads/diadiem/'.$ten;
	                    $config['create_thumb'] = FALSE;
	                    $config['maintain_ratio'] = TRUE;
	                    $config['width']     = 900;
	                    $config['height']   = 800;
	                    $this->image_lib->initialize($config);
	                    $this->image_lib->resize();
	                    $this->image_lib->clear();
	                    unset($config);

		                $config['source_image'] = './uploads/diadiem/'.$ten;
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


                  //in cấu trúc dữ liệu của các file
                 /*echo "<pre>";
                 print_r($data);
                 echo "</pre>";*/
                $this->_data['errors'] = "Upload thành công!";
              }
              else{
                $this->_data['errors'] = $this->upload->display_errors();
              }     
         }
          
      }
      $kq = $this->_data['errors'];
      echo "
      <head>
      	<script>
      		var kq = '".$kq."';
      		if(kq != '')
      		{
      			alert('".$kq."');
      		} 
      		else
      		{
      			alert('Dung lượng quá lớn không thể tải lên được!');
      		}
      		
      		setTimeout('location.href = \"".base_url()."index.php/aediadiem/detailuser/".$ma."\";', 0);
      	</script>
      </head>";
      // Hien thi view
      	/*$this->_data['subview'] = 'admin/diadiemhinh_view';
       	$this->_data['title'] = 'Hình của địa điểm';
       	$this->_data['info'] = $this->mdiadiem->show();
       	$this->load->view('main.php', $this->_data);  */
       	//redirect(base_url() . "index.php/aediadiem/detailuser/".$_POST['ma']);
  }

  public function getiddd($id)
  {
  		echo $this->mhinhanh->getID($id);
  }

  public function duyet()
  {
  	$HA_MA = $_POST["HA_MA"];
  	$HA_DUYET = $_POST["HA_DUYET"];

  	$data = array(
	    "HA_DUYET" => $HA_DUYET
	);
	$this->mhinhanh->update($HA_MA, $data);
  }

  public function daidien()
  {
  	$DD_MA = $_POST["DD_MA"];
  	$HA_MA = $_POST["HA_MA"];
  	$HA_DAIDIEN = $_POST["HA_DAIDIEN"];

  	$data = array(
	    "HA_DAIDIEN" => $HA_DAIDIEN
	);
	$this->mhinhanh->update($HA_MA, $data);

	$query = $this->mhinhanh->getList();
	foreach ($query as $iteam) {
		$maha = $iteam['HA_MA'];
		if($maha != $HA_MA)
		{
			$data = array(
			    "HA_DAIDIEN" => "0"
			);
			$this->mhinhanh->updateanhdaidien($DD_MA, $maha, $data);
		}
	}

	$response = array('msg' => 'success');
    $jsonString = json_encode($response);
    echo $jsonString;
  }

  public function xoa()
    {
        $HA_TEN = $_POST["HA_TEN"];
        /*$msg = array();

        if(!($this->mhinhanh->testTen($HA_TEN)))
        {
            $msg["ten"] = "Tên không tồn tại";
        }

        $status = "error";
        if(count($msg) == 0)
        {
            $status = "success";
            $file_path = "uploads/diadiem/".$HA_TEN;
            if (file_exists($file_path)) 
            {
                unlink($file_path);
            } 
            $this->mhinhanh->delete($HA_TEN);
        }*/

        	$file_path = "uploads/diadiem/".$HA_TEN;
            if (file_exists($file_path)) 
            {
                unlink($file_path);
            } 

        $this->mhinhanh->delete($HA_TEN);

        $response = array('msg' => $HA_TEN);
        $jsonString = json_encode($response);
        echo $jsonString;
    }

}