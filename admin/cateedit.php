<?php
  include './inc/header.php';
  include './classes/categories.php';
?>
<?php
    // Get id User
    $category = new categories();
    if(!isset($_GET['id']) || $_GET['id']== NUll) {
      echo "<script>window.location = 'tables.php'</script>";
    } else {
        $category_id = $_GET['id'];
    }
    

?>

<?php
    // Compare id User in DB and Update Name
    $category = new categories();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categoryName = $_POST['cate_name'];
        $category_update = $category -> update_categories($categoryName, $category_id);
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
              <li class="sidebar-item"><a class="sidebar-link" href="./tables.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#real-estate-1"> </use>
                      </svg><span>Tables </span></a></li>
      </nav>
      <div class="page-content form-page p-5">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">Edit Categories</h2>
              </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid py-2">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                  <li class="breadcrumb-item"><a href="tables.php">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Categories</li>
                </ol>
              </nav>
            </div>
        <section class="tables py-10">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg-6">
                <form class="card mb-0 p-2" method="POST" action="">
                <span><?php
                        if(isset($category_update)) {
                          echo $category_update;
                        }
                      ?></span>
                  <div class="card-header d-flex justify-content-between">
                    <h3 class="h2 mb-0">Edit Categories</h3>
                  </div>
                  <div class="card-body pt-0">
                    <div class="table-responsive">
                      <table class="table mb-0">
                      <?php 
                      $get_category = $category->getId_category($category_id);
                      if($get_category) {
                                while($result = $get_category -> fetch_assoc()) {
                        ?>
                        <thead>
                          <tr>
                            <th>Edit Category</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border-bottom-0">
                              <input type="text" class="p-2 rounded" name="cate_name" value="<?php echo $result['name'] ?>" placeholder=". . ." require="">
                            </td>
                            <td class="border-bottom-0">
                              <input class="btn btn-success" type="submit" name="submit" value="Edit"></input>
                            </td>
                          </tr>
                        </tbody>
                        <?php
                        }
                      }
                      ?>
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