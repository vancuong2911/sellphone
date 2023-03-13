<?php
include './inc/header.php';
include 'classes/brands.php';
?>

<?php
$class = new brands();
$show_brands = $class->show_brands();

// $brandName = '';
// $brand_id = '';

// $update_brand = $class->update_brand($brandName, $brand_id);


if(isset($_GET['deleid'])) {
  $dele_id = $_GET['deleid'];
  $delete_brand = $class->delete_brand($dele_id);
  header('location: brands.php');
}

// Sửa hiển thị message


?>



<!-- ============================= HEADER ============================== -->




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
          <li class="sidebar-item active"><a class="sidebar-link" href="brands.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg><span>Brands </span></a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="products.php">
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
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">brands</li>
        </ol>
      </nav>
    </div>
    <section class="tables py-0">
      <div class="container-fluid">
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="card mb-0">
              <div class="card-header d-flex justify-content-between">
                <h3 class="h4 mb-0">Brands</h3>
                <h3><a href="brandadd.php" class="btn btn-info">New brands</a></h3>
              </div>
              <div class="card-body pt-0">
                <div class="table-responsive">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Name brands</th>
                        <th>Link Image</th>
                        <th>Link Website</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      if ($show_brands) {
                        $i = 0;
                        while ($result = $show_brands->fetch_assoc()) {
                          $i++;
                      ?>
                          <tr>
                            <th class="border-bottom-0" scope="row"><?php echo $result['sort_order'] ?></th>
                            <td class="border-bottom-0"><?php echo $result['name'] ?></td>
                            <td class="border-bottom-0"><?php echo $result['image_url'] ?></td>
                            <td class="border-bottom-0"><a href="<?php echo $result['link'] ?>"><?php echo $result['link'] ?></a></td>
                            <td class="border-bottom-0">
                              <a href="brandedit.php?id=<?php echo $result['id'] ?>" class="btn btn-warning">Edit</a>
                              <a onclick="return confirm('You are want delete?')" href="?deleid=<?php echo $result['id'] ?>" class="btn btn-danger" >Delete</a>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ====================== FOOTER =================== -->
    <?php include './inc/footer.php'; ?>