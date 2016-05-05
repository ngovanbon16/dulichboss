<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.arctic.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxfileupload.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxrating.js"></script>
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

            $("#BL_CHATLUONG").jqxRating({ width: "100%", height: 35, theme: 'classic'});
            $("#BL_CHATLUONG").on('change', function (event) {
                var diem = event.value*2;
                var tb = ($("#BL_PHUCVU").val()*2 + $("#BL_KHONGGIAN").val()*2 + diem)/3;
                $("#diemtrungbinh").html(tb.toFixed(1));
            });

            $("#BL_PHUCVU").jqxRating({ width: "100%", height: 35, theme: 'classic'});
            $("#BL_PHUCVU").on('change', function (event) {
                var diem = event.value*2;
                var tb = ($("#BL_CHATLUONG").val()*2 + $("#BL_KHONGGIAN").val()*2 + diem)/3;
                $("#diemtrungbinh").html(tb.toFixed(1));
            });

            $("#BL_KHONGGIAN").jqxRating({ width: "100%", height: 35, theme: 'classic'});
            $("#BL_KHONGGIAN").on('change', function (event) {
                var diem = event.value*2;
                var tb = ($("#BL_CHATLUONG").val()*2 + $("#BL_PHUCVU").val()*2 + diem)/3;
                $("#diemtrungbinh").html(tb.toFixed(1));
            });

            $("#btngui").click(function(){
              <?php 
                if($this->session->userdata('id') == "")
                { 
                  ?>
                    //setTimeout("location.href = '<?php echo base_url(); ?>login';",0);
                    thongbao("", "<?php echo lang('please').' '.lang('login'); ?>", "danger");
                  <?php
                }
                else
                {
              ?>

              if($("#BL_TIEUDE").val() == "")
              {
                document.getElementById('BL_TIEUDE').style.backgroundColor = "#F99";
                $("#BL_TIEUDE").focus();
                thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('title') ?>", "danger");
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
                thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('content') ?>", "danger");
                return;
              }
              else
              {
                document.getElementById('BL_NOIDUNG').style.backgroundColor = "#FFF";
              }

              if($("#BL_CHATLUONG").val() == "")
              {
                document.getElementById('BL_CHATLUONG').style.backgroundColor = "#F99";
                $("#BL_CHATLUONG").focus();
                thongbao("", "<?php echo lang('please').' '.lang('rating').'!' ?>", "danger");
                return;
              }
              else
              {
                document.getElementById('BL_CHATLUONG').style.backgroundColor = "#FFF";
              }

              if($("#BL_PHUCVU").val() == "")
              {
                document.getElementById('BL_PHUCVU').style.backgroundColor = "#F99";
                $("#BL_PHUCVU").focus();
                thongbao("", "<?php echo lang('please').' '.lang('rating').'!' ?>", "danger");
                return;
              }
              else
              {
                document.getElementById('BL_PHUCVU').style.backgroundColor = "#FFF";
              }

              if($("#BL_KHONGGIAN").val() == "")
              {
                document.getElementById('BL_KHONGGIAN').style.backgroundColor = "#F99";
                $("#BL_KHONGGIAN").focus();
                thongbao("", "<?php echo lang('please').' '.lang('rating').'!' ?>", "danger");
                return;
              }
              else
              {
                document.getElementById('BL_KHONGGIAN').style.backgroundColor = "#FFF";
              }

              var url, dta;
              url="<?php echo base_url(); ?>binhluan/add?t=" + Math.random();
              dta = {
                "DD_MA" : "<?php echo $info['DD_MA']; ?>",
                "BL_TIEUDE" : $("#BL_TIEUDE").val(),
                "BL_NOIDUNG" : $("#BL_NOIDUNG").val(),
                "BL_CHATLUONG" : $("#BL_CHATLUONG").val()*2,
                "BL_PHUCVU" : $("#BL_PHUCVU").val()*2,
                "BL_KHONGGIAN" : $("#BL_KHONGGIAN").val()*2
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
                    thongbao("", "<?php echo lang('comment_successfully_posted') ?>", "success");
                    $("#btnsuccessbl").css("display", "block");
                    $("#jqxFileUpload").show();
                    //$("#idbinhluan").show();
                     document.getElementById("btngui").disabled = true;
                     var idbinhluan = data.msg['idbinhluan'];
                     //alert(idbinhluan);
                     document.getElementById("idbinhluan").value = idbinhluan;
                     var path = "<?php echo base_url(); ?>upload/upload/" + idbinhluan;

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

                        if(fileSize > 6000000)
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
                        if(serverResponce.indexOf("!") != "-1")
                        {
                            thongbao("", serverResponce, "success");
                        }
                        else
                        {
                            thongbao("", serverResponce, "danger");
                        }
                    });
                    //setTimeout("location.href = '<?php echo base_url(); ?>aediadiem/detailuser/<?php echo $info['DD_MA']; ?>';",1500);
                    //alert("Thêm thành công");
                  }
                }
              }, 'json');
              <?php 
                }
              ?>
            });

            $("#btnsuccessbl").click(function(){
                $('#jqxFileUpload').jqxFileUpload('uploadAll');
                thongbao("", "<?= lang('please_reload_the_page_after_a_successful_upload') ?>", "success");
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
              url="<?php echo base_url(); ?>nguoidungdiadiem/checkin?t=" + Math.random();
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
              url="<?php echo base_url(); ?>nguoidungdiadiem/yeuthich?t=" + Math.random();
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
              url="<?php echo base_url(); ?>nguoidungdiadiem/muonden?t=" + Math.random();
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
            url="<?php echo base_url(); ?>aediadiem/updateluotxem?t=" + Math.random();
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
            var path = "<?php echo base_url(); ?>diadiemhinh/uploadimg/" + "<?php echo $info['DD_MA']; ?>";

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

                if(fileSize > 6000000)
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

            function mau(diem)
              {
                  if(diem >= 0 && diem < 2)
                  {
                    return "#F00";
                  }
                  if(diem >= 2 && diem < 4)
                  {
                    return "#F90";
                  }
                  if(diem >= 4 && diem < 6)
                  {
                    return "#0CF";
                  }
                  if(diem >= 6 && diem < 8)
                  {
                    return "#03F";
                  }
                  if(diem >= 8 && diem <= 10)
                  {
                    return "#0D0";
                  }
              }
              var hinhanh;
            $("#btnthem").click(function(){
              //alert("them");
              var id = "<?php echo $info['DD_MA']; ?>";
              var start = $("#count").html();
              var length = 5;
              var url, dta;
              url="<?php echo base_url(); ?>aediadiem/getdata?t=" + Math.random();
              dta = {
                  "ma" : id,
                  "start" : start,
                  "length" : length
              };

              $.ajax({
                  url : url,
                  type : 'post',
                  dataType : 'json',
                  data : dta,
                  success : function (data){
                      console.log(data);

                     var str = "";
                      
                      var j = 0;
                      for (var i = 0; i < data.diadiem.length; i++) {

                          mabinhluan = data.diadiem[i]['BL_MA'];
                          tieude = data.diadiem[i]['BL_TIEUDE'];
                          noidung = data.diadiem[i]['BL_NOIDUNG'];
                          chatluong = data.diadiem[i]['BL_CHATLUONG'];
                          phucvu = data.diadiem[i]['BL_PHUCVU'];
                          khonggian = data.diadiem[i]['BL_KHONGGIAN'];
                          ngaydang = data.diadiem[i]['BL_NGAYDANG'];

                          diem = eval("(" + chatluong + "+" + phucvu + "+" + khonggian + ")/3");
                          diem = diem.toFixed(1);

                          maucl = mau(chatluong);
                          maupv = mau(phucvu);
                          maukg = mau(khonggian);
                          mautb = mau(diem);

                          honguoidang = data.diadiem[i]['ND_HO'];
                          tennguoidang = data.diadiem[i]['ND_TEN'];
                          hinhnguoidang = data.diadiem[i]['ND_HINH'];

                          hinhanh = "";
                          for (var j = 0; j < data.diadiem[i]["ANHBINHLUAN"].length; j++) {
                            tenhinh = data.diadiem[i]["ANHBINHLUAN"][j]["ABL_TEN"];
                            if(j > 4)
                            {
                              break;
                            }
                            hinhanh += '<img style="margin: 2px;" class="img" src="<?php echo base_url(); ?>uploads/binhluan/'+tenhinh+'" width="120" height="100">';
                          }

                          str += '<div class="media reply_section"><div class="pull-left post_reply text-center" style="margin: 10px;"><a href="#"><img style="border: solid 1px #DCDCDC; width: 70px; height: 70px;" src="<?php echo base_url(); ?>uploads/user/'+hinhnguoidang+'" class="img-circle" alt="" /></a></div><div class="media-body post_reply_content" style="color: #000; margin: 10px;"><h5 style="text-transform: capitalize; color: #000;"> '+honguoidang+' '+tennguoidang+' - <i style="font-size: 13px;"><?php echo lang("comment"); ?> </i><i style="font-size: 13px; opacity: 0.7;">'+ngaydang+'</i><div style="margin-top: 5px; font-size: 13px;"><i><?php echo lang("quality") ?>: </i><span style="color: '+maucl+'; font-weight: bolder;" >'+chatluong+'</span> | <i><?php echo lang("service") ?>: </i><span style="color: '+maupv+'; font-weight: bolder;" >'+phucvu+'</span> | <i><?php echo lang("space") ?>: </i><span style="color: '+maukg+'; font-weight: bolder;" >'+khonggian+'</span> | <i><?php echo lang("average") ?>: </i><span style="color: '+mautb+'; font-weight: bolder;" >'+diem+'</span></div></h5><h3 style="color: #000; font-weight: bold; font-size: 18px; text-transform: capitalize;">'+tieude+'</h3><p><div style="text-align: justify; margin-bottom: 10px; line-height: 1.5; font-size: 13px;">'+noidung+' </div><div style="cursor: pointer;" data-toggle="modal" data-target="#Modalcomment" onclick="xemanhbinhluan('+mabinhluan+')">'+hinhanh+'</div></p><div style="text-align: right;"><a style="z-index: 10;" href="#name"><button style="background-color: #1AA5D1;" type="button" class="btn btn-info"> <i class="fa fa-comment-o fa-fw"></i> <?php echo lang("comment") ?></button></a></div></div></div>';
                      }
                      document.getElementById('noidung').innerHTML += str;

                      if(data.diadiem.length == 0)
                      {
                          $("#btnthem").hide();
                      }
                      else
                      {
                          document.getElementById('count').innerHTML = eval(start + "+" + data.diadiem.length);
                      }
                  }
              });

            });
        });

        function xemhinhanh(tenhinh)
        {
          var url = "<?= base_url(); ?>diadiemhinh/datahinhdd";
          var data = {
              "DD_MA" : "<?= $info['DD_MA']; ?>"
          };
          console.log(data);
          $.ajax({
              url : url,
              type : 'post',
              dataType : 'json',
              data : data,
              success : function (data){
                  console.log(data);
                  var ol = "";
                  var div = "";
                  for (var i = 0; i < data.length; i++) {
                    var HA_TEN = data[i]["HA_TEN"];
                    var activeol = "";
                    var activediv = "item";
                    if(HA_TEN == tenhinh)
                    {
                      activeol = "active";
                      activediv = "item active";
                    }
                    ol += '<li data-target="#my-pics" data-slide-to="'+i+'" class="'+activeol+'"></li>';
                    div += '<div class="'+activediv+'"><img style="height: 500px;" src="<?php echo base_url(); ?>uploads/diadiem/'+HA_TEN+'" alt="" width="100%" ></div>';
                 }
                 if(data.length == '0')
                  {
                      document.getElementById("next").style.display = "none";
                      document.getElementById("previous").style.display = "none";
                  }
                  else
                  {
                      document.getElementById("next").style.display = "block";
                      document.getElementById("previous").style.display = "block";
                  }
                  document.getElementById("ol").innerHTML = ol;
                  document.getElementById("div").innerHTML = div;
              }
          });
        }
        
        function xemanhbinhluan(idbinhluan)
        {
            var url, dta;
            url="<?php echo base_url(); ?>binhluan/anhbinhluan?t=" + Math.random();
            dta = {
              "ma" : idbinhluan,
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
                    var ol = "";
                    var div = "";
                    for (var i = 0; i < data.data.length; i++) {
                      var tenanh = data.data[i]["ABL_TEN"];
                      if(i == '0')
                      {
                        ol += '<li data-target="#main-slider1" data-slide-to="0" class="active"></li>';
                        div += '<div class="item active" style="max-height: 500px;"><img style="height: 500px;" src="<?php echo base_url(); ?>uploads/binhluan/'+tenanh+'" alt="" width="100%" ></div>';
                      }
                      else
                      {
                        ol += '<li data-target="#main-slider1" data-slide-to="'+i+'"></li>';
                        div += '<div class="item" style="max-height: 500px;"><img style="height: 500px;" src="<?php echo base_url(); ?>uploads/binhluan/'+tenanh+'" alt="" width="100%" ></div>';
                      }
                      //console.log(data.data[i]["ABL_TEN"]);
                    }
                    if(i == '1')
                    {
                        document.getElementById("next").style.display = "none";
                        document.getElementById("previous").style.display = "none";
                    }
                    else
                    {
                        document.getElementById("next").style.display = "block";
                        document.getElementById("previous").style.display = "block";
                    }
                    document.getElementById("ol").innerHTML = ol;
                    document.getElementById("div").innerHTML = div;
                }
              }
            }, 'json');
        }

        function sleep(milliseconds) {
            var start = new Date().getTime();
            for (var i = 0; i < 1e7; i++) {
                if ((new Date().getTime() - start) > milliseconds){
                    break;
                }
            }
        }

        function onload()
        {
            var chatluong = "<?php echo $diemchatluong?>";
            var phucvu = "<?php echo $diemphucvu?>";
            var khonggian = "<?php echo $diemkhonggian?>";
            mau('chatluong', chatluong);
            mau('phucvu', phucvu);
            mau('khonggian', khonggian);
            var trungbinh = eval("("+chatluong+"+"+phucvu+"+"+khonggian+")/3");
            trungbinh = parseFloat(trungbinh).toFixed(1);
            document.getElementById('trungbinh').innerHTML = trungbinh;
            mau('trungbinh', trungbinh);
            danhgia('danhgiatb', trungbinh);
            mau('danhgiatb', trungbinh);

            $("#trungbinhsao").jqxRating({ value: parseFloat(trungbinh/2).toFixed(0), width: "100%", height: 35, theme: 'classic', disabled:true});
        }

        function mau(id, diem)
        {
            if(diem < 2 && diem >= 0)
            {
                document.getElementById(id).style.color = "#F00";
            }
            if(diem >= 2 && diem < 4)
            {
                document.getElementById(id).style.color = "#F90";
            }
            if(diem >= 4 && diem < 6)
            {
                document.getElementById(id).style.color = "#0CF";
            }
            if(diem >= 6 && diem < 8)
            {
                document.getElementById(id).style.color = "#03F";
            }
            if(diem >= 8 && diem <= 10)
            {
                document.getElementById(id).style.color = "#0D0";
            }
        }

        function danhgia(id, diem)
        {
            if(diem < 2 && diem >= 0)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('bad') ?>";
            }
            if(diem >= 2 && diem < 4)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('medium') ?>";
            }
            if(diem >= 4 && diem < 6)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('rather') ?>";
            }
            if(diem >= 6 && diem < 8)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('good') ?>";
            }
            if(diem >= 8 && diem <= 10)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('great') ?>";
            }
        }

        function inposts(id)
        {
            url = '<?php echo base_url(); ?>user/poster/'+id;
            window.open(url, '', '_blank');
        }

        var bool = true;
        function xemgioithieu()
        {
          if(bool)
          {
            document.getElementById("btngioithieu").className = 'fa fa-minus-circle fa-fw';
            document.getElementById("gioithieu").className = "gioithieu1";
            bool = false;
          }
          else
          {
            document.getElementById("btngioithieu").className = 'fa fa-plus-circle fa-fw';
            document.getElementById("gioithieu").className = "gioithieu0";
            bool = true;
          }
        }

    </script>

    <script type="text/javascript">
      var centreGot = false;
    </script>

