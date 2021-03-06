<!DOCTYPE html>
<html lang="en">
<head>
    <title id="Description"><?php echo $title ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.ico" type="image/x-icon" />
    
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

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";
            
            // Create jqxExpander.
            $("#createAccount").jqxExpander({  toggleMode: 'none', width: '100%', showArrow: false });
            // Create jqxInput.
            $("#ND_MA").jqxInput({  width: '100%', height: '25px' });

            $("#ND_HO").jqxInput({  width: '100%', height: '25px' });
            $("#ND_TEN").jqxInput({  width: '100%', height: '25px'});
            $("#ND_DIACHIMAIL").jqxInput({  width: '100%', height: '25px' });
            // Create jqxPasswordInput.
            $("#passwordold").jqxPasswordInput({  width: '100%', height: '25px', showStrength: true, showStrengthPosition: "right" });
            $("#ND_MATKHAU").jqxPasswordInput({  width: '100%', height: '25px', showStrength: true, showStrengthPosition: "right" });
            $("#passwordConfirm").jqxPasswordInput({  width: '100%', height: '25px' });
            // Create jqxDateTimeInpput.
            $("#ND_NGAYSINH").jqxDateTimeInput({ formatString: 'yyyy-MM-dd',  width: '100%', height: '25px' });

            if("<?php echo lang('lang'); ?>" == "en")
            {
                $.getScript('<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/globalization/globalize.culture.en-US.js', function () {
                                $("#ND_NGAYSINH").jqxDateTimeInput({ culture: 'en-US', width: '100%' });
                            });
            }
            else
            {
                $.getScript('<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/globalization/globalize.culture.vi-VI.js', function () {
                                $("#ND_NGAYSINH").jqxDateTimeInput({ culture: 'vi-VI', width: '100%' });
                            });
            }

            // Create jqxDropDownList.
            var genders = ["<?php echo lang('female') ?>", "<?php echo lang('male') ?>"];
            $("#ND_GIOITINH").jqxDropDownList({  source: genders, selectedIndex: <?php echo $info['ND_GIOITINH'] ?>, width: '100%', height: '25px', promptText: "<?php echo lang('i_am') ?>...", dropDownHeight: "50px" });
            
            $("#ND_DIACHI").jqxInput({  width: '100%', height: '25px' });
            $("#ND_SDT").jqxInput({  width: '100%', height: '25px' });
            $("#ND_FACE").jqxInput({  width: '100%', height: '25px' });
            $("#ND_GIOITHIEU").jqxInput({  width: '100%', height: '25px' });
            // Create jqxButton.
            $("#submit").jqxButton({ template: "", height: "30px", width: "150px" });
            // Create jqxValidator.
            $("#form").jqxValidator({
                rules: [
                        {
                            input: "#ND_HO", message: "<?php echo lang('please_input').' '.lang('lastname') ?>!", action: 'keyup, blur', rule: function (input, commit) {
                                return input.val() != "" && input.val() != "First";
                            }
                        },
                        {
                            input: "#ND_TEN", message: "<?php echo lang('please_input').' '.lang('firstname') ?>!", action: 'keyup, blur', rule: function (input, commit) {
                                return input.val() != "" && input.val() != "Last";
                            }
                        },
                        { input: "#ND_DIACHIMAIL", message: "<?php echo lang('please_input').' '.lang('email') ?>!", action: 'keyup, blur', rule: 'required' },
                        { input: "#ND_MATKHAU", message: "<?php echo lang('password').' '.lang('must').' '.lang('have').' 6 - 12 '.lang('characters'); ?>!", action: 'keyup, blur',
                            rule: function (input, commit) {
                                if(input.val() != "")
                                {
                                    return input.val().length > 5;
                                }
                                else
                                {
                                    return true;
                                }
                            }
                        },
                        { input: "#passwordConfirm", message: "<?php echo lang('please_input').' '.lang('password') ?>!", action: 'keyup, blur' },
                        {
                            input: "#passwordConfirm", message: "<?php echo lang('confirm_new_password_does_not_match') ?>!", action: 'keyup, blur', rule: function (input, commit) {
                                var firstPassword = $("#ND_MATKHAU").jqxPasswordInput('val');
                                var secondPassword = $("#passwordConfirm").jqxPasswordInput('val');
                                return firstPassword == secondPassword;
                            }
                        },
                        {
                            input: "#ND_GIOITINH", message: "<?php echo lang('please_input').' '.lang('gender') ?>!", action: 'blur', rule: function (input, commit) {
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
                url="<?php echo base_url(); ?>index.php/user/update?t=" + Math.random();
                dta = {
                    "ND_MA" : $("#ND_MA").val(),
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
                    "ND_GIOITHIEU" : $("#ND_GIOITHIEU").val()
                };
                console.log(dta);
                $.post(url, dta, function(data, status){

                    console.log(status);
                    console.log(data);
                    if(status == "success")
                    {  
                        if(data.status == "error")
                        {
                            thongbao("", data.msg["matkhau"], "danger");
                        }
                        else
                        {
                            thongbao("", "<?php echo lang('updated_successfully'); ?> "+data.password+"", "success");
                            setTimeout("location.href = '<?php echo site_url('user/account'); ?>';",2000);
                        }
                    }
                }, 'json');


            });
        });
    </script>

    <script type="text/javascript">
     $(document).ready(function () {

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
                $("#T_MA").jqxDropDownList({ selectedIndex: <?php echo $indextinh; ?>, source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('provincial') ?>:", displayMember: "T_TEN", valueMember: "T_MA", width: '100%', height: 25});

                $("#T_MA").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Mã tỉnh: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Tên tỉnh: " + item.label);
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
                    $("#H_MA").jqxDropDownList({ selectedIndex: <?php echo $indexhuyen; ?>, source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('district') ?>:", displayMember: "H_TEN", valueMember: "H_MA", width: '100%', height: 25});


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
                    $("#X_MA").jqxDropDownList({ selectedIndex: <?php echo $indexxa; ?>, source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('town') ?>:", displayMember: "X_TEN", valueMember: "X_MA", width: '100%', height: 25});
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
                $("#H_MA").jqxDropDownList({ selectedIndex: <?php echo $indexhuyen; ?>, source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('district') ?>:", displayMember: "H_TEN", valueMember: "H_MA", width: '100%', height: 25});

                $("#H_MA").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Mã huyện: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Tên huyện: " + item.label);
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
                    $("#X_MA").jqxDropDownList({ selectedIndex: <?php echo $indexxa; ?>, source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('town') ?>:", displayMember: "X_TEN", valueMember: "X_MA", width: '100%', height: 25});
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
                $("#X_MA").jqxDropDownList({ selectedIndex: <?php echo $indexxa; ?>, source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('town') ?>:", displayMember: "X_TEN", valueMember: "X_MA", width: '100%', height: 25});
            });
    </script>

    <style type="text/css">
        .tieude{
            color: #111;
            text-transform: capitalize;
            font-size: 13px;
            font-weight: bold;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 5px;
            border-radius: 2px;

            box-shadow: 0  4px 4px -4px rgba(30,144,255,255);
            -moz-box-shadow: 0  4px 4px -4px rgba(30,144,255,255);
            -webkit-box-shadow: 0  4px 4px -4px rgba(30,144,255,255);
            -o-box-shadow: 0  4px 4px -4px rgba(30,144,255,255);
            text-shadow: 0px 2px 3px #666;
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
            margin-left: 22px;
            width: 180px;
            float: left;
            text-align: left;
        }
        .div2{
            width: 258px;
            float: right;
            text-align: right;
        }
        /*#submit{
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
        }*/
        body{
            background-color: #F8F8FF;
        }
    </style>

</head>
<body>
    <section class="service-item">
       <div class="container">
    <center>
    <div style="max-width: 550px;" id="createAccount" style="font-family: Verdana; font-size: 13px;">
        <div>
            <div class="div1"><?php echo lang('edit').' '.lang('profile') ?></div>
        </div>
        <div style="font-family: Verdana; font-size: 13px;">
            <form id="form" style="overflow: hidden; margin: 10px;" action="./">
                <?php //echo print_r($info); ?>
                <table width="98%">
                    <tr>
                        <td colspan="2">
                            <div class="tieude"><?php echo lang('basic_information') ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">
                            <?php echo lang('key') ?>:
                        </td>
                        <td>
                            <input id="ND_MA" value="<?php echo $info['ND_MA'] ?>" readonly="readonly" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('lastname') ?>:<b class="batbuoc"> * </b>
                        </td>
                        <td>
                            <input id="ND_HO" value="<?php echo $info['ND_HO'] ?>" placeholder="<?php echo lang('input').' '.lang('lastname') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('firstname') ?>:<b class="batbuoc"> * </b>
                        </td>
                        <td>
                            <input id="ND_TEN" value="<?php echo $info['ND_TEN'] ?>" placeholder="<?php echo lang('input').' '.lang('firstname') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('email') ?>:<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input type="email" id="ND_DIACHIMAIL" value="<?php echo $info['ND_DIACHIMAIL'] ?>" readonly="readonly" placeholder="<?php echo lang('input').' '.lang('email') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="tieude"><?php echo lang('change').' '.lang('password') ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('password').' '.lang('current') ?>:<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input id="passwordold" type="password" title="" placeholder="<?php echo lang('input').' '.lang('password').' '.lang('current') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('password').' '.lang('new')  ?>:
                        </td>
                         <td>
                            <input id="ND_MATKHAU" type="password" placeholder="<?php echo lang('input').' '.lang('password').' '.lang('new') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('enter').' '.lang('password').' '.lang('new') ?>:
                        </td>
                        <td>
                            <input id="passwordConfirm" type="password" placeholder="<?php echo lang('input').' '.lang('password').' '.lang('new') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="tieude"><?php echo lang('contact_information') ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('birthday') ?>:
                        </td>
                        <td>
                            <div id="ND_NGAYSINH" value="<?php echo $info['ND_NGAYSINH'] ?>" ></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('gender') ?>:
                        </td>
                        <td>
                            <div id="ND_GIOITINH"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('provincial') ?>: <?php 
                                // echo $info["T_MA"]; 
                                // echo $indextinh;
                            ?>
                        </td>
                        <td>
                            <div id="T_MA"></div>
                            <div style="font-family: Verdana; font-size: 13px;" id='selectionlog'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('district') ?>: <?php 
                                // echo $info["H_MA"]; 
                                // echo $indexhuyen;
                            ?>
                        </td>
                        <td>
                            <div id="H_MA"></div>
                            <div style="font-family: Verdana; font-size: 13px;" id='selectionlog1'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('town') ?>: <?php 
                                // echo $info["X_MA"]; 
                                // echo $indexxa;
                            ?>
                        </td>
                        <td>
                            <div id="X_MA"></div>
                            <div style="font-family: Verdana; font-size: 13px;" id='selectionlog2'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('street_address') ?>:
                        </td>
                        <td>
                            <input id="ND_DIACHI" value="<?php echo $info['ND_DIACHI'] ?>" placeholder="<?php echo lang('input').' '.lang('street_address') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('phone') ?>:
                        </td>
                        <td>
                            <input id="ND_SDT" value="<?php echo $info['ND_SDT'] ?>" placeholder="<?php echo lang('input').' '.lang('phone') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Facebook:
                        </td>
                        <td>
                            <input id="ND_FACE" value="<?php echo $info['ND_FACE'] ?>" placeholder="<?php echo lang('input').' '.'Facebook' ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('about_me') ?>:
                        </td>
                        <td>
                            <input id="ND_GIOITHIEU" value="<?php echo $info['ND_GIOITHIEU'] ?>" placeholder="<?php echo lang('input').' '.lang('about_me') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><br/>
                            <input id="submit" type="button" value="<?php echo lang('save') ?>" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div></center>

    </div></section>
</body>
</html>