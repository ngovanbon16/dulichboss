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

    <script type="text/javascript" src="<?php echo base_url(); ?>assets\jqwidgets\demos\jqxgrid\localization.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            $.jqx.theme = "bootstrap";
            $("#submit").jqxButton({ width: "100px", height: "35px" });
            var data = [
                {
                    dulieus:
                    [
                        <?php 
                            foreach ($info as $item) {
                            $ten = $item['DM_HINH'];
                            $file_path = "uploads/danhmuc/".$ten;
                            if(file_exists($file_path))
                            {
                                
                        ?>
                                { img: '<?php echo base_url(); ?>uploads/danhmuc/<?php echo $item['DM_HINH'] ?>', DM_HINH: '<?php echo $item['DM_HINH']; ?>', DM_TEN: '<?php echo $item['DM_TEN']; ?>', DM_MA: '<?php echo $item['DM_MA']; ?>' },
                        <?php 
                            }
                            else
                            {
                        ?>
                                { img: '<?php echo base_url(); ?>uploads/danhmuc/0.png', DM_HINH: '<?php echo $item['DM_HINH']; ?>', DM_TEN: '<?php echo $item['DM_TEN']; ?>', DM_MA: '<?php echo $item['DM_MA']; ?>' },
                        <?php
                            }
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
                localization: getLocalization("<?php echo lang('lang') ?>"), // tai ngon ngu
                rendered: function () {
                    $(".buy").jqxButton();
                    $(".buy").click(function () {
                        document.getElementById("ma").value = this.value;
                    });
                },
                columns: [
                      {
                          text: "<?php echo lang('photo') ?>", align: 'left', dataField: 'model',
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
                                  var img = '<img width=50 height=50 style="display: block;" src="' + imgurl + '"/>';
                                  image += img;
                                  image += "</div>";

                                  var info = "<div style='margin: 5px; margin-left: 10px; margin-bottom: 3px;'>";
                                  //info += "<div><i>" + dulieu.DM_MA + "</i></div>";
                                  info += "<div><?php echo lang('name') ?>: " + dulieu.DM_TEN + "</div>";
                                  //info += "<div>Tên hình: " + dulieu.DM_HINH + "</div>";
                                  info += "</div>";

                                  var buy = "<button class='buy' style='margin: 5px; width: 80px; height: 35px; left: -100px; position: relative; margin-left: 50%; margin-bottom: 3px;' value='"+dulieu.DM_MA+"' data-toggle='modal' data-target='#myModal'><?php echo lang('change') ?></button>";

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
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('photo') ?></h4>
        </div>
        <div class="modal-body">
          <h1><?php echo lang('load') ?></h1>
          <form method="post" action="<?php echo base_url(); ?>danhmuchinh/upload" enctype="multipart/form-data">
            <input style="display: none;" type="text" id="ma" name="ma" readonly />
            <label><?php echo lang('picture') ?>:</label>
            <input type="file"  id="image_list" name="image_list[]" multiple>
            <br />
            <input type="submit" class="button" value="<?php echo lang('load') ?>" name='submit' id="submit" />
          </form>
          <?php
            if(isset($errors)){
              //echo $errors;
            }
          ?>
        </div>
        <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close') ?></button>
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
</body>
</html>
