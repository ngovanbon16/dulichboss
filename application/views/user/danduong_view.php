<head>
    <?php echo $map['js']; ?>
    <script type="text/javascript">
        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;

             document.body.innerHTML = printContents;

             window.print();

             document.body.innerHTML = originalContents;
        }
        function onload()
        {
            var danduong = document.getElementById("directionsDiv").innerHTML;
            document.getElementById("directionsDiv").innerHTML = "<h2><?= $info['DD_TEN']; ?></h2>"+danduong;
        }

        var bool = true;
        function oppen()
        {
            $(".benner").toggleClass("benner1");
            if(bool)
            {
                document.getElementById("iconleft").className = "fa fa-angle-double-right fa-fw";
                bool = false;
            }
            else
            {
                document.getElementById("iconleft").className = "fa fa-angle-double-left fa-fw";
                bool = true;
            }
            
        }
    </script>

    <style type="text/css">
        #iconleft{
            margin-right: -12px;
            margin-top: 10.5px;
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
        .benner{
            margin-top: 30px; 
            text-align: left; 
            position: absolute; 
            z-index: 100000; 
            width: 320px;             
            -webkit-transition: margin-left 3s;
            transition:  margin-left 3s;
        }
        .benner1{
            margin-left: -305px;
            -webkit-transition:  margin-left 3s;
            transition:  margin-left 3s;
        }
    </style>
</head>
<body onload="onload()">

<table class="benner">
    <tr>
        <td>
            <div >
                <div style="text-align: left; max-height: 390px; overflow: auto;" id="directionsDiv"></div>
                
                <img style="float: right; width: 25px; height: 25px; margin-right: 10px; cursor: pointer;" src="<?php echo base_url(); ?>assets/images/print.png" onclick="printDiv('directionsDiv')">
            </div>
        </td>
        <td>
            <i id="iconleft" class="fa fa-angle-double-left fa-fw" onclick="oppen()"></i>
        </td>
    </tr>
</table>

<div style="width: 100%;">
<?php echo $map['html']; ?>
</div>

</body>