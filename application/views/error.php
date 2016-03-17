<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url(); ?>assets/user/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/user/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/user/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/user/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/user/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0982770090</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
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
                    <a class="navbar-brand" href="index.html"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html"><?php echo lang('home') ?></a></li>
                        <li><a href="about-us.html">Giới thiệu</a></li>
                        <li><a href="contact-us.html">Liên hệ</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

    <section id="error" class="container text-center">
        <h1><?php echo lang('404_page_not_found') ?></h1>
        <p><?php echo lang('the_page_you_are_looking_for_doesnt_exist_or_an_other_error_occurred') ?></p>
        <a class="btn btn-primary" href="<?php echo site_url('home/trangchu') ?>"><?php echo lang('go_back_to_the_homepage') ?></a>

        <div>
            <?php
                /*$today = date('Y-m-d');
                echo "Today is ". $today." <br/>"; 
                foreach ($info as $iteam) {
                    $date = date("Y-m-d", strtotime($iteam["ND_NGAYTAO"]));
                    $days = (strtotime(date("Y-m-d")) - strtotime($date)) / (60 * 60 * 24);
                    echo $iteam['ND_MA']." - ".$date." - ".$days;
                    if($days > 3)
                    {   
                        echo " - hết hạn kích hoạt";
                    }
                    echo "<br>";
                }*/
            ?>
        </div>

    </section><!--/#error-->

    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row" >
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h4>Cài đặt</h4>
                        <ul>
                            <li><a href="#">Tỉnh thành</a> Cần thơ</li> 
                            <li><a href="#">Ngôn ngữ</a> Tiếng việt</li> 
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

    <script src="<?php echo base_url(); ?>assets/user/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/wow.min.js"></script>
</body>
</html>