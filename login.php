<?php

$host_name = "localhost";
$host_user = "id15064877_daeaznar";
$host_pass = "htB+{^7s[pP<6nTc";
$database = "id15064877_centenews";

$connection = mysqli_connect($host_name, $host_user, $host_pass, $database);

/*if($connection){
    echo "You're connected";
}else{
    echo "Sorry, not connected";
}


/*
if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error : " . $sql . "<br>" . mysqli_error($connection);
  }
*/
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="css/login.css">

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

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
    <link href="css/login.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="img/CLogo.png" alt="" width="150" height="150">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
    <div> 
      <a class="btn btn-sm btn-outline-secondary" href="index.php">Regresar</a>
    </div>
  </body>
</html>