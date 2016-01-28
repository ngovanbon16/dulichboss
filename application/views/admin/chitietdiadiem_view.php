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

    <script type="text/javascript">
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            // Create jqxExpander.
            $("#createAccount").jqxExpander({  toggleMode: 'none', width: '80%', showArrow: false });
            // Create jqxButton.
            /*$("#submit").jqxButton({ template: "primary", height: "30px", width: "150px" });*/
            $(".duyet").jqxButton({ template: "success", height: "30px", width: "110px" });
            $(".xoa").jqxButton({ template: "danger", height: "30px", width: "110px" });
            // Validate the Form.
            /*$("#submit").click(function () {
                //alert("chao");
                window.history.back();
            });*/
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
                $(id+"1").html("Đã duyệt");
              }
              else
              {
                document.getElementById(duyet).value = '0';
                $(id+"1").html("Chưa duyệt");
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
                  alert(id);
                  $(id).html("Đã xóa");*/

                }, 'json');

            });
            
        });
        
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
        #firstName{
            text-transform: capitalize;
        }
        #lastName{
            text-transform: capitalize;
        }
        .tieude{
            color: #111;
            text-transform: capitalize;
            font-size: 14px;
            font-weight: bold;
            background-color: #09F;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 5px;
            text-shadow: 5px 5px 10px #FFF;
            border-radius: 5px;
            box-shadow: 1px 1px 3px #09F;
            opacity: 0.7;
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
        .thongtin{
            padding: 10px;
            margin: 10px;
            font-size: 18px;
            font-family: sans-serif;
        }
        .input{
        position: absolute;
        z-index: -1;
          width: 5px;
          border-radius: 5px;
          visibility: visible;
        }
        .input1{
          width: 80px;
          border-radius: 5px;
          color: #F00;
          border: none;
          text-align: center;
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
        .khung{
            float: left;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
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
                    <!-- <tr>
                        <td align="center">
                            <input id="submit" type="button" value="Trở lại" />
                        </td>
                    </tr> -->
                     <tr>
                        <td>
                            <div class="tieude">Thông tin cơ bản</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="thongtin">
                            <h1><?php echo $info['DD_MA']; ?>. <?php echo $info['DD_TEN']; ?> </h1>
                            Thuộc dạng du lịch <?php echo $info['DM_MA']; ?> <br/>
                            Nằm trên tuyến đường <?php echo $info['DD_DIACHI']; ?> thuộc xã <?php echo $info['X_MA']; ?> huyện <?php echo $info['H_MA']; ?> tỉnh <?php echo $info['T_MA']; ?> <br/>
                            Một số thông tin liên hệ: <br/>
                            - Số điện thoại: <?php echo $info['DD_SDT']; ?> <br/>
                            - Địa chỉ Email: <?php echo $info['DD_EMAIL']; ?> <br/>
                            - Địa chỉ Website: <?php echo $info['DD_WEBSITE']; ?> <br/>
                            Mô tả đôi nét: <?php echo $info['DD_MOTA']; ?> <br/>
                            Giới thiệu chi tiết: <?php echo $info['DD_GIOITHIEU']; ?> <br/>
                            Thời gian mở cửa: <?php echo $info['DD_BATDAU']; ?> <br/>
                            Thời gian đóng cửa: <?php echo $info['DD_KETTHUC']; ?> <br/>
                            Giá cả từ: <?php echo $info['DD_GIATU']; ?> VNĐ<br/>
                            Giá cả đến: <?php echo $info['DD_GIADEN']; ?> VNĐ<br/>
                            Chương trình (Nếu có): <?php echo $info['DD_NOIDUNG']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="tieude">Quản lý hình ảnh</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                              $madd = $info["DD_MA"];
                              foreach ($info1 as $item) 
                              {      
                                $madd1 = $item['DD_MA'];
                                if($madd == $madd1)
                                {
                                  ?>
                                        <div class="khung">
                                        <img class="img" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $item['HA_TEN'] ?>" width="250" height="250">
                                        <br/>
                                        <center>
                                        <button class="duyet" value="<?php echo $item['HA_MA']; ?>" ><div class="divduyet" id="<?php echo $item['HA_MA']; ?>1">
                                            
                                            <?php if($item['HA_DUYET'] == 0) 
                                                    {echo "Chưa Duyệt";} 
                                                    else {echo "Đã Duyệt";} 
                                            ?>

                                        </div></button>
                                        <!-- Tên: <?php echo $item['HA_TEN']; ?> |  --><input class="input" id="<?php echo $item['HA_MA']; ?>" type="text" value="<?php echo $item['HA_DUYET']; ?>" readonly="readonly" />
                                        <!-- <input class="duyet" type="button" value="<?php echo $item['HA_MA']; ?>" />
                                        <input class="xoa" type="button" value="<?php echo $item['HA_TEN']; ?>" /> -->
                                        
                                        <button class="xoa" value="<?php echo $item['HA_TEN']; ?>"><input class="input1" type="text" id="<?php echo $item['HA_TEN']; ?>" readonly="readonly" value="Xóa" /></button> </center> <br/>

                                        </div>
                                  <?php 
                                  //echo $item['HA_TEN']." | Duyệt: ".$item['HA_DUYET'];
                                }
                              }
                            ?>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <div class="tieude">Vị trí</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $map['html']; ?>
                            Lat: <input type="text" id="lat" value="" readonly="readonly" >
                            Lng: <input type="text" id="lng" value="" readonly="readonly" >
                        </td>
                    </tr>
                </table>
        </div>
    </div></center>
</body>
</html>