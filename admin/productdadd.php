<?php
include './inc/header.php';
include './classes/products.php';
?>
<?php
$class = new products();
$show_category = $class->show_category();
$show_brand = $class->show_brand();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $prod_name = $_POST['prod_name'];
  $prod_file = $_POST['prod_file'];
  $brand_id = $_POST['brand_id'];
  $cate_id = $_POST['cate_id'];
  $prod_price = $_POST['prod_price'];
  $prod_price_old = $_POST['prod_price_old'];
  $prod_desc = $_POST['prod_desc'];
  $prod_tag = $_POST['prod_tag'];

  $cate_sort = $class->findMaxSort();
  $cate_sortnew = (int)$cate_sort + 1;

  $insert_product = $class->insert_product( $prod_name,$prod_file,$brand_id,$cate_id,$prod_price,$prod_price_old,$prod_desc,$prod_tag,$cate_sortnew);
  // header('location: tables.php');
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
        <li class="sidebar-item"><a class="sidebar-link" href="./products.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#real-estate-1"> </use>
            </svg><span>Products </span></a></li>
    </nav>
    <div class="page-content form-page p-5">
      <!-- Page Header-->
      <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
          <h2 class="h5 mb-0">Add Products</h2>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 py-3 px-0">
            <li class="breadcrumb-item"><a href="products.php">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Products</li>
          </ol>
        </nav>
      </div>
      <section class="tables py-10">
        <div class="container-fluid">
          <div class="row gy-4">
            <form class="card mb-0 p-2" method="POST" action="">
              <div class="col">
                <div class="card-header d-flex justify-content-between">
                  <h3 class="h2 mb-0">Products</h3>
                </div>
                <div class="card-body pt-0">
                  <?php
                  if (isset($insert_product)) {
                    echo $insert_product;
                  }
                  ?>
                  <div class="table-responsive">
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th>Name product</th>
                          <th>Image product</th>
                          <th>Category</th>
                          <th>Brand</th>
                          <th>Price product</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="border-bottom-0">
                            <input type="text" class="p-2 rounded" name="prod_name" placeholder="Enter Product Name...">
                          </td>
                          <td class="border-bottom-0">
                            <input type="file" class="p-2 rounded" name="prod_file">
                          </td>
                          <td class="border-bottom-0">
                            <?php
                            if ($show_category) {
                              $options = "";
                              while ($cate_result = $show_category->fetch_assoc()) {
                                $options .= "<option value='" . $cate_result['id'] . "'>" . $cate_result['name'] . "</option>";
                              }
                            ?>
                              <select name="cate_id">
                                <?php echo $options ?>
                              </select>
                            <?php
                            }
                            ?>
                          </td>
                          <td class="border-bottom-0">
                            <?php
                            if ($show_brand) {
                              $options = "";
                              while ($brand_result = $show_brand->fetch_assoc()) {
                                $options .= "<option value='" . $brand_result['id'] . "'>" . $brand_result['name'] . "</option>";
                              }
                            ?>
                              <select name="brand_id">
                                <?php echo $options ?>
                              </select>
                            <?php
                            }
                            ?>
                          </td>
                          <td class="border-bottom-0">
                            <input type="text" class="p-2 rounded" name="prod_price">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card-header d-flex justify-content-between">
                </div>
                <div class="card-body pt-0">
                  <?php
                  if (isset($insert_cateName)) {
                    echo $insert_cateName;
                  }
                  ?>
                  <div class="table-responsive">
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th>Price old</th>
                          <th>Description</th>
                          <th>Tag</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="border-bottom-0">
                            <input type="text" class="p-2 rounded" name="prod_price_old">
                          </td>
                          <td class="border-bottom-0">
                            <input type="text" class="p-2 rounded" name="prod_desc">
                          </td>
                          <td class="border-bottom-0">
                            <input type="text" class="p-2 rounded" name="prod_tag">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <td class="border-bottom-0">
                <input class="btn btn-success" type="submit" name="submit" value="Add"></input>
              </td>
              </form>
          </div>
        </div>
    </div>
    </section>

    <!-- ====================== FOOTER =================== -->
    <?php include 'inc/footer.php'; ?>