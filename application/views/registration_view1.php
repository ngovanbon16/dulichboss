<html>
<head>
	<meta charset=utf-8>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/style_login.css">
	<script language="javascript" type="text/javascript">
		$(document).ready(function(e)
		{
			$("#button").click(function()
			{
				var url, dta;
				url="<?php echo base_url(); ?>index.php/registration/registration?t=" + Math.random();
				dta = {
					"ho" : $("#registration :text[name='ho']").val(),
					"ten" : $("#registration :text[name='ten']").val(),
					"email" : $("#registration :text[name='email']").val(),
					"matkhau" : $("#registration :password[name='matkhau']").val(),
					"matkhau1" : $("#registration :password[name='matkhau1']").val()
				};

				$.post(url, dta, function(data, status){

					console.log(status);
					//console.log(data);
					if(status == "success")
					{	
						$("#registration *").remove(".txterror").removeClass("bg01");
						if(data.status == "error")
						{
							$("#info").addClass("bg01").text("Có lỗi xảy ra");
							$.each(data.msg, function(i, val)
							{
								var ele = "#registration [name='" + i + "']";
								//console.log(ele);
								$(ele).addClass("bg01")
											.after("<span class='txterror'>" + val + "</span>");
							});
						}
						else
						{
							$("#info").addClass("bg02").text("Đăng ký thành công");
							$("#registration").remove();
							setTimeout("location.href = '<?php echo site_url('login'); ?>';",1000);
						}
					}
				}, 'json');
			});

			$("input").focus(function()
			{
				//$(this).css("background-color", "#ff0000");

			});
			$("input").blur(function()
			{
				//$(this).css("background-color", "#ffffff");
			});
		});
	</script>
</head>
<body>
	<center>
		<div id="info" class="info">Thông báo</div>
	<form name="registration" id="registration" method="post" role="form">
		<table>
			<tr>
				<td align="left">
					<label for="inputdefault">Họ</label>
					<input type="text" name="ho" id="ho" class="form-control"  placeholder="Nhập họ" />
				</td>
			</tr>
			<tr>
				<td align="left">
					<label for="inputdefault">Tên</label>
					<input type="text" name="ten" id="ten" class="form-control"  placeholder="Nhập tên" />
				</td>
			</tr>
			<tr>
				<td align="left">
					<label for="inputdefault">Email</label>
					<input type="text" name="email" id="email" class="form-control"  placeholder="Nhập email" />
				</td>
			</tr>
			<tr>
				<td align="left">
					<label for="inputdefault">Mật khẩu</label>
					<input type="password" name="matkhau" id="matkhau" class="form-control"  placeholder="Nhập mật khẩu" />
				</td>
			</tr>
			<tr>
				<td align="left">
					<label for="inputdefault">Nhập lại</label>
					<input type="password" name="matkhau1" id="matkhau1" class="form-control"  placeholder="Nhập lại mật khẩu" />
				</td>
			</tr>
			<tr>
				<td colspan="1" align="left"><button type="button" id="button" class="btn btn-info">Đăng ký</button></td>
			</tr>
		</table>
	</form>
	</center>

</body>
</html>