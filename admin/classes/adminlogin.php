<?php
include '../lib/database.php';
include '../lib/session.php';
include '../helpers/format.php';
Session::checkLogin();
?>


<?php
class adminlogin {
    private $db;
    private $fm;

    public function __construct() 
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function login_admin($adminUser, $adminPass) {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        $query = "SELECT * FROM users WHERE email = '$adminUser' AND password = '$adminPass'";
        $result = $this->db->select($query);

        if($result != false) {
            $value = $result->fetch_assoc(); // Trả về 1 mảng

            Session::set('adminlogin', true);
            Session::set('adminId', $value['id']);
            Session::set('adminUser', $value['username']);
            Session::set('adminPass', $value['password']);

            header('location:index.php');
        } else {
            $error = "User and password not match";
            return $error;
        }
    }
}



?>