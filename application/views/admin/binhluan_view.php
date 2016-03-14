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
        }
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            var url = "<?php echo base_url(); ?>index.php/binhluan/data0";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'BL_MA', type: 'number' },
                    { name: 'ND_DIACHIMAIL', type: 'string' },
                    { name: 'DD_TEN', type: 'string' },
                    { name: 'BL_TIEUDE', type: 'string' },
                    { name: 'BL_NOIDUNG', type: 'string' },
                    { name: 'BL_NGAYDANG', type: 'date' }
                ],
                //root: "entry",
                //record: "content",
                id: 'BL_MA',
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
                    url = "<?php echo base_url(); ?>index.php/binhluan/add";
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
                    url = "<?php echo base_url(); ?>index.php/binhluan/delete";
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
                                thongbao("", data.msg['ma'], "danger");
                            }
                            else
                            {
                                commit(true);
                                thongbao("", "<?php echo lang('deleted_successfully') ?>", "success");
                            }
                        }
                    }, 'json');  
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
                localization: getLocalization("<?php echo lang('lang') ?>"), // tai ngon ngu

                /*editable: true, // cho truc tiep tren bang hay khong

                showeverpresentrow: show,
                everpresentrowposition: "top",*/
                showtoolbar: true,

                rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 3px;'></div>");
                    toolbar.append(container);
                   // container.append('<button id="addrowbutton"> <i class="fa fa-plus-circle fa-fw"></i> <?php echo lang('add') ?> </button>');
                    container.append('<button style="margin-left: 3px; " id="deleterowbutton"> <i class="fa fa-times fa-fw"></i> <?php echo lang('delete') ?></button> ');
                    // $("#addrowbutton").jqxButton();
                    // $("#addrowbutton").jqxTooltip({ content: "<?php echo lang('add') ?>"});
                    $("#deleterowbutton").jqxButton();
                    $("#deleterowbutton").jqxTooltip({ content: "<?php echo lang('delete') ?>"});
                    // create new row.
                    // $("#addrowbutton").on('click', function () {
                    //     //setTimeout("location.href = '<?php echo site_url('aebinhluan'); ?>';",0);
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
                    { text: "<?php echo lang('key') ?>", dataField: 'BL_MA', width: "5%", cellsalign: 'center' },
                    { text: "<?php echo lang('name') ?>", dataField: 'DD_TEN', width: "15%" },
                    { text: "<?php echo lang('email') ?>", dataField: 'ND_DIACHIMAIL', width: "15%", /*filtertype: 'checkedlist'*/ },
                    { text: "<?php echo lang('title') ?>", dataField: 'BL_TIEUDE', width: "19.8%" },
                    { text: "<?php echo lang('content') ?>", dataField: 'BL_NOIDUNG', width: "20%" },
                    { text: "<?php echo lang('create') ?>", dataField: 'BL_NGAYDANG', width: "15%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'yyyy-MM-dd', cellsalign: 'right' },
                    { text: "<?php echo lang('delete') ?>", datafield: 'Delete', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.BL_MA;
                            return "<button class='icon' onclick='xoa(\""+id+"\")'><i class='fa fa-times fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('detail') ?>", datafield: 'detail', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.BL_MA;
                            return "<button class='icon' onclick='chitiet(\""+id+"\")'><i class='fa fa-photo fa-fw'></i></button>";
                        }
                    },
                  
                ],
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
</body>
</html>