<head>
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.ico" type="image/x-icon" />

	<link id="jquiCSS" rel="stylesheet" href="<?php echo base_url(); ?>assets/jqueryui/jquery-ui.css" type="text/css" media="all">
	
	<link href="<?php echo base_url(); ?>assets/colorpicker/css/evol-colorpicker.min.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>assets/jqueryui/external/jquery/jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/jqueryui/jquery-ui.min.js" type="text/javascript"></script>
	<?php if(lang('lang') == 'vi') { ?>
		<script src="<?php echo base_url(); ?>assets/colorpicker/js/evol-colorpicker_vi.js" type="text/javascript"></script>
	<?php } else { ?>
		<script src="<?php echo base_url(); ?>assets/colorpicker/js/evol-colorpicker.js" type="text/javascript"></script>
	<?php } ?>
<script type="text/javascript">
	alert("Vui lòng bấm vào tiêu đề để print poster và bấm vào logo để đổi màu nền!")
    function printDiv(divName) {
	     var printContents = document.getElementById(divName).innerHTML;
	     var originalContents = document.body.innerHTML;

	     document.body.innerHTML = printContents;

	     window.print();

	     document.body.innerHTML = originalContents;
	}

    $(document).ready(function(){

	// Change theme
    $('.css').on('click', function(evt){ 
        $('#jquiCSS').attr('href','http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/'+this.innerHTML+'/jquery-ui.css');
        $('.css').removeClass('sel');
        $(this).addClass('sel');
    });
	
	// Events demo
	$('#cp1').colorpicker({color:'#8db3e2',
		initialHistory: ['#ff0000','#000000','red']
	})
	.on('change.color', function(evt, color){
		$('#cpb').css('background-color',color);
	})
	.on('mouseover.color', function(evt, color){
        if(color){
            $('#cpb').css('background-color',color);
        }
	});
	
	$('#getVal').on('click', function(){
		alert('Selected color = "' + $('#cp1').colorpicker("val") + '"');
	});
	$('#setVal').on('click', function(){
		$('#cp1').colorpicker("val",'#31859b');
	});
	$('#enable').on('click', function(){
		$('#cp1').colorpicker("enable");
	});
	$('#disable').on('click', function(){
		$('#cp1').colorpicker("disable");
	});
	$('#clear').on('click', function(){
		var v=$('#cp1').colorpicker("clear") ;
	});
	$('#destroy1').on('click', function(){
		var v=$('#cp1').colorpicker("destroy") ;
	});
	
	// Instanciate colorpickers
    $('#cpBoth').colorpicker();
    $('#cpDiv').colorpicker({color:'#31859b'});
    $('#cpDiv2').colorpicker({color:'#31859b', defaultPalette:'web'});
    $('#cpFocus').colorpicker({showOn:'focus'});
    $('#cpButton').colorpicker({showOn:'button'});
    $('#cpOther').colorpicker({showOn:'none'});
	$('#show').on('click', function(evt){
		evt.stopImmediatePropagation();
		$('#cpOther').colorpicker("showPalette");
	});
	
	// With transparent color
	$('#transColor').colorpicker({
		transparentColor: true
	});

	// With hidden button
	$('#hideButton').colorpicker({
		hideButton: true
	});

	// No color indicator
	$('#noIndColor').colorpicker({
		displayIndicator: false
	});

	// French colorpicker
	$('#frenchColor').colorpicker({
		strings: "Couleurs de themes,Couleurs de base,Plus de couleurs,Moins de couleurs,Palette,Historique,Pas encore d'historique."
	});

	// Inline colorpicker
	$('#getVal2').on('click', function(){
		//alert('Selected color = "' + $('#cpDiv').colorpicker("val") + '"');
		var color = $('#cpDiv').colorpicker("val");
		$(".khung").css("border-color", color+" #FFF #FFF "+color);
		$(".tieudeduoi").css("border-color", color);
		$(".tieudeduoi").css("color", color);
		$(".tieude").css("color", color);
		$(".rightbottom").css("border-color", color);
		$(".hr").css("border-color", color);
	});
	$('#setVal2').on('click', function(){
		$('#cpDiv').colorpicker("val",'#31859b');
	});
	$('#enable2').on('click', function(){
		$('#cpDiv').colorpicker("enable");
	});
	$('#disable2').on('click', function(){
		$('#cpDiv').colorpicker("disable");
	});
	$('#destroy2').on('click', function(){
		$('#cpDiv').colorpicker("destroy");
	});

	// Fix links
	$('a[href="#"]').attr('href', 'javascript:void(0)');

});


    $(function() {
	    $( "#dialog" ).dialog({
	      autoOpen: false,
	      show: {
	        effect: "blind",
	        duration: 1000
	      },
	      hide: {
	        effect: "explode",
	        duration: 1000
	      }
	    });
	 
	    $( "#opener" ).click(function() {
	      $( "#dialog" ).dialog( "open" );
	    });
  });

</script>
<style type="text/css">
	.khung{
		border: solid 20px #F8F8FF;
		width: 100%;
		height: 95%;
		border-color: #00B2EE #FFF #FFF #00B2EE;
	}

	.imgtruoc{
		width: 100%;
		height: 90%;
	}
	.imglogo{
		/*width: 50px;
		height: 50px;*/
	}
	.p{
		border: none;
		width: 100%;
		font-size: 15px;
		text-align: justify;
		max-height: 300px;
		overflow: hidden;
		line-height: 1.5;
		font-family: Arial, Helvetica, sans-serif;
	}
	.tieudeduoi{
		border-radius: 0px 20px 20px 0px;
		background-color: #FFF;
		border: solid 2px #00B2EE;
		margin-left: -20px;
		width: 100%;
		height: 25px;
		font-size: 20px;
		font-weight: bold;
		text-align: center;
		color: #00B2EE;
	}
	.rightbottom{
		font-size: 15px;
		padding: 5px;
		text-align: left;
		border-radius: 0px 0px 0px 30px;
		border: solid 2px #00B2EE;
		height: 320px;
		line-height: 1.5;
	}
	.rightbottom1{
		width: 100%; 
		height: 110px; 
	}
	.map{
		border: none;
		height: 150px; 
		overflow: hidden; 
		border: solid 1px #000;
	}
	.tieude{
		margin-left: 20px; 
		color: #00B2EE;
	}
	.hr{
		border-color: #00B2EE;
	}
