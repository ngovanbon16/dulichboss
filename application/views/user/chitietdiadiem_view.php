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
        <style type="text/css">
        .noidungthongtin{
            padding: 5px;
            width: "100%";
            background-color: #EEE;
        }
        .cot1{
            text-align: left;
            font-weight: bold;
            width: 160px;
            border-bottom: solid 1px #99F;
        }
        .cot2{
            text-align: left;
            font-style: italic;
            border-bottom: solid 1px #99F;
        }
    </style>

    <?php echo $map['js']; ?>
    </header><!--/header-->

    <section id="about-us">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo $info['DD_TEN'] ?></h2>
                
                        <table class="noidungthongtin" width="100%">
                            <tr>
                                <td width="320">
                                    <?php 
                                        $madd = $info['DD_MA'];
                                        $anhdaidien = "anhdaidien.jpg";
                                        if($info1 != "") 
                                        foreach ($info1 as $item) {  
                                            $madd1 = $item['DD_MA'];
                                            if($madd == $madd1)
                                            {
                                                $dd = $item['HA_DAIDIEN'];
                                                if($dd == "1")
                                                {
                                                    $anhdaidien = $item['HA_TEN'];
                                                }
                                            }
                                        }
                                    ?>
                                    <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" width='300' height='300'>
                                </td>
                                <td>
                                    <?php //echo $info['DD_MA']; ?>
                                    <table class="tablenoidung" width="100%">
                                        <tr>
                                            <td class="cot1">
                                                Thuộc dạng du lịch
                                            </td>
                                            <td class="cot2">
                                                <?php echo $tendanhmuc; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Nằm trên đường
                                            </td>
                                            <td class="cot2">
                                                <?php echo $info['DD_DIACHI']; ?> thuộc xã <?php echo $tenxa; ?>
                                                 huyện <?php echo $tenhuyen; ?> tỉnh <?php echo $tentinh; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Số điện thoại
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_SDT'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Địa chỉ Email
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_EMAIL'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                               Địa chỉ Website
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_WEBSITE'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Mô tả đôi nét
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_MOTA'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Giới thiệu chi tiết
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_GIOITHIEU'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Thời gian mở cửa
                                            </td>
                                            <td class="cot2">
                                                <?php echo $info['DD_BATDAU']; ?> - <?php echo $info['DD_KETTHUC']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Giá bán
                                            </td>
                                            <td class="cot2">
                                                <?php echo $info['DD_GIATU']; ?> - <?php echo $info['DD_GIADEN']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Nội dung
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_NOIDUNG'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

            </div>
            
            <!-- about us slider -->
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel">


<script type="text/javascript" src="<?php echo base_url(); ?>assets/slider/jssor.slider.min.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 10,
                $SpacingX: 8,
                $SpacingY: 8,
                $Align: 360
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('<?php echo base_url(); ?>assets/slider/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01 .p            (normal)
        .jssort01 .p:hover      (normal mouseover)
        .jssort01 .p.pav        (active)
        .jssort01 .p.pdn        (mousedown)
        */
        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }
        
        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        
        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('<?php echo base_url(); ?>assets/slider/t01.png') -800px -800px no-repeat;
            _background: none;
        }
        
        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }
        
        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }
        
    </style>

 <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #24262e;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?php echo base_url(); ?>assets/slider/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">

                        <?php
                            foreach ($info1 as $key) {
                                $hinh = $key['HA_TEN'];
                                $duyet = $key['HA_DUYET'];
                                if($duyet == "1")
                                {
                        ?>

                             <div data-p="144.50" style="display: none;">
                                <img data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" />
                                <img data-u="thumb" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" />
                            </div>

                       <?php
                                }
                            }
                        ?>

        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div class="w">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
        <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
        <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
    </div>
    <script>
        jssor_1_slider_init();
    </script>


                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->

            <!-- our-team -->
            <div class="team">
                <div class="center wow fadeInDown">
                    <h2>Bản đồ</h2>
                            <input type="text" id="myPlaceTextBox" />
                            <?php echo $map['html']; ?>
                            Lat: <input type="text" id="lat" value="" readonly >
                            Lng: <input type="text" id="lng" value="" readonly >
                </div>
            </div><!--section-->
        </div><!--/.container-->
    </section><!--/about-us-->

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