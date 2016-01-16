<html>
<head>
	<meta charset=utf-8>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/style_login.css">
	<link rel="stylesheet" type="text/css"  href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
	<script language="javascript" type="text/javascript">
		$(document).ready(function(e)
		{
			$('#myTable').DataTable();
			$("#button").click(function()
			{
				var url, dta;
				//url="<?php echo base_url(); ?>index.php/tinh/add?t=" + Math.random();
				url = "<?php echo base_url(); ?>index.php/tinh/data";
				dta = {
					"ma" : $("#frmbox :text[name='ma']").val(),
					"ten" : $("#frmbox :text[name='ten']").val()
				};

				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						$("#frmbox *").remove(".txterror").removeClass("bg01");
						if(data.status == "error")
						{
							$("#info").addClass("bg01").text("Có lỗi xảy ra");
							$.each(data.msg, function(i, val)
							{
								var ele = "#frmbox [name='" + i + "']";
								//console.log(ele);
								$(ele).addClass("bg01")
											.after("<span class='txterror'>" + val + "</span>");
							});
						}
						else
						{
							$("#info").addClass("bg02").text("Lưu thành công");
							//$("#frmbox").remove();
							//setTimeout("location.href = '<?php echo site_url('home'); ?>';",1000);
							$("#data").html(data.dta);
							$('#myTable').DataTable();
							
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

	<script language="javascript">
		var id = "";
        function xacnhan(id) 
        {
            if (!window.confirm('Bạn có muốn xóa tỉnh này không?')) 
            {
                return false;
            }
            else
            {
            	var url, dta;
				url="<?php echo base_url(); ?>index.php/tinh/delete?t=" + Math.random();
				dta = {
					"ma" : id,
				};

				$.post(url, dta, function(data, status){

					console.log(status);
					if(status == "success")
					{	
						$("#frmbox *").remove(".txterror").removeClass("bg01");
						if(data.status == "error")
						{
							$("#info").addClass("bg01").text("Có lỗi xảy ra");
							$.each(data.msg, function(i, val)
							{
								var ele = "#frmbox [name='" + i + "']";
								//console.log(ele);
								$(ele).addClass("bg01")
											.after("<span class='txterror'>" + val + "</span>");
							});
						}
						else
						{
							$("#info").addClass("bg02").text("Xóa thành công");
							$("#data").html(data.dta);
							$('#myTable').DataTable();
							
						}
					}
				}, 'json');
				alert("Đã xóa thành công tỉnh có mã: " + id);
            }
        }
        var ma = "";
        var ten = "";
        function sua(ma)
        {
        	alert(ma + "chào");
        }
    </script>
</head>
<body>
	<center>
		<div id="info" class="info">Thông báo</div>
	<form name="frmbox" id="frmbox" method="post" role="form">
		<table>
			<tr>
				<td align="left">
					<label for="inputdefault">Mã tỉnh</label>
					<input type="text" name="ma" id="ma" class="form-control"  placeholder="Nhập mã tỉnh" />
				</td>
			</tr>
			<tr>
				<td align="left">
					<label for="inputdefault">Tên tỉnh</label>
					<input type="text" name="ten" id="ten" class="form-control"  placeholder="Nhập tên tỉnh" />
				</td>
			</tr>
			<tr>
				<td colspan="1" align="left"><button type="button" id="button" class="btn btn-info">Lưu</button></td>
			</tr>
		</table>
	</form>
	</center>


	  <h2>Tỉnh/Thành phố</h2>       
	  <table class="table table-bordered" id="myTable">
	    <thead>
	      <tr>
	        <th>Mã tỉnh</th>
	        <th>Tên tỉnh</th>
	        <th>Xóa</th>
	        <th>Sửa</th>
	      </tr>
	    </thead>
	    <tbody id="data1">
	        <?php
	            //$stt=$start;
	            foreach($info as $item)
	            {
	                //$stt++;
	                echo "<tr>";
	                    //echo "<td>$stt</td>";
	                    echo "<td>$item[T_MA]</td>";
	                    echo "<td>$item[T_TEN]</td>";
	                    echo "<td><button id='btnxoa' value='$item[T_MA]' onclick='return xacnhan($item[T_MA]);'>Xóa</button></td>";
	                    echo "<td><button id='btnsua' value='$item[T_MA]' onclick='sua($item[T_MA]);'>Sửa</button></td>";
	                echo "</tr>";    
	            }
	        ?>
	    </tbody>
	  </table>


</body>
</html>