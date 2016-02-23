<html>
<head>
        <link type="text/css" rel="Stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" />
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

	<?php echo $map['js']; ?>
    <script type="text/javascript">
		var centreGot = false;

        $(document).ready(function(e){
            $("#lat").jqxInput({  width: '180px', height: '25px' });
            $("#lng").jqxInput({  width: '180px', height: '25px' });
            $("#submit").jqxButton({ template: "success", height: "30px", width: "100px" });
        });

   /*     if (!$marker['visible']) {
            $marker_output .= ',
                visible: false';
        }*/

         /*marker_19.setOptions({
                visible: false;
            });*/

        /* $marker_19['visible'] = false;*/
         // $("#marker_19").visible = false;
        /* $marker['19'].setOptions({
                visible: false;
            });*/

	</script>

    <script type="text/javascript">
     /*$(document).ready(function () {

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
            });*/
    </script>
</head>
<body>
    <form action="<?=site_url('map/mapfromAtoB')?>" method="post">
        <label for="place1">Vị trí bắt đầu: </label><input type="text" name="lat" value="<?php 
            if(isset($lat)) { echo $lat; } ?>" id="lat" readonly="readonly" />
        <label for="place2">Vị trí kết thúc: </label><input type="text" name="lng" value="<?php 
            if(isset($lng)) { echo $lng; } ?>" id="lng" readonly="readonly" />
        <input type="submit" id="submit" name="submit" value="Dẫn đường" />

    </form>

    <!-- <div id="DM_MA"></div>
    <div id="T_MA"></div>
    <div id="H_MA"></div>
    <div id="X_MA"></div> -->

    <table width="100%">
        <tr>
            <td width="100%">
                <?php echo $map['html']; ?>
            </td>
        </tr>
        <tr>
            <td width="100%">
                <div id="directionsDiv"></div>
            </td>
        </tr>
    </table>
</body>
</html>