<?php
include '../lib/database.php';
include '../helpers/format.php';
?>


<?php
class brands {
    private $db;
    private $fm;

    public function __construct() 
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_brand($brand_name,$brand_img_link,$brand_link_web,$brand_sortnew) {
        $brand_name = $this->fm->validation($brand_name);
        $brand_img_link = $this->fm->validation($brand_img_link);
        $brand_link_web = $this->fm->validation($brand_link_web);

        $brand_name = mysqli_real_escape_string($this->db->link, $brand_name);
        $brand_img_link = mysqli_real_escape_string($this->db->link, $brand_img_link);
        $brand_link_web = mysqli_real_escape_string($this->db->link, $brand_link_web);

        if(empty($brand_name) || empty($brand_img_link)) {
            $alert = "<span class='text-danger'>Brands must be not empty</span>";
            return $alert;
        } else {
            $query = "INSERT INTO brands (name, image_url, link ,sort_order) VALUES ('$brand_name','$brand_img_link','$brand_link_web','$brand_sortnew')";
            $result = $this->db->insert($query);

            if($result) {
                $alert = "<span class='text-success'>Add brands success!</span>";
                return $alert;
            } else {
                $alert = "<span class='text-danger'>Add brands error!</span>";
                return $alert;
            }
        }
    }

    public function show_brands() {
        // Sử dụng WHERE active 
        $query = "SELECT * FROM brands WHERE active = 1 ORDER BY sort_order";
        $result = $this->db->select($query);
        return $result;
    }


    public function update_brand($brand_name,$brand_img_link,$brand_link_web, $brand_id) {
        $brand_name = $this->fm->validation($brand_name);
        $brand_img_link = $this->fm->validation($brand_img_link);
        $brand_link_web = $this->fm->validation($brand_link_web);
        
        $brand_name = mysqli_real_escape_string($this->db->link, $brand_name);
        $brand_img_link = mysqli_real_escape_string($this->db->link, $brand_img_link);
        $brand_link_web = mysqli_real_escape_string($this->db->link, $brand_link_web);
        $brand_id = mysqli_real_escape_string($this->db->link, $brand_id);

        if(empty($brand_name)) {
            $alert = "<span class='text-danger'>Brand name must be not empty</span>";
            return $alert;
        } else {
            $query = "UPDATE brands SET name = '$brand_name', image_url = '$brand_img_link', link = '$brand_link_web'  WHERE id = '$brand_id'";
            $result = $this->db->update($query);
            if(empty($result)) {
                $alert = "<span class='text-danger'>Edit brands error!</span>";
                return $alert;
            } else {
                $alert = "<span class='text-success'>Edit brands success!</span>";
                return $alert;
            }
        }
    }

    public function getId_brand($brand_id) {
        $query = "SELECT * FROM brands WHERE id= '$brand_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_brand($dele_id) {
        $query = "UPDATE brands SET active = 2 WHERE id = '$dele_id'";
        $result = $this->db->update($query);
        return $result;
    }

    public function findMaxSort() {
        $query = "SELECT MAX(sort_order) as max FROM brands";
        $result = $this->db->select($query);

        $row = mysqli_fetch_array( $result );
        $largestNumber = $row['max'];
        return $largestNumber;
    }

    

}



?>