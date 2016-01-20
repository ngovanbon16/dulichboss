<html>
<head>
    <link type="text/css" rel="Stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/styles/jqx.base.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
	<script type="text/javascript">
		var centreGot = false;

        $(document).ready(function(e){
            $("#lat").jqxInput({  width: '180px', height: '25px' });
            $("#lng").jqxInput({  width: '180px', height: '25px' });
            $("#submit").jqxButton({ template: "success", height: "30px", width: "100px" });
        });

	</script>

	<?php echo $map['js']; ?>

</head>
<body>
    <form action="<?=site_url('map/mapfromAtoB')?>" method="post">
        <label for="place1">Vị trí bắt đầu: </label><input type="text" name="lat" value="<?php 
            if(isset($lat)) { echo $lat; } ?>" id="lat" readonly="readonly" />
        <label for="place2">Vị trí kết thúc: </label><input type="text" name="lng" value="<?php 
            if(isset($lng)) { echo $lng; } ?>" id="lng" readonly="readonly" />
        <input type="submit" id="submit" name="submit" value="Dẫn đường" />

    </form>

    <table width="100%">
        <tr>
            <td width="100%">
                <?php echo $map['html']; ?>
            </td>
        </tr>
        <tr>
            <td width="100%">
                <div id="directionsDiv"></div>
            </td>
        </tr>
    </table>

</body>
</html>