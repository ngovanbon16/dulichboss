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

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

    <script type="text/javascript">
        function sua(row)
        {
            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
            var BV_MA = dataRecord.BV_MA;
            /*$("#btngui").hide();
            $("#btnluu").show();

            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
            var BV_MA = dataRecord.BV_MA;
            var BV_TIEUDE = dataRecord.BV_TIEUDE;
            var BV_NOIDUNG = dataRecord.BV_NOIDUNG;
            var DD_MA = dataRecord.DD_MA;
            var DD_TEN = dataRecord.DD_TEN;
            $("#BV_TIEUDE").val(BV_TIEUDE);
            CKEDITOR.instances.BV_NOIDUNG.setData(BV_NOIDUNG);
            $("#DD_MA").jqxDropDownList('selectItem', DD_MA);
            $("#BV_MA").html(BV_MA);*/
            setTimeout("location.href = '<?php echo base_url(); ?>index.php/baiviet/editadmin/"+BV_MA+"';",0);
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
            //thongbao("", "<?php echo lang('feature_is_being_updated') ?>", "info");
            //setTimeout("location.href = '<?php echo base_url(); ?>index.php/baiviet/detail/"+id+"';",0);
            url = '<?php echo base_url(); ?>index.php/baiviet/detail/'+id;
            window.open(url, '', '_blank');
        }
        function kichhoat(id, row)
        {
            var commit = $("#jqxgrid").jqxGrid('updaterow', id, $("#jqxgrid").jqxGrid('getrowdata', row));
        }
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            var data = {};
            var url = "<?php echo base_url(); ?>index.php/baiviet/data0";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'BV_MA', type: 'number' },
                    { name: 'DD_MA', type: 'number' },
                    { name: 'DD_TEN', type: 'string' },
                    { name: 'BV_TIEUDE', type: 'string' },
                    { name: 'BV_NOIDUNG', type: 'string' },
                    { name: 'BV_DUYET', type: 'string' },
                    { name: 'BV_NGAYDANG', type: 'date' }
                ],
                //root: "entry",
                //record: "content",
                id: 'BV_MA',
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
                    if(rowdata.BV_DUYET == '0')
                    {
                        kichhoat = '1';
                    }
                    if(rowdata.BV_DUYET == '1')
                    {
                        kichhoat = '0';
                    }
                    var data = "update=true&BV_DUYET=" + kichhoat;
                    data = data + "&BV_MA=" + rowdata.BV_MA;
                    console.log(data);
                    $.ajax({
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>index.php/baiviet/data0',
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
                    url = "<?php echo base_url(); ?>index.php/baiviet/delete";
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
                                thongbao("", data.msg['error'], "danger");
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

/*            var imagerenderer = function (row, datafield, value) {
                return '<center><img height="25" width="25" src="<?php echo base_url(); ?>uploads/user/' + value + '"/></center>';
            }*/

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
                    container.append('<button id="addrowbutton" data-toggle=\"modal\" data-target=\"#modal\"> <i class="fa fa-plus-circle fa-fw"></i> <?php echo lang('add') ?> </button>');
                    container.append('<button style="margin-left: 3px; " id="deleterowbutton"> <i class="fa fa-times fa-fw"></i> <?php echo lang('delete') ?></button> ');
                    $("#addrowbutton").jqxButton();
                    $("#addrowbutton").jqxTooltip({ content: "<?php echo lang('add') ?>"});
                    $("#deleterowbutton").jqxButton();
                    $("#deleterowbutton").jqxTooltip({ content: "<?php echo lang('delete') ?>"});
                    // create new row.
                    $("#addrowbutton").on('click', function () {
                        /*$("#BV_TIEUDE").val("");
                        CKEDITOR.instances.BV_NOIDUNG.setData("");
                        $("#DD_MA").jqxDropDownList('selectedIndex','-1');
                        $("#BV_MA").html("...");
                        $("#btngui").show();
                        $("#btnluu").hide();*/
                        setTimeout("location.href = '<?php echo site_url('baiviet/addadmin'); ?>';",0);
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
                    /*{ text: "<?php echo lang('photo') ?>", datafield: 'ND_HINH', width: "5%", sortable: false, filterable: false, cellsrenderer: imagerenderer, cellsalign: 'center', align: "center", },*/
                    { text: "<?php echo lang('key') ?>", dataField: 'BV_MA', width: "7%", cellsalign: 'center', align: "center", },
                    { text: "<?php echo lang('place') ?>", dataField: 'DD_TEN', width: "15%" },
                    { text: "<?php echo lang('title') ?>", dataField: 'BV_TIEUDE', width: "15%" },
                    { text: "<?php echo lang('content') ?>", dataField: 'BV_NOIDUNG', width: "23%" },
                    { text: "<?php echo lang('activate') ?>", dataField: 'BV_DUYET', width: "10%", columntype: 'textbox', filtertype: 'textbox', align: 'center',
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
                    { text: "<?php echo lang('creates_date') ?>", dataField: 'BV_NGAYDANG', width: "13%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'yyyy-MM-dd', cellsalign: 'right', align: 'right' },
                    { text: "<?php echo lang('edit') ?>", datafield: 'Edit', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            return "<button data-toggle=\"modal\" data-target=\"#modal\" class='icon' onclick='sua(\""+row+"\")'><i class='fa fa-pencil fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('delete') ?>", datafield: 'Delete', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.BV_MA;
                            return "<button class='icon' onclick='xoa(\""+id+"\")'><i class='fa fa-times fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('detail') ?>", datafield: 'detail', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.BV_MA;
                            return "<button class='icon' onclick='chitiet(\""+id+"\")'><i class='fa  fa-search fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('activated') ?>", datafield: 'activated', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.BV_MA;
                            var kichhoat = dataRecord.BV_DUYET;
                            return "<button class='icon' onclick='kichhoat(\""+id+"\",\""+row+"\")'><i class='fa fa-check fa-fw'></i></button>";
                        }
                    }
                ],
            });

            <?php 
                $lang = "vi";
                if(lang('lang') == "en")
                {
                    $lang = "en";
                }
            ?>
            var language = "<?php echo $lang; ?>";
            window.onload = function() {
                CKEDITOR.replace( 'BV_NOIDUNG',
                    {
                        language : language,
                        uiColor : '#F8F8FF',
                        height : 300,
                        toolbarCanCollapse : true
                    }
                );
                
            };

            $("#btngui").click(function(){
                var BV_NOIDUNG = CKEDITOR.instances.BV_NOIDUNG.getData();
                var BV_TIEUDE = $("#BV_TIEUDE").val();
                var DD_MA = $("#DD_MA").val();

                if(BV_TIEUDE == "")
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#F99";
                    $("#BV_TIEUDE").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('title') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#FFF";
                }

                if(BV_NOIDUNG == "")
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#F99";
                    $("#BV_NOIDUNG").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('content') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#FFF";
                }

                if(DD_MA == "")
                {
                    document.getElementById('DD_MA').style.backgroundColor = "#F99";
                    $("#DD_MA").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('place') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('DD_MA').style.backgroundColor = "#FFF";
                }

                var url, data;
                url = "<?php echo base_url(); ?>index.php/baiviet/add?t=" + Math.random();
                data = {
                    "DD_MA" : DD_MA,
                    "BV_TIEUDE" : BV_TIEUDE,
                    "BV_NOIDUNG" : BV_NOIDUNG,
                    "BV_DUYET" : '1'
                };
                console.log(data);
                $.post(url, data, function(data, status){
                    console.log(data);
                    if(status == "success")
                    {
                        if(data.status == "success")
                        {   
                            $("#jqxgrid").jqxGrid('updatebounddata');
                            thongbao("", "<?php echo lang('inserted_successfully'); ?>", "success");
                            $("#BV_TIEUDE").val("");
                            CKEDITOR.instances.BV_NOIDUNG.setData("");
                            $("#DD_MA").jqxDropDownList('selectedIndex','-1');
                        }
                        else
                        {
                            thongbao("", "Không thành công", "danger");
                        }
                    }
                    else
                    {
                        thongbao("", "Lỗi không truyền được dữ liệu!", "danger");
                    }
                    
                }, 'json');
            });

            $("#btnluu").click(function(){
                var BV_NOIDUNG = CKEDITOR.instances.BV_NOIDUNG.getData();
                var BV_TIEUDE = $("#BV_TIEUDE").val();
                var DD_MA = $("#DD_MA").val();
                var BV_MA = $("#BV_MA").html();

                if(BV_TIEUDE == "")
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#F99";
                    $("#BV_TIEUDE").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('title') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#FFF";
                }

                if(BV_NOIDUNG == "")
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#F99";
                    $("#BV_NOIDUNG").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('content') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#FFF";
                }

                if(DD_MA == "")
                {
                    document.getElementById('DD_MA').style.backgroundColor = "#F99";
                    $("#DD_MA").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('place') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('DD_MA').style.backgroundColor = "#FFF";
                }

                var url, data;
                url = "<?php echo base_url(); ?>index.php/baiviet/edit?t=" + Math.random();
                data = {
                    "BV_MA" : BV_MA,
                    "DD_MA" : DD_MA,
                    "BV_TIEUDE" : BV_TIEUDE,
                    "BV_NOIDUNG" : BV_NOIDUNG
                };
                console.log(data);
                $.post(url, data, function(data, status){
                    console.log(data);
                    if(status == "success")
                    {
                        if(data.status == "success")
                        {   
                            $("#jqxgrid").jqxGrid('updatebounddata');
                            thongbao("", "<?php echo lang('updated_successfully'); ?>", "success");
                            $("#BV_TIEUDE").val("");
                            CKEDITOR.instances.BV_NOIDUNG.setData("");
                            $("#DD_MA").jqxDropDownList('selectedIndex','-1');
                        }
                        else
                        {
                            thongbao("", "Không thành công", "danger");
                        }
                    }
                    else
                    {
                        thongbao("", "Lỗi không truyền được dữ liệu!", "danger");
                    }
                    
                }, 'json');
            });

            
            
        });

        $(document).ready(function () {
            var url = "<?php echo base_url(); ?>index.php/diadiem/data";
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'DD_MA' },
                    { name: 'DD_TEN' }
                ],
                url: url,
                async: true
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#DD_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('place') ?>:", displayMember: "DD_TEN", valueMember: "DD_MA", width: "100%", height: 32 });
        });
        $(window).load(function() {
            //$("#DD_MA").jqxDropDownList('selectItem','79');
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

    <div> <!-- modal  -->
        <!-- Large modal -->
        <div  id="modal1" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" style="width: 90%; height: 500px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus fa-fw"></i> <?php echo lang('posts'); ?> <b id="tendiadiem"></b></h4>

                </div>
                <div class="modal-body" style="width: 100%; height: 450px; overflow: auto;">
                    <table width="100%">
                        <tr>
                            <td width="50%">
                                <label for="BV_TIEUDE"><?php echo lang('title'); ?>:</label>
                                [<i id="BV_MA"></i>]
                                <input type="text" class="form-control" id="BV_TIEUDE" placeholder="<?php echo lang('input').' '.lang('title'); ?>">
                            </td>
                            <td style="padding-left: 10px;">
                                <label for="DD_MA"><?php echo lang('place'); ?>:</label>
                                <div style="font-size: 14px;" id="DD_MA"></div>
                            </td>
                        </tr>
                    </table>
                    
                    
                    <label for="usr"><?php echo lang('content'); ?>:</label>
                    <textarea name="BV_NOIDUNG" id="BV_NOIDUNG">&lt;p&gt;<?php //echo lang('input').' '.lang('content'); ?>&lt;/p&gt;</textarea>
                </div>
                <div class="modal-footer">
                    <button id="btnluu" style="margin-left: 10px; width: 100px;" type="button" class="btn btn-default"><?php echo lang('save'); ?></button>

                    <button id="btngui" style="margin-left: 10px; width: 100px;" type="button" class="btn btn-default"><?php echo lang('submit'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    
                </div>
            </div>
          </div>
        </div>
    </div> <!-- dong modal  -->

</body>
</html>