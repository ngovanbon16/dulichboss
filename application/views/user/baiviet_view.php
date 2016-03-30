<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
	<script>
		<?php 
			$lang = "vi";
			if(lang('lang') == "en")
			{
				$lang = "en";
			}
		?>
		var language = "<?php echo $lang; ?>";
	    window.onload = function() {
	        CKEDITOR.replace( 'BV_NOIDUNG',
		        {
		        	language : language,
					uiColor : '#F8F8FF',
					height : 300,
					toolbarCanCollapse : true
		        }
	        );
	        
	    };

	    $(document).ready(function(){
	    	$("#btngui").click(function(){
	    		var BV_NOIDUNG = CKEDITOR.instances.BV_NOIDUNG.getData();
	    		var BV_TIEUDE = $("#BV_TIEUDE").val();

	    		if(BV_TIEUDE == "")
              	{
	                document.getElementById('BV_TIEUDE').style.backgroundColor = "#F99";
	                $("#BV_TIEUDE").focus();
	                thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('title') ?>", "danger");
	                return;
              	}
              	else
              	{
               	 	document.getElementById('BV_TIEUDE').style.backgroundColor = "#FFF";
              	}

              	if(BV_NOIDUNG == "")
              	{
	                document.getElementById('BV_NOIDUNG').style.backgroundColor = "#F99";
	                $("#BV_NOIDUNG").focus();
	                thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('content') ?>", "danger");
	                return;
              	}
              	else
              	{
               	 	document.getElementById('BV_NOIDUNG').style.backgroundColor = "#FFF";
              	}

	    		var url, data;
	    		url = "<?php echo base_url(); ?>index.php/baiviet/add?t=" + Math.random();
	    		data = {
	    			"DD_MA" : "<?php echo $DD_MA; ?>",
	    			"BV_TIEUDE" : BV_TIEUDE,
	    			"BV_NOIDUNG" : BV_NOIDUNG,
	    			"BV_DUYET" : '0'
	    		};
	    		console.log(data);
	    		$.post(url, data, function(data, status){
	    			console.log(data);
	    			if(status == "success")
	    			{
	    				if(data.status == "success")
	    				{	
	    					thongbao("", "<?php echo lang('inserted_successfully'); ?>", "success");
	    				}
	    				else
	    				{
	    					thongbao("", "Không thành công", "danger");
	    				}
	    			}
	    			else
	    			{
	    				thongbao("", "Lỗi không truyền được dữ liệu!", "danger");
	    			}
	    			
	    		}, 'json');
	    	});
	    });

	</script>
</head>
<body>
	<section id="partner">
		<h1><?php echo $DD_TEN; ?> [<?php echo $DD_MA; ?>]</h1>
	    <div class="container" align="left">
	    	<div class="form-group">
	    		<table width="100%">
	    			<tr>
	    				<td width="40%">
	    					<label for="BV_TIEUDE"><?php echo lang('title'); ?>:</label>
			  				<input type="text" class="form-control" id="BV_TIEUDE" placeholder="<?php echo lang('input').' '.lang('title'); ?>">
	    				</td>
	    				<td valign="bottom" align="left">
	    					<button id="btngui" style="margin-left: 10px; width: 100px;" type="button" class="btn btn-default"><?php echo lang('submit'); ?></button>
	    				</td>
	    			</tr>
	    		</table>
			  	
			</div>
			
			<div class="form-group">
			  	<label for="usr"><?php echo lang('content'); ?>:</label>
				<textarea name="BV_NOIDUNG" id="BV_NOIDUNG">&lt;p&gt;<?php //echo lang('input').' '.lang('content'); ?>&lt;/p&gt;</textarea>
			</div>
		</div>
	</section>
</body>
</html>