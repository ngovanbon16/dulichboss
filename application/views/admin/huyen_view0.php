<!DOCTYPE html>
<html lang="en">
<head>
    <title id='Description'>This example shows how to implement Master-Details binding scenario with two Grids.</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.columnsresize.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
                var url = "<?php echo base_url(); ?>index.php/tinh/data";
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'T_MA', type: 'int' },
                        { name: 'T_TEN', type: 'string' }
                    ],
                    id: 'T_MA',
                    url: url,
                    pager: function (pagenum, pagesize, oldpagenum) {
                        // callback called when a page or page size is changed.
                    }
                };

            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#customersGrid").jqxGrid(
            {
                width: 850,
                height: 250,
                source: dataAdapter,
                
                keyboardnavigation: false,
                columns: [
                    { text: 'Mã tỉnh', datafield: 'T_MA', width: 250 },
                    { text: 'Tên tỉnh', datafield: 'T_TEN', width: 150 }
                ]
            });
            // Orders Grid
            // prepare the data
            var dataFields = [
                        { name: 'T_MA', type: 'int' },
                        { name: 'H_MA', type: 'int' },
                        { name: 'H_TEN', type: 'string' }
                    ];
            var url = "<?php echo base_url(); ?>index.php/huyen/data1";
            var source =
            {
                datafields: dataFields,
                    datatype: "json",
                    /*datafields: [
                        { name: 'T_MA', type: 'int' },
                        { name: 'H_MA', type: 'int' },
                        { name: 'H_TEN', type: 'string' }
                    ],*/
                    /*id: 'H_MA',*/
                    url: url,
                    pager: function (pagenum, pagesize, oldpagenum) {
                        // callback called when a page or page size is changed.
                    }
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            dataAdapter.dataBind();
            $("#customersGrid").on('rowselect', function (event) {
                var customerID = event.args.row.T_MA;
                var records = new Array();
                var length = dataAdapter.records.length;
                for (var i = 0; i < length; i++) {
                    var record = dataAdapter.records[i];
                    if (record.T_MA == customerID) {
                        records[records.length] = record;
                    }
                }
                var dataSource = {
                    datafields: dataFields,
                    localdata: records
                }
                var adapter = new $.jqx.dataAdapter(dataSource);
        
                // update data source.
                $("#ordersGrid").jqxGrid({ source: adapter });
            });
            $("#ordersGrid").jqxGrid(
            {
                width: 850,
                height: 250,
                keyboardnavigation: false,
                columns: [
                    { text: 'Mã tỉnh', datafield: 'T_MA', width: 100 },
                    { text: 'Mã huyện', datafield: 'H_MA', width: 150 },
                    { text: 'Tên huyện', datafield: 'H_TEN', width: 150 }
                ]
            });
            $("#customersGrid").jqxGrid('selectrow', 0);
        });
    </script>
</head>
<body class='default'>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <h3>
            Customers</h3>
        <div id="customersGrid">
        </div>
        <h3>
            Orders by Customer</h3>
        <div id="ordersGrid">
        </div>
    </div>
</body>
</html>