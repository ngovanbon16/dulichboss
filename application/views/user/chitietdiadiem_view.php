 <head>	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnotification.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxfileupload.js"></script>
  <!--   /*<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-modalmanager.js"></script>*/ -->

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script type="text/javascript">
            function thongbao(title, message, type)
            {
                if(title == "")
                {
                    title = "<?php echo lang('notification') ?>";
                }
                $.notify(
                    {
                        icon: 'glyphicon glyphicon-star',
                        title: title+":",
                        message: message,
                        url: "https://google.com",
                        target: "_blank"
                    },
                    {
                        type: type, //warning danger
                        allow_dismiss: true,
                        delay: 3000,
                        timer: 1000,
                        offset: {
                            x: 10,
                            y: 10
                        },
                        z_index: 1090,
                        //icon_type: 'image',
                        newest_on_top: true,
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        }
                    }
                );
            }
        </script>

<style type="text/css">
.noidungthongtin {
	padding: 5px;
	width: "100%";
	border-bottom: 1px solid #FFF;
}
.cot1 {
	text-align: left;
	font-weight: bold;
	width: 160px;
	border-bottom: solid 1px #99F;
}
.cot2 {
	text-align: left;
	font-style: italic;
	border-bottom: solid 1px #99F;
}
.phan1 {
	width: "60%";
	float: left;
}
.phan2 {
	float: left;
}

.value{
	width: 0px;
  display: none;
}

.btn1{
	border: none;
	width: 200px;
	text-align: left;
  border-radius: 0px;
  height: 30px;
  font-size: 14px;
}

.count{
  background-color: #999;
  border: none;
  text-align: center;
  height: 30px;
  width: 50px;
  font-size: 14px;
}

