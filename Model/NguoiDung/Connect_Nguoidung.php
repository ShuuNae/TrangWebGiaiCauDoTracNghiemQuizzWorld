<?php
class Nguoidung
{
    private $conn;
    function __construct() 
    {
      session_start();
      $servername = "localhost";
      $dbname = "QuizzWorld";
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
          return true;
       }
       else{
          return false;
       }
    }

   
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>