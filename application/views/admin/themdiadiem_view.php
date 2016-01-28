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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxloader.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxformattedinput.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtabs.js"></script>

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
            $("#createAccount").jqxExpander({  toggleMode: 'none', width: '600px', showArrow: false });
            // Create jqxInput.
            $("#DD_TEN").jqxInput({  width: '400px', height: '25px' });
            $("#DD_DIACHI").jqxInput({  width: '400px', height: '25px'});
            $("#DD_SDT").jqxInput({  width: '400px', height: '25px' });
            $("#DD_SDT").jqxTooltip({ content: 'Số điện thoại phải có dạng: <b><i>071... | 097...</i></b>', position: 'mouse', name: 'movieTooltip'});
            $("#DD_EMAIL").jqxInput({  width: '400px', height: '25px' });
            $("#DD_EMAIL").jqxTooltip({ content: 'Email phải có dạng: <b><i>ex@gmail.com</i></b>', position: 'mouse', name: 'movieTooltip'});
            $("#DD_WEBSITE").jqxInput({  width: '400px', height: '25px' });
            $("#DD_WEBSITE").jqxTooltip({ content: 'URL phải có dạng: <b><i>ex.com</i></b>', position: 'mouse', name: 'movieTooltip'});
            $("#DD_MOTA").jqxInput({  width: '400px', height: '50px' });
            $("#DD_VITRI").jqxInput({  width: '400px', height: '25px' });
            $("#DD_VITRI").jqxTooltip({ content: '<b><i>Mở bản đồ và di chuyển đến đúng vị trí!</i></b>', position: 'mouse', name: 'movieTooltip'});

            $("#DD_GIOITHIEU").jqxInput({  width: '400px', height: '50px' });
            $("#DD_BATDAU").jqxDateTimeInput({ formatString: 'yyyy-MM-dd hh:mm:ss',  width: '250px', height: '25px' });
            $("#DD_KETTHUC").jqxDateTimeInput({ formatString: 'yyyy-MM-dd hh:mm:ss',  width: '250px', height: '25px' });
            $("#DD_GIATU").jqxFormattedInput({ width: 250, height: 25, radix: "decimal", value: "10000", min: "0", max: "10000000", spinButtons: true });
            $("#DD_GIADEN").jqxFormattedInput({ width: 250, height: 25, radix: "decimal", value: "10000", min: "0", max: "10000000", spinButtons: true });
            $("#DD_NOIDUNG").jqxInput({  width: '400px', height: '50px' });
            // Create jqxButton.
            $("#submit").jqxButton({ template: "primary", height: "30px", width: "150px" });
            // Create jqxValidator.
            $("#form").jqxValidator({
                rules: [
                        {
                            input: "#DD_VITRI", message: "Vui lòng chọn vị trí!", action: 'keyup, blur', rule: 'required'
                        },
                        {
                            input: "#DD_TEN", message: "Tên địa điểm không được rỗng!", action: 'keyup, blur, change', rule: 'required'
                        },
                        {
                            input: "#DD_SDT", message: "SĐT không đúng định dạng! EX: 071... | 098...", action: 'keyup, blur', rule: function (input, commit) {
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
                            input: "#DD_EMAIL", message: "Email không đúng định dạng! EX: e@gmail.com", action: 'keyup, blur', rule: function (input, commit) {
                                var mau = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                                var chuoi = input.val();
                                if(chuoi != "")
                                    return mau.test(input.val());
                                else
                                    return true;
                            }
                        },
                        {
                            input: "#DD_WEBSITE", message: "Website không đúng định dạng! EX: ex.com", action: 'keyup, blur', rule: function (input, commit) {
                                var mau = /(\S+\.[^/\s]+(\/\S+|\/|))/g;
                                var chuoi = input.val();
                                if(chuoi != "")
                                    return mau.test(input.val());
                                else
                                    return true;
                            }
                        },
                        {
                            input: "#DM_MA", message: "Vui lòng chọn danh mục!", action: 'keyup, blur, click, change', rule: function (input, commit) {
                             
                                var chuoi = input.val();
                                //alert(chuoi);
                                if(chuoi != "")
                                    return true;
                                else
                                    return false;
                            }
                        },
                        {
                            input: "#T_MA", message: "Vui lòng chọn tỉnh!", action: 'keyup, blur, click, change', rule: function (input, commit) {
                             
                                var chuoi = input.val();
                                //alert(chuoi);
                                if(chuoi != "")
                                    return true;
                                else
                                    return false;
                            }
                        },
                        {
                            input: "#H_MA", message: "Vui lòng chọn huyện!", action: 'keyup, blur, click, change', rule: function (input, commit) {
                             
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
                    "DD_VITRI" : $("#DD_VITRI").val(),
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
                            //alert(data.msg["email"]);
                            //alert("Thêm thất bại! " + data.msg["error"]);
                            openError(data.msg["error"]);
                        }
                        else
                        {
                            //alert("Thêm thành công!");
                            openSuccess("Thêm thành công!");
                            //alert("Đăng ký thành công! \n" + data.msg["email"]);
                            setTimeout("location.href = '<?php echo site_url('diadiem'); ?>';",1000);
                            //setTimeout("location.href = 'https://mail.google.com/';",500);
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
                $("#DM_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "Chọn loại:", displayMember: "DM_TEN", valueMember: "DM_MA", width: 250, height: 25, dropDownHeight: "150px" });

                var source = [];
                $("#H_MA").jqxDropDownList({  source: source, selectedIndex: -1, width: '250px', height: '25px', promptText: "Chọn huyện...", dropDownHeight: "150px" });
                $("#X_MA").jqxDropDownList({  source: source, selectedIndex: -1, width: '250px', height: '25px', promptText: "Chọn xã...", dropDownHeight: "150px" });

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
                $("#T_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "Chọn tỉnh:", displayMember: "T_TEN", valueMember: "T_MA", width: 250, height: 25, dropDownHeight: "150px" });

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
                    $("#H_MA").jqxDropDownList({ selectedIndex: '-1', source: dataAdapter, placeHolder: "Chọn huyện:", displayMember: "H_TEN", valueMember: "H_MA", width: 250, height: 25, dropDownHeight: "150px" });
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
                    $("#X_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "Chọn Xã:", displayMember: "X_TEN", valueMember: "X_MA", width: 250, height: 25, dropDownHeight: "150px" });
                });

            });
    </script>


    <script type="text/javascript">
        var centreGot = false;
    </script>

    <?php echo $map['js']; ?>

    <script type="text/javascript">
        var basicDemo = (function () {
            //Adding event listeners
            function _addEventListeners() {
                $('#showWindowButton').click(function () {
                    $('#window').jqxWindow('open');
                });
                $('#hideWindowButton').click(function () {
                    $('#window').jqxWindow('close');
                });
            };
            //Creating all page elements which are jqxWidgets
            function _createElements() {
                $('#showWindowButton').jqxButton({ width: '70px' });
                $('#hideWindowButton').jqxButton({ width: '65px' });
            };
            //Creating the demo window
            function _createWindow() {
                var jqxWidget = $('#jqxWidget');
                var offset = jqxWidget.offset();
                $('#window').jqxWindow({
                    position: { x: offset.left + -250, y: offset.top + -450} ,
                    showCollapseButton: true, maxHeight: 1000, maxWidth: 1000, minHeight: 550, minWidth: 750, height: 550, width: 750,
                    initContent: function () {
                        $('#window').jqxWindow('focus');
                    }
                });
                $('#window').jqxWindow('resizable', true);
                $('#window').jqxWindow('draggable', true);
                $("#showWindowButton").jqxButton({ template: "success" , height: 30, width: 90 });
                $("#hideWindowButton").jqxButton({ template: "success" , height: 30, width: 90 });
                $("#lat").jqxInput({placeHolder: "Vĩ độ - Latitude", height: 25, width: 160 });
                $("#lng").jqxInput({placeHolder: "Kinh độ - Longitude", height: 25, width: 160 });
            };
            return {
                config: {
                    dragArea: null
                },
                init: function () {
                    //Creating all jqxWindgets except the window
                    _createElements();
                    //Attaching event listeners
                    _addEventListeners();
                    //Adding jqxWindow
                    _createWindow();
                }
            };
        } ());
        $(document).ready(function () {  
            //Initializing the demo
            basicDemo.init();
        });
        function load()
        {
            $('#window').jqxWindow('close');
        }
    </script>


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
        a{
            text-decoration: none;
            color: #06F;
        }
        a:hover{
            color: #00C;
            
        }
        .div1{
            float: left;
            padding-left: 20px;
        }
        .div2{
            float: left;
            padding-left: 370px;
        }
    </style>
</head>
<body onload="load()"><center>
    <div id="notiSuccess">
        <div id="result">Thông báo thành công!</div>
    </div>
    <div id="notiError">
        <div id="error">Thông báo lỗi!</div>
    </div>
    <div id="createAccount" style="font-family: Verdana; font-size: 13px;">
        <div id="tieude">
            <div class="div1">Thêm địa điểm mới</div>
            <div class="div2">
                <a href="<?php echo base_url(); ?>index.php/home">Trang chủ</a>
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
                        <td align="center" colspan="2">
                            <div id="jqxLoader"></div>
                        </td>
                    </tr>
                     <tr>
                        <td colspan="2">
                            <div class="tieude">Thông tin cơ bản</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tên địa điểm<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input id="DD_TEN" placeholder="Nhập tên địa điểm..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Thuộc loại<b class="batbuoc"> * </b>
                        </td>
                         <td>
                             <div id="DM_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tỉnh/Thành phố<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <div id="T_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Quận/Huyện<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <div id="H_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Xã/Phường/Thị trấn
                        </td>
                         <td>
                            <div id="X_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Đường
                        </td>
                         <td>
                            <input id="DD_DIACHI" placeholder="Nhập tên đường..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Số điện thoại
                        </td>
                         <td>
                            <input id="DD_SDT" placeholder="Nhập số điện thoại..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                         <td>
                            <input id="DD_EMAIL" placeholder="Nhập địa chỉ email..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Website
                        </td>
                         <td>
                            <input id="DD_WEBSITE" placeholder="Nhập địa chỉ website..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mô tả
                        </td>
                         <td>
                            <textarea id="DD_MOTA" placeholder="Nội dụng mô tả..."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Vị trí<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input id="DD_VITRI" placeholder="Nhập vị trí..." readonly="readonly" />


                            <div id="jqxWidget">
                                <div style="float: left;">
                                    <div>
                                        <input type="button" value="Mở bản đồ" id="showWindowButton" />
                                        
                                    </div>
                                </div>
                                <div>
                                    <div id="window">
                                        <div id="windowHeader">
                                            <span>
                                                <img src="<?php echo base_url(); ?>assets/images/mapicon.png" alt="" style="margin-right: 15px" />Map
                                            </span>
                                        </div>
                                        <div style="overflow: hidden;" id="windowContent">
                                            
                                            <?php echo $map['html']; ?>
                                            Lat: <input type="text" id="lat" value="" readonly="readonly" >
                                            Lng: <input type="text" id="lng" value="" readonly="readonly" >
                                            <input type="button" value="Đóng bản đồ" id="hideWindowButton" style="margin-left: 5px" />

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="tieude">Thông tin thêm</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Giới thiệu về địa điểm
                        </td>
                         <td>
                            <textarea id="DD_GIOITHIEU" placeholder="Nội dụng..."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Thời gian bắt đầu
                        </td>
                         <td>
                            <div id="DD_BATDAU"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Thời gian kết thúc
                        </td>
                         <td>
                            <div id="DD_KETTHUC"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Giá từ
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
                            Giá đến
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
                            Chương trình
                        </td>
                         <td>
                            <textarea id="DD_NOIDUNG" placeholder="Nội dụng..."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <input id="submit" type="button" value="Thêm địa điểm" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div></center>
</body>
</html>