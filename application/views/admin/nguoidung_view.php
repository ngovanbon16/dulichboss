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

    <script type="text/javascript">
            function openSuccess(str)
            {
                $("#result").html(str);
                $("#notiSuccess").jqxNotification("open");
                $("#notiSuccess").jqxNotification("open");
            }

            function openError(str)
            {
                $("#error").html(str);
                $("#notiError").jqxNotification("open");
                $("#notiError").jqxNotification("open");
            }

        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            var notificationWidth = 300;

            $("#notiSuccess").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 1000, template: "success"
            });

            $("#notiError").jqxNotification({
                width: notificationWidth, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 1000, template: "error"
            });

            $("#next").jqxButton({ width: '80', height: '30'});
            $("#back").jqxButton({ width: '80', height: '30'});

            var size = $("#oncepage").val();
            var total = "0";
                
            var url, dta;
            url = "<?php echo base_url(); ?>index.php/nguoidung/countAll";
            $.post(url, function(data, status){
                console.log(status);
                console.log(data);
                total = data.total;
                var page = Math.ceil(total/size);
                $("#numberpage").html("0 / " + page);
            }, 'json');

            var star = 0;
            var numpage = -1;

            $("#oncepage").change(function(){
                //alert("chao");
                size = this.value;
                var page = Math.ceil(total/size);
                $("#numberpage").html(page);
                numpage = 0;
                star = numpage*size;
                if(numpage > page - 1)
                {
                    numpage = page - 1;
                    return;
                }
                load(page);
            });

            $("#next").click(function(){
                numpage++;
                star = numpage*size;

                var page = Math.ceil(total/size);

                if(numpage > page - 1)
                {
                    numpage = page - 1;
                    return;
                }
                load(page);
                
            });

            $("#back").click(function(){
                numpage--;
                star = numpage*size;
                if(numpage < 0)
                {
                    numpage = 0;
                    return;
                }
                var page = Math.ceil(total/size);
                load(page);
            });

            function load(page)
            {

                $("#numberpage").html(numpage + 1 + " / " + page);

                var url = "<?php echo base_url(); ?>index.php/nguoidung/data1/"+size+"/"+star;
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'ND_MA', type: 'number' },
                        { name: 'ND_HO', type: 'string' },
                        { name: 'ND_TEN', type: 'string' },
                        { name: 'ND_DIACHIMAIL', type: 'string' },
                        { name: 'ND_KICHHOAT', type: 'bool' },
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
                                //alert(data.status);
                                if(data.status == "error")
                                {
                                    //alert("Mã không tồn tại!");
                                    openError(data.msg['ma']);
                                }
                                else
                                {
                                    commit(true);
                                    openSuccess("Xóa thành công");
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
                    pagermode: 'simple', // kieu phan trang
                    autoheight: true,
                    columnsresize: true,
                    showfilterrow: true, // hien thi tim kiem
                    filterable: true, // hien thi du lieu
                    selectionmode: 'checkbox',

                    /*editable: true, // cho truc tiep tren bang hay khong

                    showeverpresentrow: show,
                    everpresentrowposition: "top",*/
                    showtoolbar: true,

                    rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'></div>");
                    toolbar.append(container);
                    container.append('<input id="addrowbutton" type="button" value="Thêm" />');
                    container.append('<input style="margin-left: 5px;" id="deleterowbutton" type="button" value="Xóa" />');
                    $("#addrowbutton").jqxButton();
                    $("#deleterowbutton").jqxButton();
                    // create new row.
                    $("#addrowbutton").on('click', function () {
                        setTimeout("location.href = '<?php echo site_url('registration'); ?>';",0);
                    });
                    // delete row.
                    $("#deleterowbutton").on('click', function () {
                       

                        for (var i = 0; i < size; i++) {
                            var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                            var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                            if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                                var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                                var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                            }
                        };
                    });
                },

                    columns: [
                        { text: 'Mã', dataField: 'ND_MA', width: "5%", cellsalign: 'center' },
                        { text: 'Họ', dataField: 'ND_HO', width: "10%" },
                        /*{ text: 'Mã người dùng', dataField: 'ND_MA', width: "10%" },*/
                        { text: 'Tên', dataField: 'ND_TEN', width: "13%" },
                        { text: 'Email', dataField: 'ND_DIACHIMAIL', width: "20%" },
                        { text: 'Kích hoạt', dataField: 'ND_KICHHOAT', width: "5%", columntype: 'checkbox', filtertype: 'bool' },
                        { text: 'Ngày cập nhật', dataField: 'ND_NGAYCAPNHAT', width: "10%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'd', cellsalign: 'right' },
                        { text: 'Ngày tạo', dataField: 'ND_NGAYTAO', width: "10%", columntype: 'datetimeinput', filtertype: 'range', cellsformat: 'd', cellsalign: 'right' },
                        { text: 'Sửa', datafield: 'Edit', columntype: 'button', width: "8%", cellsrenderer: function () {
                                return "Sửa";
                                /*<img src='<?php echo base_url(); ?>assets/images/edit.png'>*/
                              }, buttonclick: function (row) {
                                // open the popup window when the user clicks a button.
                                //editrow = row;
                                var offset = $("#jqxgrid").offset();
                                var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                                var id = dataRecord.ND_MA;
                                console.log(id);
                                setTimeout("location.href = '<?php echo base_url(); ?>index.php/nguoidung/edit/"+id+"';",0);
                            }
                        },
                        { text: 'Xóa', datafield: 'Delete', columntype: 'button', width: "8%", cellsrenderer: function () {
                                return "Xóa";
                              }, buttonclick: function (row) {
                                //editrow = row;
                                var offset = $("#jqxgrid").offset();
                                var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                                var id = dataRecord.ND_MA;
                                console.log(id);
                                var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                             }
                        },
                        { text: 'Chi tiết', datafield: 'detail', columntype: 'button', width: "8%", cellsrenderer: function () {
                                return "Chi tiết";
                              }, buttonclick: function (row) {
                                // open the popup window when the user clicks a button.
                                var offset = $("#jqxgrid").offset();
                                var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', row);
                                var id = dataRecord.ND_MA;
                                console.log(id);
                                setTimeout("location.href = '<?php echo base_url(); ?>index.php/aenguoidung/detail/"+id+"';",0);
                            }
                        },
                      
                    ],
                });
            }
        });
    </script>
    <style type="text/css">
        #numberpage{
            padding-left: 5px;
        }
        #oncepage{
            width: 80px;
            height: 30px;
            border-radius: 5px;
            opacity: 0.7;
        }
    </style>
</head>
<body class='default'>
    <div id="notiSuccess">
        <div id="result">Thông báo thành công!</div>
    </div>
    <div id="notiError">
        <div id="error">Thông báo lỗi!</div>
    </div>

    <table>
        <tr>
            <td>
                <select id="oncepage">
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="500">500</option>
                    <option value="1000">1000</option>
                </select>
                <button id="back">Back</button><button id="next">Next</button> 
                Trang:
            </td>
            <td>
                <div id="numberpage"></div>
            </td>
        </tr>
    </table>
    
    <br/>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana;">
        <div id="jqxgrid">
        </div>
    </div>
</body>
</html>