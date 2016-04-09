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

<head>
	<?php 
		$str = trim($vitri);
		$length = strlen($str);
		$start = strpos($str, ',' );
		$lang = substr( $str,  $start + 1, $length - $start);
		$lat = substr( $str, '0', $length - strlen($lang) - 1 );
	?>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        var markers = [
	    {
	        "title": 'Aksa Beach',
	        "lat": '<?php echo $lat; ?>',
	        "lng": '<?php echo $lang; ?>',
	        "description": 'Aksa Beach is a popular beach and a vacation spot in Aksa village at Malad, Mumbai.'
	    }
	    ];
	    window.onload = function () {
	        LoadMap();
	    }
	    var map, mapOptions;
	    function LoadMap() {
	        mapOptions = {
	            center: new google.maps.LatLng(<?php echo $vitri; ?>),
	            zoom: 6,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
	        /*map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

	        for (var i = 0; i < markers.length; i++) {
	            var data = markers[i];
	            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
	            var marker = new google.maps.Marker({
	                position: myLatlng,
	                map: map,
	                title: data.title
	            });
	        }*/
	    };
	    function Export() {
	        //URL of Google Static Maps.
	        var staticMapUrl = "https://maps.googleapis.com/maps/api/staticmap";

	        //Set the Google Map Center.
	        staticMapUrl += "?center=" + mapOptions.center.G + "," + mapOptions.center.K;

	        //Set the Google Map Size.
	        staticMapUrl += "&size=150x120";

	        //Set the Google Map Zoom.
	        staticMapUrl += "&zoom=" + mapOptions.zoom;

	        //Set the Google Map Type.
	        staticMapUrl += "&maptype=" + mapOptions.mapTypeId;

	        //Loop and add Markers.
	        for (var i = 0; i < markers.length; i++) {
	            staticMapUrl += "&markers=color:red|" + markers[i].lat + "," + markers[i].lng;
	        }

	        //Display the Image of Google Map.
	        var imgMap = document.getElementById("imgMap");
	        imgMap.src = staticMapUrl;
	        imgMap.style.display = "block";
	    }

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
				/*alert('Selected color = "' + $('#cp1').colorpicker("val") + '"');*/

				var color = $('#cpDiv').colorpicker("val");
				
				$(".khung1").css("border-color", color+" #FFF #FFF "+color);
				$(".tieude").css("color", color);
				$(".rightbottom").css("border-color", color);
				$(".hr").css("border-color", color);
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
				$(".khung").css("border-color", color);
				$("#khung1").css("border-color", color+" #FFF #FFF "+color);
				$("#khung2").css("border-color", color+" #FFF #FFF "+color);
				$(".tieude").css("color", color);
				$(".tieudeduoi").css("border-color", color);
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

		    $( "#dialog1" ).dialog({
		      autoOpen: false,
		      width: 500,
		      show: {
		        effect: "blind",
		        duration: 1000
		      },
		      hide: {
		        effect: "explode",
		        duration: 1000
		      }
		    });
		 
		    $( "#opener1" ).click(function() {
		      $( "#dialog1" ).dialog( "open" );
		    });

		});

		function change(tenhinh)
		{
			//alert(tenhinh);
			$('.imgtruoc').attr({
		        'src': '<?php echo base_url(); ?>uploads/diadiem/'+tenhinh,
		        'alt': 'Ảnh đại diện'
		    });
		}
    </script>
</head>

<style type="text/css">
	.khung{
		border: solid 1px #00B2EE;
		width: 650px;
		height: 950px;
	}

	#khung1{
		border: solid 20px #000;
		width: 610px;
		height: 910px;
		border-color: #00B2EE #FFF #FFF #00B2EE; 
	}

	#khung2{
		border: solid 20px #000;
		width: 610px;
		height: 910px;
		border-color: #00B2EE #FFF #FFF #00B2EE; 
	}

	.tieudetruoc{
		color: #00B2EE;
		padding-left: 20px;
		padding-top: 15px;
		height: 15%;
	}

	.imgtruoc{
		width: 100%;
		height: 100%;
	}

	.imglogo{

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
		border-radius: 0px 0px 0px 0px;
		width: 100%;
		height: 0px;
		margin-left: -10px;
		font-size: 20px;
		text-align: center;
		border: solid 15px #00B2EE; 
	}

	.rightbottom{
		font-size: 15px;
		padding: 5px;
		text-align: left;
		border-radius: 0px 0px 0px 30px;
		border: solid 1px #00B2EE; 
		height: 80%;
		line-height: 1.5;
	}

	.hr{
		margin: 5px 0px 5px 0px;
		border: solid 1px #00B2EE; 
	}

	.img{
		margin-right: 5px; 
		width: 100px; 
		height: 100px;
		border-radius: 3px;
		cursor: pointer;
	}
