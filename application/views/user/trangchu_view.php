<head>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btnthem").click(function(){
                var url, dta;
                url="<?php echo base_url(); ?>index.php/home/loadthemdiadiem?t=" + Math.random();
                dta = {
                    "count" : $("#count").val(),
                };
                console.log(dta);
                $.post(url, dta, function(data, status){

                    console.log(status);
                    console.log(data);
                    if(status == "success")
                    {   
                        if(data.status == "error")
                        {

                        }
                        else
                        {
                            for (var i = 0 ; i < data.data.length; i++) 
                            {
                                var hinh = "";
                                var tentinh = "";
                                var tenhuyen = "";
                                var ma = data.data[i]["DD_MA"];
                                var ten = data.data[i]["DD_TEN"];
                                var tinh = data.data[i]["T_MA"];
                                var huyen = data.data[i]["H_MA"];

                                for (var j = 0; j < data.hinh.length; j++) {
                                    if(ma == data.hinh[j]["DD_MA"] && data.hinh[j]["HA_DAIDIEN"] == "1")
                                    {
                                        hinh = data.hinh[j]["HA_TEN"];
                                    }
                                }

                                for (var j = 0; j < data.tinh.length; j++) {
                                    if(tinh == data.tinh[j]["T_MA"])
                                    {
                                        tentinh = data.tinh[j]["T_TEN"];
                                    }
                                }

                                for (var j = 0; j < data.huyen.length; j++) {
                                    if(tinh == data.huyen[j]["T_MA"] && huyen == data.huyen[j]["H_MA"])
                                    {
                                        tenhuyen = data.huyen[j]["H_TEN"];
                                    }
                                }


                                document.getElementById("diadiem").innerHTML += '<table style="float: left; margin-right: 13px; height: 180px; width: 150px;" border="0"><tr><td height="100" width="150"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/'+ma+'"><img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/'+hinh+'" alt=""></a></td></tr><tr><td valign="top"><div style="max-height: 40px; overflow: hidden;"><b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/'+ma+'">'+ten+'</a> </b> </div><p style="font-size: 13px; font-style: italic;">'+tenhuyen+'<i class="fa fa-angle-double-right fa-fw"></i>'+tentinh+'</p></td></tr></table>';
                            }
                            var tong = eval(data.data.length+"+"+$("#count").val());
                            $("#count").val(tong);
                            if(data.data.length == 0)
                            {
                                $("#btnthem").hide();
                            }
                            
                        }
                    }
                }, 'json');
            });
        });
        var bool = true;
        function oppen()
        {
            $(".benner").toggleClass("benner1");
            if(bool)
            {
                document.getElementById("iconleft").className = "fa fa-angle-double-right fa-fw";
                bool = false;
            }
            else
            {
                document.getElementById("iconleft").className = "fa fa-angle-double-left fa-fw";
                bool = true;
            }
            
        }
    </script>

    <style type="text/css">
        .grad1 {
            padding: 5px;
            height: 50px;
            border-radius: 3px;
            margin-top: 5px;
            
            -webkit-box-shadow:0 -4px 4px -4px #000;
            box-shadow: 0 -4px 4px -4px #000;
            /*hoặc*/
            box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        }

        #imghuyen {
            border-radius: 5px;
            -webkit-box-shadow:0 -4px 4px -4px #000;
            box-shadow: 0 -4px 4px -4px #000;
            /*hoặc*/
            box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        }

        .imgdiadiem {
            width: 100%; 
            height: 100px; 
            border-radius: 5px;
            box-shadow: 0 0 4px #000;
            -webkit-box-shadow: 0 0 4px #000;
        }

        .baiviet{
            border-radius: 3px;
            width: 100%;
            margin-bottom: 20px; 
            background-color: #FFF;
            height: 34px;
             box-shadow: 0 0 4px #000;
            -webkit-box-shadow: 0 0 4px #000;
        }

        .benner{
            margin: 10px;
            background-color: #FFF; 
            width: 250px; 
            height: 600px;
            border-radius: 3px;
            opacity: 0.8;
            margin-right: -250px;
            -webkit-transition: margin-right 3s;
            transition:  margin-right 3s;
            box-shadow: 0 0 4px #8DEEEE;
            -webkit-box-shadow: 0 0 4px #8DEEEE;
        }
        .benner1{
            margin-right: 0px;
            -webkit-transition:  margin-right 3s;
            transition:  margin-right 3s;
            background-color: #DCDCDC;
        }
        .benner2{
            margin: 5px;
        }
        .tieudebenner{
            font-size: 13; 
            width: 100px; 
            color: #F00; 
            overflow: hidden;
        }
        .tieudebenner:hover {
            color: #000;
        }
        #iconleft{
            box-shadow: 0 0 4px #8DEEEE;
            -webkit-box-shadow: 0 0 4px #8DEEEE;
            margin-right: -12px;
            margin-top: 12px;
            cursor: pointer;
            width: 50px;
            height: 50px;
            font-size: 50px;
            color: #c52d2f;
            border-radius: 5px 0px 0px 5px;
        }
        #iconleft:hover{
            color: #F00;
        }
    </style>

