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
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

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

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcombobox.js"></script>

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

    <script>
    $(document).ready(function(){
      $('.online-support').hide();
      $('.support-icon-right h3').click(function(e){
        e.stopPropagation();
        $('.online-support').slideToggle();
      });
      $('.online-support').click(function(e){
        e.stopPropagation();
      });
      $(document).click(function(){
        $('.online-support').slideUp();
      });
    });
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/571da09da2ce853d5f0837f2/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <style>
    .support-icon-right {
        border-radius: 3px;
        background: #F0F3EF;
        position: fixed;
        right: 0;
        bottom: 0;
        z-index: 9;
        overflow: hidden;
        width: 250px;
        color: #fff!important;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    .support-icon-right h3 {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 13px!important;
        font-family: Arial;
        color: #fff!important;
        margin: 0!important;
        background-color: #5CB85C;
        cursor: pointer;
    }

    .support-icon-right i {
        background-color: #D9534F;
        padding: 15px 15px 12px 15px;
            margin-right: 15px;
    }
    .online-support {
        display: none;
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
                                <li data-toggle="modal" data-target="#modaldangnhap"><a href=""><i class="fa fa-mail-forward fa-fw"></i> <?php echo lang('login') ?></a>
                                <li><a href="<?php echo base_url(); ?>login/logout/trangchu"><i class="fa fa-sign-out fa-fw"></i> <?php echo lang('logout') ?></a>
                                <?php }else{ ?>
                                <li data-toggle="modal" data-target="#modaldangnhap" style="cursor: pointer;"><a><!-- <a href="<?php echo base_url(); ?>login"> --><i class="fa fa-sign-in fa-fw"></i> <?php echo lang('login') ?></a>
                                </li>
                                </li>
                                <li><a href="<?php echo base_url(); ?>registration"><i class="fa fa-pencil-square-o fa-fw"></i> <?php echo lang('register') ?></a>
                                </li>
                                <?php } ?>
                            </ul>    
                        </li>

                        </p></div>
                    </div>
                    <!-- <div class="col-sm-6 col-xs-8">
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
                                    <a href="<?php echo base_url(); ?>user/searchplace"> 
                                    <input type="text" class="search-form" autocomplete="off" placeholder="<?php echo lang('search'); ?>">

                                    <button style="background-color: #000; color: #FFF;" type="button" class="btn btn-default"> <i class="fa fa-search fa-fw"></i> <?= lang('search'); ?></button>

                                    </a>

                                    <div style="z-index: 2000000;" id='content'>
                                        <script type="text/javascript">
                                            $(document).ready(function () {               
                                                var url = "<?php echo base_url(); ?>diadiem/datafound";
                                                // prepare the data
                                                var source =
                                                {
                                                    datatype: "json",
                                                    datafields: [
                                                        { name: 'DD_TEN' },
                                                        { name: 'DD_MA' }
                                                    ],
                                                    url: url,
                                                    async: false
                                                };
                                                var dataAdapter = new $.jqx.dataAdapter(source);
                                                // Create a jqxComboBox
                                                $("#jqxWidget").jqxComboBox({ selectedIndex: -1, source: dataAdapter, displayMember: "DD_TEN", valueMember: "DD_MA", width: 200, height: 25});
                                                // trigger the select event.
                                                $("#jqxWidget").on('select', function (event) {
                                                    if (event.args) {
                                                        var item = event.args.item;
                                                        if (item) {
                                                            var valueelement = $("<div></div>");
                                                            valueelement.text("Value: " + item.value);
                                                            var labelelement = $("<div></div>");
                                                            labelelement.text("Label: " + item.label);
                                                            $("#selectionlog").children().remove();
                                                            $("#selectionlog").append(labelelement);
                                                            $("#selectionlog").append(valueelement);
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                        <div id='jqxWidget'>
                                        </div>
                                        <div style="font-size: 12px; font-family: Verdana;" id="selectionlog"></div>
                                    </div>

                                    <a href="<?php echo base_url(); ?>login">
                                        <button type="button" class="btn btn-outline btn-danger" data-toggle="modal" data-target="#modaldangnhap"><i class="fa fa-sign-in"></i> Đăng nhập</button>
                                    </a>
                                </form>
                           </div>
                       </div>
                    </div> -->
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
                            <li><a href="./">Email</a>: smartmekong16@gmail.com</li>
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

                <!-- <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                <div class="support-icon-right" style="margin-bottom: 30px; position:fixed; z-index:9999999; right:10px; bottom:10px;">
                    <h3><i class="fa fa-hand-o-right"></i> Chat với Dulichmientay</h3>
                    <div class="online-support">
                        <div
                                 class="fb-page"
                                 data-href="https://www.facebook.com/dulichmientaysongnuocquetoi"
                                 data-small-header="true"
                                 data-height="300"
                                 data-width="250"
                                 data-tabs="messages"
                                 data-adapt-container-width="false"
                                 data-hide-cover="false"
                                 data-show-facepile="false"
                                 data-show-posts="false">
                        </div>
                    </div>
                </div> -->

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

<script language="javascript" type="text/javascript">
    $(document).ready(function(e)
    {
        $("#button").click(function()
        {
            login();
        });

        $('#email').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                login();
            }
        });

        $('#password').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                login();
            }
        });

        function login()
        {
            var url, dta;
            url="<?php echo base_url(); ?>login/login?t=" + Math.random();
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
                        location.reload(true);
                        //setTimeout("location.href = '<?php echo site_url('home/trangchu'); ?>';",1000);
                    }
                }
            }, 'json');
        }
       
        function test(value)
        {
            var mau = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
             return mau.test(value);
        }

        $("#btnguiyeucau").click(function()
        {
            yeucau();
        });

        function yeucau()
        {
            var email = $("#diachiemail").val();
            //alert(test(email));
            if(!test(email))
            {
                alert("<?php echo lang('email').' '.lang('is').' '.lang('not').' '.lang('correct') ?>!");
                return;
            }

            if(!confirm("<?php echo lang('are_you_sure'); ?>"))
            {
                alert("<?php echo lang('cancel'); ?>");
                return;
            }
            document.getElementById("btnvalue").innerHTML = "<?php echo lang('sending') ?>...";
            document.getElementById("sending").style.visibility = "visible";
            var url, dta;
            url="<?php echo base_url(); ?>nguoidung/guimatkhau?t=" + Math.random();
            dta = {
                "email" : email
            };
            console.log(dta);
            $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);

                document.getElementById("btnvalue").innerHTML = '<?php echo lang("submit") ?><span style="visibility: hidden;" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>';
                document.getElementById("sending").style.visibility = "hidden";

                if(status == "success")
                {   
                    if(data.status == "error")
                    {
                        alert("Email không tồn tại. Vui lòng kiểm tra lại Email!");
                    }
                    else
                    {
                        alert("Email đã được gửi vui lòng đăng nhập email để xác nhận!");
                        location.reload(true);
                    }
                }
            }, 'json');
        }
    });