</style>

<body onload="Export()">

<img style="width: 32px; height: 32px; cursor: pointer; margin-right: 10px; margin-left: 50px;" src="<?php echo base_url(); ?>assets/images/print.png" onclick="printDiv('mydiv')">
<img style="width: 32px; height: 32px; cursor: pointer; margin-right: 10px;" src="<?php echo base_url(); ?>assets/images/color.png" id="opener">

<img style="width: 32px; height: 32px; cursor: pointer;" src="<?php echo base_url(); ?>assets/images/img.png" id="opener1">

<!-- <input type="button" value="Print Div" onclick="PrintElem('#mydiv')" /> -->

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

<div id="dialog1" title="<?php echo lang('select').' '.lang('colors'); ?>">
  	<div style="max-height: 400px; overflow: auto;" class="demoPanel">
  		<?php 
  			foreach ($hinhanh as $row) {
  				$tenhinh = $row["HA_TEN"];
			?>
				<img class="img" onclick="change('<?php echo $tenhinh; ?>')" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $tenhinh; ?>">
			<?php
  			}
  		?>
  </div>
</div>

<!-- <table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <div id="dvMap" style="width: 120px; height: 120px">
            </div>
        </td>
        <td>
            &nbsp; &nbsp;
        </td>
        <td>
            <img id="imgMap1" alt="" style="display: none" />
        </td>
    </tr>
</table>
<br /> -->
<!-- <input type="button" id="btnExport" value="Export" onclick="Export()" /> -->

<section id="about-us">
	<div id="mydiv" class="container">
		<div class="khung" style="float: left; margin-bottom: 30px;">
			<div id="khung1">
				<table style="height: 100%; width: 100%;" border="0">
					<tr>
						<td valign="top" class="tieudetruoc">
							<b class="tieude" style="font-size: 50px;"><?php echo $data['DD_TEN']; ?></b> <br/>
							<i class="tieude" style="font-size: 30px;"><?php echo $data['H_TEN']; ?> - <?php echo $data['T_TEN']; ?></i>
						</td>
						<td valign="top" align="right">
							<img style="margin-top: 20px;" class="imglogo" src="<?php echo base_url(); ?>assets/images/logo.png">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<img class="imgtruoc" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $data['HA_TEN']; ?>">
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="khung" style="float: left; ">
			<div id="khung2">
				<table style="width: 100%; height: 100%;" border="0">
					<tr>
						<td class="tieudetruoc" style="padding-right: 10px;">
							<b class="tieude" style="font-size: 40px;"><?php echo $data['DD_TEN']; ?></b> <br/>
							<i class="tieude" style="font-size: 25px;"><?php echo $data['H_TEN']; ?> - <?php echo $data['T_TEN']; ?></i>
							<hr class="hr" />
						</td>
						<td>
							<div style=" border: none;">
								<img id="imgMap" alt="" style="display: none" />
							</div>
							<div align="center" style="font-size: 15px; line-height: 1.5;">
								<?php echo $data['DD_VITRI']; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td valign="top" style="padding-right: 10px; padding-left: 10px;">
							Mô tả: <br/>
							<textarea rows="6" class="p">
								<?php echo $data['DD_MOTA']; ?>
							</textarea>
							<img style="width: 100%; height: 120px; margin-bottom: 10px; margin-top: 10px;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $data['HA_TEN']; ?>">
							Giới thiệu: <br/>
							<textarea rows="20" class="p">
								<?php echo $data['DD_GIOITHIEU']; ?>
							</textarea>
						</td>
						<td>
							<div class="rightbottom">
								<h3 style="margin: 0px 0px 0px 0px;"><?php echo lang('information'); ?></h3>
								<hr class="hr" />
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
								<?php echo $diadiem; ?> <hr class="hr" />
								Ngày bắt đầu: <br>
								<?php echo $data['DD_BATDAU']; ?> <hr class="hr" />
								Ngày kết thúc: <br>
								<?php echo $data['DD_KETTHUC']; ?> <hr class="hr" />
								Số điện thoại: <br>
								<?php echo $sdt; ?> <hr class="hr" />
								Website: <br>
								<?php echo $website; ?> <hr class="hr" />
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="tieudeduoi">
								<div style="margin-top: -10px;"> Website: [http://smartmekong.vn/dulich] </div>
							</div>
						</td>
						<td height="5%">
							<img class="imglogo" src="<?php echo base_url(); ?>assets/images/logo2.png">
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>
</body>