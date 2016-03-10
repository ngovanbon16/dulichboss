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
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnotification.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdatetimeinput.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcheckbox.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/demos/jqxgrid/localization.js"></script>

    <script type="text/javascript">
            function openSuccess(str)
            {
                $("#result").html(str);
                $("#notiSuccess").jqxNotification("open");
            }

            function openError(str)
            {
                $("#error").html(str);
                $("#notiError").jqxNotification("open");
            }

        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            var notificationWidth = 300;

            $("#notiSuccess").jqxNotification({
                width: notificationWidth, position: "bottom-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "success"
            });

            $("#notiError").jqxNotification({
                width: notificationWidth, position: "bottom-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "error"
            });

            var data = {};
            var url = "<?php echo base_url(); ?>index.php/diadiem/data0";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'DD_MA', type: 'number' },
                    { name: 'DM_TEN', type: 'string' },
                    /*{ name: 'ND_MA', type: 'string' },*/
                    { name: 'DD_TEN', type: 'string' },
                    { name: 'DD_DUYET', type: 'bool' },
                    { name: 'DD_NGAYCAPNHAT', type: 'date' },
                    { name: 'DD_NGAYDANG', type: 'date' }
                ],
                //root: "entry",
                //record: "content",
                id: 'DD_MA',
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
                updaterow: function (rowid, rowdata, commit) {
                    url = "<?php echo base_url(); ?>index.php/diadiem/add";
                    //console.log(rowData);

                    $.post(url, rowdata, function(data, status){
                        console.log(status);
                        console.log(data);
                        console.log(data.data);
                        if(status == "success")
                        {
                            if(data.status == "error")
                            {
                                //alert("Tên không được trùng lập!");
                                openError("Tên không được trùng lập!");
                                commit(false);
                            }
                            else
                            {
                                commit(true);
                                if(data.msg['insert'] == "insert")
                                {
                                    openSuccess("Thêm thành công!");
                                    //alert("Thêm thàn công!");
                                }
                                else
                                {
                                    openSuccess("Sửa thành công!");
                                    //alert("Sửa thành công!");
                                }
                            }
                        }
                    }, 'json');
                    //commit(true);
                },
                deleterow: function (rowid, commit) {
                    var dta, url, test;
                    url = "<?php echo base_url(); ?>index.php/diadiem/delete";
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
                                //alert("Mã không tồn tại!");
                                openError(data.msg['ma']);
                            }
                            else
                            {
                                commit(true);
                                openSuccess("<?php echo lang('deleted_successfully') ?>");
                                //alert("Xóa thành công!");
                            }
                        }
                    }, 'json');  
                    //commit(true);
                },

            };
            var dataAdapter = new $.jqx.dataAdapter(source);

            $("#jqxgrid").jqxGrid(
            {
                width: "100%",
                source: dataAdapter,
                selectionmode: 'multiplerowsextended',
                sortable: true, // tap sap xep
                pageable: true, // phan trang
                //pagermode: 'simple', // kieu phan trang
                autoheight: true,
                columnsresize: true,
                showfilterrow: true, // hien thi tim kiem
                filterable: true, // hien thi du lieu
                selectionmode: 'checkbox',
                virtualmode: true, // phan them cho tuong tac sever
                /*editable: true, // cho truc tiep tren bang hay khong

                showeverpresentrow: show,
                everpresentrowposition: "top",*/

                localization: getLocalization("<?php echo lang('lang') ?>"), // tai ngon ngu

                showtoolbar: true,

                rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 1px 1px 1px 1px;'></div>");
                    toolbar.append(container);
                    container.append('<button id="addrowbutton"> <img src="<?php echo site_url("assets/images/add1.png") ?>" style="width: 20px; height: 20px;" /> </button>');
                    container.append('<button style="margin-left: 2px; " id="deleterowbutton"> <img src="<?php echo site_url("assets/images/delete1.png") ?>" style="width: 20px; height: 20px;" /> </button> ');
                    $("#addrowbutton").jqxButton();
                    $("#addrowbutton").jqxTooltip({ content: "<?php echo lang('add') ?>"});
                    $("#deleterowbutton").jqxButton();
                    $("#deleterowbutton").jqxTooltip({ content: "<?php echo lang('delete') ?>"});
                    // create new row.
                    $("#addrowbutton").on('click', function () {
                        setTimeout("location.href = '<?php echo site_url('aediadiem'); ?>';",0);
                    });
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
                    { text: "<?php echo lang('key') ?>", dataField: 'DD_MA', width: "5%", cellsalign: 'center' },
                    { text: "<?php echo lang('category') ?>", dataField: 'DM_TEN', width: "17%", /*filtertype: 'checkedlist'*/ },
                    /*{ text: 'Mã người dùng', dataField: 'ND_MA', width: "10%" },*/
                    { text: "<?php echo lang('name') ?>", dataField: 'DD_TEN', width: "18%" },
                    { text: "<?php echo lang('activate') ?>", dataField: 'DD_DUYET', width: "5%", columntype: 'checkbox', filtertype: 'bool' },
                    { text: "<?php echo lang('update') ?>", dataField: 'DD_NGAYCAPNHAT', width: "11%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'yyyy-MM-dd', cellsalign: 'right' },
                    { text: "<?php echo lang('create') ?>", dataField: 'DD_NGAYDANG', width: "11%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'yyyy-MM-dd', cellsalign: 'right' },
                    { text: "<?php echo lang('edit') ?>", datafield: 'Edit', columntype: 'button', width: "10%", cellsrenderer: function () {
                            return "<?php echo lang('edit') ?>";
                            /*<img src='<?php echo base_url(); ?>assets/images/edit.png'>*/
                          }, buttonclick: function (row) {
                            // open the popup window when the user clicks a button.
                            //editrow = row;
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.DD_MA;
                            console.log(id);
                            setTimeout("location.href = '<?php echo base_url(); ?>index.php/aediadiem/edit/"+id+"';",0);
                        }
                    },
                    { text: "<?php echo lang('delete') ?>", datafield: 'Delete', columntype: 'button', width: "10%", cellsrenderer: function () {
                            return "<?php echo lang('delete') ?>";
                          }, buttonclick: function (row) {
                            //editrow = row;
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.DD_MA;
                            console.log(id);
                            var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                         }
                    },
                    { text: "<?php echo lang('detail') ?>", datafield: 'detail', columntype: 'button', width: "10%", cellsrenderer: function () {
                            return "<?php echo lang('detail') ?>";
                          }, buttonclick: function (row) {
                            // open the popup window when the user clicks a button.
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.DD_MA;
                            console.log(id);
                            setTimeout("location.href = '<?php echo base_url(); ?>index.php/aediadiem/detailadmin/"+id+"';",0);
                        }
                    },
                  
                ],
            });
            
        });

    </script>
</head>
<body class='default'>
    <div id="notiSuccess">
        <div id="result">Thông báo thành công!</div>
    </div>
    <div id="notiError">
        <div id="error">Thông báo lỗi!</div>
    </div>

    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana;">
        <div id="jqxgrid">
        </div>
    </div>
</body>
</html>