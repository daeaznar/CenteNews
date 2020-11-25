<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if ($_GET['action'] = 'del') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "DELETE from tblposts where id='$postid'");
        if ($query) {
            $msg = "Nota Eliminada ";
        } else {
            $error = "¡Algo salió mal, intenta de nuevo más tarde!";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <title>CenteNews | Modificar Notas</title>
        <link rel="shortcut icon" href="../images/favicon.ico">

        <link rel="stylesheet" href="../plugins/morris/morris.css">
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
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
                                    <h4 class="page-title">Editar Notas </h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">

                                    <div class="table-responsive">
                                        <table class="table table-colored table-centered table-inverse m-0">
                                            <thead>
                                                <tr>

                                                    <th>Título</th>
                                                    <th>Categoría</th>
                                                    <th>Subcategoría</th>
                                                    <th>Fecha Publicación</th>
                                                    <th>Autor</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $query = mysqli_query($con, "select tblposts.id as postid,tblposts.PostTitle as title,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 ");
                                                $rowcount = mysqli_num_rows($query);
                                                if ($rowcount == 0) {
                                                ?>
                                                    <tr>

                                                        <td colspan="4" align="center">
                                                            <h3 style="color:red">No Existen Notas aún</h3>
                                                        </td>
                                                    <tr>
                                                        <?php
                                                    } else {
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <?php $post_id = $row['postid'];?>
                                                    <tr>
                                                        <td><b><?php echo htmlentities($row['title']); ?></b></td>
                                                        <td><?php echo htmlentities($row['category']) ?></td>
                                                        <td><?php echo htmlentities($row['subcategory']) ?></td>
                                                        <?php
                                                            $sql = "SELECT PostingDate, AdminUserName FROM tblposts INNER JOIN tbladmin ON tblposts.creator_id = tbladmin.id WHERE tblposts.id = '$post_id'";
                                                            $result = mysqli_query($con, $sql);
                                                            $author = mysqli_fetch_assoc($result);
                                                        ?>
                                                        <td><?php echo htmlentities($author['PostingDate']) ?></td>
                                                        <td><?php echo htmlentities($author['AdminUserName']) ?></td>


                                                        <td><a href="edit-post.php?pid=<?php echo htmlentities($row['postid']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                            &nbsp;<a href="manage-posts.php?pid=<?php echo htmlentities($row['postid']); ?>&&action=del" onclick="return confirm('¿Seguro que desea eliminar la nota?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                                                    </tr>
                                            <?php }
                                                    } ?>

                                            </tbody>
                                        </table>
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

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
        <script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>