<?php
$upload=array(
    "name" => "img",
    "size" => "25",
);
?>
<head>

</head>
  
    <?php
        echo $this->session->userdata("id");
        if($errors != ""){
            echo print_r($errors);
        }
        echo form_open_multipart(base_url()."index.php/avata/doupload");
        echo form_label("Avartar: ").form_upload($upload)."<br />";
        echo form_label(" ").form_submit("ok", "Upload");
        echo form_close();
    ?>

