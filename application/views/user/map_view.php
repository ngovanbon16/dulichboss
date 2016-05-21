<html>
<head>
    <!-- <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.ico" type="image/x-icon" />
    <link href="<?php echo base_url(); ?>assets/user/css/bootstrap.min.css" rel="stylesheet"> -->

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

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>

	<?php echo $map['js']; ?>

    <script type="text/javascript">
     $(document).ready(function () {
                $.jqx.theme = "bootstrap";
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
                    async: false
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#DM_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('category') ?>...", displayMember: "DM_TEN", valueMember: "DM_MA", width: "100%", height: 30, dropDownHeight: "150px" });
                $("#DM_MA").jqxDropDownList('selectItem', "<?php echo $DM_MA; ?>");

                var source = [];
                $("#H_MA").jqxDropDownList({  source: source, selectedIndex: -1, width: '100%', height: 30, promptText: "<?php echo lang('select').' '.lang('district') ?>...", dropDownHeight: "150px" });
                

                $("#X_MA").jqxDropDownList({  source: source, selectedIndex: -1, width: '100%', height: 30, promptText: "<?php echo lang('select').' '.lang('town') ?>...", dropDownHeight: "150px" });
                

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
                    async: false
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#T_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('provincial') ?>...", displayMember: "T_TEN", valueMember: "T_MA", width: "100%", height: 30, dropDownHeight: "150px" });
                

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
                        async: false
                    };
                    var dataAdapter = new $.jqx.dataAdapter(source);
                    // Create a jqxInput
                    $("#H_MA").jqxDropDownList({ selectedIndex: '-1', source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('district') ?>...", displayMember: "H_TEN", valueMember: "H_MA", width: "100%", height: 30, dropDownHeight: "150px" });
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
                        async: false
                    };
                    var dataAdapter = new $.jqx.dataAdapter(source);
                    // Create a jqxInput
                    $("#X_MA").jqxDropDownList({ selectedIndex: "-1", source: dataAdapter, placeHolder: "<?php echo lang('select').' '.lang('town') ?>...", displayMember: "X_TEN", valueMember: "X_MA", width: "100%", height: 30, dropDownHeight: "150px" });
                });

            $("#T_MA").jqxDropDownList('selectItem', "<?php echo $T_MA; ?>");
            $("#H_MA").jqxDropDownList('selectItem', "<?php echo $H_MA; ?>");
            $("#X_MA").jqxDropDownList('selectItem', "<?php echo $X_MA; ?>");
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
						var url = "<?= base_url(); ?>home/map";
                        setTimeout("location.href = '"+url+"';", 0);
					}
				}, 'json');
            });  

       		$("#loc").click(function(){
       			var url = "<?= base_url(); ?>home/map";
                setTimeout("location.href = '"+url+"';", 0);
       		});

            $("#btntimkiem").click(function(){
                var lat = Trim($("#lat").val());
                var lng = Trim($("#lng").val());
                var km = Trim($("#km").val());
                if(lat == "" || lng == "")
                {
                    lat = "0";
                    lng = "0";
                    thongbao("", "<?= lang('please_click_on_the_map_to_get_the_location'); ?>!", "danger");

                }
                else if(km == "" || km <= 0 || isNaN(km))
                {
                    km = "0";
                    thongbao("", "<?= lang('please_enter_the_radius'); ?> (<?= lang('unit').': '.lang('kilometers'); ?>)", "danger");
                }
                else
                {
                    var url = "<?= base_url(); ?>home/maparound/"+lat+"/"+lng+"/"+km;
                    setTimeout("location.href = '"+url+"';", 0);
                }
                
            });

            $("#btnxoa").click(function(){
                var url = "<?= base_url(); ?>home/map";
                setTimeout("location.href = '"+url+"';", 0);
            });

            function Trim(sString)
            {
                while (sString.substring(0,1) == ' ')
                {
                    sString = sString.substring(1, sString.length);
                }
                while (sString.substring(sString.length-1, sString.length) == ' ')
                {
                    sString = sString.substring(0,sString.length-1);
                }
                return sString;
            }
        });

        function updateDatabase(newLat, newLng)
        {
            $("#lat").val(newLat);
            $("#lng").val(newLng);
            thongbao("", "<?= lang('you_have_chosen_the_location'); ?>: "+newLat+", "+newLng, "success");
        }

        function thongbao(title, message, type)
        {
            if(title == "")
            {
                title = "<?php echo lang('notification') ?>";
            }
            $.notify(
                {
                    icon: 'glyphicon glyphicon-star',
                    title: title+":",
                    message: message,
                    url: "https://google.com",
                    target: "_blank"
                },
                {
                    type: type, //warning danger
                    allow_dismiss: true,
                    delay: 3000,
                    timer: 1000,
                    offset: {
                        x: 10,
                        y: 10
                    },
                    z_index: 1090,
                    //icon_type: 'image',
                    newest_on_top: true,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    }
                }
            );
        }

        var bool = true;
        function oppen()
        {
            $(".timkiem").toggleClass("timkiem1");
            if(bool)
            {
                document.getElementById("iconleft").className = "fa fa-angle-double-up fa-fw";
                bool = false;
            }
            else
            {
                document.getElementById("iconleft").className = "fa fa-angle-double-down fa-fw";
                bool = true;
            }
            
        }

    </script>
    <style type="text/css">
        .div{
            max-width: 200px;
            width: 100%;
            margin-right: 3px;
        }
        .img{
            border-radius: 3px;
            max-height: 170px;
            height: 100%;
        }
        p{
            line-height: 1.3;
            font-size: 12px;
            text-align: justify;
            font-weight: bold;
        }
        .a{
            font-size: 15px;
        }
        .vitri{
            font-size: 10px;
            font-weight: normal;
        }
        .mota{
            height: 100px;
            overflow: auto;
            font-style: normal;
            line-height: 1.3;
            font-size: 12px;
            text-align: justify;
        }
        .timkiem{
            display: none;
        }
        .timkiem1{
            display: block;
        }
        #iconleft{
            cursor: pointer;
            width: 30px;
            height: 30px;
            font-size: 30px;
            color: #c52d2f;
            border-radius: 5px 0px 0px 5px;
        }
        #iconleft:hover{
            color: #F00;
        }
    </style>
