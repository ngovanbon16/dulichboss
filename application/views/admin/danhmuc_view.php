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

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxfileupload.js"></script>

    <script type="text/javascript">
        function sua(row)
        {
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
        function xoa(id)
        {
            $("#jqxgrid").hide();
            mscConfirm({
                title: "<?php echo lang('notification') ?>",

                subtitle: "<?php echo lang('are_you_sure') ?>",  // default: ''

                okText: "<?php echo lang('i_agree') ?>",    // default: OK

                cancelText: "<?php echo lang('i_dont') ?>", // default: Cancel

                onOk: function() {
                    var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                    $("#jqxgrid").show();
                },

                onCancel: function() {
                    $("#jqxgrid").show();
                }
            });
        }
        function chitiet(id)
        {
            thongbao("", "<?php echo lang('feature_is_being_updated') ?>", "info");
            //setTimeout("location.href = '<?php echo base_url(); ?>index.php/danhmuc/detail/"+id+"';",0);
        }
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            $("#Save").jqxButton({ template: "success" });
            $("#Cancel").jqxButton({ template: "danger" });

            var data = {};
            var url = "<?php echo base_url(); ?>index.php/danhmuc/data0";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'DM_MA', type: 'int' },
                    { name: 'DM_TEN', type: 'string' },
                    { name: 'DM_HINH', type: 'string' }
                ],
                //root: "entry",
                //record: "content",
                id: 'DM_MA',
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
                    url = "<?php echo base_url(); ?>index.php/danhmuc/add";

                    var reg = /^\d+$/;
                    if(!reg.test(rowID))
                    {
                        thongbao("", "<?php echo lang('code_must_be_a_positive_integer') ?>", "danger");
                        return;
                    }
                    
                    rowData.DM_MA = rowID; 
                    console.log(rowData);

                    $.post(url, rowData, function(data, status){
                        console.log(status);
                        console.log(data);
                        if(status == "success")
                        {
                            if(data.status == "error")
                            {
                                commit(false);
                                thongbao("", data.msg["error"], "danger");
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
                    url = "<?php echo base_url(); ?>index.php/danhmuc/delete";
                    dta = {
                        "ma" : rowid
                    };
                    console.log(dta);
                    $.post(url, dta, function(data, status){

                        console.log(status);
                        console.log(data);
                        if(status == "success")
                        {   
                            if(data.status == "error")
                            {
                                commit(false);
                                thongbao("", data.msg["error"], "danger");
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
                return '<center><img class="DM_HINH" onclick="sua('+row+')" height="25" width="25" src="<?php echo base_url(); ?>uploads/danhmuc/' + value + '"/></center>';
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
                pagesize: 15,
                pagesizeoptions: ['10', '15', '20', '25', '30', '50'],

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
                        $("#jqxgrid").hide();
                        mscConfirm({
                            title: "<?php echo lang('notification') ?>",

                            subtitle: "<?php echo lang('are_you_sure') ?>",  // default: ''

                            okText: "<?php echo lang('i_agree') ?>",    // default: OK

                            cancelText: "<?php echo lang('i_dont') ?>", // default: Cancel

                            onOk: function() {
                                var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                                for (var i = 0; i < rowscount; i++) {
                                    var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                                    if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                                        var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                                        var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                                    }
                                };
                                $("#jqxgrid").show();
                            },

                            onCancel: function() {
                                $("#jqxgrid").show();
                            }
                        });
                        
                    });
                },
                rendergridrows: function () {
                    return dataAdapter.records;
                },

                columns: [
                    { 
                        text: "<?php echo lang('icon') ?>", datafield: 'DM_HINH', width: "10%", sortable: false, filterable: false, cellsrenderer: imagerenderer, cellsalign: 'center', align: "center", editable: false
                    },
                    {
                      text: "<?php echo lang('key') ?>", columntype: 'textbox', datafield: 'DM_MA', width: "26%", cellsalign: 'center', align: "center", editable: false, 
                      validateEverPresentRowWidgetValue: function (datafield, value, rowValues) {
                            var reg = /^\d+$/;
                            if(!reg.test(value) && value != "")
                            {
                                return { message: "<?php echo lang('code_must_be_a_positive_integer') ?>", result: false };
                            }
                            return true;
                        }
                    },
                    {
                      text: "<?php echo lang('name') ?>", columntype: 'textbox', datafield: 'DM_TEN', width: "50%", cellsalign: 'left', align: "left",
                      validateEverPresentRowWidgetValue: function (datafield, value, rowValues) {
                          if (!value) {
                              return { message: "<?php echo lang('please_input').' '.lang('name') ?>", result: false };
                          }
                          return true;
                        }
                    },
                    { text: "<?php lang('edit') ?>", datafield: 'addButtonColumn', columntype: 'number', width: "60", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            return "<button class='icon' onclick='sua(\""+row+"\")'><i class='fa fa-pencil fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php lang('delete') ?>", datafield: 'resetButtonColumn', columntype: 'number', width: "60", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.DM_MA;
                            return "<button class='icon' onclick='xoa(\""+id+"\")'><i class='fa fa-times fa-fw'></i></button>";
                        }
                    }
                ],
            });

            // initialize the popup window and buttons.
            $("#popupWindow").jqxWindow({
                width: 330, height: 300, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01           
            });
            $("#popupWindow").on('open', function () {
                $("#DM_MA").jqxInput('selectAll');
                var id = document.getElementById("DM_MA").value;
                var path = "<?php echo base_url(); ?>index.php/danhmuc/upload/"+id;
                $('#jqxFileUpload').jqxFileUpload({ localization: { browseButton: '<?php echo lang("browse") ?>', uploadButton: "<?php echo lang('upload_file') ?>", cancelButton: "<?php echo lang('cancel') ?>", uploadFileTooltip: "<?php echo lang('upload_file') ?>", cancelFileTooltip: "<?php echo lang('cancel') ?>" } });

                $('#jqxFileUpload').jqxFileUpload({ multipleFilesUpload: false });

                $('#jqxFileUpload').jqxFileUpload({ width: "90%", height: "120", uploadUrl: path, fileInputName: 'fileToUpload'});

                $('#eventsPanel').jqxPanel({ width: "90%", height: 50 });
                $('#jqxFileUpload').on('select', function (event) {
                    var args = event.args;
                    var fileName = args.file;
                    var fileSize = args.size;
                    var fileindex = args.owner._fileRows["length"] - 1;
                    $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                      fileName + ';<br />' + 'size: ' + fileSize + '<br />');

                    if(fileSize > 2500000)
                    {
                        $('#jqxFileUpload').jqxFileUpload('cancelFile', fileindex);
                        thongbao("", "<?php echo lang('sorry_your_file_is_too_large') ?>", "danger");
                    }
                });
                $('#jqxFileUpload').on('remove', function (event) {
                    var fileName = event.args.file;
                    $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br /> <hr /> ');
                 });
                $('#jqxFileUpload').on('uploadStart', function (event) {
                    var fileName = event.args.file;
                    $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' + fileName + '<br />');
                 });
                $('#jqxFileUpload').on('uploadEnd', function (event) {
                    var args = event.args;
                    var fileName = args.file;
                    var serverResponce = args.response;
                    $('#eventsPanel').jqxPanel('append', '<strong>' + event.type + ':</strong> ' +
                      fileName + ';<br />' + 'server response: ' + serverResponce + '<br />');
                    if(serverResponce.indexOf("!") != "-1")
                    {
                        thongbao("", serverResponce, "success");
                    }
                    else
                    {
                        thongbao("", serverResponce, "danger");
                    }
                    
                });

            });
         
            $("#Cancel").jqxButton({ });
            $("#Save").jqxButton({ });
            $("#DM_MA").jqxInput({ height: "20" });
            $("#DM_TEN").jqxInput({ height: "20" });
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
    </script>
    <style type="text/css">
        .icon{
            width: 100%;
            height: 100%;
        }
        .DM_HINH{
            cursor: pointer;
        }
    </style>
