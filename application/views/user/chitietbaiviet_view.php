<!DOCTYPE html>
<html lang="en">
<head>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        <?php 
            $lang = "vi";
            if(lang('lang') == "en")
            {
                $lang = "en";
            }
        ?>
        var language = "<?php echo $lang; ?>";
        window.onload = function() {
            CKEDITOR.replace( 'BV_NOIDUNG',
                {
                    language : language,
                    uiColor : '#F8F8FF',
                    height : 300,
                    toolbarCanCollapse : true
                }
            );
            
        };

        $(document).ready(function(){
            $("#btngui").click(function(){

                <?php 
                    if($this->session->userdata('id') == "")
                    { 
                ?>
                    thongbao("", "<?php echo lang('please').' '.lang('login'); ?>", "info");
                    return;
                <?php
                    }
                    else
                    {
                ?>

                var BV_NOIDUNG = CKEDITOR.instances.BV_NOIDUNG.getData();
                var BV_TIEUDE = $("#BV_TIEUDE").val();

                if(BV_TIEUDE == "")
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#F99";
                    $("#BV_TIEUDE").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('title') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_TIEUDE').style.backgroundColor = "#FFF";
                }

                if(BV_NOIDUNG == "")
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#F99";
                    $("#BV_NOIDUNG").focus();
                    thongbao("", "<?php echo lang('please').' '.lang('input').' '.lang('content') ?>", "danger");
                    return;
                }
                else
                {
                    document.getElementById('BV_NOIDUNG').style.backgroundColor = "#FFF";
                }

                var url, data;
                url = "<?php echo base_url(); ?>index.php/baiviet/add?t=" + Math.random();
                data = {
                    "DD_MA" : "<?php echo $baiviet['DD_MA']; ?>",
                    "BV_TIEUDE" : BV_TIEUDE,
                    "BV_NOIDUNG" : BV_NOIDUNG,
                    "BV_DUYET" : '0'
                };
                console.log(data);
                $.post(url, data, function(data, status){
                    console.log(data);
                    if(status == "success")
                    {
                        if(data.status == "success")
                        {   
                            thongbao("", "<?php echo lang('inserted_successfully'); ?>", "success");
                            setTimeout("location.href = '<?php echo base_url(); ?>index.php/baiviet/detail/<?php echo $baiviet['BV_MA']; ?>';",2000);
                        }
                        else
                        {
                            thongbao("", "Không thành công", "danger");
                        }
                    }
                    else
                    {
                        thongbao("", "Lỗi không truyền được dữ liệu!", "danger");
                    }
                    
                }, 'json');

                <?php
                    }
                ?>
            });

            var url, dta;
            url="<?php echo base_url(); ?>index.php/baiviet/updateluotxem?t=" + Math.random();
            dta = {
              "BV_MA" : "<?php echo $baiviet['BV_MA']; ?>"
            };
            //console.log(dta);
            $.post(url, dta, function(data, status){

              //console.log(status);
              //console.log(data);
              if(status == "success")
              { 
                if(data.status == "success")
                {
                    //console.log(data.data["BV_LUOTXEM"]);
                    document.getElementById('luotxem').innerHTML = data.data["BV_LUOTXEM"];
                }
              }
            }, 'json');

        });
    </script>
    <style type="text/css">
    	#left{
    		background-color: #FFF;
    		padding-top: 10px;
    		border: solid 1px #DCDCDC;
            border-radius: 2px;
    	}
    	.p{
    		font-style: italic;
    	}
        #baivietlienquan{
            background-color: #FFF;
            padding-left: 20px;
            border: solid 1px #DCDCDC;
            border-radius: 2px;
        }
        .tieudetren{
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head><!--/head-->

<body style="background-color: #F8F8FF">

    <section id="blog" class="container" style="margin-top: -50px;">
        <div class="tieudetren">
           <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="4" direction="left" width="100%" align="center">
                <i class="fa fa-star-o"></i> <?php echo lang('posts').' '.lang('propose'); ?>: 
                <?php
                    foreach ($baivietkhuvuc as $iteam) {
                        $BV_MA1 = $iteam["BV_MA"];
                        $BV_TIEUDE1 = $iteam["BV_TIEUDE"];
                ?>

                <a style="margin: 10px;" href="<?php echo base_url(); ?>index.php/baiviet/detail/<?php echo $BV_MA1; ?>">
                    <?php echo $BV_TIEUDE1; ?>
                </a> <i class="fa fa-angle-double-right"></i>

                <?php
                    }
                ?>
            </marquee>
        </div>
        <?php //print_r($baivietkhuvuc); ?>
        <div class="blog">
            <div class="row">
                <div class="col-md-8" id="left">
                    <div class="blog-item" >
                    	<div>
                    		<h1 style="color: #0033FF; font-size: 22px;">
                                <a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $baiviet['DD_MA']; ?>">
                                    <?php echo $baiviet['BV_TIEUDE']; ?> 
                                </a>
                                <i style="font-size: 16px; font-weight: normal;">[
                                    <a href="<?php echo base_url(); ?>index.php/home/theohuyen/<?php echo $baiviet['T_MA'].'/'.$baiviet['H_MA']; ?>">
                                        <?php echo $baiviet['H_TEN']; ?> 
                                    </a> - 
                                    <a href="<?php echo base_url(); ?>index.php/home/khuvuc/<?php echo $baiviet['T_MA']; ?>">
                                        <?php echo $baiviet['T_TEN']; ?> 
                                    </a>
                                ]</i> 
                            </h1>
                    		<p class="p"> 
                    			Người đăng: <?php echo $baiviet['ND_HO'].' '.$baiviet['ND_TEN']; ?><br>
                    			Được viết vào ngày: <?php echo $baiviet['BV_NGAYDANG']; ?><br>
                    			Lượt xem: <i id="luotxem">  </i>
                    		</p>
                    	</div>

                        <?php echo $baiviet['BV_NOIDUNG']; ?>
                    </div><!--/.blog-item-->
                        
                    <div id="contact-page clearfix">
                        <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                            <div class="row" style="margin: 10px;">
                                 
                                <div class="form-group">
                                    <h2>Thêm bài viết mới cho địa điểm: <?php echo $baiviet['DD_TEN']; ?></h2>
                                </div>
                                <div class="form-group">
                                    <label><?php echo lang('title'); ?> *</label>
                                    <input id="BV_TIEUDE" type="text" class="form-control" required="required" placeholder="<?php echo lang('input').' '.lang('title'); ?>">
                                </div>
                                <div class="form-group">
                                    <label><?php echo lang('content'); ?> *</label>
                                    <textarea name="BV_NOIDUNG" id="BV_NOIDUNG"><?php //echo $baiviet['BV_NOIDUNG']; //echo lang('input').' '.lang('content'); ?></textarea>
                                </div>          

                                <?php 
                                    $btngui = "";
                                    if($this->session->userdata('id') == "")
                                    { 
                                        $btngui = "#modaldangnhap";
                                    }
                                ?>

                                <div class="form-group">
                                    <button data-toggle='modal' data-target='<?php echo $btngui; ?>' type="button" id="btngui" class="btn btn-primary btn-lg" required="required"><?php echo lang('submit'); ?></button>
                                </div>
                                
                            </div>
                        </form>     
                    </div><!--/#contact-page-->
                </div><!--/.col-md-8-->

                <aside class="col-md-4">
                   <!--  <div class="widget search">
                        <form role="form">
                                <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                        </form>
                    </div> --><!--/.search-->
    				
    				<div class="widget categories" id="baivietlienquan">
                        <h3>Bài viết liên quan</h3>
                        <div class="row">

                        	<?php
                        		foreach ($allbaiviet as $row) {
                        			$BV_MA = $row["BV_MA"];
                        			$BV_TIEUDE = $row["BV_TIEUDE"];
                        			$BV_NGAYDANG = $row["BV_NGAYDANG"];
                        			$ND_HO = $row["ND_HO"];
                        			$ND_TEN = $row["ND_TEN"];
                        	?>

                            <div class="col-sm-12">
                                <div class="single_comments">
                                    <a href="<?php echo base_url(); ?>index.php/baiviet/detail/<?php echo $BV_MA; ?>">
    								    <p><?php echo $BV_TIEUDE; ?></p>
                                    </a>
                                    <div class="entry-meta small muted">
                                        <span style="font-style: italic;">
                                            <?php echo $ND_HO.' '.$ND_TEN; ?>: <?php echo $BV_NGAYDANG; ?>
                                        </span>
                                    </div>
    							</div>
                            </div>

                            <?php
                        		}
                        	?>

                        </div>                     
                    </div><!--/.recent comments-->
    					
                    <div style="margin-top: -30px; background-color: #FFF; border: solid 1px #DCDCDC; padding: 0px 10px 10px 10px; border-radius: 2px;" class="widget categories">
                        <h3><?php echo lang('the_places_have_be_appreciated') ?></h3>
                        
                        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" width="100%" height="200" align="center">

                          <?php
                            foreach ($danhgia as $row) {
                                $hinh3 = $row['HA_TEN'];
                                $ma3 = $row['DD_MA'];
                                $ten3 = $row['DD_TEN'];
                                $tinh3 = $row['T_TEN'];
                                $huyen3 = $row['H_TEN'];
                            ?>
                              <a href="<?php echo base_url(); ?>index.php/aediadiem/detailuser1/<?php echo $ma3; ?>">
                                <span>
                                  
                                  <table width="100%">
                                    <tr>
                                      <td width="110">
                                        <img style="width: 100px; height: 80px; border-radius: 3px 20px 3px; border: solid 2px #DCDCDC;" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh3; ?>" /> 
                                      </td>
                                      <td>
                                        <span style="font-size: 13; width: 100px; overflow: hidden;"><?php echo $ten3; ?></span><br/>
                                        <i style="font-size: 13px;"><?php echo $huyen3.' - '.$tinh3; ?></i>
                                      </td>
                                    </tr>
                                  </table>
                                  <hr style="margin: 20px 0px 0px;" />
                                </span>
                              </a> <br/>
                            <?php      
                            } 
                          ?>

                        </marquee>
                                          
                    </div><!--/.recent comments-->
    				
                </aside>     

            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->

</body>
</html>