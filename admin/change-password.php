<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        //obtener datos
        $password = $_POST['password'];
        $userid = $_SESSION['login'];
        // Nueva contraseña
        $newpassword = $_POST['newpassword'];
        $confirmpass = $_POST['confirmpassword'];

        $sql = mysqli_query($con, "SELECT AdminPassword FROM  tbladmin where AdminUserName='$userid' || AdminEmailId='$userid'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            
            $checkpass = md5($password);
            $sqlquery = ("SELECT AdminPassword FROM tbladmin WHERE (AdminUserName='$userid' || AdminEmailId='$userid')");
            $result = mysqli_query($con, $sqlquery);
            $pass = mysqli_fetch_assoc($result);

            if ($checkpass == $pass["AdminPassword"]) {
                if ($newpassword == $confirmpass) {
                    $new_encryptedpass = md5($newpassword);
                    $update = "UPDATE tbladmin SET AdminPassword='$new_encryptedpass', updationDate= CURRENT_TIMESTAMP where AdminUserName='$userid'";
                    if (mysqli_query($con, $update)) {
                        $msg = "¡Contraseña Modificada!";
                    } else {
                        $error = "Algo salió mal, intenta de nuevo más tarde";
                    }
                    
                } else {
                    $error = "La nueva contraseña no coincide";
                }
            }else {
                $error = "Contraseña actual incorrecta";
            }
        } else {
            $error = "No hay usuario";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>CenteNews | Modificar Contraseña</title>
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
        <script type="text/javascript">
            function valid() {
                if (document.chngpwd.password.value == "") {
                    alert("Por favor ingresa una contraseña nueva");
                    document.chngpwd.password.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value == "") {
                    alert("Por favor confirma la contraseña");
                    document.chngpwd.newpassword.focus();
                    return false;
                } else if (document.chngpwd.confirmpassword.value == "") {
                    alert("Por favor confirma la contraseña");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("Las conraseñas NO coinciden");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
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
                                    <h4 class="page-title">Cambiar Contraseña</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Cambiar Contraseña </b></h4>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>¡Éxito!</strong> <?php echo htmlentities($msg); ?>
                                                </div>
                                            <?php } ?>

                                            <!---Error Message--->
                                            <?php if ($error) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>¡Error!</strong> <?php echo htmlentities($error); ?></div>
                                            <?php } ?>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10">
                                            <form class="form-horizontal" name="chngpwd" method="post" onSubmit="return valid();">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Contraseña Actual</label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" value="" name="password" required>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Nueva Contraseña</label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" value="" name="newpassword" required>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Confirma tu nueva Contraseña</label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" value="" name="confirmpassword" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">&nbsp;</label>
                                                    <div class="col-md-8">

                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                            Submit
                                                        </button>
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