<?php
class user
{
    private $conn;
    function __construct() //taikhoan()
    {
      session_start();
      $servername = "localhost";
      $dbname = "quizz_world";
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
      $username='';
      if(isset($post_data->username)){
         $username= mysqli_real_escape_string($this->conn,trim($post_data->username));
         }

         $password='';
         if(isset($post_data->password)){
         $password= mysqli_real_escape_string($this->conn,trim($post_data->password));
         }

       $sql = "SELECT * FROM user Where username='$username' and password='$password'";
       $query=  $this->conn->query($sql);
       if ($query->num_rows > 0){
        while ($row = $query->fetch_assoc()) {
            $user['data']= $row;
         }
         $user['status']=true;
         $user['message']= "Đăng nhập thành công";
       }
       else{
        $user['message']= "Đăng nhập thất bại";
        $user['status']=false;
       }
       return $user;
    }

    public function Register($post_data=array()){
         
    
        $username='';
        if(isset($post_data->username)){
        $username= mysqli_real_escape_string($this->conn,trim($post_data->username));
        }
        $password='';
        if(isset($post_data->password)){
        $password= mysqli_real_escape_string($this->conn,trim($post_data->password));
        }
        
        $fullname='';
        if(isset($post_data->fullname)){
        $fullname= mysqli_real_escape_string($this->conn,trim($post_data->fullname));
        }

        $gender='';
        if(isset($post_data->gender)){
        $gender= mysqli_real_escape_string($this->conn,trim($post_data->gender));
        }
        
        $email='';
        if(isset($post_data->email)){
        $email= mysqli_real_escape_string($this->conn,trim($post_data->email));
        }
        
         $role='';
        if(isset($post_data->role)){
        $role= mysqli_real_escape_string($this->conn,trim($post_data->role));
        }
        
        
       
      
        $sql="INSERT INTO user(username, password, fullname,gender,email,role ) VALUES ('$username', '$password', '$fullname', $gender, '$email', '$role')";
         
         $result=  $this->conn->query($sql);
         
         if($result){
           return 'Đăng ký thành công';     
         }else{
            return 'Kiểm tra thông tin để nhập vào, lỗi';     
         }
            
         
     }
 
    public function User_list(){

       $sql = "SELECT * FROM user ";
     
       $query=  $this->conn->query($sql);
       $user=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $user['taikhoan_data'][]= $row;
       }
       }       
       
    $count_sql = "SELECT COUNT(*) FROM user ";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $user['total'][]= $total;       
       
    return $user;  
    }

    public function changePassword($post_data=array()){
      if( isset($post_data->id)){
      $id=mysqli_real_escape_string($this->conn,trim($post_data->id));
          
      $password='';
      if(isset($post_data->password)){
      $password= mysqli_real_escape_string($this->conn,trim($post_data->password));
      }
      
      $sql="UPDATE user SET password='$password' WHERE id ='$id' ";
    
       $result=  $this->conn->query($sql);
       
        
        unset($post_data->id); 
       if($result){
         return 'Thay đổi mật khẩu thành công';     
       }else{
        return 'Lõi thay đổi mật khẩu';     
       }

      }   
   }

   public function changeUserInfo($post_data=array()){
      if( isset($post_data->id)){
      $id=mysqli_real_escape_string($this->conn,trim($post_data->id));
          
      $username='';
        if(isset($post_data->username)){
        $username= mysqli_real_escape_string($this->conn,trim($post_data->username));
        }
        
        $fullname='';
        if(isset($post_data->fullname)){
        $fullname= mysqli_real_escape_string($this->conn,trim($post_data->fullname));
        }

        $gender='';
        if(isset($post_data->gender)){
        $gender= mysqli_real_escape_string($this->conn,trim($post_data->gender));
        }
        
        $email='';
        if(isset($post_data->email)){
        $email= mysqli_real_escape_string($this->conn,trim($post_data->email));
        }
        
         $role='';
        if(isset($post_data->role)){
        $role= mysqli_real_escape_string($this->conn,trim($post_data->role));
        }

      $sql="UPDATE user SET username ='$username', fullname ='$fullname', gender =$gender, email ='$email', role ='$role' where id = $id";
    
       $result=  $this->conn->query($sql);
       
        
        unset($post_data->id); 
       if($result){
         return 'Đã cập nhật thành công';     
       }else{
        return 'Kiểm tra, lỗi cập nhật thông tin  ';     
       }

      }   
   }
   
   //  public function view_user_id($id){
   //     if(isset($id)){
   //     $id= mysqli_real_escape_string($this->conn,trim($id));
   //     //echo $SV_id1;
   //     $sql="Select * from user where id='$id'";
        
   //     $result=  $this->conn->query($sql);
     
   //      return $result->fetch_assoc(); 
    
   //     }  
   //  }
    
   
    
    public function deleteUser($post_data=array()){
        
      if( isset($post_data->id)){
         $id=mysqli_real_escape_string($this->conn,trim($post_data->id));

       $sql="DELETE FROM  user  WHERE id =$id ";
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