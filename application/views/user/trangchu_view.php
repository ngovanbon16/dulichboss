<head>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btnthem").click(function(){
                var url, dta;
                url="<?php echo base_url(); ?>home/loadthemdiadiem?t=" + Math.random();
                dta = {
                    "start" : $("#count").val(),
                    "length" : "14"
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
                            for (var i = 0 ; i < data.length; i++) 
                            {
                                var hinh = "";
                                var tentinh = "";
                                var tenhuyen = "";
                                var ma = data[i]["DD_MA"];
                                var ten = data[i]["DD_TEN"];
                                var tinh = data[i]["T_MA"];
                                var huyen = data[i]["H_MA"];
                                var hinh = data[i]["HA_TEN"];
                                var tentinh = data[i]["T_TEN"];
                                var tenhuyen = data[i]["H_TEN"];

                                document.getElementById("diadiem").innerHTML += '<table style="float: left; margin-right: 13px; height: 180px; width: 150px;" border="0"><tr><td height="100" width="150"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/'+ma+'"><img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/'+hinh+'" alt=""></a></td></tr><tr><td valign="top"><div style="max-height: 40px; overflow: hidden;"><b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/'+ma+'">'+ten+'</a> </b> </div><p style="font-size: 13px; font-style: italic;">'+tenhuyen+'<i class="fa fa-angle-double-right fa-fw"></i>'+tentinh+'</p></td></tr></table>';
                            }
                            var tong = eval(data.length+"+"+$("#count").val());
                            $("#count").val(tong);
                            if(data.length == 0)
                            {
                                $("#btnthem").hide();
                            }
                            
                        }
                    }
                }, 'json');
            });
        });
        var bool = false;
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
            width: 250px; 
            height: 530px;
            border-radius: 3px;
            margin-right: 0px;
            -webkit-transition: margin-right 3s;
            transition:  margin-right 3s;
        }
        .benner1{
            margin-right: -250px;
            -webkit-transition:  margin-right 3s;
            transition:  margin-right 3s;
            background-color: #DCDCDC;
        }
        .benner2{
            margin: 5px;
            opacity: 1;
        }
        .tieudebenner{
            font-size: 13; 
            width: 100px; 
            color: #FFF; 
            overflow: hidden;
            opacity: 1;
            font-weight: bold;
        }
        .tieudebenner:hover {
            color: #000;
        }
        #iconleft{
            margin-right: -12px;
            margin-top: 10.5px;
            cursor: pointer;
            width: 30px;
            height: 30px;
            font-size: 30px;
            color: #c52d2f;
            border-radius: 5px 0px 0px 5px;
        }
        #iconleft:hover{
            color: #F00;
        }
        .tieudebanner{
            padding: 5px;
            color: #FFF;
            text-align: center;
            border-radius: 3px 3px 5px 5px;
            width: 100%;
            font-weight: bold;
            font-size: 13px;
        }
        .nentieude{
            position: absolute;
            background-color: #000;
            width: 250px;
            height: 30px;
            opacity: 0.7;
            border-radius: 3px;
            z-index: -1;
        }
        .nenbanner{
            position: absolute; 
            width: 250px; 
            height: 500px; 
            background-color: #000;
            border-radius: 3px;
            opacity: 0.5;
            z-index: -1;
        }
    </style>