</head>
<body>
    <!-- <h1 style="font-weight: bold; color: #000;"><?php echo lang('places_map'); ?> </h1> -->
    <table width="100%">
        <tr>
            <td valign="top" style="min-width: 250px;">
                <div class="timkiem">
                    <div class="div" id="T_MA" style="float: left;"></div>
                    <div class="div" id="H_MA" style="float: left;"></div>
                    <div class="div" id="X_MA" style="float: left;"></div>
                    <div class="div" id="DM_MA" style="float: left;"></div>
                    <button style="font-size: 13px;" type="button" id="loc" class="btn btn-success"><?php echo lang('search') ?></button>
                    <button style="font-size: 13px;" type="button" id="xoa" class="btn btn-danger"><?php echo lang('reset') ?></button>
                </div>
            </td>
        </tr>      
        <tr>
            <td>
                <i id="iconleft" class="fa fa-angle-double-down fa-fw" onclick="oppen()"></i>
            </td>
        </tr>  
        <tr>
            <td width="100%">
                <?php echo $map['html']; 
                    $lat1 = "";
                    $lng1 = "";
                    $km1 = "2";
                    $count1 = "0";
                    if(isset($lat) && isset($lng))
                    {
                        $lat1 = $lat;
                        $lng1 = $lng;
                        $km1 = $km;
                    }
                    if(isset($count))
                    {
                        $count1 = $count;
                    }
                ?>
                <form class="form-inline" role="form">
                  <div class="form-group">
                    <input type="text" class="form-control" id="lat" title="<?= lang('latitude'); ?>" value="<?= $lat1; ?>" placeholder="<?= lang('latitude'); ?>...">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="lng" title="<?= lang('longitude'); ?>" value="<?= $lng1; ?>" placeholder="<?= lang('longitude'); ?>...">
                  </div>
                  <div class="form-group">
                    <input style="width: 80px; text-align: center;" type="text" class="form-control" id="km" title="<?= lang('please_enter_the_radius'); ?> (<?= lang('unit'); ?>: Km)" value="<?= $km1; ?>" placeholder="<?= lang('please_enter_the_radius'); ?>...">
                  </div>
                  <button type="button" class="btn btn-default" id="btntimkiem"><?= lang('search') ?></button>
                  <button type="button" class="btn btn-default" id="btnxoa"><?= lang('delete') ?></button>
                  <div class="form-group">
                    <?= lang('total').': '.$count1; ?>
                  </div>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>