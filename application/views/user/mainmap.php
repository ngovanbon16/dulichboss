<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.ico" type="image/x-icon" />
	
	<!-- core CSS -->
    <link href="<?php echo base_url(); ?>assets/user/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/responsive.css" rel="stylesheet">    

    <style type="text/css">
        ::-webkit-scrollbar {
        width: 10px; height:8px;
        }
        ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 4px rgba(0,0,0,0.3);
        background:#fff;
        }
        ::-webkit-scrollbar-thumb {
        background: rgba(186,35,35,0.8);
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
        }
        ::-webkit-scrollbar-thumb:window-inactive {
        background: rgba(186,35,35,0.4);
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
        }
    </style>

</head><!--/head-->
<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p>

                        <li style="list-style: none; z-index: 1001;" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                                <?php //echo $this->session->userdata['avata']; ?>
                                <!-- <a href="<?php echo base_url(); ?>avata"> -->
                                <?php
                                    if(isset($this->session->userdata["email"]))
                                    {
                                        $ten = $this->session->userdata('avata');
                                        $file_path = "uploads/user/".$ten;
                                        if(file_exists($file_path))
                                        {  
                                        ?>  
                                            <img style="border-radius: 25px;" id="avata" src="<?php echo base_url(); ?>uploads/user/<?php echo $this->session->userdata['avata']; ?>" height="25" width="25">
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
                                <?php 
                                    if(isset($this->session->userdata["email"]))
                                        echo $this->session->userdata("email"); 
                                    else
                                        echo lang('account');
                                ?> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <?php 
                                    if($this->session->userdata("id") != "")
                                    {
                                ?>
                                <li><a href="<?php echo base_url(); ?>user/account"><i class="fa fa-user fa-fw"></i> <?= lang('account') ?></a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>user/addnewplace"><i class="fa fa-plus-circle fa-fw"></i> <?php echo lang('add_new_place'); ?></a>
                                </li>
                                </li>
                                <li><a href="<?php echo base_url(); ?>user/info"><i class="fa fa-book fa-fw"></i> <?= lang('albums') ?></a>
                                </li>
                                <li class="divider"></li>

                                <?php } if($this->session->userdata("id") != ""){ ?>
                                <li data-toggle="modal" data-target="#modaldangnhap"><a href="<?php echo base_url(); ?>login"><i class="fa fa-mail-forward fa-fw"></i> <?php echo lang('login') ?></a>
                                <li><a href="<?php echo base_url(); ?>login/logout/trangchu"><i class="fa fa-sign-out fa-fw"></i> <?php echo lang('logout') ?></a>
                                <?php }else{ ?>
                                <li data-toggle="modal" data-target="#modaldangnhap" style="cursor: pointer;"><a href="<?php echo base_url(); ?>login"><i class="fa fa-sign-in fa-fw"></i> <?php echo lang('login') ?></a>
                                </li>
                                </li>
                                <li><a href="<?php echo base_url(); ?>registration"><i class="fa fa-pencil-square-o fa-fw"></i> <?php echo lang('register') ?></a>
                                </li>
                                <?php } ?>
                            </ul>    
                        </li>

                        </p></div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav style="border-bottom: 1px solid #DCDCDC;" class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>trangchu"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <?php 
                        $trangchu = "";
                        $map = "";
                        $khuvuc = "";
                        $gioithieu = "";
                        $lienhe = "";
                        $danhmuc = "";
                        $timkiem = "";

                        if(isset($active))
                        {
                            if($active == "trangchu")
                                $trangchu = "active";
                            if($active == "map")
                                $map = "active";
                            if($active == "khuvuc")
                                $khuvuc = "active";
                            if($active == "gioithieu")
                                $gioithieu = "active";
                            if($active == "lienhe")
                                $lienhe = "active";
                            if($active == "danhmuc")
                                $danhmuc = "active";
                            if($active == "timkiem")
                                $timkiem = "active";
                        }
                    ?>
                    <ul class="nav navbar-nav">
                        <li class="<?php echo $trangchu; ?>"><a href="<?= base_url() ?>trangchu"><i class="fa fa-home fa-fw"></i> <?php echo lang('home') ?></a></li>
                        <!-- <li><a href="services.html"><i class="fa fa-heart fa-fw"></i> Yêu thích</a></li> -->
                        <li class="<?php echo $map; ?>"><a href="<?php echo site_url('home/map') ?>"><i class="fa fa-location-arrow fa-fw"></i> <?php echo lang('map') ?></a></li>
                        <li  class="<?php echo $khuvuc; ?>" >
                            <a href="#" class="<?php echo $khuvuc; ?>" data-toggle="dropdown"><i class="fa fa-th fa-fw"></i> 
                                <?php
                                    if(isset($this->session->userdata['T_MA']) && isset($tinh))
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
                                        echo lang('select').'...';
                                    }
                                ?> 
                            <i class="fa fa-angle-down"></i></a>
                            <ul style="z-index: 1001;" class="dropdown-menu">
                                <?php
                                    if(isset($tinh))
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
                        <li class="<?php echo $danhmuc; ?>"><a href="<?php echo site_url('home/theodanhmuc'); ?>"><i class="fa fa-th-large fa-fw"></i> <?php echo lang('category') ?></a></li> 
                        <li class="<?php echo $gioithieu; ?>"><a href="<?php echo site_url('home/gioithieu'); ?>"><i class="fa fa-info-circle fa-fw"></i> <?php echo lang('introduce') ?></a></li> 
                        <li class="<?php echo $lienhe; ?>"><a href="<?php echo site_url('home/lienhe'); ?>"><i class="fa fa-linkedin-square fa-fw"></i> <?php echo lang('contact') ?></a></li>   
                        <li class="<?php echo $timkiem; ?>"><a href="<?php echo site_url('user/searchplace'); ?>"><i class="fa fa-search fa-fw"></i> <?php echo lang('search') ?></a></li>                
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

<?php $this->load->view($subview); ?>

<section style="padding: 20px;" id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row" >
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><?php echo lang('setting') ?></h3>
                        <ul>
                            <!-- <li><a href="#">Tỉnh thành</a> Cần thơ</li> --> 
                            <li><a href="#"><?php echo lang('language') ?></a>:
                                <b style="font-size: 20px; font-style: italic;">
                                <?php
                                    if(lang('lang') == 'vi') 
                                    {
                                    ?>
                                         <a href="<?php echo base_url(); ?>langswitch/switchLanguage/english"><i class="fa fa-language fa-fw"> English</i></a> 
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                         <a href="<?php echo base_url(); ?>langswitch/switchLanguage/vietnamese"><i class="fa fa-language fa-fw"> TiếngViệt</i></a> 
                                    <?php
                                    } 
                                ?>
                                </b>
                            </li> 
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><?php echo lang('discover') ?></h3>
                        <ul>
                            <li><a href="./"><?php echo lang('newsletter') ?></a></li>
                            <li><a href="./">Mobile Web</a></li>
                            <li><a href="<?php echo base_url(); ?>home/gioithieu"><?php echo lang('term_of_use') ?></a></li>
                        </ul>
                    </div>    
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><?php echo lang('license') ?></h3>
                        <ul>
                            <li><a href="./">ICP 86/GP-ICP-STTTT</a></li>
                            <li><a href="./">MXH 153/GXN-TTDT</a></li>
                            <li><a href="./">SGD TMĐT 112</a></li>
                        </ul>
                    </div>    
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><?php echo lang('contact') ?></h3>
                        <ul>
                            <li><a href="./">Email</a>: smartmekong@gmail.com</li>
                            <li><a href="./"><?php echo lang('phone') ?></a>: 84 710 3831301</li>
                            <li><a href="./">Fb</a>: www.facebook.com/smartmekong</li>
                        </ul>
                    </div>    
                </div>

            </div>
        </div>
    </section><!--/#bottom-->

 <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-phone-square"></i>  +84982770090 
                    &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">smartmekong.vn/dulich</a>. Du lich khap noi <i class="fa fa-plane fa-fw"></i>
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="<?= base_url() ?>trangchu"><?php echo lang('home'); ?></a></li>
                        <li><a href="<?php echo site_url('home/gioithieu') ?>"><?php echo lang('introduce'); ?></a></li>
                        <li><a href="<?php echo site_url('home/lienhe') ?>"><?php echo lang('contact'); ?></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
</body>
</html>


<style type="text/css">
    #btn{
        text-decoration: none;
        color: #FFF;
    }
    #lbldangnhap{
        float: left;
    }
    #lbldangky{
        text-decoration: none;
        font-size: 16px;
        padding-left: 180px;
    }
    .txterror{
        color: #F00;
        font-style: italic;
        position: absolute;
    }
    .textsuccess{
        color: blue;
        font-style: italic;
        position: absolute;
    }
    #info{
        font-style: italic;
        position: absolute;
        margin-top: -20px;
        text-align: center;
        width: 90%;
    }
    .glyphicon-refresh-animate {
    -animation: spin .7s infinite linear;
    -webkit-animation: spin2 .7s infinite linear;
    }

    @-webkit-keyframes spin2 {
        from { -webkit-transform: rotate(0deg);}
        to { -webkit-transform: rotate(360deg);}
    }

    @keyframes spin {
        from { transform: scale(1) rotate(0deg);}
        to { transform: scale(1) rotate(360deg);}
    }
</style>