</head>
<body class="homepage">
    <div align="right" style="position: absolute; z-index: 1000; float: right; width: 100%; overflow: hidden;">
        <table>
            <tr>
                <td valign="top">
                   <!--  <img class="iconleft" src="<?php echo base_url(); ?>assets/images/left.png" onclick="oppen()" /> -->
                   <i id="iconleft" class="fa fa-angle-double-left fa-fw" onclick="oppen()"></i>
                </td>
                <td>
                    <div class="benner" >
                        <marquee class="benner2" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" direction="up" width="240" height="590" align="center">

                          <?php
                            foreach ($danhgia as $row) {
                                $hinh3 = $row['HA_TEN'];
                                $ma3 = $row['DD_MA'];
                                $ten3 = $row['DD_TEN'];
                                $tinh3 = $row['T_TEN'];
                                $huyen3 = $row['H_TEN'];
                                $diem = $row['diem'];
                            ?>
                              <a class="tieudebenner" target="_blank" href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $ma3; ?>">
                                <span>
                                  
                                <span><?php echo $ten3; ?></span><br/>
                                <i style="font-size: 13px; color: #F00;"><?php echo $huyen3.' - '.$tinh3; ?> | <?php echo lang('rating').': '.round($diem, 1); ?></i>
                                <img class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh3; ?>" />

                              </a> <hr/>
                            <?php      
                            } 
                          ?>

                        </marquee>
                    </div>
                </td>
            </tr>
        </table>
        
    </div>
    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
                <li data-target="#main-slider" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(<?php echo base_url(); ?>assets/images/caucantho.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Cầu Cần Thơ</h1>
                                    <h2 class="animation animated-item-2">Được mệnh danh là cây cầu dài nhất Đông Nam Á.</h2>
                                    <a class="btn-slide animation animated-item-3" href="<?php echo base_url(); ?>aediadiem/detailuser1/74"><?php echo lang('view_more') ?></a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <a href="#name">
                                        <img style="width: 60%; height: 60%;" src="<?php echo base_url(); ?>assets/images/logo0.png" >
                            
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php echo base_url(); ?>assets/images/dongthapmuoi.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Đồng Tháp Mười</h1>
                                    <h2 class="animation animated-item-2">Là một biểu tượng của đồng bằng Sông Cửu Long châu thổ.</h2>
                                    <a class="btn-slide animation animated-item-3" href="<?php echo base_url(); ?>aediadiem/detailuser1/80"><?php echo lang('view_more') ?></a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <a href="#name">
                                        <img style="width: 60%; height: 60%;" src="<?php echo base_url(); ?>assets/images/logo0.png" class="img-responsive">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php echo base_url(); ?>assets/images/chuavanlinh.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Chùa Vạn Linh trên núi Thiên Cẩm Sơn</h1>
                                    <h2 class="animation animated-item-2">Một trong những địa điểm du lịch tâm linh không thể bỏ qua.</h2>
                                    <a class="btn-slide animation animated-item-3" href="<?php echo base_url(); ?>aediadiem/detailuser1/83"><?php echo lang('view_more') ?></a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <a href="#name">
                                        <img style="width: 60%; height: 60%;" src="<?php echo base_url(); ?>assets/images/logo0.png" class="img-responsive">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php echo base_url(); ?>assets/images/chocairang.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Chợ Nổi Cái Răng</h1>
                                    <h2 class="animation animated-item-2">Một nơi hấp dẫn đối với những du khách sành về ăn uống.</h2>
                                    <a class="btn-slide animation animated-item-3" href="<?php echo base_url(); ?>aediadiem/detailuser1/64"><?php echo lang('view_more') ?></a>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <a href="#name">
                                        <img style="width: 60%; height: 60%;" src="<?php echo base_url(); ?>assets/images/logo0.png" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a style="z-index: 1001;" class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a style="z-index: 1001;" class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

    <center>
    <a href="#name" style="position: absolute; margin-left: -35px; margin-top: -150px; z-index: 10000;">
        <i style="font-size: 80px; font-weight: bolder;" class="fa fa-angle-double-down"></i>
    </a></center>

    <a name="name"></a>
    <section id="feature" style="margin-top: -30px;">
        <div class="container">

            <!-- <div class="baiviet">
                <marquee style="margin: 5px;" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="4" direction="left" width="100%" align="center">
                    <i class="fa fa-star-o"></i> <?php echo lang('posts').' '.lang('new'); ?>: 
                    <?php
                        foreach ($baiviet as $iteam) {
                            $BV_MA1 = $iteam["BV_MA"];
                            $BV_TIEUDE1 = $iteam["BV_TIEUDE"];
                    ?>

                    <a style="margin: 10px;" href="<?php echo base_url(); ?>index.php/baiviet/detail/<?php echo $BV_MA1; ?>">
                        <?php echo $BV_TIEUDE1; ?>
                    </a> <i class="fa fa-angle-double-right"></i>

                    <?php
                        }
                    ?>
                </marquee>
            </div> -->

           <div class="center wow fadeInDown">
                
                <h2>Được xem nhiều nhất</h2>
            </div>

            <div style="margin-left: 0px; margin-top: -30px;" class="row">
                <div class="features">
                    <?php 
                        foreach ($luotxem as $row) {
                            $hinh = $row['HA_TEN'];
                            $ma = $row['DD_MA'];
                            $ten = $row['DD_TEN'];
                            $tentinh = $row['T_TEN'];
                            $tenhuyen = $row['H_TEN'];
                    ?>
                    <!-- <div style="height: 180px;" class="col-md-2" data-wow-duration="1000ms" data-wow-delay="600ms"> -->
                        <table style="float: left; margin-right: 13px; height: 180px; width: 150px;" border="0">
                                <tr>
                                    <td height="100" width="150">
                                        <a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $ma; ?>">
                                            <img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr>    
                                    <td valign="top">
                                        <div style="max-height: 40px; overflow: hidden;">
                                        <b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $ma; ?>"><?php echo $ten; ?></a> </b> </div>
                                        <p style="font-size: 13px; font-style: italic;"><?php echo $tenhuyen.'<i class="fa fa-angle-double-right fa-fw"></i>'.$tentinh; ?></p>   
                                    </td>
                                </tr>
                            </table>
                    <!-- </div> --><!--/.col-md-4-->
                    <?php 
                        }
                    ?>
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo lang('some_prominent_locations') ?></h2>
                <p class="lead">Gồm các địa điểm mới và vừa mới được cập nhật thông tin</p>
            </div>

            <div class="row">
                <div style="margin-left: 15px;" id="diadiem" class="features">

                    <?php 
                        $count = 0;
                        foreach ($info as $iteam) {
                        $ma = $iteam['DD_MA'];
                        $ten = $iteam['DD_TEN'];
                        $mota = $iteam['DD_MOTA'];
                        $duyet = $iteam['DD_DUYET'];
                        $matinh = $iteam['T_MA'];
                        $mahuyen = $iteam['H_MA'];
                        $tentinh = '';
                        $tenhuyen = '';

                        foreach ($tinh as $key) {
                            if($matinh == $key['T_MA'])
                            {
                                $tentinh = $key['T_TEN'];
                            }
                        }

                        foreach ($huyen as $key) {
                            if($matinh == $key['T_MA'] && $mahuyen == $key['H_MA'])
                            {
                                $tenhuyen = $key['H_TEN'];
                            }
                        }

                        if($duyet == "1")
                        {
                            $count++;
                            $hinh = "anhdaidien.jpg";
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

                    <!-- <div style="height: 180px;" class="col-md-2" data-wow-duration="1000ms" data-wow-delay="600ms">
 -->                        <table style="float: left; margin-right: 13px; height: 180px; width: 150px;" border="0">
                                <tr>
                                    <td height="100" width="150">
                                        <a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $ma; ?>">
                                            <img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr>    
                                    <td valign="top">
                                        <div style="max-height: 40px; overflow: hidden;">
                                        <b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $ma; ?>"><?php echo $ten; ?></a> </b> </div>
                                        <p style="font-size: 13px; font-style: italic;"><?php echo $tenhuyen.'<i class="fa fa-angle-double-right fa-fw"></i>'.$tentinh; ?></p>   
                                    </td>
                                </tr>
                            </table>
                    <!-- </div> -->

                    <?php
                            }
                        }
                    ?>

                </div><!--/.services-->
            </div><!--/.row-->   
            <div class="row">
                 <center>
                    <div style="cursor: pointer; margin: 10px;">
                        <button id="btnthem" type="button" class="btn btn-danger"><i class="fa  fa-eye fa-fw"></i> <?php echo lang('view_more'); ?></button>
                    </div>
                    <div style="font-weight: bolder;" class="grad1">
                        <?php echo lang('total') ?>: <input id="count" style="width: 40px; height: 40px; border-radius: 50%; text-align: center; border: ; font-weight: bolder; background-color: #d9534f; font-size: 15px; color: #fff;" value="<?php echo $count ?>" readonly="readonly" />
                    </div>
                    
                 </center> 
            </div>  
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
