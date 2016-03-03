<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtooltip.js"></script>

    <link href="<?php echo base_url(); ?>assets/user/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/user/css/responsive.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/user/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/wow.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$(".btnbin").jqxTooltip({ content: '<b><?php echo lang("note") ?>:</b> <i><?php echo lang("click_to_delete") ?></i>', position: 'mouse', name: 'movieTooltip'});
			$(".btncheck").jqxTooltip({ content: '<b><?php echo lang("note") ?>:</b> <i><?php echo lang("click_to_accept_photos") ?></i>', position: 'mouse', name: 'movieTooltip'});
			$(".btnavatar").jqxTooltip({ content: '<b><?php echo lang("note") ?>:</b> <i><?php echo lang("click_to_change_avatar") ?></i>', position: 'mouse', name: 'movieTooltip'});
		});

		function duyetall(bien)
		{
			var url, dta;
	        url = "<?php echo base_url(); ?>index.php/diadiemhinh/loc";
	        dta = {
	          	"DD_MA" : '<?php echo $info['DD_MA'] ?>',
	        };
	        console.log(dta);
	        $.post(url, dta, function(data, status){

		        console.log(status);
		        console.log(data);
		        var count = 0;
		        for (var i = 0; i < data.data.length; i++) {
		        	var hama = data.data[i]['HA_MA'];
		        	var haduyet = data.data[i]['HA_DUYET'];
		        	if(haduyet != bien)
		        	{
		        		duyet(hama);
		        	}
		        } 

	        }, 'json');
		}

		function duyet(id)
		{
			var test = document.getElementById("check"+id).value;
			var tg = '0';
			var hinh = 'uncheck.png';
			if(test != '1')
			{
				tg = '1';
				hinh = 'check.png';
			}
			var url, dta;
	        url = "<?php echo base_url(); ?>index.php/diadiemhinh/duyet";
	        dta = {
	          "HA_MA" : id,
	          "HA_DUYET" : tg
	        };

	        $.post(url, dta, function(data, status){

		        console.log(status);
		        console.log(data);
		        document.getElementById(id).src = "<?php echo base_url(); ?>assets/images/"+hinh;
				document.getElementById("check"+id).value = tg;

	        }, 'json');
		}

		function daidien(id)
		{
			var url, dta;
	        url = "<?php echo base_url(); ?>index.php/diadiemhinh/daidien";
	        dta = {
	          	"DD_MA" : '<?php echo $info['DD_MA'] ?>',
	            "HA_MA" : id,
	            "HA_DAIDIEN" : '1'
	        };
	        console.log(dta);
	        $.post(url, dta, function(data, status){

		        console.log(status);
		        console.log(data);

		        document.getElementById('avatar'+id).src = "<?php echo base_url(); ?>assets/images/avatar.png";

		        for (var i = 0; i < data.data.length; i++) {
		        	var ma = data.data[i]['HA_MA'];
		        	var daidien = data.data[i]['HA_DAIDIEN'];
		        	if(daidien != '1')
		        	{
		        		document.getElementById('avatar'+ma).src = "<?php echo base_url(); ?>assets/images/unavatar.png";
		        	}
		        } 

	        }, 'json');
		}

		function xoa(ten)
		{
			if(!confirm("<?php echo lang('are_you_sure') ?>"))
			{
				return;
			}
          	var url, dta;
            url = "<?php echo base_url(); ?>index.php/diadiemhinh/xoa";
            dta = {
            	"DD_MA" : '<?php echo $info['DD_MA'] ?>',
              	"HA_TEN" : ten
            };
            console.log(dta);
            $.post(url, dta, function(data, status){

              console.log(status);
              console.log(data);
              document.getElementById(ten).style.display = "none";

              count = document.getElementById('count').innerHTML;
              document.getElementById('count').innerHTML = eval(count + " - 1");
              document.getElementById('total').innerHTML = data.data.length;

            }, 'json');
		}

		function kieu(bien)
		{
			var width = "120";
			var height = "130";
			var wtool = "20";
			var htool = "20";
			if(bien == '2')
			{
				var width = "220";
				var height = "200";
				var wtool = "30";
				var htool = "30";
			}
			if(bien == '3')
			{
				var width = "350";
				var height = "250";
				var wtool = "40";
				var htool = "40";
			}
			$(".span").css( "width", width);
			$(".span").css( "height", height);
			$(".div img").css( "width", wtool);
			$(".div img").css( "height", htool);
		}

		function loc(bien)
		{
			var url, dta;
	        url = "<?php echo base_url(); ?>index.php/diadiemhinh/loc";
	        dta = {
	          	"DD_MA" : '<?php echo $info['DD_MA'] ?>',
	        };
	        console.log(dta);
	        $.post(url, dta, function(data, status){

		        console.log(status);
		        console.log(data);
		        var count = 0;
		        for (var i = 0; i < data.data.length; i++) {
		        	var haten = data.data[i]['HA_TEN'];
		        	var haduyet = data.data[i]['HA_DUYET'];
		        	if(haduyet == bien || bien == '2')
		        	{
		        		count++;
		        		document.getElementById(haten).style.display = "block";
		        	}
		        	else
		        	{
		        		document.getElementById(haten).style.display = "none";
		        	}
		        } 
		        document.getElementById('count').innerHTML = count;

	        }, 'json');
		}

		function hinhbinhluan(id)
		{
			document.getElementById('hinhbinhluan').innerHTML = id;
		}
	</script>

	<style type="text/css">
	.span{
		float: left; 
		margin: 5px; 
		width: 220px; 
		height: 180px; 
		border: solid 1px #888;
		border-radius: 2px;
		box-shadow: 0 0 3px rgba(0,0,0,4);
		-moz-box-shadow: 0 0 3px rgba(0,0,0,4);
		-webkit-box-shadow: 0 0 3px rgba(0,0,0,4);
		-o-box-shadow: 0 0 3px rgba(0,0,0,4);
	}
	.div{ 
		margin: 3px; 
		background-color: #fff;
	}
	.div img{
		width: 30px;
		height: 30px;
		cursor: pointer;
	}
	.tool{
		background-color: #eee;
		border-radius: 2px;
		border: none;
		margin: 2px 2px -10px 2px;
		font-size: 18px;
		width: 45px;
		height: 28px;
		box-shadow: 0 0 2px rgba(0,0,0,4);
		-moz-box-shadow: 0 0 2px rgba(0,0,0,4);
		-webkit-box-shadow: 0 0 2px rgba(0,0,0,4);
		-o-box-shadow: 0 0 2px rgba(0,0,0,4);
	}
	.cot1 {
		text-align: left;
		font-weight: bold;
		width: 160px;
	}
	.cot2 {
		text-align: left;
		font-style: italic;
	}
	</style>

