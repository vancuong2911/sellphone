<?php
include '../lib/database.php';
include '../helpers/format.php';
?>


<?php
class products
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_product($prod_name, $prod_file, $brand_id, $cate_id, $prod_price, $prod_price_old, $prod_desc, $prod_tag, $cate_sortnew)
    {
        $prod_name = $this->fm->validation($prod_name);
        $prod_file = $this->fm->validation($prod_file);
        $brand_id = $this->fm->validation($brand_id);
        $cate_id = $this->fm->validation($cate_id);
        $prod_price = $this->fm->validation($prod_price);
        $prod_price_old = $this->fm->validation($prod_price_old);
        $prod_desc = $this->fm->validation($prod_desc);
        $prod_tag = $this->fm->validation($prod_tag);

        $prod_name = mysqli_real_escape_string($this->db->link, $prod_name);
        $prod_file = mysqli_real_escape_string($this->db->link, $prod_file);
        $brand_id = mysqli_real_escape_string($this->db->link, $brand_id);
        $cate_id = mysqli_real_escape_string($this->db->link, $cate_id);
        $prod_price = mysqli_real_escape_string($this->db->link, $prod_price);
        $prod_price_old = mysqli_real_escape_string($this->db->link, $prod_price_old);
        $prod_desc = mysqli_real_escape_string($this->db->link, $prod_desc);
        $prod_tag = mysqli_real_escape_string($this->db->link, $prod_tag);

        if (empty($prod_name)) {
            $alert = "<span class='text-danger'>product must be not empty</span>";
            return $alert;
        } else {
            $query = "INSERT INTO products (brand_id,category_id,name,image,price,old_price,description,tags,sort_order) VALUES ('$brand_id','$cate_id','$prod_name', '$prod_file', '$prod_price', '$prod_price_old', '$prod_desc', '$prod_tag','$cate_sortnew')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='text-success'>Add categories success!</span>";
                return $alert;
            } else {
                $alert = "<span class='text-danger'>Add categories error!</span>";
                return $alert;
            }
        }
    }

    public function show_products()
    {
        // Phân trang ở đây
        // Sử dụng WHERE active 
        $item_per_page = 5;
        $startRow = 0;  // chỉ số bắt đầu của sản phẩm trên trang đó
        $pageNum = 1;

        if (isset($_GET['pageNum']) == true) $pageNum = $_GET['pageNum'];
        $startRow = ($pageNum - 1) * $item_per_page;

        $query = "SELECT products.*, categories.name as cate_name, brands.name as brand_name FROM products 
        INNER JOIN categories ON products.category_id = categories.id 
        INNER JOIN brands ON products.brand_id = brands.id
        WHERE products.active = 1 ORDER BY products.sort_order
        LIMIT $startRow, $item_per_page";
        $result = $this->db->select($query);
        return [
            'result' => $result,
            'item_per_page'=> $item_per_page // số sản phẩm trên mỗi trang
        ];
    }

    public function paging()
    {
        // lay so trang
        $query = "SELECT COUNT(*) as num_records FROM products";
        $num_records = $this->db->select($query);

        $row = mysqli_fetch_assoc($num_records);

        $show_product = $this->show_products();
        $item_per_page = $show_product['item_per_page']; // Số sản phẩm trong 1 trang
        
        $sum_record = (int)$row["num_records"];

        $item_page = ceil($sum_record / $item_per_page); // Số trang
        $first_page_item = $show_product['result']; // lấy sản phảm trong 1 trang

        $pageNum = '';
        if (isset($_GET['pageNum']) == true) {
            $pageNum = $_GET['pageNum'];
        }

        $result = [
            'item_page' => $item_page, // Số trang
            'first_page_item' => $first_page_item,  // danh sách sản phẩm trên trang đầu tiên
            'pageNum' => $pageNum, //  trang hiện tại
            'sum_record' => $sum_record,
        ];

        return $result;
    }

    public function show_category()
    {
        // Sử dụng WHERE active 
        $query = "SELECT *  FROM categories WHERE active = 1 ORDER BY sort_order";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_brand()
    {
        // Sử dụng WHERE active 
        $query = "SELECT * FROM brands WHERE active = 1 ORDER BY sort_order";
        $result = $this->db->select($query);
        return $result;
    }

    public function getId_product($product_id) {
        $query = "SELECT * FROM products WHERE id= '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($prod_name, $prod_file, $brand_id, $cate_id, $prod_price, $prod_price_old, $prod_desc, $prod_tag, $product_id) {
        $prod_name = $this->fm->validation($prod_name);
        $prod_file = $this->fm->validation($prod_file);
        $brand_id = $this->fm->validation($brand_id);
        $cate_id = $this->fm->validation($cate_id);
        $prod_price = $this->fm->validation($prod_price);
        $prod_price_old = $this->fm->validation($prod_price_old);
        $prod_desc = $this->fm->validation($prod_desc);
        $prod_tag = $this->fm->validation($prod_tag);
        $product_id = $this->fm->validation($product_id);





        $prod_name = mysqli_real_escape_string($this->db->link, $prod_name);
        $prod_file = mysqli_real_escape_string($this->db->link, $prod_file);
        $brand_id = mysqli_real_escape_string($this->db->link, $brand_id);
        $cate_id = mysqli_real_escape_string($this->db->link, $cate_id);
        $prod_price = mysqli_real_escape_string($this->db->link, $prod_price);
        $prod_price_old = mysqli_real_escape_string($this->db->link, $prod_price_old);
        $prod_desc = mysqli_real_escape_string($this->db->link, $prod_desc);
        $prod_tag = mysqli_real_escape_string($this->db->link, $prod_tag);
        $product_id = mysqli_real_escape_string($this->db->link, $product_id);

        if(empty($prod_name)) {
            $alert = "<span class='text-danger'>product must be not empty</span>";
            return $alert;
        } else {
            $query = "UPDATE products SET name = '$prod_name', image = '$prod_name', 
            brand_id ='$brand_id', category_id = '$cate_id', price = '$prod_price', old_price = '$prod_price_old', description = '$prod_desc', tags = '$prod_tag'  WHERE id = '$product_id'";
            $result = $this->db->update($query);
            if(empty($result)) {
                $alert = "<span class='text-danger'>Edit product error!</span>";
                return $alert;
            } else {
                $alert = "<span class='text-success'>Edit product success!</span>";
                return $alert;
            }
        }
    }

    public function delete_product($dele_id) {
        $query = "UPDATE products SET active = 2 WHERE id = '$dele_id'";
        $result = $this->db->update($query);
        return $result;
    }

    public function exportData(&$page_num) {
        function filterData(&$str){ 
            // Regex
            $str = preg_replace("/\t/", "\\t", $str); 
            $str = preg_replace("/\r?\n/", "\\n", $str); 
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
        }

        $item_per_page = 5;
        $startRow = 0;  // chỉ số bắt đầu của sản phẩm trên trang đó
        if (isset($_GET['pageNum'])) {
            $page_num = (int) $_GET['pageNum'];
          } else {
            $page_num = 1;
        }

        echo $page_num."</br>";
        if (isset($_GET['pageNum']) == true) $page_num = $_GET['pageNum'];
        $startRow = ((int)$page_num - 1) * $item_per_page;

        $query = "SELECT products.*, categories.name as cate_name, brands.name as brand_name FROM products 
        INNER JOIN categories ON products.category_id = categories.id 
        INNER JOIN brands ON products.brand_id = brands.id
        WHERE products.active = 1 ORDER BY products.sort_order
        LIMIT $startRow, $item_per_page";
        $result = $this->db->select($query);

        // Name file download
        $fileName = "codeworld_exprot_data-". date('Ymd') . ".xls";

        // Column names 
        $fields = array('id', 'Name product', 'Name brands', 'Name category', 'Image product', 'Price product', 'Price product old', 'Description', 'Tags');

        // Hiển thị các name của $fields bằng một hàng cách nhau bắc dấu tab
        $excelData = implode("\t", array_values($fields)) . "\n"; 

        if($result->num_rows > 0){ 
            // Output each row of the data 
            while($row = $result->fetch_assoc()){ 
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
    }


    public function findMaxSort()
    {
        $query = "SELECT MAX(sort_order) as max FROM products";
        $result = $this->db->select($query);

        $row = mysqli_fetch_array($result);
        $largestNumber = $row['max'];
        return $largestNumber;
    }
}



?>