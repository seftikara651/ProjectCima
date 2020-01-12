<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../css/hover.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/register.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top: 20px">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Masukan Username dan Password Anda</h5>
            <form class="form-signin" method="post" action ="proseslogin.php">
              <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" placeholder="Email address" name="username" required>
                <label for="inputUsername">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword">Password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button><br>
              <a href="register.php"><button class="btn btn-lg btn-success btn-block text-uppercase" type="button">Daftar</button></a>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="../js/jquery-3.2.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>