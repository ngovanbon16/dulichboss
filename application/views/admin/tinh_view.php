<!DOCTYPE html>
<html lang="en">
<head>
    <title id='Description'>This example shows how to enable the paging feature of the Grid.</title>
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
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdatetimeinput.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcheckbox.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/demos/jqxgrid/localization.js"></script>

    <script type="text/javascript">
        function sua(row)
        {
            editrow = row;
            var offset = $("#jqxgrid").offset();
            $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60 } });
            // get the clicked row's data and initialize the input fields.
            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
            $("#T_MA").val(dataRecord.T_MA);
            $("#T_TEN").val(dataRecord.T_TEN);
            // show the popup window.
            $("#popupWindow").jqxWindow('open');
        }
        function xoa(id)
        {
            var commit = $("#jqxgrid").jqxGrid('deleterow', id);
        }
        function chitiet(id)
        {
            thongbao("", "<?php echo lang('feature_is_being_updated') ?>", "info");
            //setTimeout("location.href = '<?php echo base_url(); ?>index.php/tinh/detail/"+id+"';",0);
        }
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            $("#Save").jqxButton({ template: "success" });
            $("#Cancel").jqxButton({ template: "danger" });

            var data = {};
            var url = "<?php echo base_url(); ?>index.php/tinh/data0";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'T_MA', type: 'number' },
                    { name: 'T_TEN', type: 'string' }
                ],
                //root: "entry",
                //record: "content",
                id: 'T_MA',
                url: url,
                pager: function (pagenum, pagesize, oldpagenum) {
                    // callback called when a page or page size is changed.
                },
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
                    url = "<?php echo base_url(); ?>index.php/tinh/add";

                    var reg = /^\d+$/;
                    if(!reg.test(rowID))
                    {
                        thongbao("", "<?php echo lang('code_must_be_a_positive_integer') ?>", "danger");
                        return;
                    }
                    
                    rowData.T_MA = rowID; 
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
                                    thongbao("", "<?php echo lang('name_not_be_repeated') ?>", "danger");
                                }
                                if(error == "tm")
                                {
                                    thongbao("", data.data["T_MA"]+" - <?php echo lang('code_already_exists') ?>", "danger");
                                }
                            }
                            else
                            {
                                commit(true);
                                thongbao("", "<?php echo lang('inserted_successfully') ?>", "success");
                            }
                        }
                    }, 'json');
                },
                updaterow: function (rowid, rowdata, commit) {
                    // synchronize with the server - send update command
                    var data = "update=true&T_TEN=" + rowdata.T_TEN;
                    data = data + "&T_MA=" + rowdata.T_MA;
                    console.log(data);
                    $.ajax({
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>index.php/tinh/data0',
                        data: data,
                        success: function (data, status, xhr) {
                            // update command is executed.
                            console.log(data);
                            if(data)
                            {
                                commit(true);
                                thongbao("", "<?php echo lang('updated_successfully') ?>", "success");
                            }
                            else
                            {
                                commit(false);
                                thongbao("", "<?php echo lang('name_not_be_repeated') ?>", "danger");
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
                    url = "<?php echo base_url(); ?>index.php/tinh/delete";
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
                            if(data.status == "error")
                            {
                                thongbao("", "<?php echo lang('code_does_not_exist') ?>", "danger");
                            }
                            else
                            {
                                commit(true);
                                thongbao("", "<?php echo lang('deleted_successfully') ?>", "success");
                            }
                        }
                    }, 'json');  
                    //commit(true);
                },

            };
            var dataAdapter = new $.jqx.dataAdapter(source);

            var imagerenderer = function (row, datafield, value) {
                return '<center><img height="25" width="25" src="<?php echo base_url(); ?>uploads/user/' + value + '"/></center>';
            }

            $("#jqxgrid").jqxGrid(
            {
                width: "100%",
                source: dataAdapter,
                selectionmode: 'multiplerowsextended',
                sortable: true, // tap sap xep
                pageable: true, // phan trang
                /*pagermode: 'simple', // kieu phan trang*/
                autoheight: true,
                columnsresize: true,
                showfilterrow: true, // hien thi tim kiem
                filterable: true, // hien thi du lieu
                selectionmode: 'checkbox',
                virtualmode: true, // phan them cho tuong tac sever
                editable: true, // cho truc tiep tren bang hay khong
                showeverpresentrow: true,
                everpresentrowposition: "top",

                localization: getLocalization("<?php echo lang('lang') ?>"), // tai ngon ngu

                showtoolbar: true,

                rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 3px;'></div>");
                    toolbar.append(container);
                    // container.append('<button id="addrowbutton"> <i class="fa fa-plus-circle fa-fw"></i> <?php echo lang("add") ?> </button>');
                    container.append('<button style="margin-left: 3px; " id="deleterowbutton"> <i class="fa fa-times fa-fw"></i> <?php echo lang("delete") ?></button> ');
                    // $("#addrowbutton").jqxButton();
                    // $("#addrowbutton").jqxTooltip({ content: "<?php echo lang('add') ?>"});
                    $("#deleterowbutton").jqxButton();
                    $("#deleterowbutton").jqxTooltip({ content: "<?php echo lang('delete') ?>"});
                    // create new row.
                    // $("#addrowbutton").on('click', function () {
                    //     setTimeout("location.href = '<?php echo site_url('registration'); ?>';",0);
                    // });
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
                    return dataAdapter.records;
                },

                columns: [
                    {
                      text: "<?php echo lang('key') ?>", columntype: 'textbox', datafield: 'T_MA', width: "30%", cellsalign: 'center', align: "center",
                      validateEverPresentRowWidgetValue: function (datafield, value, rowValues) {
                          if (isNaN(value)) {
                              return { message: "<?php echo lang('code_must_be_a_positive_integer') ?>", result: false };
                          }
                          return true;
                        }
                    },
                    {
                      text: "<?php echo lang('name') ?>", columntype: 'textbox', datafield: 'T_TEN', width: "56%", cellsalign: 'left', align: "left",
                      validateEverPresentRowWidgetValue: function (datafield, value, rowValues) {
                          if (!value) {
                              return { message: "<?php echo lang('please_input').' '.lang('name') ?>", result: false };
                          }
                          return true;
                        }
                    },
                    { text: "<?php echo lang('edit') ?>", datafield: 'Edit', columntype: 'number', width: "60", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            return "<button class='icon' onclick='sua(\""+row+"\")'><i class='fa fa-pencil fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('delete') ?>", datafield: 'Delete', columntype: 'number', width: "60", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.T_MA;
                            return "<button class='icon' onclick='xoa(\""+id+"\")'><i class='fa fa-times fa-fw'></i></button>";
                        }
                    }
                ],
            });

            // initialize the popup window and buttons.
            $("#popupWindow").jqxWindow({
                width: 250, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01           
            });
            $("#popupWindow").on('open', function () {
                $("#T_MA").jqxInput('selectAll');
            });
         
            $("#Cancel").jqxButton({ });
            $("#Save").jqxButton({ });
            $("#T_MA").jqxInput({ });
            $("#T_TEN").jqxInput({ });
            // update the edited row when the user clicks the 'Save' button.
            $("#Save").click(function () {
                if (editrow >= 0) {
                    var row = { T_MA: $("#T_MA").val(), T_TEN: $("#T_TEN").val()
                    };
                    var rowID = $('#jqxgrid').jqxGrid('getrowid', editrow);
                    $('#jqxgrid').jqxGrid('updaterow', rowID, row);
                    $("#popupWindow").jqxWindow('hide');
                }
            });
            
        });
    </script>
    <style type="text/css">
        .icon{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class='default'>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana;">
        <div id="jqxgrid">
        </div>
    </div>

    <div id="popupWindow">
        <div><?php echo lang('edit') ?></div>
        <div style="overflow: hidden;">
            <table>
                <tr>
                    <td width="50" align="center">  <?php echo lang('key') ?></td>
                    <td align="left"><input id="T_MA" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td align="center"> <?php echo lang('name') ?></td>
                    <td align="left"><input id="T_TEN" /></td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="button" id="Save" value="<?php echo lang('save') ?>" /><input id="Cancel" type="button" value="<?php echo lang('cancel') ?>" /></td>
                </tr>
            </table>
        </div>
   </div>

</body>
</html>