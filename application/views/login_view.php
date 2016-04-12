<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo lang('login'); ?></title>

        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/timeline.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/startmin.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/morris.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>assets/css/style_login.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/startmin.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/raphael.min.js"></script>

        <script language="javascript" type="text/javascript">
            $(document).ready(function(e)
            {
                $("#button").click(function()
                {
                    var url, dta;
                    url="<?php echo base_url(); ?>index.php/login/login?t=" + Math.random();
                    dta = {
                        "email" : $("#login :text[name='email']").val(),
                        "password" : $("#login :password[name='password']").val()
                    };

                    $.post(url, dta, function(data, status){

                        console.log(status);
                        //console.log(data);
                        if(status == "success")
                        {   
                            $("#login *").remove(".txterror").removeClass("bg01");
                            //alert(data.status);
                            if(data.status == "error")
                            {
                                $("#info").addClass("txterror").text(data.msg["error"]);
                                $.each(data.msg, function(i, val)
                                {
                                    var ele = "#login [name='" + i + "']";
                                    //console.log(ele);
                                    $(ele).addClass("bg01")
                                                .after("<span class='txterror'>" + val + "</span>");
                                });
                            }
                            else
                            {
                                $("#info").addClass("textsuccess").text("<?php echo lang('logged_in_successfully') ?>");
                                $("#login").remove();
                                setTimeout("location.href = '<?php echo site_url('admin'); ?>';",1000);
                            }
                        }
                    }, 'json');
                });

                $("input").focus(function()
                {
                    //$(this).css("background-color", "#ff0000");

                });
                $("input").blur(function()
                {
                    //$(this).css("background-color", "#ffffff");
                });
            });
        </script>

        <style type="text/css">
            #btn{
                text-decoration: none;
                color: #FFF;
            }
            h3{
                float: left;
            }
            a{
                text-decoration: none;
                font-size: 16px;
                padding-left: 180px;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo lang('login') ?></h3>
                            <a href="<?php echo base_url(); ?>index.php/registration"><?php echo lang('register') ?></a>
                        </div>
                        <div class="panel-body">
                            <div id="info" class="form-group"><?php echo lang('notification') ?></div>
                            <form name="login" id="login" method="post" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="<?php echo lang('input').' '.lang('email') ?>" name="email" id="email" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="<?php echo lang('input').' '.lang('password') ?>" name="password" id="password" type="password" value="">
                                    </div>
                                    <button type="button" id="button" class="btn btn-outline btn-success btn-lg btn-block"><?php echo lang('login') ?></button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
