<?php
class user_quizzs
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


    public function AddUserQuizz($post_data=array()){
         
        $user_id='';
        if(isset($post_data->user_id)){
        $user_id= mysqli_real_escape_string($this->conn,trim($post_data->user_id));
        }
        $topic_id='';
        if(isset($post_data->topic_id)){
        $topic_id= mysqli_real_escape_string($this->conn,trim($post_data->topic_id));
        }
        
        $start_at='';
        if(isset($post_data->start_at)){
        $start_at= mysqli_real_escape_string($this->conn,trim($post_data->start_at));
        }

        $finish_at='';
        if(isset($post_data->finish_at)){
        $finish_at= mysqli_real_escape_string($this->conn,trim($post_data->finish_at));
        }
        
        $score='';
        if(isset($post_data->score)){
        $score= mysqli_real_escape_string($this->conn,trim($post_data->score));
        }
        
         $quizz_data='';
        if(isset($post_data->quizz_data)){
        $quizz_data= mysqli_real_escape_string($this->conn,trim($post_data->quizz_data));
        }
        
        
       
      
        $sql="INSERT INTO user_quizzs(user_id, topic_id, start_at, finish_at, score, quizz_data ) VALUES ($user_id, $topic_id, '$start_at', '$finish_at', $score, '$quizz_data')";
         
         $result=  $this->conn->query($sql);
         
         if($result){
           return 'Thêm kết quả thành công';     
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


   public function updateUserQuizz($post_data=array()){
      if( isset($post_data->id)){
      $id=mysqli_real_escape_string($this->conn,trim($post_data->id));
          
      $user_id='';
        if(isset($post_data->user_id)){
        $user_id= mysqli_real_escape_string($this->conn,trim($post_data->user_id));
        }
        
        $topic_id='';
        if(isset($post_data->topic_id)){
        $topic_id= mysqli_real_escape_string($this->conn,trim($post_data->topic_id));
        }

        $start_at='';
        if(isset($post_data->start_at)){
        $start_at= mysqli_real_escape_string($this->conn,trim($post_data->start_at));
        }

        $finish_at='';
        if(isset($post_data->finish_at)){
        $finish_at= mysqli_real_escape_string($this->conn,trim($post_data->finish_at));
        }
        
        $score='';
        if(isset($post_data->score)){
        $score= mysqli_real_escape_string($this->conn,trim($post_data->score));
        }
        
         $quizz_data='';
        if(isset($post_data->quizz_data)){
        $quizz_data= mysqli_real_escape_string($this->conn,trim($post_data->quizz_data));
        }
  

      $sql="UPDATE user_quizzs SET user_id ='$user_id', topic_id ='$topic_id', start_at ='$start_at', finish_at ='$finish_at', score='$score', quizz_data='$quizz_data' where id = $id";
    
       $result=  $this->conn->query($sql);
       
        
        unset($post_data->id); 
       if($result){
         return 'Đã cập nhật thành công';     
       }else{
        return 'Kiểm tra, lỗi cập nhật thông tin  ';     
       }

      }   
   }

   public function userQuizzByUserID($post_data=array()){

    if( isset($post_data->user_id)){
        $user_id=mysqli_real_escape_string($this->conn,trim($post_data->user_id));
    $sql = "SELECT * FROM user_quizzs where user_id=$user_id";
 
   $query=  $this->conn->query($sql);
   $userquizzs=array();
   if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $userquizzs['user_quizz_data'][]= $row;
   }
   }     
}  
       
   
return $userquizzs;  
    
}

public function top10User($post_data=array()){

    if( isset($post_data->topic_id)){
        $topic_id=mysqli_real_escape_string($this->conn,trim($post_data->topic_id));
    $sql = "SELECT username, score, (finish_at - start_at) as user_time FROM user_quizzs inner join user on user_quizzs.user_id = user.id where topic_id=$topic_id order by score desc, user_time asc limit 10" ;
 
   $query=  $this->conn->query($sql);
   $topUser=array();
   if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $topUser['top_user_data'][]= $row;
   }
   }     
}  
       
   
return $topUser;  
    
}
    
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>