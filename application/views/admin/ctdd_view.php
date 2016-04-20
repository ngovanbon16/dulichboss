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

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxfileupload.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$.jqx.theme = "bootstrap";
			$(".browse").jqxButton({ template: "success" });
			$(".cancel").jqxButton({ template: "danger" });
			$(".tool").jqxButton({ template: "" });
			$(".tool1").jqxButton({ template: "info" });
			$(".tool2").jqxButton({ template: "info" });
			$(".tool3").jqxButton({ template: "info" });
			$(".delete").jqxButton({ template: "danger" });
			$(".btnhinhanh").jqxButton({ template: "" });

			$(".btnbin").jqxTooltip({ content: '<b><?php echo lang("note") ?>:</b> <i><?php echo lang("click_to_delete") ?></i>', position: 'mouse', name: 'movieTooltip'});
			$(".btncheck").jqxTooltip({ content: '<b><?php echo lang("note") ?>:</b> <i><?php echo lang("click_to_accept_photos") ?></i>', position: 'mouse', name: 'movieTooltip'});
			$(".btnavatar").jqxTooltip({ content: '<b><?php echo lang("note") ?>:</b> <i><?php echo lang("click_to_change_avatar") ?></i>', position: 'mouse', name: 'movieTooltip'});

			$("#checkAll").change(function () {
			    $(".binhluanchk").prop('checked', $(this).prop("checked"));
			});

			$("#checkAllha").change(function () {
			    $(".hinhanhchk").prop('checked', $(this).prop("checked"));
			});

			$("#checkAllabl").change(function () {
			    $(".anhbinhluanchk").prop('checked', $(this).prop("checked"));
			});

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
				if(tg == '1')
				{
					thongbao("", "<?php echo lang('photo_approved') ?>", "success");
				}
				else
				{
					thongbao("", "<?php echo lang('cancelled_accept_photos') ?>", "danger");
				}

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
		        thongbao("", "<?php echo lang('updates_successfully_avatar') ?>", "success");

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

		function xoahinhanhmain(ten)
		{
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
              thongbao("", "<?php echo lang('deleted_successfully') ?>", "success");

            }, 'json');
		}

		function xoahinhanh(ten)
		{
			if(!confirm("<?php echo lang('are_you_sure') ?>"))
			{
				return;
			}
      		xoahinhanhmain(ten);
		}

		function xoahinhanhchk()
        {
        	if(!confirm("<?php echo lang('are_you_sure') ?>"))
			{
				return;
			}
        	var chk = document.getElementsByName("hinhanhchk");
        	var chuoi = "";
        	for (var i = 0; i < chk.length; i++) {
        		if(chk[i].checked)
        		{
        			xoahinhanhmain(chk[i].value);
        		}
        	}
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
			//$(".div img").css( "width", wtool);
			//$(".div img").css( "height", htool);
		}

		function xembinhluan(bien)
		{
			var width = "200";
			var height = "140";
			if(bien == '2')
			{
				var width = "100%";
				var height = "60";
			}
			if(bien == '3')
			{
				var width = "48%";
				var height = "120";
			}
			$(".divbinhluan").css( "width", width);
			$(".divbinhluan").css( "height", height);
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
		        var chuoi = "";
		        for (var i = 0; i < data.data.length; i++) {
		        	var hama = data.data[i]['HA_MA'];
		        	var haten = data.data[i]['HA_TEN'];
		        	var haduyet = data.data[i]['HA_DUYET'];
		        	var hadaidien = data.data[i]['HA_DAIDIEN'];
		        	var duyet = "";
		        	var avatar = "";
		        	if(haduyet == '1')
                	{
                		duyet = "check.png";
                	}
                	else
                	{
                		duyet = "uncheck.png";
                	}

                	if(hadaidien == '1')
                	{
                		avatar = "avatar.png";
                	}
                	else
                	{
                		avatar = "unavatar.png";
                	}

		        	if(haduyet == bien || bien == '2')
		        	{
		        		chuoi += '<span class="span" id="'+haten+'"><a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/'+haten+'" rel="prettyPhoto"><img class="img" data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/'+haten+'" width="100%" height="80%" /></a><div class="div"><img id="'+hama+'" class="btncheck" src="<?php echo base_url(); ?>assets/images/'+duyet+'" onclick="duyet('+hama+')" /><input style="display: none;" id="check'+hama+'" type="text" value="'+haduyet+'" /><img id="avatar'+hama+'" class="btnavatar" src="<?php echo base_url(); ?>assets/images/'+avatar+'" onclick="daidien('+hama+')" /><img class="btnbin" src="<?php echo base_url(); ?>assets/images/bin.png" onclick="xoahinhanh(\''+haten+'\')" /><label class="checkbox-inline" ><input name="hinhanhchk" class="hinhanhchk" style="width: 20px; height: 20px; margin-top: -10px;" type="checkbox" value="'+haten+'"></label></div></span>';

		        		count++;
		        		//document.getElementById(haten).style.display = "block";
		        	}
		        	else
		        	{
		        		//document.getElementById(haten).style.display = "none";
		        	}
		        }

		        var total =  document.getElementById('total').innerHTML;
		        if(total < count)
		        {
		        	document.getElementById('total').innerHTML = count;
		        }
		        document.getElementById('count').innerHTML = count;
		        document.getElementById('hinhdiadiem').innerHTML = chuoi;

	        }, 'json');
		}

		function xoahinhbinhluanmain(ten)
		{
			var url, dta;
            url = "<?php echo base_url(); ?>index.php/binhluan/deleteanhbinhluan";
            dta = {
            	"ten" : ten
            };

            $.post(url, dta, function(data, status){

	            console.log(status);
	            console.log(data);
	            document.getElementById(ten).style.display = "none";
	            thongbao("", "<?php echo lang('deleted_successfully') ?>", "success");

            }, 'json');
		}

		function xoahinhbinhluan(ten)
		{
			if(!confirm("<?php echo lang('are_you_sure') ?>"))
			{
				return;
			}
			xoahinhbinhluanmain(ten);
		}

		function xoaanhbinhluanchk()
        {
        	if(!confirm("<?php echo lang('are_you_sure') ?>"))
			{
				return;
			}
        	var chk = document.getElementsByName("anhbinhluanchk");
        	var chuoi = "";
        	for (var i = 0; i < chk.length; i++) {
        		if(chk[i].checked)
        		{
        			xoahinhbinhluanmain(chk[i].value);
        		}
        	}
        }

		function hinhbinhluan(id)
		{
			var dta, url;
            url = "<?php echo base_url(); ?>index.php/binhluan/anhbinhluan";
            dta = {
            	"ma" : id
            };
            console.log(dta);
            $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                if(status == "success")
                {
                	var chuoi = "";
                	for (var i = 0; i < data.data.length; i++) {
                		var ma = data.data[i]['ABL_MA'];
                		var ten = data.data[i]['ABL_TEN'];
                		chuoi += "<span id='"+ten+"' class='span'> <i style='font-size: 20px; color: #f00; position: absolute; margin: 3px; cursor: pointer;' class='fa fa-times' onclick=\"xoahinhbinhluan('"+ten+"');\" ></i> <img src='<?php echo base_url(); ?>uploads/binhluan/" + ten + "' width='100%' height='100%'> <label style='float: right; position: relative;' class=\"checkbox-inline\" ><input name=\"anhbinhluanchk\" class=\"anhbinhluanchk\" style=\"width: 20px; height: 20px; margin-top: -15px;\" type=\"checkbox\" value=\""+ten+"\"></label> </span>";
                	}
                	
                	document.getElementById('hinhbinhluan').innerHTML = chuoi;
                }

            }, 'json');
		}

		function xoabinhluanmain(id)
		{
			var dta, url;
            url = "<?php echo base_url(); ?>index.php/binhluan/delete";
            dta = {
            	"ma" : id
            };
            console.log(dta);
            $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                if(status == "success")
                {   
                    if(data.status == "error")
                    {
                        //alert("Mã không tồn tại!");
                        //openError(data.msg['ma']);
                        thongbao("", data.msg['ma'], "danger");
                    }
                    else
                    {
                        //openSuccess("Xóa thành công");
                        document.getElementById(id).style.display = "none";
                        thongbao("", "<?php echo lang('deleted_successfully') ?>", "success");
                        //alert("Xóa thành công!");
                    }
                }
            }, 'json');  
		}

		function xoabinhluan(id)
        {
        	if(!confirm("<?php echo lang('are_you_sure') ?>"))
			{
				return;
			}

            xoabinhluanmain(id);
        }

        function xoabinhluanchk()
        {
        	if(!confirm("<?php echo lang('are_you_sure') ?>"))
			{
				return;
			}
        	var chk = document.getElementsByName("binhluanchk");
        	var chuoi = "";
        	for (var i = 0; i < chk.length; i++) {
        		if(chk[i].checked)
        		{
        			xoabinhluanmain(chk[i].value);
        		}
        	}
        }

        function uploadimg()
        {
        	//dang anh cho dia diem
            var path = "<?php echo base_url(); ?>index.php/diadiemhinh/uploadimg/" + "<?php echo $info['DD_MA']; ?>";

            $('#jqxFileUpload1').jqxFileUpload({ localization: { browseButton: '<?php echo lang("browse") ?>', uploadButton: "<?php echo lang('upload_all') ?>", cancelButton: "<?php echo lang('cancel_all') ?>", uploadFileTooltip: "<?php echo lang('upload_file') ?>", cancelFileTooltip: "<?php echo lang('cancel') ?>" } });

            $('#jqxFileUpload1').jqxFileUpload({ multipleFilesUpload: true });

            $('#jqxFileUpload1').jqxFileUpload({ width: "100%", uploadUrl: path, fileInputName: 'fileToUpload'});

            $('#eventsPanel1').jqxPanel({ width: "100%", height: 100 });
            $('#jqxFileUpload1').on('select', function (event) {
                var args = event.args;
                var fileName = args.file;
                var fileSize = args.size;
                var fileindex = args.owner._fileRows["length"] - 1;
                $('#eventsPanel1').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                    fileName + ';<br />' + 'size: ' + fileSize + '<br />');

                if(fileSize > 6000000)
                {
                  $('#jqxFileUpload1').jqxFileUpload('cancelFile', fileindex);
                  thongbao("", "<?php echo lang('sorry_your_file_is_too_large') ?>", "danger");
                }
            });
            $('#jqxFileUpload1').on('remove', function (event) {
                var fileName = event.args.file;
                $('#eventsPanel1').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br /> <hr /> ');
            });
            $('#jqxFileUpload1').on('uploadStart', function (event) {
                var fileName = event.args.file;
                $('#eventsPanel1').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br />');
            });
            $('#jqxFileUpload1').on('uploadEnd', function (event) {
                var args = event.args;
                var fileName = args.file;
                var serverResponce = args.response;
                $('#eventsPanel1').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                    fileName + ';<br />' + 'server response: ' + serverResponce + '<br />');
                if(serverResponce.indexOf("!") != "-1")
                {
                    thongbao("", serverResponce, "success");
                }
                else
                {
                    thongbao("", serverResponce, "danger");
                }
            });
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
		width: 20px;
		height: 20px;
		cursor: pointer;
	}
	.divbinhluan{
		padding: 5px;
		margin: 5px; 
		float: left; 
		width: 48%; 
		height: 120px; 
		border: solid 1px #000; 
		overflow: auto;
		border-radius: 2px;
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
	<div style="border-radius: 2px; padding: 15px; width: 100%; height: 280px;">
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
                <td class="cot1"><i class="fa fa-photo fa-fw"></i> Hình ảnh </td>
                <td class="cot2">
                	<button class="btnhinhanh" data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo lang('view') ?></button>
                </td>
              </tr>
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
            </table>
		</div>
	</div>
	<hr/>
	<div style="margin: 0px 0px 0px 15px;">
		<b style="font-weight: bold; font-size: 20px;"><?php echo lang('comment') ?> </b>
		<!-- <button class="tool" onclick="xembinhluan('1')"><i class="fa fa-th"></i></button>
		<button class="tool" onclick="xembinhluan('2')"><i class="fa fa-th-list"></i></button>
		<button class="tool" onclick="xembinhluan('3')"><i class="fa fa-th-large"></i></button>
		<i class="fa fa-angle-double-right"></i> <label> <?php echo lang('delete') ?>: </label>
		<button class="tool" onclick="xoabinhluanchk()"><i class="fa fa-trash-o"></i></button>
		<label><input type="checkbox" id="checkAll"/> <?php echo lang('check_all') ?></label> -->
	</div>
	
	<div style="padding: 10px; width: 100%; height: 500px; overflow: auto;">
		<!-- <?php 
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
	    		<div class="divbinhluan" id="<?php echo $mabinhluan ?>">
	    			<div style="float: right; position: relative; font-size: 18px; font-weight: bolder;">
	    				<button class="tool" data-toggle="modal" data-target="#modalbinhluan" onclick="hinhbinhluan('<?php echo $mabinhluan ?>')"><i class="fa fa-photo fa-fw"></i></button>
                  		<button class="tool" onclick="xoabinhluan('<?php echo $mabinhluan ?>')"><i class="fa fa-trash-o fa-fw"></i></button>
                  		<label class="checkbox-inline" ><input name="binhluanchk" class="binhluanchk" style="width: 20px; height: 20px; margin-top: -15px;" type="checkbox" value="<?php echo $mabinhluan ?>"></label>
	    			</div>
	    			
	    			<img style="border-radius: 50px;" src="<?php echo base_url(); ?>uploads/user/<?php echo $hinhnd ?>" width="30" height="30">

                  	<b style="font-size: 16px; text-transform: capitalize;"> <?php echo $hond." ".$tennd ?> </b> - <?php echo $ngaydang ?> <b><?php echo lang("comment") ?></b> 
                  	<br/>
	    			<b style="font-size: 18px; text-transform: uppercase;"><i class="fa fa-comments-o fa-fw"></i> <?php echo $tieude ?></b>
	    			<p style="width: 100%; height: 40px; overflow: auto;"><i style="margin: 0px 5px 0px 2px;" class="fa fa-bullhorn fa-fw"></i> <?php echo $noidung ?></p>
	    		</div>
	    <?php
	      	}
        ?> -->
        <?php $this->load->view('admin/binhluan_view') ?>
	</div>
	<div> <!-- modal hinh anh -->
		<!-- Large modal -->
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" style="width: 90%; height: 500px;">
		    <div class="modal-content">
		    	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title"><?php echo lang('photo').': '.$info['DD_TEN'] ?></h4>
			        <?php //echo lang('view') ?>
			        <button class="tool" onclick="kieu('1')"><i class="fa fa-th"></i></button>
			        <button class="tool" onclick="kieu('2')"><i class="fa fa-th-list"></i></button>
			        <button class="tool" onclick="kieu('3')"><i class="fa fa-th-large"></i></button>

			        <i class="fa fa-angle-double-right"></i>
			        <button class="browse" onclick="duyetall('1')"><?php echo lang("browse_all") ?></button>
			        <button class="cancel" onclick="duyetall('0')"><?php echo lang("cancel_all") ?></button>
			        <i class="fa fa-angle-double-right"></i>
			        <button class="tool1" onclick="loc('0')"><?php echo lang("show_not_browse") ?></button>
			        <button class="tool2" onclick="loc('1')"><?php echo lang("show_browse") ?></button>
			        <button class="tool3" onclick="loc('2')"><?php echo lang("show_all") ?></button>
			        <b id="count"><?php echo count($info1); ?></b>
			        <i class="fa fa-send-o"></i>
			        <b id="total"><?php echo count($info1); ?></b>
			        <i class="fa fa-angle-double-right"></i>
			        <button class="btnhinhanh" data-toggle="modal" data-target="#modalthemanh" onclick="uploadimg()"><?php echo lang('upload_photos') ?></button>

			    </div>
		    	<div id='hinhdiadiem' class="modal-body" style="width: 100%; height: 450px; overflow: auto;">
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

                    			<img class="btnbin" src="<?php echo base_url(); ?>assets/images/bin.png" onclick="xoahinhanh('<?php echo $haten ?>')" />

                    			<label class="checkbox-inline" ><input name="hinhanhchk" class="hinhanhchk" style="width: 20px; height: 20px; margin-top: -10px;" type="checkbox" value="<?php echo $haten ?>"></label>
                    		</div>
                    		
                    	</span>
                    <?php
                    	}
                    ?>
			    </div>
			    <div class="modal-footer">
			    	<label><input style="font-weight: bold; width: 20px; height: 20px; float: left; margin-top: 0px;" type="checkbox" id="checkAllha"/> <?php echo lang('check_all') ?></label>
		          	<button class="delete" onclick="xoahinhanhchk()"><i class="fa fa-trash-o"></i></button>
					
		        </div>
		    </div>
		  </div>
		</div>
	</div> <!-- dong modal hinh anh -->

	<div> <!-- modal binh luan -->
		<!-- Modal -->
		<div id="modalbinhluan" class="modal fade" role="dialog" tabindex="-1">
		  <div class="modal-dialog" style="width: 90%; ">

		    <!-- Modal content-->
		    <div class="modal-content" style="height: 500px;">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><i class="fa fa-comments-o fa-fw"></i> <?php echo $info['DD_TEN']; ?></h4>
		        <?php echo lang('view') ?>:
		        <button class="tool" onclick="kieu('1')"><i class="fa fa-th"></i></button>
		        <button class="tool" onclick="kieu('2')"><i class="fa fa-th-list"></i></button>
		        <button class="tool" onclick="kieu('3')"><i class="fa fa-th-large"></i></button>

		        <i class="fa fa-angle-double-right"></i> <label> <?php echo lang('delete') ?>: </label>
				<button class="tool" onclick="xoaanhbinhluanchk()"><i class="fa fa-trash-o"></i></button>
				<label><input type="checkbox" id="checkAllabl"/> <?php echo lang('check_all') ?></label>
		      </div>
		      <div id="hinhbinhluan" class="modal-body">
		      	...
		      </div>
		      <!-- <div class="modal-footer">
		      	<button type="button" id="btngui" class="btn btn-outline btn-success">Gửi</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		      </div> -->
		    </div>

		  </div>
		</div>
	</div> <!-- dong modal binh luan -->

	<div> <!-- modal them anh dia diem -->
		<!-- Modal -->
		<div id="modalthemanh" class="modal fade" role="dialog" tabindex="-1">
		  <div class="modal-dialog" style="width: 50%; ">

		    <!-- Modal content-->
		    <div class="modal-content" style="height: 400px;">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><i class="fa fa-comments-o fa-fw"></i> <?php echo $info['DD_TEN']; ?></h4>
		      </div>
		      <div style="overflow: auto; height: 300px;" class="modal-body">
		      	  <div id="jqxFileUpload1">
		          </div>
		          <div id="eventsPanel1">
		          </div>
		      </div>
		    </div>

		  </div>
		</div>
	</div> <!-- dong modal binh luan -->

</body>
</html>
