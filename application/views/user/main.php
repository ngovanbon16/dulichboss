<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?></title>
	
	<!-- core CSS -->
    <link href="<?php echo base_url(); ?>assets/user/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/user/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/user/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/user/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/user/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/user/images/ico/apple-touch-icon-57-precomposed.png">

    <script src="<?php echo base_url(); ?>assets/user/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/wow.min.js"></script>

</head><!--/head-->
<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                                <?php //echo $this->session->userdata['avata']; ?>
                                <!-- <a href="<?php echo base_url(); ?>index.php/avata"> -->
                                <?php
                                    if($this->session->userdata("email") != "")
                                    {
                                        $ten = $this->session->userdata('avata');
                                        $file_path = "uploads/user/".$ten;
                                        if(file_exists($file_path))
                                        {  
                                        ?>  
                                            <img id="avata" src="<?php echo base_url(); ?>uploads/user/<?php echo $this->session->userdata['avata']; ?>" height="18" width="18">
                                        <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <i class="fa fa-user fa-fw"></i>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <i class="fa fa-user fa-fw"></i>
                                        <?php
                                    }
                                ?>
                                <?php echo $this->session->userdata("email"); ?> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="<?php echo base_url(); ?>index.php/nguoidung/edit"><i class="fa fa-user fa-fw"></i> Thông tin người dùng</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/avata"><i class="fa fa-camera"></i> Đổi Avatar</a>
                                </li>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/avata"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                                </li>
                                <li class="divider"></li>

                                <?php if($this->session->userdata("id") != ""){ ?>
                                <li><a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-mail-forward"></i> Đổi tài khoản</a>
                                <li><a href="<?php echo base_url(); ?>index.php/login/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                                <?php }else{ ?>
                                <li><a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                                </li>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/registration"><i class="fa fa-pencil-square-o"></i> Đăng ký</a>
                                </li>
                                <?php } ?>
                            </ul>    
                        </li>

                        </p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                    <!-- <a href="<?php echo base_url(); ?>index.php/login">
                                        <button type="button" class="btn btn-outline btn-danger" data-toggle="modal" data-target="#modaldangnhap"><i class="fa fa-sign-in"></i> Đăng nhập</button>
                                    </a> -->
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home/trangchu"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="<?php if($active == 'trangchu') echo 'active'; ?>"><a href="<?php echo site_url('home/trangchu') ?>"><i class="fa fa-home fa-fw"></i> Trang chủ</a></li>
                        <li><a href="services.html"><i class="fa fa-heart fa-fw"></i> Yêu thích</a></li>
                        <li class="<?php if($active == 'map') echo 'active'; ?>"><a href="<?php echo site_url('home/map') ?>"><i class="fa fa-location-arrow fa-fw"></i> Bản đồ</a></li>
                        <li  class="<?php if($active == 'khuvuc') echo 'active'; ?>" >
                            <a href="#" class="<?php if($active == 'khuvuc') echo 'active'; ?>" data-toggle="dropdown"><i class="fa fa-qrcode fa-fw"></i> 
                                <?php
                                    if(isset($this->session->userdata['T_MA']))
                                    {
                                        $matinh = $this->session->userdata['T_MA'];
                                        foreach ($tinh as $iteam) {
                                            $ma = $iteam['T_MA'];
                                            $ten = $iteam['T_TEN'];
                                            if($ma == $matinh)
                                            {
                                                echo $ten;
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo "Chọn tỉnh";
                                    }
                                ?> 
                            <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <?php
                                    foreach ($tinh as $iteam) {
                                        $ma = $iteam['T_MA'];
                                        $ten = $iteam['T_TEN'];
                                ?>
                                <li><a href="<?php echo base_url(); ?>home/khuvuc/<?php echo $ma; ?>"> <?php echo $ten ?> </a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="<?php if($active == 'gioithieu') echo 'active'; ?>"><a href="<?php echo site_url('home/gioithieu'); ?>"><i class="fa fa-info-circle fa-fw"></i> Giới thiệu</a></li> 
                        <li class="<?php if($active == 'lienhe') echo 'active'; ?>"><a href="<?php echo site_url('home/lienhe'); ?>"><i class="fa fa-linkedin-square fa-fw"></i> Liên hệ</a></li>                
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

<?php $this->load->view($subview); ?>

<section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Công ty</h3>
                        <ul>
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Hỗ trợ</h3>
                        <ul>
                            <li><a href="#">Email</a></li>
                            <li><a href="#">Phone</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Khám phá</h3>
                        <ul>
                            <li><a href="#">Bản tin</a></li>
                            <li><a href="#">Ứng dụng</a></li>
                            <li><a href="#">Quy định</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Giấy phép</h3>
                        <ul>
                            <li><a href="#">ICP 85/GP-ICP-STTTT</a></li>
                            <li><a href="#">MXH 152/GXN-TTDT</a></li>
                            <li><a href="#">SGD TMĐT 111</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

 <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-phone-square"></i>  +84982770090 
                    &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">dulichkhapnoi.com.vn</a>. Cùng nhau đi đến khắp mọi miền.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="<?php echo site_url('home/trangchu') ?>">Trang chủ</a></li>
                        <li><a href="<?php echo site_url('home/gioithieu') ?>">Giới thiệu</a></li>
                        <li><a href="<?php echo site_url('home/lienhe') ?>">Liên hệ</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
</body>
</html>


<!-- Modal -->
<div id="modaldangnhap" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 600px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title"><i class="fa fa-camera fa-fw"></i> Đăng nhập</h4> -->
      </div>
      <div class="modal-body"> <!-- body -->
          <!-- <?php $this->load->view("login_view"); ?> -->
      </div> <!-- dong body -->
    </div><!-- dong Modal content -->
  </div>
</div><!-- dóng modal -->