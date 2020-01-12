<?php 
session_start();
if(!isset($_SESSION['username'])) {
   header('location:../index.php'); 
} else { 
   $user = $_SESSION['username']; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    POSTPLAN
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="../css/datepicker.min.css" rel="stylesheet" />
  <link href="../css/bootstrap-clockpicker.min.css" rel="stylesheet">
  <style>
    .fab {
   width: 70px;
   height: 70px;
   background-color: #62ADD7;
   border-radius: 50%;
   transition: all 0.1s ease-in-out;
 
   font-size: 50px;
   color: white;
   text-align: center;
   line-height: 60px;
 
   position: fixed;
   right: 50px;
   bottom: 50px;
}
 
  .fab:hover {
     transform: scale(1.05);
}

.datepicker-container{
    z-index: 99999 !important;

  }
  </style>
</head>

<body id="responsecontainer">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          POSTPLAN
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link" href="schedule.php">
              <i class="material-icons">content_paste</i>
              <p>Table Posting Feed</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="story.php">
              <i class="material-icons">content_paste</i>
              <p>Table Posting Story</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="history.php">
              <i class="material-icons">library_books</i>
              <p>Tabel History</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
		  <div class="navbar-wrapper">
            <a class="navbar-brand" href="home.php">Home</a>
          </div>
           <div class="navbar-wrapper">
            <a class="navbar-brand" href="logout.php">Logout</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tabel Posting Feed</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Gambar
                        </th>
                        <th>
                          Nama File
                        </th>
                        <th>
                          Caption
                        </th>
                        <th>
                          Tanggal Posting
                        </th>
                        <th>
                          Jam Posting
                        </th>
                        <th style="text-align: center;">
                          Aksi
                        </th>
                      </thead>
                      <tbody>
                        <?php
                        
                        include "koneksi.php";

                        $query = "SELECT * FROM add_schedule where id_pengguna='".$_SESSION['user_id']."'"; 
                        //echo 'console.log("'.$query.'")';
                        $sql = mysqli_query($connect, $query); 
                        $row = mysqli_num_rows($sql);
                        if($row > 0){
                        while($data = mysqli_fetch_array($sql)){
                          echo "<tr>";
                          echo "<td>
                            <img src='../img/".$data['nama']."'width='100' height='100'>
                          </td>";
                          echo "<td>".$data['nama']."</td>";
                          echo "<td>".$data['caption']."</td>";
                          echo "<td>".$data['tanggal']. "</td>";
                          echo "<td>".$data['jam']."</td>";
                          echo "
                          <td>
                            <div style='margin-left: 50%; transform: translate(-75%, 0); white-space: nowrap'>
                            <a style='color:white;width: 100px;' class='btn btn-primary' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='proses_hapus.php?id=".$data['id']."'>Hapus</a>
                            <a href='#myModal' style='width: 100px;' class='btn btn-warning' id='custId' data-toggle='modal' data-id='".$data['id']."'>Edit</a>
                            </div>
                          </td>
                          ";
                          echo "</tr>";  
                          }
                        }else{
                          echo "<tr><td> <colspan='4'> Data tidak ada</td></tr>";
                        }
                        ?>
                      </tbody>
                    </table>

                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Data</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="fetched-data"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-body">
                                  <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                              </div>
                              <div class="modal-footer">
                                  <a class="btn btn-primary btn-ok"> Hapus</a>
                                  <button type="button" class="btn btn-warning" data-dismiss="modal"></i> Batal</button>
                              </div>
                          </div>
                      </div>
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
    </div>
      </div>
    </div>
  </div>

  <script src="../js/bootstrap-clockpicker.min.js"></script>
  <script src="../js/datepicker.min.js"></script>
  <script src="../js/core/jquery.min.js"></script>
  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap-material-design.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../js/plugins/moment.min.js"></script>
  <script src="../js/plugins/sweetalert2.js"></script>
  <script src="../js/plugins/jquery.validate.min.js"></script>
  <script src="../js/plugins/jquery.bootstrap-wizard.js"></script>
  <script src="../js/plugins/bootstrap-selectpicker.js"></script>
  <script src="../js/plugins/bootstrap-datetimepicker.min.js"></script>
  <script src="../js/plugins/jquery.dataTables.min.js"></script>
  <script src="../js/plugins/bootstrap-tagsinput.js"></script>
  <script src="../js/plugins/jasny-bootstrap.min.js"></script>
  <script src="../js/plugins/fullcalendar.min.js"></script>
  <script src="../js/plugins/jquery-jvectormap.js"></script>
  <script src="../js/plugins/nouislider.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script src="../js/plugins/arrive.min.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : 'modal_edit.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);
                }
            });
         });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
  </script>
</body>

</html>
