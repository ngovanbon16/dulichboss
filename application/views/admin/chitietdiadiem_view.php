<!DOCTYPE html>
<html lang="en">
<head>
    <title id="Description">This demo illustrates the default functionality of the jqxPasswordInput widget.</title>
    <link type="text/css" rel="Stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpasswordinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxexpander.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxvalidator.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxloader.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxformattedinput.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtabs.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnotification.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdatatable.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            var notificationWidth = 300;

            $("#notiSuccess").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 1000, template: "success"
            });

            $("#notiError").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 1000, template: "error"
            });

            // Create jqxExpander.
            $("#createAccount").jqxExpander({  toggleMode: 'none', width: '80%', showArrow: false });
            // Create jqxButton.
            $("#submit").jqxButton({ template: "primary", height: "30px", width: "150px" });
            $("#duyettatca").jqxButton({ template: "success", height: "30px", width: "150px" });
            $("#huytatca").jqxButton({ template: "warning", height: "30px", width: "150px" });
            // Validate the Form.
            $("#submit").click(function () {
                //alert("chao");
                window.history.back();
            });

            var data = [
                {
                    dulieus:
                    [
                        <?php
                          $count = 0; 
                          if($info1 != "") 
                          foreach ($info1 as $item) {  
                            $count++;
                        ?>
                          { 
                            img: '<?php echo base_url(); ?>uploads/diadiem/<?php echo $item["HA_TEN"]; ?>', HA_MA:
                            '<?php echo $item['HA_MA']; ?>', HA_DUYET: '<?php echo $item['HA_DUYET']; ?>', 
                            HA_TEN: '<?php echo $item['HA_TEN']; ?>'
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
                //height: "500",
                source: dataAdapter,
                /*sortable: true,
                pageable: true,
                pageSize: 2,*/
                /*pagerButtonsCount: 5,*/
                enableHover: false,
                selectionMode: 'none',
                rendered: function () {
                    $(".duyet").jqxButton();
                    $(".duyet").click(function () {
                        //alert(this.value);
                        var ma = this.value;
                      //alert(ma);
                      var id = "#1"+ma;
                      var idvalue = $(id).val();
                      var tg = "0";
                      if(idvalue == "0")
                      {
                        document.getElementById("1"+ma).value = '1';
                        document.getElementById(ma).style.color = "#00f";
                        tg = "1";
                        openSuccess("Duyệt ảnh thành công!");
                      }
                      else
                      {
                        document.getElementById("1"+ma).value = '0';
                        document.getElementById(ma).style.color = "#000";
                        openError("Đã bỏ duyệt!");
                      }

                      var url, dta;
                        url = "<?php echo base_url(); ?>index.php/diadiemhinh/duyet";
                        dta = {
                          "HA_MA" : ma,
                          "HA_DUYET" : tg
                        };

                        $.post(url, dta, function(data, status){

                          console.log(status);
                          console.log(data);

                        }, 'json');

                    });

                    $(".xoa").jqxButton();
                    $(".xoa").click(function () {

                         var ten = this.value;

                          var url, dta;
                            url = "<?php echo base_url(); ?>index.php/diadiemhinh/xoa";
                            dta = {
                              "HA_TEN" : ten
                            };
                            console.log(dta);
                            $.post(url, dta, function(data, status){

                              console.log(status);
                              console.log(data);
                              document.getElementById(ten).style.color = "#f00";
                              document.getElementById(ten).disabled = true;
                              openSuccess("Xóa ảnh thành công");

                            }, 'json');

                    });
                },
                columns: [
                      {
                          text: 'Hình ảnh', align: 'left', dataField: 'model',
                          // row - row's index.
                          // column - column's data field.
                          // value - cell's value.
                          // rowData - rendered row's object.
                          cellsRenderer: function (row, column, value, rowData) {
                              var dulieus = rowData.dulieus;
                              var container = "<div style='overflow: scroll; height: 500px;'>";
                              for (var i = 0; i < dulieus.length; i++) {
                                  var dulieu = dulieus[i];
                                  var item = "<div style='float: left; width: 210px; overflow: hidden; white-space: nowrap; height: 265px;'>";
                                  var image = "<div style='margin: 5px; margin-bottom: 3px;'>";
                                  var imgurl = dulieu.img;
                                  var img = '<button id="'+ dulieu.HA_MA +'2" onclick="daidien('+ dulieu.HA_MA +');"><img class="img1" width=150 height=100 style="display: block;" src="' + imgurl + '"/></button>';
                                  image += img;
                                  image += "</div>";

                                  var info = "<div style='margin: 5px; margin-left: 10px; margin-bottom: 3px;'>";
                                  info += "<div>Mã hình: " + dulieu.HA_MA + "</div>";
                                  info += "<div>Tên hình: " + dulieu.HA_TEN + "</div>";
                                  info += "<div>Trạng thái: <input class='input' id='1" + dulieu.HA_MA + "' type='text' value='" + dulieu.HA_DUYET + "' /></div>";
                                  info += "</div>";
                                  var maud = "#000";
                                  if(dulieu.HA_DUYET == "1")
                                  {
                                    maud = "#00f";
                                  }
                                  var duyet = "<button class='duyet' id='" + dulieu.HA_MA + "' value='" + dulieu.HA_MA + "' style='color: " + maud + "; margin: 5px; width: 70px; height: 30px; left: -100px; position: relative; margin-left: 50%; margin-bottom: 3px;'>Duyệt</button>";
                                  var xoa = "<button class='xoa' id='" + dulieu.HA_TEN + "' value='" + dulieu.HA_TEN + "' style='margin: 5px; width: 70px; height: 30px; left: -200px; position: relative; margin-left: 50%; margin-bottom: 3px;'>Xóa</button>";

                                  item += image;
                                  item += info;
                                  item += duyet;
                                  item += xoa;
                                  item += "</div>";
                                  container += item;
                              }
                              container += "</div>";
                              return container;
                          }
                      }
                ]
            });

            $("#locduyet").change(function(){
            var loc = this.value;
            if(loc == "0")
            {
            

            var data = [
                {
                    dulieus:
                    [
                        <?php
                          $count = 0; 
                          if($info1 != "") 
                          foreach ($info1 as $item) {  
                            if($item['HA_DUYET'] == "0"){
                              $count++;
                        ?>
                          { 
                            img: '<?php echo base_url(); ?>uploads/diadiem/<?php echo $item["HA_TEN"]; ?>', HA_MA:
                            '<?php echo $item['HA_MA']; ?>', HA_DUYET: '<?php echo $item['HA_DUYET']; ?>', 
                            HA_TEN: '<?php echo $item['HA_TEN']; ?>'
                          }, 
                        <?php 
                          }
                        }
                        ?>
                    ]
                }
            ];
          
            $("#count").html('<?php echo $count; ?>');

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
                //height: "500",
                source: dataAdapter,
                /*sortable: true,
                pageable: true,
                pageSize: 2,*/
                /*pagerButtonsCount: 5,*/
                enableHover: false,
                selectionMode: 'none',
                rendered: function () {
                    $(".duyet").jqxButton();
                    $(".duyet").click(function () {
                        //alert(this.value);
                        var ma = this.value;
                      //alert(ma);
                      var id = "#1"+ma;
                      var idvalue = $(id).val();
                      var tg = "0";
                      if(idvalue == "0")
                      {
                        document.getElementById("1"+ma).value = '1';
                        document.getElementById(ma).style.color = "#00f";
                        tg = "1";
                        openSuccess("Duyệt ảnh thành công!");
                      }
                      else
                      {
                        document.getElementById("1"+ma).value = '0';
                        document.getElementById(ma).style.color = "#000";
                        openError("Đã bỏ duyệt!");
                      }

                      var url, dta;
                        url = "<?php echo base_url(); ?>index.php/diadiemhinh/duyet";
                        dta = {
                          "HA_MA" : ma,
                          "HA_DUYET" : tg
                        };

                        $.post(url, dta, function(data, status){

                          console.log(status);
                          console.log(data);

                        }, 'json');

                    });

                    $(".xoa").jqxButton();
                    $(".xoa").click(function () {

                         var ten = this.value;

                          var url, dta;
                            url = "<?php echo base_url(); ?>index.php/diadiemhinh/xoa";
                            dta = {
                              "HA_TEN" : ten
                            };
                            console.log(dta);
                            $.post(url, dta, function(data, status){

                              console.log(status);
                              console.log(data);
                              document.getElementById(ten).style.color = "#f00";
                              document.getElementById(ten).disabled = true;
                              openSuccess("Xóa ảnh thành công");

                            }, 'json');

                    });
                },
                columns: [
                      {
                          text: 'Hình ảnh', align: 'left', dataField: 'model',
                          // row - row's index.
                          // column - column's data field.
                          // value - cell's value.
                          // rowData - rendered row's object.
                          cellsRenderer: function (row, column, value, rowData) {
                              var dulieus = rowData.dulieus;
                              var container = "<div style='overflow: scroll; height: 500px;'>";
                              for (var i = 0; i < dulieus.length; i++) {
                                  var dulieu = dulieus[i];
                                  var item = "<div style='float: left; width: 210px; overflow: hidden; white-space: nowrap; height: 265px;'>";
                                  var image = "<div style='margin: 5px; margin-bottom: 3px;'>";
                                  var imgurl = dulieu.img;
                                  var img = '<button id="'+ dulieu.HA_MA +'2" onclick="daidien('+ dulieu.HA_MA +');"><img class="img1" width=150 height=100 style="display: block;" src="' + imgurl + '"/></button>';
                                  image += img;
                                  image += "</div>";

                                  var info = "<div style='margin: 5px; margin-left: 10px; margin-bottom: 3px;'>";
                                  info += "<div>Mã hình: " + dulieu.HA_MA + "</div>";
                                  info += "<div>Tên hình: " + dulieu.HA_TEN + "</div>";
                                  info += "<div>Trạng thái: <input class='input' id='1" + dulieu.HA_MA + "' type='text' value='" + dulieu.HA_DUYET + "' /></div>";
                                  info += "</div>";
                                  var maud = "#000";
                                  if(dulieu.HA_DUYET == "1")
                                  {
                                    maud = "#00f";
                                  }
                                  var duyet = "<button class='duyet' id='" + dulieu.HA_MA + "' value='" + dulieu.HA_MA + "' style='color: " + maud + "; margin: 5px; width: 70px; height: 30px; left: -100px; position: relative; margin-left: 50%; margin-bottom: 3px;'>Duyệt</button>";
                                  var xoa = "<button class='xoa' id='" + dulieu.HA_TEN + "' value='" + dulieu.HA_TEN + "' style='margin: 5px; width: 70px; height: 30px; left: -200px; position: relative; margin-left: 50%; margin-bottom: 3px;'>Xóa</button>";

                                  item += image;
                                  item += info;
                                  item += duyet;
                                  item += xoa;
                                  item += "</div>";
                                  container += item;
                              }
                              container += "</div>";
                              return container;
                          }
                      }
                ]
            });
            }

            if(loc == "1")
            {
            

            var data = [
                {
                    dulieus:
                    [
                        <?php
                          $count = 0; 
                          if($info1 != "") 
                          foreach ($info1 as $item) {  
                            if($item['HA_DUYET'] == "1"){
                              $count++;
                        ?>
                          { 
                            img: '<?php echo base_url(); ?>uploads/diadiem/<?php echo $item["HA_TEN"]; ?>', HA_MA:
                            '<?php echo $item['HA_MA']; ?>', HA_DUYET: '<?php echo $item['HA_DUYET']; ?>', 
                            HA_TEN: '<?php echo $item['HA_TEN']; ?>'
                          }, 
                        <?php 
                          }
                        }
                        ?>
                    ]
                }
            ];
          
          $("#count").html('<?php echo $count; ?>');

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
                //height: "500",
                source: dataAdapter,
                /*sortable: true,
                pageable: true,
                pageSize: 2,*/
                /*pagerButtonsCount: 5,*/
                enableHover: false,
                selectionMode: 'none',
                rendered: function () {
                    $(".duyet").jqxButton();
                    $(".duyet").click(function () {
                        //alert(this.value);
                        var ma = this.value;
                      //alert(ma);
                      var id = "#1"+ma;
                      var idvalue = $(id).val();
                      var tg = "0";
                      if(idvalue == "0")
                      {
                        document.getElementById("1"+ma).value = '1';
                        document.getElementById(ma).style.color = "#00f";
                        tg = "1";
                        openSuccess("Duyệt ảnh thành công!");
                      }
                      else
                      {
                        document.getElementById("1"+ma).value = '0';
                        document.getElementById(ma).style.color = "#000";
                        openError("Đã bỏ duyệt!");
                      }

                      var url, dta;
                        url = "<?php echo base_url(); ?>index.php/diadiemhinh/duyet";
                        dta = {
                          "HA_MA" : ma,
                          "HA_DUYET" : tg
                        };

                        $.post(url, dta, function(data, status){

                          console.log(status);
                          console.log(data);

                        }, 'json');

                    });

                    $(".xoa").jqxButton();
                    $(".xoa").click(function () {

                         var ten = this.value;

                          var url, dta;
                            url = "<?php echo base_url(); ?>index.php/diadiemhinh/xoa";
                            dta = {
                              "HA_TEN" : ten
                            };
                            console.log(dta);
                            $.post(url, dta, function(data, status){

                              console.log(status);
                              console.log(data);
                              document.getElementById(ten).style.color = "#f00";
                              document.getElementById(ten).disabled = true;
                              openSuccess("Xóa ảnh thành công");

                            }, 'json');

                    });
                },
                columns: [
                      {
                          text: 'Hình ảnh', align: 'left', dataField: 'model',
                          // row - row's index.
                          // column - column's data field.
                          // value - cell's value.
                          // rowData - rendered row's object.
                          cellsRenderer: function (row, column, value, rowData) {
                              var dulieus = rowData.dulieus;
                              var container = "<div style='overflow: scroll; height: 500px;'>";
                              for (var i = 0; i < dulieus.length; i++) {
                                  var dulieu = dulieus[i];
                                  var item = "<div style='float: left; width: 210px; overflow: hidden; white-space: nowrap; height: 265px;'>";
                                  var image = "<div style='margin: 5px; margin-bottom: 3px;'>";
                                  var imgurl = dulieu.img;
                                  var img = '<button id="'+ dulieu.HA_MA +'2" onclick="daidien('+ dulieu.HA_MA +');"><img class="img1" width=150 height=100 style="display: block;" src="' + imgurl + '"/></button>';
                                  image += img;
                                  image += "</div>";

                                  var info = "<div style='margin: 5px; margin-left: 10px; margin-bottom: 3px;'>";
                                  info += "<div>Mã hình: " + dulieu.HA_MA + "</div>";
                                  info += "<div>Tên hình: " + dulieu.HA_TEN + "</div>";
                                  info += "<div>Trạng thái: <input class='input' id='1" + dulieu.HA_MA + "' type='text' value='" + dulieu.HA_DUYET + "' /></div>";
                                  info += "</div>";
                                  var maud = "#000";
                                  if(dulieu.HA_DUYET == "1")
                                  {
                                    maud = "#00f";
                                  }
                                  var duyet = "<button class='duyet' id='" + dulieu.HA_MA + "' value='" + dulieu.HA_MA + "' style='color: " + maud + "; margin: 5px; width: 70px; height: 30px; left: -100px; position: relative; margin-left: 50%; margin-bottom: 3px;'>Duyệt</button>";
                                  var xoa = "<button class='xoa' id='" + dulieu.HA_TEN + "' value='" + dulieu.HA_TEN + "' style='margin: 5px; width: 70px; height: 30px; left: -200px; position: relative; margin-left: 50%; margin-bottom: 3px;'>Xóa</button>";

                                  item += image;
                                  item += info;
                                  item += duyet;
                                  item += xoa;
                                  item += "</div>";
                                  container += item;
                              }
                              container += "</div>";
                              return container;
                          }
                      }
                ]
            });
            }

            if(loc == "")
            {
            

            var data = [
                {
                    dulieus:
                    [
                        <?php
                          $count = 0; 
                          if($info1 != "") 
                          foreach ($info1 as $item) {  
                            $count++;
                        ?>
                          { 
                            img: '<?php echo base_url(); ?>uploads/diadiem/<?php echo $item["HA_TEN"]; ?>', HA_MA:
                            '<?php echo $item['HA_MA']; ?>', HA_DUYET: '<?php echo $item['HA_DUYET']; ?>', 
                            HA_TEN: '<?php echo $item['HA_TEN']; ?>'
                          }, 
                        <?php 
                        }
                        ?>
                    ]
                }
            ];
            
            $("#count").html(<?php echo $count; ?>)

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
                //height: "500",
                source: dataAdapter,
                /*sortable: true,
                pageable: true,
                pageSize: 2,*/
                /*pagerButtonsCount: 5,*/
                enableHover: false,
                selectionMode: 'none',
                rendered: function () {
                    $(".duyet").jqxButton();
                    $(".duyet").click(function () {
                        //alert(this.value);
                        var ma = this.value;
                      //alert(ma);
                      var id = "#1"+ma;
                      var idvalue = $(id).val();
                      var tg = "0";
                      if(idvalue == "0")
                      {
                        document.getElementById("1"+ma).value = '1';
                        document.getElementById(ma).style.color = "#00f";
                        tg = "1";
                        openSuccess("Duyệt ảnh thành công!");
                      }
                      else
                      {
                        document.getElementById("1"+ma).value = '0';
                        document.getElementById(ma).style.color = "#000";
                        openError("Đã bỏ duyệt!");
                      }

                      var url, dta;
                        url = "<?php echo base_url(); ?>index.php/diadiemhinh/duyet";
                        dta = {
                          "HA_MA" : ma,
                          "HA_DUYET" : tg
                        };

                        $.post(url, dta, function(data, status){

                          console.log(status);
                          console.log(data);

                        }, 'json');

                    });

                    $(".xoa").jqxButton();
                    $(".xoa").click(function () {

                         var ten = this.value;

                          var url, dta;
                            url = "<?php echo base_url(); ?>index.php/diadiemhinh/xoa";
                            dta = {
                              "HA_TEN" : ten
                            };
                            console.log(dta);
                            $.post(url, dta, function(data, status){

                              console.log(status);
                              console.log(data);
                              document.getElementById(ten).style.color = "#f00";
                              document.getElementById(ten).disabled = true;
                              openSuccess("Xóa ảnh thành công");

                            }, 'json');

                    });
                },
                columns: [
                      {
                          text: 'Hình ảnh', align: 'left', dataField: 'model',
                          // row - row's index.
                          // column - column's data field.
                          // value - cell's value.
                          // rowData - rendered row's object.
                          cellsRenderer: function (row, column, value, rowData) {
                              var dulieus = rowData.dulieus;
                              var container = "<div style='overflow: scroll; height: 500px;'>";
                              for (var i = 0; i < dulieus.length; i++) {
                                  var dulieu = dulieus[i];
                                  var item = "<div style='float: left; width: 210px; overflow: hidden; white-space: nowrap; height: 265px;'>";
                                  var image = "<div style='margin: 5px; margin-bottom: 3px;'>";
                                  var imgurl = dulieu.img;
                                  var img = '<button id="'+ dulieu.HA_MA +'2" onclick="daidien('+ dulieu.HA_MA +');"><img class="img1" width=150 height=100 style="display: block;" src="' + imgurl + '"/></button>';
                                  image += img;
                                  image += "</div>";

                                  var info = "<div style='margin: 5px; margin-left: 10px; margin-bottom: 3px;'>";
                                  info += "<div>Mã hình: " + dulieu.HA_MA + "</div>";
                                  info += "<div>Tên hình: " + dulieu.HA_TEN + "</div>";
                                  info += "<div>Trạng thái: <input class='input' id='1" + dulieu.HA_MA + "' type='text' value='" + dulieu.HA_DUYET + "' /></div>";
                                  info += "</div>";
                                  var maud = "#000";
                                  if(dulieu.HA_DUYET == "1")
                                  {
                                    maud = "#00f";
                                  }
                                  var duyet = "<button class='duyet' id='" + dulieu.HA_MA + "' value='" + dulieu.HA_MA + "' style='color: " + maud + "; margin: 5px; width: 70px; height: 30px; left: -100px; position: relative; margin-left: 50%; margin-bottom: 3px;'>Duyệt</button>";
                                  var xoa = "<button class='xoa' id='" + dulieu.HA_TEN + "' value='" + dulieu.HA_TEN + "' style='margin: 5px; width: 70px; height: 30px; left: -200px; position: relative; margin-left: 50%; margin-bottom: 3px;'>Xóa</button>";

                                  item += image;
                                  item += info;
                                  item += duyet;
                                  item += xoa;
                                  item += "</div>";
                                  container += item;
                              }
                              container += "</div>";
                              return container;
                          }
                      }
                ]
            });
            }


            });

        });

            function openSuccess(str)
            {
                $("#result").html(str);
                $("#notiSuccess").jqxNotification("open");
            }

            function openError(str)
            {
                $("#error").html(str);
                $("#notiError").jqxNotification("open");
            }

    function daidien(ma)
    {
        var madd = "<?php echo $info['DD_MA']; ?>";
        //alert(ma);
        var url, dta;
        url = "<?php echo base_url(); ?>index.php/diadiemhinh/daidien";
        dta = {
            "DD_MA" : madd,
            "HA_MA" : ma,
            "HA_DAIDIEN" : "1"
        };
        console.log(dta);
        $.post(url, dta, function(data, status){

            console.log(status);
            console.log(data);
            if(data.msg == "success")
            {
                openSuccess("Cập nhật ảnh đại diện thành công!");
                document.getElementById(ma+'2').style.backgroundColor = "#00F";
            }
            else
            {
                openError("Cập nhật ảnh đại diện thất bại!");
            }
        }, 'json');
    }
    
    function duyettatca(giatri, mau){
                /*var count = "<?php echo $count; ?>";
                alert(count);*/
                <?php 
                        $madd = $info["DD_MA"];
                          if($info1 != "") 
                          foreach ($info1 as $item) {  
                            $madd1 = $item['DD_MA'];
                            if($madd == $madd1)
                            {
                                ?>

                                  var ma = "<?php echo $item['HA_MA']; ?>";
                                  var id = "#1"+ma;
                                  var idvalue = $(id).val();
                                  if(idvalue != giatri)
                                  {
                                        var url, dta;
                                        url = "<?php echo base_url(); ?>index.php/diadiemhinh/duyet";
                                        dta = {
                                          "HA_MA" : ma,
                                          "HA_DUYET" : giatri
                                        };

                                        $.post(url, dta, function(data, status){

                                          console.log(status);
                                          console.log(data);

                                        }, 'json');

                                        document.getElementById("1"+ma).value = giatri;
                                        document.getElementById(ma).style.color = mau;
                                  }

                                <?php
                            }
                        }
                ?>
            };

        
    </script>

    <style type="text/css">
        #DD_TEN{
            text-transform: capitalize;
        }
    </style>

    <script type="text/javascript">
        var centreGot = false;
    </script>

    <?php echo $map['js']; ?>

    <style type="text/css">
        .tieude{
            color: #111;
            text-transform: capitalize;
            font-size: 14px;
            font-weight: bold;
            background-color: #9CF;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 5px;
            border-radius: 2px;
            opacity: 1;
            transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
            -o-transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
            -ms-transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
            -moz-transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
            -webkit-transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
        }
        .tieude:hover{
            box-shadow: 5px 5px 10px #09F;
            opacity: 1;
        }
        a{
            text-decoration: none;
            color: #06F;
        }
        a:hover{
            color: #00C;
            
        }
        .div1{
            float: left;
            padding-left: 20px;
        }
        .div2{
            float: left;
            padding-left: 300px;
        }
        .input{
          width: 10px;
          border: none;
        }
        /*.img:hover{
          position: absolute;
          z-index: 10;
          width: 800px;
          height: 500px;
          transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
        }*//*
        .img1:hover{
          position: absolute;
          width: 400px;
          height: 250px;
          z-index: 10;
          transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
        }*/
        .noidungthongtin{
            padding: 5px;
            width: "100%";
            border: solid 2px #6CF;
        }
        .ten{
            background-color: #6CF;
            color: #03C;
            font-style: italic;
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            text-transform: capitalize;
        }
        .cot1{
            font-weight: bold;
            width: 160px;
            border-bottom: solid 1px #99F;
        }
        .cot2{
            font-style: italic;
            border-bottom: solid 1px #99F;
        }
        .tablenoidung{
            padding: 5px;
        }
        #locduyet{
          margin-left: 10px;
          width: 150px;
          height: 30px;
          border: solid 1px #00F;
          box-shadow: 2px 2px solid #00F;
          border-radius: 2px;
          font-size: 16px;
        }
        .count{
          float: left;
          margin-left: 10px;
          margin-top: 4px;
          font-size: 16px;
          font-weight: bolder;
        }
    </style>
