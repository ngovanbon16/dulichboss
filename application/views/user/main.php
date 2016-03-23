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

                        <li style="list-style: none;" class="dropdown">
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
                                            <img id="avata" src="<?php echo base_url(); ?>uploads/user/<?php echo $this->session->userdata['avata']; ?>" height="25" width="25">
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
                                <li><a href="<?php echo base_url(); ?>index.php/nguoidung/edit"><i class="fa fa-user fa-fw"></i> <?php echo lang('account') ?></a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/avata"><i class="fa fa-camera"></i> <?php echo lang('change').' '.lang('avatar') ?></a>
                                </li>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/avata"><i class="fa fa-gear fa-fw"></i> <?php echo lang('setting') ?></a>
                                </li>
                                <li class="divider"></li>

                                <?php if($this->session->userdata("id") != ""){ ?>
                                <li data-toggle="modal" data-target="#modaldangnhap"><a href=""><i class="fa fa-mail-forward"></i> <?php echo lang('login') ?></a>
                                <li><a href="<?php echo base_url(); ?>index.php/login/logout/trangchu"><i class="fa fa-sign-out fa-fw"></i> <?php echo lang('logout') ?></a>
                                <?php }else{ ?>
                                <li data-toggle="modal" data-target="#modaldangnhap" style="cursor: pointer;"><a><!-- <a href="<?php echo base_url(); ?>index.php/login"> --><i class="fa fa-sign-in"></i> <?php echo lang('login') ?></a>
                                </li>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/registration"><i class="fa fa-pencil-square-o"></i> <?php echo lang('register') ?></a>
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
                                    <input type="text" class="search-form" autocomplete="off" placeholder="<?php echo lang('search'); ?>">
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
                        <li class="<?php if($active == 'trangchu') echo 'active'; ?>"><a href="<?php echo site_url('home/trangchu') ?>"><i class="fa fa-home fa-fw"></i> <?php echo lang('home') ?></a></li>
                        <!-- <li><a href="services.html"><i class="fa fa-heart fa-fw"></i> Yêu thích</a></li> -->
                        <li class="<?php if($active == 'map') echo 'active'; ?>"><a href="<?php echo site_url('home/map') ?>"><i class="fa fa-location-arrow fa-fw"></i> <?php echo lang('map') ?></a></li>
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
                                        echo lang('select').'...';
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
                        <li class="<?php if($active == 'gioithieu') echo 'active'; ?>"><a href="<?php echo site_url('home/gioithieu'); ?>"><i class="fa fa-info-circle fa-fw"></i> <?php echo lang('introduce') ?></a></li> 
                        <li class="<?php if($active == 'lienhe') echo 'active'; ?>"><a href="<?php echo site_url('home/lienhe'); ?>"><i class="fa fa-linkedin-square fa-fw"></i> <?php echo lang('contact') ?></a></li>                
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

<?php $this->load->view($subview); ?>

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
                    &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">smartmekong.vn/dulich</a>. Du lich khap noi <i class="fa fa-plane fa-fw"></i>
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="<?php echo site_url('home/trangchu') ?>"><?php echo lang('home'); ?></a></li>
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
</style>

<script language="javascript" type="text/javascript">
    $(document).ready(function(e)
    {
        $("#button").click(function()
        {
            var url, dta;
            url="<?php echo base_url(); ?>index.php/login/login?t=" + Math.random();
            dta = {
                "email" : $("#login :text[name='email']").val(),
                "password" : $("#login :password[name='password']").val()
            };

            $.post(url, dta, function(data, status){

                console.log(status);
                //console.log(data);
                if(status == "success")
                {   
                    $("#login *").remove(".txterror").removeClass("bg01");
                    //alert(data.status);
                    if(data.status == "error")
                    {
                        $("#info").addClass("txterror").text(data.msg["error"]);
                        $.each(data.msg, function(i, val)
                        {
                            var ele = "#login [name='" + i + "']";
                            //console.log(ele);
                            $(ele).addClass("bg01")
                                        .after("<span class='txterror'>" + val + "</span>");
                        });
                    }
                    else
                    {
                        $("#info").addClass("textsuccess").text("<?php echo lang('logged_in_successfully') ?>");
                        $("#login").remove();
                        setTimeout("location.href = '<?php echo site_url('home/trangchu'); ?>';",1000);
                    }
                }
            }, 'json');
        });

        $("input").focus(function()
        {
            //$(this).css("background-color", "#ff0000");

        });
        $("input").blur(function()
        {
            //$(this).css("background-color", "#ffffff");
        });
    });
</script>

<!-- Modal -->
<div id="modaldangnhap" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 400px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h3 id='lbldangnhap' class="panel-title"><?php echo lang('login') ?></h3>
            <a id="lbldangky" href="<?php echo base_url(); ?>index.php/registration"><?php echo lang('register') ?></a>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title"><i class="fa fa-camera fa-fw"></i> Đăng nhập</h4> -->
      </div>
      <div class="modal-body"> <!-- body -->
        <center>
            <div id="info" class="form-group"></div>
        </center> 
        <form name="login" id="login" method="post" role="form">
            <div style="margin-bottom: 20px;" class="form-group">
                <input class="form-control" placeholder="<?php echo lang('input').' '.lang('email') ?>" name="email" id="email" type="text" autofocus>
            </div>
            <div style="margin-bottom: 20px;" class="form-group">
                <input class="form-control" placeholder="<?php echo lang('input').' '.lang('password') ?>" name="password" id="password" type="password" value="">
            </div>
            <button type="button" id="button" class="btn btn-outline btn-success btn-lg btn-block"><?php echo lang('login') ?></button>
        </form>
      </div> <!-- dong body -->
    </div><!-- dong Modal content -->
  </div>
</div><!-- dóng modal -->