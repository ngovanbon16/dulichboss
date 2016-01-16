<!DOCTYPE html>
<html lang="en">
<head>
    <title id='Description'>In this demo the jqxInput is bound to JSON data.</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxinput.js"></script>

    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdatatable.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdropdownlist.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtooltip.js"></script> 
    

</head>
<body>
    <div id='content'>
        <script type="text/javascript">
            $(document).ready(function () {
                
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
                // Create a jqxInput
                $("#jqxInput").jqxDropDownList({ source: dataAdapter, placeHolder: "Tên tỉnh:", displayMember: "T_TEN", valueMember: "T_MA", width: 200, height: 25});
                
                /*$("#jqxInput").jqxDropDownList({
                    selectedIndex: 2, source: dataAdapter, displayMember: "T_MA", valueMember: "T_TEN", width: 200, height: 25
                });*/

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

                            //alert(item.value);
                            //var url1 = "<?php echo base_url(); ?>index.php/huyen/data/"+item.value;
                            // prepare the data
                            var orderdetailsurl = "<?php echo base_url(); ?>index.php/huyen/data/"+item.value;
                            var ordersSource =
                            {
                                dataFields: [
                                    { name: 'H_MA', type: 'number' },
                                    { name: 'H_TEN', type: 'string' }
                                ],
                                dataType: "json",
                                id: 'H_MA',
                                url: orderdetailsurl,
                                addRow: function (rowID, rowData, position, commit) {
                                    //alert("ID: " + rowID + " | rowData: " + rowData);

                                    // synchronize with the server - send insert command
                                    // call commit with parameter true if the synchronization with the server is successful 
                                    // and with parameter false if the synchronization failed.
                                    // you can pass additional argument to the commit callback which represents the new ID if it is generated from a DB.
                                    commit(true);
                                },
                                updateRow: function (rowID, rowData, commit) {

                                    url = "<?php echo base_url(); ?>index.php/huyen/add";
                                    rowData["T_MA"] = item.value; 
                                    //alert(item.value);
                                    console.log(rowData);

                                    $.post(url, rowData, function(data, status){
                                        console.log(status);
                                        console.log(data);
                                        console.log(data.data);
                                        if(status == "success")
                                        {
                                            if(data.status == "error")
                                            {
                                                alert("Tên không được trùng lập!");
                                            }
                                            else
                                            {
                                                commit(true);
                                            }
                                        }
                                    }, 'json');
                                    // synchronize with the server - send update command
                                    // call commit with parameter true if the synchronization with the server is successful 
                                    // and with parameter false if the synchronization failed.
                                },
                                deleteRow: function (rowID, commit) {
                                    // synchronize with the server - send delete command
                                    // call commit with parameter true if the synchronization with the server is successful 
                                    // and with parameter false if the synchronization failed.
                                    //alert(rowID);
                                    //console.log(item.value);
                                    var dta, url;
                                    url = "<?php echo base_url(); ?>index.php/huyen/delete";
                                    dta = {
                                        "T_MA" : item.value,
                                        "H_MA" : rowID
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
                                                alert("Mã không tồn tại!");
                                            }
                                            else
                                            {
                                                commit(true);
                                            }
                                        }
                                    }, 'json');  
                                }
                            };
                            var dataAdapter = new $.jqx.dataAdapter(ordersSource, {
                                loadComplete: function () {
                                    // data is loaded.
                                }
                            });
                            $("#table").jqxDataTable(
                            {
                                width: 400,
                                height: 415,
                                source: dataAdapter,
                                
                                pageable: true,
                                editable: true,
                                showToolbar: true,
                                altRows: true,

                                columnsResize: true,

                                sortable: true, // sặp xếp
                                filterable: true, // tìm kiếm
                                filterMode: 'simple',

                                ready: function()
                                {
                                    // called when the DataTable is loaded.         
                                },
                                pagerButtonsCount: 8,
                                toolbarHeight: 35,
                                renderToolbar: function(toolBar)
                                {
                                    var toTheme = function (className) {
                                        if (theme == "") return className;
                                        return className + " " + className + "-" + theme;
                                    }
                                    // appends buttons to the status bar.
                                    var container = $("<div style='overflow: hidden; position: relative; height: 100%; width: 100%;'></div>");
                                    var buttonTemplate = "<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 4px; width: 16px; height: 16px;'></div></div>";
                                    var addButton = $(buttonTemplate);
                                    var editButton = $(buttonTemplate);
                                    var deleteButton = $(buttonTemplate);
                                    var cancelButton = $(buttonTemplate);
                                    var updateButton = $(buttonTemplate);
                                    container.append(addButton);
                                    container.append(editButton);
                                    container.append(deleteButton);
                                    container.append(cancelButton);
                                    container.append(updateButton);
                                    toolBar.append(container);
                                    addButton.jqxButton({cursor: "pointer", enableDefault: false,  height: 25, width: 25 });
                                    addButton.find('div:first').addClass(toTheme('jqx-icon-plus'));
                                    addButton.jqxTooltip({ position: 'bottom', content: "Add"});
                                    editButton.jqxButton({ cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 25 });
                                    editButton.find('div:first').addClass(toTheme('jqx-icon-edit'));
                                    editButton.jqxTooltip({ position: 'bottom', content: "Edit"});
                                    deleteButton.jqxButton({ cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 25 });
                                    deleteButton.find('div:first').addClass(toTheme('jqx-icon-delete'));
                                    deleteButton.jqxTooltip({ position: 'bottom', content: "Delete"});
                                    updateButton.jqxButton({ cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 25 });
                                    updateButton.find('div:first').addClass(toTheme('jqx-icon-save'));
                                    updateButton.jqxTooltip({ position: 'bottom', content: "Save Changes"});
                                    cancelButton.jqxButton({ cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 25 });
                                    cancelButton.find('div:first').addClass(toTheme('jqx-icon-cancel'));
                                    cancelButton.jqxTooltip({ position: 'bottom', content: "Cancel"});
                                    var updateButtons = function (action) {
                                        switch (action) {
                                            case "Select":
                                                addButton.jqxButton({ disabled: false });
                                                deleteButton.jqxButton({ disabled: false });
                                                editButton.jqxButton({ disabled: false });
                                                cancelButton.jqxButton({ disabled: true });
                                                updateButton.jqxButton({ disabled: true });
                                                break;
                                            case "Unselect":
                                                addButton.jqxButton({ disabled: false });
                                                deleteButton.jqxButton({ disabled: true });
                                                editButton.jqxButton({ disabled: true });
                                                cancelButton.jqxButton({ disabled: true });
                                                updateButton.jqxButton({ disabled: true });
                                                break;
                                            case "Edit":
                                                addButton.jqxButton({ disabled: true });
                                                deleteButton.jqxButton({ disabled: true });
                                                editButton.jqxButton({ disabled: true });
                                                cancelButton.jqxButton({ disabled: false });
                                                updateButton.jqxButton({ disabled: false });
                                                break;
                                            case "End Edit":
                                                addButton.jqxButton({ disabled: false });
                                                deleteButton.jqxButton({ disabled: false });
                                                editButton.jqxButton({ disabled: false });
                                                cancelButton.jqxButton({ disabled: true });
                                                updateButton.jqxButton({ disabled: true });
                                                break;
                                        }
                                    }
                                    var rowIndex = null;
                                    $("#table").on('rowSelect', function (event) {
                                        var args = event.args;
                                        rowIndex = args.index;
                                        updateButtons('Select');
                                    });
                                    $("#table").on('rowUnselect', function (event) {
                                        updateButtons('Unselect');
                                    });
                                    $("#table").on('rowEndEdit', function (event) {
                                        updateButtons('End Edit');
                                    });
                                    $("#table").on('rowBeginEdit', function (event) {
                                        updateButtons('Edit');
                                    });
                                    addButton.click(function (event) {
                                        if (!addButton.jqxButton('disabled')) {
                                            // add new empty row.
                                            $("#table").jqxDataTable('addRow', null, {}, 'first');
                                            // select the first row and clear the selection.
                                            $("#table").jqxDataTable('clearSelection');
                                            $("#table").jqxDataTable('selectRow', 0);
                                            // edit the new row.
                                            $("#table").jqxDataTable('beginRowEdit', 0);
                                            updateButtons('add');
                                        }
                                    });
                                    cancelButton.click(function (event) {
                                        if (!cancelButton.jqxButton('disabled')) {
                                            // cancel changes.
                                            $("#table").jqxDataTable('endRowEdit', rowIndex, true);
                                        }
                                    });
                                    updateButton.click(function (event) {
                                        if (!updateButton.jqxButton('disabled')) {
                                            // save changes.
                                            $("#table").jqxDataTable('endRowEdit', rowIndex, false);
                                        }
                                    });
                                    editButton.click(function () {
                                        if (!editButton.jqxButton('disabled')) {
                                            $("#table").jqxDataTable('beginRowEdit', rowIndex);
                                            updateButtons('edit');
                                        }
                                    });
                                    deleteButton.click(function () {
                                        if (!deleteButton.jqxButton('disabled')) {
                                            $("#table").jqxDataTable('deleteRow', rowIndex);
                                            updateButtons('delete');
                                        }
                                    });
                                },
                                columns: [
                                    { text: 'Mã', dataField: 'H_MA', width: 150 },
                                    { text: 'Tên', dataField: 'H_TEN', width: 250 }
                                ]
                            });


                        }
                    }
                });
            });
        </script>
        <!-- <input id="jqxInput" /> -->
        <table>
            <tr>
                <td>
                    <div id='jqxInput'></div>
                    <label style="font-family: Verdana; font-size: 14px;">Thông tin tỉnh được chọn</label>
                    <div style="font-family: Verdana; font-size: 13px;" id='selectionlog'></div>
                </td>
                <td>
                    <div id="table"></div>
                </td>
            </tr>
        </table>
  </div>
</body>
</html>