<script type="text/javascript">
    function lochuyen(matinh, mahuyen)
    {
        setTimeout("location.href = '<?php echo base_url(); ?>index.php/home/theohuyen/"+matinh+"/"+mahuyen+"';",0);
    }
</script>
<body class="homepage">

    <section id="recent-works">
        <div class="container">

            <div class="center wow fadeInDown">
                <h2>Các huyện thuộc tỉnh <?php echo $tentinh ?></h2>
                <?php
                    $matinh = $this->session->userdata("T_MA");
                    foreach ($huyen as $iteam) {
                        $mahuyen = $iteam['H_MA'];
                        $tenhuyen = $iteam['H_TEN'];
                ?>
                    <div onclick="lochuyen(<?php echo $matinh ?>, <?php echo $mahuyen ?>)" style="float: left; margin: 10px; padding-top: 10px; background-color: #3C3; width: 150px; height: 50px; font-size: 16px; font-style: italic; text-align: center; cursor: pointer;" > <?php echo $tenhuyen ?> </div>
                <?php
                    }
                ?>
            </div>
            <br/>
            <div id="noidung" class="center wow fadeInDown">
                <h2>Các địa điểm thuộc tỉnh <?php echo $tentinh ?></h2>
                 <a style="font-weight: bolder; font-size: 16px; font-style: inherit;" href="<?php echo base_url(); ?>index.php/home/khuvuc/<?php echo $this->session->userdata("T_MA"); ?>" >Xem tất cả</a>
                 <br/><br/>
                <?php 
                    $T_MA = $this->session->userdata("T_MA"); // ma khu vuc lay tu session
                    $H_MA = "";
                    if(isset($this->session->userdata["H_MA"]))
                    {
                        $H_MA = $this->session->userdata["H_MA"];
                    }
                    echo "<table width='100%'>"; //mo table
                    foreach ($huyen as $key) {
                        $mahuyen1 = $key['H_MA'];
                        $tenhuyen = $key['H_TEN'];
                        echo "<tr><td style='padding: 10px;'> <div style='text-align: left; font-size: 20px; font-style: italic; background-color: #3F6; height: 40px; padding: 10px;'>".$tenhuyen."</div>";        
                    foreach ($info as $iteam) {
                    $ma = $iteam['DD_MA'];
                    $ten = $iteam['DD_TEN'];
                    $mota = $iteam['DD_MOTA'];
                    $duyet = $iteam['DD_DUYET'];
                    $matinh = $iteam['T_MA'];
                    $mahuyen = $iteam['H_MA'];
                    $mahuyen2 = $iteam['H_MA'];
                    if($H_MA == "")
                    {
                        $mahuyen = "";
                    }
                    if($duyet == "1" && $matinh == $T_MA && $mahuyen == $H_MA && $mahuyen2 == $mahuyen1)
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
                    } echo "</td></tr>";
                }
                ?>
                    </table><!-- dong table -->
            </div>
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
