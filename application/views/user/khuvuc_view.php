<script type="text/javascript">
    function lochuyen(matinh, mahuyen)
    {
        setTimeout("location.href = '<?php echo base_url(); ?>index.php/home/theohuyen/"+matinh+"/"+mahuyen+"';",0);
    }
</script>
<style type="text/css">
    .grad1 {
        font-size: 20px;
        padding: 5px;
        height: 50px;
        border-radius: 3px;
        margin-top: 5px;
        margin-bottom: 10px;

        box-shadow: 0 4px 4px -4px rgba(0,0,0,4);
        -moz-box-shadow: 0 4px 4px -4px rgba(0,0,0,4);
        -webkit-box-shadow: 0 4px 4px -4px rgba(0,0,0,4);
        -o-box-shadow: 0 4px 4px -4px rgba(0,0,0,4);
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
<body class="homepage">

    <section id="recent-works">
        <div class="container">

            <div class="row">
                <div class="features">

                    <?php 
                        $matinh = $this->session->userdata("T_MA");
                        foreach ($huyen as $iteam) {
                            $mahuyen = $iteam['H_MA'];
                            $tenhuyen = $iteam['H_TEN'];
                    ?>
                    <i style="font-size: 20px; font-weight: bolder; color: #000;" class="fa fa-angle-double-right"></i>
                    <a href="">
                        <b onclick="lochuyen(<?php echo $matinh ?>, <?php echo $mahuyen ?>)" style="font-size: 16px; text-transform: capitalize; cursor: pointer;"><?php echo $tenhuyen; ?></b>
                    </a>
                    <?php
                        }
                    ?>

                </div><!--/.services-->
            </div><!--/.row-->    

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
                                
                    $j = 0;
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
                    { $j++; }
                    }

                    if($j > 0)
                    {
                        echo "<tr><td style='padding: 10px;'> <div class='grad1' >".$tenhuyen."</div>";

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

                <div class="col-md-2 col-sm-10 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div style="float: left; height: 120px;">
                
                        <table>
                            <tr>
                                <td>
                                    <a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" rel="prettyPhoto">
                                        <img class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" alt="">
                                    </a>
                                </td>
                            </tr>
                            <tr>    
                                <td align="left">
                                    <b style="text-transform: uppercase; font-size: 13px;"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser/<?php echo $ma; ?>"><?php echo $ten; ?></a> </b>
                                    <p style="font-size: 11px; font-style: italic;"><?php echo $tenhuyen.'<i class="fa fa-angle-double-right fa-fw"></i>'.$tentinh; ?></p>   
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                </div><!--/.col-md-4-->

                <?php
                            }
                        }
                    } 
                    echo "</td></tr>";
                }
                ?>
                    </table><!-- dong table -->
            </div>
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
