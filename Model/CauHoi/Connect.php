<?php
class cauhoi
{
    private $conn;
    function __construct() //sinhvien()
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


    
    public function Danhsach_cauhoi(){
      //  $perpage=5;
      //  $page=($page-1)*$perpage;
       
       $search='';
      //  if($search_input!=''){
      //    $search="WHERE ( hovaten LIKE '%$search_input%' OR email like '%$search_input%' OR diachi like '%$search_input%' OR gioitinh like '$search_input%' OR Quocgia like '%$search_input%' )";  
      //  }
      
     
       $sql = "SELECT * FROM CauHoi $search ORDER BY MaCH desc ";
     
       $query=  $this->conn->query($sql);
       $cauhoi=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $cauhoi['cauhoi_data'][]= $row;
       }
       }       
       
    $count_sql = "SELECT COUNT(*) FROM CauHoi $search";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $cauhoi['total'][]= $total;       
       
    return $cauhoi;  
    }
    
    public function Tao_thongtin_cauhoi($post_data=array()){
         
   
       $NDCH='';
       if(isset($post_data->NDCH)){
       $NDCH= mysqli_real_escape_string($this->conn,trim($post_data->NDCH));
       }
       
        $MaPhan='';
       if(isset($post_data->MaPhan)){
       $MaPhan= mysqli_real_escape_string($this->conn,trim($post_data->MaPhan));
       }
       
       
      
     
       $sql="INSERT INTO CauHoi(NDCH, MaPhan) VALUES ('$NDCH', '$MaPhan')";
        
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Đã thêm được 1 câu hỏi';     
        }else{
           return 'Kiểm tra thông tin để nhập vào, lỗi';     
        }
          
       
       
       
        
    }
    
    public function view_cauhoi_id($id){
       if(isset($id)){
       $MaCH= mysqli_real_escape_string($this->conn,trim($id));
       //echo $SV_id1;
       $sql="Select * from CauHoi where MaCH=$MaCH";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_thongtin_cauhoi($post_data=array()){
       if( isset($post_data->MaCH)){
       $MaCH=mysqli_real_escape_string($this->conn,trim($post_data->MaCH));
           
       $NDCH='';
       if(isset($post_data->NDCH)){
       $NDCH= mysqli_real_escape_string($this->conn,trim($post_data->NDCH));
       }
       $MaPhan='';
       if(isset($post_data->MaPhan)){
       $MaPhan= mysqli_real_escape_string($this->conn,trim($post_data->MaPhan));
       }
       
       

       $sql="UPDATE CauHoi SET NDCH='$NDCH',MaPhan='$MaPhan' WHERE MaCH =$MaCH";
     
        $result=  $this->conn->query($sql);
        
         
         unset($post_data->MaCH); 
        if($result){
          return 'Đã cập nhật thành công';     
        }else{
         return 'Kiểm tra, lỗi cập nhật thông tin  ';     
        }
          
           
           
      
       }   
    }
    
    public function delete_thongtin_cauhoi($id){
        
       if(isset($id)){
       $MaCH= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  CauHoi  WHERE MaCH =$MaCH";
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