</head>
<body class="homepage">
    <div align="right" style="position: absolute; z-index: 1000; float: right; width: 100%; overflow: hidden;">
        <table>
            <tr>
                <td valign="top">
                   <!--  <img class="iconleft" src="<?php echo base_url(); ?>assets/images/left.png" onclick="oppen()" /> -->
                   <i id="iconleft" class="fa fa-angle-double-right fa-fw" onclick="oppen()"></i>
                </td>
                <td>
                    <div class="benner" >
                        <div class="nentieude"></div>
                        <div class="tieudebanner"><?= lang('the_places_have_be_appreciated') ?></div>
                        <div class="nenbanner"></div>
                        <marquee class="benner2" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" direction="up" width="240" height="485" align="center">

                          <?php
                            foreach ($danhgia as $row) {
                                $hinh3 = $row['HA_TEN'];
                                $ma3 = $row['DD_MA'];
                                $ten3 = $row['DD_TEN'];
                                $tinh3 = $row['T_TEN'];
                                $huyen3 = $row['H_TEN'];
                                $diem = $row['diem'];
                            ?>
                              <a class="tieudebenner" target="_blank" href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma3; ?>">
                                <span>
                                  
                                <span><?php echo $ten3; ?></span><br/>
                                <i style="font-size: 13px; color: #FFF; font-weight: normal;"><?php echo $huyen3.' - '.$tinh3; ?> | <?php echo lang('rating').': '.round($diem, 1); ?></i>
                                <img class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh3; ?>" />

                              </a> <hr style="margin-bottom: 10px;" />
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
            <div style="max-height: 550px;" class="carousel-inner">

                <div class="item active" style="max-height: 550px; background-image: url(<?php echo base_url(); ?>assets/images/caucantho.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Cầu Cần Thơ</h1>
                                    <h2 class="animation animated-item-2">Được mệnh danh là cây cầu dài nhất Đông Nam Á.</h2>
                                    <!-- <a class="btn-slide animation animated-item-3" href="<?php echo base_url(); ?>aediadiem/detailuser1/74"><?php echo lang('view_more') ?></a> -->
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
                                    <!-- <a class="btn-slide animation animated-item-3" href="<?php echo base_url(); ?>aediadiem/detailuser1/80"><?php echo lang('view_more') ?></a> -->
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
                                    <!-- <a class="btn-slide animation animated-item-3" href="<?php echo base_url(); ?>aediadiem/detailuser1/83"><?php echo lang('view_more') ?></a> -->
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
                                    <!-- <a class="btn-slide animation animated-item-3" href="<?php echo base_url(); ?>aediadiem/detailuser1/64"><?php echo lang('view_more') ?></a> -->
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
    <section id="feature" style="">
        <div class="container">

            <!-- <div class="baiviet">
                <marquee style="margin: 5px;" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="4" direction="left" width="100%" align="center">
                    <i class="fa fa-star-o"></i> <?php echo lang('posts').' '.lang('new'); ?>: 
                    <?php
                        foreach ($baiviet as $iteam) {
                            $BV_MA1 = $iteam["BV_MA"];
                            $BV_TIEUDE1 = $iteam["BV_TIEUDE"];
                    ?>

                    <a style="margin: 10px;" href="<?php echo base_url(); ?>baiviet/detail/<?php echo $BV_MA1; ?>">
                        <?php echo $BV_TIEUDE1; ?>
                    </a> <i class="fa fa-angle-double-right"></i>

                    <?php
                        }
                    ?>
                </marquee>
            </div> -->

           <div class="center wow fadeInDown">
                
                <h2><?= lang('most_viewed') ?></h2>
            </div>

            <div style="margin-left: 0px;" class="row">
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
                                        <a href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma; ?>">
                                            <img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr>    
                                    <td valign="top">
                                        <div style="max-height: 40px; overflow: hidden;">
                                        <b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma; ?>"><?php echo $ten; ?></a> </b> </div>
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
                <h2><?= lang('some_prominent_locations') ?></h2>
                <p class="lead"><?= lang('includes_new_locations_and_newly_updated_information') ?></p>
            </div>

            <div class="row">
                <div style="margin-left: 15px;" id="diadiem" class="features">

                    <?php 
                        foreach ($info as $iteam) {
                        $ma = $iteam['DD_MA'];
                        $ten = $iteam['DD_TEN'];
                        $mota = $iteam['DD_MOTA'];
                        $tentinh = $iteam['T_TEN'];
                        $tenhuyen = $iteam['H_TEN'];

                        $hinh = "anhdaidien.jpg";
                        if($iteam['HA_TEN'] != "")
                        {
                            $hinh = $iteam['HA_TEN'];
                        }
                    ?>

                    <!-- <div style="height: 180px;" class="col-md-2" data-wow-duration="1000ms" data-wow-delay="600ms">
 -->                        <table style="float: left; margin-right: 13px; height: 180px; width: 150px;" border="0">
                                <tr>
                                    <td height="100" width="150">
                                        <a href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma; ?>">
                                            <img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr>    
                                    <td valign="top">
                                        <div style="max-height: 40px; overflow: hidden;">
                                        <b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma; ?>"><?php echo $ten; ?></a> </b> </div>
                                        <p style="font-size: 13px; font-style: italic;"><?php echo $tenhuyen.'<i class="fa fa-angle-double-right fa-fw"></i>'.$tentinh; ?></p>   
                                    </td>
                                </tr>
                            </table>
                    <!-- </div> -->

                    <?php
                        }
                    ?>

                </div><!--/.services-->
            </div><!--/.row-->   
            <div class="row">
                 <center>
                    <div style="cursor: pointer; margin-bottom: 20px;">
                        <button id="btnthem" type="button" class="btn btn-danger"><i class="fa  fa-eye fa-fw"></i> <?php echo lang('view_more'); ?></button>
                    </div>
                    <div style="font-weight: bolder; padding-top: 10px;" class="grad1">
                        <?php echo lang('total') ?>: <input id="count" style="width: 40px; height: 40px; border-radius: 50%; text-align: center; border: ; font-weight: bolder; background-color: #d9534f; font-size: 15px; color: #fff;" value="<?= count($info); ?>" readonly="readonly" />
                    </div>
                    
                 </center> 
            </div>  
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