.tieude{
  border: 1px solid #F00;
  text-align: left;
  font-size: 20px;
  font-weight: bold;
  background-color: #F66;
  border-radius: 2px;
  padding: 10px;
}
</style>

  <script type="text/javascript">
        $(document).ready(function () {
        	var notificationWidth = 300;

            $("#notiSuccess").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "success"
            });

            $("#notiError").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "error"
            });

            function openSuccess(str)
            {
                $("#result").html(str);
                $("#notiSuccess").jqxNotification("open");
            }

            function openError(str)
            {
                $("#error").html(str);
                $("#notiError").jqxNotification("open");
            }

            function displayEvent(event) {
                var eventData = event.type;
                eventData += ': ' + event.args.value;
                $('#events').jqxPanel('clearContent');
                $('#events').jqxPanel('prepend', '<div class="item" style="margin-top: 5px;">' + event.args.value + '</div>');
                var tb = ($("#BL_PHUCVU").val() + $("#BL_KHONGGIAN").val() + event.args.value)/3;
                $("#diemtrungbinh").html(tb.toFixed(1));
            }

            $('#events').jqxPanel({  height: '30px', width: '10px' });
            $('#jqxSlider div').css('margin', '5px');
            //change event
            $('#BL_CHATLUONG').jqxSlider({ showButtons: false, value: 5, mode: 'fixed', width: '150' });
            $('#BL_CHATLUONG').on('change', function (event) {
                displayEvent(event);
            });

            function displayEvent1(event) {
                var eventData = event.type;
                eventData += ': ' + event.args.value;
                $('#events1').jqxPanel('clearContent');
                $('#events1').jqxPanel('prepend', '<div class="item" style="margin-top: 5px;">' + event.args.value + '</div>');
                var tb = ($("#BL_CHATLUONG").val() + $("#BL_KHONGGIAN").val() + event.args.value)/3;
                $("#diemtrungbinh").html(tb.toFixed(1));
            }
            $('#events1').jqxPanel({  height: '30px', width: '10px' });
            //change event
            $('#BL_PHUCVU').jqxSlider({ showButtons: false, value: 5, mode: 'fixed', width: '150' });
            $('#BL_PHUCVU').on('change', function (event) {
                displayEvent1(event);
            });

            function displayEvent2(event) {
                var eventData = event.type;
                eventData += ': ' + event.args.value;
                $('#events2').jqxPanel('clearContent');
                $('#events2').jqxPanel('prepend', '<div class="item" style="margin-top: 5px;">' + event.args.value + '</div>');
                var tb = ($("#BL_CHATLUONG").val() + $("#BL_PHUCVU").val() + event.args.value)/3;
                $("#diemtrungbinh").html(tb.toFixed(1));
            }
            $('#events2').jqxPanel({  height: '30px', width: '10px' });
            //change event
            $('#BL_KHONGGIAN').jqxSlider({ showButtons: false, value: 5, mode: 'fixed', width: '150' });
            $('#BL_KHONGGIAN').on('change', function (event) {
                displayEvent2(event);
            });



           	$("#btngui").click(function(){
           		if($("#BL_TIEUDE").val() == "")
           		{
           			document.getElementById('BL_TIEUDE').style.backgroundColor = "#F99";
           			$("#BL_TIEUDE").focus();
           			openError("Tiêu đề không được rỗng!");
           			return;
           		}
           		else
           		{
           			document.getElementById('BL_TIEUDE').style.backgroundColor = "#FFF";
           		}

           		if($("#BL_NOIDUNG").val() == "")
           		{
           			document.getElementById('BL_NOIDUNG').style.backgroundColor = "#F99";
           			$("#BL_NOIDUNG").focus();
           			openError("Nội dung không được rỗng!");
           			return;
           		}
           		else
           		{
           			document.getElementById('BL_NOIDUNG').style.backgroundColor = "#FFF";
           		}

           		var url, dta;
				url="<?php echo base_url(); ?>index.php/binhluan/add?t=" + Math.random();
				dta = {
					"DD_MA" : "<?php echo $info['DD_MA']; ?>",
					"BL_TIEUDE" : $("#BL_TIEUDE").val(),
					"BL_NOIDUNG" : $("#BL_NOIDUNG").val(),
					"BL_CHATLUONG" : $("#BL_CHATLUONG").val(),
					"BL_PHUCVU" : $("#BL_PHUCVU").val(),
					"BL_KHONGGIAN" : $("#BL_KHONGGIAN").val()
				};
				console.log(dta);
				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						if(data.status == "error")
						{

						}
						else
						{
							//$('#myModalbl').modal('toggle');
							openSuccess("Gửi bình luận thành công!");
							$("#jqxFileUpload").show();
              //$("#idbinhluan").show();
							 document.getElementById("btngui").disabled = true;
               var idbinhluan = data.msg['idbinhluan'];
               //alert(idbinhluan);
               document.getElementById("idbinhluan").value = idbinhluan;
               var path = "<?php echo base_url(); ?>index.php/upload/upload/" + idbinhluan;

               $('#jqxFileUpload').jqxFileUpload({ localization: { browseButton: '<?php echo lang("select") ?>', uploadButton: 'Tải lên tất cả', cancelButton: 'Hủy tất cả', uploadFileTooltip: 'Tải lên', cancelFileTooltip: 'Hủy tải' } });

               $('#jqxFileUpload').jqxFileUpload({ multipleFilesUpload: true });

               $('#jqxFileUpload').jqxFileUpload({ width: 558, uploadUrl: path, fileInputName: 'fileToUpload'});

              $('#eventsPanel').jqxPanel({ width: "100%", height: 150 });
              $('#jqxFileUpload').on('select', function (event) {
                  var args = event.args;
                  var fileName = args.file;
                  var fileSize = args.size;
                  var fileindex = args.owner._fileRows["length"] - 1;
                  $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                      fileName + ';<br />' + 'size: ' + fileSize + '<br />');

                  if(fileSize > 2500000)
                  {
                    $('#jqxFileUpload').jqxFileUpload('cancelFile', fileindex);
                    thongbao("", "Lỗi! File quá lớn!", "danger");
                  }
              });
              $('#jqxFileUpload').on('remove', function (event) {
                  var fileName = event.args.file;
                  $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br /> <hr /> ');
              });
              $('#jqxFileUpload').on('uploadStart', function (event) {
                  var fileName = event.args.file;
                  $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br />');
              });
              $('#jqxFileUpload').on('uploadEnd', function (event) {
                  var args = event.args;
                  var fileName = args.file;
                  var serverResponce = args.response;
                  $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                      fileName + ';<br />' + 'server response: ' + serverResponce + '<br />');
                  thongbao("", "Upload thanh cong", "success");
              });
							//setTimeout("location.href = '<?php echo base_url(); ?>index.php/aediadiem/detailuser/<?php echo $info['DD_MA']; ?>';",1500);
							//alert("Thêm thành công");
						}
					}
				}, 'json');
           	});

 			$("#checkin").click(function(){
 				var checkin = $("#checkinvalue").val();
 				var tg = '0';
 				if(checkin == "1")
 				{
 					document.getElementById("checkinvalue").value = "0";
 					document.getElementById('iconcheckin').className = "fa fa-square-o fa-fw";
 				}
 				else
 				{
 					document.getElementById("checkinvalue").value = "1";
 					document.getElementById('iconcheckin').className = "fa fa-check-square-o fa-fw";
 					tg = '1';
 				}

 				var url, dta;
				url="<?php echo base_url(); ?>index.php/nguoidungdiadiem/checkin?t=" + Math.random();
				dta = {
					"DD_MA" : "<?php echo $info['DD_MA']; ?>",
					"NDDD_DADEN" : tg
				};
				console.log(dta);
				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						if(data.status == "error")
						{

						}
						else
						{
              //alert(data.msg['count']);
              /*$("#countcheckin").html(data.msg['count']);*/
              document.getElementById("countcheckin").value = data.msg['count'];
						}
					}
				}, 'json');
 			});

 			$("#yeuthich").click(function(){
 				var checkin = $("#yeuthichvalue").val();
 				var tg = '0';
 				if(checkin == "1")
 				{
 					document.getElementById("yeuthichvalue").value = "0";
 					document.getElementById('iconyeuthich').className = "fa fa-heart-o fa-fw";
 				}
 				else
 				{
 					document.getElementById("yeuthichvalue").value = "1";
 					document.getElementById('iconyeuthich').className = "fa fa-heart fa-fw";
 					tg = '1';
 				}

 				var url, dta;
				url="<?php echo base_url(); ?>index.php/nguoidungdiadiem/yeuthich?t=" + Math.random();
				dta = {
					"DD_MA" : "<?php echo $info['DD_MA']; ?>",
					"NDDD_YEUTHICH" : tg
				};
				console.log(dta);
				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						if(data.status == "error")
						{

						}
						else
						{
              /*$("#countyeuthich").html(data.msg['count']);*/
              document.getElementById("countyeuthich").value = data.msg['count'];
						}
					}
				}, 'json');
 			});

 			$("#muonden").click(function(){
 				var checkin = $("#muondenvalue").val();
 				var tg = '0';
 				if(checkin == "1")
 				{
 					document.getElementById("muondenvalue").value = "0";
 					document.getElementById('iconmuonden').className = "fa fa-star-o fa-fw";
 				}
 				else
 				{
 					document.getElementById("muondenvalue").value = "1";
 					document.getElementById('iconmuonden').className = "fa fa-star fa-fw";
 					tg = '1';
 				}

 				var url, dta;
				url="<?php echo base_url(); ?>index.php/nguoidungdiadiem/muonden?t=" + Math.random();
				dta = {
					"DD_MA" : "<?php echo $info['DD_MA']; ?>",
					"NDDD_MUONDEN" : tg
				};
				console.log(dta);
				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						if(data.status == "error")
						{

						}
						else
						{
              /*$("#countmuonden").html(data.msg['count']);*/
              document.getElementById("countmuonden").value = data.msg['count'];
						}
					}
				}, 'json');
 			});

 			var checkin = "<?php echo $danhgia['NDDD_DADEN']; ?>";
 			if(checkin == '1')
 			{
 				document.getElementById("checkinvalue").value = "1";
 				document.getElementById('iconcheckin').className = "fa fa-check-square-o fa-fw";
 			}

 			var yeuthich = "<?php echo $danhgia['NDDD_YEUTHICH']; ?>";
 			if(yeuthich == "1")
 			{
 				document.getElementById("yeuthichvalue").value = "1";
 				document.getElementById('iconyeuthich').className = "fa fa-heart fa-fw";
 			}

 			var muonden = "<?php echo $danhgia['NDDD_MUONDEN']; ?>";
 			if(muonden == "1")
 			{
 				document.getElementById("muondenvalue").value = "1";
 				document.getElementById('iconmuonden').className = "fa fa-star fa-fw";
 			}

 			

     			$("#btnbinhluan").click(function(){

            <?php 
              if($this->session->userdata('id') == "")
              { 
                ?>
                  setTimeout("location.href = '<?php echo base_url(); ?>index.php/login';",0);
                <?php
              }
            ?>

     				$("#jqxFileUpload").hide();
            $("#idbinhluan").hide();
     				document.getElementById("btngui").disabled = false;
     				document.getElementById("BL_TIEUDE").value = "";
     				document.getElementById("BL_NOIDUNG").value = "";

     			});

          var url, dta;
          url="<?php echo base_url(); ?>index.php/aediadiem/updateluotxem?t=" + Math.random();
          dta = {
            "DD_MA" : "<?php echo $info['DD_MA']; ?>"
          };
          console.log(dta);
          $.post(url, dta, function(data, status){

            console.log(status);
            console.log(data);
            if(status == "success")
            { 
              if(data.status == "error")
              {

              }
              else
              {
                console.log(data.data["DD_LUOTXEM"]);
                $("#countluotxem").val(data.data["DD_LUOTXEM"]);
              }
            }
          }, 'json');
        });

      function showbando()
      {
        document.getElementById('binhluan').style.display = "none";
        document.getElementById('hinhanh').style.display = "none";
        document.getElementById('thongtin').style.display = "none";
        document.getElementById('bando').style.display = "block";
      }

      function showbinhluan()
      {
        document.getElementById('bando').style.display = "none";
        document.getElementById('hinhanh').style.display = "none";
        document.getElementById('thongtin').style.display = "none";
        document.getElementById('binhluan').style.display = "block";
      }

      function showhinhanh()
      {
        document.getElementById('bando').style.display = "none";
        document.getElementById('binhluan').style.display = "none";
        document.getElementById('thongtin').style.display = "none";
        document.getElementById('hinhanh').style.display = "block";
      }

      function showall()
      {
        document.getElementById('bando').style.display = "block";
        document.getElementById('binhluan').style.display = "block";
        document.getElementById('hinhanh').style.display = "block";
        document.getElementById('thongtin').style.display = "block";
      }

    </script>

    <script> 
      $(document).ready(function(){
          var x = true;
          $(".span").click(function(){
              var span = $(this);
              if(x)
              { 
                span.animate({width: '400', opacity: '1'}, "slow");
                x = false;
              }
              else
              {
                span.animate({width: '0', opacity: '0'}, "slow");
                x = true;
              }
          });

          $("#thubinhluan").click(function(){
            $("#diembinhluan").slideToggle("slow");
          });
      });
    </script>

