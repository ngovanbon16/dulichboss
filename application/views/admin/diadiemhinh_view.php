<!DOCTYPE html>
<html lang="en">
    <head>
    <title id="Description">Data Rows with customized rendering in jqxDataTable</title>
    <meta name="description" content="This sample demonstrates how we can customize the rendering of the Data Rows in the jQWidgets DataTable widget.">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdatatable.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtabs.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">
    <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            $.jqx.theme = "bootstrap";
            $("#submit").jqxButton({ width: "100px", height: "35px" });
            /*$(".duyet").jqxButton({ width: "60px", height: "30px" });
            $(".xoa").jqxButton({ width: "60px", height: "30px" });*/
            var data = [
                {
                    dulieus:
                    [
                        <?php
                          if($info != "") 
                          foreach ($info as $item) {     
                          $ma = $item['DD_MA']; 
                          $str = $ma.".jpg";
                        ?>
                          { 
                            img: '<?php echo base_url(); ?>uploads/diadiem/<?php echo $str; ?>', DD_MA:
                            '<?php echo $item['DD_MA']; ?>', DD_TEN: '<?php echo $item['DD_TEN']; ?>', 
                            DM_TEN: '<?php echo $item['DM_TEN']; ?>', ND_TEN: '<?php echo $item['ND_TEN']; ?>',
                            DD_DIACHI: '<?php echo $item['DD_DIACHI']; ?>'
                          }, 
                        <?php 
                          }
                        ?>
                    ]
                }
            ];

            var source =
            {
                localData: data,
                dataType: "array"
            };

            var dataAdapter = new $.jqx.dataAdapter(source);
            var itemsInCart = 0;

            $("#dataTable").jqxDataTable(
            {
                width: "100%",
                source: dataAdapter,
                sortable: true,
                pageable: true,
                pageSize: 2,
                pagerButtonsCount: 5,
                enableHover: false,
                selectionMode: 'none',
                rendered: function () {
                    $(".buy").jqxButton();
                    $(".buy").click(function () {
                        document.getElementById("ma").value = this.value;
                    });
                },
                columns: [
                      {
                          text: 'Products', align: 'left', dataField: 'model',
                          // row - row's index.
                          // column - column's data field.
                          // value - cell's value.
                          // rowData - rendered row's object.
                          cellsRenderer: function (row, column, value, rowData) {
                              var dulieus = rowData.dulieus;
                              var container = "<div>";
                              for (var i = 0; i < dulieus.length; i++) {
                                  var dulieu = dulieus[i];
                                  var item = "<div style='float: left; width: 210px; overflow: hidden; white-space: nowrap; height: 265px;'>";
                                  var image = "<div style='margin: 5px; margin-bottom: 3px;'>";
                                  var imgurl = dulieu.img;
                                  var img = '<img class="img1" width=150 height=100 style="display: block;" src="' + imgurl + '"/>';
                                  image += img;
                                  image += "</div>";

                                  var info = "<div style='margin: 5px; margin-left: 10px; margin-bottom: 3px;'>";
                                  info += "<div>Tên người đăng: " + dulieu.ND_TEN + "</div>";
                                  info += "<div>Mã địa điểm: " + dulieu.DD_MA + "</div>";
                                  info += "<div>Tên: " + dulieu.DD_TEN + "</div>";
                                  info += "<div>Loại địa điểm: " + dulieu.DM_TEN + "</div>";
                                  info += "<div>Địa chỉ: " + dulieu.DD_DIACHI + "</div>";
                                  info += "</div>";

                                  var buy = "<button class='buy' style='margin: 5px; width: 80px; height: 35px; left: -100px; position: relative; margin-left: 50%; margin-bottom: 3px;' value='"+dulieu.DD_MA+"' data-toggle='modal' data-target='#myModal'>Đổi hình</button>";

                                  item += image;
                                  item += info;
                                  item += buy;
                                  item += "</div>";
                                  container += item;
                              }
                              container += "</div>";
                              return container;
                          }
                      }
                ]
            });
        });
        
        $(document).ready(function(e){
            $(".duyet").click(function(){
              var duyet = this.value;
              //alert(duyet);
              var id = "#"+duyet;
              var idvalue = $(id).val();
              var tg = "0";
              if(idvalue == "0")
              {
                document.getElementById(duyet).value = '1';
                tg = "1";
              }
              else
              {
                document.getElementById(duyet).value = '0';
              }

              var url, dta;
                url = "<?php echo base_url(); ?>index.php/diadiemhinh/duyet";
                dta = {
                  "HA_MA" : duyet,
                  "HA_DUYET" : tg
                };

                $.post(url, dta, function(data, status){

                  console.log(status);
                  console.log(data);

                }, 'json');

            });

            $(".xoa").click(function(){
              var xoa = this.value;
              //alert(xoa);

              var url, dta;
                url = "<?php echo base_url(); ?>index.php/diadiemhinh/xoa";
                dta = {
                  "HA_TEN" : xoa
                };
                console.log(dta);
                $.post(url, dta, function(data, status){

                  console.log(status);
                  console.log(data);
                  document.getElementById(xoa).value = 'Đã bị xóa';
                  /*var id = "#"+xoa;
                  $(id).html("Đã bị xóa");*/

                }, 'json');

            });
        });

    </script>
    <style>
