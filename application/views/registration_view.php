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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxloader.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnotification.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";
            var notificationWidth = 300;

            $("#notiSuccess").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 5000, template: "success"
            });

            $("#notiError").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "error"
            });

            function openSuccess(str)
            {
                $("#result").html(str);
                $("#notiSuccess").jqxNotification("open");
                //$("#notiSuccess").jqxNotification("open");
            }

            function openError(str)
            {
                $("#error").html(str);
                $("#notiError").jqxNotification("open");
                //$("#notiError").jqxNotification("open");
            }
            // Create jqxExpander.
            $("#createAccount").jqxExpander({  toggleMode: 'none', width: '350px', showArrow: false });
            // Create jqxInput.
            $("#firstName").jqxInput({  width: '300px', height: '25px' });
            $("#lastName").jqxInput({  width: '300px', height: '25px'});
            $("#userName").jqxInput({  width: '300px', height: '25px' });
            $("#userName").jqxTooltip({ content: 'Email phải có dạng: <b><i>ex@gmail.com</i></b>', position: 'mouse', name: 'movieTooltip'});
            // Create jqxPasswordInput.
            $("#password").jqxPasswordInput({  width: '300px', height: '25px', showStrength: true, showStrengthPosition: "right" });
            $("#passwordConfirm").jqxPasswordInput({  width: '300px', height: '25px' });
            // Create jqxDateTimeInpput.
            $("#birthday").jqxDateTimeInput({ formatString: 'yyyy-MM-dd',  width: '300px', height: '25px' });
            // Create jqxDropDownList.
            var genders = ["Nam", "Nữ"];
            $("#gender").jqxDropDownList({  source: genders, selectedIndex: -1, width: '300px', height: '25px', promptText: "Tôi là...", dropDownHeight: "50px" });
            // Create jqxButton.
            $("#submit").jqxButton({ theme: theme, height: "28px", width: "110px" });
            // Create jqxValidator.
            $("#form").jqxValidator({
                rules: [
                        {
                            input: "#firstName", message: "Họ không được rỗng!", action: 'keyup, blur', rule: function (input, commit) {
                                return input.val() != "" && input.val() != "First";
                            }
                        },
                        {
                            input: "#lastName", message: "Tên không được rỗng!", action: 'keyup, blur', rule: function (input, commit) {
                                return input.val() != "" && input.val() != "Last";
                            }
                        },
                        { input: "#userName", message: "Địa chỉ Email không được rỗng!", action: 'keyup, blur', rule: 'required' },
                        { input: "#userName", message: "Email không đúng định dạng!", action: 'keyup, blur', rule: function (input, commit) {
                                var mau = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                                return mau.test(input.val());
                            }
                        },
                        { input: "#password", message: "Password không được rỗng!", action: 'keyup, blur', rule: 'required' },
                        { input: "#password", message: "Password phải dài hơn 6 ký tự!", action: 'keyup, blur', rule: function (input, commit) {
                                return input.val().length > 5;
                            }
                        },
                        { input: "#passwordConfirm", message: "Password không được rỗng!", action: 'keyup, blur', rule: 'required' },
                        {
                            input: "#passwordConfirm", message: "Passwords không khớp!", action: 'keyup, blur', rule: function (input, commit) {
                                var firstPassword = $("#password").jqxPasswordInput('val');
                                var secondPassword = $("#passwordConfirm").jqxPasswordInput('val');
                                return firstPassword == secondPassword;
                            }
                        },
                        {
                            input: "#gender", message: "Giới tính không được rỗng!", action: 'blur', rule: function (input, commit) {
                                var index = $("#gender").jqxDropDownList('getSelectedIndex');
                                return index != -1;
                            }
                        }
                ],  hintType: "label"
            });
            // Validate the Form.
            $("#submit").click(function () {
                $('#form').jqxValidator('validate');
            });
            $("#jqxLoader").jqxLoader({ width: 100, height: 60, imagePosition: 'top' });
            // Update the jqxExpander's content if the validation is successful.
            $('#form').on('validationSuccess', function (event) {
                //$("#createAccount").jqxExpander('setContent', '<span style="margin: 10px;">Account created.</span>');
                $('#jqxLoader').jqxLoader('open');
                $("#submit").hide();
                var url, dta;
                url="<?php echo base_url(); ?>index.php/registration/registration?t=" + Math.random();
                dta = {
                    "ho" : $("#firstName").val(),
                    "ten" : $("#lastName").val(),
                    "email" : $("#userName").val(),
                    "matkhau" : $("#password").val(),
                    "matkhau1" : $("#passwordConfirm").val(),
                    "ngaysinh" : $("#birthday").val(),
                    "gioitinh" : $("#gender").val()
                };
                console.log(dta);
                $.post(url, dta, function(data, status){

                    console.log(status);
                    console.log(data);
                    if(status == "success")
                    {  
                        if(data.status == "error")
                        {
                            //alert(data.msg["email"]);
                            openError(data.msg["email"]);
                        }
                        else
                        {
                            //alert("Đăng ký thành công! \n" + data.msg["email"]);
                            openSuccess(data.msg["email"]);
                            //setTimeout("location.href = '<?php echo site_url('login'); ?>';",500);
                            setTimeout("location.href = 'https://mail.google.com/';",3000);
                        }
                    }
                    $("#submit").show();
                    $('#jqxLoader').jqxLoader('close');
                }, 'json');


            });
        });

        /*$(document).ready(function () {
            $("#submit1").jqxButton({
                width: 150
            });
            $("#jqxLoader").jqxLoader({ width: 100, height: 60, imagePosition: 'top' });
            $('#submit1').on('click', function () {
                $('#jqxLoader').jqxLoader('open');
            });
            $("#closeLoader").jqxButton({
                width: 100
            });
            $('#closeLoader').on('click', function () {
                $('#jqxLoader').jqxLoader('close');
            });
        });*/
        
    </script>

    <style type="text/css">
       /* #firstName{
            text-transform: capitalize;
        }
        #lastName{
            text-transform: capitalize;
        }
        #tieude{
            text-transform: capitalize;
            font-size: 18px;
            color: #00F;
            padding: 5px 5px;
            font-style: italic;
        }*/
        .batbuoc{
            color: #F00;
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
        }
        .div2{
            float: left;
            padding-left: 120px;
        }
        #submit{
            background-color: #FFF;
            transition: font-weight 1s;
            -o-transition: font-weight 1s;
            -ms-transition: font-weight 1s;
            -moz-transition: font-weight 1s;
            -webkit-transition: font-weight 1s;
        }
        #submit:hover{
            background-color: #09F;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="notiSuccess">
        <div id="result">Thông báo thành công!</div>
    </div>
    <div id="notiError">
        <div id="error">Thông báo lỗi!</div>
    </div>
    <center>
    <div id="createAccount" style="font-family: Verdana; font-size: 13px;">
        <div id="tieude">
            <div class="div1">Tạo tài khoản</div>
            <div class="div2">
                <a href="<?php echo base_url(); ?>index.php/home">Trang chủ</a> |  
                <a href="<?php echo base_url(); ?>index.php/login">Đăng nhập</a>
            </div>
        </div>
        <div style="font-family: Verdana; font-size: 13px;">
            <form id="form" style="overflow: hidden; margin: 10px;" action="./">
                <table>
                    <tr>
                        <td align="center" colspan="2">
                            <div id="jqxLoader"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Họ<b class="batbuoc"> * </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input id="firstName" placeholder="Nhập họ..." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Tên<b class="batbuoc"> * </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input id="lastName" placeholder="Nhập tên..." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Địa chỉa mail<b class="batbuoc"> * </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="email" id="userName" placeholder="Nhập Email..." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Mật khẩu<b class="batbuoc"> * </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input id="password" type="password" placeholder="Nhập mật khẩu..." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Xác nhận<b class="batbuoc"> * </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input id="passwordConfirm" type="password" placeholder="Nhập lại mật khẩu..." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Ngày sinh<b class="batbuoc"> * </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="birthday">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Giới tính<b class="batbuoc"> * </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="gender">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <input id="submit" type="button" value="Đăng ký" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div></center>
</body>
</html>