</head>

<section id="about-us" style="padding: 5px;"><!-- thong tin -->
  <div class="container"> <!-- container -->
    <ul class="nav nav-tabs">
      <li onclick="showall()" class="active"><a data-toggle="tab" href="#home"><i class="fa fa-home fa-fw"></i> Trang chủ</a></li>
      <li onclick="showhinhanh()" data-toggle="modal" data-target="#modalhinhanh"><a data-toggle="tab" href="#hinhanh"><i class="fa fa-camera fa-fw"></i> Hình ảnh</a></li>
      <li onclick="showbinhluan()"><a data-toggle="tab" href="#menu2"><i class="fa fa-comment fa-fw"></i> Bình luận</a></li>
      <li onclick="showbando()"><a data-toggle="tab" href="#bando"><i class="fa fa-map-marker fa-fw"></i> Bản đồ</a></li>
    </ul>
    <table class="khung" width="100%">
      <tr>
        <td>
          <div style="font-style: italic; opacity: 0.7; font-size: 16px; margin: 5px 5px 5px 0px;"> <?php echo $tenhuyen; ?> <i class="fa fa-angle-double-right fa-fw"></i> <?php echo $tentinh; ?></div>
          <h2 style="border: 1px solid #C00; padding-top: 0px; margin-top: 0px; text-transform: uppercase; font-size: 25px; color: #FFF; background-color: #F66; padding: 15px;"><?php echo $info['DD_TEN'] ?></h2>
          <table class="noidungthongtin" width="100%">
            <tr id='thongtin'>
              <td><?php //echo $info['DD_MA']; ?>

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
                <a style="float: left;" class="preview" href="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" rel="prettyPhoto">
                  <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" width='100%' height='300'>
                </a>

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
                </table>
              </td>
            </tr>
            <tr>
              <td td colspan="2" width="1000">
                <hr/>
                <div style="font-size: 20px; font-weight: bolder;">
                  <i id="thubinhluan" style="cursor: pointer;" class="fa fa-unsorted fa-fw"></i> <?php echo $countbinhluan ?> bình luận đã chia sẻ 
                </div>
                <div id="diembinhluan" style="width: 100%; background-color: #cef; text-align: center; border: 1px solid #39F; padding: 5px;">
                  <table width="100%">
                    <tr style="font-size: 20px; font-weight: bolder; color: #090">
                      <td width="25%">
                        <?php echo $diemchatluong?>
                      </td>
                      <td width="25%">
                        <?php echo $diemphucvu ?>
                      </td>
                      <td width="25%">
                        <?php echo $diemkhonggian ?>
                      </td>
                      <td width="25%">
                        <?php 
                          $diemtb = ($diemchatluong + $diemphucvu + $diemkhonggian)/3;
                          $diemtb = round($diemtb, 1);
                          echo round($diemtb, 1)." <i class='fa fa-flag-checkered fa-fw'></i>";
                          if(0 < $diemtb && $diemtb < 2)
                          {
                            echo "Kém";
                          }
                          if(2 <= $diemtb && $diemtb < 4)
                          {
                            echo "Trung bình";
                          }
                          if(4 <= $diemtb && $diemtb < 6)
                          {
                            echo "Khá";
                          }
                          if(6 <= $diemtb && $diemtb < 8)
                          {
                            echo "Tốt";
                          }
                          if(8 <= $diemtb && $diemtb <= 10)
                          {
                            echo "Tuyệt vời";
                          }

                        ?>
                      </td>
                    </tr>
                    <tr style="font-style: italic;">
                      <td>Chất lượng</td>
                      <td>Phục vụ</td>
                      <td>Không gian</td>
                      <td>Trung bình</td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
            <tr id='binhluan'>
              <td colspan="2" width="1000"> <!-- danh gia binh luan -->
                <hr/>
                <div class="tieude"><i class="fa fa-comment fa-fw"></i> Bình luận</div>
                <hr/>
                  <?php
                    foreach ($binhluan as $iteam) {
                      $mabinhluan = $iteam['BL_MA'];
                      $tieude = $iteam['BL_TIEUDE'];
                      $noidung = $iteam['BL_NOIDUNG'];
                      $chatluong = $iteam['BL_CHATLUONG'];
                      $phucvu = $iteam['BL_PHUCVU'];
                      $khonggian = $iteam['BL_KHONGGIAN'];
                      $ngaydang = $iteam['BL_NGAYDANG'];

                      $diem = ($chatluong + $phucvu + $khonggian) / 3;

                      $honguoidang = $iteam['ND_HO'];
                      $tennguoidang = $iteam['ND_TEN'];
                      $hinhnguoidang = $iteam['ND_HINH'];
                  ?>
                    
                    <table>
                      <tr>
                        <td>
                          <img style="border-radius: 50px;" src="<?php echo base_url(); ?>uploads/user/<?php echo $hinhnguoidang ?>" width="50" height="50">

                          <b style="font-size: 16px; text-transform: capitalize;"> <?php echo $honguoidang." ".$tennguoidang ?> </b> - <?php echo $ngaydang ?> <b>Đã bình luận</b> 
                        </td>
                        <td>
                          <div style="border: 1px solid #00F; float: left; padding-top: 8px; width: 40px; height: 40px; border-radius: 40px; text-align: center; font-weight: bolder; font-size: 16px; color: #009; background-color: #09F;" ><?php echo round($diem, 1); ?> 
                          </div> 
                          <div class="span" style="border: 1px solid #00F; cursor: pointer; position: absolute; opacity: 0; z-index: 10; padding-top: 8px; width: 0px; height: 40px; border-radius: 40px; text-align: center; font-weight: bolder; font-size: 16px; color: #009; background-color: #09F;">Chất lượng <?php echo $chatluong ?> <i class="fa fa-angle-double-right fa-fw"></i> Phục vụ <?php echo $phucvu ?> <i class="fa fa-angle-double-right fa-fw"></i> Không gian <?php echo $khonggian ?></div>
                        </td>
                      </tr>
                    </table>

                   
                      

                        
                        <!-- <span class="span" style="background:#98bf21;width:0px; display: none;"> Chất lượng: <?php echo $chatluong ?> - Phục vụ: <?php echo $phucvu ?> - Không gian: <?php echo $khonggian ?>
                        </span> -->

                    <h2 style="font-size: 20px; text-transform: uppercase;"><i class="fa fa-comments-o fa-fw"></i> <?php echo $tieude ?></h2>
                    <?php echo $noidung ?> <br/>
                  <div style="width: 100%;">
                  <?php
                     foreach ($anhbinhluan as $key) {
                        if($key['BL_MA'] == $mabinhluan)
                        {
                          $tenanh = $key['ABL_TEN'];
                  ?>
                          <a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>uploads/binhluan/<?php echo $tenanh ?>" width="24%" height="120">
                          </a>
                  <?php
                        }
                      }
                      echo "</div><hr/>";
                    }
                  ?>

              </td> <!-- dong danh gia binh luan -->
            </tr>
            <tr id='hinhanh'><!-- hinh anh -->
              <td colspan="2" width="1000">
                <hr/>
                <div class="tieude"><i class="fa fa-camera fa-fw"></i> Hình ảnh 
                </div> <hr/>
                  <?php
                    foreach ($info1 as $key) {
                      $hinh = $key['HA_TEN'];
                      $duyet = $key['HA_DUYET'];
                      if($duyet == "1")
                      {
                  ?>    
                        <div style="float: left; margin: 10px;">
                          <a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" rel="prettyPhoto">
                            <img class="img" data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" width="258" height="250" />
                          </a>
                        </div>
                 <?php
                      }
                    }
                  ?>
              </td>
            </tr><!-- dong hinh anh -->
            <tr id='bando'><!-- ban do -->
              <td colspan="2" width="1000">
                <?php echo $map['js']; ?>
                <hr/>
                <div class="tieude"><i class="fa fa-map-marker fa-fw"></i> Bản đồ</div> <hr/>
                <?php echo $map['html']; ?>
              </td>
            </tr><!-- dong ban do -->
          </table>
        </td>
        <td width="300" valign="top"> 

        	<table class='tool' align="center">
        		<tr>
        			<td width="200">
	        			<button id="btnbinhluan" class="btn1" data-toggle='modal' data-target='#myModalbl'> 
	        				<i class="fa fa-comment fa-fw"></i> Bình luận
	        			</button>
        			</td>
        			<td>
                <input type="text" class="count" value="<?php echo $countbinhluan ?>" readonly="readonly"></input> 
        				<!-- <div class="count" id="" ><?php echo $countbinhluan ?></div> -->
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<button class="btn1" data-toggle='modal' data-target='#myModal'> 
        					<i class="fa fa-picture-o fa-fw"></i> Đăng ảnh 
        				</button>
        			</td>
        			<td>
                <input type="text" class="count" value="<?php echo $counthinhanh ?>" readonly="readonly"></input> 
        				<!-- <div class="count" id="" >0</div> -->
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<button class="btn1" id='checkin'> 
        					<i id="iconcheckin" class="fa fa-square-o fa-fw"></i> Check-in
        				</button>
        				<input class="value" type="text" value="0" id="checkinvalue" />
        			</td>
        			<td>
                <input type="text" id="countcheckin" class="count" value="<?php echo $countcheckin ?>" readonly="readonly"></input> 
        				<!-- <div class="count" id="countcheckin" ><?php echo $countcheckin ?></div> -->
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<button class="btn1" id='yeuthich'> 
        					<i id="iconyeuthich" class="fa fa-heart-o fa-fw"></i> Yêu thích
        				</button>
        				<input class="value" type="text" value="0" id="yeuthichvalue" />
        			</td>
        			<td>
                <input type="text" id="countyeuthich" class="count" value="<?php echo $countyeuthich ?>" readonly="readonly"></input> 
        				<!-- <div class="count" id="countyeuthich" ><?php echo $countyeuthich ?></div> -->
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<button class="btn1" id='muonden'> 
        					<i id="iconmuonden" class="fa fa-star-o fa-fw"></i> Muốn đến
        				</button>
        				<input class="value" type="text" value="0" id="muondenvalue" />
        			</td>
        			<td>
                <input type="text" id="countmuonden" class="count" value="<?php echo $countmuonden ?>" readonly="readonly"></input>
        				<!-- <div class="count" id="countmuonden" ><?php echo $countmuonden ?></div> -->
        			</td>
        		</tr>
            <tr>
              <td>
                <button class="btn1" id='luotxem'> 
                  <i id="iconluotxem" class="fa fa-eye"></i> Lượt xem
                </button>
                <input class="value" type="text" value="0" id="luotxemvalue" />
              </td>
              <td>
                <input type="text" id="countluotxem" class="count" readonly="readonly"></input>
              </td>
            </tr>
        	</table>

        </td>
      </tr>
    </table>
  </div>
  <!-- dong container --> 
