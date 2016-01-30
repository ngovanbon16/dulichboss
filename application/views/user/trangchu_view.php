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
</head><!--/head-->

<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +84982770090</p></div>
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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home/trangchu"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Trang chủ</a></li>
                        <li><a href="about-us.html">Địa điểm nổi bật</a></li>
                        <li><a href="services.html">Nhiều người yêu thích</a></li>
                        <li><a href="portfolio.html">Văn hóa du lịch</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tỉnh <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">Báo lỗi</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                            </ul>
                        </li>
                        <li><a href="contact-us.html">Giới thiệu</a></li> 
                        <li><a href="contact-us.html">Liên hệ</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(<?php echo base_url(); ?>assets/images/halongbay.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Hạ Long Bay một trong những kỳ quan của thế giới</h1>
                                    <h2 class="animation animated-item-2">Một trong những địa điểm du lịch không thể nào bỏ qua khi đến với Việt Nam</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Thông tin</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php echo base_url(); ?>assets/images/dongphongnha.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Động Phong Nha lung linh huyền ảo</h1>
                                    <h2 class="animation animated-item-2">Được Unesco công nhận là một trong những kỳ quan thế giới</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Thông tin</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php echo base_url(); ?>assets/images/phocohoian.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Phố Cổ Hội An êm đềm và lãng mạn</h1>
                                    <h2 class="animation animated-item-2">Với vẽ đẹp ngàn năm cổ kính</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Thông tin</a>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

    <section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Một số hình ảnh nổi bật</h2>
            </div>

            <div class="row">
                
                <?php 
                    foreach ($info as $iteam) {
                    $ma = $iteam['DD_MA'];
                    $ten = $iteam['DD_TEN'];
                    $mota = $iteam['DD_MOTA'];
                    $hinh = "";
                    foreach ($info1 as $key) {
                        if($ma == $key['DD_MA'])
                        {
                            if($key['HA_DAIDIEN'] == "1")
                            {
                                $hinh = $key['HA_TEN'];
                            }
                        }
                    }
                ?>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" alt="" height='200'>
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser/<?php echo $ma; ?>"><?php echo $ten; ?></a> </h3>
                                <p>Giới thiệu đôi nét</p>
                                <a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Xem</a>
                            </div> 
                        </div>
                    </div>
                </div> 

                <?php
                    }
                ?>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#recent-works-->

    <section id="bottom">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>Một số địa điểm nổi tiếng</h2>
            </div>

            <div class="row">
            <?php 
                foreach ($info as $iteam) {
                $ma = $iteam['DD_MA'];
                $ten = $iteam['DD_TEN'];
                $mota = $iteam['DD_MOTA'];
                $hinh = "";
                foreach ($info1 as $key) {
                    if($ma == $key['DD_MA'])
                    {
                        if($key['HA_DAIDIEN'] == "1")
                        {
                            $hinh = $key['HA_TEN'];
                        }
                    }
                }
            ?>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" width='150' height='150'>
                        </div>
                        <div class="media-body" style="height: 150px; overflow: auto;">
                            <a href="<?php echo base_url(); ?>index.php/aediadiem/detail/<?php echo $ma; ?>"> <h3 class="media-heading"> <?php echo $ten ?> </h3> </a>
                            <p><?php echo $mota ?></p>
                        </div>
                    </div>
                </div>

            <?php
                }
            ?>
                                               
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">dulichkhapnoi.com.vn</a>. Cùng nhau đi đến khắp mọi miền.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Liên hệ</a></li>
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