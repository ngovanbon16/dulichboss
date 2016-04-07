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
</head>

<style type="text/css">
	.khung{
		border: solid 1px #F8F8FF;
		width: 500px;
		height: 600px;
	}
	.khung1{
		margin: 10px;
		border: solid 10px #000;
		width: 480px;
		height: 580px;
		border-color: #00B2EE #FFF #FFF #00B2EE; 
	}
	.imgtruoc{
		width: 465px;
		height: 480px;
	}
	.imglogo{
		/*width: 50px;
		height: 50px;*/
	}
	.p{
		border: none;
		width: 100%;
		font-size: 11px;
		text-align: justify;
		max-height: 166px;
		overflow: hidden;
		line-height: 1.5;
		font-family: Arial, Helvetica, sans-serif;
	}
	.tieudeduoi{
		border-radius: 0px 10px 10px 0px;
		background-color: #00B2EE;
		width: 103%;
		height: 23px;
		margin-left: -10px;
		font-size: 11px;
		font-weight: bold;
		text-align: center;
		color: #FFF;
		vertical-align: bottom;
	}
	.rightbottom{
		font-size: 11px;
		padding: 5px;
		text-align: left;
		border-radius: 0px 0px 0px 30px;
		border: solid 1px #000;
		border-color: #FFF #FFF #00B2EE #00B2EE; 
		height: 320px;
		line-height: 1.5;
	}
	.rightbottom1{
		width: 100%; 
		height: 110px; 
	}
	.map{
		border: none;
		height: 120px; 
		border: solid 1px #000;
	}
</style>

<body onload="Export()">

<input type="button" onclick="printDiv('mydiv')" value="In áp phít" />
<input type="button" id="opener" value="Đổi màu" />

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
		<div class="khung" style="float: left; margin-right: 20px;">
			<div class="khung1">
				<div style="float: left; width: 60%; margin: 10px 0px 0px 10px; color: #00B2EE;">
					<b style="font-size: 20px;"><?php echo $data['DD_TEN']; ?></b> <br/>
					<i><?php echo $data['H_TEN']; ?><i class="fa fa-angle-double-right fa-fw"></i><?php echo $data['T_TEN']; ?></i>
				</div>
				<div style="text-align: right; float: right; width: 35%; margin: 10px 0px 0px 0px;">
					<?php //echo $data['DD_TEN']; ?>
					<img class="imglogo" src="<?php echo base_url(); ?>assets/images/logo.png">
				</div>
				<div style="width: 100%; height: 100%; margin-top: 80px;">
					<img style="width: 100%;" class="imgtruoc" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $data['HA_TEN']; ?>">
				</div>
			</div>
		</div>
		<div class="khung" style="float: left; margin-right: 20px;">
			<div class="khung1">
				<div style="float: left; width: 65%; height: 550px; margin: 10px 0px 0px 10px; ">
					<div style="height: 70px;">
						<b style="font-size: 20px;"><?php echo $data['DD_TEN']; ?></b> <br/>
						<i><?php echo $data['H_TEN']; ?><i class="fa fa-angle-double-right fa-fw"></i><?php echo $data['T_TEN']; ?></i>
					</div>
					<hr style="margin: 10px 0px 10px 0px;" />
					<div style="height: 430px; overflow: hidden;">
						Mô tả: <br/>
						<textarea rows="6" class="p">
							<?php echo $data['DD_MOTA']; ?>
						</textarea>
						<img style="width: 100%; height: 100px; margin-bottom: 10px;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $data['HA_TEN']; ?>">
						Giới thiệu: <br/>
						<textarea rows="10" class="p">
							<?php echo $data['DD_GIOITHIEU']; ?>
						</textarea>
					</div>
					<div valign="bottom" class="tieudeduoi">
						Website: [http://smartmekong.vn/dulich]
					</div>
				</div>
				<div style="text-align: right; float: right; width: 30%; height: 550px; margin: 10px 0px 0px 0px;">
					
					<div class="map">
						<div style=" border: none;">
							<img id="imgMap" alt="" style="display: none" />
						</div>
					</div>
					<div align="center" style="font-size: 9px; line-height: 1.5;">
						<?php echo $data['DD_VITRI']; ?>
					</div>
					<div class="rightbottom">
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
						<?php echo $diadiem; ?> <hr style="margin: 5px 0px 5px 0px;" />
						Ngày bắt đầu: <br>
						<?php echo $data['DD_BATDAU']; ?> <hr style="margin: 5px 0px 5px 0px;" />
						Ngày kết thúc: <br>
						<?php echo $data['DD_KETTHUC']; ?> <hr style="margin: 5px 0px 5px 0px;" />
						Số điện thoại: <br>
						<?php echo $sdt; ?> <hr style="margin: 5px 0px 5px 0px;" />
						Website: <br>
						<?php echo $website; ?> <hr style="margin: 5px 0px 5px 0px;" />
					</div>
					<div class="rightbottom1">
						<img style="width: 100px; height: 82px; margin-top: 25px;" class="imglogo" src="<?php echo base_url(); ?>assets/images/logo2.png">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</body>