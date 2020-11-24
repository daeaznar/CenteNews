<?php
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CenteNews | Home</title>
  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <?php include('includes/header.php'); ?>
</head>

<body>
  <?php
  $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostImage,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId ORDER BY pid DESC limit 1");
  while ($row = mysqli_fetch_array($query)) {
  ?>
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark" style="background-image: url('admin/postimages/<?php echo htmlentities($row['PostImage']) ?>');">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">
          <a><?php echo htmlentities($row['posttitle']); ?></a>
        </h1>
        <p class="lead mb-0"><a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="text-white font-weight-bold">Continúa leyendo...</a></p>
      <?php } ?>
      </div>
    </div>

    <div class="container">
      <div class="row" style="margin-top: 4%">
        <div class="col-md-8">
          <?php
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


          $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc LIMIT 8 OFFSET 1 ");
          while ($row = mysqli_fetch_array($query)) {
          ?>

            <div class="card mb-4">
              <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
              <div class="card-body">
                <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>
                <p><b>Categoría : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></a> </p>

                <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-primary">Sigue Leyendo &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                <?php 
                $sql = "SELECT postingdate, AdminUserName FROM tblposts INNER JOIN tbladmin ON tblposts.creator_id = tbladmin.id";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                echo "Publicado en: " . $row["postingdate"] . " | ". "Por: " . $row["AdminUserName"]; 
                ?>
              </div>
            </div>
          <?php } ?>
        </div>
        <?php include('includes/sidebar.php'); ?>
      </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    </head>
</body>

</html>