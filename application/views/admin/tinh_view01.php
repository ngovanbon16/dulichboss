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
    
    <script type="text/javascript">
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

            $("#next").jqxButton({ width: '80', height: '30'});
            $("#back").jqxButton({ width: '80', height: '30'});

            var size = $("#oncepage").val();
            var total = "0";
                
            var url, dta;
            url = "<?php echo base_url(); ?>index.php/tinh/countAll";
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
                load(page, true);
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
                if(numpage == 0)
                {
                    load(page, true);
                }
                else
                {
                    load(page, false);
                }
                
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
                if(numpage == 0)
                {
                    load(page, true);
                }
                else
                {
                    load(page, false);
                }
            });

            function load(page, show)
            {

                $("#numberpage").html(numpage + 1 + " / " + page);

                var url = "<?php echo base_url(); ?>index.php/tinh/data1/"+size+"/"+star;
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'T_MA', type: 'int' },
                        { name: 'T_TEN', type: 'string' }
                    ],
                    //root: "entry",
                    //record: "content",
                    id: 'T_MA',
                    url: url,
                    pager: function (pagenum, pagesize, oldpagenum) {
                        // callback called when a page or page size is changed.
                    },
                    updaterow: function (rowid, rowdata, commit) {
                        url = "<?php echo base_url(); ?>index.php/tinh/add";
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

                    editable: true, // cho truc tiep tren bang hay khong

                    showeverpresentrow: show,
                    everpresentrowposition: "top",
                    /*showtoolbar: true,*/
                    columns: [
                        { text: 'Mã', /*columntype: 'textbox', filtertype: 'input',*/ datafield: 'T_MA', width: "20%", cellsalign: 'center' },
                        { text: 'Tên', /*columntype: 'textbox', filtertype: 'input',*/ datafield: 'T_TEN', width: "40%" },
                        { text: 'Sửa', datafield: 'Edit', columntype: 'button', width: "20%", cellsrenderer: function () {
                                return "Edit";
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
                        { text: 'Xóa', datafield: 'Delete', columntype: 'button', width: "20%", cellsrenderer: function () {
                                return "Delete";
                              }, buttonclick: function (row) {
                                var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                                var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                                    var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                                    var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                                }

                             }
                        }
                      
                    ],
                });
            }

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

            /*$("#back").click(function(){
            numpage--;
            star = numpage*size;

            if(numpage < 0)
            {
                numpage = 0;
                return;
            }

            var page = Math.ceil(total/size);
            $("#numberpage").html(numpage + 1 + " / " + page);

            var url = "<?php echo base_url(); ?>index.php/tinh/data1/"+size+"/"+star;
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'T_MA', type: 'int' },
                    { name: 'T_TEN', type: 'string' }
                ],
                //root: "entry",
                //record: "content",
                id: 'T_MA',
                url: url,
                pager: function (pagenum, pagesize, oldpagenum) {
                    // callback called when a page or page size is changed.
                }
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#jqxgrid").jqxGrid(
            {
                width: "50%",
                source: dataAdapter,
                selectionmode: 'multiplerowsextended',
                sortable: true,
                pageable: true,
                autoheight: true,
                columnsresize: true,
                showfilterrow: true,
                filterable: true,
                columns: [
                    { text: 'Mã', columntype: 'textbox', filtertype: 'input', datafield: 'T_MA', width: "20%", cellsalign: 'center' },
                    { text: 'Tên', columntype: 'textbox', filtertype: 'input', datafield: 'T_TEN', width: "80%" }
                  
                ]
            });
            });*/
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
        <div id="popupWindow">
            <div>Sửa</div>
            <div style="overflow: hidden;">
                <table>
                    <tr>
                        <td align="right">Mã tỉnh:</td>
                        <td align="left"><input id="T_MA" /></td>
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
    </div>
</body>
</html>