</style>
</head>

<!-- <input type="button" onclick="printDiv('printableArea')" value="print a div!" />
 -->
<div id="dialog" title="<?php echo lang('select').' '.lang('colors'); ?>">
  	<div class="demoPanel">
		<div id="cpDiv"></div>
		<br/>
		<div class="demo-links">
			<a href="#" id="getVal2"><?php echo lang('apply'); ?></a> | 
			<a href="#" id="setVal2"><?php echo lang('set_value'); ?></a><br/>
			<a href="#" id="enable2"><?php echo lang('enable'); ?></a> | 
			<a href="#" id="disable2"><?php echo lang('disable'); ?></a>
			<!-- <a href="#" id="destroy2">Destroy</a> -->
			<br/><br/>
		</div> 
	</div>
</div>

<section id="about-us">
	<div  align="center" id="printableArea" class="container">
		<div class="khung">
			<table style="width: 100%; height: 100%;" border="0">
				<tr>
					<td height="20%">
						<div style="cursor: pointer;" onclick="window.print();" class="tieude">
							<b style="font-size: 50px;"><?php echo $data['DD_TEN']; ?></b> <br/>
							<i style="font-size: 40px;"><?php echo $data['H_TEN']; ?> - <?php echo $data['T_TEN']; ?></i>
						</div>
					</td>
					<td>
						<div style="cursor: pointer;" id="opener" align="center" style="">
							<?php //echo $data['DD_TEN']; ?>
							<img class="imglogo" src="<?php echo base_url(); ?>assets/images/logo2.png">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<img style="width: 100%; height: 100%;" class="imgtruoc" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $data['HA_TEN']; ?>">
					</td>
				</tr>
			</table>
		</div>
		<div class="khung" style="margin-top: 50px;">
			<table style=" width: 100%; height: 100%;" border="0">
				<tr>
					<td width="70%">
						<table style="width: 100%; height: 100%;" border="0">
							<tr>
								<td style="cursor: pointer;" onclick="window.print();">
									<b style="font-size: 40px;"><?php echo $data['DD_TEN']; ?></b> <br/>
									<i style="font-size: 30px;"><?php echo $data['H_TEN']; ?> - <?php echo $data['T_TEN']; ?></i>
									<hr class="hr" style="margin: 10px 0px 0px 0px;" />
								</td>
							</tr>
							<tr>
								<td valign="top" style="font-size: 20px; font-weight: bolder; height: 70%; overflow: hidden;">
									Mô tả: <br/>
									<textarea rows="7" class="p">
										<?php echo $data['DD_MOTA']; ?>
									</textarea>
									<img style="width: 100%; height: 30%; margin-bottom: 10px;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $data['HA_TEN']; ?>">
									Giới thiệu: <br/>
									<textarea rows="20" class="p">
										<?php echo $data['DD_GIOITHIEU']; ?>
									</textarea>
								</td>
							</tr>
							<tr>
								<td>
									<div class="tieudeduoi">
										Website: [http://smartmekong.vn/dulich]
									</div>
								</td>
							</tr>
						</table>
					</td>
					<td>
						<table style="width: 100%; height: 100%;" border="0">
							<tr>
								<td valign="top" align="center" height="10%">
									<div class="map">
										<div style="margin-top: -140px; margin-left: 0px; border: none;">
											<?php echo $map['js']; ?>
					                    	<?php echo $map['html']; ?>
										</div>
									</div>
		                    		<div align="center" style="font-size: 15px; line-height: 1.5;">
										<?php echo $data['DD_VITRI']; ?>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top" class="rightbottom">
									<?php 
										$diadiem = $sdt = $website = lang('information_is_being_updated');
										if($data['DD_DIACHI'])
										{
											$diadiem = $data['DD_DIACHI'];
										}
										if($data['DD_SDT'])
										{
											$sdt = $data['DD_SDT'];
										}
										if($data['DD_WEBSITE'])
										{
											$website = $data['DD_WEBSITE'];
										}
									?>
									Địa chỉ: <br>
									<?php echo $diadiem; ?> <hr class="hr" style="margin: 5px 0px 5px 0px;" />
									Ngày bắt đầu: <br>
									<?php echo $data['DD_BATDAU']; ?> <hr class="hr" style="margin: 5px 0px 5px 0px;" />
									Ngày kết thúc: <br>
									<?php echo $data['DD_KETTHUC']; ?> <hr class="hr" style="margin: 5px 0px 5px 0px;" />
									Số điện thoại: <br>
									<?php echo $sdt; ?> <hr class="hr" style="margin: 5px 0px 5px 0px;" />
									Website: <br>
									<?php echo $website; ?> <hr class="hr" style="margin: 5px 0px 5px 0px;" />
								</td>
							</tr>
							<tr>
								<td valign="bottom" align="center" height="10%">
									<img src="<?php echo base_url(); ?>assets/images/logo2.png">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div> 
	</div>
	<?php //echo print_r($data) ?>
</section>