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
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnotification.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcheckbox.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets\jqwidgets\demos\jqxgrid\localization.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";
            var theme = 'bootstrap';

            var notificationWidth = 300;

            $("#notiSuccess").jqxNotification({
                width: notificationWidth, position: "bottom-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "success"
            });

            $("#notiError").jqxNotification({
                width: notificationWidth, position: "bottom-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "error"
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

            // prepare the data
            var data = {};
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'T_MA', type: 'int' },
                     { name: 'T_TEN', type: 'string' }
                ],
                id: 'T_MA',
                url: '<?php echo base_url(); ?>index.php/tinh/data0',
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
                        openError("Lỗi! Mã phải là một số nguyên dương");
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
                                    openError("Lỗi! Tên đã tồn tại.");
                                }
                                if(error == "tm")
                                {
                                    openError("Lỗi! Mã "+data.data["T_MA"]+" đã tồn tại.");
                                }
                            }
                            else
                            {
                                commit(true);
                                openSuccess("Thêm thành công!");
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
                                openSuccess("Sửa thành công!");
                            }
                            else
                            {
                                commit(false);
                                openError("Tên không được trùng lập!");
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
                                //alert(data.status);
                                if(data.status == "error")
                                {
                                    openError("Mã không tồn tại!");
                                }
                                else
                                {
                                    commit(true);
                                    openSuccess("Xóa thành công!");
                                }
                            }
                        }, 'json');  
                    },
            };
            var dataadapter = new $.jqx.dataAdapter(source);

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
                      { text: "<?php echo lang('key') ?>", editable: false, datafield: 'T_MA', width: "20%", cellsalign: 'center' },
                      { text: "<?php echo lang('name') ?>", datafield: 'T_TEN', width: "37%" },
                      { text: "<?php echo lang('edit') ?>", datafield: 'Edit', columntype: 'button', width: "20%", cellsrenderer: function () {
                                return "<?php echo lang('edit') ?>";
                              }, buttonclick: function (row) {
                                 // open the popup window when the user clicks a button.
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
                        },
                      { text: "<?php echo lang('delete') ?>", datafield: 'Delete', columntype: 'button', width: "20%", cellsrenderer: function () {
                                return "<?php echo lang('delete') ?>";
                              }, buttonclick: function (row) {
                                //editrow = row;
                                var offset = $("#jqxgrid").offset();
                                var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                                var id = dataRecord.T_MA;
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
                $("#T_MA").jqxInput('selectAll');
            });
         
            $("#Cancel").jqxButton({ theme: theme });
            $("#Save").jqxButton({ theme: theme });
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

        function sleep(milliseconds) {
            var start = new Date().getTime();
            for (var i = 0; i < 1e7; i++) {
                if ((new Date().getTime() - start) > milliseconds){
                    break;
                }
            }
        }

    </script>
</head>
<body class='default'>
    <div id="notiSuccess" >
        <div id="result">Thông báo thành công!</div>
    </div>
    <div id="notiError" >
        <div id="error">Thông báo lỗi!</div>
    </div>

    <div id="jqxgrid">
    </div>

    <div id="popupWindow">
        <div>Sửa</div>
        <div style="overflow: hidden;">
            <table>
                <tr>
                    <td align="right">Mã tỉnh:</td>
                    <td align="left"><input id="T_MA" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td align="right">Tên tỉnh:</td>
                    <td align="left"><input id="T_TEN" /></td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="button" id="Save" value="Lưu" /><input id="Cancel" type="button" value="Hủy" /></td>
                </tr>
            </table>
        </div>
   </div>

   <!-- <a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/english'>English</a> - 
   <a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/vietnamese'>Vietnamese</a> -->
</body>
</html>