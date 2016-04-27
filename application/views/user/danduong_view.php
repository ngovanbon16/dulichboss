<head>
    <?php echo $map['js']; ?>
</head>
<section style="margin-top: -80px; margin-bottom: -80px;" id="contact-info">
    <div class="gmap-area">
        <div class="container">
        	<div class="row">
        		<div class="col-sm-8 map-content">
					<?php echo $map['html']; ?>
        		</div>
                <div class="col-sm-4 text-center">
                	<div style="text-align: left; max-height: 450px; overflow: auto;" id="directionsDiv"></div>
                </div>
            </div>
		</div>
	</div>
</section>