</head>
<body>
    <div id="notiSuccess">
        <div id="result">Thông báo thành công!</div>
    </div>
    <div id="notiError">
        <div id="error">Thông báo lỗi!</div>
    </div>
    <center>
    <div id="createAccount" style="font-family: Verdana; font-size: 13px;">
        <div id="tieude">
            <div class="div1">Thông tin chi tiết về địa điểm</div>
            <div class="div2">
                <a href="<?php echo base_url(); ?>index.php/home">Trang chủ</a>
            </div>
        </div>
        <div style="font-family: Verdana; font-size: 13px;">
                <table width="100%">
                     <tr>
                        <td>
                            <div class="tieude">Thông tin cơ bản</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="thongtin">

                        <table class="noidungthongtin" width="100%">
                            <tr>
                                <td width="320">
                                    <?php 
                                        $madd = $info['DD_MA'];
                                        $anhdaidien = "anhdaidien.jpg";
                                        if($info1 != "") 
                                        foreach ($info1 as $item) {  
                                            $madd1 = $item['DD_MA'];
                                            if($madd == $madd1)
                                            {
                                                $dd = $item['HA_DAIDIEN'];
                                                if($dd == "1")
                                                {
                                                    $anhdaidien = $item['HA_TEN'];
                                                }
                                            }
                                        }
                                    ?>
                                    <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" width='300' height='300'>
                                </td>
                                <td>
                                    <?php //echo $info['DD_MA']; ?>
                                    <table class="tablenoidung" width="100%">
                                        <tr>
                                            <td colspan="2">
                                                <div class="ten"><?php echo $info['DD_TEN']; ?></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Thuộc dạng du lịch
                                            </td>
                                            <td class="cot2">
                                                <?php echo $tendanhmuc; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Nằm trên đường
                                            </td>
                                            <td class="cot2">
                                                <?php echo $info['DD_DIACHI']; ?> thuộc xã <?php echo $tenxa; ?>
                                                 huyện <?php echo $tenhuyen; ?> tỉnh <?php echo $tentinh; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Số điện thoại
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_SDT'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Địa chỉ Email
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_EMAIL'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                               Địa chỉ Website
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_WEBSITE'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Mô tả đôi nét
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_MOTA'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Giới thiệu chi tiết
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_GIOITHIEU'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Thời gian mở cửa
                                            </td>
                                            <td class="cot2">
                                                <?php echo $info['DD_BATDAU']; ?> - <?php echo $info['DD_KETTHUC']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Giá bán
                                            </td>
                                            <td class="cot2">
                                                <?php echo $info['DD_GIATU']; ?> - <?php echo $info['DD_GIADEN']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cot1">
                                                Nội dung
                                            </td>
                                            <td class="cot2">
                                                <?php 
                                                  $value = $info['DD_NOIDUNG'];
                                                  if($value == "")
                                                  {
                                                    echo "Đang được cập nhật";
                                                  }
                                                  else
                                                  {
                                                    echo $value;
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="tieude">Quản lý hình ảnh</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <div style="float: left;">
                            <button id='duyettatca' onclick="duyettatca('1','#00F');">Duyệt tất cả</button>
                            <button id='huytatca' onclick="duyettatca('0','#000');">Hủy tất cả</button>
                          </div>
                          <div>
                              <div style="float: left;">
                              <select id='locduyet'>
                                <option value="">Tất cả</option>
                                <option value="1">Đã duyệt</option>
                                <option value="0">Chưa duyệt</option>
                              </select>
                              </div>
                              <div class="count" >Tổng: </div><div class="count" id="count"><?php echo $count; ?></div>
                          </div>
                            <div style="margin-top: 0px;" id="dataTable"></div>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="tieude">Quản lý bình luận</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        
                      </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="tieude">Vị trí</div>
                        </td>
                    </tr>
                    <tr>
                        <td> <input type="text" id="myPlaceTextBox" />
                            <?php echo $map['html']; ?>
                            Lat: <input type="text" id="lat" value="" readonly >
                            Lng: <input type="text" id="lng" value="" readonly >
                        </td>
                    </tr>
                </table>
        </div>
    </div>
    <input id="submit" type="button" value="Trở lại" />
    </center>
</body>
</html>