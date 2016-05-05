<!DOCTYPE html>
<html>
<head>
	<title></title>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        	$("#btnthem").click(function(){
                var url, dta;
                var ten = document.getElementById("ten").innerHTML;
                var start = document.getElementById("count").innerHTML;
                url="<?php echo base_url(); ?>index.php/user/getdatainfo?t=" + Math.random();
                dta = {
                    "ten" : ten,
                    "start" : start,
                    "length" : '8'
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
                            var DD_MOTA = data[i]['DD_MOTA'];
                            var T_TEN = data[i]['T_TEN'];
                            var H_TEN = data[i]['H_TEN'];
                            var HA_TEN = data[i]['HA_TEN'];
                            var DD_DIACHI = data[i]['DD_DIACHI'];
                            var DD_LUOTXEM = data[i]['DD_LUOTXEM'];
                            str += '<div style="margin: 0px; border: solid 2px #FFF; border-radius: 3px;" class="portfolio-item joomla bootstrap col-xs-12 col-sm-4 col-md-3"><a target="_blank" href="<?= base_url() ?>index.php/aediadiem/detailuser1/'+DD_MA+'"><div style="margin: 5px;" class="recent-work-inner"><b><input style="width: 100%; border: none; font-weight: bold; background-color: transparent;" type="text" value="'+DD_TEN+'"></b><p style="text-transform: capitalize; font-size: 13px; height: 15px; overflow: hidden; line-height: 1.2;">'+DD_DIACHI+' - '+H_TEN+' - '+T_TEN+'</p></div> <div class="recent-work-wrap"><img style="height: 120px;" class="img-responsive" src="<?= base_url() ?>uploads/diadiem/'+HA_TEN+'" alt=""></div> </a><div style="margin: 5px; font-size: 13px;" class="recent-work-inner"><i><i class="fa fa-eye"></i> '+DD_LUOTXEM+' <?= lang('views') ?></i> </div></div>';
                        }
                        document.getElementById('noidung').innerHTML += str;
                        document.getElementById('count').innerHTML = eval(start + "+" + data.length);

                        if(data.length == 0)
                        {
                            $("#btnthem").hide();
                        }
                        else
                        {
                            $("#btnthem").show();
                        }
                    }
                }, 'json');
            });

            $("#btnthembv").click(function(){
                var url, dta;
                var start = document.getElementById("count").innerHTML;
                url="<?php echo base_url(); ?>index.php/user/getdatainfobaiviet?t=" + Math.random();
                dta = {
                    "start" : start,
                    "length" : '5'
                };
                console.log(dta);
                $.post(url, dta, function(data, status){

                    console.log(status);
                    console.log(data);
                    if(status == "success")
                    {   
                        var str = "";
                        for (var i = 0; i < data.length; i++) {
                            var BV_MA = data[i]['BV_MA'];
                            var BV_TIEUDE = data[i]['BV_TIEUDE'];
                            var BV_NOIDUNG = data[i]['BV_NOIDUNG'];
                            var BV_NGAYDANG = data[i]['BV_NGAYDANG'];
                            var BV_LUOTXEM = data[i]['BV_LUOTXEM'];
                            str += '<a target="_blank" href="<?= base_url() ?>index.php/baiviet/detail/'+BV_MA+'"><b style="font-size: 16px;">'+BV_TIEUDE+'</b><br/><i style="color: #000;"><?= lang("share") ?>: '+BV_NGAYDANG+' - <?= lang("views") ?>: '+BV_LUOTXEM+'</i><hr/></a>';
                        }
                        document.getElementById('noidung').innerHTML += str;
                        document.getElementById('count').innerHTML = eval(start + "+" + data.length);

                        if(data.length == 0)
                        {
                            $("#btnthembv").hide();
                        }
                        else
                        {
                            $("#btnthembv").show();
                        }
                    }
                }, 'json');
            });
        });

        function changeten(ten)
        {
            var tenhien = "";
            document.getElementById("daden").style.color = "#000";
            document.getElementById("yeuthich").style.color = "#000";
            document.getElementById("muonden").style.color = "#000";
            document.getElementById("baiviet").style.color = "#000";
            document.getElementById("diadiem").style.color = "#000";

            if(ten == "daden")
            {
                tenhien = "<?= lang('places_you_have_checkined') ?>";
                document.getElementById("daden").style.color = "#F00";
            }
            if(ten == "yeuthich")
            {
                tenhien = "<?= lang('your_favorite_places') ?>";
                document.getElementById("yeuthich").style.color = "#F00";
            }
            if(ten == "muonden")
            {
                tenhien = "<?= lang('places_you_want_to_visit') ?>";
                document.getElementById("muonden").style.color = "#F00";
            }
            if(ten == "baiviet")
            {
                tenhien = "<?= lang('the_articles_you_posted') ?>";
                document.getElementById("baiviet").style.color = "#F00";
            }
            if(ten == "diadiem")
            {
                tenhien = "<?= lang('your_places') ?>";
                document.getElementById("diadiem").style.color = "#F00";
            }

            document.getElementById("tenhien").innerHTML = tenhien;
        }
        function xem(ten, start, length) {
            $("#btnthembv").hide();
            changeten(ten);
            var url, dta;
            url="<?php echo base_url(); ?>index.php/user/getdatainfo?t=" + Math.random();
            dta = {
                "ten" : ten,
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
                    if(data.length < 1)
                    {
                        str = "<i>0 <?php echo lang('result'); ?></i>";
                    }
                    for (var i = 0; i < data.length; i++) {
                        var DD_MA = data[i]['DD_MA'];
                        var DD_TEN = data[i]['DD_TEN'];
                        var DD_MOTA = data[i]['DD_MOTA'];
                        var T_TEN = data[i]['T_TEN'];
                        var H_TEN = data[i]['H_TEN'];
                        var HA_TEN = data[i]['HA_TEN'];
                        var DD_DIACHI = data[i]['DD_DIACHI'];
                        var DD_LUOTXEM = data[i]['DD_LUOTXEM'];
                        str += '<div style="margin: 0px; border: solid 2px #FFF; border-radius: 3px;" class="portfolio-item joomla bootstrap col-xs-12 col-sm-4 col-md-3"><a target="_blank" href="<?= base_url() ?>index.php/aediadiem/detailuser1/'+DD_MA+'"><div style="margin: 5px;" class="recent-work-inner"><b><input style="width: 100%; border: none; font-weight: bold; background-color: transparent;" type="text" value="'+DD_TEN+'"></b><p style="text-transform: capitalize; font-size: 13px; height: 15px; overflow: hidden; line-height: 1.2;">'+DD_DIACHI+' - '+H_TEN+' - '+T_TEN+'</p></div> <div class="recent-work-wrap"><img style="height: 120px;" class="img-responsive" src="<?= base_url() ?>uploads/diadiem/'+HA_TEN+'" alt=""></div> </a><div style="margin: 5px; font-size: 13px;" class="recent-work-inner"><i><i class="fa fa-eye"></i> '+DD_LUOTXEM+' <?= lang('views') ?></i> </div></div>';
                    }
                    document.getElementById('noidung').innerHTML = str;
                    document.getElementById('ten').innerHTML = ten;
                    document.getElementById('count').innerHTML = data.length;

                    if(data.length == 0)
                    {
                        $("#btnthem").hide();
                    }
                    else
                    {
                        $("#btnthem").show();
                    }
                }
            }, 'json');
        }

        function xembaiviet() {
            $("#btnthem").hide();
            changeten('baiviet');
            var url, dta;
            var start = '0';
            var length = '5';
            url="<?php echo base_url(); ?>index.php/user/getdatainfobaiviet?t=" + Math.random();
            dta = {
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
                    if(data.length < 1)
                    {
                        str = "<i>0 <?php echo lang('result'); ?></i>";
                    }
                    for (var i = 0; i < data.length; i++) {
                        var BV_MA = data[i]['BV_MA'];
                        var BV_TIEUDE = data[i]['BV_TIEUDE'];
                        var BV_NOIDUNG = data[i]['BV_NOIDUNG'];
                        var BV_NGAYDANG = data[i]['BV_NGAYDANG'];
                        var BV_LUOTXEM = data[i]['BV_LUOTXEM'];
                        str += '<a target="_blank" href="<?= base_url() ?>index.php/baiviet/detail/'+BV_MA+'"><b style="font-size: 16px;">'+BV_TIEUDE+'</b><br/><i style="color: #000;"><?= lang("share") ?>: '+BV_NGAYDANG+' - <?= lang("views") ?>: '+BV_LUOTXEM+'</i><hr/></a>';
                    }
                    document.getElementById('noidung').innerHTML = str;
                    document.getElementById('count').innerHTML = data.length;

                    if(data.length < 5)
                    {
                        $("#btnthembv").hide();
                    }
                    else
                    {
                        $("#btnthembv").show();
                    }
                }
            }, 'json');
        }
    </script>
    <style type="text/css">
        table{
            width: 100%;
        }
        .avatar{
            width: 100%;
            border-radius: 50%;
            border: solid 1px #FFF;
            max-width: 150px;
        }
        hr{
            margin: 5px;
        }
        h1{
            color: #000;
        }
        h2{
            color: #000;
        }
        .li{
            cursor: pointer;
        }
        .img{
            width: 150px;
            height: 100px;
            border-radius: 2px;
        }
        .menuleft{
            width: 100%;
        }
    </style>
