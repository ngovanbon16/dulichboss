<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.columnsresize.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxinput.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtooltip.js"></script> 

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxgrid.edit.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxwindow.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnumberinput.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">

    </script><link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.metro.css" media="screen">

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcheckbox.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/demos/jqxgrid/localization.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";
            var theme = 'bootstrap';

            var data = {};
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'DM_MA', type: 'int' },
                     { name: 'DM_TEN', type: 'string' },
                     { name: 'DM_HINH', type: 'string' }
                ],
                id: 'DM_MA',
                url: '<?php echo base_url(); ?>index.php/danhmuc/data0',
                filter: function () {
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata');
                },
                sort: function () {
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata');
                },
                root: 'Rows',
                beforeprocessing: function (data) {
                    source.totalrecords = data[0].TotalRows;
                },
                addRow: function (rowID, rowData, position, commit) {
                    url = "<?php echo base_url(); ?>index.php/danhmuc/add";

                    var reg = /^\d+$/;
                    if(!reg.test(rowID))
                    {
                        openError("<?php echo lang('code_must_be_a_positive_integer') ?>");
                        return;
                    }
                    
                    rowData.DM_MA = rowID; 
                    console.log(rowData);

                    $.post(url, rowData, function(data, status){
                        console.log(status);
                        console.log(data);
                        /*console.log(data.data);*/
                        if(status == "success")
                        {
                            if(data.status == "error")
                            {
                                commit(false);
                                var error = data.msg["error"];
                                if(error  == "tt")
                                {
                                    openError("<?php echo lang('name_not_be_repeated') ?>");
                                }
                                if(error == "tm")
                                {
                                    openError(data.data["DM_MA"]+" - <?php echo lang('code_already_exists') ?>");
                                }
                            }
                            else
                            {
                                commit(true);
                                openSuccess("<?php echo lang('inserted_successfully') ?>");
                            }
                        }
                    }, 'json');
                },
                updaterow: function (rowid, rowdata, commit) {
                    // synchronize with the server - send update command
                    var data = "update=true&DM_TEN=" + rowdata.DM_TEN;
                    data = data + "&DM_MA=" + rowdata.DM_MA;
                    console.log(data);
                    $.ajax({
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>index.php/danhmuc/data0',
                        data: data,
                        success: function (data, status, xhr) {
                            // update command is executed.
                            console.log(data);
                            if(data)
                            {
                                commit(true);
                                openSuccess("<?php echo lang('updated_successfully') ?>");
                            }
                            else
                            {
                                commit(false);
                                openError("<?php echo lang('name_not_be_repeated') ?>");
                            }
                        },
                        error: function () {
                            console.log("Lỗi không xác định!");
                            commit(false);
                        }
                    });
                },
                deleterow: function (rowid, commit) {
                        var dta, url, test;
                        url = "<?php echo base_url(); ?>index.php/danhmuc/delete";
                        dta = {
                            "ma" : rowid
                        };
                        console.log(dta);
                        $.post(url, dta, function(data, status){

                            console.log(status);
                            console.log(data);
                            //console.log(data);
                            if(status == "success")
                            {   
                                //alert(data.status);
                                if(data.status == "error")
                                {
                                    openError("<?php echo lang('code_does_not_exist') ?>");
                                }
                                else
                                {
                                    commit(true);
                                    openSuccess("<?php echo lang('deleted_successfully') ?>");
                                }
                            }
                        }, 'json');  
                    },
            };
            var dataadapter = new $.jqx.dataAdapter(source);

            var cellsrenderer = function (row, column, value) {
                return '<div style="text-align: center; margin-top: 5px;">' + value + '</div>';
            }
            var columnrenderer = function (value) {
                return '<div style="text-align: center; margin-top: 5px; font-weight: bold;">' + value + '</div>';
            }

            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
                width: "100%",
                selectionmode: 'multiplerowsextended', // multiplerowsextended - singlecell
                selectionmode: 'checkbox', // tao checkbox de xoa nhieu dong
                source: dataadapter,
                theme: theme,
                editable: true, // cho truc tiep tren bang hay khong
                autoheight: true,
                columnsresize: true, // them
                pageable: true, // phan trang
                //pagermode: 'simple', // kieu phan trang
                virtualmode: true, // phan them cho tuong tac sever
                showfilterrow: true, // hien thi tim kiem
                filterable: true, // hien thi du lieu
                sortable: true, // tap sap xep

                showeverpresentrow: true,
                everpresentrowposition: "top",

                localization: getLocalization("<?php echo lang('lang') ?>"), // tai ngon ngu

                showtoolbar: true,
                rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 1px 1px 1px 1px;'></div>");
                    toolbar.append(container);
                    /*container.append('<input id="addrowbutton" type="button" value="Thêm" />');*/
                    container.append(' <img id="deleterowbutton" style="margin-left: 2px;" src="<?php echo base_url(); ?>assets/images/delete1.png" width="20" height="20"> ');
                    /*$("#addrowbutton").jqxButton();*/
                    $("#deleterowbutton").jqxButton();
                    $("#deleterowbutton").jqxTooltip({ content: "<?php echo lang('delete') ?>"});
                    // create new row.
                   /* $("#addrowbutton").on('click', function () {
                        setTimeout("location.href = '<?php echo site_url('aediadiem'); ?>';",0);
                    });*/
                    // delete row.
                    $("#deleterowbutton").on('click', function () {
                        var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                        for (var i = 0; i < rowscount; i++) {
                            var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                            if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                                var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                                var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                            }
                        };
                    });
                },
                
                rendergridrows: function () {
                    return dataadapter.records;
                },
                columns: [
                      { text: "<?php echo lang('key') ?>", editable: false, datafield: 'DM_MA', width: "20%", cellsalign: 'center', renderer: columnrenderer, cellsrenderer: cellsrenderer },
                      { text: "<?php echo lang('name') ?>", datafield: 'DM_TEN', width: "37%" },
                      { text: "<?php echo lang('edit') ?>", datafield: 'Edit', columntype: 'button', width: "20%", renderer: columnrenderer, cellsrenderer: function () {
                                return "<?php echo lang('edit') ?>";
                              }, buttonclick: function (row) {
                                 // open the popup window when the user clicks a button.
                                 editrow = row;
                                 var offset = $("#jqxgrid").offset();
                                 $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60 } });
                                 // get the clicked row's data and initialize the input fields.
                                 var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                                 $("#DM_MA").val(dataRecord.DM_MA);
                                 $("#DM_TEN").val(dataRecord.DM_TEN);
                                 // show the popup window.
                                 $("#popupWindow").jqxWindow('open');
                             }
                        },
                      { text: "<?php echo lang('delete') ?>", datafield: 'Delete', columntype: 'button', width: "20%", cellsrenderer: function () {
                                return "<?php echo lang('delete') ?>";
                              }, buttonclick: function (row) {
                                //editrow = row;
                                var offset = $("#jqxgrid").offset();
                                var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                                var id = dataRecord.DM_MA;
                                console.log(id);
                                var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                             }
                        },
                  ]
            });

            // initialize the popup window and buttons.
            $("#popupWindow").jqxWindow({
                width: 250, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01           
            });
            $("#popupWindow").on('open', function () {
                $("#DM_MA").jqxInput('selectAll');
            });
         
            $("#Cancel").jqxButton({ theme: theme });
            $("#Save").jqxButton({ theme: theme });
            $("#DM_MA").jqxInput({ theme: theme });
            $("#DM_TEN").jqxInput({ theme: theme });
            // update the edited row when the user clicks the 'Save' button.
            $("#Save").click(function () {
                if (editrow >= 0) {
                    var row = { DM_MA: $("#DM_MA").val(), DM_TEN: $("#DM_TEN").val()
                    };
                    var rowID = $('#jqxgrid').jqxGrid('getrowid', editrow);
                    $('#jqxgrid').jqxGrid('updaterow', rowID, row);
                    $("#popupWindow").jqxWindow('hide');
                }
            });

        });

        function sleep(milliseconds) {
            var start = new Date().getTime();
            for (var i = 0; i < 1e7; i++) {
                if ((new Date().getTime() - start) > milliseconds){
                    break;
                }
            }
        }

    </script>
    <style type="text/css">
    .tieude{
        font-weight: bold;
    }
    .td{
        font-weight: bold;
        text-align: center;
    }
    </style>
</head>
<body class='default'>
    <div id="jqxgrid">
    </div>

    <div id="popupWindow">
        <div class="tieude"><?php echo lang("edit") ?></div>
        <div style="overflow: hidden;">
            <table>
                <tr>
                    <td class="tieude" align="right"><?php echo lang("key") ?>: </td>
                    <td align="left"><input id="DM_MA" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td class="tieude" align="right"><?php echo lang("name") ?>: </td>
                    <td align="left"><input id="DM_TEN" /></td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="button" id="Save" value="Lưu" /><input id="Cancel" type="button" value="Hủy" /></td>
                </tr>
            </table>
        </div>
   </div>
</body>
</html>