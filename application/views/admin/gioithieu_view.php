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
	        CKEDITOR.replace( 'TT_GIOITHIEU',
		        {
		        	language : language,
					uiColor : '#F8F8FF',
					height : 300,
					toolbarCanCollapse : true
		        }
	        );

	        CKEDITOR.replace( 'TT_LIENHE',
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

	    		var TT_GIOITHIEU = CKEDITOR.instances.TT_GIOITHIEU.getData();
	    		var TT_LIENHE = CKEDITOR.instances.TT_LIENHE.getData();

              	if(TT_GIOITHIEU == "")
              	{
	                $("#TT_GIOITHIEU").focus();
	                thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('introduce') ?>", "danger");
	                return;
              	}

              	if(TT_LIENHE == "")
              	{
	                $("#TT_LIENHE").focus();
	                thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('contact') ?>", "danger");
	                return;
              	}

	    		var url, data;
	    		url = "<?php echo base_url(); ?>index.php/thongtin/update?t=" + Math.random();
	    		data = {
	    			"TT_GIOITHIEU" : TT_GIOITHIEU,
	    			"TT_LIENHE" : TT_LIENHE
	    		};
	    		console.log(data);
	    		$.post(url, data, function(data, status){
	    			console.log(data);
	    			if(status == "success")
	    			{
	    				if(data.status == "success")
	    				{
	    					thongbao("", "<?= lang('updated_successfully'); ?>", "success");
	    				}
	    				else
	    				{
	    					thongbao("", "<?= lang('error'); ?>", "danger");
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
	<style type="text/css">
		label{
			font-size: 20px;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<section id="partner">
		<div class="form-group">
		  	<label for="usr"><?php echo lang('introduce'); ?>: (<b style="color: #D00;">*</b>)</label>
			<textarea name="TT_GIOITHIEU" id="TT_GIOITHIEU"><?= $gioithieu["TT_GIOITHIEU"]; ?></textarea>

			<label for="usr"><?php echo lang('contact'); ?>: (<b style="color: #D00;">*</b>)</label>
			<textarea name="TT_LIENHE" id="TT_LIENHE"><?= $gioithieu["TT_LIENHE"]; ?></textarea>
		</div>
		<button id="btngui" style="margin-left: 10px; width: 100px;" type="button" class="btn btn-default"><?php echo lang('save'); ?></button>
	</section>
</body>
</html>