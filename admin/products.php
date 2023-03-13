<?php
include './inc/header.php';
include 'classes/products.php';
?>

<?php
$product = new products();
$show_product = $product->show_products();
$paging = $product->paging();


$item_page = $paging['item_page'];
$first_page_item = $paging['first_page_item'];
$page_num = $paging['pageNum'];
// echo $page_num;

if (isset($_GET['pageNum'])) {
  $page_num = (int) $_GET['pageNum'];
} else {
  $page_num = 1;
}

if(isset($_POST['export1page'])) {
  $export1page = $product->exportData($page_num);
  echo $export1page;
  exit();
}


$item_per_page = $show_product['item_per_page'];
$sum_record = $paging['sum_record'];

$sumPage = ceil($sum_record / $item_per_page);

$from = (int)$page_num - 3;
if ($from < 1) $from = 1;

$to = (int)$page_num + 3;
if ($to > $sumPage) $to = $sumPage;

if(isset($_GET['deleid'])) {
  $dele_id = $_GET['deleid'];
  $delete_product = $product->delete_product($dele_id);
  header('location: products.php');
}



?>



<!-- ============================= HEADER ============================== -->
<style>
  .pt-0 {
    height: 27rem;
  }
  .pagination {
    display: inline-block;
    position: absolute;
    bottom: 2rem;
    width: 100%;
    text-align: center;
  }

  .pagination ul {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .pagination li {
    display: inline-block;
    margin: 0;
  }

  .pagination li a {
    display: inline-block;
    padding: 6px 12px;
    text-decoration: none;
    color: #fff;
    border: 1px solid #ddd;
  }

  .pagination li.active a {
    background-color: #337ab7;
    color: #fff;
    border-color: #337ab7;
  }

  .pagination li a:hover {
    background-color: #ddd;
    color: #333;
  }

  .page-link.active {
    background-color: red;
  }
</style>


<div class="d-flex align-items-stretch">
  <!-- Sidebar Navigation-->
  <nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle" src="../img/avatar-6.jpg" alt="...">
      <div class="ms-3 title">
        <h1 class="h5 mb-1">Cuong</h1>
        <p class="text-sm text-gray-700 mb-0 lh-1">Web Designer</p>
      </div>
    </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
    <ul class="list-unstyled">
      <li class="sidebar-item active"><a class="sidebar-link" href="index.php">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#real-estate-1"> </use>
          </svg><span>Home </span></a></li>

      <?php
      if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
      }
      ?>

      <li class="sidebar-item"><a class="sidebar-link" data-bs-toggle="collapse">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#browser-window-1"> </use>
          </svg><span>Tables </span></a>
        <ul class="list-unstyled " id="exampledropdownDropdown">
          <li class="sidebar-item"><a class="sidebar-link" href="tables.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg><span>Categories </span></a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="brands.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg><span>Brands </span></a></li>
          <li class="sidebar-item active"><a class="sidebar-link" href="products.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg><span>Product </span></a></li>
        </ul>
      <li class="sidebar-item"><a class="sidebar-link" href="?action=logout">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#disable-1"> </use>
          </svg><span>Login page </span></a></li>
  </nav>
  <div class="page-content form-page">
    <!-- Page Header-->
    <div class="bg-dash-dark-2 py-4">
      <div class="container-fluid">
        <h2 class="h5 mb-0">Brands</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="products.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">products</li>
        </ol>
      </nav>
    </div>
    <section class="tables py-0">
      <div class="container-fluid">
        <div class="row gy-4 text-sm">
          <div class="col">
            <div class="card mb-0">
              <div class="card-header d-flex justify-content-between">
                <h3 class="h4 mb-0">Products</h3>
                <h3 class="h4 mb-0 text-muted"><?php echo "Trang hiện tại: ".$page_num?></h3>
                <div class="h4 d-flex">
                  <h3><a href="productdadd.php" class="btn btn-info m-2">New Product</a></h3>
                  <h3><a href="exportexcel.php" onclick="return confirm('You are want export all data in products?')" class="btn btn-success m-2">Export Excel All</a></h3>
                  <form action="" method="POST">
                    <input type="submit" name="export1page" onclick="return confirm('You are want export data in pages <?php echo $page_num; ?>?')" class="btn btn-success m-2" value="Export Excel in Page">
                    <!-- <a href="exportexcel1page.php" onclick="return confirm('You are want export data in pages <?php echo $page_num; ?>?')" class="btn btn-success m-2" >Export Excel in Page</a> -->
                  </form>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="table-responsive">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Name product</th>
                        <th>Name brands</th>
                        <th>Name category</th>
                        <th>Image product</th>
                        <th>Price product</th>
                        <th>Price product old</th>
                        <th>Description</th>
                        <th>Tag</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($first_page_item) {
                        $i = 0;
                        while ($result = $first_page_item->fetch_assoc()) {
                          $i++;
                      ?>
                          <tr>
                            <th class="border-bottom-0" scope="row"><?php echo $i ?></th>
                            <td class="border-bottom-0"><?php echo $result['name'] ?></td>
                            <td class="border-bottom-0"><?php echo $result['brand_name'] ?></td>
                            <td class="border-bottom-0"><?php echo $result['cate_name'] ?></td>
                            <td class="border-bottom-0"><?php echo $result['image'] ?></td>
                            <td class="border-bottom-0"><?php echo $result['price'] ?></td>
                            <td class="border-bottom-0"><?php echo $result['old_price'] ?></td>
                            <td class="border-bottom-0"><?php echo $result['description'] ?></td>
                            <td class="border-bottom-0"><?php echo $result['tags'] ?></td>
                            <td class="border-bottom-0 ">
                              <a href="productedit.php?id=<?php echo $result['id'] ?>" class="btn btn-warning">Edit</a>
                              <a onclick="return confirm('You are want delete?')" href="?deleid=<?php echo $result['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                  <div class="pagination">
                    <ul>
                      <?php if ($page_num > 1) { ?>
                        <li><a href="?pageNum=1">Trang đầu</a></li>
                      <?php
                      }
                      ?>
                      <?php
                      for ($i = $from; $i <= $to; $i++) {
                      ?>
                        <li><a href="?pageNum=<?php echo $i ?>"><?php echo $i ?></a></li>
                      <?php
                      }
                      ?>
                      <?php if ($page_num < $sumPage) { ?>
                        <li><a href="?pageNum=<?php echo $page_num + 1 ?>">Trang tiếp theo</a></li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ====================== FOOTER =================== -->
    <?php include './inc/footer.php'; ?>