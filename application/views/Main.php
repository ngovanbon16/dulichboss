<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.ico" type="image/x-icon" />

        <title><?php echo $title; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>assets/css/style_login.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/startmin.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/raphael.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-confirmation.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>

        <link href="<?php echo base_url(); ?>assets/confirm/css/msc-style.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/confirm/js/msc-script.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script type="text/javascript">
            function thongbao(title, message, type)
            {
                if(title == "")
                {
                    title = "<?php echo lang('notification') ?>";
                }
                $.notify(
                    {
                        icon: 'glyphicon glyphicon-star',
                        title: title+":",
                        message: message,
                        url: "https://google.com",
                        target: "_blank"
                    },
                    {
                        type: type, //warning danger
                        allow_dismiss: true,
                        delay: 3000,
                        timer: 1000,
                        offset: {
                            x: 10,
                            y: 10
                        },
                        z_index: 1090,
                        //icon_type: 'image',
                        newest_on_top: true,
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        }
                    }
                );
            }
        </script>
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>admin"> <?php echo lang('admin') ?> </a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="<?php echo base_url(); ?>trangchu"><i class="fa fa-home fa-fw"></i> <?php echo lang('home') ?></a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <?php
                            $colorall = "";
                            $color = "";
                            $new = "0";
                            if(isset($newplace))
                            {
                                if($newplace > 0)
                                {
                                    $new = $newplace;
                                    $color = "#F00";
                                    $colorall = "#F00";
                                }
                            }

                            $colorbv = "";
                            $newbv = "0";
                            if(isset($baivietmoi))
                            {
                                if($baivietmoi > 0)
                                {
                                    $newbv = $baivietmoi;
                                    $colorbv = "#F00";
                                    $colorall = "#F00";
                                }
                            }
                        ?>
                        <a style="color: <?= $colorall; ?>;" class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a style="color: <?= $color ?>;" href="<?php echo base_url(); ?>diadiem">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> <?php echo lang('new_place') ?>
                                        <span class="pull-right text-muted small"><?php echo $new ?></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a style="color: <?= $colorbv ?>;" href="<?php echo base_url(); ?>baiviet">
                                    <div>
                                        <i class="fa fa-pencil fa-fw"></i> <?php echo lang('new_post') ?>
                                        <span class="pull-right text-muted small"><?php echo $newbv ?></span>
                                    </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                            <?php //echo $this->session->userdata['avata']; ?>
                            <!-- <a href="<?php echo base_url(); ?>avata"> -->
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
                                    redirect(base_url()."login");
                                    ?>
                                        <i class="fa fa-user fa-fw"></i>
                                    <?php
                                }
                            ?>
                            <?php echo $this->session->userdata("email"); ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo base_url(); ?>nguoidung/edit/<?php echo $this->session->userdata('id'); ?>"><i class="fa fa-user fa-fw"></i> <?php echo lang('account') ?></a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>avata"><i class="fa fa-camera fa-fw"></i> <?php echo lang('photo') ?></a>
                            </li>
                            </li>
                            <li><a href="<?php echo base_url(); ?>avata"><i class="fa fa-gear fa-fw"></i> <?php echo lang('setting') ?></a>
                            </li>
                            <li>
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
                                         <a href="<?php echo base_url(); ?>langswitch/switchLanguage/vietnamese"><i class="fa fa-language fa-fw"> Tiếng Việt</i></a> 
                                    <?php
                                    } 
                                ?>
                            </li>
                            <li class="divider"></li>

                            <?php if($this->session->userdata("id") != ""){ ?>
                            <li><a href="<?php echo base_url(); ?>login"><i class="fa fa-mail-forward fa-fw"></i> <?php echo lang('change').' '.lang('account') ?></a>
                            <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out fa-fw"></i> <?php echo lang('logout') ?></a>
                            <?php }else{ ?>
                            <li><a href="<?php echo base_url(); ?>login"><i class="fa fa-sign-in"></i> <?php echo lang('login') ?></a>
                            </li>
                            </li>
                            <li><a href="<?php echo base_url(); ?>registration"><i class="fa fa-pencil-square-o"></i> <?php echo lang('register') ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <!-- <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="<?php echo lang('search') ?>...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url(); ?>admin" ><i class="fa fa-home fa-fw"></i> <?php echo lang('home') ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>nguoidung"><i class="fa fa-user fa-fw"></i> <?php echo lang('user') ?></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-dribbble fa-fw"></i> <?php echo lang('area') ?><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>tinh"> <?php echo lang('provincial') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>huyen"> <?php echo lang('district') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>xa"> <?php echo lang('town') ?></a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>danhmuc"><i class="fa fa-th-list fa-fw"></i> <?php echo lang('category') ?></a>
                                <!-- <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>danhmuc"> <?php echo lang('category') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>danhmuchinh"><?php echo lang('picture') ?></a>
                                    </li>
                                </ul> -->
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>diadiem"><i class="fa fa-map-marker fa-fw"></i> <?php echo lang('place') ?></a>
                                <!-- <ul class="nav nav-second-level"> -->
                                    <!-- <li>
                                        <a href="<?php echo base_url(); ?>map"> Map Codeigniter</a>
                                    </li> -->
                                    <!-- <li>
                                        <a href="<?php echo base_url(); ?>map/map"> <?php echo lang('map') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>map/mapfromAtoB"> A -> B</a>
                                    </li> -->
                                    <!-- <li>
                                        <a href="<?php echo base_url(); ?>diadiem"> <?php echo lang('place') ?></a>
                                    </li> -->
                                    <!-- <li>
                                        <a href="<?php echo base_url(); ?>diadiemhinh"> Địa điểm hình ảnh</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>mua"> Mùa</a>
                                    </li> -->
                                <!-- </ul> -->
                                <!-- /.nav-second-level -->
                            </li>
                            <!-- <li>
                                <a href="#"><i class="fa fa-camera-retro"></i> Đa phương tiện<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>loaihinhanh"> Nhóm hình ảnh</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>upload"> Upload hình ảnh</a>
                                    </li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url(); ?>binhluan"><i class="fa fa-comments fa-fw"></i> <?php echo lang('comment') ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>baiviet"><i class="fa fa-pencil fa-fw"></i> <?php echo lang('posts') ?></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo lang('authority') ?><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>nhomquyen"> <?php echo lang('authority_groups') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>quyen"> <?php echo lang('authority') ?></a>
                                    </li>
                                    <!-- <li>
                                        <a href="<?php echo base_url(); ?>capbac"> Cấp bậc người dùng</a>
                                    </li> -->
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>thongtin"><i class="fa fa-info fa-fw"></i> <?php echo lang('information') ?></a>
                            </li>
                            <!-- <li>
                                <a href="#"><i class="fa fa-bar-chart-o"></i> Thống kê<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">Báo cáo Y</a>
                                    </li>
                                    <li>
                                        <a href="#">Thống kê Y</a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                        <div class="panel panel-default">
                            <?php 
                                if($this->session->userdata["id"] != "" && $this->session->userdata['admin'] == '1')
                                {
                                    $this->load->view($subview);
                                }
                                else
                                {
                                    /*echo "<center><h1>Chúng tôi rất tiếc bạn không có quyền sử dụng tính năng này!</h1></center>";*/
                                    redirect(base_url());
                                }
                            ?>
                        </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

    </body>
</html>
