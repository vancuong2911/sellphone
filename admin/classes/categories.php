<?php
include '../lib/database.php';
include '../helpers/format.php';
?>


<?php
class categories {
    private $db;
    private $fm;

    public function __construct() 
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_category($cate_name,$cate_sortnew) {
        $cate_name = $this->fm->validation($cate_name);
        $cate_name = mysqli_real_escape_string($this->db->link, $cate_name);

        if(empty($cate_name)) {
            $alert = "<span class='text-danger'>Category must be not empty</span>";
            return $alert;
        } else {
            $query = "INSERT INTO categories (name, sort_order) VALUES ('$cate_name', '$cate_sortnew')";
            $result = $this->db->insert($query);

            if($result) {
                $alert = "<span class='text-success'>Add categories success!</span>";
                return $alert;
            } else {
                $alert = "<span class='text-danger'>Add categories error!</span>";
                return $alert;
            }
        }
    }

    public function show_category() {
        // Sử dụng WHERE active 
        $query = "SELECT * FROM categories WHERE active = 1 ORDER BY sort_order";
        $result = $this->db->select($query);
        return $result;
    }

    public function getId_category($category_id) {
        $query = "SELECT * FROM categories WHERE id= '$category_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_categories($categoryName, $category_id) {
        $categoryName = $this->fm->validation($categoryName);
        $categoryName = mysqli_real_escape_string($this->db->link, $categoryName);

        if(empty($categoryName)) {
            $alert = "<span class='text-danger'>Category must be not empty</span>";
            return $alert;
        } else {
            $query = "UPDATE categories SET name = '$categoryName'  WHERE id = '$category_id'";
            $result = $this->db->update($query);
            if(empty($result)) {
                $alert = "<span class='text-danger'>Edit categories error!</span>";
                return $alert;
            } else {
                $alert = "<span class='text-success'>Edit categories success!</span>";
                return $alert;
            }
        }
    }

    public function delete_category($dele_id) {
        $query = "UPDATE categories SET active = 2 WHERE id = '$dele_id'";
        $result = $this->db->update($query);
        return $result;
    }


    public function findMaxSort() {
        $query = "SELECT MAX(sort_order) as max FROM categories";
        $result = $this->db->select($query);

        $row = mysqli_fetch_array( $result );
        $largestNumber = $row['max'];
        return $largestNumber;
    }
}



?>