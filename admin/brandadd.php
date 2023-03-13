<?php
  include './inc/header.php';
  include './classes/brands.php';
?>
<?php 
  $class = new brands();
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_name = $_POST['brand_name'];
    $brand_img_link = $_POST['brand_img_link'];
    $brand_link_web = $_POST['brand_link_web'];
    $brand_sort = $class->findMaxSort();
    $brand_sortnew = (int)$brand_sort + 1;

    $insert_brandName = $class->insert_brand($brand_name,$brand_img_link,$brand_link_web,$brand_sortnew);
    // header('location: brands.php');

  }
?>






<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Admin Cuong</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Choices.js-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/php5shiv/3.7.3/php5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
   


<!-- ============================= HEADER ============================== -->




    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle" src="../img/avatar-6.jpg" alt="...">
          <div class="ms-3 title">
            <h1 class="h5 mb-1">Van Cuong</h1>
            <p class="text-sm text-gray-700 mb-0 lh-1">Web Designer</p>
          </div>
        </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
        <ul class="list-unstyled">
              <li class="sidebar-item"><a class="sidebar-link" href="./index.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#real-estate-1"> </use>
                      </svg><span>Brand </span></a></li>
      </nav>
      <div class="page-content form-page p-5">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">Add Brands</h2>
              </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid py-2">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                  <li class="breadcrumb-item"><a href="brands.php">Brands</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
                </ol>
              </nav>
            </div>
        <section class="tables py-10">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg">
                <form class="card mb-0 p-2" method="POST" action="">
                  <div class="card-header d-flex justify-content-between">
                    <h3 class="h2 mb-0">Brands</h3>
                  </div>
                  <div class="card-body pt-0">
                    <?php
                    if(isset($insert_brandName)) {
                      echo $insert_brandName;
                    }
                    ?>
                    <div class="table-responsive">
                      <table class="table mb-0">
                        <thead>
                          <tr>
                            <th>Name Brand</th>
                            <th>Image Brand</th>
                            <th>Link Website Brand <i>(If any)</i></th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border-bottom-0">
                              <input type="text" class="p-2 rounded" name="brand_name" placeholder="Enter Brand Name...">
                            </td>
                            <td class="border-bottom-0">
                              <input type="file" class="p-2" name="brand_img_link">
                            </td>
                            <td class="border-bottom-0">
                                <input type="text" class="p-2 rounded" name="brand_link_web" placeholder="Enter Brand Link Website...">
                            </td>
                            <td class="border-bottom-0">
                              <input class="btn btn-success" type="submit" name="submit" value="Add"></input>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>

<!-- ====================== FOOTER =================== -->
<?php include 'inc/footer.php'; ?>