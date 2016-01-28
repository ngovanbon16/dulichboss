<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <title id='Description'>  
        This sample illustrates the Multi Select feature of jqxComboBox. That feature allows the selection of multiple values from jqxComboBox.
    </title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcombobox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
    
</head>
<body>
    <div id='content'>
        <script type="text/javascript">
            $(document).ready(function () {

                var url = "<?php echo base_url(); ?>index.php/mua/data";
                $.post(url, function(data, status){
                    console.log(status);
                    console.log(data);
                    var a = new Array();
                    for (var i = 0; i < data.length; i++) {
                        //console.log(data[i]['M_TEN']);
                        a[i] = data[i]['M_TEN'];
                    };
                    //var mua = new Array(data);
                    $("#jqxComboBox").jqxComboBox({source: a, multiSelect: true, width: 350, height: 25});

                }, 'json');

                /*$("#jqxComboBox").jqxComboBox('selectItem', 'United States');
                $("#jqxComboBox").jqxComboBox('selectItem', 'Germany');*/

                $("#arrow").jqxButton({  });
                $("#arrow").click(function () {
                    //$("#jqxComboBox").jqxComboBox({ showArrow: false });
                });
                // trigger selection changes.
                $("#jqxComboBox").on('change', function (event) {
                    var items = $("#jqxComboBox").jqxComboBox('getSelectedItems');
                    var selectedItems = "";
                    $.each(items, function (index) {
                        selectedItems += this.label;
                        if (items.length - 1 != index) {
                            selectedItems += ", ";
                        }
                    });
                    $("#log").text(selectedItems);
                });
            });
        </script>
        <span style="font-size: 13px; font-family: Verdana;">Select countries</span>
         <div style="margin-top: 5px;" id='jqxComboBox'>
         </div>
        <input type="button" id="arrow" style="margin-top: 20px;" value="Hide DropDown Button" />
        <div style="margin-top: 10px; font-size: 13px; font-family: Verdana;" id="log"></div>
        <div id="M_MA"></div>
    </div>
</body>
</html>
 -->

 <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta name="keywords" content="jQuery SwitchButton, SwitchButton Widget, jqxSwitchButton" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxswitchbutton.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var label = {
                    'button1': 'New Mail',
                };
            $('#button1').jqxSwitchButton({ height: 27, width: 81,  checked: true });
 
            $('.jqx-switchbutton').on('checked', function (event) {
                $('#events').text(label[event.target.id] + ': Checked');
                //alert($('.jqx-switchbutton').val());
            });
            $('.jqx-switchbutton').on('unchecked', function (event) {
                $('#events').text(label[event.target.id] + ': Unchecked');
            });
        });
    </script>
    <style type="text/css">     
        #settings-panel
        {
            background-color: #fff;
            padding: 20px;
            display: inline-block;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            position: relative;
        }
        .settings-section
        {
            background-color: #f7f7f7;
            height: 45px;
            width: 500px;
            border: 1px solid #b4b7bc;
            border-bottom-width: 0px;
        }
        .settings-section-top
        {
            border-bottom-width: 0px;
            -moz-border-radius-topleft: 10px;
            -webkit-border-top-left-radius: 10px;
            border-top-left-radius: 10px;
            -moz-border-radius-topright: 10px;
            -webkit-border-top-right-radius: 10px;
            border-top-right-radius: 10px;            
        }
        .sections-section-bottom
        {
            border-bottom-width: 1px;
            -moz-border-radius-bottomleft: 10px;
            -webkit-border-bottom-left-radius: 10px;
            border-bottom-left-radius: 10px;
            -moz-border-radius-bottomright: 10px;
            -webkit-border-bottom-right-radius: 10px;
            border-bottom-right-radius: 10px;            
        }
        .sections-top-shadow
        {
            width: 500px;
            height: 1px;
            position: absolute;
            top: 21px;
            left: 21px;
            height: 30px;
            border-top: 1px solid #e4e4e4;
            -moz-border-radius-topleft: 10px;
            -webkit-border-top-left-radius: 10px;
            border-top-left-radius: 10px;
            -moz-border-radius-topright: 10px;
            -webkit-border-top-right-radius: 10px;
            border-top-right-radius: 10px;  
        }
        .settings-label
        {
            font-weight: bold;
            font-family: Sans-Serif;
            font-size: 14px;
            margin-left: 14px;
            margin-top: 15px;
            float: left;
        }
        .settings-melody
        {
            color: #385487;
            font-family: Sans-Serif;
            font-size: 14px;
            display: inline-block;
            margin-top: 7px;
        }
        .settings-setter
        {
            float: right;
            margin-right: 14px;
            margin-top: 8px;
        }
        .events-container
        {
            margin-left: 20px;
        }
        #theme
        {
            margin-left: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class='default'>
        <div class="settings-setter">
            <div id="button1"></div>
        </div>
      

    <div class="events-container">
        <div>Events:</div>
        <div id="events"></div>
    </div>
</body>
</html> -->


<!-- <head>
          <style type='text/css'>
            b{
              text-align: center;
              font-family: georgia;
              color: #727272;
            }
            a{
              text-align: center;
              font-family: georgia;
              color: #727272;
              border-bottom: 1px solid #EEE;
              padding: 5px;
              font-size: x-large;
              margin-top: 50px;
            }
          </style>
        </head>
        <body>
        <b>Chào người dùng mới</b> 
        <br/>
        <a href='".base_url()."index.php/nguoidung/xacnhanemail/".md5($email)."'>Nhấn vào đây để xác nhận</a>
        </body> -->

<html>
<head><?php echo $map['js']; ?></head>
<body>
    <input type="text" id="myPlaceTextBox" /> <br/>
        Lat: <input type="text" id="lat" value="" readonly="readonly" >
        Lng: <input type="text" id="lng" value="" readonly="readonly" >
    <?php echo $map['html']; ?>
</body>
</html>