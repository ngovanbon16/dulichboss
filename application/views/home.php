<head>
  <style type="text/css">
      .tieude{
          position: absolute; 
          font-weight: bold; 
          font-size: 18px; 
          font-style: italic; 
          background-color: #0C3; 
          color: #FFF;
          padding: 5px 60px 5px 5px;
          opacity: 0.7;
          border-radius: 2px;

          background: -webkit-linear-gradient(left, rgba(0,238,34,255), rgba(255,0,0,0)); /* For Safari 5.1 to 6.0 */
          background: -o-linear-gradient(right, rgba(0,238,34,255), rgba(255,0,0,0)); /* For Opera 11.1 to 12.0 */
          background: -moz-linear-gradient(right, rgba(0,238,34,255), rgba(255,0,0,0)); /* For Firefox 3.6 to 15 */
          background: linear-gradient(to right, rgba(0,238,34,255), rgba(255,0,0,0)); /* Standard syntax (must be last) */

          box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
          -moz-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
          -webkit-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);
          -o-box-shadow: 0 -4px 4px -4px rgba(0,0,0,4);

          -webkit-animation: myfirst 10s linear 1s infinite alternate; /* Chrome, Safari, Opera */
          animation: myfirst 10s linear 1s infinite alternate;
      }
      @-webkit-keyframes myfirst {
          0%   { left:0px; top:0px;}
          25%  { left:50%; top:0px;}
          100% { left:0px; top:0px;}
      }

      /* Standard syntax */
      @keyframes myfirst {
          0%   { left:0px; top:0px;}
          25%  { left:50%; top:0px;}
          100% { left:0px; top:0px;}
      }
  </style>
</head>
<body>
<table class="table table-striped">
  <tr>
    <td colspan='2'>
      <div class="container-fluid">
          
      <!-- Carousel container -->
      <div id="my-pics" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ol class="carousel-indicators">
      <li data-target="#my-pics" data-slide-to="0" class="active"></li>
      <li data-target="#my-pics" data-slide-to="1"></li>
      <li data-target="#my-pics" data-slide-to="2"></li>
      <li data-target="#my-pics" data-slide-to="3"></li>
      </ol>

      <!-- Content -->
      <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="item active">
      <div class="tieude">Cầu Cần Thơ</div>
      <img src="<?php echo base_url(); ?>assets/images/caucantho.jpg" alt="" width='100%' height=''>
      </div>

      <!-- Slide 2 -->
      <div class="item">
      <div class="tieude">Đồng Tháp Mười</div>
      <img src="<?php echo base_url(); ?>assets/images/dongthapmuoi.jpg" alt="" width='100%' height=''>
      </div>

      <!-- Slide 3 -->
      <div class="item">
      <div class="tieude">Rừng Tràm Trà Sư</div>
      <img src="<?php echo base_url(); ?>assets/images/rungtramtrasu.jpg" alt="" width='100%' height=''>
      </div>

      <!-- Slide 3 -->
      <div class="item">
      <div class="tieude">Chợ Cái Răng Cần Thơ</div>
      <img src="<?php echo base_url(); ?>assets/images/chocairang.jpg" alt="" width='100%' height=''>
      </div>

      </div>

      <!-- Previous/Next controls -->
      <a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
      <span class="icon-prev" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
      <span class="icon-next" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>

      </div>

      <!-- Center the image -->
      <style scoped>
      .item img{
          margin: 0 auto;
      }
      </style>

      </div>
    </td>
  </tr>
  <!-- <tr>
    <td><h3>Một số địa điểm nổi tiếng</h3></td>
    <td></td>
  </tr>
  <tr>
    <td>
      <h4><i>Du lịch sinh thái rừng tràm Trà Sư</i></h4>
      <img src='<?php echo base_url(); ?>assets/images/rungtramtrasu.jpg' width='100%' height='300'>
      <br/>
    </td>
    <td>
      <h4><i>Lễ hội Vía Miếu Bà Chúa Xứ núi Sam</i></h4>
      <img src='<?php echo base_url(); ?>assets/images/mieubachuaxu.jpg' width='100%' height='300'>
    </td>
  </tr> -->
</table>

</body>