</script>

<!-- Modal -->
<div id="modaldangnhap" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 400px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h3 id='lbldangnhap' class="panel-title"><?php echo lang('login') ?></h3>
            <a style="font-weight: bold;" id="lbldangky" href="<?php echo base_url(); ?>registration"><?php echo lang('register') ?></a>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title"><i class="fa fa-camera fa-fw"></i> Đăng nhập</h4> -->
      </div>
      <div class="modal-body"> <!-- body -->
        <center>
            <div id="info" class="form-group"></div>
        </center> 
        <form name="login" id="login" method="post" role="form">
            <div style="margin-bottom: 22px;" class="form-group">
                <input class="form-control" placeholder="<?php echo lang('input').' '.lang('email') ?>" name="email" id="email" type="text" autofocus>
            </div>
            <div style="margin-bottom: 22px;" class="form-group">
                <input class="form-control" placeholder="<?php echo lang('input').' '.lang('password') ?>" name="password" id="password" type="password" value="">
            </div>
            <hr style="margin-bottom: 5px;" />
            <div style="margin-bottom: 5px; font-weight: bold;" class="form-group">
                <a data-toggle="modal" data-target="#modalmatkhau" href=""><?php echo lang('forgot').' '.lang('password'); ?></a>
            </div>
            <button type="button" id="button" class="btn btn-outline btn-success btn-lg btn-block"><?php echo lang('login') ?></button>
        </form>
      </div> <!-- dong body -->
    </div><!-- dong Modal content -->
  </div>
</div><!-- dóng modal -->

<!-- Modal -->
<div id="modalmatkhau" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 400px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body"> <!-- body -->
         
        <div style="margin-bottom: 20px;" class="form-group">
            <h3 id='lbldangnhap' class="panel-title"><?php echo lang('forgot').' '.lang('password'); ?></h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <br/>
        <form name="login" id="login" method="post" role="form">
            <div style="margin-bottom: 20px;" class="form-group">
                <input class="form-control" placeholder="<?php echo lang('input').' '.lang('email') ?>" name="diachiemail" id="diachiemail" type="text" autofocus>
            </div>
            <button type="button" id="btnguiyeucau" class="btn btn-outline btn-success btn-lg btn-block">
                <span style="visibility: hidden;" id="sending" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> 
                <b id="btnvalue"><?php echo lang('submit') ?>
                <span style="visibility: hidden;" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span></b>
            </button>
        </form>
      </div> <!-- dong body -->
    </div><!-- dong Modal content -->
  </div>
</div><!-- dóng modal -->