<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap1/css/bootstrap-theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap1/css/bootstrap.css">
	<title>Email</title>
	<script type="text/javascript">
		function change(value) {
			document.getElementById("btnlogin").innerHTML = value;
		}
		function change1(value) {
			document.getElementById("btnhome").innerHTML = value;
		}
	</script>
	<style type="text/css">
		body{
			background-color: #F8F8FF;
		}
		.img{
			font-style:italic;
			padding: 10px;
			color: #000;
			text-shadow: 0px 2px 3px #666;
		}
		h3{
			padding: 5px;
			font-style: italic;
			font-weight: bolder;
			text-align: center;
			box-shadow: 0  4px 4px -4px rgba(30,144,255,255);
            -moz-box-shadow: 0  4px 4px -4px rgba(30,144,255,255);
            -webkit-box-shadow: 0  4px 4px -4px rgba(30,144,255,255);
            -o-box-shadow: 0  4px 4px -4px rgba(30,144,255,255);
            text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
		}
		h4{
			padding: 10px;
			border-radius: 2px;
			text-align: center;
			margin-top: 20px;
			background-color: #000;
			color: #FFF;
			text-shadow: 0 0 150px #FFF, 0 0 60px #FFF, 0 0 10px #FFF;
		}
		button{
			width: 120px;
		}
		img{
			border-radius: 2px;
			box-shadow: 0  4px 4px -3px rgba(30,144,255,255);
            -moz-box-shadow: 0  4px 4px -3px rgba(30,144,255,255);
            -webkit-box-shadow: 0  4px 4px -3px rgba(30,144,255,255);
            -o-box-shadow: 0  4px 4px -3px rgba(30,144,255,255);
		}
	</style>
</head>
<body>
	<div style="margin: auto; margin-top: 30px; padding: 20px; width: 50%;" class="panel panel-success">
		<marquee behavior="alternate" scrollamount="4"><marquee width="200" scrollamount="4">
			<label class="img">http://smartmekong.vn/dulich</label>
		</marquee></marquee>
		<div>
			
			<!-- <marquee align="center" direction="left" scrollamount="3" width="100%">
				<label style="font-style:italic;">Du lịch đồng bằng sông Cửu Long - Mekong Tourism</label>
			</marquee> -->
			<a href="<?php echo base_url(); ?>home/trangchu">
				<img style="position: absolute; cursor: pointer;" src="<?php echo base_url(); ?>assets/images/logo.png">
			</a>
			<img style="width: 100%; height: 100px;" src="<?php echo base_url(); ?>assets/images/dongthapmuoi.jpg">

			<h3>
				Chào mừng bạn đã đến với Website Du lịch Cửu Long! <br/>
				<p style="font-size: 18px; margin: 5px;" >Welcome to Website Mekong Tourism!</p>
			</h3>

			<h4>
				<?php echo $info ?>
			</h4>
			<center>
				<!-- <button id="btnlogin" type="button" class="btn btn-outline btn-info" onmouseover="change('Login')" onmouseout="change('Đăng nhập')">Đăng nhập</button> -->
				<a href="<?php echo base_url(); ?>home/trangchu">
					<button id="btnhome" type="button" class="btn btn-outline btn-primary" onmouseover="change1('Home')" onmouseout="change1('Trang chủ')">Trang chủ</button>
				</a>
			</center>
		</div>
	</div>
</body>
</html>