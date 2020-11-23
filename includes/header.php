<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="David Hernández Aznar">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>CenteNews</title>

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  <link href="css/blog.css" rel="stylesheet">

</head>

<body>
  <div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="text-muted">
            <?php
            echo date("l-d/m/Y");
            ?>
          </a>
        </div>
        <div class="col-4 text-center">
          <a href="index.php">
            <h1 class="blog-header-logo text-dark">CenteNews</h1>
          </a>
        </div>

        <div class="col-4 d-flex justify-content-end align-items-center">
          <form name="search" action="search.php" method="post">
            <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
          </form>
          <a class="text-muted" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false">
              <title>Search</title>
              <circle cx="10.5" cy="10.5" r="7.5" />
              <path d="M21 21l-5.2-5.2" />
            </svg>
          </a>
          <a class="btn btn-sm btn-outline-secondary" href="admin/index.php">Log In</a>
        </div>

      </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <?php
        $query = mysqli_query($con, "select id,CategoryName from tblcategory");
        while ($row = mysqli_fetch_array($query)) {
        ?>

          <a class="p-2 text-muted" href="#">
            <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>
          </a>
        <?php } ?>
      </nav>
    </div>
</body>

</html>