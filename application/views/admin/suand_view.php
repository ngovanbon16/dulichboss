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

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnotification.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";
            var notificationWidth = 300;

            $("#notiSuccess").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 1000, template: "success"
            });

            $("#notiError").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 1000, template: "error"
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
            $("#createAccount").jqxExpander({  toggleMode: 'none', width: '500px', showArrow: false });
            // Create jqxInput.
            $("#ND_MA").jqxInput({  width: '300px', height: '25px' });
            /*$("#NQ_MA").jqxInput({  width: '300px', height: '25px' });*/
            $("#CB_MA").jqxInput({  width: '300px', height: '25px' });

            $("#ND_HO").jqxInput({  width: '300px', height: '25px' });
            $("#ND_TEN").jqxInput({  width: '300px', height: '25px'});
            $("#ND_DIACHIMAIL").jqxInput({  width: '300px', height: '25px' });
            // Create jqxPasswordInput.
            $("#passwordold").jqxPasswordInput({  width: '300px', height: '25px', showStrength: true, showStrengthPosition: "right" });
            $("#ND_MATKHAU").jqxPasswordInput({  width: '300px', height: '25px', showStrength: true, showStrengthPosition: "right" });
            $("#passwordConfirm").jqxPasswordInput({  width: '300px', height: '25px' });
            // Create jqxDateTimeInpput.
            $("#ND_NGAYSINH").jqxDateTimeInput({ formatString: 'yyyy-MM-dd',  width: '300px', height: '25px' });
            // Create jqxDropDownList.
            var genders = ["Nữ", "Nam"];
            $("#ND_GIOITINH").jqxDropDownList({  source: genders, selectedIndex: <?php echo $info['ND_GIOITINH'] ?>, width: '300px', height: '25px', promptText: "Tôi là...", dropDownHeight: "50px" });
            
            $("#ND_DIACHI").jqxInput({  width: '300px', height: '25px' });
            $("#ND_SDT").jqxInput({  width: '300px', height: '25px' });
            $("#ND_FACE").jqxInput({  width: '300px', height: '25px' });
            $("#ND_GIOITHIEU").jqxInput({  width: '300px', height: '25px' });
            $("#ND_DIEM").jqxInput({  width: '300px', height: '25px' });
            $("#ND_THUONG").jqxInput({  width: '300px', height: '25px' });
            // Create jqxButton.
            $("#submit").jqxButton({ theme: theme, height: "35px", width: "150px" });
            // Create jqxValidator.
            $("#form").jqxValidator({
                rules: [
                        {
                            input: "#ND_HO", message: "Họ không được rỗng!", action: 'keyup, blur', rule: function (input, commit) {
                                return input.val() != "" && input.val() != "First";
                            }
                        },
                        {
                            input: "#ND_TEN", message: "Tên không được rỗng!", action: 'keyup, blur', rule: function (input, commit) {
                                return input.val() != "" && input.val() != "Last";
                            }
                        },
                        { input: "#ND_DIACHIMAIL", message: "Địa chỉ Email không được rỗng!", action: 'keyup, blur', rule: 'required' },
                        { input: "#ND_MATKHAU", message: "Password không được rỗng!", action: 'keyup, blur' },
                        { input: "#passwordConfirm", message: "Password không được rỗng!", action: 'keyup, blur' },
                        {
                            input: "#passwordConfirm", message: "Passwords không khớp!", action: 'keyup, blur', rule: function (input, commit) {
                                var firstPassword = $("#ND_MATKHAU").jqxPasswordInput('val');
                                var secondPassword = $("#passwordConfirm").jqxPasswordInput('val');
                                return firstPassword == secondPassword;
                            }
                        },
                        {
                            input: "#ND_GIOITINH", message: "Giới tính không được rỗng!", action: 'blur', rule: function (input, commit) {
                                var index = $("#ND_GIOITINH").jqxDropDownList('getSelectedIndex');
                                return index != -1;
                            }
                        }
                ],  hintType: "label"
            });
            // Validate the Form.
            $("#submit").click(function () {
                $('#form').jqxValidator('validate');
            });
            // Update the jqxExpander's content if the validation is successful.
            $('#form').on('validationSuccess', function (event) {
                //$("#createAccount").jqxExpander('setContent', '<span style="margin: 10px;">Account created.</span>');

                var url, dta;
                url="<?php echo base_url(); ?>index.php/nguoidung/update?t=" + Math.random();
                dta = {
                    "ND_MA" : $("#ND_MA").val(),
                    "NQ_MA" : $("#NQ_MA").val(),
                    "CB_MA" : $("#CB_MA").val(),
                    "ND_HO" : $("#ND_HO").val(),
                    "ND_TEN" : $("#ND_TEN").val(),
                    "ND_DIACHIMAIL" : $("#ND_DIACHIMAIL").val(),
                    "passwordold" : $("#passwordold").val(),
                    "ND_MATKHAU" : $("#ND_MATKHAU").val(),
                    "ND_NGAYSINH" : $("#ND_NGAYSINH").val(),
                    "ND_GIOITINH" : $("#ND_GIOITINH").val(),
                    "T_MA" : $("#T_MA").val(),
                    "H_MA" : $("#H_MA").val(),
                    "X_MA" : $("#X_MA").val(),
                    "ND_DIACHI" : $("#ND_DIACHI").val(),
                    "ND_SDT" : $("#ND_SDT").val(),
                    "ND_FACE" : $("#ND_FACE").val(),
                    "ND_GIOITHIEU" : $("#ND_GIOITHIEU").val(),
                    "ND_DIEM" : $("#ND_DIEM").val(),
                    "ND_THUONG" : $("#ND_THUONG").val()
                };
                console.log(dta);
                $.post(url, dta, function(data, status){

                    console.log(status);
                    console.log(data);
                    if(status == "success")
                    {  
                        if(data.status == "error")
                        {
                            alert(data.msg["matkhau"]);
                        }
                        else
                        {
                            //alert("Sửa thành công");
                            openSuccess("Sửa thành công!");
                            setTimeout("location.href = '<?php echo site_url('home'); ?>';",1000);
                        }
                    }
                }, 'json');


            });
        });
    </script>

    <script type="text/javascript">
     $(document).ready(function () {

                var url = "<?php echo base_url(); ?>index.php/nhomquyen/data";
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'NQ_MA' },
                        { name: 'NQ_TEN' }
                    ],
                    url: url,
                    async: true
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#NQ_MA").jqxDropDownList({ selectedIndex: <?php echo $indexnhomquyen; ?>, source: dataAdapter, placeHolder: "Chọn nhóm quyền:", displayMember: "NQ_TEN", valueMember: "NQ_MA", width: 300, height: 25});

                var url = "<?php echo base_url(); ?>index.php/tinh/data";
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'T_MA' },
                        { name: 'T_TEN' }
                    ],
                    url: url,
                    async: true
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#T_MA").jqxDropDownList({ selectedIndex: <?php echo $indextinh; ?>, source: dataAdapter, placeHolder: "Tên tỉnh:", displayMember: "T_TEN", valueMember: "T_MA", width: 300, height: 25});

                $("#T_MA").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Mã tỉnh: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Tên tỉnh: " + item.label);
                            $("#selectionlog").children().remove();
                            $("#selectionlog").append(labelelement);
                            $("#selectionlog").append(valueelement);
                            matinh = item.value;
                        }
                    }
                });

                $("#T_MA").change(function(){
                    var url = "<?php echo base_url(); ?>index.php/huyen/data/" + matinh;
                    // prepare the data
                    var source =
                    {
                        datatype: "json",
                        datafields: [
                            { name: 'H_MA' },
                            { name: 'H_TEN' }
                        ],
                        url: url,
                        async: true
                    };
                    var dataAdapter = new $.jqx.dataAdapter(source);
                    // Create a jqxInput
                    $("#H_MA").jqxDropDownList({ selectedIndex: <?php echo $indexhuyen; ?>, source: dataAdapter, placeHolder: "Tên huyện:", displayMember: "H_TEN", valueMember: "H_MA", width: 300, height: 25});


                    var url = "<?php echo base_url(); ?>index.php/xa/data/" + $("#T_MA").val() + "/" + $("#H_MA").val();
                    // prepare the data
                    //alert(matinh+" | "+mahuyen);
                    var source =
                    {
                        datatype: "json",
                        datafields: [
                            { name: 'X_MA' },
                            { name: 'X_TEN' }
                        ],
                        url: url,
                        async: true
                    };
                    var dataAdapter = new $.jqx.dataAdapter(source);
                    // Create a jqxInput
                    $("#X_MA").jqxDropDownList({ selectedIndex: <?php echo $indexxa; ?>, source: dataAdapter, placeHolder: "Tên Xã:", displayMember: "X_TEN", valueMember: "X_MA", width: 300, height: 25});

/*                    $("#H_MA").on('select', function (event) {
                        if (event.args) {
                            var item = event.args.item;
                            if (item) {
                                var valueelement = $("<div></div>");
                                valueelement.text("Mã huyện: " + item.value);
                                var labelelement = $("<div></div>");
                                labelelement.text("Tên huyện: " + item.label);
                                $("#selectionlog1").children().remove();
                                $("#selectionlog1").append(labelelement);
                                $("#selectionlog1").append(valueelement);
                                //mahuyen = item.value;
                            }
                        }
                    });*/
                });

                var url = "<?php echo base_url(); ?>index.php/huyen/data/" + <?php echo $info["T_MA"]; ?>;
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'H_MA' },
                        { name: 'H_TEN' }
                    ],
                    url: url,
                    async: true
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#H_MA").jqxDropDownList({ selectedIndex: <?php echo $indexhuyen; ?>, source: dataAdapter, placeHolder: "Tên huyện:", displayMember: "H_TEN", valueMember: "H_MA", width: 300, height: 25});

                $("#H_MA").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Mã huyện: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Tên huyện: " + item.label);
                            $("#selectionlog1").children().remove();
                            $("#selectionlog1").append(labelelement);
                            $("#selectionlog1").append(valueelement);
                            matinh = $("#T_MA").val();
                            mahuyen = item.value;
                        }
                    }
                });

                $("#H_MA").change(function(){
                    var url = "<?php echo base_url(); ?>index.php/xa/data/" + $("#T_MA").val() + "/" + $("#H_MA").val();
                    // prepare the data
                    //alert(matinh+" | "+mahuyen);
                    var source =
                    {
                        datatype: "json",
                        datafields: [
                            { name: 'X_MA' },
                            { name: 'X_TEN' }
                        ],
                        url: url,
                        async: true
                    };
                    var dataAdapter = new $.jqx.dataAdapter(source);
                    // Create a jqxInput
                    $("#X_MA").jqxDropDownList({ selectedIndex: <?php echo $indexxa; ?>, source: dataAdapter, placeHolder: "Tên Xã:", displayMember: "X_TEN", valueMember: "X_MA", width: 300, height: 25});

/*                    $("#X_MA").on('select', function (event) {
                        if (event.args) {
                            var item = event.args.item;
                            if (item) {
                                var valueelement = $("<div></div>");
                                valueelement.text("Mã xã: " + item.value);
                                var labelelement = $("<div></div>");
                                labelelement.text("Tên xã: " + item.label);
                                $("#selectionlog2").children().remove();
                                $("#selectionlog2").append(labelelement);
                                $("#selectionlog2").append(valueelement);
                            }
                        }
                    });*/
                });

                var url = "<?php echo base_url(); ?>index.php/xa/data/" + <?php echo $info["T_MA"]; ?> + "/" + <?php echo $info["H_MA"]; ?>;
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'X_MA' },
                        { name: 'X_TEN' }
                    ],
                    url: url,
                    async: true
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#X_MA").jqxDropDownList({ selectedIndex: <?php echo $indexxa; ?>, source: dataAdapter, placeHolder: "Tên Xã:", displayMember: "X_TEN", valueMember: "X_MA", width: 300, height: 25});

                $("#X_MA").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Mã xã: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Tên xã: " + item.label);
                            $("#selectionlog2").children().remove();
                            $("#selectionlog2").append(labelelement);
                            $("#selectionlog2").append(valueelement);
                        }
                    }
                });
            });
    </script>

    <style type="text/css">
        .tieude{
            color: #111;
            text-transform: capitalize;
            font-size: 14px;
            font-weight: bold;
            background-color: #09F;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 5px;
            text-shadow: 5px 5px 10px #FFF;
            border-radius: 5px;
            box-shadow: 1px 1px 3px #09F;
            opacity: 0.7;
            transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
            -o-transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
            -ms-transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
            -moz-transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
            -webkit-transition: width 2s, height 2s, box-shadow 2s, opacity 2s;
        }
        .tieude:hover{
            box-shadow: 5px 5px 10px #09F;
            opacity: 1;
        }
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
            padding-left: 150px;
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
        <div>
            <div class="div1">Chỉnh sửa thông tin người dùng</div>
            <div class="div2">
                <a href="<?php echo base_url(); ?>index.php/home">Trang chủ</a> |  
                <a href="<?php echo base_url(); ?>index.php/login">Đăng nhập</a>
            </div>
        </div>
        <div style="font-family: Verdana; font-size: 13px;">
            <form id="form" style="overflow: hidden; margin: 10px;" action="./">
                <?php //echo print_r($info); ?>
                <table>
                    <tr>
                        <td colspan="2">
                            <div class="tieude">Thông tin cơ bản</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mã:
                        </td>
                        <td>
                            <input id="ND_MA" value="<?php echo $info['ND_MA'] ?>" readonly="readonly" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nhóm quyền:
                        </td>
                        <td>
                            <div id="NQ_MA"></div>
                            <!-- <input id="NQ_MA" value="<?php echo $info['NQ_MA'] ?>" /> -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Cấp bậc:
                        </td>
                        <td>
                            <input id="CB_MA" value="<?php echo $info['CB_MA'] ?>" readonly="readonly" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Họ:<b class="batbuoc"> * </b>
                        </td>
                        <td>
                            <input id="ND_HO" value="<?php echo $info['ND_HO'] ?>" placeholder="Nhập họ..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tên:<b class="batbuoc"> * </b>
                        </td>
                        <td>
                            <input id="ND_TEN" value="<?php echo $info['ND_TEN'] ?>" placeholder="Nhập tên..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Địa chỉa mail:<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input type="email" id="ND_DIACHIMAIL" value="<?php echo $info['ND_DIACHIMAIL'] ?>" readonly="readonly" placeholder="Nhập Email..." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="tieude">Đổi mật khẩu</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mật khẩu cũ:<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input id="passwordold" type="password" title="Nếu muốn đổi mật khẩu vui lòng nhập mật khẩu cũ!" placeholder="Nhập mật khẩu cũ..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mật khẩu:
                        </td>
                         <td>
                            <input id="ND_MATKHAU" type="password" placeholder="Nhập mật khẩu mới..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Xác nhận:
                        </td>
                        <td>
                            <input id="passwordConfirm" type="password" placeholder="Xác nhận mật khẩu..." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="tieude">Thông tin thêm</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ngày sinh:
                        </td>
                        <td>
                            <div id="ND_NGAYSINH" value="<?php echo $info['ND_NGAYSINH'] ?>" ></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Giới tính:
                        </td>
                        <td>
                            <div id="ND_GIOITINH"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tỉnh: <?php echo $info["T_MA"]; 
                                echo $indextinh;
                            ?>
                        </td>
                        <td>
                            <div id="T_MA"></div>
                            <div style="font-family: Verdana; font-size: 13px;" id='selectionlog'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Huyện: <?php echo $info["H_MA"]; 
                                echo $indexhuyen;
                            ?>
                        </td>
                        <td>
                            <div id="H_MA"></div>
                            <div style="font-family: Verdana; font-size: 13px;" id='selectionlog1'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Xã: <?php echo $info["X_MA"]; 
                                echo $indexxa;
                            ?>
                        </td>
                        <td>
                            <div id="X_MA"></div>
                            <div style="font-family: Verdana; font-size: 13px;" id='selectionlog2'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Địa chỉ:
                        </td>
                        <td>
                            <input id="ND_DIACHI" value="<?php echo $info['ND_DIACHI'] ?>" placeholder="Nhập nơi ở hiện tại..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Số điện thoại:
                        </td>
                        <td>
                            <input id="ND_SDT" value="<?php echo $info['ND_SDT'] ?>" placeholder="Nhập số điện thoại..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Facebook:
                        </td>
                        <td>
                            <input id="ND_FACE" value="<?php echo $info['ND_FACE'] ?>" placeholder="Nhập địa chỉ Facebook..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Giới thiệu:
                        </td>
                        <td>
                            <input id="ND_GIOITHIEU" value="<?php echo $info['ND_GIOITHIEU'] ?>" placeholder="Giới thiệu đôi nét về mình..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Điểm:
                        </td>
                        <td>
                            <input id="ND_DIEM" value="<?php echo $info['ND_DIEM'] ?>" readonly="readonly" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Thưởng:
                        </td>
                         <td>
                            <input id="ND_THUONG" value="<?php echo $info['ND_THUONG'] ?>" readonly="readonly" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><br/>
                            <input id="submit" type="button" value="Lưu thông tin" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div></center>
</body>
</html>