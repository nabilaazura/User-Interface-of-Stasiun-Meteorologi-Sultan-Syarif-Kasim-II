<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>E-ARSIP STAMET PKU</title>
    <link rel="shortcut icon" href="assets/img/logo2.png">


    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="post" action="cek_login.php">
      <div class="text-center mb-4">
        <img class="mb-4" src="assets/img/logo.png" alt="" width="200">
        <h1 class="h3 mb-3 font-weight-normal">Login e-Arsip</h1>
        <p>Silakan masukkan username dan password agar dapat login ke sistem e-Arsip</p>
      </div>

      <div class="form-label-group">
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="username">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <label for="password">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy;<?=date('Y')?> By <a href="#">BMKG PEKANBARU</a></p>
  </form>
</body>
</html>
