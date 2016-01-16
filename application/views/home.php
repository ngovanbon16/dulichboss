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
      </ol>

      <!-- Content -->
      <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="item active">
      <img src="<?php echo base_url(); ?>assets/images/halongbay.jpg" alt="Sunset over beach" width='800' height='300px'>
      </div>

      <!-- Slide 2 -->
      <div class="item">
      <img src="<?php echo base_url(); ?>assets/images/halongbay.jpg" alt="Rob Roy Glacier" width='800' height='300px'>
      </div>

      <!-- Slide 3 -->
      <div class="item">
      <img src="<?php echo base_url(); ?>assets/images/halongbay.jpg" alt="Longtail boats at Phi Phi" width='800' height='300px'>
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
  <tr>
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
  </tr>
</table>

</body>