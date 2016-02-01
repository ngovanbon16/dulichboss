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
                $('#events').jqxPanel('prepend', '<div class="item" style="margin-top: 5px;">' + eventData + '</div>');
            }

            $('#events').jqxPanel({  height: '30px', width: '100px' });
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
                $('#events1').jqxPanel('prepend', '<div class="item" style="margin-top: 5px;">' + eventData + '</div>');
            }
            $('#events1').jqxPanel({  height: '30px', width: '100px' });
            //change event
            $('#BL_PHUCVU').jqxSlider({ showButtons: false, value: 5, mode: 'fixed', width: '150' });
            $('#BL_PHUCVU').on('change', function (event) {
                displayEvent1(event);
            });

            function displayEvent2(event) {
                var eventData = event.type;
                eventData += ': ' + event.args.value;
                $('#events2').jqxPanel('clearContent');
                $('#events2').jqxPanel('prepend', '<div class="item" style="margin-top: 5px;">' + eventData + '</div>');
            }
            $('#events2').jqxPanel({  height: '30px', width: '100px' });
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
							 document.getElementById("btngui").disabled = true;
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

 			$('#jqxFileUpload').jqxFileUpload({ width: 300, uploadUrl: '<?php echo base_url(); ?>index.php/upload/upload', fileInputName: 'fileToUpload' });

 			$("#btnbinhluan").click(function(){
 				$("#jqxFileUpload").hide();
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
                </table></td>
            </tr>
          </table></td>
        <td width="300"> 

        	<table class="table table-bordered">
        		<tr>
        			<td width="220">
	        			<button id="btnbinhluan" class="btn" data-toggle='modal' data-target='#myModalbl'> 
	        				<i class="fa fa-comment fa-fw"></i> Bình luận
	        			</button>
        			</td>
        			<td>
        				
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<button class="btn" data-toggle='modal' data-target='#myModal'> 
        					<i class="fa fa-picture-o fa-fw"></i> Đăng ảnh 
        				</button>
        			</td>
        			<td>
        				
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
        Mã danh mục: <br/>
        <input type="text" id="ma" name="ma" value="<?php echo $info['DD_MA'] ?>" readonly />
        <br/>
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
        		<td width="300"><!-- cot 2 -->
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
        		</td><!-- dong cot 2 -->
        	</tr>
        </table>

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