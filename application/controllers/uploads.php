<?php
class Uploads extends CI_controller
{
  protected $_data;

  function index()
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
         
        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES['image_list'];
        $count = count($file['name']);//lấy tổng số file được upload
        for($i=0; $i<=$count-1; $i++) {
            echo $i;
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
                  //nếu upload thành công thì lưu toàn bộ dữ liệu
                  $data = $this->upload->data();
                  //in cấu trúc dữ liệu của các file
                 echo "<pre>";
                 print_r($data);
                 echo "</pre>";
              }
              else{
                  $this->_data['errors'] = $this->upload->display_errors();
              }     
         }
          
      }
      
      // Hien thi view
      $this->load->view('admin/uploads_view',$this->_data);  
  }
}
