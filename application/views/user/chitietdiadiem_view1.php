<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxfileupload.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>

    <script type="text/javascript">
        function thongbao(title, message, type)
        {
          if(title == "")
          {
              title = "<?php echo lang('notification') ?>";
          }
          $.notify(
              {
                  icon: 'glyphicon glyphicon-star',
                  title: title+":",
                  message: message,
                  url: "https://google.com",
                  target: "_blank"
              },
              {
                  type: type, //warning danger
                  allow_dismiss: true,
                  delay: 3000,
                  timer: 1000,
                  offset: {
                      x: 10,
                      y: 10
                  },
                  z_index: 1090,
                  //icon_type: 'image',
                  newest_on_top: true,
                  animate: {
                      enter: 'animated fadeInRight',
                      exit: 'animated fadeOutRight'
                  }
              }
          );
        }

        $(document).ready(function () {
            $.jqx.theme = "bootstrap";
            function displayEvent(event) {
                var eventData = event.type;
                eventData += ': ' + event.args.value;
                $('#events').jqxPanel('clearContent');
                $('#events').jqxPanel('prepend', '<div class="item" style="margin-top: 5px;">' + event.args.value + '</div>');
                var tb = ($("#BL_PHUCVU").val() + $("#BL_KHONGGIAN").val() + event.args.value)/3;
                $("#diemtrungbinh").html(tb.toFixed(1));
            }

            $('#events').jqxPanel({  height: '30px', width: '10px' });
            $('#jqxSlider div').css('margin', '5px');
            //change event
            $('#BL_CHATLUONG').jqxSlider({ tooltip: true, showButtons: false, value: 5, mode: 'fixed', width: '150' });
            $('#BL_CHATLUONG').on('change', function (event) {
                displayEvent(event);
            });

            function displayEvent1(event) {
                var eventData = event.type;
                eventData += ': ' + event.args.value;
                $('#events1').jqxPanel('clearContent');
                $('#events1').jqxPanel('prepend', '<div class="item" style="margin-top: 5px;">' + event.args.value + '</div>');
                var tb = ($("#BL_CHATLUONG").val() + $("#BL_KHONGGIAN").val() + event.args.value)/3;
                $("#diemtrungbinh").html(tb.toFixed(1));
            }
            $('#events1').jqxPanel({  height: '30px', width: '10px' });
            //change event
            $('#BL_PHUCVU').jqxSlider({ tooltip: true, showButtons: false, value: 5, mode: 'fixed', width: '150' });
            $('#BL_PHUCVU').on('change', function (event) {
                displayEvent1(event);
            });

            function displayEvent2(event) {
                var eventData = event.type;
                eventData += ': ' + event.args.value;
                $('#events2').jqxPanel('clearContent');
                $('#events2').jqxPanel('prepend', '<div class="item" style="margin-top: 5px;">' + event.args.value + '</div>');
                var tb = ($("#BL_CHATLUONG").val() + $("#BL_PHUCVU").val() + event.args.value)/3;
                $("#diemtrungbinh").html(tb.toFixed(1));
            }
            $('#events2').jqxPanel({  height: '30px', width: '10px' });
            //change event
            $('#BL_KHONGGIAN').jqxSlider({ tooltip: true, showButtons: false, value: 5, mode: 'fixed', width: '150' });
            $('#BL_KHONGGIAN').on('change', function (event) {
                displayEvent2(event);
            });

            $("#btngui").click(function(){
              <?php 
                if($this->session->userdata('id') == "")
                { 
                  ?>
                    //setTimeout("location.href = '<?php echo base_url(); ?>index.php/login';",0);
                    thongbao("", "Vui lòng đăng nhập để bình luận bài viết", "danger");
                  <?php
                }
                else
                {
              ?>

              if($("#BL_TIEUDE").val() == "")
              {
                document.getElementById('BL_TIEUDE').style.backgroundColor = "#F99";
                $("#BL_TIEUDE").focus();
                thongbao("", "Tiêu đề không được rỗng!", "danger");
                return;
              }
              else
              {
                document.getElementById('BL_TIEUDE').style.backgroundColor = "#FFF";
              }

              if($("#BL_NOIDUNG").val() == "")
              {
                document.getElementById('BL_NOIDUNG').style.backgroundColor = "#F99";
                $("#BL_NOIDUNG").focus();
                thongbao("", "Nội dung không được rỗng!", "danger");
                return;
              }
              else
              {
                document.getElementById('BL_NOIDUNG').style.backgroundColor = "#FFF";
              }

              var url, dta;
              url="<?php echo base_url(); ?>index.php/binhluan/add?t=" + Math.random();
              dta = {
                "DD_MA" : "<?php echo $info['DD_MA']; ?>",
                "BL_TIEUDE" : $("#BL_TIEUDE").val(),
                "BL_NOIDUNG" : $("#BL_NOIDUNG").val(),
                "BL_CHATLUONG" : $("#BL_CHATLUONG").val(),
                "BL_PHUCVU" : $("#BL_PHUCVU").val(),
                "BL_KHONGGIAN" : $("#BL_KHONGGIAN").val()
              };
              console.log(dta);
              $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                if(status == "success")
                { 
                  if(data.status == "error")
                  {

                  }
                  else
                  {
                    //$('#myModalbl').modal('toggle');
                    thongbao("", "Gửi bình luận thành công", "success");
                    $("#jqxFileUpload").show();
                    //$("#idbinhluan").show();
                     document.getElementById("btngui").disabled = true;
                     var idbinhluan = data.msg['idbinhluan'];
                     //alert(idbinhluan);
                     document.getElementById("idbinhluan").value = idbinhluan;
                     var path = "<?php echo base_url(); ?>index.php/upload/upload/" + idbinhluan;

                     $('#jqxFileUpload').jqxFileUpload({ localization: { browseButton: '<?php echo lang("browse") ?>', uploadButton: "<?php echo lang('upload_all') ?>", cancelButton: "<?php echo lang('cancel_all') ?>", uploadFileTooltip: "<?php echo lang('upload_file') ?>", cancelFileTooltip: "<?php echo lang('cancel') ?>" } });

                     $('#jqxFileUpload').jqxFileUpload({ multipleFilesUpload: true });

                     $('#jqxFileUpload').jqxFileUpload({ width: "100%", uploadUrl: path, fileInputName: 'fileToUpload'});

                    $('#eventsPanel').jqxPanel({ width: "100%", height: 150 });
                    $('#jqxFileUpload').on('select', function (event) {
                        var args = event.args;
                        var fileName = args.file;
                        var fileSize = args.size;
                        var fileindex = args.owner._fileRows["length"] - 1;
                        $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                            fileName + ';<br />' + 'size: ' + fileSize + '<br />');

                        if(fileSize > 2500000)
                        {
                          $('#jqxFileUpload').jqxFileUpload('cancelFile', fileindex);
                          thongbao("", "<?php echo lang('sorry_your_file_is_too_large') ?>", "danger");
                        }
                    });
                    $('#jqxFileUpload').on('remove', function (event) {
                        var fileName = event.args.file;
                        $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br /> <hr /> ');
                    });
                    $('#jqxFileUpload').on('uploadStart', function (event) {
                        var fileName = event.args.file;
                        $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br />');
                    });
                    $('#jqxFileUpload').on('uploadEnd', function (event) {
                        var args = event.args;
                        var fileName = args.file;
                        var serverResponce = args.response;
                        $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                            fileName + ';<br />' + 'server response: ' + serverResponce + '<br />');
                        thongbao("", "Upload thanh cong", "success");
                    });
                    //setTimeout("location.href = '<?php echo base_url(); ?>index.php/aediadiem/detailuser/<?php echo $info['DD_MA']; ?>';",1500);
                    //alert("Thêm thành công");
                  }
                }
              }, 'json');
              <?php 
                }
              ?>
            });

            $("#checkin").click(function(){
              var checkin = $("#checkinvalue").val();
              var tg = '0';
              if(checkin == "1")
              {
                document.getElementById("checkinvalue").value = "0";
                document.getElementById('iconcheckin').className = "fa fa-square-o fa-fw";
              }
              else
              {
                document.getElementById("checkinvalue").value = "1";
                document.getElementById('iconcheckin').className = "fa fa-check-square-o fa-fw";
                tg = '1';
              }

              var url, dta;
              url="<?php echo base_url(); ?>index.php/nguoidungdiadiem/checkin?t=" + Math.random();
              dta = {
                "DD_MA" : "<?php echo $info['DD_MA']; ?>",
                "NDDD_DADEN" : tg
              };
              console.log(dta);
              $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                if(status == "success")
                { 
                  if(data.status == "error")
                  {

                  }
                  else
                  {
                    //alert(data.msg['count']);
                    /*$("#countcheckin").html(data.msg['count']);*/
                    document.getElementById("countcheckin").innerHTML = data.msg['count'];
                  }
                }
              }, 'json');
            });

            $("#yeuthich").click(function(){
              var checkin = $("#yeuthichvalue").val();
              var tg = '0';
              if(checkin == "1")
              {
                document.getElementById("yeuthichvalue").value = "0";
                document.getElementById('iconyeuthich').className = "fa fa-heart-o fa-fw";
              }
              else
              {
                document.getElementById("yeuthichvalue").value = "1";
                document.getElementById('iconyeuthich').className = "fa fa-heart fa-fw";
                tg = '1';
              }

              var url, dta;
              url="<?php echo base_url(); ?>index.php/nguoidungdiadiem/yeuthich?t=" + Math.random();
              dta = {
                "DD_MA" : "<?php echo $info['DD_MA']; ?>",
                "NDDD_YEUTHICH" : tg
              };
              console.log(dta);
              $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                if(status == "success")
                { 
                  if(data.status == "error")
                  {

                  }
                  else
                  {
                    /*$("#countyeuthich").html(data.msg['count']);*/
                    document.getElementById("countyeuthich").innerHTML = data.msg['count'];
                  }
                }
              }, 'json');
            });

            $("#muonden").click(function(){
              var checkin = $("#muondenvalue").val();
              var tg = '0';
              if(checkin == "1")
              {
                document.getElementById("muondenvalue").value = "0";
                document.getElementById('iconmuonden').className = "fa fa-star-o fa-fw";
              }
              else
              {
                document.getElementById("muondenvalue").value = "1";
                document.getElementById('iconmuonden').className = "fa fa-star fa-fw";
                tg = '1';
              }

              var url, dta;
              url="<?php echo base_url(); ?>index.php/nguoidungdiadiem/muonden?t=" + Math.random();
              dta = {
                "DD_MA" : "<?php echo $info['DD_MA']; ?>",
                "NDDD_MUONDEN" : tg
              };
              console.log(dta);
              $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                if(status == "success")
                { 
                  if(data.status == "error")
                  {

                  }
                  else
                  {
                    /*$("#countmuonden").html(data.msg['count']);*/
                    document.getElementById("countmuonden").innerHTML = data.msg['count'];
                  }
                }
              }, 'json');
            });

            var checkin = "<?php echo $danhgia['NDDD_DADEN']; ?>";
            if(checkin == '1')
            {
              document.getElementById("checkinvalue").value = "1";
              document.getElementById('iconcheckin').className = "fa fa-check-square-o fa-fw";
            }

            var yeuthich = "<?php echo $danhgia['NDDD_YEUTHICH']; ?>";
            if(yeuthich == "1")
            {
              document.getElementById("yeuthichvalue").value = "1";
              document.getElementById('iconyeuthich').className = "fa fa-heart fa-fw";
            }

            var muonden = "<?php echo $danhgia['NDDD_MUONDEN']; ?>";
            if(muonden == "1")
            {
              document.getElementById("muondenvalue").value = "1";
              document.getElementById('iconmuonden').className = "fa fa-star fa-fw";
            }

            var url, dta;
            url="<?php echo base_url(); ?>index.php/aediadiem/updateluotxem?t=" + Math.random();
            dta = {
              "DD_MA" : "<?php echo $info['DD_MA']; ?>"
            };
            console.log(dta);
            $.post(url, dta, function(data, status){

              console.log(status);
              console.log(data);
              if(status == "success")
              { 
                if(data.status == "error")
                {

                }
                else
                {
                  console.log(data.data["DD_LUOTXEM"]);
                  $("#countluotxem").html(data.data["DD_LUOTXEM"]);
                }
              }
            }, 'json');

            //dang anh cho dia diem
            var path = "<?php echo base_url(); ?>index.php/diadiemhinh/uploadimg/" + "<?php echo $info['DD_MA']; ?>";

            $('#jqxFileUpload1').jqxFileUpload({ localization: { browseButton: '<?php echo lang("browse") ?>', uploadButton: "<?php echo lang('upload_all') ?>", cancelButton: "<?php echo lang('cancel_all') ?>", uploadFileTooltip: "<?php echo lang('upload_file') ?>", cancelFileTooltip: "<?php echo lang('cancel') ?>" } });

            $('#jqxFileUpload1').jqxFileUpload({ multipleFilesUpload: true });

            $('#jqxFileUpload1').jqxFileUpload({ width: "100%", uploadUrl: path, fileInputName: 'fileToUpload'});

            $('#eventsPanel1').jqxPanel({ width: "100%", height: 100 });
            $('#jqxFileUpload1').on('select', function (event) {
                var args = event.args;
                var fileName = args.file;
                var fileSize = args.size;
                var fileindex = args.owner._fileRows["length"] - 1;
                $('#eventsPanel1').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                    fileName + ';<br />' + 'size: ' + fileSize + '<br />');

                if(fileSize > 2500000)
                {
                  $('#jqxFileUpload1').jqxFileUpload('cancelFile', fileindex);
                  thongbao("", "<?php echo lang('sorry_your_file_is_too_large') ?>", "danger");
                }
            });
            $('#jqxFileUpload1').on('remove', function (event) {
                var fileName = event.args.file;
                $('#eventsPanel1').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br /> <hr /> ');
            });
            $('#jqxFileUpload1').on('uploadStart', function (event) {
                var fileName = event.args.file;
                $('#eventsPanel1').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br />');
            });
            $('#jqxFileUpload1').on('uploadEnd', function (event) {
                var args = event.args;
                var fileName = args.file;
                var serverResponce = args.response;
                $('#eventsPanel1').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                    fileName + ';<br />' + 'server response: ' + serverResponce + '<br />');
                if(serverResponce.indexOf("!") != "-1")
                {
                    thongbao("", serverResponce, "success");
                }
                else
                {
                    thongbao("", serverResponce, "danger");
                }
            });

        });
    </script>

