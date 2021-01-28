<?php
class quizz
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

 
    public function quizzListByTopic($post_data=array()){

        if( isset($post_data->topic_id)){
            $topic_id=mysqli_real_escape_string($this->conn,trim($post_data->topic_id));
        $sql = "SELECT * FROM quizz where topic_id=$topic_id";
     
       $query=  $this->conn->query($sql);
       $topic=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $topic['topic_data'][]= $row;
       }
       }     
    }  
           
       
    return $topic;  
        
    }

    public function AddQuizz($post_data=array()){
         
    
        $topic_id='';
        if(isset($post_data->topic_id)){
        $topic_id= mysqli_real_escape_string($this->conn,trim($post_data->topic_id));
        }
        $question='';
        if(isset($post_data->question)){
        $question= mysqli_real_escape_string($this->conn,trim($post_data->question));
        }
        
        $ansA='';
        if(isset($post_data->ansA)){
        $ansA= mysqli_real_escape_string($this->conn,trim($post_data->ansA));
        }

        $ansB='';
        if(isset($post_data->ansB)){
        $ansB= mysqli_real_escape_string($this->conn,trim($post_data->ansB));
        }
        
        $ansC='';
        if(isset($post_data->ansC)){
        $ansC= mysqli_real_escape_string($this->conn,trim($post_data->ansC));
        }
        
         $ansD='';
        if(isset($post_data->ansD)){
        $ansD= mysqli_real_escape_string($this->conn,trim($post_data->ansD));
        }

        $correct='';
        if(isset($post_data->correct)){
        $correct= mysqli_real_escape_string($this->conn,trim($post_data->correct));
        }
         
      
        $sql="INSERT INTO quizz(topic_id,question,ansA,ansB,ansC,ansD,correct  ) VALUES ($topic_id,'$question', '$ansA', '$ansB', '$ansC', '$ansD', '$correct')";
         
         $result=  $this->conn->query($sql);
         
         if($result){
           return 'Thêm câu hỏi thành công';     
         }else{
            return 'Kiểm tra thông tin để nhập vào, lỗi';     
         }
            
         
     }


   public function changeQuizzInfo($post_data=array()){
      if( isset($post_data->id)){
      $id=mysqli_real_escape_string($this->conn,trim($post_data->id));
          
      $topic_id='';
        if(isset($post_data->topic_id)){
        $topic_id= mysqli_real_escape_string($this->conn,trim($post_data->topic_id));
        }
        $question='';
        if(isset($post_data->question)){
        $question= mysqli_real_escape_string($this->conn,trim($post_data->question));
        }
        
        $ansA='';
        if(isset($post_data->ansA)){
        $ansA= mysqli_real_escape_string($this->conn,trim($post_data->ansA));
        }

        $ansB='';
        if(isset($post_data->ansB)){
        $ansB= mysqli_real_escape_string($this->conn,trim($post_data->ansB));
        }
        
        $ansC='';
        if(isset($post_data->ansC)){
        $ansC= mysqli_real_escape_string($this->conn,trim($post_data->ansC));
        }
        
         $ansD='';
        if(isset($post_data->ansD)){
        $ansD= mysqli_real_escape_string($this->conn,trim($post_data->ansD));
        }

        $correct='';
        if(isset($post_data->correct)){
        $correct= mysqli_real_escape_string($this->conn,trim($post_data->correct));
        }

      $sql="UPDATE quizz SET topic_id ='$topic_id', question ='$question', ansA='$ansA', ansB='$ansB', ansC='$ansC', ansD='$ansD', correct ='$correct' where id = '$id'";
    
       $result=  $this->conn->query($sql);
       
        
        unset($post_data->id); 
       if($result){
         return 'Đã cập nhật thành công';     
       }else{
        return 'Kiểm tra, lỗi cập nhật thông tin  ';     
       }

      }   
   }
    
   
    
    public function deleteQuizz($post_data=array()){
        
      if( isset($post_data->id)){
         $id=mysqli_real_escape_string($this->conn,trim($post_data->id));

       $sql="DELETE FROM  quizz  WHERE id =$id ";
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Xóa thành công';     
        }else{
         return 'Kiểm tra, lỗi xóa';     
        }                   
       }
        
    }

    public function Random10QuizzIn1Topic($post_data=array()){
      if( isset($post_data->topic_id)){
        $topic_id=mysqli_real_escape_string($this->conn,trim($post_data->topic_id));

        $sql="SELECT * FROM quizz where topic_id=$topic_id ORDER BY RAND() LIMIT 10 "; 
        $query=  $this->conn->query($sql);
       $quizzs=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $quizzs['quizzs_data'][]= $row;
       }
    }
    return $quizzs;
  }

  }

    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>