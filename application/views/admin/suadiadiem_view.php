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

    <script type="text/javascript">
        $(document).ready(function () {
            // Create jqxExpander.
            $("#createAccount").jqxExpander({  toggleMode: 'none', width: '600px', showArrow: false });
            // Create jqxInput.
            $("#DD_TEN").jqxInput({  width: '400px', height: '25px' });
            $("#DD_DIACHI").jqxInput({  width: '400px', height: '25px'});
            $("#DD_SDT").jqxInput({  width: '400px', height: '25px' });
            $("#DD_EMAIL").jqxInput({  width: '400px', height: '25px' });
            $("#DD_WEBSITE").jqxInput({  width: '400px', height: '25px' });
            $("#DD_MOTA").jqxInput({  width: '400px', height: '50px' });
            $("#DD_VITRI").jqxInput({  width: '400px', height: '25px' });

            $("#DD_GIOITHIEU").jqxInput({  width: '400px', height: '50px' });
            $("#DD_BATDAU").jqxDateTimeInput({ formatString: 'yyyy-MM-dd',  width: '250px', height: '25px' });
            $("#DD_KETTHUC").jqxDateTimeInput({ formatString: 'yyyy-MM-dd',  width: '250px', height: '25px' });
            $("#DD_GIATU").jqxFormattedInput({ width: 250, height: 25, radix: "decimal", value: "<?php echo $info['DD_GIATU']; ?>", min: "0", max: "10000000", spinButtons: true });
             $("#DD_GIADEN").jqxFormattedInput({ width: 250, height: 25, radix: "decimal", value: "<?php echo $info['DD_GIADEN']; ?>", min: "0", max: "10000000", spinButtons: true });
            $("#DD_NOIDUNG").jqxInput({  width: '400px', height: '50px' });
            // Create jqxButton.
            $("#submit").jqxButton({ template: "primary", height: "30px", width: "150px" });
            $("#btntrangchu").jqxButton({ template: "info", height: "28px", width: "90px" });
            // Create jqxValidator.
            $("#form").jqxValidator({
                rules: [
                        {
                            input: "#DD_TEN", message: "Tên địa điểm không được rỗng!", action: 'keyup, blur', rule: 'required'
                        },
                        {
                            input: "#DD_EMAIL", message: "Địa chỉ email không đúng! EX: e@gmail.com", action: 'keyup, blur', rule: 'email'
                        },
                        {
                            input: "#DD_SDT", message: "Số điện thoại không đúng! EX: 090...", action: 'keyup, blur', rule: 'number'
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
                //$('#jqxLoader').jqxLoader('open');
                //$("#submit").hide();
                var url, dta;
                url="<?php echo base_url(); ?>index.php/aediadiem/update?t=" + Math.random();
                dta = {
                    "DD_MA" : $("#DD_MA").val(),
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
                            alert("Sửa thất bại! " + data.msg["error"]);
                        }
                        else
                        {
                            alert("Sửa thành công!");
                            //alert("Đăng ký thành công! \n" + data.msg["email"]);
                            //setTimeout("location.href = '<?php echo site_url('login'); ?>';",500);
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
                $("#DM_MA").jqxDropDownList({ selectedIndex: "<?php echo $indexdanhmuc; ?>", source: dataAdapter, placeHolder: "Chọn loại:", displayMember: "DM_TEN", valueMember: "DM_MA", width: 250, height: 25, dropDownHeight: "150px" });

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
            text-align: center;
            text-transform: capitalize;
            font-size: 18px;
            background-color: #eee;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 5px;
        }
    </style>
</head>
<body onload="load()"><center>
    <div id="createAccount" style="font-family: Verdana; font-size: 13px;">
        <div id="tieude">
            Thêm địa điểm mới 
             <a href="<?php echo base_url(); ?>index.php/home"><button id="btntrangchu">Trang chủ</button></a>
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
                            Mã địa điểm<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input id="DD_MA" value="<?php echo $info['DD_MA']; ?>" readonly="readonly" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tên địa điểm<b class="batbuoc"> * </b>
                        </td>
                         <td>
                            <input id="DD_TEN" value="<?php echo $info['DD_TEN']; ?>" placeholder="Nhập tên địa điểm..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Thuộc loại
                        </td>
                         <td>
                             <div id="DM_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tỉnh/Thành phố
                        </td>
                         <td>
                            <div id="T_MA"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Quận/Huyện
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
                            <input id="DD_DIACHI"  value="<?php echo $info['DD_DIACHI']; ?>" placeholder="Nhập tên đường..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Số điện thoại
                        </td>
                         <td>
                            <input id="DD_SDT" value="<?php echo $info['DD_SDT']; ?>" placeholder="Nhập số điện thoại..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                         <td>
                            <input id="DD_EMAIL" value="<?php echo $info['DD_EMAIL']; ?>" placeholder="Nhập địa chỉ email..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Website
                        </td>
                         <td>
                            <input id="DD_WEBSITE" value="<?php echo $info['DD_WEBSITE']; ?>" placeholder="Nhập địa chỉ website..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mô tả
                        </td>
                         <td>
                            <textarea id="DD_MOTA" placeholder="Nội dụng mô tả..."><?php echo $info['DD_MOTA']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Vị trí
                        </td>
                         <td>
                            <input id="DD_VITRI" value="<?php echo $info['DD_VITRI']; ?>" placeholder="Nhập vị trí..." />
                        

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
                            <textarea id="DD_GIOITHIEU" placeholder="Nội dụng..."><?php echo $info['DD_GIOITHIEU']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Thời gian bắt đầu
                        </td>
                         <td>
                            <div id="DD_BATDAU" value="<?php echo $info['DD_BATDAU']; ?>"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Thời gian kết thúc
                        </td>
                         <td>
                            <div id="DD_KETTHUC" value="<?php echo $info['DD_KETTHUC']; ?>"></div>
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
                            <textarea id="DD_NOIDUNG" placeholder="Nội dụng..."><?php echo $info['DD_NOIDUNG']; ?></textarea>
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