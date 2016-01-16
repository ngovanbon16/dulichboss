<!DOCTYPE html>
<html lang="en">
<head>
    <title id='Description'>In this demo the jqxInput is bound to JSON data.</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxinput.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
</head>
<body>
    <div id='content'>
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
                $("#jqxInput").jqxInput({ source: dataAdapter, placeHolder: "Tên tỉnh:", displayMember: "T_TEN", valueMember: "T_MA", width: 200, height: 25});
                
                /*$("#jqxInput").jqxDropDownList({
                    selectedIndex: 2, source: dataAdapter, displayMember: "T_MA", valueMember: "T_TEN", width: 200, height: 25
                });*/

                $("#jqxInput").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Value: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Label: " + item.label);
                            $("#selectionlog").children().remove();
                            $("#selectionlog").append(labelelement);
                            $("#selectionlog").append(valueelement);

                            //alert(item.value);
                            var url1 = "<?php echo base_url(); ?>index.php/huyen/data/"+item.value;
                            // prepare the data
                            var source =
                            {
                                datatype: "json",
                                datafields: [
                                    { name: 'H_MA' },
                                    { name: 'H_TEN' }
                                ],
                                url: url1,
                                async: true
                            };
                            console.log(source);
                            var dataAdapter = new $.jqx.dataAdapter(source);
                            // Create a jqxInput
                            $("#jqxInput1").jqxInput({ source: dataAdapter, placeHolder: "Tên huyện:", displayMember: "H_TEN", valueMember: "H_MA", width: 200, height: 25});
                            
                            /*$("#jqxInput").jqxDropDownList({
                                selectedIndex: 2, source: dataAdapter, displayMember: "T_MA", valueMember: "T_TEN", width: 200, height: 25
                            });*/

                            $("#jqxInput1").on('select', function (event) {
                                if (event.args) {
                                    var item = event.args.item;
                                    if (item) {
                                        var valueelement = $("<div></div>");
                                        valueelement.text("Value: " + item.value);
                                        var labelelement = $("<div></div>");
                                        labelelement.text("Label: " + item.label);
                                        $("#selectionlog1").children().remove();
                                        $("#selectionlog1").append(labelelement);
                                        $("#selectionlog1").append(valueelement);
                                    }
                                }
                            });


                        }
                    }
                });
            });
        </script>
        <input id="jqxInput" />
        <br />
        <label style="font-family: Verdana; font-size: 10px;">ex: Ana</label>
         <div style="font-family: Verdana; font-size: 13px;" id='selectionlog'>
        </div>

        </script>
        <input id="jqxInput1" />
        <br />
        <label style="font-family: Verdana; font-size: 10px;">ex: Ana</label>
         <div style="font-family: Verdana; font-size: 13px;" id='selectionlog1'>
        </div>
  </div>
</body>
</html>