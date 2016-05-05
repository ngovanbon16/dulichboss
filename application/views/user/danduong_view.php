<head>
    <?php echo $map['js']; ?>
    <script type="text/javascript">
        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;

             document.body.innerHTML = printContents;

             window.print();

             document.body.innerHTML = originalContents;
        }
        function onload()
        {
            var danduong = document.getElementById("directionsDiv").innerHTML;
            document.getElementById("directionsDiv").innerHTML = "<h2><?= $info['DD_TEN']; ?></h2>"+danduong;
        }
    </script>
</head>
<body onload="onload()">
<section style="margin-top: -80px; margin-bottom: -80px;" id="contact-info">
    <div class="gmap-area">
        <div class="container">
        	<div class="row">
        		<div class="col-sm-8 map-content">
					<?php echo $map['html']; ?>
        		</div>
                <div style="text-align: left;" class="col-sm-4 text-center">
                    <img style="width: 25px; height: 25px; cursor: pointer;" src="<?php echo base_url(); ?>assets/images/print.png" onclick="printDiv('directionsDiv')">
                	<div style="text-align: left; max-height: 450px; overflow: auto;" id="directionsDiv"></div>
                </div>
            </div>
		</div>
	</div>
</section>
</body>