</section>
<!-- dong thong tin --> 

<!-- Modal upload anh -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o fa-fw"></i> Đăng ảnh</h4>
    </div>
    <div class="modal-body">
      <form method="post" action="<?php echo base_url(); ?>diadiemhinh/uploadsuser/<?php echo $info['DD_MA'] ?>" enctype="multipart/form-data">
        <input type="text" id="ma" name="ma" value="<?php echo $info['DD_MA'] ?>" style="display: none;" readonly />
        <label>Ảnh kèm theo:</label>
        <input type="file"  id="image_list" name="image_list[]" multiple max-size="100000">
        <br />
        <input type="submit" class="button" value="Tải lên" name='submit' id="submit" />
      </form>
      <?php
        if(isset($errors)){
          echo $errors;
        }
      ?>
    </div>
    <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> --> 
    </div>
  </div>
      <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 

<div id="notiSuccess">
	<div id="result">Thông báo thành công!</div>
</div>
<div id="notiError">
	<div id="error">Thông báo lỗi!</div>
</div>    

<!-- Modal -->
<div id="myModalbl" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-comments-o fa-fw"></i> Bài viết bình luận về: <?php echo $info['DD_TEN']; ?></h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
        	<tr>
        		<td width="500"><!-- cot 1 -->
        			Tiêu đề: <input type="text" class="form-control" id="BL_TIEUDE" placeholder="Nhập tiêu đề bình luận" >
        			Nội dung: <textarea id="BL_NOIDUNG" class="form-control" rows="5" placeholder="Nhập nội dung" ></textarea>
        		</td> <!-- dong cot 1 -->
        		<td width="180"><!-- cot 2 -->
        			<div>Chất lượng</div>
        			<div id='jqxWidget'>
				        <div id="container" style="float: left">
				            <div id='BL_CHATLUONG'></div>
				        </div> 
				        <div id="events" style="border-width: 0px;"></div>    
				    </div>

				    <div>Phục vụ</div>
        			<div id='jqxWidget1'>
				        <div id="container1" style="float: left">
				            <div id='BL_PHUCVU'></div>
				        </div>     
				        <div id="events1" style="border-width: 0px;"></div>
				    </div>

				    <div>Không gian</div>
        			<div id='jqxWidget2'>
				        <div id="container2" style="float: left">
				            <div id='BL_KHONGGIAN'></div>
				        </div>   
				        <div id="events2" style="border-width: 0px;"></div>  
				    </div>
            <div style="float: left; padding-right: 5px;">Điểm trung bình: </div>  
            <div id="diemtrungbinh" style="float: left">5</div>
        		</td><!-- dong cot 2 -->
        	</tr>
        </table>
        <input type="text" id="idbinhluan" style="border-width: 0px; display: none;" readonly="readonly" />
        <div id="jqxFileUpload">
    	  </div>
        <div id="eventsPanel">
        </div>

      </div>
      <div class="modal-footer">
      	<button type="button" id="btngui" class="btn btn-outline btn-success">Gửi</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>

  </div>
