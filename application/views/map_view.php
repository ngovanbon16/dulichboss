<!-- <html>
<head><?php echo $map['js']; ?></head>
<body><?php echo $map['html']; ?></body>
</html> -->

<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtabs.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxinput.js"></script>

	<script type="text/javascript">
		var centreGot = false;
	</script>

	<?php echo $map['js']; ?>

	<script type="text/javascript">
		$(document).ready(function() {

			$("#btn").click(function(){
				var lat = $("#lat").val();
				var lng = $("#lng").val();
				var title = $("#title").val();
				//alert(lat + " , " + lng);
				//setTimeout("location.href = '<?php echo base_url(); ?>index.php/map/add/" + lat + "/" + lng + "';",0);

				var url, dta;
                url="<?php echo base_url(); ?>index.php/map/add";
                dta = {
                    "lat" : lat,
                    "lng" : lng,
                    "title" : title
                };
                console.log(dta);
                $.post(url, dta, function(data, status){

                    console.log(status);
                    console.log(data);
                    if(status == "success")
                    {  
                        if(data.status == "error")
                        {
                            alert("Lỗi");
                        }
                        else
                        {
                            alert("Thêm thành công!");
                            $('#window').jqxWindow('close');
                            //setTimeout("location.href = 'https://mail.google.com/';",500);
                        }
                    }
                }, 'json');
			});

		});
	</script>

	<script type="text/javascript">
        var basicDemo = (function () {
            //Adding event listeners
            function _addEventListeners() {
                $('#showWindowButton').click(function () {
                    $('#window').jqxWindow('open');
                });
                $('#hideWindowButton').click(function () {
                    $('#window').jqxWindow('close');
                });
            };
            //Creating all page elements which are jqxWidgets
            function _createElements() {
                $('#showWindowButton').jqxButton({ width: '70px' });
                $('#hideWindowButton').jqxButton({ width: '65px' });
            };
            //Creating the demo window
            function _createWindow() {
                var jqxWidget = $('#jqxWidget');
                var offset = jqxWidget.offset();
                $('#window').jqxWindow({
                    position: { x: offset.left + 100, y: offset.top + 0} ,
                    showCollapseButton: true, maxHeight: 1000, maxWidth: 1000, minHeight: 550, minWidth: 750, height: 550, width: 750,
                    initContent: function () {
                        $('#window').jqxWindow('focus');
                    }
                });
                $('#window').jqxWindow('resizable', true);
                $('#window').jqxWindow('draggable', true);
                $("#btn").jqxButton({ template: "success" , height: 30, width: 90 });
                $("#lat").jqxInput({placeHolder: "Vĩ độ - Latitude", height: 25, width: 160 });
                $("#lng").jqxInput({placeHolder: "Kinh độ - Longitude", height: 25, width: 160 });
                $("#title").jqxInput({placeHolder: "Nhập tiêu đề", height: 25, width: 200 });
            };
            return {
                config: {
                    dragArea: null
                },
                init: function () {
                    //Creating all jqxWindgets except the window
                    _createElements();
                    //Attaching event listeners
                    _addEventListeners();
                    //Adding jqxWindow
                    _createWindow();
                }
            };
        } ());
        $(document).ready(function () {  
            //Initializing the demo
            basicDemo.init();
        });
        function load()
        {
        	$('#window').jqxWindow('close');
        }
    </script>

</head>
<body onload="load()">
	<div id="jqxWidget">
        <div style="float: left;">
            <div>
                <input type="button" value="Open" id="showWindowButton" />
                <input type="button" value="Close" id="hideWindowButton" style="margin-left: 5px" />
            </div>
        </div>
        <div style="width: 100%; height: 650px; margin-top: 50px;" id="mainDemoContainer">
            <div id="window">
                <div id="windowHeader">
                    <span>
                        <img src="<?php echo base_url(); ?>assets/images/local.png" alt="" style="margin-right: 15px" />Map
                    </span>
                </div>
                <div style="overflow: hidden;" id="windowContent">
                    
                    <?php echo $map['html']; ?>
					Lat: <input type="text" id="lat" value="">
					Lng: <input type="text" id="lng" value="">
					Title: <input type="text" id="title" value="">
					<button id="btn">Xác nhận</button>

                </div>
            </div>
        </div>
    </div>
</body>
</html>