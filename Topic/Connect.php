<?php
class topic
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

 
    public function Topic_list(){

       $sql = "SELECT * FROM topic ";
     
       $query=  $this->conn->query($sql);
       $topic=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $topic['topic_data'][]= $row;
       }
       }       
       
    $count_sql = "SELECT COUNT(*) FROM topic ";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $topic['total'][]= $total;       
       
    return $topic;  
    }


   public function changeTopicInfo($post_data=array()){
      if( isset($post_data->id)){
      $id=mysqli_real_escape_string($this->conn,trim($post_data->id));
          
      $name='';
        if(isset($post_data->name)){
        $name= mysqli_real_escape_string($this->conn,trim($post_data->name));
        }
        
        $description='';
        if(isset($post_data->description)){
        $description= mysqli_real_escape_string($this->conn,trim($post_data->description));
        }

      $sql="UPDATE topic SET name ='$name', description ='$description' where id = '$id'";
    
       $result=  $this->conn->query($sql);
       
        
        unset($post_data->id); 
       if($result){
         return 'Đã cập nhật thành công';     
       }else{
        return 'Kiểm tra, lỗi cập nhật thông tin  ';     
       }

      }   
   }
    
   
    
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