<body class="homepage">

    <section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Một số địa điểm mới được cập nhật</h2>
            </div>

            <div class="row">
                
                <?php 
                    $T_MA = $this->session->userdata("T_MA"); // ma khu vuc lay tu session

                    foreach ($info as $iteam) {
                    $ma = $iteam['DD_MA'];
                    $ten = $iteam['DD_TEN'];
                    $mota = $iteam['DD_MOTA'];
                    $duyet = $iteam['DD_DUYET'];
                    $matinh = $iteam['T_MA'];
                    if($duyet == "1" && $matinh == $T_MA)
                    {
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
                    }
                ?>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