<style type="text/css">
    #diembinhluan{
        border-radius: 3px;
        width: 100%; 
        text-align: center; 
        padding: 5px;
        color: #000;
        border: solid 1px #F8F8FF;

        /*background: -webkit-linear-gradient(left, rgba(207,207,207,207), rgba(255,0,0,0)); 
        background: -o-linear-gradient(right, rgba(207,207,207,207), rgba(255,0,0,0)); 
        background: -moz-linear-gradient(right, rgba(207,207,207,207), rgba(255,0,0,0));
        background: linear-gradient(to right, rgba(207,207,207,207), rgba(255,0,0,0)); */

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
    .imggoiy{
        width: 150px;
        height: 80px;
        border-radius: 2px;
        box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
    }
    .tieudegoiy{
      border: none;
      font-size: 12px; 
      width: 150px; 
      height: 25px;
      background-color: #F8F8FF;
      padding: 2px;
      font-style: italic;
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
    .gioithieu0{
       width: 100%; 
       height: 45px; 
       overflow: hidden;
       text-align: justify;
    }
    .gioithieu1{
       height: auto; 
       overflow: inherit;
       text-align: justify;
    }
</style>

<style type="text/css">

.scrollpanel{
  width:200px;
  height:600px;
  overflow:hidden;
}

.scrollpanel img{
  display:block;
  width:200px;
  height:200px;
  border-top:1px solid black;
}

.scrollpanel img:first-child{
  border-top:none;
}

.scrollcontent {
  position:relative;
  animation:Scrolling 15s linear infinite;
  -o-animation:Scrolling 15s linear infinite;
  -ms-animation:Scrolling 15s linear infinite;
  -moz-animation:Scrolling 15s linear infinite;
  -webkit-animation:Scrolling 15s linear infinite;
    
}

.scrollcontent:hover{
  animation-play-state:paused;
  -o-animation-play-state:paused;
  -ms-animation-play-state:paused;
  -moz-animation-play-state:paused;
  -webkit-animation-play-state:paused;  
}

@keyframes Scrolling {from{top:0px;} to{top:-605px;}}
@-o-keyframes Scrolling {from{top:0px;} to{top:-605px;}}
@-ms-keyframes Scrolling {from{top:0px;} to{top:-605px;}}
@-moz-keyframes Scrolling {from{top:0px;} to{top:-605px;}}
@-webkit-keyframes Scrolling {from{top:0px;} to{top:-605px;}}

</style>

</head><!--/head-->

<body style="background-color: #F8F8FF;" onload="onload();">

    <section style="margin-top: -50px;" id="blog" class="container">
        <div style="margin-bottom: 20px; margin-top: 0px; max-height: 90px; overflow: hidden;">
        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="5">

          <?php
            foreach ($yeuthich as $row) {
                $hinh1 = $row['HA_TEN'];
                $ma1 = $row['DD_MA'];
                $ten1 = $row['DD_TEN'];
            ?>

                <table style="float: left; margin-right: 30px;">
                  <tr>
                    <td>
                      <!-- <div class="tieudegoiy"><?php echo $ten1; ?></div> -->
                      <input type="text" class="tieudegoiy" value="<?php echo $ten1; ?>">
                    </td>
                  </tr>
                  <tr>
                  <td>
                  <a href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma1; ?>">
                      <img class="imggoiy" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh1; ?>" />  </a>
                    </td>
                  </tr>
                </table>
              
            <?php      
            } 
          ?>

        </marquee>
        </div>
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
                <div style="border-radius: 2px; background-color: #FFF; border: solid 1px #DCDCDC; padding-top: 20px;" class="col-md-8">
                    <div class="blog-item">
                        <div class="center" style="margin-bottom: 0px; padding: 0px; text-transform: capitalize;">
                            <h2 style="margin-bottom: 0px;"><?php echo $info['DD_TEN']; ?></h2>
                            <p class="lead">
                              <?php
                                /*if($info['DD_MOTA'] != "") 
                                  echo $info['DD_MOTA'];
                                else*/
                                  echo '<i class="fa fa-spinner fa-fw"></i><i class="fa fa-certificate fa-fw"></i><i class="fa fa-spinner fa-fw"></i>'; 
                              ?>
                            </p>
                        </div>
                        <!-- <a class="preview" href="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" rel="prettyPhoto"> -->
                          <div>
                            <?php $iddd1 = $info['DD_MA']; ?>
                            <b style="margin: 5px; cursor: pointer; position: absolute; font-size: 25px;" onclick="inposts('<?php echo $iddd1; ?>')">
                                <i style="color: #000;" class="fa fa-print fa-fw"> </i><span class="pull-right"></span>
                            </b>
                            <img style="cursor: pointer;" onclick="xemhinhanh('<?= $anhdaidien; ?>')" data-toggle='modal' data-target='#Modalimg' class="img-responsive img-blog" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" width="100%" alt="<?php echo lang('avatar') ?>" />
                          </div>
                          
                        <!-- </a> -->
                            <div style="margin-top: -30px;" class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date"><?php echo $info["DD_NGAYDANG"] ?></span>
                                        <span style="text-transform: capitalize;"><i class="fa fa-user fa-fw"></i> <a href="#"> <?php echo $info["ND_TEN"] ?></a></span>
                                        <span><i class="fa fa-comment fa-fw"></i> <a href="blog-item.html#comments"><?php echo $countbinhluan ?> <?php echo lang('comment') ?></a></span>
                                        <span><i class="fa fa-heart fa-fw"></i> <a href="#"><?php echo $countyeuthich ?> <?php echo lang('likes') ?></a></span>
                                        <span><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo base_url(); ?>baiviet/thembaiviet/<?php echo $info['DD_MA']; ?>"><?php echo $countbaiviet ?> <?php echo lang('posts') ?></a></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <p style="cursor: pointer;" onclick="xemgioithieu()">
                                      <i id="btngioithieu" class="fa fa-plus-circle fa-fw"></i>
                                      <b><?php echo lang('introduce') ?>:</b> <?php //echo lang('click_the_plus_icon_to_view_the_contents_of_introducing'); ?> 
                                      <p id="gioithieu" class="gioithieu0">
                                        <?php 
                                          $gioithieu = $info["DD_GIOITHIEU"];
                                          if($gioithieu == "")
                                          {
                                            $gioithieu = lang('information_is_being_updated');
                                          }
                                          echo $gioithieu;
                                        ?>
                                      </p>
                                    </p>
                                    <p>
                                        <i class="fa fa-road fa-fw"></i> <b> <?php echo lang('address') ?> </b>
                                        <?php echo $info['DD_DIACHI']; ?> 
                                          <?php
                                            if($tenxa != "")
                                            {
                                              echo lang('town')." ".$tenxa; 
                                            } 
                                            
                                          ?> <?php echo lang('district').' '.$tenhuyen; ?> <?php echo lang('provincial').' '.$tentinh; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-phone fa-fw"></i> <b> <?php echo lang('phone') ?> </b>
                                        <?php 
                                                      $value = $info['DD_SDT'];
                                                      $length = strlen($value);
                                                      $sdt = substr($value,  $length-3, 3);
                                                      $sdt = substr($value,  $length-6, 3).' '.$sdt;
                                                      $sdt = substr($value,  0, $length-6).' '.$sdt;
                                                      if($value == "")
                                                      {
                                                        echo lang('information_is_being_updated');
                                                      }
                                                      else
                                                      {
                                                        echo $sdt;
                                                      }
                                                    ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-envelope-o fa-fw"></i> <b> <?php echo lang('email') ?> </b>
                                        <?php 
                                                      $value = $info['DD_EMAIL'];
                                                      if($value == "")
                                                      {
                                                        echo lang('information_is_being_updated');
                                                      }
                                                      else
                                                      {
                                                        echo $value;
                                                      }
                                                    ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-google-plus fa-fw"></i> <b> Website </b>
                                        
                                                    <?php 
                                                      $value = $info['DD_WEBSITE'];
                                                      
                                                      if($value == "")
                                                      {
                                                        echo lang('information_is_being_updated');
                                                      }
                                                      else
                                                      {
                                                        $index = strstr(strtolower($value), 'http://');
                                                        if($index == "")
                                                        {
                                                          $value = "http://".$value;
                                                        }
                                                        echo "<a href='".$value."' target='_blank'>".$value."</a>";
                                                      }
                                                    ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-clock-o fa-fw"></i> <b> <?php echo lang('open_time') ?> </b>
                                        <?php echo $info['DD_BATDAU']; ?> - <?php echo $info['DD_KETTHUC']; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-tag fa-fw"></i> <b> <?php echo lang('min_price') ?> </b>
                                        <?php echo number_format($info['DD_GIATU'], 0, ',', '.'); ?> - <?php echo number_format($info['DD_GIADEN'], 0, ',', '.'); ?> VND
                                    </p>

                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        
                        <div style="margin-top: -60px; padding: 0px;" class="media reply_section">
                            <div class="pull-left post_reply text-center" style="margin: 10px;">
                                <a href="#"><img style="border: solid 1px #DCDCDC; width: 70px; height: 70px;" src="<?php echo base_url(); ?>uploads/user/<?php echo $info['ND_HINH']; ?>" class="img-circle" alt="" /></a>
                                <!-- <ul>
                                    <li style="padding-left: 18px;"><a target="_blank" href="<?php echo $info["ND_FACE"] ?>"><i class="fa fa-facebook"></i></a></li>
                                </ul> -->
                            </div>
                            <div class="media-body post_reply_content" style="color: #000; margin: 10px 10px 0px 0px;">
                                <h5 style="text-transform: capitalize; color: #000;"><?php echo $info["ND_HO"]." ".$info["ND_TEN"] ?> - <i style="font-size: 13px; opacity: 0.7;"><?php echo $info['DD_NGAYDANG']; ?></i></h5>
                                <p style="line-height: 1.5; font-size: 13px; text-align: justify;">
                                    <?php 
                                        echo $info["DD_MOTA"]; 
                                        if($info["ND_FACE"] == "")
                                        {
                                          $face = lang('information_is_being_updated');
                                        }
                                        else
                                        {
                                          $face = $info["ND_FACE"];
                                        }
                                    ?>
                                    <br/>
                                    <strong>Facebook:</strong> <a target="_blank" href="<?php echo $info["ND_FACE"] ?>"><?php echo $face; ?></a>
                                </p>
                            </div>
                        </div> 
                        
                        <h1 style="margin-top: 20px; margin-bottom: 10px; font-size: 16px; color: #000;" id="comments_title"><?php echo $countbinhluan ?> <?php echo lang('comment') ?></h1>
                        <div id="noidung">
                        <?php
                            function mau($diem)
                            {
                                if($diem >= 0 && $diem < 2)
                                {
                                  return "#F00";
                                }
                                if($diem >= 2 && $diem < 4)
                                {
                                  return "#F90";
                                }
                                if($diem >= 4 && $diem < 6)
                                {
                                  return "#0CF";
                                }
                                if($diem >= 6 && $diem < 8)
                                {
                                  return "#03F";
                                }
                                if($diem >= 8 && $diem <= 10)
                                {
                                  return "#0D0";
                                }
                            }
                            $count = 0;
                            foreach ($binhluan as $iteam) {
                              if ($count > 4) {
                                break;
                              }
                              $count++;
                              $mabinhluan = $iteam['BL_MA'];
                              $tieude = $iteam['BL_TIEUDE'];
                              $noidung = $iteam['BL_NOIDUNG'];
                              $chatluong = $iteam['BL_CHATLUONG'];
                              $phucvu = $iteam['BL_PHUCVU'];
                              $khonggian = $iteam['BL_KHONGGIAN'];
                              $ngaydang = $iteam['BL_NGAYDANG'];

                              $diem = ($chatluong + $phucvu + $khonggian) / 3;
                              $diem =  round($diem, 1);

                              $maucl = mau($chatluong);
                              $maupv = mau($phucvu);
                              $maukg = mau($khonggian);
                              $mautb = mau($diem);

                              $honguoidang = $iteam['ND_HO'];
                              $tennguoidang = $iteam['ND_TEN'];
                              $hinhnguoidang = $iteam['ND_HINH'];
                        ?>

                        <div class="media reply_section">
                            <div class="pull-left post_reply text-center" style="margin: 10px;">
                                <a href="#"><img style="border: solid 1px #DCDCDC; width: 70px; height: 70px;" src="<?php echo base_url(); ?>uploads/user/<?php echo $hinhnguoidang; ?>" class="img-circle" alt="" /></a>
                            </div>
                            <div class="media-body post_reply_content" style="color: #000; margin: 10px;">
                                <h5 style="text-transform: capitalize; color: #000;">
                                  <?php echo $honguoidang." ".$tennguoidang ?> - <i style="font-size: 13px;"><?php echo lang("comment"); ?> </i>
                                  <i style="font-size: 13px; opacity: 0.7;"><?php echo $ngaydang ?></i>
                                  <div style="margin-top: 5px; font-size: 13px;">
                                        <i><?php echo lang("quality") ?>: </i>
                                        <span style="color: <?php echo $maucl; ?>; font-weight: bolder;" ><?php echo $chatluong ?></span> | 
                                        <i><?php echo lang("service") ?>: </i>
                                        <span style="color: <?php echo $maupv; ?>; font-weight: bolder;" ><?php echo $phucvu ?></span> | 
                                        <i><?php echo lang("space") ?>: </i>
                                        <span style="color: <?php echo $maukg; ?>; font-weight: bolder;" ><?php echo $khonggian ?></span> | 
                                        <i><?php echo lang("average") ?>: </i>
                                        <span style="color: <?php echo $mautb; ?>; font-weight: bolder;" ><?php echo $diem ?></span>
                                  </div>
                                </h5>
                                
                                <h3 style="color: #000; font-weight: bold; font-size: 18px; text-transform: capitalize;"><?php echo $tieude ?></h3>
                                <p>
                                    <div style="text-align: justify; margin-bottom: 10px; line-height: 1.5; font-size: 13px;"><?php echo $noidung ?> </div>
                                    <div style="cursor: pointer;" data-toggle="modal" data-target="#Modalcomment" onclick="xemanhbinhluan('<?php echo $mabinhluan; ?>')">
                                    <?php
                                         $j = 0;
                                         foreach ($anhbinhluan as $key) {
                                            if($key['BL_MA'] == $mabinhluan)
                                            {
                                              if($j < 5)
                                              {
                                              $tenanh = $key['ABL_TEN'];
                                      ?>
                                            <img class="img" src="<?php echo base_url(); ?>uploads/binhluan/<?php echo $tenanh ?>" width="120" height="100">
                                      <?php
                                              }
                                              $j++;
                                            }
                                          }
                                    ?>
                                    </div>
                                </p>

                                <div style="text-align: right;">
                                  <a style="z-index: 10;" href="#name">
                                    <button style="background-color: #1AA5D1;" type="button" class="btn btn-info"> <i class="fa fa-comment-o fa-fw"></i> <?php echo lang('comment') ?></button>
                                  </a>
                                </div>
                                
                            </div>
                        </div>

                        <?php
                            }
                        ?> 
                        </div>

                        <button style="background-color: #1AA5D1; margin-top: 10px; margin-bottom: 5px;" id="btnthem" type="button" class="btn btn-info"> <i class="fa fa-eye fa-fw"></i> <?php echo lang('view_more') ?></button> 
                        <br/>
                        <?php echo lang('total') ?>: <b id="count"><?php echo $count; ?></b>

                        <a name="name"></a>
                        <div style="margin-top: -30px;" id="contact-page clearfix">
                            <div class="status alert alert-success" style="display: none"></div>
                            <div class="message_heading">
                                <h4><?php echo lang('comment') ?>: <?php echo $info['DD_TEN']; ?></h4>
                                <p></p>
                            </div> 
      
                            <form style="margin-top: -30px;" id="main-contact-form" class="contact-form" name="contact-form" method="post" action="" role="form">
                                <div class="row">
                                    
                                    <div class="col-sm-7">  
                                        <div class="form-group">
                                            <label><?php echo lang('title') ?> *</label>
                                            <input type="text" id="BL_TIEUDE" placeholder="<?php echo lang('input').' '.lang('title'); ?>" class="form-control" required="required">
                                        </div>                      
                                        <div class="form-group">
                                            <label><?php echo lang('content') ?> *</label>
                                            <textarea name="message" id="BL_NOIDUNG" placeholder="<?php echo lang('input').' '.lang('content'); ?>" required="required" class="form-control" rows="8"></textarea>

                                            <input type="text" id="idbinhluan" style="border-width: 0px; display: none;" readonly="readonly" >
                                            <div id="jqxFileUpload">
                                            </div>
                                            <div id="eventsPanel">
                                            </div>
                                            <button style="margin-top: 10px; display: none;" id="btnsuccessbl" type="button" class="btn btn-success"><?= lang('complete'); ?></button>
                                        </div>

                                        <?php 
                                          if($this->session->userdata('id') == "")
                                          { 
                                            $idcomment = "#modaldangnhap";
                                          }
                                          else
                                          {
                                            $idcomment = "";
                                          }
                                        ?>

                                        <div class="form-group">
                                            <button style="background-color: #1AA5D1;" data-toggle='modal' data-target='<?php echo $idcomment; ?>' type="submit" id="btngui" class="btn btn-primary btn-lg" required="required"><i class="fa fa-comment-o fa-fw"></i> <?php echo lang('submit') ?></button>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                  
                                        <div class="form-group">
                                            <h2><label><?php echo lang('rating') ?> *</label></h2>
                                            <div style="width: 100%; height: 40px;">
                                              <b style="float: left; width: 40%;"><?php echo lang('quality') ?>: </b>
                                              <div id='jqxWidget' style="float: right; width: 60%; font-size: 13px; font-family: Verdana;">
                                                  <div id='BL_CHATLUONG'></div>
                                              </div>
                                            </div>

                                            <div style="width: 100%; height: 40px;">
                                              <b style="float: left; width: 40%;"><?php echo lang('service') ?>: </b>
                                              <div id='jqxWidget1' style="float: right; width: 60%; font-size: 13px; font-family: Verdana;">
                                                  <div id='BL_PHUCVU'></div>
                                              </div>
                                            </div>

                                            <div style="width: 100%; height: 40px;">
                                              <b style="float: left; width: 40%;"><?php echo lang('space') ?>: </b>
                                              <div id='jqxWidget2' style="float: right; width: 60%; font-size: 13px; font-family: Verdana;">
                                                  <div id='BL_KHONGGIAN'></div>
                                              </div>
                                            </div>
                                            <div style="width: 100%; height: 40px;">
                                              <div style="width: 40%; float: left; padding-right: 5px; font-weight: bolder;"><?php echo lang('average') ?>: </div>  
                                              <div id="diemtrungbinh" style="width: 60%; float: left; font-weight: bolder; font-size: 20px; font-style: italic;">0.0</div>
                                            </div>
                                            
                                        </div>                   
                                    </div>

                                </div>
                            </form>     
                        </div><!--/#contact-page-->
                    </div><!--/.col-md-8-->

                <aside class="col-md-4">

                    <div class="widget tags" style="border-radius: 2px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;">
                        <h3><?php echo lang('rating'); ?> 
                          <!-- <div style="margin-top: -10px;" class="rw-ui-container"></div> -->
                          <div id='jqxWidget3' style="float: right; width: 70%; font-size: 13px; font-family: Verdana;">
                              <div id='trungbinhsao'></div>
                          </div>
                        </h3>
                        
                        <div id="diembinhluan">
                          <table width="100%">
                            <tr style="font-weight: bolder;">
                              <td id="chatluong" width="25%">
                                <?php echo $diemchatluong?>
                              </td>
                              <td id="phucvu" width="25%">
                                <?php echo $diemphucvu ?>
                              </td>
                              <td id="khonggian" width="25%">
                                <?php echo $diemkhonggian ?>
                              </td>
                              <td width="25%">
                                <b id="trungbinh"></b> 
                                <b style="font-size: 12px; font-style: italic;" id="danhgiatb"></b>
                                <?php 
                                  /*$diemtb = ($diemchatluong + $diemphucvu + $diemkhonggian)/3;
                                  $diemtb = round($diemtb, 1);
                                  echo round($diemtb, 1)." <i class='fa fa-flag-checkered fa-fw'></i>";
                                  if(0 < $diemtb && $diemtb < 2)
                                  {
                                    echo lang('bad');
                                  }
                                  if(2 <= $diemtb && $diemtb < 4)
                                  {
                                    echo lang('medium');
                                  }
                                  if(4 <= $diemtb && $diemtb < 6)
                                  {
                                    echo lang('rather');
                                  }
                                  if(6 <= $diemtb && $diemtb < 8)
                                  {
                                    echo lang('good');
                                  }
                                  if(8 <= $diemtb && $diemtb <= 10)
                                  {
                                    echo lang('great');
                                  }*/

                                ?>
                              </td>
                            </tr>
                            <tr style="font-style: italic;">
                              <td><?php echo lang('quality'); ?></td>
                              <td><?php echo lang('service'); ?></td>
                              <td><?php echo lang('space'); ?></td>
                              <td><?php echo lang('average'); ?></td>
                            </tr>
                          </table>
                        </div>
                    </div><!--/.tags-->

                    <div style="margin-top: -30px;" class="widget archieve">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve" style="border-radius: 2px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 10px 10px 10px 10px;">
                                    <li>
                                      <a href="#name">
                                        <i class="fa fa-comment fa-fw"></i> <?php echo lang('comment') ?>
                                        <span class="pull-right">(<label><?php echo $countbinhluan ?></label>)</span>
                                      </a>
                                    </li>
                                    <?php 
                                      if($this->session->userdata('id') == "")
                                      { 
                                        $iduploadimg = "#modaldangnhap";
                                        $checkin = $yeuthich = $muonden = "#modaldangnhap";
                                      }
                                      else
                                      {
                                        $iduploadimg = "#myModal";
                                        $checkin = "checkin";
                                        $yeuthich = "yeuthich";
                                        $muonden = "muonden";
                                      }
                                    ?>
                                    <li class="li" data-toggle='modal' data-target='<?php echo $iduploadimg; ?>'>
                                        <a>
                                          <i class="fa fa-picture-o fa-fw"></i> <?php echo lang('upload_photos') ?> 
                                          <span class="pull-right">(<label><?php echo $counthinhanh ?></label>)</span>
                                        </a>
                                    </li>
                                    <li id='<?php echo $checkin; ?>' class="li" data-toggle='modal' data-target='<?php echo $checkin; ?>'>
                                       <i id="iconcheckin" class="fa fa-square-o fa-fw"></i> <?php echo lang('check_in') ?>
                                        <span class="pull-right">(<label id="countcheckin"><?php echo $countcheckin ?></label>)</span>
                                        <input class="value" type="text" value="0" id="checkinvalue" />
                                    </li>
                                    <li id='<?php echo $yeuthich; ?>' class="li" data-toggle='modal' data-target='<?php echo $yeuthich; ?>'>
                                        <i id="iconyeuthich" class="fa fa-heart-o fa-fw"></i> <?php echo lang('love') ?>
                                        <span class="pull-right">(<label id="countyeuthich"><?php echo $countyeuthich ?></label>)</span>
                                        <input class="value" type="text" value="0" id="yeuthichvalue" />
                                    </li>
                                    <li id='<?php echo $muonden; ?>' class="li" data-toggle='modal' data-target='<?php echo $muonden; ?>'>
                                        <i id="iconmuonden" class="fa fa-star-o fa-fw"></i> <?php echo lang('custom') ?>
                                        <span class="pull-right">(<label id="countmuonden"><?php echo $countmuonden ?></label>)</span>
                                        <input class="value" type="text" value="0" id="muondenvalue" />
                                    </li>
                                    <li>
                                         <i id="iconluotxem" class="fa fa-eye fa-fw"></i> <?php echo lang('views') ?>
                                        <span class="pull-right">(<label id="countluotxem"></label>)</span>
                                    </li>
                                    <?php $iddd1 = $info['DD_MA']; ?>
                                    <li style="cursor: pointer;" onclick="inposts('<?php echo $iddd1; ?>')">
                                        <i class="fa fa-print fa-fw"> </i> <?php echo lang('poster') ?><span class="pull-right"></span>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>baiviet/thembaiviet/<?php echo $info['DD_MA']; ?>">
                                          <i class="fa fa-pencil fa-fw"> </i> <?php echo lang('posts') ?><span class="pull-right">(<label id="countbaiviet"><?php echo $countbaiviet; ?></label>)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>                     
                    </div><!--/.archieve-->

                    <div style="border-radius: 2px; margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;" class="widget categories">
                        <h3><?php echo lang('posts') ?></h3>
                        
                            <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" width="100%" height="200" align="center">
                              <?php
                                $bien = count($baiviet);
                                if ($bien == 0) {
                                    echo "<b>".lang('no_posts_yet')."</b>";
                                    echo '<img style="cursor: pointer;" onclick="xemhinhanh()" data-toggle=\'modal\' data-target=\'#Modalimg\' class="img-responsive img-blog" src="'.base_url().'uploads/diadiem/'.$anhdaidien.'" width="100%" alt="" />';
                                }
                                foreach ($baiviet as $row) {
                                  $BV_MA = $row["BV_MA"];
                                  $BV_TIEUDE = $row["BV_TIEUDE"];
                                  $BV_NGAYDANG = $row["BV_NGAYDANG"];
                                  $BV_LUOTXEM = $row["BV_LUOTXEM"];
                                  $ND_HO = $row["ND_HO"];
                                  $ND_TEN = $row["ND_TEN"];
                              ?>

                                <a style="text-transform: capitalize; font-size: 15px;" href="<?php echo base_url(); ?>baiviet/detail/<?php echo $BV_MA; ?>">
                                    <?php echo $BV_TIEUDE; ?><br/>
                                </a>
                                <i style="font-size: 13px; color: #000;">
                                  <?php echo $ND_HO.' '.$ND_TEN; ?>: <?php echo $BV_NGAYDANG; ?><br/>
                                  <?php echo lang('views'); ?>: <?php echo $BV_LUOTXEM; ?>
                                </i>
                                <hr style="margin: 5px 0px 5px 0px;" />

                              <?php
                                }
                              ?>
                            </marquee>  
                                         
                    </div><!--/.recent comments-->

                    <div style="border-radius: 2px; margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;" class="widget blog_gallery">
                        <h3><?php echo lang('photos') ?></h3>
                        <ul style="cursor: pointer;" class="sidebar-gallery" data-toggle='modal' data-target='#Modalimg'>
                            <?php
                                $j = 0;
                                foreach ($info1 as $key) {
                                  $j++;
                                  if($j > 9)
                                  {
                                    break;
                                  }
                                  $hinh = $key['HA_TEN'];
                                  $duyet = $key['HA_DUYET'];
                                  if($duyet == "1")
                                  {
                              ?>    
                                    <li>
                                        <img class="img" data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" width="100" height="60" onclick="xemhinhanh('<?= $hinh; ?>')" />
                                    </li>
                             <?php
                                  }
                                }
                              ?>
                        </ul>
                    </div><!--/.blog_gallery-->
    				
    				        <div style="border-radius: 2px; margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;" class="widget categories">
                        <h3><?php echo lang('map') ?>
                            <a target="_blank" href="<?= base_url(); ?>aediadiem/danduong/<?= $info['DD_MA']; ?>">
                              <button style="margin-top: -5px; margin-left: 5px;" type="button" class="btn btn-success"><?= lang('direct') ?></button>
                            </a>
                        </h3>
                        
                        <?php echo $map['js']; ?>
                        <?php echo $map['html']; ?>
                                          
                    </div><!--/.recent comments-->

                    <?php
                      if(count($danhmuc) > 0)
                      {
                    ?>
                    <div style="border-radius: 2px; margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;" class="widget categories">
                        <h3><?php echo lang('related_places') ?></h3>
                        
                        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" width="100%" height="250" align="center">

                          <?php
                            foreach ($danhmuc as $row) {
                                $hinh3 = $row['HA_TEN'];
                                $ma3 = $row['DD_MA'];
                                $ten3 = $row['DD_TEN'];
                                $tinh3 = $row['T_TEN'];
                                $huyen3 = $row['H_TEN'];
                            ?>
                              <a href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma3; ?>">
                                <span>
                                  
                                  <table width="100%">
                                    <tr>
                                      <td width="100">
                                        <img class="imggoiy" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh3; ?>" /> 
                                      </td>
                                      <td style="padding-left: 3px;">
                                        <span style="font-size: 13; width: 100px; overflow: hidden;"><?php echo $ten3; ?></span><br/>
                                        <i style="font-size: 13px;"><?php echo $huyen3.' - '.$tinh3; ?></i>
                                      </td>
                                    </tr>
                                  </table>
                                  <hr style="margin: 20px 0px 0px;" />
                                </span>
                              </a> <br/>
                            <?php      
                            } 
                          ?>

                        </marquee>
                                          
                    </div><!--/.recent comments-->

                    <?php
                      }
                      if(count($khachsan) > 0)
                      {
                    ?>
                    <div style="border-radius: 2px; margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;" class="widget categories">
                        <h3><?= lang('restaurant') ?></h3>
                        
                        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" width="100%" height="250" align="center">

                          <?php
                            foreach ($nhahang as $row) {
                                $hinh3 = $row['HA_TEN'];
                                $ma3 = $row['DD_MA'];
                                $ten3 = $row['DD_TEN'];
                                $tinh3 = $row['T_TEN'];
                                $huyen3 = $row['H_TEN'];
                            ?>
                              <a href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma3; ?>">
                                <span>
                                  
                                  <table width="100%">
                                    <tr>
                                      <td width="100">
                                        <img class="imggoiy" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh3; ?>" /> 
                                      </td>
                                      <td style="padding-left: 3px;">
                                        <span style="font-size: 13; width: 100px; overflow: hidden;"><?php echo $ten3; ?></span><br/>
                                        <i style="font-size: 13px;"><?php echo $huyen3.' - '.$tinh3; ?></i>
                                      </td>
                                    </tr>
                                  </table>
                                  <hr style="margin: 20px 0px 0px;" />
                                </span>
                              </a> <br/>
                            <?php      
                            } 
                          ?>

                        </marquee>
                                          
                    </div><!--/.recent comments-->

                    <?php
                      }
                      if(count($nhahang) > 0)
                      {
                    ?>
                     
                     <div style="border-radius: 2px; margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;" class="widget categories">
                        <h3><?= lang('hotel') ?></h3>
                        
                        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" width="100%" height="250" align="center">

                          <?php
                            foreach ($khachsan as $row) {
                                $hinh3 = $row['HA_TEN'];
                                $ma3 = $row['DD_MA'];
                                $ten3 = $row['DD_TEN'];
                                $tinh3 = $row['T_TEN'];
                                $huyen3 = $row['H_TEN'];
                            ?>
                              <a href="<?php echo base_url(); ?>aediadiem/detailuser1/<?php echo $ma3; ?>">
                                <span>
                                  
                                  <table width="100%">
                                    <tr>
                                      <td width="100">
                                        <img class="imggoiy" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh3; ?>" /> 
                                      </td>
                                      <td style="padding-left: 3px;">
                                        <span style="font-size: 13; width: 100px; overflow: hidden;"><?php echo $ten3; ?></span><br/>
                                        <i style="font-size: 13px;"><?php echo $huyen3.' - '.$tinh3; ?></i>
                                      </td>
                                    </tr>
                                  </table>
                                  <hr style="margin: 20px 0px 0px;" />
                                </span>
                              </a> <br/>
                            <?php      
                            } 
                          ?>

                        </marquee>
                                          
                    </div><!--/.recent comments-->

                    <?php
                      }
                    ?>

                    <!-- <div class="widget categories">
                        <h3>Được nhiều người yêu thích</h3>
                        <div class="row">
                            <div class="col-sm-6">
                              <div class="scrollpanel">
                                <div class="scrollcontent">
                                  <?php
                                    foreach ($yeuthich as $row) {
                                        $hinh1 = $row['HA_TEN'];
                                    ?>
                                       <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh1; ?>" />
                                    <?php      
                                    } 
                                  ?>
                                  <?php
                                    foreach ($yeuthich as $row) {
                                        $hinh1 = $row['HA_TEN'];
                                    ?>
                                       <img src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh1; ?>" />
                                    <?php      
                                    } 
                                  ?>
                                </div>
                              </div>  
                            </div>
                        </div>                     
                    </div>  -->
    				
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
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o fa-fw"></i> <?php echo lang('upload_photos') ?></h4>
        </div>
        <div class="modal-body">

          <div id="jqxFileUpload1">
          </div>
          <div id="eventsPanel1">
          </div>

        </div>
      </div> <!-- /.modal-content --> 
    </div><!-- /.modal-dialog --> 
    </div><!-- /.modal -->

    <!-- Modal upload anh -->
    <div class="modal fade" id="Modalimg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%;">
      <div class="modal-content" style="height: 100%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o fa-fw"></i> <?php echo lang('view').' '.lang('photos'); ?></h4>
        </div>
        <div class="modal-body">
        
          <section id="main-slider" class="no-margin">
            <div class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                    
                    <?php
                      $i = 0; 
                      foreach ($info1 as $item) {
                        $i++;
                        if($item["HA_TEN"] != $anhdaidien)
                        {
                        ?>
                          <li data-target="#main-slider" data-slide-to="<?php echo $i; ?>"></li>
                        <?php
                        }
                      }
                    ?>
                </ol>
                <div style="max-height: 500px;" class="carousel-inner">

                    <!-- <div class="item active" style="max-height: 500px; background-image: url(<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>)">
                    </div> -->

                    <div class="item active" style="max-height: 500px;">
                      <img style="height: 500px;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" alt="" width='100%' >
                    </div>

                    <?php
                      foreach ($info1 as $item) {
                        
                        if($item["HA_TEN"] != $anhdaidien)
                        {
                          $hinh1 = $item['HA_TEN'];
                        ?>
                          <!-- <div class="item" style="max-height: 500px; background-image: url(<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh1; ?>)">
                          </div> -->
                          <div class="item" style="max-height: 500px;">
                            <img style="height: 500px;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh1; ?>" alt="" width='100%' >
                          </div>
                        <?php
                        }
                      }
                    ?>

                </div><!--/.carousel-inner-->
            </div><!--/.carousel-->
            <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
                <i class="fa fa-chevron-left"></i>
            </a>
            <a class="next hidden-xs" href="#main-slider" data-slide="next">
                <i class="fa fa-chevron-right"></i>
            </a>
        </section><!--/#main-slider-->

        </div>
      </div> <!-- /.modal-content --> 
    </div><!-- /.modal-dialog --> 
    </div><!-- /.modal -->

    <!-- Modal upload anh -->
    <div class="modal fade" id="Modalcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%;">
      <div class="modal-content" style="height: 100%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o fa-fw"></i> <?php echo lang('view').' '.lang('photos'); ?></h4>
        </div>
        <div class="modal-body">
        
          <section id="main-slider1" class="no-margin">
            <div class="carousel slide">
                <ol id="ol" class="carousel-indicators">
                    <li data-target="#main-slider1" data-slide-to="0" class="active"></li>
                    
                    <?php
                      $i = 0; 
                      foreach ($info1 as $item) {
                        $i++;
                        if($item["HA_TEN"] != $anhdaidien)
                        {
                        ?>
                          <li data-target="#main-slider1" data-slide-to="<?php echo $i; ?>"></li>
                        <?php
                        }
                      }
                    ?>
                </ol>
                <div id="div" style="max-height: 500px;" class="carousel-inner">

                    <!-- <div class="item active" style="max-height: 500px; background-image: url(<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>)">
                    </div> -->

                    <div class="item active" style="max-height: 500px;">
                      <img style="height: 500px;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" alt="" width='100%' >
                    </div>

                    <?php
                      foreach ($info1 as $item) {
                        
                        if($item["HA_TEN"] != $anhdaidien)
                        {
                          $hinh1 = $item['HA_TEN'];
                        ?>
                          <!-- <div class="item" style="max-height: 500px; background-image: url(<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh1; ?>)">
                          </div> -->
                          <div class="item" style="max-height: 500px;">
                            <img style="height: 500px;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh1; ?>" alt="" width='100%' >
                          </div>
                        <?php
                        }
                      }
                    ?>

                </div><!--/.carousel-inner-->
            </div><!--/.carousel-->
            <a id="previous" class="left carousel-control" href="#main-slider1" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            </a>
            <a id="next" class="right carousel-control" href="#main-slider1" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            </a>
        </section><!--/#main-slider-->

        </div>
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