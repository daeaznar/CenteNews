<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CenteNews | Search</title>
  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <?php include('includes/header.php'); ?>
</head>

<body>
  <div class="container">
    <div class="row" style="margin-top: 4%">
      <div class="col-md-8">
        <?php
        if ($_POST['searchtitle'] != '') {
          $st = $_SESSION['searchtitle'] = $_POST['searchtitle'];
        }
        $st;

        if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
        } else {
          $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno - 1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");

        $rowcount = mysqli_num_rows($query);
        if ($rowcount == 0) {
          echo "<h4>No hay resultados que coincidan con su búsqueda</h4>";
        } else {
          while ($row = mysqli_fetch_array($query)) {

        ?>
            <div class="card mb-4">
              <div class="card-body">
                <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>
               <br>
                <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-primary">Ir a la noticia &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on <?php echo htmlentities($row['postingdate']); ?>

              </div>
            </div>
          <?php } ?>
        <?php } ?>
      </div>

      <?php include('includes/sidebar.php'); ?>
    </div>
  </div>
  <?php include('includes/footer.php'); ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>