</head>
<body>
     <section style="background-color: #F8F8FF;" class="service-item">
       <div class="container">
            <table style="border: solid 2px #F8F8FF; width: 100%;" border="0">
                <tr>
                    <td valign="top" style="padding: 10px; background-color: #FFF; border-radius: 5px 0px 0px 5px;" align="center" width="30%">
                        <?php
                            $ten = $info["ND_HINH"];
                            $file_path = "uploads/user/".$ten;

                            if(file_exists($file_path))
                            {
                                ?>
                                    <img class="avatar" id="avata" src="<?php echo base_url(); ?>uploads/user/<?php echo $this->session->userdata['avata']; ?>" >
                                <?php
                            }
                            else
                            {
                                ?>
                                <i class="fa fa-user fa-fw"></i>
                                <?php
                            }
                        ?>
                        <h2>
                            <b style="color: #000;"> <?php echo $info['ND_HO'].' '.$info['ND_TEN'] ?>  </b>
                            <a href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $info['ND_MA'] ?>">
                                <i class="fa fa-edit fa-fw"></i>
                            </a>
                            <hr/>
                        </h2>

                        <ul class="blog_archieve" style="border-radius: 3px; background-color: #FFF; border: solid 1px #F8F8FF; padding: 10px 10px 10px 10px;">
                            <li id="daden" style="color: #F00;" class="li" onclick="xem('daden', '0', '8')">
                                  <table class="menuleft">
                                      <tr>
                                          <td width="90%">
                                              <i class="fa fa-check-square-o fa-fw"></i> <?php echo lang('check_in') ?>
                                          </td>
                                          <td align="right">
                                              <label> <?= count($daden) ?></label>
                                          </td>
                                      </tr>
                                  </table>
                            </li>
                            <li id="yeuthich" class="li" onclick="xem('yeuthich', '0', '8')">
                                  <table class="menuleft">
                                      <tr>
                                          <td width="90%">
                                             <i class="fa fa-heart fa-fw"></i> <?= lang('love') ?>
                                          </td>
                                          <td align="right">
                                              <label> <?= count($yeuthich) ?></label>
                                          </td>
                                      </tr>
                                  </table>
                            </li>
                            <li id="muonden" class="li" onclick="xem('muonden', '0', '8')">
                                  <table class="menuleft">
                                      <tr>
                                          <td width="90%">
                                             <i class="fa fa-star fa-fw"></i> <?= lang('custom') ?>
                                          </td>
                                          <td align="right">
                                              <label> <?= count($muonden) ?></label>
                                          </td>
                                      </tr>
                                  </table>
                            </li>
                            <li id="baiviet" class="li" onclick="xembaiviet()">
                                  <table class="menuleft">
                                      <tr>
                                          <td width="90%">
                                             <i class="fa fa-pencil fa-fw"></i> <?= lang('posts') ?>
                                          </td>
                                          <td align="right">
                                              <label> <?= count($baiviet) ?></label>
                                          </td>
                                      </tr>
                                  </table>
                            </li>
                            <li id="diadiem" class="li" onclick="xem('diadiem', '0', '8')">
                                  <table class="menuleft">
                                      <tr>
                                          <td width="90%">
                                             <i class="fa fa-globe fa-fw"></i> <?= lang('place') ?>
                                          </td>
                                          <td align="right">
                                              <label> <?= count($diadiem) ?></label>
                                          </td>
                                      </tr>
                                  </table>
                            </li>
                        </ul>

                    </td>
                    <td style="padding: 10px; background-color: #FFF; border-radius: 0px 5px 5px 0px;" valign="top">
                        <h4 id="ten" style="display: none;">daden</h4>
                        <h1 id="tenhien"><?= lang('places_you_have_checkined') ?></h1>
                        <div id="noidung" style="max-height: 500px; overflow: auto;">
                        <?php 
                            foreach ($daden as $row) {
                            ?>
                            <!-- <a target="_blank" href="<?= base_url() ?>index.php/aediadiem/detailuser1/<?= $row['DD_MA'] ?>">
                                <table style="width: 100%;">
                                    <tr>
                                        <td width="100">
                                            <img class="img" src="<?= base_url() ?>uploads/diadiem/<?= $row['HA_TEN'] ?>">
                                        </td>
                                        <td style="padding: 0px 5px 0px 5px;" valign="top" align="left">
                                            <b style="font-size: 16px;"><?= $row['DD_TEN'] ?></b><br/>
                                            <i><?= $row['H_TEN'] ?> - <?= $row['T_TEN'] ?></i>
                                            <div style="text-align: justify; line-height: 1.5; font-size: 13px; max-height: 100px; overflow: hidden; color: #000;"><?= $row['DD_MOTA'] ?></div>
                                        </td>
                                    </tr>
                                </table>
                                <hr/>
                            </a> -->
                            <div style="margin: 0px; border: solid 2px #FFF; border-radius: 3px;" class="portfolio-item joomla bootstrap col-xs-12 col-sm-4 col-md-3">
                                <a target="_blank" href="<?= base_url() ?>index.php/aediadiem/detailuser1/<?= $row['DD_MA'] ?>">
                                <div style="margin: 5px;" class="recent-work-inner">
                                    <b><input style="width: 100%; border: none; font-weight: bold; background-color: transparent;" type="text" value="<?= $row['DD_TEN'] ?>"></b>
                                    <p style="text-transform: capitalize; font-size: 13px; height: 15px; overflow: hidden; line-height: 1.2;"><?= $row['DD_DIACHI'] ?> - <?= $row['H_TEN'] ?> - <?= $row['T_TEN'] ?></p>
                                </div> 
                                <div class="recent-work-wrap">
                                    <img style="height: 120px;" class="img-responsive" src="<?= base_url() ?>uploads/diadiem/<?= $row['HA_TEN'] ?>" alt="">                        
                                </div>  
                                </a>
                                <div style="margin: 5px; font-size: 13px;" class="recent-work-inner">
                                    <i><i class="fa fa-eye"></i> <?= $row['DD_LUOTXEM'] ?> <?= lang('views') ?></i> 
                                </div>        
                            </div>
                            <?php
                            }
                        ?>
                        </div>
                        <center>
                        <button style="width: 200px; background-color: #049ec5; margin-top: 10px;" id="btnthem" type="button" class="btn btn-info"><i class="fa  fa-eye fa-fw"></i> <?= lang('view_more'); ?></button>
                        <button style="width: 200px; background-color: #049ec5; margin-top: 10px; display: none;" id="btnthembv" type="button" class="btn btn-info"><i class="fa  fa-eye fa-fw"></i> <?= lang('view_more'); ?></button>
                        <br/>
                        <div style="margin-top: 10px;">
                            <?= lang('total'); ?>: <b id="count"><?php if(count($daden) > 5) { echo '5'; } else { echo count($daden); } ?></b>
                        </div> 
                        </center>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</body>
</html>