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
                    //setTimeout("location.href = '<?php echo base_url(); ?>index.php/login';",0);
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
              url="<?php echo base_url(); ?>index.php/binhluan/add?t=" + Math.random();
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
                        if(serverResponce.indexOf("!") != "-1")
                        {
                            thongbao("", serverResponce, "success");
                        }
                        else
                        {
                            thongbao("", serverResponce, "danger");
                        }
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

            var bool = true;
            $("#btngioithieu").click(function(){
                $('#gioithieu').toggle(1000,function(){
                    if(bool)
                    {
                      document.getElementById("btngioithieu").className = 'fa fa-minus-circle fa-fw';
                      bool = false;
                    }
                    else
                    {
                      document.getElementById("btngioithieu").className = 'fa fa-plus-circle fa-fw';
                      bool = true;
                    }
                    
                    $(this).css('overflow','inherit');
                    $(this).css('height','auto');
                    $(this).css('text-align','justify');
                });
            });
        });

        function xemhinhanh()
        {
          var ol = "";
          var div = "";
          <?php
              $i = -1; 
              foreach ($info1 as $item) {
                $i++;
                if($i == '0')
              {
                ?>
                  ol += '<li data-target="#my-pics" data-slide-to="0" class="active"></li>';
                  div += '<div class="item active"><img style="height: 500px;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $item["HA_TEN"]; ?>" alt="" width="100%" ></div>';
                <?php
              }
                else{
              ?>
                  ol += '<li data-target="#my-pics" data-slide-to="'+'<?php echo $i ?>'+'"></li>';
                  div += '<div class="item"><img src="<?php echo base_url(); ?>uploads/diadiem/'+'<?php echo $item["HA_TEN"] ?>'+'" alt="" width="100%" style="height: 500px;"></div>';
              <?php
                }
              }
          ?>
          
          if("<?php echo $i; ?>" == '0')
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
        
        function xemanhbinhluan(idbinhluan)
        {
            var url, dta;
            url="<?php echo base_url(); ?>index.php/binhluan/anhbinhluan?t=" + Math.random();
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
                        ol += '<li data-target="#my-pics" data-slide-to="0" class="active"></li>';
                        div += '<div class="item active"><img style="height: 500px;" src="<?php echo base_url(); ?>uploads/binhluan/'+tenanh+'" alt="" width="100%" ></div>';
                      }
                      else
                      {
                        ol += '<li data-target="#my-pics" data-slide-to="'+i+'"></li>';
                        div += '<div class="item"><img src="<?php echo base_url(); ?>uploads/binhluan/'+tenanh+'" alt="" width="100%" style="height: 500px;"></div>';
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
            url = '<?php echo base_url(); ?>index.php/user/poster/'+id;
            window.open(url, '', '_blank');
        }

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
        height: 60px;
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
       display: none;
    }
    .gioithieu1{
       height: auto; 
       overflow: inherit;
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
        <div style="margin-bottom: 20px; margin-top: 0px;">
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
                  <a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $ma1; ?>">
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
                          <img style="cursor: pointer;" onclick="xemhinhanh()" data-toggle='modal' data-target='#Modalimg' class="img-responsive img-blog" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" width="100%" alt="<?php echo lang('avatar') ?>" />
                        <!-- </a> -->
                            <div style="margin-top: -30px;" class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date"><?php echo $info["DD_NGAYDANG"] ?></span>
                                        <span style="text-transform: capitalize;"><i class="fa fa-user"></i> <a href="#"> <?php echo $info["ND_TEN"] ?></a></span>
                                        <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments"><?php echo $countbinhluan ?> <?php echo lang('comment') ?></a></span>
                                        <span><i class="fa fa-heart"></i><a href="#"><?php echo $countyeuthich ?> <?php echo lang('likes') ?></a></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <p>
                                      <i style="cursor: pointer;" id="btngioithieu" class="fa fa-plus-circle fa-fw"></i>
                                      <b><?php echo lang('introduce') ?>:</b> <?php echo lang('click_the_plus_icon_to_view_the_contents_of_introducing'); ?> 
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
                                        <?php echo number_format($info['DD_GIATU'], 2, ',', '.'); ?> - <?php echo number_format($info['DD_GIADEN'], 2, ',', '.'); ?> VND
                                    </p>

                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        
                        <div style="margin-top: -60px;" class="media reply_section">
                            <div class="pull-left post_reply text-center">
                                <a href="#"><img style="width: 70px; height: 70px;" src="<?php echo base_url(); ?>uploads/user/<?php echo $info['ND_HINH']; ?>" class="img-circle" alt="" /></a>
                                <ul>
                                    <li style="padding-left: 18px;"><a target="_blank" href="<?php echo $info["ND_FACE"] ?>"><i class="fa fa-facebook"></i></a></li>
                                    <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i> </a></li> -->
                                </ul>
                            </div>
                            <div class="media-body post_reply_content">
                                <h3 style="text-transform: capitalize;"><?php echo $info["ND_HO"]." ".$info["ND_TEN"] ?> - <i><?php echo $info['DD_NGAYDANG']; ?></i></h3>
                                <p class="lead">
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
                                </p>
                                <p><strong>Facebook:</strong> <a target="_blank" href="<?php echo $info["ND_FACE"] ?>"><?php echo $face; ?></a></p>
                            </div>
                        </div> 
                        
                        <h1 style="margin-top: 20px; margin-bottom: -10px;" id="comments_title"><?php echo $countbinhluan ?> <?php echo lang('comment') ?></h1>

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

                            foreach ($binhluan as $iteam) {
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

                        <div class="media comment_section">
                            <div class="pull-left post_comments">
                                <a href="#"><img style="border: solid 5px #F8F8FF;" src="<?php echo base_url(); ?>uploads/user/<?php echo $hinhnguoidang; ?>" class="img-circle" alt="" /></a>
                            </div>
                            <div style="padding: 10px;" class="media-body post_reply_comments">
                                <b style="text-transform: capitalize; font-size: 16px;"><?php echo $honguoidang." ".$tennguoidang ?></b> - 
                                <b style="font-style: italic;"><?php echo $ngaydang ?></b>
                                <div class="danhgia">
                                      <i><?php echo lang('quality') ?>: </i>
                                      <span style="color: <?php echo $maucl; ?>; font-weight: bolder;" ><?php echo $chatluong ?></span> | 
                                      <i><?php echo lang('service') ?>: </i>
                                      <span style="color: <?php echo $maupv; ?>; font-weight: bolder;" ><?php echo $phucvu ?></span> | 
                                      <i><?php echo lang('space') ?>: </i>
                                      <span style="color: <?php echo $maukg; ?>; font-weight: bolder;" ><?php echo $khonggian ?></span> | 
                                      <i><?php echo lang('average') ?>: </i>
                                      <span style="color: <?php echo $mautb; ?>; font-weight: bolder;" ><?php echo $diem ?></span>
                                </div>
                                <b style="font-weight: bold; font-size: 20px; text-transform: capitalize;"><?php echo $tieude ?></b>
                                <p style="cursor: pointer;" data-toggle='modal' data-target='#Modalcomment' onclick="xemanhbinhluan('<?php echo $mabinhluan; ?>')">
                                    <?php echo $noidung ?>
                                <br/>
                                    <?php
                                         foreach ($anhbinhluan as $key) {
                                            if($key['BL_MA'] == $mabinhluan)
                                            {
                                              $tenanh = $key['ABL_TEN'];
                                      ?>
                                            <img class="img" src="<?php echo base_url(); ?>uploads/binhluan/<?php echo $tenanh ?>" width="80" height="50">
                                      <?php
                                            }
                                          }
                                    ?>
                                </p>

                                <a style="z-index: 10;" href="#name"><?php echo lang('comment') ?></a>
                            </div>
                        </div>

                        <?php
                            }
                        ?> 
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
                                            <button data-toggle='modal' data-target='<?php echo $idcomment; ?>' type="submit" id="btngui" class="btn btn-primary btn-lg" required="required"><?php echo lang('submit') ?></button>
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
                                        <a href="<?php echo base_url(); ?>index.php/baiviet/thembaiviet/<?php echo $info['DD_MA']; ?>">
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
                                  $ND_HO = $row["ND_HO"];
                                  $ND_TEN = $row["ND_TEN"];
                              ?>

                                <a style="font-weight: bold; font-size: 15px;" href="<?php echo base_url(); ?>index.php/baiviet/detail/<?php echo $BV_MA; ?>">
                                    <?php echo $BV_TIEUDE; ?><br/>
                                </a>
                                <i><?php echo $ND_HO.' '.$ND_TEN; ?>: <?php echo $BV_NGAYDANG; ?></i>
                                <br/><br/>

                              <?php
                                }
                              ?>
                            </marquee>  
                                         
                    </div><!--/.recent comments-->

                    <div style="border-radius: 2px; margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;" class="widget blog_gallery">
                        <h3><?php echo lang('photos') ?></h3>
                        <ul onclick="xemhinhanh()" style="cursor: pointer;" class="sidebar-gallery" data-toggle='modal' data-target='#Modalimg'>
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
                                        <img class="img" data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" width="100" height="60" />
                                    </li>
                             <?php
                                  }
                                }
                              ?>
                        </ul>
                    </div><!--/.blog_gallery-->
    				
    				        <div style="border-radius: 2px; margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;" class="widget categories">
                        <h3><?php echo lang('map') ?></h3>
                        
                        <?php echo $map['js']; ?>
                        <?php echo $map['html']; ?>
                                          
                    </div><!--/.recent comments-->

                    <div style="border-radius: 2px; margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px;" class="widget categories">
                        <h3><?php echo lang('related_places') ?></h3>
                        
                        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" width="100%" height="200" align="center">

                          <?php
                            foreach ($danhmuc as $row) {
                                $hinh3 = $row['HA_TEN'];
                                $ma3 = $row['DD_MA'];
                                $ten3 = $row['DD_TEN'];
                                $tinh3 = $row['T_TEN'];
                                $huyen3 = $row['H_TEN'];
                            ?>
                              <a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $ma3; ?>">
                                <span>
                                  
                                  <table width="100%">
                                    <tr>
                                      <td width="110">
                                        <img class="imggoiy" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh3; ?>" /> 
                                      </td>
                                      <td>
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
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o fa-fw"></i> <?php echo lang('view') ?></h4>
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

    <!-- Modal anh binh luan -->
    <div class="modal fade" id="Modalcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80%;">
      <div class="modal-content" style="height: 100%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o fa-fw"></i> Xem ảnh</h4>
        </div>
        <div class="modal-body">
        
          <div class="container-fluid">
          
          <!-- Carousel container -->
          <div id="my-pics" class="carousel slide" data-ride="carousel">

          <!-- Indicators -->
          <ol id="ol" class="carousel-indicators">
          <li data-target="#my-pics" data-slide-to="0" class="active"></li>
          </ol>

          <!-- Content -->
          <div id="div" class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="item active">
          <img style="height: 500px;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" alt="" width='100%' >
          </div>

          </div>

          <!-- Previous/Next controls -->
          <a id="previous" class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
          <span class="icon-prev" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
          </a>
          <a id="next" class="right carousel-control" href="#my-pics" role="button" data-slide="next">
          <span class="icon-next" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
          </a>

          </div>

          <!-- Center the image -->
          <style scoped>
          .item img{
              margin: 0 auto;
          }
          </style>

          </div>

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