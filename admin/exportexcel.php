<?php
include '../lib/database.php';

$db = new Database();

function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}

// Name file download
$fileName = "codeworld_exprot_data-". date('Ymd') . ".xls";

// Column names 
$fields = array('id', 'Name product', 'Name brands', 'Name category', 'Image product', 'Price product', 'Price product old', 'Description', 'Tags');

// Hiển thị các name của $fields bằng một hàng cách nhau bắc dấu tab
$excelData = implode("\t", array_values($fields)) . "\n"; 

// Fetch records from database 
$query = $db->select("SELECT products.*, categories.name as cate_name, brands.name as brand_name FROM products 
        INNER JOIN categories ON products.category_id = categories.id 
        INNER JOIN brands ON products.brand_id = brands.id
        WHERE products.active = 1 ORDER BY products.sort_order"); 

if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $status = ($row['active'] == 1)?'Active':'No Active'; 
        $lineData = array($row['id'], $row['cate_name'], $row['brand_name'], $row['name'], $row['image'], $row['price'], $row['old_price'], $row['description'], $row['tags'], $status); 
        // Thực thi hàm filterDate với mỗi phần tử trong $lineData
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 

// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;
?>