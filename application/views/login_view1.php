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
				url="<?php echo base_url(); ?>index.php/login/login?t=" + Math.random();
				dta = {
					"email" : $("#login :text[name='email']").val(),
					"password" : $("#login :password[name='password']").val()
				};

				$.post(url, dta, function(data, status){

					console.log(status);
					//console.log(data);
					if(status == "success")
					{	
						$("#login *").remove(".txterror").removeClass("bg01");
						if(data.status == "error")
						{
							$("#info").addClass("bg01").text("Có lỗi xảy ra");
							$.each(data.msg, function(i, val)
							{
								var ele = "#login [name='" + i + "']";
								//console.log(ele);
								$(ele).addClass("bg01")
											.after("<span class='txterror'>" + val + "</span>");
							});
						}
						else
						{
							$("#info").addClass("bg02").text("Đăng nhập thành công");
							$("#login").remove();
							setTimeout("location.href = '<?php echo site_url('home'); ?>';",1000);
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
	<form name="login" id="login" method="post" role="form">
		<table>
			<tr>
				<td align="left">
					<label for="inputdefault">Email</label>
					<input type="text" name="email" id="email" class="form-control"  placeholder="Nhập email" />
				</td>
			</tr>
			<tr>
				<td align="left">
					<label for="inputdefault">Mật khẩu</label>
					<input type="password" name="password" id="password" class="form-control"  placeholder="Nhập mật khẩu" />
				</td>
			</tr>
			<tr>
				<td colspan="1" align="left"><button type="button" id="button" class="btn btn-info">Đăng nhập</button></td>
			</tr>
		</table>
	</form>
	</center>

</body>
</html>