<style type="text/css">
    #diembinhluan{
        border-radius: 3px;
        width: 100%; 
        text-align: center; 
        padding: 5px;
        color: #000;

        background: -webkit-linear-gradient(left, rgba(207,207,207,207), rgba(255,0,0,0)); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(right, rgba(207,207,207,207), rgba(255,0,0,0)); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(right, rgba(207,207,207,207), rgba(255,0,0,0)); /* For Firefox 3.6 to 15 */
        background: linear-gradient(to right, rgba(207,207,207,207), rgba(255,0,0,0)); /* Standard syntax (must be last) */

        box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
    }
    .img{
        border-radius: 2px;
        box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
    }
    .li{
      cursor: pointer;
    }
    .value{
      width: 0px;
      display: none;
    }
    .events{
      border-width: 0px;
      display: none;
    }
</style>

</head><!--/head-->

<body>

    <section id="blog" class="container">
        

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

        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">
                        <div class="center" style="margin-bottom: 0px; padding: 0px; text-transform: capitalize;">
                            <h2><?php echo $info['DD_TEN']; ?></h2>
                            <p class="lead"><?php echo $info['DD_GIOITHIEU']; ?></p>
                        </div>
                        <img class="img-responsive img-blog" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" width="100%" alt="" />
                            <div style="margin-top: -30px;" class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date"><?php echo $info["DD_NGAYDANG"] ?></span>
                                        <span style="text-transform: capitalize;"><i class="fa fa-user"></i> <a href="#"> <?php echo $info["ND_TEN"] ?></a></span>
                                        <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments"><?php echo $countbinhluan ?> Comments</a></span>
                                        <span><i class="fa fa-heart"></i><a href="#"><?php echo $countyeuthich ?> Likes</a></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <p><b>Giới thiệu:</b> <i><?php echo $info["DD_GIOITHIEU"] ?></i></b></p>
                                    <p>
                                        <i class="fa fa-road fa-fw"></i> <b> Nằm trên đường </b>
                                        <?php echo $info['DD_DIACHI']; ?> 
                                        thuộc
                                          <?php
                                            if($tenxa != "")
                                            {
                                              echo " xã ".$tenxa; 
                                            } 
                                            
                                          ?> huyện <?php echo $tenhuyen; ?> tỉnh <?php echo $tentinh; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-phone fa-fw"></i> <b> Số điện thoại </b>
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
                                    </p>
                                    <p>
                                        <i class="fa fa-envelope-o fa-fw"></i> <b> Địa chỉ Email </b>
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
                                    </p>
                                    <p>
                                        <i class="fa fa-google-plus fa-fw"></i> <b> Địa chỉ Website </b>
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
                                    </p>
                                    <p>
                                        <i class="fa fa-clock-o fa-fw"></i> <b> Thời gian mở cửa </b>
                                        <?php echo $info['DD_BATDAU']; ?> - <?php echo $info['DD_KETTHUC']; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-tag fa-fw"></i> <b> Giá bán </b>
                                        <?php echo $info['DD_GIATU']; ?> - <?php echo $info['DD_GIADEN']; ?>
                                    </p>

                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        
                        <div style="margin-top: -60px;" class="media reply_section">
                            <div class="pull-left post_reply text-center">
                                <a href="#"><img src="<?php echo base_url(); ?>uploads/user/<?php echo $info['ND_HINH']; ?>" class="img-circle" alt="" /></a>
                                <ul>
                                    <li><a target="_blank" href="<?php echo $info["ND_FACE"] ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                                </ul>
                            </div>
                            <div class="media-body post_reply_content">
                                <h3><?php echo $info["ND_HO"]." ".$info["ND_TEN"] ?></h3>
                                <p class="lead">
                                    <?php echo $info["DD_MOTA"] ?>
                                </p>
                                <p><strong>Facebook:</strong> <a target="_blank" href="<?php echo $info["ND_FACE"] ?>"><?php echo $info["ND_FACE"] ?></a></p>
                            </div>
                        </div> 
                        
                        <h1 style="margin-top: 20px; margin-bottom: -10px;" id="comments_title"><?php echo $countbinhluan ?> bình luận</h1>

                        <?php
                            foreach ($binhluan as $iteam) {
                              $mabinhluan = $iteam['BL_MA'];
                              $tieude = $iteam['BL_TIEUDE'];
                              $noidung = $iteam['BL_NOIDUNG'];
                              $chatluong = $iteam['BL_CHATLUONG'];
                              $phucvu = $iteam['BL_PHUCVU'];
                              $khonggian = $iteam['BL_KHONGGIAN'];
                              $ngaydang = $iteam['BL_NGAYDANG'];

                              $diem = ($chatluong + $phucvu + $khonggian) / 3;

                              $honguoidang = $iteam['ND_HO'];
                              $tennguoidang = $iteam['ND_TEN'];
                              $hinhnguoidang = $iteam['ND_HINH'];
                        ?>

                        <div class="media comment_section">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="<?php echo base_url(); ?>uploads/user/<?php echo $hinhnguoidang; ?>" class="img-circle" alt="" /></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <b style="text-transform: capitalize; font-size: 16px;"><?php echo $honguoidang." ".$tennguoidang ?></b> - 
                                <b style="font-style: italic;"><?php echo $ngaydang ?></b><br/>
                                <b style="font-weight: bold; font-size: 20px; text-transform: capitalize;"><?php echo $tieude ?></b>
                                <p>
                                    <?php echo $noidung ?>
                                <br/>
                                    <?php
                                         foreach ($anhbinhluan as $key) {
                                            if($key['BL_MA'] == $mabinhluan)
                                            {
                                              $tenanh = $key['ABL_TEN'];
                                      ?>
                                            <img class="img" src="<?php echo base_url(); ?>uploads/binhluan/<?php echo $tenanh ?>" width="18%" height="70">
                                      <?php
                                            }
                                          }
                                    ?>
                                </p>

                                <a href="#name">Bình luận</a>
                            </div>
                        </div>

                        <?php
                            }
                        ?> 
                        <a name="name"></a>
                        <div style="margin-top: -30px;" id="contact-page clearfix">
                            <div class="status alert alert-success" style="display: none"></div>
                            <div class="message_heading">
                                <h4>Bình luận về bài đăng: <?php echo $info['DD_TEN']; ?></h4>
                                <p>Make sure you enter the(*)required information where indicate.HTML code is not allowed</p>
                            </div> 
      
                            <form style="margin-top: -30px;" id="main-contact-form" class="contact-form" name="contact-form" method="post" action="" role="form">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Tiêu đề *</label>
                                            <input type="text" id="BL_TIEUDE" placeholder="Nhập tiêu đề bình luận" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Đánh giá *</label> <br>
                                            Chất lượng: 
                                            <div style="margin-bottom: -20px;" id='jqxWidget'>
                                              <div id="container">
                                                  <div id='BL_CHATLUONG'></div>
                                              </div> 
                                              <div id="events" class="events"></div>    
                                            </div>
                                            <br>
                                            Phục vụ: 
                                            <div style="margin-bottom: -20px;" id='jqxWidget1'>
                                                <div id="container1">
                                                    <div id='BL_PHUCVU'></div>
                                                </div>     
                                                <div id="events1" class="events"></div>
                                            </div>
                                            <br>
                                            Không gian: 
                                            <div style="margin-bottom: -20px;" id='jqxWidget2'>
                                                <div id="container2">
                                                    <div id='BL_KHONGGIAN'></div>
                                                </div>   
                                                <div id="events2" class="events"></div>  
                                            </div>
                                            <br>
                                            <div style="float: left; padding-right: 5px;">Điểm trung bình: </div>  
                                            <div id="diemtrungbinh" style="float: left">5</div>
                                            
                                        </div>                   
                                    </div>
                                    <div class="col-sm-7">                        
                                        <div class="form-group">
                                            <label>Nội dung *</label>
                                            <textarea name="message" id="BL_NOIDUNG" placeholder="Nhập nội dung" required="required" class="form-control" rows="8"></textarea>

                                            <input type="text" id="idbinhluan" style="border-width: 0px; display: none;" readonly="readonly" >
                                            <div id="jqxFileUpload">
                                            </div>
                                            <div id="eventsPanel">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" id="btngui" class="btn btn-primary btn-lg" required="required">Gửi bình luận</button>
                                        </div>
                                    </div>
                                </div>
                            </form>     
                        </div><!--/#contact-page-->
                    </div><!--/.col-md-8-->

                <aside class="col-md-4">

                    <div class="widget tags">
                        <h3>Đánh giá: <div style="margin-top: -10px;" class="rw-ui-container"></div></h3>
                        
                        <div id="diembinhluan">
                          <table width="100%">
                            <tr style="font-weight: bolder;">
                              <td width="25%">
                                <?php echo $diemchatluong?>
                              </td>
                              <td width="25%">
                                <?php echo $diemphucvu ?>
                              </td>
                              <td width="25%">
                                <?php echo $diemkhonggian ?>
                              </td>
                              <td width="25%">
                                <?php 
                                  $diemtb = ($diemchatluong + $diemphucvu + $diemkhonggian)/3;
                                  $diemtb = round($diemtb, 1);
                                  echo round($diemtb, 1)." <i class='fa fa-flag-checkered fa-fw'></i>";
                                  if(0 < $diemtb && $diemtb < 2)
                                  {
                                    echo "Kém";
                                  }
                                  if(2 <= $diemtb && $diemtb < 4)
                                  {
                                    echo "Trung bình";
                                  }
                                  if(4 <= $diemtb && $diemtb < 6)
                                  {
                                    echo "Khá";
                                  }
                                  if(6 <= $diemtb && $diemtb < 8)
                                  {
                                    echo "Tốt";
                                  }
                                  if(8 <= $diemtb && $diemtb <= 10)
                                  {
                                    echo "Tuyệt vời";
                                  }

                                ?>
                              </td>
                            </tr>
                            <tr style="font-style: italic;">
                              <td>Chất lượng</td>
                              <td>Phục vụ</td>
                              <td>Không gian</td>
                              <td>Trung bình</td>
                            </tr>
                          </table>
                        </div>
                    </div><!--/.tags-->

                    <div style="margin-top: -30px;" class="widget archieve">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve">
                                    <li>
                                      <a href="#name">
                                        <i class="fa fa-comment fa-fw"></i> Bình luận
                                        <span class="pull-right">(<label><?php echo $countbinhluan ?></label>)</span>
                                      </a>
                                    </li>
                                    <li class="li" data-toggle='modal' data-target='#myModal'>
                                        <a>
                                          <i class="fa fa-picture-o fa-fw"></i> Đăng ảnh 
                                          <span class="pull-right">(<label><?php echo $counthinhanh ?></label>)</span>
                                        </a>
                                    </li>
                                    <li id='checkin' class="li">
                                       <i id="iconcheckin" class="fa fa-square-o fa-fw"></i> Check-in
                                        <span class="pull-right">(<label id="countcheckin"><?php echo $countcheckin ?></label>)</span>
                                        <input class="value" type="text" value="0" id="checkinvalue" />
                                    </li>
                                    <li id='yeuthich' class="li">
                                        <i id="iconyeuthich" class="fa fa-heart-o fa-fw"></i> Yêu thích
                                        <span class="pull-right">(<label id="countyeuthich"><?php echo $countyeuthich ?></label>)</span>
                                        <input class="value" type="text" value="0" id="yeuthichvalue" />
                                    </li>
                                    <li id='muonden' class="li">
                                        <i id="iconmuonden" class="fa fa-star-o fa-fw"></i> Muốn đến
                                        <span class="pull-right">(<label id="countmuonden"><?php echo $countmuonden ?></label>)</span>
                                        <input class="value" type="text" value="0" id="muondenvalue" />
                                    </li>
                                    <li>
                                         <i id="iconluotxem" class="fa fa-eye"></i> Lượt xem
                                        <span class="pull-right">(<label id="countluotxem"></label>)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>                     
                    </div><!--/.archieve-->

                    <div style="margin-top: -30px;" class="widget blog_gallery">
                        <h3>Hình ảnh</h3>
                        <ul class="sidebar-gallery">
                            <?php
                                foreach ($info1 as $key) {
                                  $hinh = $key['HA_TEN'];
                                  $duyet = $key['HA_DUYET'];
                                  if($duyet == "1")
                                  {
                              ?>    
                                    <li>
                                        <img class="img" data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" width="107" height="60" />
                                    </li>
                             <?php
                                  }
                                }
                              ?>
                        </ul>
                    </div><!--/.blog_gallery-->
    				
    				        <div style="margin-top: -30px;" class="widget categories">
                        <h3>Bản đồ</h3>
                        <div class="row">
                            <?php echo $map['js']; ?>
                            <?php echo $map['html']; ?>
                        </div>                     
                    </div><!--/.recent comments-->
                     

                    <!-- <div class="widget categories">
                        <h3>Categories</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="blog_category">
                                    <li><a href="#">Computers <span class="badge">04</span></a></li>
                                    <li><a href="#">Smartphone <span class="badge">10</span></a></li>
                                    <li><a href="#">Gedgets <span class="badge">06</span></a></li>
                                    <li><a href="#">Technology <span class="badge">25</span></a></li>
                                </ul>
                            </div>
                        </div>                     
                    </div> --><!--/.categories-->
    				
                </aside>     

            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->

    <!-- Modal upload anh -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o fa-fw"></i> Đăng ảnh</h4>
        </div>
        <div class="modal-body">
          <!-- <form method="post" action="<?php echo base_url(); ?>diadiemhinh/uploadsuser/<?php echo $info['DD_MA'] ?>" enctype="multipart/form-data">
            <input type="text" id="ma" name="ma" value="<?php echo $info['DD_MA'] ?>" style="display: none;" readonly />
            <label>Ảnh kèm theo:</label>
            <input type="file"  id="image_list" name="image_list[]" multiple max-size="100000">
            <br />
            <input type="submit" class="button" value="Tải lên" name='submit' id="submit" />
          </form> -->
          <div id="jqxFileUpload1">
          </div>
          <div id="eventsPanel1">
          </div>

        </div>
        <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div> -->
      </div> <!-- /.modal-content --> 
    </div><!-- /.modal-dialog --> 
    </div><!-- /.modal -->

    <script type="text/javascript">(function(d, t, e, m){
        // Async Rating-Widget initialization.
        window.RW_Async_Init = function(){
                    
            RW.init({
                huid: "303132",
                uid: "8ab87ba9822826e936fb6629712d52fb",
                source: "website",
                options: {
                    "size": "medium",
                    "lng": "vi",
                    "style": "oxygen1",
                    "isDummy": false
                } 
            });
            RW.render();
        };
            // Append Rating-Widget JavaScript library.
        var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
            l = d.location, ck = "Y" + t.getFullYear() + 
            "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
            f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
            a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
        if (d.getElementById(id)) return;              
        rw = d.createElement(e);
        rw.id = id; rw.async = true; rw.type = "text/javascript";
        rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
        s.parentNode.insertBefore(rw, s);
        }(document, new Date(), "script", "rating-widget.com/"));
    </script>


</body>
</html>