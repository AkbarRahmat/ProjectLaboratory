<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..' . $ds . '..' . $ds) . $ds;

// Init
$sidebar_selected = "dashboard";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php require_once("{$base_dir}pages{$ds}core{$ds}header.php");?> 

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Start Ngoding Disini -->

        <!-- End Ngoding Disini -->

      </div>
    </section>
  </main><!-- End #main -->

  <?php require_once("{$base_dir}pages{$ds}core{$ds}footer.php");?> 
</body>
</html>