<script type="text/javascript">
    function loc(id, ten) {
        var url, dta;
        url="<?php echo base_url(); ?>index.php/home/getdanhmuc?t=" + Math.random();
        dta = {
            "ma" : id,
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
                    str += '<div style="height: 180px;" class="col-md-2" data-wow-duration="1000ms" data-wow-delay="600ms"><table style="height: 180px; width: 150px;" border="0"><tr><td height="100" width="150"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/'+DD_MA+'"><img style="width: 150px; height: 100px" class="imgdiadiem" src="<?php echo base_url(); ?>uploads/diadiem/'+HA_TEN+'" alt=""></a></td></tr><tr><td valign="top"><div style="max-height: 40px; overflow: hidden;"><b style="text-transform: capitalize; font-size: 13px;"><a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/'+DD_MA+'">'+DD_TEN+'</a> </b> </div><p style="font-size: 13px; font-style: italic;">'+H_TEN+'<i class="fa fa-angle-double-right fa-fw"></i>'+T_TEN+'</p></td></tr></table></div>';
                }
                document.getElementById('noidung').innerHTML = str;
                document.getElementById('tendanhmuc').innerHTML = ten+": "+data.length+" <?php echo lang('result'); ?>";
            }
        }, 'json');
    }
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
<body class="homepage" onload="loc('1', 'Du Lịch Sinh Thái')">

    <section style="margin-top: -60px;" id="recent-works">
        <div class="container">
            <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
            <?php 
                foreach ($danhmuc as $iteam) {
                    $ma = $iteam['DM_MA'];
                    $ten = $iteam['DM_TEN'];
            ?>
            <!-- <i style="font-size: 20px; font-weight: bolder; color: #000;" class="fa fa-angle-double-right"></i> -->
            
           <!--  <b class="tieude" onclick="loc('<?php echo $ma; ?>', '<?php echo $ten; ?>')" ><?php echo $ten; ?></b> -->

            <li style="margin-bottom: -30px;" class="active" onclick="loc('<?php echo $ma; ?>', '<?php echo $ten; ?>')"><a href="#"><?php echo $ten; ?></a></li>
          
            <?php
                }
            ?>
            </ul></div>
            
            <h2 id="tendanhmuc"></h2>
            <hr/>
            <div class="row">
                <div id="noidung" class="features">

                </div><!--/.services-->
            </div><!--/.row-->    

        </div><!--/.container-->
    </section><!--/#recent-works-->
   
</body>
