<!DOCTYPE html>
<html lang="en">
<head>

<style type="text/css">
    #diembinhluan{
        border-radius: 3px;
        width: 100%; 
        text-align: center; 
        padding: 5px;
        color: #000;

        background: -webkit-linear-gradient(left, rgba(207,207,207,207), rgba(255,0,0,0)); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(right, rgba(207,207,207,207), rgba(255,0,0,0)); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(right, rgba(207,207,207,207), rgba(255,0,0,0)); /* For Firefox 3.6 to 15 */
        background: linear-gradient(to right, rgba(207,207,207,207), rgba(255,0,0,0)); /* Standard syntax (must be last) */

        box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
    }
    .img{
        border-radius: 2px;
        box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
        -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
    }
</style>

</head><!--/head-->

<body>

    <section id="blog" class="container">
        <div class="center">
            <h2><?php echo $info['DD_TEN']; ?></h2>
            <p class="lead"><?php echo $info['DD_GIOITHIEU']; ?></p>
        </div>

        <?php 
          $madd = $info['DD_MA'];
          $anhdaidien = "anhdaidien.jpg";
          if($info1 != "") 
          foreach ($info1 as $item) {  
              $madd1 = $item['DD_MA'];
              if($madd == $madd1)
              {
                  $dd = $item['HA_DAIDIEN'];
                  if($dd == "1")
                  {
                      $anhdaidien = $item['HA_TEN'];
                  }
              }
          }
        ?>

        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $anhdaidien; ?>" width="100%" alt="" />
                            <div class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date"><?php echo $info["DD_NGAYDANG"] ?></span>
                                        <span><i class="fa fa-user"></i> <a href="#"> <?php echo $info["ND_TEN"] ?></a></span>
                                        <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">2 Comments</a></span>
                                        <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <h2><?php echo $info["DD_TEN"].": ".$info["DD_GIOITHIEU"] ?></h2>
                                    <p>
                                        <i class="fa fa-road fa-fw"></i> <b> Nằm trên đường </b>
                                        <?php echo $info['DD_DIACHI']; ?> 
                                        thuộc
                                          <?php
                                            if($tenxa != "")
                                            {
                                              echo " xã ".$tenxa; 
                                            } 
                                            
                                          ?> huyện <?php echo $tenhuyen; ?> tỉnh <?php echo $tentinh; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-phone fa-fw"></i> <b> Số điện thoại </b>
                                        <?php 
                                                      $value = $info['DD_SDT'];
                                                      if($value == "")
                                                      {
                                                        echo "Đang được cập nhật";
                                                      }
                                                      else
                                                      {
                                                        echo $value;
                                                      }
                                                    ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-envelope-o fa-fw"></i> <b> Địa chỉ Email </b>
                                        <?php 
                                                      $value = $info['DD_EMAIL'];
                                                      if($value == "")
                                                      {
                                                        echo "Đang được cập nhật";
                                                      }
                                                      else
                                                      {
                                                        echo $value;
                                                      }
                                                    ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-google-plus fa-fw"></i> <b> Địa chỉ Website </b>
                                        <?php 
                                                      $value = $info['DD_WEBSITE'];
                                                      if($value == "")
                                                      {
                                                        echo "Đang được cập nhật";
                                                      }
                                                      else
                                                      {
                                                        echo $value;
                                                      }
                                                    ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-clock-o fa-fw"></i> <b> Thời gian mở cửa </b>
                                        <?php echo $info['DD_BATDAU']; ?> - <?php echo $info['DD_KETTHUC']; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-tag fa-fw"></i> <b> Giá bán </b>
                                        <?php echo $info['DD_GIATU']; ?> - <?php echo $info['DD_GIADEN']; ?>
                                    </p>

                                    <div class="post-tags">
                                        <strong>Tag:</strong> <a href="#">Cool</a> / <a href="#">Creative</a> / <a href="#">Dubttstep</a>
                                    </div>

                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        
                        <div class="media reply_section">
                            <div class="pull-left post_reply text-center">
                                <a href="#"><img src="<?php echo base_url(); ?>uploads/user/<?php echo $info['ND_HINH']; ?>" class="img-circle" alt="" /></a>
                                <ul>
                                    <li><a target="_blank" href="<?php echo $info["ND_FACE"] ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                                </ul>
                            </div>
                            <div class="media-body post_reply_content">
                                <h3><?php echo $info["ND_HO"]." ".$info["ND_TEN"] ?></h3>
                                <p class="lead">
                                    <?php echo $info["DD_MOTA"] ?>
                                </p>
                                <p><strong>Facebook:</strong> <a target="_blank" href="<?php echo $info["ND_FACE"] ?>"><?php echo $info["ND_FACE"] ?></a></p>
                            </div>
                        </div> 
                        
                        <h1 id="comments_title"><?php echo $countbinhluan ?> Comments</h1>

                        <?php
                            foreach ($binhluan as $iteam) {
                              $mabinhluan = $iteam['BL_MA'];
                              $tieude = $iteam['BL_TIEUDE'];
                              $noidung = $iteam['BL_NOIDUNG'];
                              $chatluong = $iteam['BL_CHATLUONG'];
                              $phucvu = $iteam['BL_PHUCVU'];
                              $khonggian = $iteam['BL_KHONGGIAN'];
                              $ngaydang = $iteam['BL_NGAYDANG'];

                              $diem = ($chatluong + $phucvu + $khonggian) / 3;

                              $honguoidang = $iteam['ND_HO'];
                              $tennguoidang = $iteam['ND_TEN'];
                              $hinhnguoidang = $iteam['ND_HINH'];
                        ?>

                        <div class="media comment_section">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="<?php echo base_url(); ?>uploads/user/<?php echo $hinhnguoidang; ?>" class="img-circle" alt="" /></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $honguoidang." ".$tennguoidang ?></h3>
                                <h4><?php echo $ngaydang ?></h4>
                                <h2><?php echo $tieude ?></h2>
                                <p>
                                    <?php echo $noidung ?>
                                <br/><br/>
                                    <?php
                                         foreach ($anhbinhluan as $key) {
                                            if($key['BL_MA'] == $mabinhluan)
                                            {
                                              $tenanh = $key['ABL_TEN'];
                                      ?>
                                            <img class="img" src="<?php echo base_url(); ?>uploads/binhluan/<?php echo $tenanh ?>" width="20%" height="70">
                                      <?php
                                            }
                                          }
                                    ?>
                                </p>

                                <a href="#">Reply</a>
                            </div>
                        </div>

                        <?php
                            }
                        ?> 

                        <div id="contact-page clearfix">
                            <div class="status alert alert-success" style="display: none"></div>
                            <div class="message_heading">
                                <h4>Bình luận về bài đăng</h4>
                                <p>Make sure you enter the(*)required information where indicate.HTML code is not allowed</p>
                            </div> 
      
                            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Tiêu đề *</label>
                                            <input type="text" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Đánh giá *</label> <br>
                                            Chất lượng: <br>
                                            Phục vụ: <br>
                                            Không gian: <br>
                                            
                                        </div>                   
                                    </div>
                                    <div class="col-sm-7">                        
                                        <div class="form-group">
                                            <label>Nội dung *</label>
                                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                                        </div>                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg" required="required">Gửi bình luận</button>
                                        </div>
                                    </div>
                                </div>
                            </form>     
                        </div><!--/#contact-page-->
                    </div><!--/.col-md-8-->

                <aside class="col-md-4">

                    <div class="widget archieve">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve">
                                    <li>
                                        <i class="fa fa-comment fa-fw"></i> Bình luận
                                        <span class="pull-right">(<?php echo $countbinhluan ?>)</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-picture-o fa-fw"></i> Đăng ảnh 
                                        <span class="pull-right">(<?php echo $counthinhanh ?>)</span>
                                    </li>
                                    <li>
                                       <i id="iconcheckin" class="fa fa-square-o fa-fw"></i> Check-in
                                        <span class="pull-right">(<?php echo $countcheckin ?>)</span>
                                    </li>
                                    <li>
                                        <i id="iconyeuthich" class="fa fa-heart-o fa-fw"></i> Yêu thích
                                        <span class="pull-right">(<?php echo $countyeuthich ?>)</span>
                                    </li>
                                    <li>
                                        <i id="iconmuonden" class="fa fa-star-o fa-fw"></i> Muốn đến
                                        <span class="pull-right">(<?php echo $countmuonden ?>)</span>
                                    </li>
                                    <li>
                                         <i id="iconluotxem" class="fa fa-eye"></i> Lượt xem
                                        <span class="pull-right">(100)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>                     
                    </div><!--/.archieve-->

                    <div class="widget tags">
                        <h3>Đánh giá</h3>
                        
                        <div id="diembinhluan">
                          <table width="100%">
                            <tr style="font-weight: bolder;">
                              <td width="25%">
                                <?php echo $diemchatluong?>
                              </td>
                              <td width="25%">
                                <?php echo $diemphucvu ?>
                              </td>
                              <td width="25%">
                                <?php echo $diemkhonggian ?>
                              </td>
                              <td width="25%">
                                <?php 
                                  $diemtb = ($diemchatluong + $diemphucvu + $diemkhonggian)/3;
                                  $diemtb = round($diemtb, 1);
                                  echo round($diemtb, 1)." <i class='fa fa-flag-checkered fa-fw'></i>";
                                  if(0 < $diemtb && $diemtb < 2)
                                  {
                                    echo "Kém";
                                  }
                                  if(2 <= $diemtb && $diemtb < 4)
                                  {
                                    echo "Trung bình";
                                  }
                                  if(4 <= $diemtb && $diemtb < 6)
                                  {
                                    echo "Khá";
                                  }
                                  if(6 <= $diemtb && $diemtb < 8)
                                  {
                                    echo "Tốt";
                                  }
                                  if(8 <= $diemtb && $diemtb <= 10)
                                  {
                                    echo "Tuyệt vời";
                                  }

                                ?>
                              </td>
                            </tr>
                            <tr style="font-style: italic;">
                              <td>Chất lượng</td>
                              <td>Phục vụ</td>
                              <td>Không gian</td>
                              <td>Trung bình</td>
                            </tr>
                          </table>
                        </div>
                    </div><!--/.tags-->

                    <div class="widget blog_gallery">
                        <h3>Hình ảnh</h3>
                        <ul class="sidebar-gallery">
                            <?php
                                foreach ($info1 as $key) {
                                  $hinh = $key['HA_TEN'];
                                  $duyet = $key['HA_DUYET'];
                                  if($duyet == "1")
                                  {
                              ?>    
                                    <li>
                                        <img class="img" data-u="image" src="<?php echo base_url(); ?>uploads/diadiem/<?php echo $hinh; ?>" width="107" height="60" />
                                    </li>
                             <?php
                                  }
                                }
                              ?>
                        </ul>
                    </div><!--/.blog_gallery-->
    				
    				<div class="widget categories">
                        <h3>Bản đồ</h3>
                        <div class="row">
                            <?php echo $map['js']; ?>
                            <?php echo $map['html']; ?>
                        </div>                     
                    </div><!--/.recent comments-->
                     

                    <!-- <div class="widget categories">
                        <h3>Categories</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="blog_category">
                                    <li><a href="#">Computers <span class="badge">04</span></a></li>
                                    <li><a href="#">Smartphone <span class="badge">10</span></a></li>
                                    <li><a href="#">Gedgets <span class="badge">06</span></a></li>
                                    <li><a href="#">Technology <span class="badge">25</span></a></li>
                                </ul>
                            </div>
                        </div>                     
                    </div> --><!--/.categories-->
    				
                </aside>     

            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->

</body>
</html>