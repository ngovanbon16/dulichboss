<section id="contact-info" style="margin-top: 0px;">
<div class="gmap-area">
            <div class="container">
                <div class="row">
<html>
<head>
    <link type="text/css" rel="Stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpasswordinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxexpander.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxvalidator.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/scripts/demos.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxdata.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxloader.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxformattedinput.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxtabs.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxnotification.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css" media="screen">

	<?php echo $map['js']; ?>
    <script type="text/javascript">
		var centreGot = false;

   /*     if (!$marker['visible']) {
            $marker_output .= ',
                visible: false';
        }*/

         /*marker_19.setOptions({
                visible: false;
            });*/

        /* $marker_19['visible'] = false;*/
         // $("#marker_19").visible = false;
        /* $marker['19'].setOptions({
                visible: false;
            });*/

	</script>

    <script type="text/javascript">
     $(document).ready(function () {
                $.jqx.theme = "bootstrap";
     			$("#xoa").jqxButton({ width: '50%', height: '27'});
     			$("#loc").jqxButton({ width: '50%', height: '27'});
                var url = "<?php echo base_url(); ?>index.php/danhmuc/data";
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'DM_MA' },
                        { name: 'DM_TEN' }
                    ],
                    url: url,
                    async: true
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#DM_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('category') ?>...", displayMember: "DM_TEN", valueMember: "DM_MA", width: "100%", height: 25, dropDownHeight: "150px" });

                var source = [];
                $("#H_MA").jqxDropDownList({  source: source, selectedIndex: -1, width: '100%', height: '25px', promptText: "<?php echo lang('select').' '.lang('district') ?>...", dropDownHeight: "150px" });
                $("#X_MA").jqxDropDownList({  source: source, selectedIndex: -1, width: '100%', height: '25px', promptText: "<?php echo lang('select').' '.lang('town') ?>...", dropDownHeight: "150px" });

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
                $("#T_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('provincial') ?>...", displayMember: "T_TEN", valueMember: "T_MA", width: "100%", height: 25, dropDownHeight: "150px" });

                $("#T_MA").on('select', function (event) {
                    var matinh = $("#T_MA").val();
                    //alert(matinh);
                    var url = "<?php echo base_url(); ?>index.php/huyen/data/" + $("#T_MA").val();
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
                    // Create a jqxInput
                    $("#H_MA").jqxDropDownList({ selectedIndex: '-1', source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('district') ?>...", displayMember: "H_TEN", valueMember: "H_MA", width: "100%", height: 25, dropDownHeight: "150px" });
                });

                $("#H_MA").on('select', function (event) {
                    var mahuyen = $("#H_MA").val();
                    //alert(mahuyen);
                     var url = "<?php echo base_url(); ?>index.php/xa/data/" + $("#T_MA").val() + "/" + $("#H_MA").val();
                    // prepare the data
                    var source =
                    {
                        datatype: "json",
                        datafields: [
                            { name: 'X_MA' },
                            { name: 'X_TEN' }
                        ],
                        url: url,
                        async: true
                    };
                    var dataAdapter = new $.jqx.dataAdapter(source);
                    // Create a jqxInput
                    $("#X_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('town') ?>...", displayMember: "X_TEN", valueMember: "X_MA", width: "100%", height: 25, dropDownHeight: "150px" });
                });

            //alert("<?php echo $this->session->userdata('DM_MA') ?>");

            $("#DM_MA").change(function(){
            	//alert($("#DM_MA").val());
            	var url, dta;
				url="<?php echo base_url(); ?>index.php/home/danhmuc/?t=" + Math.random();
				dta = {
					"DM_MA" : $("#DM_MA").val()
				};
				console.log(dta);
				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						if(data.status == "error")
						{

						}
						else
						{

						}
					}
				}, 'json');
            }); 

            $("#T_MA").change(function(){
            	var url, dta;
				url="<?php echo base_url(); ?>index.php/home/tinh/?t=" + Math.random();
				dta = {
					"T_MA" : $("#T_MA").val()
				};
				console.log(dta);
				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						if(data.status == "error")
						{

						}
						else
						{

						}
					}
				}, 'json');
            });

            $("#H_MA").change(function(){
            	var url, dta;
				url="<?php echo base_url(); ?>index.php/home/huyen/?t=" + Math.random();
				dta = {
					"H_MA" : $("#H_MA").val()
				};
				console.log(dta);
				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						if(data.status == "error")
						{

						}
						else
						{

						}
					}
				}, 'json');
            });  

            $("#X_MA").change(function(){
            	var url, dta;
				url="<?php echo base_url(); ?>index.php/home/xa/?t=" + Math.random();
				dta = {
					"X_MA" : $("#X_MA").val()
				};
				console.log(dta);
				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						if(data.status == "error")
						{

						}
						else
						{

						}
					}
				}, 'json');
            }); 

            $("#xoa").click(function(){
            	var url, dta;
				url="<?php echo base_url(); ?>index.php/home/xoa/?t=" + Math.random();
				dta = {
					"xoa" : 'xoa'
				};
				console.log(dta);
				$.post(url, dta, function(data, status){

					console.log(status);
					console.log(data);
					if(status == "success")
					{	
						location.reload(true);
						if(data.status == "error")
						{

						}
						else
						{

						}
					}
				}, 'json');
            });  

       		$("#loc").click(function(){
       			location.reload(true);
       		});
        });
    </script>
    <style type="text/css">
        .div{
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1 style="margin-top: -20px;"><?php echo lang('places_map'); ?></h1>
    <table width="100%">
        <tr>
            <td valign="top" style="padding-right: 10px; width: 20%;">
                <div class="div" id="T_MA" style="float: left;"></div>
                <div> <?php echo $tentinh ?> </div>
                <div class="div" id="H_MA" style="float: left;"></div>
                <div> <?php echo $tenhuyen ?> </div>
                <div class="div" id="X_MA" style="float: left;"></div>
                <div> <?php echo $tenxa ?> </div>
                <div class="div" id="DM_MA" style="float: left;"></div>
                <div> <?php echo $tendanhmuc ?> </div>
                <div>
                    <button style="float: left;" id="loc"><?php echo lang('search') ?></button>
                    <button id="xoa"><?php echo lang('delete') ?></button>
                </div>
                
            </td>
            <td width="100%">
                <?php echo $map['html']; ?>
            </td>
        </tr>
    </table>
</body>
</html>

</div></div></div>
</section>