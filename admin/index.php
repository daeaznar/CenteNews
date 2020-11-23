<?php
session_start();
require('includes/config.php');

if (isset($_POST['login'])) {

  $uname = $_POST['username'];
  $password = $_POST['password'];
  $sql = mysqli_query($con, "SELECT AdminUserName,AdminEmailId,AdminPassword FROM tbladmin WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
  $num = mysqli_fetch_array($sql);
  $sqlquery = ("SELECT AdminPassword FROM tbladmin WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
  $pass = mysqli_query($con, $sqlquery);
  if ($num > 0) {
    $checkpass = md5($password);
    if ($checkpass = $pass) {
      $_SESSION['login'] = $_POST['username'];
      echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
      echo "<script>alert('Wrong Username or Password');</script>";
    }
  } else {
    echo "<script>alert('Wrong Username or Password');</script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>CenteNews | Login</title>
  <link rel="shortcut icon" href="../images/favicon.ico">

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

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
  <link href="assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" method="POST">
    <img class="mb-4" src="../img/CLogo.png" alt="" width="150" height="150">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Email address" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
    <br><br>
    <p class="mt-5 mb-3 text-muted">&copy;CenteNews - 2020</p>
    <a class="btn btn-sm btn-outline-secondary" href="../index.php">Go Back</a>
  </form>
</body>

</html>