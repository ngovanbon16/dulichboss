<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.ico" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">
        <div class="container">
          <table>
            <tr>
              <td>
                <a href="<?php echo base_url(); ?>./"><img src='<?php echo base_url(); ?>assets/images/logo.jpg' width='130' height='100'></a>
              </td>
              <td>
                <ul class="nav nav-tabs">
                  <li class="active"><a href="<?php echo base_url(); ?>./">Trang chủ</a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">Khu vực<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url(); ?>index.php/tinh">Tỉnh/Thành phố</a></li>
                      <li><a href="">Quận/Huyện</a></li>
                      <li><a href="">Xã/Phường/Thị trấn</a></li>                        
                    </ul>
                  </li>
                  <li><a href="javascript:window.history.go(-1);">Trở lại</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/login">Đăng nhập</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/registration">Đăng ký</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/login/logout">Đăng xuất</a></li>
                  <li><?php echo $this->session->userdata("email"); ?> </li>
                </ul>
              </td>
            </tr>
          </table>
        </div>
  </div>
  <div>

      <?php 
        if($this->session->userdata("id") != "")
        {
            //$this->load->view('demo');
            //$this->load->view($subview);
        }
        else
        {
            //$this->load->view('demo');
            $this->load->view($subview);
        }
      ?>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <h4>Giới thiệu</h4>
      <p>Website du lịch vùng đồng bằng sông Cửu Long</p>
    </div>
    <div class="col-sm-4">
      <h4>Liên hệ</h4>
      <p>Gmail:huy50621@gmail.com</p>
    </div>
  </div>
</div>

</body>
</html>