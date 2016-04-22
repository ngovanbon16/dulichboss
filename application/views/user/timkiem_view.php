<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?= $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="2cwebvn" />
<script type="text/javascript" src="<?= base_url(); ?>assets/timkiem/js/jquery.watermark.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#faq_search_input").watermark("<?= lang('enter').' '.lang('place_name').', '.lang('category').', '.lang('district').', '.lang('provincial').'...'; ?>");	// Watermart cho khung nhập

function search()
{
	var faq_search_input = $("#faq_search_input").val();   		// Lấy giá trị search của người dùng
	var dataString = 'keyword='+ faq_search_input;	// Lấy giá trị làm tham số đầu vào cho file ajax-search.php
	if(faq_search_input.length>1)					// Kiểm tra giá trị người nhập có > 3 ký tự hay ko
	{
		$.ajax({
			type: "GET",      						// Phương thức gọi là GET
			url: "<?= base_url(); ?>index.php/user/search",  				// File xử lý
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

function search1()
{
	var txttendiadiem = $("#txttendiadiem").val();   		// Lấy giá trị search của người dùng
	var txtdanhmuc = $("#txtdanhmuc").val(); 
	var txttinh = $("#txttinh").val(); 
	var txthuyen = $("#txthuyen").val(); 
	var dataString = 'keyworddd='+ txttendiadiem + '&keyworddm=' + txtdanhmuc + '&keywordt=' + txttinh + '&keywordh=' + txthuyen;	
	$.ajax({
		type: "GET",      						// Phương thức gọi là GET
		url: "<?= base_url(); ?>index.php/user/search1",  				// File xử lý
		data: dataString,
		success: function(server_response)		// Khi xử lý thành công sẽ chạy hàm này
		{
			$('#searchresultdata').html(server_response).show();
		}
	});
}

$("#txttinh").change(function()
{
	var txttinh = $("#txttinh").val();
	var url = "<?= base_url(); ?>index.php/huyen/data/" + txttinh;
	$.ajax({
        url : url,
        type : 'post',
        dataType : 'json',
        //data : data,
        success : function (data){
            //console.log(data);
            var str = '<option value="" ><?= lang("select")." ".lang("district") ?></option>';
            for (var i = 0; i < data.length; i++) {
                str += '<option value="'+data[i]['H_MA']+'">'+data[i]['H_TEN']+'</option>';
            }
            document.getElementById("txthuyen").innerHTML = str;
        }
    });

});

$("#btn").click(function()
{
	search();
	search1();
});

$("#btnchung").click(function()
{
	$("#chung").show();
	$("#chitiet").hide();
	$("#btnchung").css("color", "#000");
	$("#btnchitiet").css("color", "#B9D3EE");
});

$("#btnchitiet").click(function()
{
	$("#chung").hide();
	$("#chitiet").show();
	$("#btnchung").css("color", "#B9D3EE");
	$("#btnchitiet").css("color", "#000");
});

$('#faq_search_input').keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if (keycode == '13') {
    search();
  }
});

$('#txttendiadiem').keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if (keycode == '13') {
    search1();
  }
});

$('#txtdanhmuc').change(function(event){
  	search1();
});

$('#txttinh').change(function(event){
  	search1();
});

$('#txthuyen').change(function(event){
  	search1();
});

});
</script>

<style type="text/css">
	.title{
		font-size: 20px;
	}
	.a{
		color: #1AA5D1;
		font-size: 16px;
		font-weight: bold;
		cursor: pointer;
	}
	a{
		color: #1AA5D1;
	}
	.mota{
		font-size: 15px;
		color: #1AA5D1; 
	}
</style>

</head>
<body>
<section style="margin-top: -50px; background-color: #DCDCDC;" >
    <div style="border: solid 1px #DCDCDC; border-radius: 3px;" class="container">
    	<a name="name"></a>
		<center><h1 style="color: #000;"><?= lang('search').' '.lang('place'); ?></h1></center>
	    <h3 id="faq_title" style="display: none;"> <strong><?= lang('search_with_keyword'); ?> : </strong> <span id="faq_category_title"><?= lang('keyword'); ?> </span> </h3>

	    <center> 
	    	<a class="a" id="btnchung" style="color: #000;"><?= lang('general_search'); ?></a> | 
	    	<a class="a" id="btnchitiet"><?= lang('detailed_search'); ?></a>
	    	<!-- <b>Qui tắc: Tên địa điểm, loại địa điểm, tên huyện, tên tỉnh (Phải theo thứ tự và nếu không có thì để 'x'). <br/>VD: Tìm loại điểm địa tham quan tại cần thơ thì nhập: x, tham quan, x, can tho</b> -->
	    	<form>	
	    	<div id="chung">
	    		<div style="text-align: left; max-width: 500px;" class="form-group">
                    <label><?= lang('search') ?></label>
                    <a href="#name"><input name="query" type="text" class="form-control" id="faq_search_input" style="width: 100%;" /></a>
                </div>
            </div>
            <div id="chitiet" style="display: none;">
            	
	    		<div style="text-align: left; max-width: 300px;" class="form-group">
                    <label><?= lang('name').' '.lang('place'); ?></label>
                    <a href="#name"><input type="text" id="txttendiadiem" placeholder="" class="form-control" ></a>
                </div>
				<div style="text-align: left; max-width: 300px;" class="form-group">
                    <label><?= lang('category') ?></label>
                    <!-- <input type="text" id="txtdanhmuc" placeholder="" class="form-control" > -->
                    <select class="form-control" id="txtdanhmuc">
                    	<option value=""><?= lang('select').' '.lang('category') ?></option>
				        <?php 
				        	foreach ($danhmuc as $row) {
				        		echo '<option value="'.$row['DM_MA'].'">'.$row['DM_TEN'].'</option>';
				        	}
				        ?>
				    </select>
                </div>
                <div style="text-align: left; max-width: 300px;" class="form-group">
                    <label><?= lang('provincial') ?> </label>
                    <!-- <input type="text" id="txttinh" placeholder="" class="form-control" > -->
                    <select class="form-control" id="txttinh">
                    	<option value=""><?= lang('select').' '.lang('provincial') ?></option>
				        <?php 
				        	foreach ($tinh as $row) {
				        		echo '<option value="'.$row['T_MA'].'">'.$row['T_TEN'].'</option>';
				        	}
				        ?>
				    </select>
                </div>
                <div style="text-align: left; max-width: 300px;" class="form-group">
                    <label><?= lang('district') ?></label>
                    <!-- <input type="text" id="txthuyen" placeholder="" class="form-control" > -->
                    <select class="form-control" id="txthuyen">
                    	<option value=""><?= lang('select').' '.lang('district') ?></option>
				    </select>
                </div>  
                <div style="max-width: 300px;" class="form-group">
                	
                </div>
                  
	    	</div>

	    	<div style="max-width: 300px;" class="form-group">
	    		<button style="font-size: 13px; color: #000; width: 50%; float: left;" type="reset" class="btn btn-default"><?= lang('reset'); ?></button>
    			<button style="font-size: 13px; color: #000; width: 50%;" id="btn" type="button" class="btn btn-default"><?= lang('search'); ?></button>
    		</div>
	  		</form> 
	    </center>
	    <div align="left" style="border: solid 1px #FFF; background-color: #F8F8FF; border-radius: 3px; overflow: auto; height: 450px; margin: 0px 0px 0px 0px;" id="searchresultdata" class="faq-articles"> </div>
		    
	</div>
</section>
</body>
</html>