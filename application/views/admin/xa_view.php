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
        function sua(row)
        {
            thongbao("", "<?php echo lang('feature_is_being_updated') ?>", "info");
            /*editrow = row;
            var offset = $("#jqxgrid").offset();
            $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60 } });
            // get the clicked row's data and initialize the input fields.
            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
            $("#X_MA").val(dataRecord.X_MA);
            $("#X_TEN").val(dataRecord.X_TEN);
            // show the popup window.
            $("#popupWindow").jqxWindow('open');*/
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
            //setTimeout("location.href = '<?php echo base_url(); ?>index.php/xa/detail/"+id+"';",0);
        }
        $(document).ready(function () {
            $.jqx.theme = "bootstrap";

            var url = "<?php echo base_url(); ?>index.php/tinh/data";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'T_MA' },
                    { name: 'T_TEN' }
                ],
                url: url,
                async: true
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            var matinh = "1";
            var indextinh = "<?php if(isset($indextinh)){ echo $indextinh; } else { echo '-1'; } ?>";
            // Create a jqxInput
            $("#jqxInput").jqxDropDownList({selectedIndex: indextinh, source: dataAdapter, placeHolder: "<?php echo lang('provincial') ?>", displayMember: "T_TEN", valueMember: "T_MA", width: 200, height: 30});
            $("#jqxInput").on('select', function (event) {
                if (event.args) {
                    var item = event.args.item;
                    if (item) {
                        var valueelement = $("<div></div>");
                        valueelement.text("Mã tỉnh: " + item.value);
                        var labelelement = $("<div></div>");
                        labelelement.text("Tên tỉnh: " + item.label);
                        $("#selectionlog").children().remove();
                        $("#selectionlog").append(labelelement);
                        $("#selectionlog").append(valueelement);
                        matinh = item.value;
                        tentinh = item.label;
                        window.location="<?php echo base_url(); ?>index.php/xa/chontinh/"+matinh+"/"+tentinh;
                    }
                }
            });

            $("#Save").jqxButton({ template: "success" });
            $("#Cancel").jqxButton({ template: "danger" });

            var data = {};
            var url = "<?php echo base_url(); ?>index.php/xa/data0";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'X_MA', type: 'number' },
                    { name: 'X_TEN', type: 'string' },
                    { name: 'T_MA', type: 'string' },
                    { name: 'T_TEN', type: 'string' },
                    { name: 'H_MA', type: 'string' },
                    { name: 'H_TEN', type: 'string' }
                ],
                //root: "entry",
                //record: "content",
                id: 'X_MA',
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
                    url = "<?php echo base_url(); ?>index.php/xa/add";
                    
                    rowData.X_MA = rowID; 
                    console.log(rowData);

                    $.post(url, rowData, function(data, status){
                        console.log(status);
                        console.log(data);
                        if(status == "success")
                        {
                            if(data.status == "error")
                            {
                                commit(false);
                                var error = data.msg["error"];
                                thongbao("", error, "danger");
                            }
                            else
                            {
                                commit(true);
                                thongbao("", "<?php echo lang('inserted_successfully') ?>", "success");
                                document.getElementById('add').innerHTML = data.add;
                            }
                        }
                    }, 'json');
                },
                updaterow: function (rowid, rowdata, commit) {
                    // synchronize with the server - send update command
                   /* var data = "update=true&X_TEN=" + rowdata.X_TEN;
                    data = data + "&H_TEN=" + rowdata.H_TEN;
                    console.log(data);
                    $.ajax({
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>index.php/xa/data0',
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
                    });*/

                    var add = document.getElementById("add").innerHTML;
                    if(add == '0')
                    {
                        commit(false);
                        thongbao("", "<?php echo lang('please_refresh_the_page_before_you_update_or_delete_data') ?>", "danger");
                    }
                    else
                    {
                        url = "<?php echo base_url(); ?>index.php/xa/data0";
                        rowdata["update"] = "true"; 
                        console.log(rowdata);
                        $.post(url, rowdata, function(data, status){

                            console.log(status);
                            console.log(data);
                            if(status == "success")
                            {   
                                if(data.status == "error")
                                {
                                    thongbao("", data.msg["error"], "danger");
                                }
                                else
                                {
                                    commit(true);
                                    thongbao("", "<?php echo lang('updated_successfully') ?>", "success");
                                }
                            }
                        }, 'json');  
                    }
                    
                },
                deleterow: function (rowid, commit) {
                    var add = document.getElementById("add").innerHTML;
                    if(add == '0')
                    {
                        commit(false);
                        thongbao("", "<?php echo lang('please_refresh_the_page_before_you_update_or_delete_data') ?>", "danger");
                    }
                    else
                    {
                        var dta, url, test;
                        url = "<?php echo base_url(); ?>index.php/xa/delete";
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
                                    thongbao("", data.msg["error"], "danger");
                                }
                                else
                                {
                                    commit(true);
                                    thongbao("", "<?php echo lang('deleted_successfully') ?>", "success");
                                }
                            }
                        }, 'json');  
                    }
                },

            };
            var dataAdapter = new $.jqx.dataAdapter(source);

            var getSourceAdapter = function (name) {
                var url = "<?php echo base_url(); ?>index.php/huyen/data2";
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'H_MA' },
                        { name: 'H_TEN' }
                    ],
                    url: url,
                    async: true
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                return dataAdapter;
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
                    /*{
                      text: "<?php echo lang('key') ?>", columntype: 'textbox', datafield: 'X_MA', width: "20%", cellsalign: 'center', align: "center", editable: false,
                      validateEverPresentRowWidgetValue: function (datafield, value, rowValues) {
                            var reg = /^\d+$/;
                            if(!reg.test(value) && value != "")
                            {
                                return { message: "<?php echo lang('code_must_be_a_positive_integer') ?>", result: false };
                            }
                            return true;
                        }
                    },*/
                    {
                      text: "<?php echo lang('name') ?>", columntype: 'textbox', datafield: 'X_TEN', width: "40%", cellsalign: 'left', align: "left",
                      validateEverPresentRowWidgetValue: function (datafield, value, rowValues) {
                          if (!value) {
                              return { message: "<?php echo lang('please_input').' '.lang('name') ?>", result: false };
                          }
                          return true;
                        }
                    },
                    {
                      text: "<?php echo lang('district') ?>", /*filtertype: 'checkedlist',*/ datafield: 'H_TEN', width: "46%", editable: false,
                      createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
                          var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
                          inputTag.jqxDropDownList({ popupZIndex: 99999999, placeHolder: "<?php echo lang('enter').' '.lang('district') ?>: ", source: getSourceAdapter("H_TEN"), displayMember: 'H_TEN', valueMember: "H_MA", width: '100%', height: 30 });
                          $(document).on('keydown.H_TEN', function (event) {
                              if (event.keyCode == 13) {
                                  if (event.target === inputTag[0]) {
                                      addCallback();
                                  }
                                  else if ($(event.target).ischildof(inputTag)) {
                                      addCallback();
                                  }
                              }
                          });
                          return inputTag;
                      },
                      getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
                          var selectedItem = htmlElement.jqxDropDownList('getSelectedItem');
                          if (!selectedItem)
                              return "";
                          var value = selectedItem.label;
                          return value;
                      },
                      resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
                          htmlElement.jqxDropDownList('clearSelection');
                      },
                      validateEverPresentRowWidgetValue: function (datafield, value, rowValues) {
                          if (!value) {
                              return { message: "<?php echo lang('please_input').' '.lang('provincial') ?>", result: false };
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
                            var id = dataRecord.X_MA;
                            return "<button class='icon' onclick='xoa(\""+id+"\")'><i class='fa fa-times fa-fw'></i></button>";
                        }
                    }
                ],
            });

            // initialize the popup window and buttons.
            $("#popupWindow").jqxWindow({
                width: 250, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01           
            });
            $("#popupWindow").on('open', function () {
                $("#X_MA").jqxInput('selectAll');
            });
         
            $("#Cancel").jqxButton({ });
            $("#Save").jqxButton({ });
            $("#X_MA").jqxInput({ });
            $("#X_TEN").jqxInput({ });
            // update the edited row when the user clicks the 'Save' button.
            $("#Save").click(function () {
                if (editrow >= 0) {
                    var row = { X_MA: $("#X_MA").val(), X_TEN: $("#X_TEN").val()
                    };
                    var rowID = $('#jqxgrid').jqxGrid('getrowid', editrow);
                    $('#jqxgrid').jqxGrid('updaterow', rowID, row);
                    $("#popupWindow").jqxWindow('hide');
                    //$("#jqxgrid").jqxGrid('updatebounddata');
                }
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
    <div id='jqxInput'></div> <div style="display: none;" id="add">1</div>
    <!-- <div id="selectionlog"></div> -->
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana;">
        <div id="jqxgrid">
        </div>
    </div>

    <div id="popupWindow">
        <div><?php echo lang('edit') ?></div>
        <div style="overflow: hidden;">
            <table>
                <tr>
                    <td width="50" align="center">  <?php echo lang('key') ?></td>
                    <td align="left"><input id="X_MA" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td align="center"> <?php echo lang('name') ?></td>
                    <td align="left"><input id="X_TEN" /></td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="button" id="Save" value="<?php echo lang('save') ?>" /><input id="Cancel" type="button" value="<?php echo lang('cancel') ?>" /></td>
                </tr>
            </table>
        </div>
   </div>

</body>
</html>