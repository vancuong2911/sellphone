<?php
include 'classes/products.php';
?>

<?php
$product = new products();
$paging = $product->paging();

if (isset($_GET['pageNum'])) {
  $page_num = (int) $_GET['pageNum'];
} else {
  $page_num = 1;
}

$page_num = $paging['pageNum'];
// echo $page_num;


$export1page = $product->exportData($page_num);
echo $export1page;

