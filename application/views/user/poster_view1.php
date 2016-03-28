<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
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
		height: 90px; 
		overflow: hidden; 
		border: solid 1px #000;
	}
</style>

<input type="button" value="Print Div" onclick="PrintElem('#mydiv')" />

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
						<div style="margin-top: -170px; border: none;">
							<?php echo $map['js']; ?>
                        	<?php echo $map['html']; ?>
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
	<?php //echo print_r($data) ?>
</section>