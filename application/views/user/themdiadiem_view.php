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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxloader.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxformattedinput.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtabs.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnotification.js"></script>

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            $("#DD_GIATU").jqxFormattedInput({ width: '100%', height: 25, radix: "decimal", value: "10000", min: "0", max: "10000000", spinButtons: true });
            $("#DD_GIADEN").jqxFormattedInput({ width: '100%', height: 25, radix: "decimal", value: "10000", min: "0", max: "10000000", spinButtons: true });

            // Create jqxExpander.
            $("#createAccount").jqxExpander({  toggleMode: 'none', width: '100%', showArrow: false });
            // Create jqxInput.
            $("#DD_TEN").jqxInput({  width: '100%', height: '25px' });
            $("#DD_DIACHI").jqxInput({  width: '100%', height: '25px'});
            $("#DD_SDT").jqxInput({  width: '100%', height: '25px' });
            $("#DD_SDT").jqxTooltip({ content: '<?php echo lang('example').' '.lang('about').' '.lang('phone') ?>: <b><i>071... | 097...</i></b>', position: 'mouse', name: 'movieTooltip'});
            $("#DD_EMAIL").jqxInput({  width: '100%', height: '25px' });
            $("#DD_EMAIL").jqxTooltip({ content: '<?php echo lang('example').' '.lang('about').' '.lang('email') ?>: <b><i>ex@gmail.com</i></b>', position: 'mouse', name: 'movieTooltip'});
            $("#DD_WEBSITE").jqxInput({  width: '100%', height: '25px' });
            $("#DD_WEBSITE").jqxTooltip({ content: '<?php echo lang('example').' '.lang('about') ?> URL: <b><i>ex.com</i></b>', position: 'mouse', name: 'movieTooltip'});
            $("#DD_MOTA").jqxInput({  width: '100%', height: '50px' });
            $("#DD_VITRI").jqxInput({  width: '100%', height: '25px' });
            $("#DD_VITRI").jqxTooltip({ content: "<b><i><?php echo lang('open_the_map_and_move_an_icon_to_the_location_you_want'); ?>!</i></b>", position: 'mouse', name: 'movieTooltip'});

            $("#DD_GIOITHIEU").jqxInput({  width: '100%', height: '50px' });
            $("#DD_BATDAU").jqxDateTimeInput({ formatString: 'yyyy-MM-dd HH:mm:ss',  width: '100%', height: '25px' });
            $("#DD_KETTHUC").jqxDateTimeInput({ formatString: 'yyyy-MM-dd HH:mm:ss',  width: '100%', height: '25px' });

            if("<?php echo lang('lang'); ?>" == "en")
            {
                $.getScript('<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/globalization/globalize.culture.en-US.js', function () {
                                $("#DD_BATDAU").jqxDateTimeInput({ culture: 'en-US' });
                                $("#DD_KETTHUC").jqxDateTimeInput({ culture: 'en-US' });
                            });
            }
            else
            {
                $.getScript('<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/globalization/globalize.culture.vi-VI.js', function () {
                                $("#DD_BATDAU").jqxDateTimeInput({ culture: 'vi-VI' });
                                $("#DD_KETTHUC").jqxDateTimeInput({ culture: 'vi-VI' });
                            });
            }

            
            $("#DD_NOIDUNG").jqxInput({  width: '100%', height: '50px' });
            // Create jqxButton.
            $("#submit").jqxButton({ template: "", height: "30px", width: "150px" });
            // Create jqxValidator.
            $("#form").jqxValidator({
                rules: [
                        {
                            input: "#DD_VITRI", message: "<?php echo lang('please_input').' '.lang('map_location') ?>!", action: 'keyup, blur', rule: 'required'
                        },
                        {
                            input: "#DD_TEN", message: "<?php echo lang('please_input').' '.lang('place_name') ?>!", action: 'keyup, blur, change', rule: 'required'
                        },
                        {
                            input: "#DD_SDT", message: "<?php echo lang('phone').' '.lang('is').' '.lang('not').' '.lang('correct') ?>! EX: 071... | 098...", action: 'keyup, blur', rule: function (input, commit) {
                                var mau = /^(01\d{9}|09\d{8})$/;
                                var mau1 = /^(0\d{9}|0\d{10})$/;
                                var chuoi = input.val();
                                if(chuoi != "")
                                {
                                    if(mau.test(input.val()) || mau1.test(input.val()))
                                    {
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                                }
                                else
                                {
                                    return true;
                                }
                                //return mau.test(input.val());
                            }
                        },
                        {
                            input: "#DD_EMAIL", message: "<?php echo lang('email').' '.lang('is').' '.lang('not').' '.lang('correct') ?>! EX: e@gmail.com", action: 'keyup, blur', rule: function (input, commit) {
                                var mau = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                                var chuoi = input.val();
                                if(chuoi != "")
                                    return mau.test(input.val());
                                else
                                    return true;
                            }
                        },
                        {
                            input: "#DD_WEBSITE", message: "URL <?php echo lang('is').' '.lang('not').' '.lang('correct') ?>! EX: ex.com", action: 'keyup, blur', rule: function (input, commit) {
                                var mau = /(\S+\.[^/\s]+(\/\S+|\/|))/g;
                                var chuoi = input.val();
                                if(chuoi != "")
                                    return mau.test(input.val());
                                else
                                    return true;
                            }
                        },
                        {
                            input: "#DM_MA", message: "<?php echo lang('select').' '.lang('business_category') ?>!", action: 'keyup, blur, click, change', rule: function (input, commit) {
                             
                                var chuoi = input.val();
                                //alert(chuoi);
                                if(chuoi != "")
                                    return true;
                                else
                                    return false;
                            }
                        },
                        {
                            input: "#T_MA", message: "<?php echo lang('select').' '.lang('provincial') ?>!", action: 'keyup, blur, click, change', rule: function (input, commit) {
                             
                                var chuoi = input.val();
                                //alert(chuoi);
                                if(chuoi != "")
                                    return true;
                                else
                                    return false;
                            }
                        },
                        {
                            input: "#H_MA", message: "<?php echo lang('select').' '.lang('district') ?>!", action: 'keyup, blur, click, change', rule: function (input, commit) {
                             
                                var chuoi = input.val();
                                //alert(chuoi);
                                if(chuoi != "")
                                    return true;
                                else
                                    return false;
                            }
                        }
                ],  hintType: "label"
            });
            // Validate the Form.
            $("#submit").click(function () {
                $('#form').jqxValidator('validate');
            });
            //$("#jqxLoader").jqxLoader({ width: 100, height: 60, imagePosition: 'top' });
            // Update the jqxExpander's content if the validation is successful.
            $('#form').on('validationSuccess', function (event) {
                //$("#createAccount").jqxExpander('setContent', '<span style="margin: 10px;">Account created.</span>');
                //$('#jqxLoader').jqxLoader('open');
                //$("#submit").hide();
                var vitri = $("#DD_VITRI").val();
                vitri = vitri.replace("(", "");
                vitri = vitri.replace(")", "");
                var url, dta;
                url="<?php echo base_url(); ?>index.php/aediadiem/add?t=" + Math.random();
                dta = {
                    "DD_TEN" : $("#DD_TEN").val(),
                    "DM_MA" : $("#DM_MA").val(),
                    "T_MA" : $("#T_MA").val(),
                    "H_MA" : $("#H_MA").val(),
                    "X_MA" : $("#X_MA").val(),
                    "DD_DIACHI" : $("#DD_DIACHI").val(),
                    "DD_SDT" : $("#DD_SDT").val(),
                    "DD_EMAIL" : $("#DD_EMAIL").val(),
                    "DD_WEBSITE" : $("#DD_WEBSITE").val(),
                    "DD_MOTA" : $("#DD_MOTA").val(),
                    "DD_VITRI" : vitri,
                    "DD_GIOITHIEU" : $("#DD_GIOITHIEU").val(),
                    "DD_BATDAU" : $("#DD_BATDAU").val(),
                    "DD_KETTHUC" : $("#DD_KETTHUC").val(),
                    "DD_GIATU" : $("#DD_GIATU").val(),
                    "DD_GIADEN" : $("#DD_GIADEN").val(),
                    "DD_NOIDUNG" : $("#DD_NOIDUNG").val()
                };
                console.log(dta);
                $.post(url, dta, function(data, status){

                    console.log(status);
                    console.log(data);
                    if(status == "success")
                    {  
                        if(data.status == "error")
                        {
                            thongbao("", data.msg["error"], "danger");
                        }
                        else
                        {
                            thongbao("", "<?php echo lang('inserted_successfully') ?>", "success");
                            setTimeout("location.href = '<?php echo site_url(''); ?>';",2000);
                        }
                    }
                    //$("#submit").show();
                    //$('#jqxLoader').jqxLoader('close');
                }, 'json');


            });
        });
        
    </script>

    <style type="text/css">
        #DD_TEN{
            text-transform: capitalize;
        }
    </style>

     <script type="text/javascript">
     $(document).ready(function () {

                var url = "<?php echo base_url(); ?>index.php/danhmuc/data";
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'DM_MA' },
                        { name: 'DM_TEN' }
                    ],
                    url: url,
                    async: true
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#DM_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('business_category') ?>:", displayMember: "DM_TEN", valueMember: "DM_MA", width: '100%', height: 25, dropDownHeight: "150px" });

                var source = [];
                $("#H_MA").jqxDropDownList({  source: source, selectedIndex: -1, width: '100%', height: '25px', promptText: "<?php echo lang('select').' '.lang('district') ?>...", dropDownHeight: "150px" });
                $("#X_MA").jqxDropDownList({  source: source, selectedIndex: -1, width: '100%', height: '25px', promptText: "<?php echo lang('select').' '.lang('town') ?>...", dropDownHeight: "150px" });

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
                $("#T_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('provincial') ?>:", displayMember: "T_TEN", valueMember: "T_MA", width: '100%', height: 25, dropDownHeight: "150px" });

                $("#T_MA").on('select', function (event) {
                    var matinh = $("#T_MA").val();
                    //alert(matinh);
                    var url = "<?php echo base_url(); ?>index.php/huyen/data/" + $("#T_MA").val();
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
                    $("#H_MA").jqxDropDownList({ selectedIndex: '-1', source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('district') ?>:", displayMember: "H_TEN", valueMember: "H_MA", width: '100%', height: 25, dropDownHeight: "150px" });
                });

                $("#H_MA").on('select', function (event) {
                    var mahuyen = $("#H_MA").val();
                    //alert(mahuyen);
                     var url = "<?php echo base_url(); ?>index.php/xa/data/" + $("#T_MA").val() + "/" + $("#H_MA").val();
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
                    $("#X_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('town') ?>:", displayMember: "X_TEN", valueMember: "X_MA", width: '100%', height: 25, dropDownHeight: "150px" });
                });


                $("#showWindowButton").jqxButton({ template: "success" , height: 30 });
                $("#lat").jqxInput({placeHolder: "<?php echo lang('latitude') ?>", height: 25, width: '40%' });
                $("#lng").jqxInput({placeHolder: "<?php echo lang('longitude') ?>", height: 25, width: '40%' });
                $("#myPlaceTextBox").jqxInput({placeHolder: "<?php echo lang('enter_the_name_of_the_location_you_want_to_select') ?>...", height: 30, width: "100%" });
                $("#showWindowButton").click(function(){
                    $("#myPlaceTextBox").focus();
                });
            });
    </script>


    <script type="text/javascript">
        var centreGot = false;
    </script>

    <?php echo $map['js']; ?>

    <style type="text/css">
        #firstName{
            text-transform: capitalize;
        }
        #lastName{
            text-transform: capitalize;
        }
        .batbuoc{
            color: #F00;
        }
        .tieude{
            color: #111;
            text-transform: capitalize;
            font-size: 13px;
            font-weight: bold;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 5px;
            border-radius: 2px;

            box-shadow:0 4px 4px -4px rgba(0,0,0,4);
            -moz-box-shadow:0 4px 4px -4px rgba(0,0,0,4);
            -webkit-box-shadow:0 4px 4px -4px rgba(0,0,0,4);
            -o-box-shadow:0 4px 4px -4px rgba(0,0,0,4);
            text-shadow: 0px 2px 3px #666;
        }
        a{
            text-decoration: none;
            color: #06F;
        }
        a:hover{
            color: #00C;
            
        }
        .div1{
            margin-left: 28px;
            width: 250px;
            float: left;
            text-align: left;
        }
        .div2{
            width: 230px;
            float: right;
            text-align: right;
        }
        body{
            background-color: #F8F8FF;
        }
    </style>
