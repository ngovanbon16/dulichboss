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
        function hinhanh(id, tendiadiem)
        {
            var dta, url;
            url = "<?php echo base_url(); ?>index.php/binhluan/anhbinhluan";
            dta = {
                "ma" : id
            };
            console.log(dta);
            $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                if(status == "success")
                {
                    var chuoi = "";
                    for (var i = 0; i < data.data.length; i++) {
                        var ma = data.data[i]['ABL_MA'];
                        var ten = data.data[i]['ABL_TEN'];
                        chuoi += "<span id='"+ten+"' class='span'> <i style='font-size: 20px; color: #D00; position: absolute; margin: 3px; cursor: pointer;' class='fa fa-times' onclick=\"xoahinhbinhluan('"+ten+"');\" ></i> <img src='<?php echo base_url(); ?>uploads/binhluan/" + ten + "' width='100%' height='100%'> <label style='float: right; position: relative;' class=\"checkbox-inline\" ><input name=\"anhbinhluanchk\" class=\"anhbinhluanchk\" style=\"width: 20px; height: 20px; margin-top: -15px;\" type=\"checkbox\" value=\""+ten+"\"></label> </span>";
                    }
                    
                    document.getElementById('hinhbinhluan').innerHTML = chuoi;
                    document.getElementById('tendiadiem').innerHTML = tendiadiem;
                }

            }, 'json');
        }
        function chitiet(id, tendiadiem)
        {
            var dta, url;
            url = "<?php echo base_url(); ?>index.php/binhluan/dataid";
            dta = {
                "ma" : id
            };
            console.log(dta);
            $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                if(status == "success")
                {
                    var chuoi = "<div>Tên bình luận</div>";
                    document.getElementById('dd_ten').innerHTML = data.DD_TEN;
                    document.getElementById('nd_ten').innerHTML = '<img style="border-radius: 50px; border: solid 2px #F8F8FF;" src="<?php echo base_url(); ?>uploads/user/'+data.ND_HINH+'" width="50" height="50"><b style="font-size: 16px; text-transform: capitalize;"> '+data.ND_HO+' '+data.ND_TEN+' (<i>'+data.ND_DIACHIMAIL+'</i>) </b> - '+data.BL_NGAYDANG+' <b><?php echo lang("comment") ?></b> ';
                    document.getElementById('chatluong').innerHTML = data.BL_CHATLUONG;
                    document.getElementById('phucvu').innerHTML = data.BL_PHUCVU;
                    document.getElementById('khonggian').innerHTML = data.BL_KHONGGIAN;

                    mau('chatluong', data.BL_CHATLUONG);
                    mau('phucvu', data.BL_PHUCVU);
                    mau('khonggian', data.BL_KHONGGIAN);
                    var trungbinh = eval("("+data.BL_CHATLUONG+"+"+data.BL_PHUCVU+"+"+data.BL_KHONGGIAN+")/3");
                    trungbinh = parseFloat(trungbinh).toFixed(1);
                    document.getElementById('trungbinh').innerHTML = trungbinh;
                    mau('trungbinh', trungbinh);

                    //document.getElementById('trungbinh').innerHTML = trungbinh;
                    danhgia('danhgiatb', trungbinh);
                    mau('danhgiatb', trungbinh);

                    document.getElementById('bl_tieude').innerHTML = data.BL_TIEUDE;
                    document.getElementById('bl_noidung').innerHTML = data.BL_NOIDUNG;
                }

            }, 'json');
        }

        function mau(id, diem)
        {
            if(diem < 2 && diem >= 0)
            {
                document.getElementById(id).style.color = "#F00";
            }
            if(diem >= 2 && diem < 4)
            {
                document.getElementById(id).style.color = "#F90";
            }
            if(diem >= 4 && diem < 6)
            {
                document.getElementById(id).style.color = "#0CF";
            }
            if(diem >= 6 && diem < 8)
            {
                document.getElementById(id).style.color = "#03F";
            }
            if(diem >= 8 && diem <= 10)
            {
                document.getElementById(id).style.color = "#0D0";
            }
        }

        function danhgia(id, diem)
        {
            if(diem < 2 && diem >= 0)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('bad') ?>";
            }
            if(diem >= 2 && diem < 4)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('medium') ?>";
            }
            if(diem >= 4 && diem < 6)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('rather') ?>";
            }
            if(diem >= 6 && diem < 8)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('good') ?>";
            }
            if(diem >= 8 && diem <= 10)
            {
                document.getElementById(id).innerHTML = "<?php echo lang('great') ?>";
            }
        }

        function kieu(bien)
        {
            var width = "120";
            var height = "130";
            var wtool = "20";
            var htool = "20";
            if(bien == '2')
            {
                var width = "220";
                var height = "200";
                var wtool = "30";
                var htool = "30";
            }
            if(bien == '3')
            {
                var width = "350";
                var height = "250";
                var wtool = "40";
                var htool = "40";
            }
            $(".span").css( "width", width);
            $(".span").css( "height", height);
        }
        function xoahinhbinhluanmain(ten)
        {
            var url, dta;
            url = "<?php echo base_url(); ?>index.php/binhluan/deleteanhbinhluan";
            dta = {
                "ten" : ten
            };

            $.post(url, dta, function(data, status){

                console.log(status);
                console.log(data);
                document.getElementById(ten).style.display = "none";
                thongbao("", "<?php echo lang('deleted_successfully') ?>", "success");

            }, 'json');
        }

        function xoahinhbinhluan(ten)
        {
            if(!confirm("<?php echo lang('are_you_sure') ?>"))
            {
                return;
            }
            xoahinhbinhluanmain(ten);
        }

        function xoaanhbinhluanchk()
        {
            if(!confirm("<?php echo lang('are_you_sure') ?>"))
            {
                return;
            }
            var chk = document.getElementsByName("anhbinhluanchk");
            var chuoi = "";
            for (var i = 0; i < chk.length; i++) {
                if(chk[i].checked)
                {
                    xoahinhbinhluanmain(chk[i].value);
                }
            }
        }
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            $("#checkAllabl").change(function () {
                $(".anhbinhluanchk").prop('checked', $(this).prop("checked"));
            });

            $(".tool").jqxButton({ template: "" });

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
                pagesize: 15,
                pagesizeoptions: ['10', '15', '20', '25', '30', '50'],

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
                    { text: "<?php echo lang('key') ?>", dataField: 'BL_MA', width: "5%", cellsalign: 'center', align: "center", },
                    { text: "<?php echo lang('name') ?>", dataField: 'DD_TEN', width: "15%" },
                    { text: "<?php echo lang('email') ?>", dataField: 'ND_DIACHIMAIL', width: "15%", /*filtertype: 'checkedlist'*/ },
                    { text: "<?php echo lang('title') ?>", dataField: 'BL_TIEUDE', width: "19%" },
                    { text: "<?php echo lang('content') ?>", dataField: 'BL_NOIDUNG', width: "20%" },
                    { text: "<?php echo lang('creates_date') ?>", dataField: 'BL_NGAYDANG', width: "13%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'yyyy-MM-dd', cellsalign: 'right', align: "right", },
                    { text: "<?php echo lang('delete') ?>", datafield: 'Delete', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.BL_MA;
                            return "<button class='icon' onclick='xoa(\""+id+"\")'><i class='fa fa-times fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('photos') ?>", datafield: 'photos', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.BL_MA;
                            var ten = dataRecord.DD_TEN;
                            return "<button data-toggle=\"modal\" data-target=\"#modalbinhluan\" class='icon' onclick='hinhanh(\""+id+"\",\""+ten+"\")'><i class='fa fa-photo fa-fw'></i></button>";
                        }
                    },
                    { text: "<?php echo lang('detail') ?>", datafield: 'detail', columntype: 'number', width: "40", sortable: false, filterable: false, pinned: true, align: "center", 
                        cellsrenderer: function (row, column, value) {
                            var offset = $("#jqxgrid").offset();
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                            var id = dataRecord.BL_MA;
                            var ten = dataRecord.DD_TEN;
                            return "<button data-toggle=\"modal\" data-target=\"#modalchitiet\" class='icon' onclick='chitiet(\""+id+"\",\""+ten+"\")'><i class='fa fa-search fa-fw'></i></button>";
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
        .span{
            position: relative;
            float: left; 
            margin: 5px; 
            width: 220px; 
            height: 180px; 
            border: solid 1px #888;
            border-radius: 2px;
            box-shadow: 0 0 3px rgba(0,0,0,4);
            -moz-box-shadow: 0 0 3px rgba(0,0,0,4);
            -webkit-box-shadow: 0 0 3px rgba(0,0,0,4);
            -o-box-shadow: 0 0 3px rgba(0,0,0,4);
        }
        .danhgia{
            text-align: center;
            margin: 5px;
            padding: 10px;
            border-radius: 3px;
            border: solid 1px #F8F8FF;
            box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        }
        .diemdg{
            width: 100px;
            height: 100px;
            padding: 5px;
            margin-right: 10px;
            border-radius: 50%;
            border: solid 1px #F8F8FF;
            font-weight: bolder;
            box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
            -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        }
    </style>
</head>
<body class='default'>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana;">
        <div id="jqxgrid">
        </div>
    </div>

    <div> <!-- modal binh luan -->
        <!-- Modal -->
        <div id="modalbinhluan" class="modal fade" role="dialog" tabindex="-1">
          <div class="modal-dialog" style="width: 90%; ">

            <!-- Modal content-->
            <div class="modal-content" style="height: 550px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <button class="tool" onclick="kieu('1')"><i class="fa fa-th"></i></button>
                    <button class="tool" onclick="kieu('2')"><i class="fa fa-th-list"></i></button>
                    <button class="tool" onclick="kieu('3')"><i class="fa fa-th-large"></i></button>
                    <i class="fa fa-comments-o fa-fw"></i> <b style="text-transform: capitalize;" id="tendiadiem"><?php echo lang('comment') ?></b> 
                </h4>
              </div>
              <div style="width: 100%; height: 430px; overflow: auto;" id="hinhbinhluan" class="modal-body">
                ...
              </div>
                <div class="modal-footer">
                    <label><input style="font-weight: bold; width: 20px; height: 20px; float: left; margin-top: 0px;" type="checkbox" id="checkAllabl"/> <?php echo lang('check_all') ?></label>
                    <button class="tool" onclick="xoaanhbinhluanchk()"><i class="fa fa-trash-o"></i></button>
                    
                </div>
            </div>

          </div>
        </div>
    </div> <!-- dong modal binh luan -->

    <div> <!-- modal binh luan -->
        <!-- Modal -->
        <div id="modalchitiet" class="modal fade" role="dialog" tabindex="-1">
          <div class="modal-dialog" style="width: 60%; ">

            <!-- Modal content-->
            <div class="modal-content" style="height: 400px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-comments-o fa-fw"></i> <b style="text-transform: capitalize;" id="dd_ten"><?php echo lang('comment') ?></b> 
                </h4>
              </div>
              <div style="width: 100%; overflow: auto;" class="modal-body">
                  <div id="nd_ten"></div>
                  <div class="danhgia">
                        <b><?php echo lang('quality') ?>: </b>
                        <span class="diemdg" id="chatluong"></span>
                        <b><?php echo lang('service') ?>: </b>
                        <span class="diemdg" id="phucvu"></span>
                        <b><?php echo lang('space') ?>: </b>
                        <span class="diemdg" id="khonggian"></span>
                        <b><?php echo lang('average') ?>: </b>
                        <span class="diemdg" id="trungbinh"></span>
                        <span id="danhgiatb"></span>
                  </div>
                  <div style="margin: 5px 0px 5px 0px; font-weight: bolder; font-size: 20px; text-transform: capitalize; font-style: italic;" id="bl_tieude"></div>
                  <div style="font-size: 16px;" id="bl_noidung"></div>
              </div>
                <!-- <div class="modal-footer">
                        
                </div> -->
            </div>

          </div>
        </div>
    </div> <!-- dong modal binh luan -->

</body>
</html>