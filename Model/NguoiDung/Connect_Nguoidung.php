<?php
class Nguoidung
{
    private $conn;
    function __construct() 
    {
      session_start();
      $servername = "localhost";
      $dbname = "quizzworld";
      $username = "root";
      $password = ""; 
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
         if ($conn->connect_error) {
         die("Lỗi kết nối: " . $conn->connect_error);
         }else{
         $this->conn=$conn;  
         }
    }

    public function login($username, $password)
    {
       $sql = "SELECT * FROM Nguoidung Where tentaikhoan='$username' and matkhau='$password'";
       $query=  $this->conn->query($sql);
       if ($query->num_rows > 0){
          return "Đăng nhập thành công";
       }
       else{
          return "Đăng nhập thất bại";
       }
    }

    public function register($username, $password)
    {
       $sql = "INSERT INTO Nguoidung values('$username', '$password')";
       $query = $this->con->query($sql);
       if($result){
         return 'Đăng ký thành công';     
       }else{
          return 'Kiểm tra thông tin để nhập vào, lỗi';     
       }
    }

    public function selectAllUser(){
       $sql = "SELECT * FROM taikhoan ";
       $query=  $this->conn->query($sql);
       $nguoidung=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $nguoidung['nguoidung_data'][]= $row;
       }

       return $nguoidung;
    }

   
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
   }
}

?>