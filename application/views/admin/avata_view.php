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
    <script type="text/javascript">
        $(document).ready(function () {
        	$.jqx.theme = "bootstrap";

            var id = "<?php echo $this->session->userdata('id'); ?>";
            var path = "<?php echo base_url(); ?>index.php/avata/upload/"+id;
            $('#jqxFileUpload').jqxFileUpload({ localization: { browseButton: '<?php echo lang("browse") ?>', uploadButton: "<?php echo lang('upload_all') ?>", cancelButton: "<?php echo lang('cancel_all') ?>", uploadFileTooltip: "<?php echo lang('upload_file') ?>", cancelFileTooltip: "<?php echo lang('cancel') ?>" } });

            $('#jqxFileUpload').jqxFileUpload({ multipleFilesUpload: false });

            $('#jqxFileUpload').jqxFileUpload({ browseTemplate: 'success', width: "400", height: "120", uploadUrl: path, fileInputName: 'fileToUpload'});

            $('#eventsPanel').jqxPanel({ width: "400", height: "100" });
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
        });
    </script>
    <style type="text/css">
    .div1{
        float: left;
        margin: 10px;
        padding-left: 10px;
    }
    </style>
</head>
<body>
	<div class="div1">
        <?php
            $ten = $this->session->userdata('avata');
            $file_path = "uploads/user/".$ten;

            if(file_exists($file_path))
            {
                ?>
                    <img id="avata" src="<?php echo base_url(); ?>uploads/user/<?php echo $this->session->userdata['avata']; ?>" height="" width="">
                <?php
            }
            else
            {
                ?>
                <i class="fa fa-user fa-fw"></i>
                <?php
            }
        ?>
    </div>
    <div class="div1">
    	<div id="jqxFileUpload"></div>
        <div id="eventsPanel"></div>
    </div>
</body>
</html>