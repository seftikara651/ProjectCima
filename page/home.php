<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:../index.php'); 
} else { 
   $user = $_SESSION['username']; 
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../css/hover.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/datepicker.min.css">
  <link rel="stylesheet" href="../css/bootstrap-clockpicker.min.css">
  <style>

  @font-face{
  src: url('../font/GOTHIC.TTF');
  font-family: satu;
  }

  @font-face{
  src: url('../font/paperdaisy.TTF');
  font-family: dua;
  }
  
  .footer{
  background-image: url('../img/bg8a.jpg');
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
   <a class="navbar-brand font" href="schedule.php">Schedule</a>
  </li>
  <li class="nav-item active">
   <a class="navbar-brand font" href="#about">About</a>
  </li>
  <li class="nav-item active">
   <a class="navbar-brand font" href="logout.php">Logout</a>
  </li>
</ul>
</nav>
  
       <div id="home" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block w-100" src="../img/bg8a.jpg" alt="First slide">
              <div id="responsecontainer" class="carousel-caption" style="margin-bottom: 200px;" >
                <p class="tt" style="padding-top: 30px;color: #fff; margin-left: 350px;">Hello Everyone!<br><br>Selamat datang di postplan, membuat postingan sosial media mu menjadi mudah</p>
                <a href="#about"><button class="btn btn-danger" style="width: 200px; height: 50px; margin-top: 10px; font-family: satu; color: #9F79E6; margin-right: 50px; background-color: #FFFFFF; border-color: #FFFFFF; font-style:bold; font-size: 15pt;">mulai sekarang</button></a>
              </div>
            </div>
          </div>
        </div>

        <div class="fab" data-toggle="modal" data-target="#myModal">+</div>

          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
              <div class="modal-content" style="border-radius: 30px;">
              
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Schedule</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body">
                 <p class="statusMsg"></p>
                 <form method="post" action ="upload_gambar.php" enctype="multipart/form-data">
                  <div class="form">
                    <label for="inputName">Caption</label>
                      <textarea class="form-control" id="inputName" placeholder="Masukan Caption" name="caption" required></textarea>
                      <label for="inputEmail">Tanggal</label><br>
                      <input type="text" class="form-control" placeholder="Masukan Tanggal" data-toggle="datepicker" name="tanggal" required/>
                      <label for="inputMessage">Jam</label>
                      <input type="text" class="form-control clockpicker" data-autoclose="true" id="inputMessage" placeholder="Masukan Jam" name="jam" required/>
                      <label for="inputMessage">Foto</label><br>
                      <input type="file" id="inputFoto" placeholder="Masukan Gambar" name="gambar"/>
                      <br><br>
                      <div class="modal-footer">
                      <button class="btn btn-primary" style="font-family: satu;">Upload</button>
                      </div>
                    </div>
                   </form>
                </div>
              </div>
            </div>
          </div>

          <div class="fab" data-toggle="modal" data-target="#myMunah" style="margin-right: 150px;" font-size="12pt">story</div>
          
          <div class="modal fade" id="myMunah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content" style="border-radius: 30px;">
              
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Story</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body">
                 <p class="statusMsg"></p>
                 <form method="post" action ="upload_gambar.php" enctype="multipart/form-data">
                  <div class="form">
                
                      <label for="inputEmail">Tanggal</label><br>
                      <input type="text" class="form-control" placeholder="Masukan Tanggal" data-toggle="datepicker" name="tanggal" required/>
                      <label for="inputMessage">Jam</label>
                      <input type="text" class="form-control clockpicker" data-autoclose="true" id="inputMessage" placeholder="Masukan Jam" name="jam" required/>
                      <label for="inputMessage">Foto/Video</label><br>
                      <input type="file" id="inputFoto" placeholder="Masukan Gambar" name="gambar"/>
                      <br><br>
                      <div class="modal-footer">
                      <button class="btn btn-primary" style="font-family: satu;">Upload</button>
                      </div>
                    </div>
                   </form>
                </div>
              </div>
            </div>
          </div>

    <div class="container">
        <div class="row">
           <div class="col-lg-12" style="margin-top: 100px "></div>
          <div class="col-lg-6">
            <img src="../img/k.png" style="width: 85%;height: auto; margin-left: 0px; margin-top: 30px">
          </div>
           <div class="col-lg-6" id="about">
            <p class="tt" id="about" style="padding-top: 100px; text-align: right; font-size: 35pt; color: #4D4D4D">APA ITU PLAYGRAM ?</p>
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
            <p style="padding-top: 50px; text-align: justify;color: #608697;font-size: 15pt">
            </p></div>
            <div class="col-lg-6">
            <img src="../img/l2.png" style="width: 85%;height: auto; margin-left: 60px; margin-top: 30px">
          </div>
          <div class="col-lg-12" style="margin-top: 100px "></div>
        </div>
      </div>
  
  


<script src="../js/jquery-3.2.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/datepicker.min.js"></script>
<script src="../js/bootstrap-clockpicker.min.js"></script>
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
  $('[data-toggle="datepicker"]').datepicker({
    format: 'yyyy-mm-dd'
  });
  $('.clockpicker').clockpicker();
});
</script>
</body>
</html>
