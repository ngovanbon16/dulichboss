<script type="text/javascript">
    function lochuyen(matinh, mahuyen)
    {
        setTimeout("location.href = '<?php echo base_url(); ?>home/theohuyen/"+matinh+"/"+mahuyen+"';",0);
    }

    function themdiadiem(idhuyen)
    {
        var start = $("#"+idhuyen).html();
        var length = 7;
        var url, dta;
        url="<?php echo base_url(); ?>home/gethuyen?t=" + Math.random();
        dta = {
            "ma" : idhuyen,
            "start" : start,
            "length" : length
        };
        console.log(dta);
        $.post(url, dta, function(data, status){

            console.log(status);
            console.log(data);
            if(status == "success")
            {   
                var str = "";
                for (var i = 0; i < data.length; i++) {
                    var DD_MA = data[i]['DD_MA'];
                    var DD_TEN = data[i]['DD_TEN'];
                    var T_TEN = data[i]['T_TEN'];
                    var H_TEN = data[i]['H_TEN'];
                    var HA_TEN = data[i]['HA_TEN'];
                    str += '<table style="float: left; margin-right: 13px; height: 180px; width: 135px;" border="0"><tr><td height="100" width="135"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/'+DD_MA+'"><img style="width: 135px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/'+HA_TEN+'" alt=""></a></td></tr><tr><td valign="top"><div style="max-height: 40px; overflow: hidden;"><b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/'+DD_MA+'">'+DD_TEN+'</a> </b> </div><p style="font-size: 13px; font-style: italic;">'+H_TEN+'<i class="fa fa-angle-double-right fa-fw"></i>'+T_TEN+'</p></td></tr></table>';
                }
                document.getElementById('noidung'+idhuyen).innerHTML += str;

                if(data.length == 0)
                {
                    $("#btn"+idhuyen).hide();
                }
                else
                {
                    document.getElementById(idhuyen).innerHTML = eval(start + "+" + data.length);
                }
            }
        }, 'json');
    }
</script>
<style type="text/css">
    .grad1 {
        font-weight: bold;
        text-align: left;
        font-size: 20px;
        padding: 5px;
        height: 30px;
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

    <section style="margin-top: -50px;" id="recent-works">
        <div class="container">

            <div class="row">
                <div style="font-size: 16px; font-weight: bold; margin: 0px 30px 0px 30px;" class="features">

                    <!-- <ul class="nav navbar-nav">
                        <li style="margin-bottom: -30px; font-weight: bolder; font-size: 16px;" class="active">
                             <a href="<?php echo base_url(); ?>home/khuvuc/<?php echo $this->session->userdata("T_MA"); ?>" ><?php echo lang('view').' '.lang('all'); ?></a>
                        </li>
                        <?php 
                            $matinh = $this->session->userdata("T_MA");
                            foreach ($huyen as $iteam) {
                                $mahuyen = $iteam['H_MA'];
                                $tenhuyen = $iteam['H_TEN'];
                        ?>
                            <li style="margin-bottom: -30px; font-weight: bolder; font-size: 16px;" class="active" onclick="lochuyen(<?php echo $matinh ?>, <?php echo $mahuyen ?>)">
                                <a href="#"><?php echo $tenhuyen; ?></a>
                            </li>
                      
                        <?php
                            }
                        ?>
                    </ul> -->

                    <a href="<?php echo base_url(); ?>home/khuvuc/<?php echo $this->session->userdata("T_MA"); ?>" ><?php echo lang('view').' '.lang('all'); ?></a> | 
                    <?php 
                        $matinh = $this->session->userdata("T_MA");
                        foreach ($huyen as $iteam) {
                            $mahuyen = $iteam['H_MA'];
                            $tenhuyen = $iteam['H_TEN'];
                    ?>
                        <a href="#" onclick="lochuyen(<?php echo $matinh ?>, <?php echo $mahuyen ?>)"><?php echo $tenhuyen; ?></a> | 
                    <?php
                        }
                    ?>
                   

                </div><!--/.services-->
            </div><!--/.row-->    

            <br/>
            <div id="noidung" class="center wow fadeInDown">
                <h2>Các địa điểm thuộc tỉnh <?php echo $tentinh ?></h2>
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
                        echo "<tr><td style='padding: 10px;'> <div class='grad1' ><a href='#' onclick='lochuyen(\"".$matinh."\", \"".$mahuyen1."\")' >".$tenhuyen."</a></div><div id='noidung".$mahuyen1."'>";
                        $k = 0;
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
                            if($k > 6)
                            {
                                break;
                            }
                            $k++;

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

                        <table style="float: left; margin-right: 13px; height: 180px; width: 135px;" border="0">
                            <tr>
                                <td height="100" width="150">
                                    <a href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma; ?>">
                                        <img style="width: 135px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" alt="">
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

                <?php
                            }
                        }
                ?>
                    </div>
                </td></tr>
                <tr><td>
                    <center>
                        <div style="cursor: pointer; margin: 10px; margin-top: -20px;">
                            <button id="btn<?php echo $mahuyen1; ?>" type="button" class="btn btn-danger" onclick="themdiadiem(<?php echo $mahuyen1; ?>)"><i class="fa  fa-eye fa-fw"></i> <?php echo lang('view_more'); ?></button>
                        </div>
                        <?php echo lang('total'); ?>: <b id="<?php echo $mahuyen1; ?>"><?php echo $k; ?></b>
                    </center>

                <?php
                    }
                ?> 
                   </td></tr>
                <?php
                }
                ?>
                    </table><!-- dong table -->
            </div>
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
