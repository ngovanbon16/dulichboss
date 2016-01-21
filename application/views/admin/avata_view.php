<?php
$upload=array(
    "name" => "img",
    "size" => "25",
);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link type="text/css" rel="Stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e){
            
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
            if($this->session->userdata("email") != "")
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
         <?php
            //echo $this->session->userdata("id");
            if($errors != ""){
                if($errors == "success")
                {
                    echo "Thành công!";
                }
                else
                {
                    echo print_r($errors);
                }
            }
            echo form_open_multipart(base_url()."index.php/avata/doupload");
            echo form_label("Avartar: ").form_upload($upload)."<br />";
            echo form_label(" ").form_submit("ok", "Tải lên");
            echo form_close();
        ?>
    </div>
                               
</body>
</html>
  
    

