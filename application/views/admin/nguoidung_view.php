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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxloader.js"></script>

    <script type="text/javascript">
        function sua(id)
        {
            setTimeout("location.href = '<?php echo base_url(); ?>nguoidung/edit/"+id+"';",0);
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
            //setTimeout("location.href = '<?php echo base_url(); ?>nguoidung/detail/"+id+"';",0);
        }
        function kichhoat(id, row)
        {
            $("#jqxgrid").hide();
            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
            var kichhoat = dataRecord.ND_KICHHOAT;
            var email = dataRecord.ND_DIACHIMAIL;

            if(kichhoat == "0")
            {
                thongbao("", "<?php echo lang('not_activated') ?>", "danger");
                $("#jqxgrid").show();
            }

            if(kichhoat == "-1")
            {
                mscConfirm({
                    title: "<?php echo lang('notification') ?>",

                    subtitle: "<?php echo lang('are_you_sure') ?>",  // default: ''

                    okText: "<?php echo lang('i_agree') ?>",    // default: OK

                    cancelText: "<?php echo lang('i_dont') ?>", // default: Cancel

                    onOk: function() {
                        var commit = $("#jqxgrid").jqxGrid('updaterow', id, $("#jqxgrid").jqxGrid('getrowdata', row));
                        $("#jqxgrid").show();
                    },

                    onCancel: function() {
                        $("#jqxgrid").show();
                    }
                });
            }
            if(kichhoat == "1")
            {
                mscPrompt({
                  title: '<?php echo lang('notification') ?>',

                  subtitle: '<?= lang('what_is_the_reason') ?>',  // default: ''

                  okText: '<?= lang("send")." ".lang("email") ?>',    // default: OK

                  cancelText: '<?= lang("no")." ".lang("send")." ".lang("email") ?>', // default: Cancel,

                  placeholder: '<?= lang("input")." ".lang("reason") ?>...', // default: empty, placeholder for input text box

                  onOk: function(val) {
                    //mscAlert("Your email: "+val+" has subscribed to the newsletter.");
                    $("#jqxgrid").jqxGrid('updaterow', id, $("#jqxgrid").jqxGrid('getrowdata', row));

                    $('#jqxLoader').jqxLoader('open');
                    var dta, url;
                    url = "<?php echo base_url(); ?>nguoidung/guimailkhoataikhoan";
                    data = {
                        "email" : email,
                        "noidung" : val
                    };
                    console.log(data);
                    $.ajax({
                          url : url,
                          type : 'post',
                          dataType : 'json',
                          data : data,
                          success : function (data){
                            console.log(data);
                            if(data.status != "error")
                            {
                                thongbao("", email+" <?= lang('locked') ?>", "success");
                            }
                            else
                            {
                                thongbao("", "<?= lang('email_hasnt_been_sent') ?>", "danger");
                            }
                            
                            $('#jqxLoader').jqxLoader('close');
                            $("#jqxgrid").show();
                          }
                      });
                  },

                  onCancel: function() {
                    //mscAlert(":( You cancelled on me.");
                    //thongbao("", "<?= lang('cancel') ?>", "danger");
                    $("#jqxgrid").jqxGrid('updaterow', id, $("#jqxgrid").jqxGrid('getrowdata', row));
                    $("#jqxgrid").show();
                  }
                });
            }
        }
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            $("#jqxLoader").jqxLoader({ isModal: true, text: "<?php echo lang('sending') ?>...", width: 100, height: 60, imagePosition: 'top' });

            var data = {};
            var url = "<?php echo base_url(); ?>nguoidung/data0";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'T_MA', type: 'string' },
                    { name: 'NQ_MA', type: 'string' },
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
                        url: '<?php echo base_url(); ?>nguoidung/data0',
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
                    var dta, url;
                    url = "<?php echo base_url(); ?>nguoidung/delete";
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
                pagesize: 15,
                pagesizeoptions: ['10', '15', '20', '25', '30', '50'],

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
                        setTimeout("location.href = '<?= base_url(); ?>registration';",0);
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
                    { text: "<?php echo lang('key') ?>", dataField: 'T_MA', width: "5%", cellsalign: 'center', align: "center", },
                    { text: "<?php echo lang('key') ?>", dataField: 'ND_MA', width: "5%", cellsalign: 'center', align: "center", },
                    { text: "<?php echo lang('lastname') ?>", dataField: 'ND_HO', width: "5%" },
                    /*{ text: 'Mã người dùng', dataField: 'ND_MA', width: "10%" },*/
                    { text: "<?php echo lang('firstname') ?>", dataField: 'ND_TEN', width: "10%" },
                    { text: "<?php echo lang('email') ?>", dataField: 'ND_DIACHIMAIL', width: "16%" },
                    { text: "<?php echo lang('activate') ?>", dataField: 'ND_KICHHOAT', width: "9%", columntype: 'textbox', filtertype: 'textbox', align: 'center',
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
                    { text: "<?php echo lang('updates_day') ?>", dataField: 'ND_NGAYCAPNHAT', width: "8%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'yyyy-MM-dd', cellsalign: 'right', align: 'right' },
                    { text: "<?php echo lang('creates_date') ?>", dataField: 'ND_NGAYTAO', width: "8%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'yyyy-MM-dd', cellsalign: 'right', align: 'right' },
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
                    /*{ text: "<?php echo lang('detail') ?>", datafield: 'detail', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.ND_MA;
                            return "<button class='icon' onclick='chitiet(\""+id+"\")'><i class='fa fa-search fa-fw'></i></button>";
                        }
                    },*/
                    { text: "<?php echo lang('blocked') ?>", datafield: 'blocked', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.ND_MA;
                            var kichhoat = dataRecord.ND_KICHHOAT;
                            if(kichhoat == '1')
                            {
                                return "<button class='icon' onclick='kichhoat(\""+id+"\",\""+row+"\")'><i id='"+id+"' class='fa fa-unlock fa-fw'></i></button>";
                            }
                            else
                            {
                                return "<button class='icon' onclick='kichhoat(\""+id+"\",\""+row+"\")'><i id='"+id+"' class='fa fa-lock fa-fw'></i></button>";
                            }
                            
                        }
                    },
                    { text: "<?php echo lang('authority_groups') ?>", dataField: 'NQ_MA', width: "15%", filterable: false, pinned: true, cellsalign: 'center', align: "left", columntype: 'number',
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.ND_MA;
                            var NQ_MA = dataRecord.NQ_MA;

                            var dta, url;
                            url = "<?php echo base_url(); ?>nhomquyen/data";
                            dta = {
                                "ma" : id
                            };
                            /*console.log(dta);*/
                            $.post(url, dta, function(data, status){
                                /*console.log(status);
                                console.log(data);*/
                                if(status == "success")
                                {   
                                    var str = '<select class="select" onchange="change('+id+', (this).value)">';
                                    var admin = "<?php echo $this->session->userdata['NQ_MA']; ?>";
                                      
                                    for (var i = 0; i < data.length; i++) {
                                        var ma = data[i]['NQ_MA'];
                                        var ten = data[i]['NQ_TEN'];
            
                                        if(admin == "1")
                                        {
                                            if(ma == NQ_MA)
                                                str += '<option value="'+ma+'" selected>'+ten+'</option>';
                                            else
                                                str += '<option value="'+ma+'" >'+ten+'</option>';
                                        }
                                        else
                                        {
                                            if(ma != "1")
                                            {
                                                if(ma == NQ_MA)
                                                    str += '<option value="'+ma+'" selected>'+ten+'</option>';
                                                else
                                                    str += '<option value="'+ma+'" >'+ten+'</option>';
                                            }
                                        }

                                    }
                                    str += "</select>";
                                    document.getElementById(id+"a").innerHTML = str;
                                }
                            }, 'json');

                            return "<div id='"+id+"a'></div>";
                        }
                    }
                ],
            });
            
        });

        function change(id, manq)
        {
            var dta, url;
            url = "<?php echo base_url(); ?>nguoidung/updatenhomquyen";
            dta = {
                "ND_MA" : id,
                "NQ_MA" : manq
            };
            console.log(dta);
            $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                if(status == "success")
                {   
                    if(data.status == "error")
                    {
                        thongbao("", "Error", "danger");
                    }
                    else
                    {
                        thongbao("", "<?php echo lang('updated_successfully') ?>", "success");
                    }
                }
            }, 'json');  
        }
    </script>
    <style type="text/css">
        .select{
            width: 100%;
            height: 28px;
        }
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
    <div id="jqxLoader"></div>
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