<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type="text/css" rel="Stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxfileupload.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        	$.jqx.theme = "bootstrap";

            var id = "<?php echo $this->session->userdata('id'); ?>";
            var path = "<?php echo base_url(); ?>index.php/avata/upload/"+id;
            $('#jqxFileUpload').jqxFileUpload({ localization: { browseButton: '<?php echo lang("browse") ?>', uploadButton: "<?php echo lang('upload_file') ?>", cancelButton: "<?php echo lang('cancel') ?>", uploadFileTooltip: "<?php echo lang('upload_file') ?>", cancelFileTooltip: "<?php echo lang('cancel') ?>" } });

            $('#jqxFileUpload').jqxFileUpload({ multipleFilesUpload: false });

            $('#jqxFileUpload').jqxFileUpload({ browseTemplate: 'success', width: "100%", height: "120", uploadUrl: path, fileInputName: 'fileToUpload'});

            $('#eventsPanel').jqxPanel({ width: "100%", height: "100" });
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
                    location.reload(true);
                    setTimeout("location.href = '<?= base_url() ?>index.php/user/account';",1000);
                }
                else
                {
                    thongbao("", serverResponce, "danger");
                }
                
            });
        });
    </script>
    <style type="text/css">
        table{
            width: 100%;
        }
        .avatar{
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        hr{
            margin: 5px;
        }
        h1{
            color: #000;
            /*text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);*/
        }
        h2{
            color: #000;
            /*text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);*/
        }
    </style>
</head>
<body>
     <section style="background-color: #DCDCDC;" class="service-item">
       <div class="container">
            <table border="0">
                <tr>
                    <td style="border: solid 1px #F8F8FF; padding: 20px; background-color: #DCDCDC; border-radius: 5px 0px 0px 5px;" align="center" width="30%">
                        <?php
                            $ten = $info["ND_HINH"];
                            $file_path = "uploads/user/".$ten;

                            if(file_exists($file_path))
                            {
                                ?>
                                    <img class="avatar" id="avata" src="<?php echo base_url(); ?>uploads/user/<?php echo $this->session->userdata['avata']; ?>" >
                                <?php
                            }
                            else
                            {
                                ?>
                                <i class="fa fa-user fa-fw"></i>
                                <?php
                            }
                        ?>
                        <h2>
                            <b style="color: #000;"> <?php echo $info['ND_HO'].' '.$info['ND_TEN'] ?>  </b>
                            <a href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $info['ND_MA'] ?>">
                                <i class="fa fa-edit fa-fw"></i>
                            </a>
                            
                        </h2>
                        <hr/>
                        <h3><?php echo lang('change').' '.lang('avatar') ?></h3>
                        <div id="jqxFileUpload"></div>
                        <div style="display: none;" id="eventsPanel"></div>
                    </td>
                    <td style="padding: 20px; background-color: #F8F8FF; border-radius: 0px 5px 5px 0px;" valign="top">
                        <h1><?php echo lang('profile') ?></h1>
                        <h2> <b style="color: #000;"><?php echo lang('basic_information') ?></b></h2>
                        <hr/>
                        <b><?php echo lang('name') ?></b>: <?php echo $info['ND_HO'].' '.$info['ND_TEN'] ?><br/>
                        <b><?php echo lang('birthday') ?></b>: <?php echo $info['ND_NGAYSINH'] ?><br/>
                        <b><?php echo lang('gender') ?></b>: 
                            <?php 
                                if($info['ND_GIOITINH'] == "1")
                                    echo lang('male');
                                else
                                    echo lang('female');
                            ?><br/>
                        <b><?php echo lang('email') ?></b>: <?php echo $info['ND_DIACHIMAIL'] ?>
                        <h2><b style="color: #000;"><?php echo lang('contact_information') ?></b></h2>
                        <hr/>
                        <?php
                            $tinh = $huyen = $xa = lang('information_is_being_updated'); 
                            if($tentinh != "")
                            {
                                $tinh = $tentinh;
                            }
                            if($tenhuyen != "")
                            {
                                $huyen = $tenhuyen;
                            }
                            if($tenxa != "")
                            {
                                $xa = $tenxa;
                            }
                        ?>
                        <b><?php echo lang('provincial') ?></b>: <?php echo $tinh ?><br/>
                        <b><?php echo lang('district') ?></b>: <?php echo $huyen ?><br/>
                        <b><?php echo lang('town') ?></b>: <?php echo $xa ?><br/>
                        <b><?php echo lang('address') ?></b>: <?php echo $info['ND_DIACHI'] ?><br/>
                        <b><?php echo lang('phone') ?></b>: <?php echo $info['ND_SDT'] ?><br/>
                        <b>Facebook</b>: <?php echo $info['ND_DIACHI'] ?><br/>
                        <b><?php echo lang('introduce') ?></b>: <?php echo $info['ND_GIOITHIEU'] ?><br/>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</body>
</html>