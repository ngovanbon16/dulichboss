<!DOCTYPE html>
<html lang="en">
<head>
    <title id="Description"><?php echo $title ?></title>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnotification.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            <?php 
                $lang = "vi";
                if(lang('lang') == "en")
                {
                    $lang = "en";
                }
            ?>
            var language = "<?php echo $lang; ?>";
            window.onload = function() {
                CKEDITOR.replace( 'BV_NOIDUNG',
                    {
                        language : language,
                        uiColor : '#F8F8FF',
                        height : 300,
                        toolbarCanCollapse : true
                    }
                );
                
            };

            var url = "<?php echo base_url(); ?>index.php/diadiem/data";
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'DD_MA' },
                    { name: 'DD_TEN' }
                ],
                url: url,
                async: false
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#DD_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('place') ?>:", displayMember: "DD_TEN", valueMember: "DD_MA", width: "100%", height: 32 });

            $("#btngui").click(function(){
                var BV_NOIDUNG = CKEDITOR.instances.BV_NOIDUNG.getData();
                var BV_TIEUDE = $("#BV_TIEUDE").val();
                var DD_MA = $("#DD_MA").val();

                if(BV_TIEUDE == "")
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#F99";
                    $("#BV_TIEUDE").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('title') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#FFF";
                }

                if(BV_NOIDUNG == "")
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#F99";
                    $("#BV_NOIDUNG").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('content') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#FFF";
                }

                if(DD_MA == "")
                {
                    document.getElementById('DD_MA').style.backgroundColor = "#F99";
                    $("#DD_MA").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('place') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('DD_MA').style.backgroundColor = "#FFF";
                }

                var url, data;
                url = "<?php echo base_url(); ?>index.php/baiviet/add?t=" + Math.random();
                data = {
                    "DD_MA" : DD_MA,
                    "BV_TIEUDE" : BV_TIEUDE,
                    "BV_NOIDUNG" : BV_NOIDUNG,
                    "BV_DUYET" : '1'
                };
                console.log(data);
                $.post(url, data, function(data, status){
                    console.log(data);
                    if(status == "success")
                    {
                        if(data.status == "success")
                        {   
                            thongbao("", "<?php echo lang('inserted_successfully'); ?>", "success");
                            $("#BV_TIEUDE").val("");
                            CKEDITOR.instances.BV_NOIDUNG.setData("");
                            /*$("#DD_MA").jqxDropDownList('selectedIndex','-1');*/
                        }
                        else
                        {
                            thongbao("", "Không thành công", "danger");
                        }
                    }
                    else
                    {
                        thongbao("", "Lỗi không truyền được dữ liệu!", "danger");
                    }
                    
                }, 'json');
            });

            $("#btnluu").click(function(){
                var BV_NOIDUNG = CKEDITOR.instances.BV_NOIDUNG.getData();
                var BV_TIEUDE = $("#BV_TIEUDE").val();
                var DD_MA = $("#DD_MA").val();
                var BV_MA = $("#BV_MA").html();

                if(BV_TIEUDE == "")
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#F99";
                    $("#BV_TIEUDE").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('title') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#FFF";
                }

                if(BV_NOIDUNG == "")
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#F99";
                    $("#BV_NOIDUNG").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('content') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#FFF";
                }

                if(DD_MA == "")
                {
                    document.getElementById('DD_MA').style.backgroundColor = "#F99";
                    $("#DD_MA").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('place') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('DD_MA').style.backgroundColor = "#FFF";
                }

                var url, data;
                url = "<?php echo base_url(); ?>index.php/baiviet/edit?t=" + Math.random();
                data = {
                    "BV_MA" : BV_MA,
                    "DD_MA" : DD_MA,
                    "BV_TIEUDE" : BV_TIEUDE,
                    "BV_NOIDUNG" : BV_NOIDUNG
                };
                console.log(data);
                $.post(url, data, function(data, status){
                    console.log(data);
                    if(status == "success")
                    {
                        if(data.status == "success")
                        {   
                            thongbao("", "<?php echo lang('updated_successfully'); ?>", "success");
                            /*$("#BV_TIEUDE").val("");
                            CKEDITOR.instances.BV_NOIDUNG.setData("");
                            $("#DD_MA").jqxDropDownList('selectedIndex','-1');*/
                            setTimeout("location.href = '<?php echo base_url(); ?>index.php/baiviet'",0);
                            
                        }
                        else
                        {
                            thongbao("", "Không thành công", "danger");
                        }
                    }
                    else
                    {
                        thongbao("", "Lỗi không truyền được dữ liệu!", "danger");
                    }
                    
                }, 'json');
            });

             <?php 
                $DD_MA = "";
                if(isset($baiviet))
                {
                    $DD_MA = $baiviet['DD_MA'];
            ?>
                    $("#btnluu").show();
                    $("#btngui").hide();
                    $("#DD_MA").jqxDropDownList('selectItem', "<?php echo $DD_MA; ?>");
            <?php
                }
                else
                {
            ?>      
                    $("#btnluu").hide();
                    $("#btngui").show();
            <?php 
                }
            ?>
        });
    </script>
</head>
<body>
<div style="margin: 10px;">
    <?php 
        $BV_MA = "";
        $BV_TIEUDE = "";
        $BV_NOIDUNG = "";

        if(isset($baiviet))
        {
            $BV_MA = $baiviet['BV_MA'];
            $BV_TIEUDE = $baiviet['BV_TIEUDE'];
            $BV_NOIDUNG = $baiviet['BV_NOIDUNG'];
        }
    ?>
    <table width="100%">
        <tr>
            <td width="50%">
                <label for="BV_TIEUDE"><?php echo lang('title'); ?> <b style="color: #D00;">*</b></label>
                [<i id="BV_MA"><?php echo $BV_MA; ?></i>]
                <input type="text" class="form-control" id="BV_TIEUDE" value="<?php echo $BV_TIEUDE; ?>" placeholder="<?php echo lang('input').' '.lang('title'); ?>">
            </td>
            <td style="padding-left: 10px;">
                <label for="DD_MA"><?php echo lang('place'); ?> <b style="color: #D00;">*</b></label>
                <div style="font-size: 14px;" id="DD_MA"></div>
            </td>
        </tr>
    </table>
    <label for="usr"><?php echo lang('content'); ?> <b style="color: #D00;">*</b></label>
    <textarea name="BV_NOIDUNG" id="BV_NOIDUNG"><?php echo $BV_NOIDUNG; ?></textarea> 
    <br/>
     <button id="btnluu" style="width: 100px;" type="button" class="btn btn-default"><?php echo lang('save'); ?></button>

    <button id="btngui" style="width: 100px;" type="button" class="btn btn-default"><?php echo lang('submit'); ?></button>

    <button style="margin-left: 10px;" type="button" class="btn btn-default" onclick="history.back(-1);"><?php echo lang('back'); ?></button>
</div>
</body>
</html>