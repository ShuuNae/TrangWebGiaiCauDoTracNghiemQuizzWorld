<?php
class thisinh
{
    private $conn;
    function __construct() //thisinh()
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


    
    public function Danhsach_thisinh(){
      //  $perpage=5;
      //  $page=($page-1)*$perpage;
       
       $search='';
      //  if($search_input!=''){
      //    $search="WHERE ( HoTen LIKE '%$search_input%' OR Email like '%$search_input%' OR NgaySinh like '%$search_input%' OR GioiTinh like '$search_input%' OR Username like '%$search_input%' )";  
      //  }
      
     
       $sql = "SELECT * FROM ThiSinh $search ORDER BY MaTS desc";
     
       $query=  $this->conn->query($sql);
       $thisinh=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $thisinh['thisinh_data'][]= $row;
       }
       }       
       
    $count_sql = "SELECT COUNT(*) FROM ThiSinh $search";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $thisinh['total'][]= $total;       
       
    return $thisinh;  
    }
    
    public function Tao_thongtin_thisinh($post_data=array()){
         
    
      $MaTS='';
      if(isset($post_data->MaTS)){
      $MaTS= mysqli_real_escape_string($this->conn,trim($post_data->MaTS));
      }

       $HoTen='';
       if(isset($post_data->HoTen)){
       $HoTen= mysqli_real_escape_string($this->conn,trim($post_data->HoTen));
       }

       $NgaySinh='';
       if(isset($post_data->NgaySinh)){
       $NgaySinh= mysqli_real_escape_string($this->conn,trim($post_data->NgaySinh));
       }

       $GioiTinh='';
       if(isset($post_data->GioiTinh)){
       $GioiTinh= mysqli_real_escape_string($this->conn,trim($post_data->GioiTinh));
       }

       $Email='';
       if(isset($post_data->Email)){
       $Email= mysqli_real_escape_string($this->conn,trim($post_data->Email));
       }
         
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
       
      
     
       $sql="INSERT INTO ThiSinh(MaTS,HoTen,NgaySinh, GioiTinh,Email, Username) VALUES ('$MaTS','$HoTen', '$NgaySinh','$GioiTinh','$Email', '$Username')";
        $insertAccount="INSERT INTO TaiKhoan(Username, Password, IsAdmin) VALUES ('$Username', '$Password', $IsAdmin)";
        
        $resultAccount= $this->conn->query($insertAccount);
        $result=  $this->conn->query($sql);
        
        if($result && $resultAccount){
          return 'Đã thêm được 1 thí sinh';     
        }else{
           return 'Kiểm tra thông tin để nhập vào, lỗi';     
        }
          
       
       
       
        
    }
    
    public function view_thisinh_id($MaTS){
       if(isset($MaTS)){
       $MaTS1= mysqli_real_escape_string($this->conn,trim($MaTS));
       //echo $MaTS1;
       $sql="Select * from ThiSinh where MaTS=$MaTS1";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_thongtin_thisinh($post_data=array()){
       if( isset($post_data->MaTS)){
       $MaTS=mysqli_real_escape_string($this->conn,trim($post_data->MaTS));
           
       $HoTen='';
       if(isset($post_data->HoTen)){
       $HoTen= mysqli_real_escape_string($this->conn,trim($post_data->HoTen));
       }

       $NgaySinh='';
       if(isset($post_data->NgaySinh)){
       $NgaySinh= mysqli_real_escape_string($this->conn,trim($post_data->NgaySinh));
       }

       $GioiTinh='';
       if(isset($post_data->GioiTinh)){
       $GioiTinh= mysqli_real_escape_string($this->conn,trim($post_data->GioiTinh));
       }

       $Email='';
       if(isset($post_data->Email)){
       $Email= mysqli_real_escape_string($this->conn,trim($post_data->Email));
       }
         
       $Username='';
       if(isset($post_data->Username)){
       $Username= mysqli_real_escape_string($this->conn,trim($post_data->Username));
       }
       

       $sql="UPDATE ThiSinh SET HoTen='$HoTen',NgaySinh='$NgaySinh',GioiTinh='$GioiTinh',Email='$Email',Username='$Username' WHERE MaTS =$MaTS";
     
        $result=  $this->conn->query($sql);
        
         
         unset($post_data->MaTS); 
        if($result){
          return 'Đã cập nhật thành công';     
        }else{
         return 'Kiểm tra, lỗi cập nhật thông tin  ';     
        }
          
           
           
      
       }   
    }
    
    public function delete_thongtin_thisinh($MaTS){
        
       if(isset($MaTS)){
       $MaTS1= mysqli_real_escape_string($this->conn,trim($MaTS));

       $sql="DELETE FROM  ThiSinh  WHERE MaTS =$MaTS1";
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