</head>
<body>
<section>
    
    <div class="container">
    <div id="createAccount" style="font-family: Verdana; font-size: 13px; float: left; width: 100%; max-width: 550px;">
        <div id="tieude">
            <div class="div1"><?php echo lang('add_new_place') ?></div>
        </div>
        <div align="left" style="font-family: Verdana; font-size: 13px;">
            <form id="form" style="overflow: hidden; margin: 10px;" action="./">
                <table width="99%">
                    <tr>
                        <td align="center" colspan="2">
                            <div id="jqxLoader"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <div id="jqxLoader"></div>
                        </td>
                    </tr>
                     <tr>
                        <td colspan="2">
                            <div class="tieude"><?php echo lang('basic_information') ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">
                            <?php echo lang('place_name') ?><b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input id="DD_TEN" placeholder="<?php echo lang('input').' '.lang('place_name') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('business_category') ?><b class="batbuoc"> * </b>
                        </td>
                         <td>
                             <div id="DM_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('provincial') ?><b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <div id="T_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('district') ?><b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <div id="H_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('town') ?>
                        </td>
                         <td>
                            <div id="X_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('address') ?>
                        </td>
                         <td>
                            <input id="DD_DIACHI" placeholder="<?php echo lang('input').' '.lang('address') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('phone') ?>
                        </td>
                         <td>
                            <input id="DD_SDT" placeholder="<?php echo lang('input').' '.lang('phone') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                         <td>
                            <input id="DD_EMAIL" placeholder="<?php echo lang('input').' '.lang('email') ?>..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Website
                        </td>
                         <td>
                            <input id="DD_WEBSITE" placeholder="<?php echo lang('input') ?> website..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('description') ?>
                        </td>
                         <td>
                            <textarea id="DD_MOTA" placeholder="<?php echo lang('input').' '.lang('description') ?>..."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('map_location') ?><b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input id="DD_VITRI" placeholder="<?php echo lang('input').' '.lang('map_location') ?>..." readonly="readonly" />
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>
                            <div id="jqxWidget">
                                <div style="float: left;">
                                    <div>
                                        <a href="#name">
                                            <input type="button" value="<?php echo lang('update_map_location') ?>" id="showWindowButton" />
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="tieude"><?php echo lang('other_information') ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('introduce') ?>
                        </td>
                         <td>
                            <textarea id="DD_GIOITHIEU" placeholder="<?php echo lang('input').' '.lang('introduce') ?>..."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('open_time') ?>
                        </td>
                         <td>
                            <div id="DD_BATDAU"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('close_time') ?>
                        </td>
                         <td>
                            <div id="DD_KETTHUC"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('min_price') ?>
                        </td>
                         <td>
                            <div id="DD_GIATU">
                                <input type="text" />
                                <div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('max_price') ?>
                        </td>
                         <td>
                             <div id="DD_GIADEN">
                                <input type="text" />
                                <div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang('content') ?>
                        </td>
                         <td>
                            <textarea id="DD_NOIDUNG" placeholder="<?php echo lang('input').' '.lang('content') ?>..."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <input style="margin-top: 20px;" id="submit" type="button" value="<?php echo lang('add_new_place') ?>" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div align="left" style="margin-left: 0px; float: left; width: 100%; max-width: 580px;">
        <a name="name"></a>
        <img src="<?php echo base_url(); ?>assets/images/mapicon.png" alt="" style="margin-right: 15px" /><?php echo lang('map') ?>
        <div align="center">
            <input type="text" id="myPlaceTextBox" />
            <?php echo $map['html']; ?>
            <?php echo lang('latitude') ?>: <input type="text" id="lat" value="" readonly="readonly" >  
            <?php echo lang('longitude') ?>: <input type="text" id="lng" value="" readonly="readonly" >
        </div>
    </div>
</div></section>
</body>
</html>