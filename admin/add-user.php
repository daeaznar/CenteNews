<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $user_email = $username."@centenews.com";
        $user_pass = $_POST['password'];
        $confirmpass = $_POST['confirmpassword'];
        $sql = mysqli_query($con, "SELECT AdminUserName FROM  tbladmin where AdminUserName='$username' || AdminEmailId='$username'");
        $user_exists= mysqli_fetch_assoc($sql);
        if ($username != $user_exists["AdminUserName"]) {
            if ($user_pass == $confirmpass) {
                $status = 1;
                $encrypted_pass = md5($user_pass);
                $query = "INSERT into tbladmin values(NULL,'$username','$encrypted_pass','$user_email', $status, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
                if (mysqli_query($con, $query)) {
                    $msg = "Usuario creado ";
                    echo "Nombre de usuario: " . $username . "<br>";
                    echo "Correo: ". $user_email;
                } else {
                    $error = "Error inesperado, intente de nuevo";
                }
            } else {
                $error = "La contraseña no coincide";
            }
        } else {
            $error = "El nombre de usuario no está disponible";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>CenteNews | Agregar Usuario</title>
        <link rel="shortcut icon" href="../images/favicon.ico">

        <!-- CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">
        <div id="wrapper">
            <?php include('includes/topheader.php'); ?>
            <?php include('includes/leftsidebar.php'); ?>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Agregar Usuario</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Agregar Usuario </b></h4>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!---Agregado--->
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>¡Éxito!</strong> <?php echo htmlentities($msg); ?>
                                                </div>
                                            <?php } ?>

                                            <!---Error--->
                                            <?php if ($error) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>¡Error!</strong> <?php echo htmlentities($error); ?></div>
                                            <?php } ?>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal" name="user" method="post">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nombre de Usuario</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" value="" name="username" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Contraseña</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" name="password" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Confirma Contraseña</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" value="" name="confirmpassword" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">Aceptar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('includes/footer.php'); ?>
            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>