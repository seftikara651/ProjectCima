<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/hover.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/datepicker.min.css">
  <style>

  @font-face{
  src: url('font/GOTHIC.TTF');
  font-family: satu;
  }

  @font-face{
  src: url('font/paperdaisy.TTF');
  font-family: dua;
  }
  
  .footer{
  background-image: url('img/bg9.jpg');
  margin-top: 50px;
  width: 100%;
  height: 600px;
  font-family: satu;
  color: white;
}

  .datepicker-container{
    z-index: 99999 !important;

  }
  </style>
</head>
<body >
<nav class="navbar navbar-dark bg-ligth fixed-top">
  <a class="navbar-brand font" href="#">
    postplan
  </a>
  <ul class="nav justify-content-end">
  <li class="nav-item active">
   <a class="navbar-brand font" href="#about">About</a>
  </li>
  <li class="nav-item active">
   <a class="navbar-brand font" href="page/login.php">Login</a>
  </li>
</ul>
</nav>
  
       <div id="home" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/bg8a.jpg" alt="First slide">
              <div id="responsecontainer" class="carousel-caption" style="margin-bottom: 200px;" >
                <p class="tt" style="padding-top: 30px;color: #fff; margin-left: 350px;">Hi Everyone!<br><br>Make plans for your Instagram posts more effective, easier and planned</p>
                <a href="#about"><button class="btn btn-danger" style="width: 200px; height: 50px; margin-top: 10px; font-family: satu; color: #9F79E6; margin-right: 50px; background-color: #FFFFFF; border-color: #FFFFFF; font-style:bold; font-size: 15pt;">mulai sekarang</button></a>
              </div>
            </div>
          </div>
        </div>

<div class="container">
    <div class="row">
       <div class="col-lg-12" style="margin-top: 100px "></div>
      <div class="col-lg-6">
        <img src="img/dex1.png" style="width: 85%;height: auto; margin-left: 0px; margin-top: 30px">
      </div>
       <div class="col-lg-6" id="about">
        <p class="tt" id="about" style="padding-top: 100px; text-align: right; font-size: 35pt; color: #4D4D4D">APA ITU POSTPLAN ?</p>
        <p style="padding-top: 50px; text-align: justify;color: #7B8B8E;font-size: 15pt">POSTPLAN merupakan sebuah aplikasi yang dapat mengatur jadwal postingan sosial media 
    khususnya sosial media instagram. Dimana postingan tersebut dapat terupload secara otomatis sesuai dengan jadwal yang ditentukan.</p>
        <div class="col-lg-12" style="margin-top: 100px "></div>
        </div>
        </div>
        </div>
      
        <div class="container">
        <div class="row">
        <div class="col-lg-12" style="margin-top: 100px "></div>
        <div class="col-lg-6">
        <p class="tt" id="about" style="padding-top: 100px; text-align: left; font-size: 35pt; color: #4D4D4D">TENTANG PEMBUAT</p>
        <p style="padding-top: 50px; text-align: justify;color: #608697;font-size: 15pt"> Aplikasi ini dibuat oleh siswi SMK Negeri 1 Cimahi yang bernama Risma Nurul Widia tingkat XIII
        </p></div>
        <div class="col-lg-6">
        <img src="img/dex2.png" style="width: 85%;height: auto; margin-left: 60px; margin-top: 30px">
      </div>
      <div class="col-lg-12" style="margin-top: 100px "></div>
    </div>
  </div>
  
  


<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
  $(window).scroll(function() {
    if($(document).scrollTop() > 10) {
      $('.navbar').addClass('shrink');
    }
    else {
    $('.navbar').removeClass('shrink');
    }
  });
});
</script>
<script>
  $('.carousel').carousel({
    interval: 2000;
  })
</script>
</body>
</html>