<script type="text/javascript">
    function lochuyen(matinh, mahuyen)
    {
        setTimeout("location.href = '<?php echo base_url(); ?>index.php/home/theohuyen/"+matinh+"/"+mahuyen+"';",0);
    }
</script>
<style type="text/css">
    .grad1 {
        padding: 5px;
        height: 50px;
        border-radius: 3px;
        margin-top: 5px;
        margin-bottom: 10px;
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

                    <div onclick="lochuyen(<?php echo $matinh ?>, <?php echo $mahuyen ?>)" class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div style="float: left; height: 150px;">
                            <b style="font-size: 16px; text-transform: capitalize;"><?php echo $tenhuyen; ?></b>
                            <img id="imghuyen" src="<?php echo base_url(); ?>assets/images/thiencamson.jpg" alt="" width="100%" height="100">
                            
                        </div>
                    </div><!--/.col-md-4-->

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

                <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div style="float: left; height: 200px;">
                
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
                    } echo "</td></tr>";
                }
                ?>
                    </table><!-- dong table -->
            </div>
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
