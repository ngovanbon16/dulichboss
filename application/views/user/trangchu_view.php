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


                                document.getElementById("diadiem").innerHTML += '<div class="col-xs-12 col-sm-4 col-md-3"><div class="recent-work-wrap"><img src="<?php echo base_url(); ?>uploads/diadiem/'+hinh+'" alt="" height="200"><div class="overlay"><div class="recent-work-inner"><h3 style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser/'+ma+'">'+ten+'</a> </h3><p>'+tenhuyen+' <i class="fa fa-angle-double-right fa-fw"></i> '+tentinh+'</p><a class="preview" target="_blank" href="<?php echo base_url(); ?>uploads/diadiem/'+hinh+'" rel="prettyPhoto"><i class="fa fa-eye"></i> Xem</a></div></div></div></div>';
                            }
                            var tong = eval(data.data.length+"+"+$("#count").val());
                            $("#count").val(tong);
                            
                        }
                    }
                }, 'json');
            });
        });
    </script>
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

    <section id="recent-works">
        <div class="container">
            <div id="diadiem1" class="row">
                <h2 style="background-color: #F66; height: 50px; font-weight: bolder; padding: 12px; font-style: italic; font-size: 22px;">Một số địa điểm mới được cập nhật</h2>
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

                <div style="margin: 10px; width: 210px;" class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" alt="" height="100">
                        </a>
                        <b style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser/<?php echo $ma; ?>"><?php echo $ten; ?></a> </b>
                        <p><?php echo $tenhuyen.'<i class="fa fa-angle-double-right fa-fw"></i>'.$tentinh; ?></p>
                    </div>
                </div> 

                <?php
                        }
                    }
                ?>
                <div id="diadiem"></div>
            </div><!--/.row-->
            <div class="row">
                 <center>
                    <div style="border: 1px #00F; background-color: #F66; font-weight: bolder; font-size: 18px; padding: 5px; margin-top: 10px; ">
                        Tổng số các địa điểm <input id="count" style="width: 40px; height: 40px; border-radius: 50%; text-align: center; border: ; font-weight: bolder; background-color: #F66; font-size: 15px; " value="<?php echo $count ?>" readonly="readonly"></input>
                    </div>
                    <div style="border: 1px #00F; background-color: #F66; font-weight: bolder; font-size: 18px; padding: 10px; margin-top: 10px; cursor: pointer; " id="btnthem"><i class="fa  fa-eye fa-fw"></i> Xem thêm</div>
                 </center> 
            </div>
            
            
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