</head>
<body class='default'>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana;">
        <div id="jqxgrid">
        </div>
    </div>

    <div id="popupWindow">
        <div style="font-weight: bolder;"><?php echo lang('edit') ?></div>
        <div style="overflow: hidden;">
            <table width="100%">
                <tr>
                    <td style="width: 50px; text-align: right; font-weight: bolder;">  <?php echo lang('key') ?></td>
                    <td style="padding: 0px 0px 5px 5px;" align="left"><input id="DM_MA" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td style="width: 50px; text-align: right; font-weight: bolder;"> <?php echo lang('name') ?></td>
                    <td style="padding: 0px 0px 5px 5px;" align="left"><input id="DM_TEN" /></td>
                </tr>
                <tr>
                    <td style="width: 50px; text-align: right; font-weight: bolder;">
                        <?php echo lang('icon') ?>
                    </td>
                    <td style="padding: 0px 0px 5px 5px;">
                        <div id="jqxFileUpload"></div>
                        <div id="eventsPanel"></div>
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td style="padding-top: 5px; padding-right: 23px;" align="right"><input style="margin-right: 5px;" type="button" id="Save" value="<?php echo lang('save') ?>" /><input id="Cancel" type="button" value="<?php echo lang('cancel') ?>" /></td>
                </tr>
            </table>
        </div>
   </div>
</body>
</html>