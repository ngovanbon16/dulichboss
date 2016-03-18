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


                                document.getElementById("diadiem").innerHTML += '<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"><div style="float: left; height: 200px;"><table><tr><td><a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/'+hinh+'" rel="prettyPhoto"><img class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/'+hinh+'" alt=""></a></td></tr><tr><td><b style="text-transform: uppercase; font-size: 13px;"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser/'+ma+'">'+ten+'</a> </b><p style="font-size: 11px; font-style: italic;">'+tenhuyen+'<i class="fa fa-angle-double-right fa-fw"></i>'+tentinh+'</p></td></tr></table></div></div><!--/.col-md-4-->';
                            }
                            var tong = eval(data.data.length+"+"+$("#count").val());
                            $("#count").val(tong);
                            
                        }
                    }
                }, 'json');
            });
        });
    </script>

    <style type="text/css">
        .grad1 {
            padding: 5px;
            height: 50px;
            border-radius: 3px;
            margin-top: 5px;
            background: -webkit-linear-gradient(left, rgba(105,105,105,105), rgba(255,0,0,0)); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(right, rgba(105,105,105,105), rgba(255,0,0,0)); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(right, rgba(105,105,105,105), rgba(255,0,0,0)); /* For Firefox 3.6 to 15 */
            background: linear-gradient(to right, rgba(105,105,105,105), rgba(255,0,0,0)); /* Standard syntax (must be last) */
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
            /*or*/
            box-shadow: 0 0 4px rgba(0,0,0,4);
            -moz-box-shadow: 0 0 4px rgba(0,0,0,4);
            -webkit-box-shadow: 0 0 4px rgba(0,0,0,4);
            -o-box-shadow: 0 0 4px rgba(0,0,0,4);
        }

    </style>

</head>
<body class="homepage">

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
                                    <img src="<?php echo base_url(); ?>assets/images/logo0.png" class="img-responsive">
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
                                    <img src="<?php echo base_url(); ?>assets/images/logo0.png" class="img-responsive">
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
                                    <img src="<?php echo base_url(); ?>assets/images/logo0.png" class="img-responsive">
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

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Các huyện trong tỉnh</h2>
                <p class="lead">Các huyện trong tỉnh</p>
            </div>

            <div class="row">
                <div class="features">

                    <?php 
                        foreach ($huyentt as $iteam) {
                            $ma = $iteam['H_MA'];
                            $ten = $iteam['H_TEN'];
                    ?>

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div style="float: left; height: 150px;">
                            <b style="font-size: 16px; text-transform: capitalize;"><?php echo $ten; ?></b>
                            <img id="imghuyen" src="<?php echo base_url(); ?>assets/images/thiencamson.jpg" alt="" width="100%" height="100">
                            
                        </div>
                    </div><!--/.col-md-4-->

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
                <h2>Một số địa điểm nổi bậc</h2>
                <p class="lead">Một số địa điểm nổi bậc</p>
            </div>

            <div class="row">
                <div id="diadiem" class="features">

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
                            $hinh = "diadiem.jpg";
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

                    <div class="col-md-2" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <table>
                                <tr>
                                    <td width="150">
                                        <a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" rel="prettyPhoto">
                                            <img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr>    
                                    <td>
                                        <b style="text-transform: capitalize; font-size: 12px;"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $ma; ?>"><?php echo $ten; ?></a> </b>
                                        <p style="font-size: 12px; font-style: italic;"><?php echo $tenhuyen.'<i class="fa fa-angle-double-right fa-fw"></i>'.$tentinh; ?></p>   
                                    </td>
                                </tr>
                            </table>
                    </div><!--/.col-md-4-->

                    <?php
                            }
                        }
                    ?>

                </div><!--/.services-->
            </div><!--/.row-->   
            <div class="row">
                 <center>
                    <div class="grad1">
                        Tổng số các địa điểm <input id="count" style="width: 40px; height: 40px; border-radius: 50%; text-align: center; border: ; font-weight: bolder; background-color: #4F4F4F; font-size: 15px; color: #fff;" value="<?php echo $count ?>" readonly="readonly" />
                    </div>
                    <div style="cursor: pointer;" class="grad1" id="btnthem"><i class="fa  fa-eye fa-fw"></i> Xem thêm</div>

                    <!-- <div style="width: 100px; height: 5px; font-size: 10px;" class="progress-wrap">
                        <h3>Graphic Design</h3>
                        <div style="width: 100px; height: 5px;" class="progress">
                            <div style="height: 5px; width: 20%;" class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                <span style="" class="bar-width">KG: 2</span>
                            </div>
                        </div>
                    </div> -->
                 </center> 
            </div>  
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
