<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="2cwebvn" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/timkiem/js/jquery.watermark.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#faq_search_input").watermark("<?php echo lang('enter').' '.lang('place_name').', '.lang('category').', '.lang('district').', '.lang('provincial').'...'; ?>");	// Watermart cho khung nhập

function search()
{
	var faq_search_input = $("#faq_search_input").val();   		// Lấy giá trị search của người dùng
	var dataString = 'keyword='+ faq_search_input;	// Lấy giá trị làm tham số đầu vào cho file ajax-search.php
	if(faq_search_input.length>1)					// Kiểm tra giá trị người nhập có > 3 ký tự hay ko
	{
		$.ajax({
			type: "GET",      						// Phương thức gọi là GET
			url: "<?php echo base_url(); ?>index.php/user/search",  				// File xử lý
			data: dataString,						// Dữ liệu truyền vào
			beforeSend:  function() {				// add class "loading" cho khung nhập
				$('input#faq_search_input').addClass('loading');
			},
			success: function(server_response)		// Khi xử lý thành công sẽ chạy hàm này
			{
				$('#searchresultdata').html(server_response).show();  	// Hiển thị dữ liệu vào thẻ div #searchresultdata
				$('span#faq_category_title').html(faq_search_input);	// Hiển thị giá trị search của người dùng
				
				if ($('input#faq_search_input').hasClass("loading")) {		// Kiểm tra class "loading"
					$("input#faq_search_input").removeClass("loading");		// Remove class "loading"
				} 
			}
		});
	}return false;		// Không chuyển trang
}

$("#btn").click(function()
{
	search();
});

$('#faq_search_input').keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if (keycode == '13') {
    search();
  }
});

});
</script>

<style type="text/css">
	.title{
		font-size: 20px;
	}
	a{
		color: #B9D3EE;
	}
	.mota{
		font-size: 15px;
		color: #FFF; 
	}
</style>

</head>
<body>
<section style="margin-top: -80px;" id="partner">
    <div class="container">
    	<a name="name"></a>
		<center><h1><?php echo lang('search').' '.lang('place'); ?></h1></center>
	    <h3 id="faq_title"> <strong><?php echo lang('search_with_keyword'); ?> : </strong> <span id="faq_category_title"><?php echo lang('keyword'); ?> </span> </h3>

	    <center> 
	    	<b>Qui tắc: Tên địa điểm, loại địa điểm, tên huyện, tên tỉnh (Phải theo thứ tự và nếu không có thì để 'x'). <br/>VD: Tìm loại điểm địa tham quan tại cần thơ thì nhập: x, tham quan, x, can tho</b>
	    	<a href="#name">
	    		<input name="query" type="text" class="form-control" id="faq_search_input" style="width: 45%;" />
	    		<button style="color: #000;" id="btn" type="button" class="btn btn-default"><?php echo lang('search'); ?></button>
	    	</a>
	    </center>
	    <div align="left" style=" overflow: auto; height: 450px; margin: 0px 150px 0px 150px;" id="searchresultdata" class="faq-articles"> </div>
		    
	</div>
</section>
</body>
</html>