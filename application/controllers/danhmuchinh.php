<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Danhmuchinh extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mdanhmuc");
	}

	public function index()
	{
		$this->_data['subview'] = 'admin/danhmuchinh_view';
       	$this->_data['title'] = lang('picture');
       	$this->_data['info'] = $this->mdanhmuc->getList();
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
	         $config['upload_path']   = './uploads/danhmuc/';
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
	        $ma = $_POST['ma'];
	        $count = count($file['name']);//lấy tổng số file được upload
	        for($i=0; $i<=$count-1; $i++) {
	              //$config['file_name']=$i;
	              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
	              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
	              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
	              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
	              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
	              //load thư viện upload và cấu hình
	              $config['file_name']=$ma;
	              $this->load->library('upload', $config);
	              //thực hiện upload từng file
	              if($this->upload->do_upload())
	              {
	                  //nếu upload thành công thì lưu toàn bộ dữ liệu
	                  $data = $this->upload->data();
	                  //in cấu trúc dữ liệu của các file
	                  $ten = $data['file_name'];
	                  $this->load->model("mdanhmuc");
	                  $data = array(
	                      "DM_MA" => $ma,
	                      "DM_HINH" => $ten
	                  );
	                  $this->mdanhmuc->update($ma, $data);

	                  $this->_data['errors'] = "<h3>Thay đổi hình thành công!</h3>";

	                    $this->load->library("image_lib");
	                    $config['image_library'] = 'gd2';
	                    $config['source_image'] = './uploads/danhmuc/'.$ten;
	                    $config['create_thumb'] = FALSE;
	                    $config['maintain_ratio'] = TRUE;
	                    $config['width']     = 38;
	                    $config['height']   = 38;
	                    $this->image_lib->initialize($config);
	                    $this->image_lib->resize();
	                    $this->image_lib->clear();
	                    unset($config);

	              }
	              else{
	                  $this->_data['errors'] = $this->upload->display_errors();
	              }     
	         }
	          
	      }
	      
	      // Hien thi view
	      //$this->load->view('admin/uploads_view',$this->_data);
	    $this->_data['subview'] = 'admin/danhmuchinh_view';
       	$this->_data['title'] = 'Hình của danh mục địa điểm';
       	$this->_data['info'] = $this->mdanhmuc->getList();
       	$this->load->view('main.php', $this->_data);  
	  }

}