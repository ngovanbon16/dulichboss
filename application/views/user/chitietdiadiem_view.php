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
	visibility: hidden;
}

.btn{
	border: none;
	width: 180px;
	text-align: left;
}

.tieude{
  text-align: left;
  font-size: 20px;
  font-weight: bold;
  background-color: rgb(98, 159, 255);
  border-radius: 2px;
  padding: 5px;

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
               $('#jqxFileUpload').jqxFileUpload({ width: 558, uploadUrl: path, fileInputName: 'fileToUpload' });
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
              $("#countcheckin").html(data.msg['count']);
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
              $("#countyeuthich").html(data.msg['count']);
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
              $("#countmuonden").html(data.msg['count']);
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
        });
    </script>

</head>

<section id="about-us"><!-- thong tin -->
  <div class="container"> <!-- container -->
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Trang chủ</a></li>
      <li><a data-toggle="tab" href="#menu1">Hình ảnh</a></li>
      <li><a data-toggle="tab" href="#menu2">Bình luận</a></li>
      <li><a data-toggle="tab" href="#menu2">Bản đồ</a></li>
    </ul>
    <table class="table table-bordered">
      <tr>
        <td><h2><?php echo $info['DD_TEN'] ?></h2>
          <table class="noidungthongtin" width="100%">
            <tr>
              <td width="320"><?php 
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
                <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" width='300' height='300'></td>
              <td><?php //echo $info['DD_MA']; ?>
                <table class="tablenoidung" width="100%">
                  <tr>
                    <td class="cot1"> Thuộc dạng du lịch </td>
                    <td class="cot2"><?php echo $tendanhmuc; ?></td>
                  </tr>
                  <tr>
                    <td class="cot1"> Nằm trên đường </td>
                    <td class="cot2"><?php echo $info['DD_DIACHI']; ?> thuộc xã <?php echo $tenxa; ?> huyện <?php echo $tenhuyen; ?> tỉnh <?php echo $tentinh; ?></td>
                  </tr>
                  <tr>
                    <td class="cot1"> Số điện thoại </td>
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
                    <td class="cot1"> Địa chỉ Email </td>
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
                    <td class="cot1"> Địa chỉ Website </td>
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
                    <td class="cot1"> Mô tả đôi nét </td>
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
                    <td class="cot1"> Giới thiệu chi tiết </td>
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
                    <td class="cot1"> Thời gian mở cửa </td>
                    <td class="cot2"><?php echo $info['DD_BATDAU']; ?> - <?php echo $info['DD_KETTHUC']; ?></td>
                  </tr>
                  <tr>
                    <td class="cot1"> Giá bán </td>
                    <td class="cot2"><?php echo $info['DD_GIATU']; ?> - <?php echo $info['DD_GIADEN']; ?></td>
                  </tr>
                  <tr>
                    <td class="cot1"> Nội dung </td>
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
              <td colspan="2"> <!-- danh gia binh luan -->
                <hr/>
                <div class="tieude">Bình luận</div> <hr/>
                  <?php
                    foreach ($binhluan as $iteam) {
                      $mabinhluan = $iteam['BL_MA'];
                      $tieude = $iteam['BL_TIEUDE'];
                      $noidung = $iteam['BL_NOIDUNG'];
                      $chatluong = $iteam['BL_CHATLUONG'];
                      $phucvu = $iteam['BL_PHUCVU'];
                      $khonggian = $iteam['BL_KHONGGIAN'];
                      $ngaydang = $iteam['BL_NGAYDANG'];

                      $honguoidang = $iteam['ND_HO'];
                      $tennguoidang = $iteam['ND_TEN'];
                      $hinhnguoidang = $iteam['ND_HINH'];
                  ?>
                    
                    <img style="border-radius: 50px;" src="<?php echo base_url(); ?>uploads/user/<?php echo $hinhnguoidang ?>" width="50" height="50">
                    <b style="font-size: 16px; text-transform: capitalize;"> <?php echo $honguoidang." ".$tennguoidang ?> </b> - <?php echo $ngaydang ?> <b>Đã bình luận</b>
                    <h2 style="font-size: 20px; text-transform: capitalize;"><?php echo $tieude ?></h2>
                    <?php echo $noidung ?> <br/>

                  <?php
                     foreach ($anhbinhluan as $key) {
                        if($key['BL_MA'] == $mabinhluan)
                        {
                          $tenanh = $key['ABL_TEN'];
                  ?>
                          <!-- <div style="float: left; z-index: 0;"> -->
                            <img src="<?php echo base_url(); ?>uploads/binhluan/<?php echo $tenanh ?>" width="120" height="120">
                          <!-- </div> -->
                  <?php
                        }
                      }
                      echo "<hr/>";
                    }
                  ?>

              </td> <!-- dong danh gia binh luan -->
            </tr>
            <tr><!-- hinh anh -->
              <td colspan="2">
                <hr/>
                <div class="tieude">Hình ảnh 
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalhinhanh">Mở hình</button>
                </div> <hr/>
                  <?php
                    foreach ($info1 as $key) {
                      $hinh = $key['HA_TEN'];
                      $duyet = $key['HA_DUYET'];
                      if($duyet == "1")
                      {
                  ?>    
                        <style type="text/css">
                        .img:hover{
                          position: absolute;
                          width: 500px;
                          height: 500px;
                          transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
                        }
                        </style>
                        <div style="float: left; margin: 10px;">
                          <img class="img" data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" width="250" height="250" />
                        </div>
                 <?php
                      }
                    }
                  ?>
              </td>
            </tr><!-- dong hinh anh -->
            <tr><!-- ban do -->
              <td colspan="2">
                <?php echo $map['js']; ?>
                <hr/>
                <div class="tieude">Bản đồ</div> <hr/>
                <input type="text" id="myPlaceTextBox" />
                <?php echo $map['html']; ?>
                Lat: <input type="text" id="lat" value="" readonly >
                Lng: <input type="text" id="lng" value="" readonly >
                Local: <input type="text" id="DD_VITRI" value="" readonly >
              </td>
            </tr><!-- dong ban do -->
          </table>
        </td>
        <td width="300"> 

        	<table class="table table-bordered">
        		<tr>
        			<td width="220">
	        			<button id="btnbinhluan" class="btn" data-toggle='modal' data-target='#myModalbl'> 
	        				<i class="fa fa-comment fa-fw"></i> Bình luận
	        			</button>
        			</td>
        			<td>
        				<div id="" style="font-size: 20px;"><?php echo $countbinhluan ?></div>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<button class="btn" data-toggle='modal' data-target='#myModal'> 
        					<i class="fa fa-picture-o fa-fw"></i> Đăng ảnh 
        				</button>
        			</td>
        			<td>
        				<div id="" style="font-size: 20px;">0</div>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<button class="btn" id='checkin'> 
        					<i id="iconcheckin" class="fa fa-square-o fa-fw"></i> Check-in
        				</button>
        				<input class="value" type="text" value="0" id="checkinvalue" />
        			</td>
        			<td>
        				<div id="countcheckin" style="font-size: 20px;"><?php echo $countcheckin ?></div>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<button class="btn" id='yeuthich'> 
        					<i id="iconyeuthich" class="fa fa-heart-o fa-fw"></i> Yêu thích
        				</button>
        				<input class="value" type="text" value="0" id="yeuthichvalue" />
        			</td>
        			<td>
        				<div id="countyeuthich" style="font-size: 20px;"><?php echo $countyeuthich ?></div>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<button class="btn" id='muonden'> 
        					<i id="iconmuonden" class="fa fa-star-o fa-fw"></i> Muốn đến
        				</button>
        				<input class="value" type="text" value="0" id="muondenvalue" />
        			</td>
        			<td>
        				<div id="countmuonden" style="font-size: 20px;"><?php echo $countmuonden ?></div>
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
        <h4 class="modal-title" id="myModalLabel">Đăng ảnh</h4>
    </div>
    <div class="modal-body">
      <form method="post" action="<?php echo base_url(); ?>diadiemhinh/uploadsuser/<?php echo $info['DD_MA'] ?>" enctype="multipart/form-data">
        <input type="text" id="ma" name="ma" value="<?php echo $info['DD_MA'] ?>" style="display: none;" readonly />
        <label>Ảnh kèm theo:</label>
        <input type="file"  id="image_list" name="image_list[]" multiple>
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
        <h4 class="modal-title">Bài viết bình luận về: <?php echo $info['DD_TEN']; ?></h4>
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
          {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
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
            $Cols: 10,
            $SpacingX: 8,
            $SpacingY: 8,
            $Align: 360
          }
        };
        
        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
        
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 800);
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
    .jssort01 .p            (normal)
    .jssort01 .p:hover      (normal mouseover)
    .jssort01 .p.pav        (active)
    .jssort01 .p.pdn        (mousedown)
    */
    .jssort01 .p {
        position: absolute;
        top: 0;
        left: 0;
        width: 72px;
        height: 72px;
    }
    
    .jssort01 .t {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
    
    .jssort01 .w {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
    }
    
    .jssort01 .c {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 68px;
        height: 68px;
        border: #000 2px solid;
        box-sizing: content-box;
        background: url('<?php echo base_url(); ?>assets/slider/t01.png') -800px -800px no-repeat;
        _background: none;
    }
    
    .jssort01 .pav .c {
        top: 2px;
        _top: 0px;
        left: 2px;
        _left: 0px;
        width: 68px;
        height: 68px;
        border: #000 0px solid;
        _border: #fff 2px solid;
        background-position: 50% 50%;
    }
    
    .jssort01 .p:hover .c {
        top: 0px;
        left: 0px;
        width: 70px;
        height: 70px;
        border: #fff 1px solid;
        background-position: 50% 50%;
    }
    
    .jssort01 .p.pdn .c {
        background-position: 50% 50%;
        width: 68px;
        height: 68px;
        border: #000 2px solid;
    }
    
    * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
        /* ie quirks mode adjust */
        width /**/: 72px;
        height /**/: 72px;
    }
    
</style>

<!-- Modal -->
<div id="modalhinhanh" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chạy hình ảnh</h4>
      </div>
      <div class="modal-body">
          <!-- about us slider -->
          <div id="about-slider">
              <div id="carousel-slider" class="carousel slide" data-ride="carousel">

                   <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #24262e;">
                          <!-- Loading Screen -->
                          <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                              <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                              <div style="position:absolute;display:block;background:url('<?php echo base_url(); ?>assets/slider/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                          </div>
                          <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">

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
                          <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
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
                          <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
                          <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
                          <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
                      </div>
                      <script>
                          jssor_1_slider_init();
                      </script>


              </div> <!--/#carousel-slider-->
          </div><!--/#about-slider-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>

  </div>
</div>