h4 {
	font-size: 14px;
	margin: 18px 0 15px 15px;
}
.tag-title-info {
	background: transparent;
	width: 1px;
	height: 0px;
	border-color: #4272b8 transparent #4272b8 #4272b8 !important;
	border-width: 26px 26px;
	border-style: solid;
	z-index: 1000;
	top: 0px;
	position: absolute;
	left: 598px;
}
.tag-title {
	font-size: 16px;
	color: #fff;
	position: absolute;
	z-index: 100;
	left: 0;
	line-height: 100%;
	background: #4272b8 !important;
	height: 52px;
	padding: 0px;
	margin: 0px;
	top: 0px;
	width: 500px;
	vertical-align: middle;
}
.cart-top {
	font-family: Arial, Helvetica, sans-serif;
	height: 35px;
	position: absolute;
	left: 500px;
	top: 0;
	color: #fff;
	padding: 16px 14px 1px 14px;
	font-size: 11px;
	font-weight: 400;
	background: #4272b8 !important;
	z-index: 199;
}
.cart-top p {
	font-weight: bold;
	font-size: 11px;
 background: url(<?php echo base_url();
?>assets/jqwidgets/images/cart-icon.png) no-repeat right center;
	min-height: 16px;
	text-align: left;
	padding: 0 24px 0 0;
	margin-top: 2px;
	float: left;
	font-size: 11px;
	color: #fff;
	text-decoration: none;
}
#ma {
	width: 100px;
	border-radius: 5px;
}
.input{
  width: 50px;
  border-radius: 5px;
}
.input1{
  width: 100px;
  border-radius: 5px;
  color: #F00;
}
.img:hover{
  position: absolute;
  width: 800px;
  height: 500px;
  transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
}
.img1:hover{
  position: absolute;
  width: 400px;
  height: 250px;
  z-index: 10;
  transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
}
</style>
</head>
<body class='default'>
<div style="margin-top: 0px;" id="dataTable"></div>
<?php //print_r($info) ?>
<div class="panel-body"> 
      <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Form</h4>
        </div>
        <div class="modal-body">
          <h1>Tải ảnh lên</h1>
          <form method="post" action="<?php echo base_url(); ?>diadiemhinh/uploads" enctype="multipart/form-data">
            Mã danh mục: <br/>
            <input type="text" id="ma" name="ma" readonly />
            <br/>
            <label>Ảnh kèm theo:</label>
            <input type="file"  id="image_list" name="image_list[]" multiple>
            <br />
            <input type="submit" class="button" value="Tải lên" name='submit' id="submit" />
          </form>
          <?php
            if(isset($errors)){
              //echo $errors;
            }
          ?>
        </div>
        <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> --> 
        </div>
      </div>
          <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
      <!-- /.modal --> 
</div>
  <?php
    if(isset($errors)){
      echo $errors;
    }
  ?>

<?php 
  if($info != "")
  foreach ($info as $key) {
  $madd = $key['DD_MA'];
  $tendd = $key['DD_TEN'];
  echo "<h3>".$madd.": ".$tendd."</h3>";
  if($info1 != "")
  foreach ($info1 as $item) 
  {      
    $madd1 = $item['DD_MA'];
    if($madd == $madd1)
    {
      ?>
            <div>
            <img class="img" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $item['HA_TEN'] ?>" width="100" height="100">
            Tên: <?php echo $item['HA_TEN']; ?> | Duyệt: <input class="input" id="<?php echo $item['HA_MA']; ?>" type="text" value="<?php echo $item['HA_DUYET']; ?>" readonly="readonly" />

            <!-- <input class="duyet" type="button" value="<?php echo $item['HA_MA']; ?>" />
            <input class="xoa" type="button" value="<?php echo $item['HA_TEN']; ?>" /> -->
            <button class="duyet" value="<?php echo $item['HA_MA']; ?>" >Duyệt</button>
            <button class="xoa" value="<?php echo $item['HA_TEN']; ?>" >Xóa</button>
            <input class="input1" type="text" id="<?php echo $item['HA_TEN']; ?>" readonly="readonly" />
            </div>
      <?php 
      //echo $item['HA_TEN']." | Duyệt: ".$item['HA_DUYET'];
    }
  }
  echo "<hr><br/>";
}
?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</body>
</html>