</div>

<!-- chạy hình ảnh -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/slider/jssor.slider.min.js"></script>
<!-- use jssor.slider.debug.js instead for debug -->
<script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,$Zoom:1,$Easing:{$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
              {$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Zoom:1,$Rotate:1,$During:{$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
              {$Duration:1000,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
              {$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:4,$Cols:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
              {$Duration:1000,x:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
              {$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
              {$Duration:1000,x:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
              {$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
              {$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Top:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.7}},
              {$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
              {$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.8}}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Rows: 2,
                $Cols: 6,
                $SpacingX: 14,
                $SpacingY: 12,
                $Orientation: 2,
                $Align: 156
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 960);
                    refSize = Math.max(refSize, 300);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

<style>
        
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('<?php echo base_url(); ?>assets/slider/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01-99-66 .p            (normal)
        .jssort01-99-66 .p:hover      (normal mouseover)
        .jssort01-99-66 .p.pav        (active)
        .jssort01-99-66 .p.pdn        (mousedown)
        */
        .jssort01-99-66 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 99px;
            height: 66px;
        }
        
        .jssort01-99-66 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort01-99-66 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        
        .jssort01-99-66 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 95px;
            height: 62px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('<?php echo base_url(); ?>assets/slider/t01.png') -800px -800px no-repeat;
            _background: none;
        }
        
        .jssort01-99-66 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 95px;
            height: 62px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }
        
        .jssort01-99-66 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 97px;
            height: 64px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }
        
        .jssort01-99-66 .p.pdn .c {
            background-position: 50% 50%;
            width: 95px;
            height: 62px;
            border: #000 2px solid;
        }
        
        * html .jssort01-99-66 .c, * html .jssort01-99-66 .pdn .c, * html .jssort01-99-66 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 99px;
            height /**/: 66px;
        }
        
    </style>

<!-- Modal -->
<div id="modalhinhanh" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 1124px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-camera fa-fw"></i> Hình ảnh</h4>
      </div>
      <div class="modal-body">
          <!-- about us slider -->
          <div id="about-slider">
              <div id="carousel-slider" class="carousel slide" data-ride="carousel">

                   <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 960px; height: 480px; overflow: hidden; visibility: hidden; background-color: #24262e;">
                    <!-- Loading Screen -->
                    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;display:block;background:url('<?php echo base_url(); ?>assets/slider/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                    </div>
                    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 240px; width: 720px; height: 480px; overflow: hidden;">
                        <?php
                            foreach ($info1 as $key) {
                                $hinh = $key['HA_TEN'];
                                $duyet = $key['HA_DUYET'];
                                if($duyet == "1")
                                {
                        ?>

                             <div data-p="144.50" style="display: none;">
                                <img data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" />
                                <img data-u="thumb" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" />
                            </div>

                       <?php
                                }
                            }
                        ?>
                    </div>
                    <!-- Thumbnail Navigator -->
                    <div data-u="thumbnavigator" class="jssort01-99-66" style="position:absolute;left:0px;top:0px;width:240px;height:480px;" data-autocenter="2">
                        <!-- Thumbnail Item Skin Begin -->
                        <div data-u="slides" style="cursor: default;">
                            <div data-u="prototype" class="p">
                                <div class="w">
                                    <div data-u="thumbnailtemplate" class="t"></div>
                                </div>
                                <div class="c"></div>
                            </div>
                        </div>
                        <!-- Thumbnail Item Skin End -->
                    </div>
                    <!-- Arrow Navigator -->
                    <span data-u="arrowleft" class="jssora05l" style="top:158px;left:248px;width:40px;height:40px;" data-autocenter="2"></span>
                    <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
                    <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
                </div>
                <script>
                    jssor_1_slider_init();
                </script>

              </div> <!--/#carousel-slider-->
          </div><!--/#about-slider-->
      </div>
    </div><!-- dong Modal content -->
  </div>
</div><!-- dóng modal -->