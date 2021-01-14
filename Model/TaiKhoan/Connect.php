<?php
class taikhoan
{
    private $conn;
    function __construct() //taikhoan()
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

    public function login($post_data=array())
    {
      $Username='';
      if(isset($post_data->Username)){
         $Username= mysqli_real_escape_string($this->conn,trim($post_data->Username));
         }

         $Password='';
         if(isset($post_data->Password)){
         $Password= mysqli_real_escape_string($this->conn,trim($post_data->Password));
         }


       $sql = "SELECT * FROM Nguoidung Where tentaikhoan='$Username' and matkhau='$Password'";
       $query=  $this->conn->query($sql);
       if ($query->num_rows > 0){
          return "Đăng nhập thành công";
       }
       else{
          return "Đăng nhập thất bại";
       }
    }


    
    public function Danhsach_taikhoan(){
      //  $perpage=5;
      //  $page=($page-1)*$perpage;
       
       $search='';
      //  if($search_input!=''){
      //    $search="WHERE ( hovaten LIKE '%$search_input%' OR email like '%$search_input%' OR diachi like '%$search_input%' OR gioitinh like '$search_input%' OR Quocgia like '%$search_input%' )";  
      //  }
      
     
       $sql = "SELECT * FROM TaiKhoan $search ";
     
       $query=  $this->conn->query($sql);
       $taikhoan=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $taikhoan['taikhoan_data'][]= $row;
       }
       }       
       
    $count_sql = "SELECT COUNT(*) FROM TaiKhoan $search";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $taikhoan['total'][]= $total;       
       
    return $taikhoan;  
    }
    
    public function Tao_thongtin_taikhoan($post_data=array()){
         
    
       $Username='';
       if(isset($post_data->Username)){
       $Username= mysqli_real_escape_string($this->conn,trim($post_data->Username));
       }
       $Password='';
       if(isset($post_data->Password)){
       $Password= mysqli_real_escape_string($this->conn,trim($post_data->Password));
       }
       
        $IsAdmin='';
       if(isset($post_data->IsAdmin)){
       $IsAdmin= mysqli_real_escape_string($this->conn,trim($post_data->IsAdmin));
       }
       
       
      
     
       $sql="INSERT INTO TaiKhoan(Username, Password, IsAdmin) VALUES ('$Username', '$Password', $IsAdmin)";
        
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Đã thêm được 1 tài khoản';     
        }else{
           return 'Kiểm tra thông tin để nhập vào, lỗi';     
        }
           
        
    }
    
    public function view_taikhoan_id($Username){
       if(isset($Username)){
       $username= mysqli_real_escape_string($this->conn,trim($Username));
       //echo $SV_id1;
       $sql="Select * from TaiKhoan where Username='$username'";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_thongtin_taikhoan($post_data=array()){
       if( isset($post_data->Username)){
       $Username=mysqli_real_escape_string($this->conn,trim($post_data->Username));
           
       $Password='';
       if(isset($post_data->Password)){
       $Password= mysqli_real_escape_string($this->conn,trim($post_data->Password));
       }
       
       $IsAdmin='';
       if(isset($post_data->IsAdmin)){
       $IsAdmin= mysqli_real_escape_string($this->conn,trim($post_data->IsAdmin));
       }
       

       $sql="UPDATE TaiKhoan SET Password='$Password',IsAdmin=$IsAdmin WHERE Username ='$Username' ";
     
        $result=  $this->conn->query($sql);
        
         
         unset($post_data->Username); 
        if($result){
          return 'Đã cập nhật thành công';     
        }else{
         return 'Kiểm tra, lỗi cập nhật thông tin  ';     
        }

       }   
    }
    
    public function delete_thongtin_taikhoan($Username){
        
       if(isset($Username)){
       $Username= mysqli_real_escape_string($this->conn,trim($Username));

       $sql="DELETE FROM  TaiKhoan  WHERE Username ='$Username' ";
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Xóa thành công';     
        }else{
         return 'Kiểm tra, lỗi xóa';     
        }                   
       }
        
    }
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>