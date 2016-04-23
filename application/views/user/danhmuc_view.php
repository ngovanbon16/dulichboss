<script type="text/javascript">
    function loc(id, ten, start, length) {
        var url, dta;
        url="<?php echo base_url(); ?>home/getdanhmuc?t=" + Math.random();
        dta = {
            "ma" : id,
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
                    str = "<i style='margin-left: 15px;'>0 <?php echo lang('result'); ?></i>";
                }
                for (var i = 0; i < data.length; i++) {
                    var DD_MA = data[i]['DD_MA'];
                    var DD_TEN = data[i]['DD_TEN'];
                    var T_TEN = data[i]['T_TEN'];
                    var H_TEN = data[i]['H_TEN'];
                    var HA_TEN = data[i]['HA_TEN'];
                    str += '<table style="float: left; margin-right: 13px; height: 180px; width: 150px;" border="0"><tr><td height="100" width="150"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/'+DD_MA+'"><img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/'+HA_TEN+'" alt=""></a></td></tr><tr><td valign="top"><div style="max-height: 40px; overflow: hidden;"><b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/'+DD_MA+'">'+DD_TEN+'</a> </b> </div><p style="font-size: 13px; font-style: italic;">'+H_TEN+'<i class="fa fa-angle-double-right fa-fw"></i>'+T_TEN+'</p></td></tr></table>';
                }
                document.getElementById('noidung').innerHTML = str;
                document.getElementById('tendanhmuc').innerHTML = ten;
                document.getElementById('count').innerHTML = data.length;

                $("#ma").html(id);
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

    $(document).ready(function(){
        $("#btnthem").click(function(){
            var id = $("#ma").html();
            var start = $("#count").html();
            var length = 7;
            var url, dta;
            url="<?php echo base_url(); ?>home/getdanhmuc?t=" + Math.random();
            dta = {
                "ma" : id,
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
                        str += '<table style="float: left; margin-right: 13px; height: 180px; width: 150px;" border="0"><tr><td height="100" width="150"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/'+DD_MA+'"><img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/'+HA_TEN+'" alt=""></a></td></tr><tr><td valign="top"><div style="max-height: 40px; overflow: hidden;"><b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>aediadiem/detailuser1/'+DD_MA+'">'+DD_TEN+'</a> </b> </div><p style="font-size: 13px; font-style: italic;">'+H_TEN+'<i class="fa fa-angle-double-right fa-fw"></i>'+T_TEN+'</p></td></tr></table>';
                    }
                    document.getElementById('noidung').innerHTML += str;

                    if(data.length == 0)
                    {
                        $("#btnthem").hide();
                    }
                    else
                    {
                        document.getElementById('count').innerHTML = eval(start + "+" + data.length);
                    }
                }
            }, 'json');
        });
    });
</script>
<style type="text/css">
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
    .tieude{
        font-size: 16px;
        text-transform: capitalize; 
        cursor: pointer;
        margin-right: 10px;
        font-style: italic;
    }
    .tieude:hover{
        color: #F00;
    }
</style>
<body class="homepage" onload="loc('1', 'Du Lịch Sinh Thái', 0, 7)">

    <section style="margin-top: -50px;" id="recent-works">
        <div class="container">
            <div style="font-size: 16px; font-weight: bold;" class="features">
                <!-- <ul class="nav navbar-nav">
                    <?php 
                        foreach ($danhmuc as $iteam) {
                            $ma = $iteam['DM_MA'];
                            $ten = $iteam['DM_TEN'];
                    ?>
                        <li style="margin-bottom: -30px; font-weight: bolder; font-size: 16px;" class="active" onclick="loc('<?php echo $ma; ?>', '<?php echo $ten; ?>', 0, 6)">
                            <a href="#"><?php echo $ten; ?></a>
                        </li>
                  
                    <?php
                        }
                    ?>
                </ul> -->
                <?php 
                    foreach ($danhmuc as $iteam) {
                        $ma = $iteam['DM_MA'];
                        $ten = $iteam['DM_TEN'];
                ?>
                    <a href="#" onclick="loc('<?php echo $ma; ?>', '<?php echo $ten; ?>', 0, 7)"><?php echo $ten; ?></a> | 
                <?php
                    }
                ?>
            </div>
            
            <h2> <b id="tendanhmuc"></b>: <b id="count">0</b> <?php echo lang('result'); ?> </h2>
            <b id="ma" style="display: none;"></b>
            <hr/>
            <div class="row">
                <div style="margin-left: 15px;" id="noidung" class="features">

                </div><!--/.services-->
            </div><!--/.row-->    
            <center>
                <div style="cursor: pointer; margin: 10px;">
                    <button id="btnthem" type="button" class="btn btn-danger"><i class="fa  fa-eye fa-fw"></i> <?php echo lang('view_more'); ?></button>
                </div>
            </center>
        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