</head>
<body>
	<div>
		 <h3><?php echo $info['DD_TEN'] ?></h3>
	</div>
	<div style="width: 100%; height: 250px; border: solid 1px #000;">
		<div style="float: left; width: 28%; height: 250px;">
			<?php 
	            $madd = $info['DD_MA'];
	            $anhdaidien = "anhdaidien.jpg";
	            if($info1 != "") 
	            foreach ($info1 as $item) {  
	                $madd1 = $item['DD_MA'];
	                if($madd == $madd1)
	                {
	                    $dd = $item['HA_DAIDIEN'];
	                    if($dd == "1")
	                    {
	                        $anhdaidien = $item['HA_TEN'];
	                    }
	                }
	            }
	        ?>
	        <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" width='100%' height='100%'>
		</div>
		<div style="float: right; width: 70%; height: 250px; overflow: auto;">
			<table style="min-width: 278px; opacity: 1; color: #000;" class="tablenoidung" width="100%">
              <tr>
                <td class="cot1"><i class="fa fa-th-large fa-fw"></i> Thuộc dạng du lịch </td>
                <td class="cot2"><?php echo $tendanhmuc; ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-road fa-fw"></i> Nằm trên đường </td>
                <td class="cot2"><?php echo $info['DD_DIACHI']; ?> 
                    thuộc
                      <?php
                        if($tenxa != "")
                        {
                          echo " xã ".$tenxa; 
                        } 
                        
                      ?> huyện <?php echo $tenhuyen; ?> tỉnh <?php echo $tentinh; ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-phone fa-fw"></i> Số điện thoại </td>
                <td class="cot2"><?php 
                                                  $value = $info['DD_SDT'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-envelope-o fa-fw"></i> Địa chỉ Email </td>
                <td class="cot2"><?php 
                                                  $value = $info['DD_EMAIL'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-google-plus fa-fw"></i> Địa chỉ Website </td>
                <td class="cot2"><?php 
                                                  $value = $info['DD_WEBSITE'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-bookmark fa-fw"></i> Mô tả đôi nét </td>
                <td class="cot2"><?php 
                                                  $value = $info['DD_MOTA'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-info-circle fa-fw"></i> Giới thiệu chi tiết </td>
                <td class="cot2"><?php 
                                                  $value = $info['DD_GIOITHIEU'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-clock-o fa-fw"></i> Thời gian mở cửa </td>
                <td class="cot2"><?php echo $info['DD_BATDAU']; ?> - <?php echo $info['DD_KETTHUC']; ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-tag fa-fw"></i> Giá bán </td>
                <td class="cot2"><?php echo $info['DD_GIATU']; ?> - <?php echo $info['DD_GIADEN']; ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-book fa-fw"></i> Nội dung </td>
                <td class="cot2"><?php 
                                                  $value = $info['DD_NOIDUNG'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?></td>
              </tr>
              <tr>
                <td class="cot1"><i class="fa fa-photo fa-fw"></i> Hình ảnh </td>
                <td class="cot2">
                	<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo lang('photo') ?></button>
                </td>
              </tr>
            </table>
		</div>
	</div>
	<div style="padding: 10px; width: 100%; height: 500px; border: solid 1px #000;">
		<?php 
          	foreach ($binhluan as $iteam) {
	            $mabinhluan = $iteam['BL_MA'];
	            $tieude = $iteam['BL_TIEUDE'];
	            $noidung = $iteam['BL_NOIDUNG'];
	            $chatluong = $iteam['BL_CHATLUONG'];
	            $phucvu = $iteam['BL_PHUCVU'];
	            $khonggian = $iteam['BL_KHONGGIAN'];
	            $ngaydang = $iteam['BL_NGAYDANG'];

	            $hond = $iteam['ND_HO'];
	            $tennd = $iteam['ND_TEN'];
	            $hinhnd = $iteam['ND_HINH'];

	    ?>
	    		<div style="padding: 5px; float: left; width: 50%; height: 150px; border: solid 1px #000; overflow: auto;">
	    			<img style="border-radius: 50px;" src="<?php echo base_url(); ?>uploads/user/<?php echo $hinhnd ?>" width="30" height="30">

                  	<b style="font-size: 16px; text-transform: capitalize;"> <?php echo $hond." ".$tennd ?> </b> - <?php echo $ngaydang ?> <b>Đã bình luận</b> 
                  	<button id="btnbinhluan" class="btn1" data-toggle='modal' data-target='#modalbinhluan' onclick="hinhbinhluan('<?php echo $mabinhluan ?>')">Hình ảnh</button>
                  	<br/>
	    			<b style="font-size: 18px; text-transform: uppercase;"><i class="fa fa-comments-o fa-fw"></i> <?php echo $tieude ?></b>
	    			<p><?php echo $noidung ?></p>
	    		</div>
	    <?php
	      	}
        ?>
	</div>
	<div> <!-- modal hinh anh -->
		<!-- Large modal -->
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" style="width: 90%; height: 500px;">
		    <div class="modal-content">
		    	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title"><?php echo lang('photo').': '.$info['DD_TEN'] ?></h4>
			        <?php echo lang('view') ?>:
			        <button class="tool" onclick="kieu('1')"><i class="fa fa-th"></i></button>
			        <button class="tool" onclick="kieu('2')"><i class="fa fa-th-list"></i></button>
			        <button class="tool" onclick="kieu('3')"><i class="fa fa-th-large"></i></button>

			        <i class="fa fa-angle-double-right"></i> <?php echo lang('agree') ?>:
			        <button class="tool" onclick="duyetall('1')"><i class="fa fa-check"></i></button>
			        <button class="tool" onclick="duyetall('0')"><i class="fa fa-times"></i></button>

			        <i class="fa fa-angle-double-right"></i> <?php echo lang('filter') ?>:
			        <button class="tool" onclick="loc('0')"><i class="fa fa-square-o"></i></button>
			        <button class="tool" onclick="loc('1')"><i class="fa fa-check-square-o"></i></button>
			        <button class="tool" onclick="loc('2')"><i class="fa fa-qrcode"></i></button>
			        <b id="count"><?php echo count($info1); ?></b>
			        <i class="fa fa-send-o"></i>
			        <b id="total"><?php echo count($info1); ?></b>

			    </div>
		    	<div class="modal-body" style="width: 100%; height: 450px; overflow: auto;">
			        <?php
	                    $count = 0; 
	                    if($info1 != "") 
	                    foreach ($info1 as $item) 
	                    {  
	                    	$count++;
	                    	$hama = $item['HA_MA'];
	                    	$haten = $item['HA_TEN'];
	                    	$haduyet = $item['HA_DUYET'];
	                    	$hadaidien = $item['HA_DAIDIEN'];

	                    	if($haduyet == '1')
	                    	{
	                    		$duyet = "check.png";
	                    	}
	                    	else
	                    	{
	                    		$duyet = "uncheck.png";
	                    	}

	                    	if($hadaidien == '1')
	                    	{
	                    		$avatar = "avatar.png";
	                    	}
	                    	else
	                    	{
	                    		$avatar = "unavatar.png";
	                    	}

                    ?>
                    	<span class="span" id="<?php echo $haten ?>">

                    		<a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/<?php echo $haten; ?>" rel="prettyPhoto">
	                            <img class="img" data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $haten; ?>" width="100%" height="80%" />
	                        </a>

                    		<!-- <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $haten; ?>" width='100%' height='80%'> -->
                    		<div class="div">
                    			<img id="<?php echo $hama ?>" class="btncheck" src="<?php echo base_url(); ?>assets/images/<?php echo $duyet ?>" onclick="duyet('<?php echo $hama ?>')" />
                    			<input style="display: none;" id="check<?php echo $hama ?>" type="text" value="<?php echo $haduyet ?>" />

                    			<img id="avatar<?php echo $hama ?>" class="btnavatar" src="<?php echo base_url(); ?>assets/images/<?php echo $avatar ?>" onclick="daidien('<?php echo $hama ?>')" />

                    			<img class="btnbin" src="<?php echo base_url(); ?>assets/images/bin.png" onclick="xoa('<?php echo $haten ?>')" />
                    		</div>
                    		
                    	</span>
                    <?php
                    	}
                    ?>
			    </div>
		    </div>
		  </div>
		</div>
	</div> <!-- dong modal hinh anh -->

	<div> <!-- modal binh luan -->
		<!-- Modal -->
		<div id="modalbinhluan" class="modal fade" role="dialog" tabindex="-1">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><i class="fa fa-comments-o fa-fw"></i> <?php echo $info['DD_TEN']; ?></h4>
		      </div>
		      <div id="hinhbinhluan" class="modal-body">
		      	chao
		      </div>
		      <!-- <div class="modal-footer">
		      	<button type="button" id="btngui" class="btn btn-outline btn-success">Gửi</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		      </div> -->
		    </div>

		  </div>
		</div>
	</div> <!-- dong modal binh luan -->

</body>
</html>
