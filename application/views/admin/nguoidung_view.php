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
        function sua(id)
        {
            setTimeout("location.href = '<?php echo base_url(); ?>index.php/nguoidung/edit/"+id+"';",0);
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
            //setTimeout("location.href = '<?php echo base_url(); ?>index.php/nguoidung/detail/"+id+"';",0);
        }
        function kichhoat(id, row)
        {
            var commit = $("#jqxgrid").jqxGrid('updaterow', id, $("#jqxgrid").jqxGrid('getrowdata', row));
        }
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            var data = {};
            var url = "<?php echo base_url(); ?>index.php/nguoidung/data0";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'ND_HINH', type: 'string' },
                    { name: 'ND_MA', type: 'number' },
                    { name: 'ND_HO', type: 'string' },
                    { name: 'ND_TEN', type: 'string' },
                    { name: 'ND_DIACHIMAIL', type: 'string' },
                    { name: 'ND_KICHHOAT', type: 'string' },
                    { name: 'ND_NGAYCAPNHAT', type: 'date' },
                    { name: 'ND_NGAYTAO', type: 'date' }
                ],
                //root: "entry",
                //record: "content",
                id: 'ND_MA',
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
                    var kichhoat = "";
                    if(rowdata.ND_KICHHOAT == '1')
                    {
                        kichhoat = '-1';
                    }
                    if(rowdata.ND_KICHHOAT == '-1')
                    {
                        kichhoat = '1';
                    }
                    if(rowdata.ND_KICHHOAT == '0')
                    {
                        thongbao("", "<?php echo lang('not_activated') ?>", "danger");
                        return;
                    }
                    var data = "update=true&ND_KICHHOAT=" + kichhoat;
                    data = data + "&ND_MA=" + rowdata.ND_MA;
                    console.log(data);
                    $.ajax({
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>index.php/nguoidung/data0',
                        data: data,
                        success: function (data, status, xhr) {
                            // update command is executed.
                            console.log(data);
                            if(data)
                            {
                                $("#jqxgrid").jqxGrid('updatebounddata');
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
                    url = "<?php echo base_url(); ?>index.php/nguoidung/delete";
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
                                thongbao("", data.msg['error'], "danger");
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
                /*editable: true, // cho truc tiep tren bang hay khong

                showeverpresentrow: show,
                everpresentrowposition: "top",*/

                localization: getLocalization("<?php echo lang('lang') ?>"), // tai ngon ngu

                showtoolbar: true,

                rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 3px;'></div>");
                    toolbar.append(container);
                    container.append('<button id="addrowbutton"> <i class="fa fa-plus-circle fa-fw"></i> <?php echo lang('add') ?> </button>');
                    container.append('<button style="margin-left: 3px; " id="deleterowbutton"> <i class="fa fa-times fa-fw"></i> <?php echo lang('delete') ?></button> ');
                    $("#addrowbutton").jqxButton();
                    $("#addrowbutton").jqxTooltip({ content: "<?php echo lang('add') ?>"});
                    $("#deleterowbutton").jqxButton();
                    $("#deleterowbutton").jqxTooltip({ content: "<?php echo lang('delete') ?>"});
                    // create new row.
                    $("#addrowbutton").on('click', function () {
                        setTimeout("location.href = '<?php echo site_url('registration'); ?>';",0);
                    });
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
                    { text: "<?php echo lang('photo') ?>", datafield: 'ND_HINH', width: "5%", sortable: false, filterable: false, cellsrenderer: imagerenderer, cellsalign: 'center', align: "center", },
                    { text: "<?php echo lang('key') ?>", dataField: 'ND_MA', width: "5%", cellsalign: 'center', align: "center", },
                    { text: "<?php echo lang('lastname') ?>", dataField: 'ND_HO', width: "7.5%" },
                    /*{ text: 'Mã người dùng', dataField: 'ND_MA', width: "10%" },*/
                    { text: "<?php echo lang('firstname') ?>", dataField: 'ND_TEN', width: "10%" },
                    { text: "<?php echo lang('email') ?>", dataField: 'ND_DIACHIMAIL', width: "19%" },
                    { text: "<?php echo lang('activate') ?>", dataField: 'ND_KICHHOAT', width: "10%", columntype: 'textbox', filtertype: 'textbox', align: 'center',
                        cellsrenderer: function (row, column, value) {
                            var tt = "";
                            if(value == "0")
                            {
                                tt = "<div class='trangthai0'><?php echo lang('not_activated') ?></div>";
                            }
                            if(value == "1")
                            {
                                tt = "<div class='trangthai1'><?php echo lang('activated') ?></div>";
                            }
                            if(value == "-1")
                            {
                                tt = "<div class='trangthai2'><?php echo lang('blocked') ?></div>";
                            }
                            return tt;
                        }
                    },
                    { text: "<?php echo lang('updates_day') ?>", dataField: 'ND_NGAYCAPNHAT', width: "13%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'yyyy-MM-dd', cellsalign: 'right', align: 'right' },
                    { text: "<?php echo lang('creates_date') ?>", dataField: 'ND_NGAYTAO', width: "13%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'yyyy-MM-dd', cellsalign: 'right', align: 'right' },
                    { text: "<?php echo lang('edit') ?>", datafield: 'Edit', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.ND_MA;
                            return "<button class='icon' onclick='sua(\""+id+"\")'><i class='fa fa-pencil fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('delete') ?>", datafield: 'Delete', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.ND_MA;
                            return "<button class='icon' onclick='xoa(\""+id+"\")'><i class='fa fa-times fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('detail') ?>", datafield: 'detail', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.ND_MA;
                            return "<button class='icon' onclick='chitiet(\""+id+"\")'><i class='fa fa-info-circle fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('blocked') ?>", datafield: 'blocked', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.ND_MA;
                            var kichhoat = dataRecord.ND_KICHHOAT;
                            return "<button class='icon' onclick='kichhoat(\""+id+"\",\""+row+"\")'><i class='fa fa-lock fa-fw'></i></button>";
                        }
                    }
                ],
            });
            
        });
    </script>
    <style type="text/css">
        .icon{
            width: 100%;
            height: 100%;
        }
        .trangthai0{
            text-align: center;
            background-color: #F93;
            color: #FFF;
            border-radius: 5px;
            margin: 2px;
            padding: 3px;
            font-weight: bold;
            border-radius: 2px;
            box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
            -moz-box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
            -webkit-box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
            -o-box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
        }
        .trangthai1{
            text-align: center;
            background-color: #3C6;
            color: #FFF;
            border-radius: 5px;
            margin: 2px;
            padding: 3px;
            font-weight: bold;
            border-radius: 2px;
            box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
            -moz-box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
            -webkit-box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
            -o-box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
        }
        .trangthai2{
            text-align: center;
            background-color: #F33;
            color: #FFF;
            border-radius: 5px;
            margin: 2px;
            padding: 3px;
            font-weight: bold;
            border-radius: 2px;
            box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
            -moz-box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
            -webkit-box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
            -o-box-shadow: 0 -2px 2px -2px rgba(0,0,0,4);
        }
    </style>
</head>
<body class='default'>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana;">
        <div id="jqxgrid">
        </div>
    </div>

    <!-- <a href='javascript:void(0)' onclick='gotoLink(\"". $ajax_like_link ."\")' .......>link</a>
    <script>
    function gotoLink(url) {
        window.location = url;
    }
    </script>

    <a href="<?php echo base_url(); ?>assets/images/font.rar" download>
      <img border="0" src="<?php echo base_url(); ?>assets/images/logo.jpg" alt="W3Schools" width="104" height="142">
    </a> -->

</body>
</html>